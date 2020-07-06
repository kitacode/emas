<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitialEmasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('ktcd_emas.event_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('place')->nullable();
            $table->string('address')->nullable();
            $table->string('theme')->nullable();
            $table->string('committee')->nullable();
            $table->string('timezone')->nullable();
            $table->string('date_format')->nullable();
            $table->string('time_format')->nullable();
            $table->string('datetime_format')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->longText('term_and_condition')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->boolean('show_barcode')->default(1);
            $table->boolean('is_published')->default(1);
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.session_type_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->unsignedBigInteger('event_id')->index()->nullable();
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.session_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->unsignedBigInteger('event_id')->index();
            $table->unsignedBigInteger('session_type_id')->index()->nullable();
            $table->boolean('is_published')->default(1);
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.speaker_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->unsignedBigInteger('event_id')->index()->nullable();
            $table->unsignedBigInteger('session_id')->index()->nullable();
            $table->boolean('is_published')->default(1);
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.price_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->unsignedBigInteger('event_id')->index()->nullable();
            $table->unsignedBigInteger('session_id')->index()->nullable();
            $table->boolean('is_published')->default(1);
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.accommodation_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('address')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('price_week_day')->nullable();
            $table->unsignedBigInteger('price_week_end')->nullable();
            $table->unsignedBigInteger('quota')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->unsignedBigInteger('event_id')->index()->nullable();
            $table->unsignedBigInteger('parent_id')->index()->nullable();
            $table->boolean('is_published')->default(1);
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
        Schema::dropTable(config('ktcd_emas.event_table'));
        Schema::dropTable(config('ktcd_emas.session_type_table'));
        Schema::dropTable(config('ktcd_emas.session_table'));
        Schema::dropTable(config('ktcd_emas.speaker_table'));
        Schema::dropTable(config('ktcd_emas.price_table'));
        Schema::dropTable(config('ktcd_emas.accommodation_table'));
    }
}
