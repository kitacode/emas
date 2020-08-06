<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInParticipansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::table(config('ktcd_emas.participant_table'), function (Blueprint $table) {
                $table->string('institution')->nullable();
                $table->string('occupation')->nullable();
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(config('ktcd_emas.participant_table'), function (Blueprint $table) {
            $table->dropColumn('institution');
            $table->dropColumn('occupation');
        });
    }
}
