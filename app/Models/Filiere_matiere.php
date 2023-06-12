<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere_matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'filiere_id',
        'matiere_id',
        'credit',
        'masse',
    ];
}
