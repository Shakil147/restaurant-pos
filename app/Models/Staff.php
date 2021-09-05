<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($staff) {
            $staff->dob = Carbon::parse($staff->dob);
            $staff->dob = Carbon::parse($staff->dob);
            $staff->join_date = Carbon::parse($staff->join_date);
            $staff->user_id = isset(auth()->user()->id) ? auth()->user()->id  : null;
        });
        static::updating(function($staff)
        {
            $staff->dob = Carbon::parse($staff->dob);
            $staff->join_date = Carbon::parse($staff->join_date);
            $staff->user_id = isset(auth()->user()->id) ? auth()->user()->id  : $staff->user_id;
        });
        static::deleting(function ($staff)
        {
            if ($staff->image and file_exists(public_path().$staff->image)) {
                unlink(public_path().$staff->image);
            }
            //$staff->attachments()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function type()
    {
        return $this->belongsTo(StaffType::class,'staf_type_id');
    }
}
