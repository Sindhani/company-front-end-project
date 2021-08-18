<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function description()
    {
        return $this->hasMany(PackageDescription::class, 'package_id', 'id');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'package_id', 'id');
    }
}
