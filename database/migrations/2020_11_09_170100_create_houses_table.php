<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('title')->unique();
            $table->longText('description');
            $table->string('slug');
            $table->smallInteger('rooms');
            $table->smallInteger('beds');
            $table->smallInteger('bathrooms');
            $table->smallInteger('price');
            $table->integer('size');
            $table->string('address');
            $table->float('long', 9, 6)->nullable();
            $table->float('lat', 8, 6)->nullable();
            $table->string('img')->nullable();
            $table->boolean('visible')->default('1');
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
        Schema::dropIfExists('houses');
    }
}
