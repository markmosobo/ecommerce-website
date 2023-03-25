<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

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
        'seller_id',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class,'seller_id');
    }
}
