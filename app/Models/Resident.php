<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
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
        'citizenship'
    ] ;

    public function come()
    {
        return $this->hasMany(Come::class);
    }

    public function death()
    {
        return $this->hasMany(Death::class);
    }

    public function move()
    {
        return $this->hasMany(Move::class);
    }

    public function familyMember()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function family()
    {
        return $this->hasMany(Family::class);
    }
}
