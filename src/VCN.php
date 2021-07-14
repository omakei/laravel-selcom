<?php


namespace Omakei\LaravelSelcom;


class VCN
{

    public static function create(
        string $msisdn,
        string $account,
        string $first_name,
        string $last_name,
        string $middle_name,
        string $gender,
        string $dob,
        string $address,
        string $city,
        string $region,
        string $nationality,
        string $validity,
        string $email,
        string $language,
        string $marital_status,
        string $maiden_name,
        string $pin,
        string $transid,
        string $product_code
    )
    {
       $payload =  self::makeCreatePayload(
        $msisdn,
        $account,
        $first_name,
        $last_name,
        $middle_name,
        $gender,
        $dob,
        $address,
        $city,
        $region,
        $nationality,
        $validity,
        $email,
        $language,
        $marital_status,
        $maiden_name,
        $pin,
        $transid,
        $product_code
       );

       $client = new LaravelSelcomClient($payload);

      return $client->sendRequest(config('selcom.urls.vcn.create.method','post'),
                                  config('selcom.urls.vcn.create.url',''));
    }


    private static function makeCreatePayload(
        string $msisdn,
        string $account,
        string $first_name,
        string $last_name,
        string $middle_name,
        string $gender,
        string $dob,
        string $address,
        string $city,
        string $region,
        string $nationality,
        string $validity,
        string $email,
        string $language,
        string $marital_status,
        string $maiden_name,
        string $pin,
        string $transid,
        string $product_code,
    ): array
    {
        return [
            'msisdn' => $msisdn,
            'account' => $account,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'middle_name' => $middle_name,
            'gender' => $gender,
            'dob' => $dob,
            'address' => $address,
            'city' => $city,
            'region' => $region,
            'nationality' => $nationality,
            'validity' => $validity,
            'email' => $email,
            'language' => $language,
            'marital_status' => $marital_status,
            'maiden_name' => $maiden_name,
            'vendor' => config('selcom.vendor'),
            'pin' => $pin,
            'transid' => $transid,
            'product_code' => $product_code
        ];
    }


    public function changeStatus(
        string $msisdn,
        string $account,
        string $status,
        string $remarks,
        string $card_id,
        string $requestid,
        string $language,
    )
    {
        $payload =  self::makeChangeStatusPayload(
            $msisdn,
            $account,
            $status,
            $remarks,
            $card_id,
            $requestid,
            $language,
    );

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(config('selcom.urls.vcn.change_status.method','post'),
            config('selcom.urls.vcn.change_status.url',''));
    }


    public function makeChangeStatusPayload(
        string $msisdn,
        string $account,
        string $status,
        string $remarks,
        string $card_id,
        string $requestid,
        string $language,
    )
    {
        return [
            'msisdn' => $msisdn,
            'account' => $account,
            'status' => $status,
            'remarks' => $remarks,
            'card_id' => $card_id,
            'requestid' => $requestid,
            'language' => $language,
        ];
    }

    public function showCard(
        string $msisdn,
        string $account,
        string $status,
        string $remarks,
        string $card_id,
        string $requestid,
        string $language,
    )
    {
        $payload =  self::makeChangeStatusPayload(
            $msisdn,
            $account,
            $status,
            $remarks,
            $card_id,
            $requestid,
            $language,
        );

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(config('selcom.urls.vcn.show_card.method','post'),
            config('selcom.urls.vcn.show_card.url',''));
    }




    public function getCardStatus(string $msisdn, string $account)
    {

        $client = new LaravelSelcomClient(['msisdn' =>$msisdn, 'account' => $account]);

        return $client->sendRequest(config('selcom.urls.vcn.get_card_status.method','post'),
            config('selcom.urls.vcn.get_card_status.url',''));
    }

    public function setTransactionLimit(
        string $msisdn,
        string $account,
        string $limit_amount,
        string $limit_type,
        string $card_id
    )
    {

        $client = new LaravelSelcomClient([
            'msisdn' =>$msisdn,
            'account' => $account,
            'limit_amount' => $limit_amount,
            'limit_type' => $limit_type,
            'card_id' => $card_id]);

        return $client->sendRequest(config('selcom.urls.vcn.set_transaction_limit.method','post'),
            config('selcom.urls.vcn.set_transaction_limit.url',''));
    }

}
