<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binhLuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'id_sanpham','id_admin','noidung','username','email','adminreply','trangthai'
    ];
}
