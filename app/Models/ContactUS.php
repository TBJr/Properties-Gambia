<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ContactUS extends Model
{
    use HasFactory, Notifiable, HasRoles;

    public $table = 'contactus';

    public $fillable = ['name', 'email', 'subject', 'message'];
}
