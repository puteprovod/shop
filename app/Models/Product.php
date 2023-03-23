<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Filterable;
    protected $table='products';
    protected $guarded=false;
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function colors(){
        return $this->belongsToMany(Color::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
}
