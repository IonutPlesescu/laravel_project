<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomAdmin extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    
    protected $table = 'admins';
   
    protected $fillable = [
        'username', 'parola', 'email', 'numar_de_telefon','remember_token',
    ];
    use HasFactory;
}
