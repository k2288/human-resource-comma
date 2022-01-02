<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('study_degree', 200)->nullable();
            $table->enum('military_service_status', ["finished", "exempted", "educational_exemption", "other"])->nullable();
            $table->string('identity_card_issue_place', 200)->nullable();
            $table->string("father_name")->nullable();
            $table->string('postal_code')->nullable();
            $table->string('birth_city')->nullable();
            $table->string('home_city')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('study_degree');
            $table->dropColumn('military_service_status');
            $table->dropColumn('identity_card_issue_place');
            $table->dropColumn("father_name");
            $table->dropColumn('postal_code');
            $table->dropColumn('birth_city');
            $table->dropColumn('home_city');

        });
    }
}
