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
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->longText('term_and_condition')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->boolean('show_barcode')->default(0);
            $table->boolean('is_published')->default(0);
            $table->boolean('is_active')->default(1);
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
    }
}
