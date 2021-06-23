<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public function user()
    {
         return $this->belongsTo(User::class,'user_id');
    }

    public function scopeWithFilters($query,$name)
    {
        //$cat = $category_id=='all' ? false : true;
        return $query->when($name!=null, function ($query) use ($name) {
            $query->where('name', 'LIKE', "%{$name}%");
        })->when($name!=null, function ($query) use ($name) {
            $query->orWhere('id', 'LIKE', "%{$name}%");
        })->when($name!=null, function ($query) use ($name) {
            $query->orWhere('order_code', 'LIKE', "%{$name}%");
        });
    }
}
