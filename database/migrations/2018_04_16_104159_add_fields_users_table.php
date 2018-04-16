<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('remember_token');
            $table->string('surname')->nullable()->after('first_name');
            $table->string('south_african_id_number')->nullable()->after('surname');
            $table->string('mobile_number')->nullable()->after('south_african_id_number');
            $table->date('birth_date')->nullable()->after('mobile_number');
            $table->integer('language_id')->unsigned()->index()->nullable()->after('birth_date');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('surname');
            $table->dropColumn('south_african_id_number');
            $table->dropColumn('mobile_number');
            $table->dropColumn('birth_date');
            $table->dropColumn('language_id');
        });
    }
}
