<?php


namespace Omakei\LaravelSelcom;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Omakei\LaravelSelcom\Exceptions\InvalidRequestTypeException;

class LaravelSelcomClient
{
    protected array $headers;

    protected string $authorization;

    protected string $digest;

    protected string $timestamp;

    protected string $signed_fields;

    public function __construct(public array $payload)
    {
        date_default_timezone_set(config('selcom.timezone'));

        $this->setAuthorization(base64_encode(config('selcom.key')));

        $this->setTimestamp(date('c'));

        $this->setSignedFields(implode(',', array_keys($this->payload)));

        $this->setDigest($this->computeSignature($this->payload, $this->signed_fields));

        $this->setHeaders([
            "Content-type" => "application/json;charset=\"utf-8\"",
            "Accept" => "application/json",
            "Cache-Control" => "no-cache",
            "Authorization" => config('selcom.realm') ." ". $this->authorization,
            "Digest-Method" => config('selcom.encoding_type'),
            "Digest" => $this->digest,
            "Timestamp" => $this->timestamp,
            "Signed-Fields" => $this->signed_fields,
        ]);
    }

    /**
     * @return string
     */
    public function getSignedFields(): string
    {
        return $this->signed_fields;
    }

    /**
     * @param string $signed_fields
     */
    public function setSignedFields(string $signed_fields): void
    {
        $this->signed_fields = $signed_fields;
    }

    /**
     * @return array|string[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array|string[] $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getAuthorization(): string
    {
        return $this->authorization;
    }

    /**
     * @param string $authorization
     */
    public function setAuthorization(string $authorization): void
    {
        $this->authorization = $authorization;
    }

    /**
     * @return string
     */
    public function getDigest(): string
    {
        return $this->digest;
    }

    /**
     * @param string $digest
     */
    public function setDigest(string $digest): void
    {
        $this->digest = $digest;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     */
    public function setTimestamp(string $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    private function computeSignature(array $parameters, string $signed_fields): string
    {
        $fields_order = explode(',', $signed_fields);

        $sign_data = "timestamp=". $this->getTimestamp();

        foreach ($fields_order as $key) {
            $sign_data .= "&$key=".$parameters[$key];
        }

        //RS256 Signature Method
        if (config('selcom.encoding_type') === 'RS256') {
            $private_key_pem = openssl_get_privatekey(file_get_contents(config('selcom.path_to_private_key_file')));

            openssl_sign($sign_data, $signature, $private_key_pem, OPENSSL_ALGO_SHA256);

            return base64_encode($signature);
        }

        //HS256 Signature Method
        if (config('selcom.encoding_type') === 'HS256') {
            return base64_encode(hash_hmac('sha256', $sign_data, config('selcom.secret'), true));
        }

        return '';
    }

    public function sendPostRequest(string $url): PromiseInterface | Response
    {
        $response = Http::withHeaders($this->headers)->post($url, $this->payload);

        if (! empty($response->json()['result'])) {
            $this->logRequest($url, 'POST', $response->json()['result'], json_encode($this->payload), $response->body());
        }

        return  $response;
    }

    public function sendGetRequest(string $url): PromiseInterface | \Exception | Response
    {
        $response = Http::withHeaders($this->headers)->get($url, $this->payload);

        if (! empty($response->json()['result'])) {
            $this->logRequest($url, 'GET', $response->json()['result'], json_encode($this->payload), $response->body());
        }

        return  $response;
    }

    public function sendPutRequest(string $url): PromiseInterface | \Exception | Response
    {
        $response = Http::withHeaders($this->headers)->put($url, $this->payload);

        if (! empty($response->json()['result'])) {
            $this->logRequest($url, 'PUT', $response->json()['result'], json_encode($this->payload), $response->body());
        }

        return  $response;
    }

    public function sendPatchRequest(string $url): PromiseInterface | \Exception | Response
    {
        $response = Http::withHeaders($this->headers)->patch($url, $this->payload);

        if (! empty($response->json()['result'])) {
            $this->logRequest($url, 'PATCH', $response->json()['result'], json_encode($this->payload), $response->body());
        }

        return  $response;
    }

    public function sendDeleteRequest(string $url): PromiseInterface | \Exception | Response
    {
        $response = Http::withHeaders($this->headers)->delete($url, $this->payload);

        if (! empty($response->json()['result'])) {
            $this->logRequest($url, 'DELETE', $response->json()['result'], json_encode($this->payload), $response->body());
        }


        return  $response;
    }

    public function sendRequest(string $type, string $url)
    {
        $method = array_key_exists(strtolower($type), $this->lookupTable())?$this->lookupTable()[strtolower($type)] : null;

        if (is_null($method)) {
            throw InvalidRequestTypeException::create(strtolower($type));
        }

        return $this->$method($url);
    }

    protected function lookupTable()
    {
        return [
            'post' => 'sendPostRequest',
            'get' => 'sendGetRequest',
            'put' => 'sendPutRequest',
            'patch' => 'sendPatchRequest',
            'delete' => 'sendDeleteRequest',
        ];
    }

    public function logRequest(
        string $end_point,
        string $request_type,
        string $request_status,
        string $request_payload,
        string $request_response
    ) {
        DB::table('selcom_request_logs_table')->insert([
            'end_point' => $end_point,
            'request_type' => $request_type,
            'request_status' => $request_status,
            'request_payload' => $request_payload,
            'request_response' => $request_response,

        ]);
    }
}
