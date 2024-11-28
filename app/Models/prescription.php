<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_id',
        'treatment',
        'medicine',
    ];


    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
