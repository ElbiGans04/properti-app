<?php

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Marketing;
use App\Models\Provinsi;
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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_transaksi', ['JUAL', 'SEWA', 'JUAL ATAU SEWA']);
            $table->enum('jenis_unit', ['APARTEMENT', 'GUDANG', 'PABRIK', 'RUKO', 'TANAH', 'LAINNYA']);
            $table->boolean('is_lelang')->default(false);
            $table->string('judul')->required();
            $table->text('deskripsi');
            $table->integer('luas_tanah')->required();
            $table->integer('luas_bangunan')->default(0);
            $table->enum('legalitas', ['SHM', 'SHGB', 'GIRIK', 'AJB', 'SHGU', 'TRADISIONAL', 'LAINNYA']);
            $table->enum('hadap', ['UTARA', 'BARAT', 'SELATAN', 'TIMUR']);  
            $table->foreignIdFor(Marketing::class);
            $table->decimal('harga_jual', 15, 2)->nullable();
            $table->decimal('harga_sewa', 15, 2)->nullable();
            $table->enum('harga_sewa_tipe', ['HARGA_SEWA_PERTAHUN', 'HARGA_SEWA_PERBULAN'])->default('HARGA_SEWA_PERTAHUN')->nullable();
            $table->string('link_post_fb')->nullable();
            $table->string('link_post_ig')->nullable();
            $table->string('link_post_yt')->nullable();
            $table->string('link_post_tt')->nullable();
            $table->text('note')->nullable();
            $table->string('link_maps');
            $table->text('alamat');
            $table->foreignIdFor(Kecamatan::class);
            $table->foreignIdFor(Kota::class);
            $table->foreignIdFor(Provinsi::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
