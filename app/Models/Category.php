<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Product;
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'photo',
        'slug',
    ];

    protected $hidden = [];

    // public function product () {
    //     return $this->hasOne(Product::class,'id','categories_id');
    // }
}
