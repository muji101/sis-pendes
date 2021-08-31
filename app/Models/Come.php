<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Come extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'name',
        'birthplace',
        'birthdate',
        'gender',
        'religion',
        'last_education',
        'address',
        'work',
        'blood_type',
        'martial_status',
        'citizenship',
        'arrival_date',
        'resident_id'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
