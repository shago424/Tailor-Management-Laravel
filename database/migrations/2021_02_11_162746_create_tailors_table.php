<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTailorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tailors', function (Blueprint $table) {
            $table->id();
            $table->string('tailor_name')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('item_id')->nullable();
            $table->decimal('rate',10,2)->nullable();
            $table->decimal('total_amount',10,2)->nullable();
            $table->date('join_date')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('tailors');
    }
}
