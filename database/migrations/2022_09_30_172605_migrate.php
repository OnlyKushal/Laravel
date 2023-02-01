<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products',function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->string('category',200)->nullable();
            $table->string('price',100)->nullable();
            $table->string('descriptions',1000)->nullable();
            $table->string('status',100)->nullable();
            $table->string('images',1000)->nullable();
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
        //
        Schema::dropIfExists('products');
    }
};
