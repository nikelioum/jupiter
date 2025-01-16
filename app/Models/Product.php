<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
        'status',
        'supplier',
        'product_code',
        'short_description',
        'full_description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
