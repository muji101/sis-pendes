<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birth extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'place',
        'gender',
        'family_id',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
