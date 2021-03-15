<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTailorIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tailor_issues', function (Blueprint $table) {
            $table->id();
            $table->integer('issue_id')->nullable();
            $table->integer('tailor_id')->nullable();
            $table->integer('order_details_order_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->date('tailor_price')->nullable();
            $table->date('issue_date')->nullable();
            $table->integer('issue_quantity')->nullable();
            $table->tinyinteger('issue_status')->default('1');
            $table->tinyinteger('delivery_status')->default('0');
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
        Schema::dropIfExists('tailor_issues');
    }
}
