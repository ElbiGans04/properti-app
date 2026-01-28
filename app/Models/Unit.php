<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    protected $fillable = [
        "images",
        "jenis_transaksi",
        "jenis_unit",
        "is_lelang",
        "judul",
        "deskripsi",
        "luas_tanah",
        "luas_bangunan",
        "legalitas",
        "hadap",
        "marketing_id",
        "harga_jual",
        "harga_sewa",
        "harga_sewa_tipe",
        "link_post_fb",
        "link_post_ig",
        "link_post_yt",
        "link_post_tt",
        "note",
        "link_maps",
        "alamat",
        "kecamatan_id",
        "kota_id",
        "provinsi_id",
    ];
    public function marketing(): BelongsTo
    {
        return $this->belongsTo(Marketing::class);
    }

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class);
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

}
