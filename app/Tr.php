<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tr extends Model
{
    protected $fillable  = ['tr','objeto','observacao','superintendencia_id','setor_id','user_id'];

    public function superintendencia()
    {
        return $this->belongsTo('App\Superintendencia');
    }

    public function setor()
    {
        return $this->belongsTo('App\Setor');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
