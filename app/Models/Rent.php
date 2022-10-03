<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class, 'vehicles_id');
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
