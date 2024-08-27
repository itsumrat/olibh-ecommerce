<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable = ['product_name','description','image','price','special_price','price_type','sp_start','sp_end','status'];
}
