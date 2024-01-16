<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'hm_id',
        'name',
        'birthday',
        'marital_status',
        'wedding_date',
        'education',
        'photo',
    ];

    public function headMember()
    {
        return $this->belongsTo(HeadMember::class, 'hm_id', 'id');
    }
}
