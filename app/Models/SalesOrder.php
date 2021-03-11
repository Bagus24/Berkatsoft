<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product',
        'id_customer',
        'nama_product',
        'harga',
        'deskripsi',
        'nama_customer',
        'no_hp',
        'alamat'
    ];
}
