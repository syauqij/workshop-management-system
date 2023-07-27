<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name']);
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
            $table->enum('role', [
                'customer', 'staff', 'manager', 'finance', 'admin'
            ])->after('password');
            $table->boolean('is_active')->default(1)->after('remember_token');
            $table->foreignId('created_by')->nullable()->after('is_active')
            	->constrained('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_created_by_foreign');
            $table->dropColumn(['first_name', 'last_name', 'role', 'is_active', 'created_by']);
            $table->string('name')->after('id');
        });
    }
};
