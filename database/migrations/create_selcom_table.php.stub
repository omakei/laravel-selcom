<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('selcom_request_logs_table', function (Blueprint $table) {
            $table->id();
            $table->string('end_point');
            $table->string('request_type');
            $table->string('request_status');
            $table->longText('request_payload');
            $table->longText('request_response');

            $table->timestamps();
        });
    }
};
