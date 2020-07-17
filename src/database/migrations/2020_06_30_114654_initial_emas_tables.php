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
            $table->boolean('has_parallel_session')->default(0);
            $table->longText('link')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->boolean('show_barcode')->default(1);
            $table->boolean('is_published')->default(1);
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.session_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->date('date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamp('time')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->unsignedBigInteger('event_id')->index();
            $table->unsignedBigInteger('session_type_id')->index()->nullable();
            $table->unsignedBigInteger('session_parallel_id')->index()->nullable();
            $table->longText('link')->nullable();
            $table->boolean('is_published')->default(1);
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.session_parallel'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->date('date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamp('time')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->unsignedBigInteger('event_id')->index()->nullable();
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

        Schema::create(config('ktcd_emas.session_speaker_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description')->nullable();
            $table->longText('topic')->nullable();
            $table->unsignedBigInteger('speaker_id')->index()->nullable();
            $table->unsignedBigInteger('session_id')->index()->nullable();
            $table->boolean('is_published')->default(1);
            $table->smallInteger('schedule_order')->nullable();
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.speaker_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('position')->nullable();;
            $table->string('duty')->nullable();;
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->unsignedBigInteger('event_id')->index()->nullable();
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

        Schema::create(config('ktcd_emas.participant_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->longText('address')->nullable();
            $table->string('country')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('event_id')->index()->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.schedule_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description')->nullable();
            $table->longText('topic')->nullable();
            $table->date('date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamp('time')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->string('pic')->nullable();
            $table->unsignedBigInteger('model_id')->index()->nullable();
            $table->string('model_type')->index()->nullable();
            $table->string('type')->index()->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->unsignedBigInteger('event_id')->index();
            $table->unsignedBigInteger('group_id')->index()->nullable();
            $table->boolean('is_group')->default(0);
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
        Schema::dropTable(config('ktcd_emas.session_speaker_table'));
        Schema::dropTable(config('ktcd_emas.price_table'));
        Schema::dropTable(config('ktcd_emas.accommodation_table'));
        Schema::dropTable(config('ktcd_emas.participant_table'));
        Schema::dropTable(config('ktcd_emas.schedule_table'));
    }
}
