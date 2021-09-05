<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($type) {
            $type->user_id = isset(auth()->user()->id) ? auth()->user()->id  : null;
        });
        static::updating(function($type)
        {
            $type->user_id = isset(auth()->user()->id) ? auth()->user()->id  : $type->user_id;
        });
        static::deleting(function ($type)
        {
            //$type->attachments()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function type()
    {
        return $this->hasOne(Staff::class,'staf_type_id');
    }
}
