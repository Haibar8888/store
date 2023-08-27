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
    
    protected $table = 'products';

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
        return $this->hasMany(ProductGallery::class,'products_id','id'); // foreign key dulu local key has many
    }

    public function user () {
        return $this->hasOne(User::class,'id','user_id'); // local key dulu foreign key has has one
    }

    public function category () {
        return $this->belongsTo(Category::class,'categories_id','id'); 
     }
}
