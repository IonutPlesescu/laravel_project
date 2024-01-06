<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eveniment extends Model
{
    use HasFactory;
    protected $table = 'evenimente';
   
    protected $fillable = [
        'nume', 'descriere', 'data', 'locatie', 'pret', 'adresa', 'telefon', 'email',
    ];

 
}
