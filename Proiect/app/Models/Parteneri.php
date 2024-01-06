<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parteneri extends Model
{
    use HasFactory;
    protected $table = 'parteneri';
   
    protected $fillable = [
        'nume', 'logo', 'tip_partener', 'email',
    ];
}
