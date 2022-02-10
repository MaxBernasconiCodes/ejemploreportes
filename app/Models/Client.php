<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
    public function impressions()
    {
        return $this->hasManyThrough(Impression::class,Campaign::class);
    }
}
