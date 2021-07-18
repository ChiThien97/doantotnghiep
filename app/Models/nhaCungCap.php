<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhaCungCap extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'tennhacungcap', 'diachi','email', 'sodienthoai'
    ];
}
