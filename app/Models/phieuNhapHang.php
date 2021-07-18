<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phieuNhapHang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','maphieunhap', 'id_nhacungcap', 'tongtien',
    ];
}
