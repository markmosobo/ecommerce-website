<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'quantity',
        'price',
        'image_path',
        'photo',
        'category_id',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
