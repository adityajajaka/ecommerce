<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
    	'name', 'price', 'description',
    ];

    public function productReviews()
    {
    	return $this->HasMany(productReview::class);
    }

    public function orderProducts($order_by)
    {
    	// secara default product akan di urutkan berdasarkan created_at
    	$query = 'SELECT * FROM products ORDER BY created_at DESC';

    	if ($order_by == 'best_seller') {
    		// best seller
    		// Untuk lebih lanjut bisa pelajari MYSQL
    		// JOIN dan aggregation
    		$query = "SELECT p.*, oi.quantity FROM products AS p
    				LEFT JOIN (
    					SELECT product_id, SUM(quantity) as quantity from order_items
    						GROUP BY product_id
    				) AS oi ON oi.product_id = p.id
    				ORDER BY oi.quantity DESC;";

    	} else if ($order_by == 'terbaik') {
    		// terbaik
    		// Untuk lebih lanjut bisa pelajari MYSQL
    		// JOIN dan aggregation

    		// NOTE
    		// anda harus mengubah query ini supaya bisa mengurutkan product berdasarkan rating tertinggi
    		$query = "SELECT p.*, oi.rating FROM products AS p
    				LEFT JOIN (
    					SELECT product_id, SUM(rating) as rating from product_reviews
    						GROUP BY product_id
    				) AS oi ON oi.product_id = p.id
    				ORDER BY oi.rating DESC;";

    	} else if ($order_by == 'termurah') {
    		// termurah
    		$query = "SELECT * FROM products ORDER BY price ASC";

    	} else if ($order_by == 'termahal') {
    		//termahal
    		$query = "SELECT * FROM products ORDER BY price DESC";

    	} else if ($order_by == 'terbaru') {
    		//terbaru
    		$query = "SELECT * FROM products ORDER BY created_at DESC";
    	}

    	return DB::select($query);
    }
}
