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
        Schema::table('users', function (Blueprint $table) {
            $table->string('education')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->string('achievment')->nullable()->default(null);
            $table->string('experience')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);



      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('education');
            $table->dropColumn('status');
            $table->dropColumn('achievment');
            $table->dropColumn('experience');
            $table->dropColumn('address');

      });
    }
};
