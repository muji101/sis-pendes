<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'date',
        'reason',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
