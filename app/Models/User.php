<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     public function getRoleNameAttribute()
    {
        $roles = [
            'admin' => 'Administrator',
            'investigator' => 'Investigator',
            'doctor' => 'Doctor',
            'counselor' => 'Counselor',
            'legal_officer' => 'Legal Officer',
            'gbv_officer' => 'GBV Officer',
            'social_worker' => 'Social Worker',
        ];

        return $roles[$this->role] ?? $this->role;
    }

    /**
     * Get the badge color for the role.
     */
    public function getRoleBadgeColorAttribute()
    {
        $colors = [
            'admin' => 'bg-red-100 text-red-800',
            'investigator' => 'bg-blue-100 text-blue-800',
            'doctor' => 'bg-green-100 text-green-800',
            'counselor' => 'bg-purple-100 text-purple-800',
            'legal_officer' => 'bg-yellow-100 text-yellow-800',
            'gbv_officer' => 'bg-pink-100 text-pink-800',
            'social_worker' => 'bg-indigo-100 text-indigo-800',
        ];

        return $colors[$this->role] ?? 'bg-gray-100 text-gray-800';
    }
}
