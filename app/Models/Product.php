<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    // Các trường fillable (có thể gán giá trị tự động)
    protected $fillable = ['name', 'brand', 'image', 'price', 'logo'];

    // Các trường không được gán giá trị tự động
    protected $guarded = ['id'];
}
