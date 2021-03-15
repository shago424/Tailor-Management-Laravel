<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTailorPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tailor_payments', function (Blueprint $table) {
            $table->id();
             $table->integer('tailor_id')->nullable();
            $table->decimal('credit_amount',10,2)->nullable();
            $table->decimal('pay_amount',10,2)->nullable();
            $table->decimal('balance_amount',10,2)->nullable();
            $table->date('payment_date')->nullable();
            $table->tinyinteger('status')->default('1');
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
        Schema::dropIfExists('tailor_payments');
    }
}
