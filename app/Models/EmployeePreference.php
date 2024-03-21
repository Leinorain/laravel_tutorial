<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeePreference extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'is_happy',
        'favorite_year',
        'preferred_hourly_rate',
        'ip_address',
    ];

    // Define relationships and methods as needed

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
