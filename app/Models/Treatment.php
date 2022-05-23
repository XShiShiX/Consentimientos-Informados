<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $dates = [
        'fechacreacion', 'fechamodificacion','fechanacimientotutor'
    ];

    public function consents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Consent', 'documentotratamiento', 'id');
    }
}
