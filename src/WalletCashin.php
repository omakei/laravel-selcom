<?php


namespace Omakei\LaravelSelcom;


class WalletCashin
{

    public static function pay(
       string $transid,
       string $utilitycode,
       string $utilityref,
       string $amount,
       string $pin,
       string $msisdn,
    )
    {
       $payload =  self::makePaymentPayload(  $transid,
        $utilitycode,
        $utilityref,
        $amount,
        $pin,
        $msisdn);

       $client = new LaravelSelcomClient($payload);

      return $client->sendRequest(config('selcom.urls.wallet_cashin.pay.method','post'),
                                  config('selcom.urls.wallet_cashin.pay.ulr',''));
    }


    private static function makePaymentPayload(
        string $transid,
        string $utilitycode,
        string $utilityref,
        string $amount,
        string $pin,
        string $msisdn,
    ): array
    {
        return [
            'transid' => $transid,
            'utilitycode' => $utilitycode,
            'utilityref' => $utilityref,
            'amount' => $amount,
            'vendor' => config('selcom.vendor'),
            'pin' => $pin,
            'msisdn' => $msisdn,
        ];
    }


    public function lookup(string $utilitycode, string $utilityref, string $transid)
    {
        $payload =  self::makeLookupPayload( $transid,  $utilitycode, $utilityref);

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(config('selcom.urls.wallet_cashin.lookup.method','post'),
            config('selcom.urls.wallet_cashin.lookup.ulr',''));
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

        $client = new LaravelSelcomClient(['transid' =>$transid]);

        return $client->sendRequest(config('selcom.urls.utility_payments.query_payment_status.method','post'),
            config('selcom.urls.utility_payments.query_payment_status.ulr',''));
    }

}
