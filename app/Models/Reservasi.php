<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','nama','no_meja','tanggal_waktu','jumlah_orang','status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    } 
}
