<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadMember extends Model
{
    use HasFactory;
    protected $casts = [
        'hobbies' => 'json',
    ];
    protected $fillable = [
        'name',
        'surname',
        'birthday',
        'mobile_no',
        'address',
        'state',
        'city',
        'pincode',
        'marital_status',
        'wedding_date',
        'hobbies',
        'photo',
    ];

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class, 'hm_id', 'id');
    }

    public function stateName()
    {
        return $this->belongsTo(State::class, 'state');
    }

    // Define the relationship with City
    public function cityName()
    {
        return $this->belongsTo(City::class, 'city');
    }
}
