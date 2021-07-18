<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('featured_image');
            $table->longText('description');
            $table->time('time');
            $table->date('date');
            $table->boolean('event_type')->default(0);
            $table->boolean('visbility')->default(0);
            $table->boolean('is_paid')->default(0);
            $table->string('locatione');
            $table->json('interest_category_id');
            $table->json('tiers');
            $table->json('tiers_left');
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
        Schema::dropIfExists('events');
    }
}
