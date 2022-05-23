<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consent;

class Client extends Model
{
    use HasFactory;

protected $primaryKey = 'id';
protected $table = 'clients';
protected $fillable = [
    'nombrecompleto',
    'direccion',
    'poblacion',
    'provincia',
    'pais',
    'numeroid',
    'fechanacimiento',
    'usuariocreador',
    'fechacreacion',
    'fechamodificacion',
    'ultimocreador',

];

    protected $dates = [
        'fechacreacion', 'fechanacimiento', 'fechamodificacion'
    ];

    protected $casts = [
        'created_at' => 'date:y-m-d',
        'update_at' => 'date:y-m-d'
    ];

    public function consents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Consent', 'cliente', 'id');

    }
}
