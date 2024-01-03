<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'location',
        'capacity',
        'price',
        'Description',
    ];


    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
