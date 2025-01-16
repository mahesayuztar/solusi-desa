<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('name');
            $table->string('nik');
            $table->string('nohp');
            $table->string('tujuan');
            $table->text('deskripsi');
            $table->datetime('tanggal');
            $table->string('status')->default('Disimpan');
            $table->string('gambar')->default('/images/logo_biru.png');
            $table->timestamps();
        });

        DB::table('reports')->insert(
            array(
                'name' => 'testing',
                'id_user' => 2,
                'nik' => '123',
                'nohp' => '12345678',
                'tujuan' => 'Lingkungan rusak',
                'deskripsi' => 'terdapat pohon tumbang',
                'tanggal' => Carbon::now()->toDateTimeString(),
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
