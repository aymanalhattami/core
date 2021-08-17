<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // {"htmlId":"wo0yYy6FUO","htmlName":"wo0yYy6FUO","isRequire":"1"}
        // {"values":[],"defaultValues":[]
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('forms');
            $table->foreignId('section_id')->constrained('sections');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('type');
            $table->integer('layout_position')->default(1);
            $table->integer('ordering')->default(1);
            $table->string('html_id')->nullable();
            $table->string('html_name')->nullable();
            $table->text('options')->nullable();
            $table->text('rules')->nullable();
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
        Schema::dropIfExists('fields');
    }
}
