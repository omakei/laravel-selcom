<?php


namespace Omakei\LaravelSelcom;

class POSAgentCashout
{
    public static function process(
        string $transid,
        string $utilitycode,
        string $utilityref,
        string $amount,
        string $vendor,
        string $pin,
        string $name,
    ) {
        $payload = self::makePaymentPayload(
            $transid,
            $utilitycode,
            $utilityref,
            $amount,
            $vendor,
            $pin,
            $name
        );

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(
            config('urls.pos_agent_cashout.process.method', 'post'),
            config('urls.pos_agent_cashout.process.ulr', '')
        );
    }

    private static function makePaymentPayload(
        string $transid,
        string $utilitycode,
        string $utilityref,
        string $amount,
        string $vendor,
        string $pin,
        string $name,
    ): array {
        return [
            'transid' => $transid,
            'utilitycode' => $utilitycode,
            'utilityref' => $utilityref,
            'amount' => $amount,
            'vendor' => $vendor,
            'pin' => $pin,
            'name' => $name,
        ];
    }

    public function balance(string $vendor, string $pin)
    {
        $payload = self::makeBalancePayload($vendor,  $pin);

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(
            config('urls.pos_agent_cashout.balance.method', 'post'),
            config('urls.pos_agent_cashout.balance.ulr', '')
        );
    }

    public function makeBalancePayload(string $vendor, string $pin)
    {
        return [
            'vendor' => $vendor,
            'pin' => $pin,
        ];
    }

    public function queryTransactionStatus(string $transid)
    {
        $client = new LaravelSelcomClient(['transid' => $transid]);

        return $client->sendRequest(
            config('urls.pos_agent_cashout.query_transaction_status.method', 'post'),
            config('urls.pos_agent_cashout.query_transaction_status.ulr', '')
        );
    }
}
