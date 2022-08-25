<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product_detail()
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'product_tags')->withTimestamps();
    }
}
