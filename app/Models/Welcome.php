<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Welcome extends Model
{
    use HasFactory;

    public $table = 'welcome';

    public function plots() {
        return $this->hasMany(Plot::class);
    }
}
