<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kecamatan extends Model
{
    protected $table = "kecamatan";
    protected $fillable = ['nama', 'kota_id'];
    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class);
    }
}
