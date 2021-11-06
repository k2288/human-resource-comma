<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(config("human-resource.users_table"))->onDelete("cascade");
            $table->string('address', 200)->nullable();
            $table->string('bank_account', 200)->nullable();
            $table->string('Identification_no', 200)->nullable();
            $table->enum('gender', ["woman", "man"])->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('children')->nullable();
            $table->string('study_field', 200)->nullable();
            $table->string('school', 200)->nullable();
            $table->text("description")->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('profiles');
    }
}
