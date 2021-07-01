<?php


namespace Omakei\LaravelSelcom;

class UtilityPayment
{
    public static function pay(
        string $transid,
        string $utilitycode,
        string $utilityref,
        string $amount,
        string $vendor,
        string $pin,
        string $msisdn,
    ) {
        $payload = self::makePaymentPayload(
            $transid,
            $utilitycode,
            $utilityref,
            $amount,
            $vendor,
            $pin,
            $msisdn
        );

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(
            config('urls.utility_payments.pay.method', 'post'),
            config('urls.utility_payments.pay.ulr', '')
        );
    }

    private static function makePaymentPayload(
        string $transid,
        string $utilitycode,
        string $utilityref,
        string $amount,
        string $vendor,
        string $pin,
        string $msisdn,
    ): array {
        return [
            'transid' => $transid,
            'utilitycode' => $utilitycode,
            'utilityref' => $utilityref,
            'amount' => $amount,
            'vendor' => $vendor,
            'pin' => $pin,
            'msisdn' => $msisdn,
        ];
    }

    public function lookup(string $utilitycode, string $utilityref, string $transid)
    {
        $payload = self::makeLookupPayload($transid,  $utilitycode, $utilityref);

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(
            config('urls.utility_payments.lookup.method', 'post'),
            config('urls.utility_payments.lookup.ulr', '')
        );
    }

    public function makeLookupPayload(string $utilitycode, string $utilityref, string $transid)
    {
        return [
            'transid' => $transid,
            'utilitycode' => $utilitycode,
            'utilityref' => $utilityref,
        ];
    }

    public function queryPaymentStatus(string $transid)
    {
        $client = new LaravelSelcomClient(['transid' => $transid]);

        return $client->sendRequest(
            config('urls.utility_payments.query_payment_status.method', 'post'),
            config('urls.utility_payments.query_payment_status.ulr', '')
        );
    }
}
