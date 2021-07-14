<?php


namespace Omakei\LaravelSelcom;

class Checkout
{
    public function createOrderLong(
        string $order_id,
        string $buyer_email,
        string $buyer_name,
        string $buyer_userid,
        string $buyer_phone,
        string $gateway_buyer_uuid,
        string $amount,
        string $currency,
        string $payment_methods,
        string $redirect_url,
        string $cancel_url,
        string $webhook,
        string $billing_firstname,
        string $billing_lastname,
        string $billing_address_1,
        string $billing_address_2,
        string $billing_city,
        string $billing_state_or_region,
        string $billing_postcode_or_pobox,
        string $billing_country,
        string $billing_phone,
        string $shipping_firstname,
        string $shipping_lastname,
        string $shipping_address_1,
        string $shipping_address_2,
        string $shipping_city,
        string $shipping_state_or_region,
        string $shipping_postcode_or_pobox,
        string $shipping_country,
        string $shipping_phone,
        string $buyer_remarks,
        string $merchant_remarks,
        string $no_of_items,
        string $header_colour,
        string $link_colour,
        string $button_colour
    ) {
        $payload = self::makeCreateOrderLongPayload(
            $order_id,
            $buyer_email,
            $buyer_name,
            $buyer_userid,
            $buyer_phone,
            $gateway_buyer_uuid,
            $amount,
            $currency,
            $payment_methods,
            $redirect_url,
            $cancel_url,
            $webhook,
            $billing_firstname,
            $billing_lastname,
            $billing_address_1,
            $billing_address_2,
            $billing_city,
            $billing_state_or_region,
            $billing_postcode_or_pobox,
            $billing_country,
            $billing_phone,
            $shipping_firstname,
            $shipping_lastname,
            $shipping_address_1,
            $shipping_address_2,
            $shipping_city,
            $shipping_state_or_region,
            $shipping_postcode_or_pobox,
            $shipping_country,
            $shipping_phone,
            $buyer_remarks,
            $merchant_remarks,
            $no_of_items,
            $header_colour,
            $link_colour,
            $button_colour
        );

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(
            config('urls.checkout.create_order_long.method', 'post'),
            config('urls.checkout.create_order_long.url', '')
        );
    }

    private function makeCreateOrderLongPayload(
        string $order_id,
        string $buyer_email,
        string $buyer_name,
        string $buyer_userid,
        string $buyer_phone,
        string $gateway_buyer_uuid,
        string $amount,
        string $currency,
        string $payment_methods,
        string $redirect_url,
        string $cancel_url,
        string $webhook,
        string $billing_firstname,
        string $billing_lastname,
        string $billing_address_1,
        string $billing_address_2,
        string $billing_city,
        string $billing_state_or_region,
        string $billing_postcode_or_pobox,
        string $billing_country,
        string $billing_phone,
        string $shipping_firstname,
        string $shipping_lastname,
        string $shipping_address_1,
        string $shipping_address_2,
        string $shipping_city,
        string $shipping_state_or_region,
        string $shipping_postcode_or_pobox,
        string $shipping_country,
        string $shipping_phone,
        string $buyer_remarks,
        string $merchant_remarks,
        string $no_of_items,
        string $header_colour,
        string $link_colour,
        string $button_colour
    ): array {
        return [
        'vendor' => config('selcom.vendor'),
        'order_id' => $order_id,
        'buyer_email' => $buyer_email,
        'buyer_name' => $buyer_name,
        'buyer_userid' => $buyer_userid,
        'buyer_phone' => $buyer_phone,
        'gateway_buyer_uuid' => $gateway_buyer_uuid,
        'amount' => $amount,
        'currency' => $currency,
        'payment_methods' => $payment_methods,
        'redirect_url' => $redirect_url,
        'cancel_url' => $cancel_url,
        'webhook' => $webhook,
        'billing_firstname' => $billing_firstname,
        'billing_lastname' => $billing_lastname,
        'billing_address_1' => $billing_address_1,
        'billing_address_2' => $billing_address_2,
        'billing_city' => $billing_city,
        'billing_state_or_region' => $billing_state_or_region,
        'billing_postcode_or_pobox' => $billing_postcode_or_pobox,
        'billing_country' => $billing_country,
        'billing_phone' => $billing_phone,
        'shipping_firstname' => $shipping_firstname,
        'shipping_lastname' => $shipping_lastname,
        'shipping_address_1' => $shipping_address_1,
        'shipping_address_2' => $shipping_address_2,
        'shipping_city' => $shipping_city,
        'shipping_state_or_region' => $shipping_state_or_region,
        'shipping_postcode_or_pobox' => $shipping_postcode_or_pobox,
        'shipping_country' => $shipping_country,
        'shipping_phone' => $shipping_phone,
        'buyer_remarks' => $buyer_remarks,
        'merchant_remarks' => $merchant_remarks,
        'no_of_items' => $no_of_items,
        'header_colour' => $header_colour,
        'link_colour' => $link_colour,
        'button_colour' => $button_colour,
            ];
    }

    public function createOrderMinimal(
        string $vendor,
        string $order_id,
        string $buyer_email,
        string $buyer_name,
        string $buyer_phone,
        string $amount,
        string $currency,
        string $payment_methods,
        string $redirect_url,
        string $cancel_url,
        string $webhook,
        string $buyer_remarks,
        string $merchant_remarks,
        string $no_of_items,
        string $header_colour,
        string $link_colour,
        string $button_colour,
        string $expiry
    ) {
        $payload = self::makeCreateOrderMinimalPayload(
            $order_id,
            $buyer_email,
            $buyer_name,
            $buyer_phone,
            $amount,
            $currency,
            $payment_methods,
            $redirect_url,
            $cancel_url,
            $webhook,
            $buyer_remarks,
            $merchant_remarks,
            $no_of_items,
            $header_colour,
            $link_colour,
            $button_colour,
            $expiry
        );

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(
            config('selcom.urls.checkout.create_order_minimal.method', 'post'),
            config('selcom.urls.checkout.create_order_minimal.url', '')
        );
    }

    private function makeCreateOrderMinimalPayload(
        string $order_id,
        string $buyer_email,
        string $buyer_name,
        string $buyer_phone,
        string $amount,
        string $currency,
        string $payment_methods,
        string $redirect_url,
        string $cancel_url,
        string $webhook,
        string $buyer_remarks,
        string $merchant_remarks,
        string $no_of_items,
        string $header_colour,
        string $link_colour,
        string $button_colour,
        string $expiry
    ): array {
        return [
            'vendor' => config('selcom.vendor'),
            'order_id' => $order_id,
            'buyer_email' => $buyer_email,
            'buyer_name' => $buyer_name,
            'buyer_phone' => $buyer_phone,
            'amount' => $amount,
            'currency' => $currency,
            'payment_methods' => $payment_methods,
            'redirect_url' => $redirect_url,
            'cancel_url' => $cancel_url,
            'webhook' => $webhook,
            'buyer_remarks' => $buyer_remarks,
            'merchant_remarks' => $merchant_remarks,
            'no_of_items' => $no_of_items,
            'header_colour' => $header_colour,
            'link_colour' => $link_colour,
            'button_colour' => $button_colour,
            'expiry' => $expiry,
        ];
    }

    public function cancelOrder(
        string $order_id
    ) {
        $client = new LaravelSelcomClient([
            'order_id' => $order_id,
        ]);

        return $client->sendRequest(
            config('selcom.urls.checkout.cancel_order.method', 'post'),
            config('selcom.urls.checkout.cancel_order.url', '')
        );
    }

    public function getOrderStatus(
        string $payment_status,
        string $order_id,
        string $creation_date,
        string $amount,
        string $transid,
        string $channel,
        string $reference,
        string $msisdn,
    ) {
        $payload = self::makeOrderStatusPayload(
            $payment_status,
            $order_id,
            $creation_date,
            $amount,
            $transid,
            $channel,
            $reference,
            $msisdn,
        );

        $client = new LaravelSelcomClient($payload);

        return $client->sendRequest(
            config('selcom.urls.checkout.get_order_status.method', 'post'),
            config('selcom.urls.checkout.get_order_status.url', '')
        );
    }

    public function makeOrderStatusPayload(
        string $payment_status,
        string $order_id,
        string $creation_date,
        string $amount,
        string $transid,
        string $channel,
        string $reference,
        string $msisdn,
    ) {
        return [
            'payment_status' => $payment_status,
            'order_id' => $order_id,
            'creation_date' => $creation_date,
            'amount' => $amount,
            'transid' => $transid,
            'channel' => $channel,
            'reference' => $reference,
            'msisdn' => $msisdn,
        ];
    }

    public function getAllOrderList(
        string $result,
        string $payment_status,
        string $order_id,
        string $creation_date,
    ) {
        $client = new LaravelSelcomClient([
            'result' => $result,
            'payment_status' => $payment_status,
            'order_id' => $order_id,
            'creation_date' => $creation_date,
            ]);

        return $client->sendRequest(
            config('selcom.urls.checkout.get_all_order_list.method', 'post'),
            config('selcom.urls.checkout.get_all_order_list.url', '')
        );
    }

    public function getStoredCardTokens(
        string $buyer_userid,
        string $gateway_buyer_uuid
    ) {
        $client = new LaravelSelcomClient([
            'buyer_userid' => $buyer_userid,
            'gateway_buyer_uuid' => $gateway_buyer_uuid,
        ]);

        return $client->sendRequest(
            config('selcom.urls.checkout.get_stored_card_tokens.method', 'post'),
            config('selcom.urls.checkout.get_stored_card_tokens.url', '')
        );
    }

    public function deleteStoredCardTokens(
        string $id,
        string $gateway_buyer_uuid
    ) {
        $client = new LaravelSelcomClient([
            'buyer_userid' => $id,
            'gateway_buyer_uuid' => $gateway_buyer_uuid,
        ]);

        return $client->sendRequest(
            config('selcom.urls.checkout.delete_stored_card_tokens.method', 'post'),
            config('selcom.urls.checkout.delete_stored_card_tokens.url', '')
        );
    }

    public function processOrderCardPayment(
        string $transid,
        string $vendor,
        string $order_id,
        string $card_token,
        string $buyer_userid,
        string $gateway_buyer_uuid
    ) {
        $client = new LaravelSelcomClient([
            'transid' => $transid,
            'vendor' => $vendor,
            'order_id' => $order_id,
            'card_token' => $card_token,
            'buyer_userid' => $buyer_userid,
            'gateway_buyer_uuid' => $gateway_buyer_uuid,
        ]);

        return $client->sendRequest(
            config('selcom.urls.checkout.process_order_card_payment.method', 'post'),
            config('selcom.urls.checkout.process_order_card_payment.url', '')
        );
    }

    public function processOrderWalletPullPayment(
        string $transid,
        string $order_id,
        string $msisdn
    ) {
        $client = new LaravelSelcomClient([
            'transid' => $transid,
            'order_id' => $order_id,
            'msisdn' => $msisdn,
        ]);

        return $client->sendRequest(
            config('selcom.urls.checkout.process_order_wallet_pull_payment.method', 'post'),
            config('selcom.urls.checkout.process_order_wallet_pull_payment.url', '')
        );
    }

    public function webhookCallback(
        string $transid,
        string $order_id,
        string $reference,
        string $result,
        string $resultcode,
        string $payment_status
    ) {
        $client = new LaravelSelcomClient([
            'transid' => $transid,
            'order_id' => $order_id,
            'reference' => $reference,
            'result' => $result,
            'resultcode' => $resultcode,
            'payment_status' => $payment_status,
        ]);

        return $client->sendRequest(
            config('selcom.urls.checkout.webhook_callback.method', 'post'),
            config('selcom.urls.checkout.webhook_callback.url', '')
        );
    }

    public function paymentRefund(
        string $transid,
        string $original_transid,
        string $amount
    ) {
        $client = new LaravelSelcomClient([
            'transid' => $transid,
            'original_transid' => $original_transid,
            'amount' => $amount,
        ]);

        return $client->sendRequest(
            config('selcom.urls.checkout.payment_refund.method', 'post'),
            config('selcom.urls.checkout.payment_refund.url', '')
        );
    }
}
