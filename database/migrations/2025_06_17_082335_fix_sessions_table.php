<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('sessions', function (Illuminate\Database\Schema\Blueprint $table) {
        if (!Schema::hasColumn('sessions', 'payload')) {
            $table->text('payload')->nullable();
        }
        if (!Schema::hasColumn('sessions', 'last_activity')) {
            $table->integer('last_activity')->nullable();
        }
        if (!Schema::hasColumn('sessions', 'user_id')) {
            $table->unsignedBigInteger('user_id')->nullable();
        }
        if (!Schema::hasColumn('sessions', 'ip_address')) {
            $table->string('ip_address', 45)->nullable();
        }
        if (!Schema::hasColumn('sessions', 'user_agent')) {
            $table->text('user_agent')->nullable();
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            //
        });
    }
};
