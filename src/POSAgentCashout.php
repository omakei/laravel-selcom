<?php


namespace Omakei\LaravelSelcom;

class POSAgentCashout
{
    public static function process(
        string $transid,
        string $utilitycode,
        string $utilityref,
        string $amount,
        string $pin,
        string $name,
    ) {
        $payload = self::makePaymentPayload(
            $transid,
            $utilitycode,
            $utilityref,
            $amount,
            $pin,
            $name
        );

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(
            config('selcom.urls.pos_agent_cashout.process.method', 'post'),
            config('selcom.urls.pos_agent_cashout.process.url', '')
        );
    }

    private static function makePaymentPayload(
        string $transid,
        string $utilitycode,
        string $utilityref,
        string $amount,
        string $pin,
        string $name,
    ): array {
        return [
            'transid' => $transid,
            'utilitycode' => $utilitycode,
            'utilityref' => $utilityref,
            'amount' => $amount,
            'vendor' => config('selcom.vendor'),
            'pin' => $pin,
            'name' => $name,
        ];
    }

    public function balance(string $pin)
    {
        $payload = self::makeBalancePayload($pin);

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(
            config('selcom.urls.pos_agent_cashout.balance.method', 'post'),
            config('selcom.urls.pos_agent_cashout.balance.url', '')
        );
    }

    public function makeBalancePayload(string $pin)
    {
        return [
            'vendor' => config('selcom.vendor'),
            'pin' => $pin,
        ];
    }

    public function queryTransactionStatus(string $transid)
    {
        $client = new LaravelSelcomClient(['transid' => $transid]);

        return $client->sendRequest(config('selcom.urls.pos_agent_cashout.query_transaction_status.method','post'),
            config('selcom.urls.pos_agent_cashout.query_transaction_status.url',''));
    }
}
