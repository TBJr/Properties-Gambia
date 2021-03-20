<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Plot;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'properties';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'property_name',
        'property_address',
        'property_coordinate',
        'property_size',
        'property_imgs',
        'descripton',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'property_imgs' => 'array'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function plots() {
        return $this->hasMany(Plot::class);
    }
}
