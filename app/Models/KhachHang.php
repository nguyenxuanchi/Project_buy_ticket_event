<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $table = "khachhang";

    public function khachHangVe()
    {
        return $this->hasMany(KhachHangVe::class, 'ID_KHACHHANG', 'ID');
    }

    public $timestamps = false;
}
