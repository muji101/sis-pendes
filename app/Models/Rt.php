<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;

    protected $fillable = [
        'rt'
    ];

    public function family()
    {
        return $this->hasOne(Family::class);
    }
}
