<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'date',
        'time',
        'reason',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function getDateAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['date'])
            ->format('d, M Y');
    }

    
}
