<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // {"requireLogin":1,
        //"requestUserDetails":1,       NO
        //"confirmationMessage":{"ar":"","en":""},
        //"emailsNotification":"",
        //"webService":"",
        //"showResult":0,
        //"requestTitle":0,     NO
        //"oneEntryPerUser":0,
        //"sectionsToPages":0}

        Schema::create('bolt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('slug');
            $table->string('layout');
            $table->integer('ordering');
            $table->boolean('is_active');
            $table->text('desc')->nullable();
            $table->text('details')->nullable();
            $table->text('options')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('bolt');
    }
}
