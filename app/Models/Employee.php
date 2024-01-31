<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'supervisor_id',
        'department_id',
        'first_name',
        'last_name',
        'middle_initial',
        'job_title',
        'job_description',
        'birthdate',
        'is_active',
        'profile_picture',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function age(): int
    {
        return Carbon::parse($this->birthdate)->age;
    }

    public function getFullNameAttribute(): string
    {
        return "$this->first_name $this->middle_initial. $this->last_name";
    }

    public function colleagues(): HasMany
    {
        return $this->hasMany(Employee::class, 'department_id', 'department_id')->where('id', '<>', $this->id);
    }
}
