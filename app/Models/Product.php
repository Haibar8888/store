<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use model
use App\Models\ProductGallery;
use App\Models\User;
use App\Models\Category;

class Product extends Model
{
    // use HasFactory;
    use SoftDeletes;
    
    // protected $table = 'Pr';

    protected $fillable = [
        'name',
        'user_id',
        'categories_id',
        'slug',
        'price',
        'description',
    ];

    protected $hidden = [];

    public function galleries () {
        return $this->hasMany(ProductGallery::class,'products_id','id');
    }

    public function user () {
        return $this->hasOne(User::class,'user_id','id');
    }

    public function category () {
        return $this->belongsTo(Category::class,'categories_id','id');
     }
}
