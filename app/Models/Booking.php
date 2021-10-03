<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function seat()
    {
        return $this->belongsTo(OfficeSeat::class);
    }

    public function bookingType()
    {
        return $this->belongsTo(BookingType::class);
    }

}
