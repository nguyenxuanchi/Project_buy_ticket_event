<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuKien extends Model
{
    use HasFactory;

    protected $table = "sukien";

    public function user()
    {
        return $this->belongsTo(User::class, 'USER_ID', 'ID');
    }

    public function ve()
    {
        return $this->hasMany(Ve::class, 'SUKIEN_ID', 'ID');
    }

    public $timestamps = false;
}


