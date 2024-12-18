<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'address',
        'date_schedule',
        'time_schedule',
        'reason',
        'status',
        'mop',
        'receipt',
    ];
    protected $casts = [
        'date_schedule' => 'date',
    ];
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
