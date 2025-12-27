<?php

use App\Models\Marketing;
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
            $table->enum('jenis_transaksi', ['JUAL', 'SEWA']);
            $table->enum('jenis_unit', ['APARTEMENT', 'GUDANG', 'PABRIK', 'RUKO', 'TANAH', 'LAINNYA']);
            $table->boolean('is_lelang')->default(false);
            $table->string('judul')->required();
            $table->text('deskripsi');
            $table->integer('luas_tanah')->required();
            $table->integer('luas_bangunan')->default(0);
            $table->enum('legalitas', ['SHM', 'SHGB', 'GIRIK', 'AJB', 'SHGU', 'TRADISIONAL', 'LAINNYA']);
            $table->enum('hadap', ['UTARA', 'BARAT', 'SELATAN', 'TIMUR']);  
            $table->foreignIdFor(Marketing::class);
            $table->decimal('harga', 15, 2);
            $table->enum('harga_tipe', ['HARGA_SEWA_PERTAHUN', 'HARGA_SEWA_PERBULAN', 'HARGA_JUAL'])->default('HARGA_JUAL');
            $table->string('link_post_fb');
            $table->string('link_post_ig');
            $table->string('link_post_yt');
            $table->string('link_post_tt');
            $table->text('note');
            $table->string('link_maps');
            $table->text('alamat');
            
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
