<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    use HasFactory;

    protected $table = "ve";

    public function suKien()
    {
        return $this->belongsTo(SuKien::class, 'SUKIEN_ID', 'ID');
    }

    public function khachHangVe()
    {
        return $this->hasMany(KhachHangVe::class, 'ID_VE', 'ID');
    }

    public $timestamps = false;
}
