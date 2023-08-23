<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResiAndShippingStatusToTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions_details', function (Blueprint $table) {
            //
            $table->string('shipping_status')->after('price'); //unpaid/success/
            $table->string('resi')->after('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            //
            $table->dropColumn('shipping_status');
            $table->dropColumn('resi');
        });
    }
}
