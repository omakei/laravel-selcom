<?php

namespace Omakei\LaravelSelcom;

class LaravelSelcom
{

    public static function checkout()
    {
        return new Checkout();
    }

    public static function POSAgentCashout()
    {
        return new POSAgentCashout();
    }

    public static function VCN()
    {
        return new VCN();
    }

    public static function WalletCashin()
    {
        return new WalletCashin();
    }

    public static function UtilityPayment()
    {
        return new UtilityPayment();
    }


}
