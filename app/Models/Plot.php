<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Properties;

class Plot extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'plots';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'plot_imgs',
        'plot_name',
        'properties_id',
        'users_id',
        'plot_address',
        'plot_number',
        'plot_coordinate',
        'plot_size',
        'status',
        'process',
        'active',
        'stage',
        'created_at',
        'updated_at',
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function Properties() {
        return $this->belongsTo(Properties::class);
    }

    protected $casts = [
        'plot_imgs' => 'array'
    ];
}
