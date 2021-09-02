<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;
class Type extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($type) {
            $type->slug = Str::slug($type->name);
            $type->user_id = isset(auth()->user()->id) ? auth()->user()->id  : null;
        });
        static::updating(function($type)
        {
            $type->user_id = isset(auth()->user()->id) ? auth()->user()->id  : $type->user_id;
        });
        static::deleting(function ($type)
        {
            if ($type->image and file_exists(public_path().$type->image)) {
                unlink(public_path().$type->image);
            }
            //$type->attachments()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
