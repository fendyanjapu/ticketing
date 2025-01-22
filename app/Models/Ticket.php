<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'sopd_id',
        'aduan',
        'keterangan',
        'status',
        'tanggalMasuk',
        'tanggalSelesai',
    ];

    public function sopd()
    {
        return $this->belongsTo(Sopd::class);
    }
}
