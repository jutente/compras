<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [ 'pac','modalidade','cotacao','reservaorcamentariainicio','reservaorcamentariafim','mapasigma','autuacao','ordenadorinicio',
                            'ordenadorfim','coafinicio','coaffim','emailtrcontrato','minutainicio','minutafim','juridicoinicio','juridicofim','pgminicio',
                            'pgmfim','preparoratificacao','assinaturaratificacaoinicio','assinaturaratificacaofim','publicacaoratificacao','conclusao','observacao',
                            'user_id','tr_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tr()
    {
        return $this->belongsTo('App\Tr');
    }
}
