<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Vister extends Model
{
    protected $guarded = [];

    public function user(){
        $this->belongsTo(Vister::class);
    }


    protected $casts = [
        'time_in' => 'datetime',
        'time_out' => 'datetime',
    ];


    protected static function booted()
    {
        static::creating(function (Vister $vister) {
            $vister->time_in  = now();
        });



    }
}
