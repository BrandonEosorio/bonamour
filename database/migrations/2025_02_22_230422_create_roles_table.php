<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }

        // Insert default roles if they do not exist
        DB::table('roles')->insertOrIgnore([
            ['id' => 0, 'name' => 'cliente'],
            ['id' => 1, 'name' => 'empleado'],
            ['id' => 2, 'name' => 'admin'],
        ]);
    }

    public function down(): void {
        Schema::dropIfExists('roles');
    }
};