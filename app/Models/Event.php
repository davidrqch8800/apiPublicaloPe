<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'category_id', 
        'start_date', 
        'end_date',
        'organizer_id', 
        'capacity', 
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(EventCategory::class);
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

}
