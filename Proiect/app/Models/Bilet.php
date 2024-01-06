<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilet extends Model
{
    use HasFactory;
    protected $table = 'bilete';
   
    protected $fillable = [
        'tip', 'pret', 'disponibilitate', 'id_eveniment','id_user'
    ];
}
