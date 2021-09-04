<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($supplier) {
            $supplier->user_id = isset(auth()->user()->id) ? auth()->user()->id  : null;
        });
        static::updating(function($supplier)
        {
            $supplier->user_id = isset(auth()->user()->id) ? auth()->user()->id  : $supplier->user_id;
        });
        static::deleting(function ($supplier)
        {
            if ($supplier->image and file_exists(public_path().$supplier->image)) {
                unlink(public_path().$supplier->image);
            }
            //$supplier->attachments()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
