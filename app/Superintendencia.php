<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superintendencia extends Model
{
    protected $fillable = ['superintendencia','centrocusto'];

    public function setSuperintendenciaAttribute($value)
    {
        $this->attributes['superintendencia'] = mb_strtoupper($value);
    }
}
