<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDomainIdToRenewalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('renewal', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('domain_id')->foreign('domain_id')->references('id')->on('domains')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('renewal', function (Blueprint $table) {
            //
            $table->dropColumn('domain_id');
        });
    }
}
