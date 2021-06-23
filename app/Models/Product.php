<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categories()
	{
	    return $this->belongsToMany(Category::class, 'products_categories', 'product_id', 'category_id');
	}

    public function user()
    {
    	 return $this->belongsTo(User::class,'user_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeWithFilters($query, $name,$category_id)
    {
        $cat = $category_id=='all' ? false : true;
        return $query->when($name!=null, function ($query) use ($name) {
            $query->where('name', 'LIKE', "%{$name}%");
        })->when($cat and $category_id!=null, function ($query) use ($category_id) {
            //$query->where('name', 'LIKE', "%{$name}%");
            $query->whereHas('categories', function($q) use($category_id){
                $q->where('category_id', $category_id);
            });
        });
    }
    	
}
