<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consent extends Model
{
    use HasFactory;

    protected $dates = [
        'fechahora',
    ];

    protected $fillable = ['cliente', 'nombrecompleto', 'fechahora', 'documentotratamiento', 'texto'];

    public function client(){
        return $this->hasOne('App\Model\Client', 'id', 'cliente');
    }

    public function treatment(){
        return $this->hasOne('App\Model\Treatment', 'id', 'documentotratamiento');
    }
}

