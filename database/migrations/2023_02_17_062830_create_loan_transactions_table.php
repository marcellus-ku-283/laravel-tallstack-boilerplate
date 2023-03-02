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
        Schema::create('loan_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('user_loan_id')->nullable();
            $table->unsignedBigInteger('momentum_id')->nullable();
            $table->string('encoded_key', 128)->nullable();
            $table->string('type', 128)->nullable();
            $table->float('principal_balance', 16,2)->nullable()->default(0);
            $table->float('interest_paid', 16,2)->nullable()->default(0);
            $table->float('balance', 16,2)->nullable()->default(0);
            $table->float('amount', 16,2)->nullable()->default(0);
            $table->timestamp('creationDate')->nullable();
            $table->timestamps();

            $table->foreign('user_loan_id')
                ->references('id')->on('user_loans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_transactions');
    }
};
