<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_records', function (Blueprint $table) {
            $table->id();
            $table->integer('event_registration_id');
            $table->integer('user_id');
            $table->string('email');
            $table->integer('phone_number');
            $table->integer('amount');
            $table->string('description');
            $table->string('payment_method');
            $table->json('payment_method_log');
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_records');
    }
}
