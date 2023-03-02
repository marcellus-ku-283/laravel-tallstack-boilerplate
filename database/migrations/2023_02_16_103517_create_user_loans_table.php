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
        Schema::create('user_loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('momentum_id', 64)->nullable();
            $table->string('loan_name', 128)->nullable();
            $table->string('account_state', 64)->nullable();
            $table->float('interest_balance', 16, 2)->nullable()->default(0);
            $table->float('interest_due', 16, 2)->nullable()->default(0);
            $table->float('interest_paid', 16, 2)->nullable()->default(0);
            $table->float('interest_rate', 16, 2)->nullable()->default(0);
            $table->float('loan_amount', 16, 2)->nullable()->default(0);
            $table->float('principal_balance', 16, 2)->nullable()->default(0);
            $table->float('principal_due', 16, 2)->nullable()->default(0);
            $table->float('principal_paid', 16, 2)->nullable()->default(0);
            $table->integer('repayment_installments')->default(0);
            $table->timestamp('creationDate')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('user_loans');
    }
};
