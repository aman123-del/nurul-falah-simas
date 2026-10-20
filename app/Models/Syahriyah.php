<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syahriyah extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'santri_id',
        'bulan',
        'tahun',
        'jumlah',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
