<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHangVe extends Model
{
    use HasFactory;

    protected $table = "khachhang_ve";

    public function ve()
    {
        return $this->belongsTo(Ve::class, 'ID_VE', 'ID');
    }

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'ID_KHACHHANG', 'ID');
    }

    public $timestamps = false;
}
