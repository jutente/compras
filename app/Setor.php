<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $fillable  = ['setor','centrocusto','superintendencia_id'];

    public function superintendencia()
    {
        return $this->belongsTo('App\Superintendencia');
    }

    public function setSetorAttribute($value)
    {
        $this->attributes['setor'] = mb_strtoupper($value);
    }
}
