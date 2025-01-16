<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik')->unique();
            $table->string('email')->unique();
            $table->string('ttl')->default('-');
            $table->string('agama')->default('-');
            $table->string('pekerjaan')->default('-');
            $table->string('alamat');
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                'name' => 'admin_soldes',
                'nik' => '0',
                'email' => 'admin_soldes@gmail.com',
                'is_admin' => 1,
                'alamat' => 'Jl. Kita',
                'is_verified' => 1,
                'password' => Hash::make('11111111'),
            )
        );
        DB::table('users')->insert(
            array(
                'name' => 'testing',
                'nik' => '123',
                'email' => 'testing@gmail.com',
                'is_admin' => 0,
                'alamat' => 'Jl. Testing',
                'is_verified' => 1,
                'password' => Hash::make('11111111'),
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
