<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;
    protected $table = 'product_tags';

    protected $guarded = [];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
