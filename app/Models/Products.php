<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillbale =[
        'product_name',
        'product_price',
        'product_description',
        'product_image',

    ];
}
