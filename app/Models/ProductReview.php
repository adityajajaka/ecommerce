<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id',
    	'user_id',
    	'product_id',
    	'description',
    	'rating',
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
