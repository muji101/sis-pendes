<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'no_family',
        'village',
        'rt',
        'rw'
    ];

    public function birth()
    {
        return $this->hasMany(Birth::class);
    }

    public function resident()
    {
        return $this->hasMany(Resident::class);
    }

    public function familyMember()
    {
        return $this->hasMany(FamilyMember::class);
    }
}
