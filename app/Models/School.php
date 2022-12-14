<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'address'
    ];

    public function pupils()
    {
        return $this->hasMany(Pupil::class);
    }
}
