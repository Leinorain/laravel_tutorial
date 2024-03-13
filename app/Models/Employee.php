<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employee extends Model
{
    protected $fillable = [
        'supervisor_id',
        'first_name',
        'last_name',
        'middle_initial',
        'job_title',
        'job_description',
        'birthdate',
        'is_active',
        'profile_picture',
    ];

    public function preferences()
    {
        return $this->hasOne(EmployeePreference::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function age()
    {
        return Carbon::parse($this->attributes['birthdate'])->age;
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['middle_initial'] . '. ' . $this->attributes['last_name'];
    }

    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'department_id', 'department_id')->where('id', '<>', $this->id);
    }
}
