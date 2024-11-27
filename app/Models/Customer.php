<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'passport_or_jshshir',
        'address',
        'mfy',
        'workplace',
        'phone_number',
        'additional_phone_number',
        'notes',
        'photo_path',
        'jshshir', // Added field
        'passport_given_date', // Added field
        'date_of_birth', // Added field
        'region', // Added field
        'city_or_town', // Added field
    ];

    public function agreements()
    {
        return $this->hasMany(Agreement::class);
    }
}
