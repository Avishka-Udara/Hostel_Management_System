<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['Room_No', 'no_of_bed'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
