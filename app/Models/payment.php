<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_id',
        'user_id',
        'amount',
        'method',
        'reference_number',
        'receipt',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
