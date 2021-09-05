<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'family_id',
        'family_relationship'
    ];

    // public function anggota()
    // {
    //     return $this->hasOne(Family::class, 'id', 'class_id');
    // }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
