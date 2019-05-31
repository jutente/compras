@extends('layouts.app')

@section('content')

<br>

<div class="container">
    <div class="card">
            <div class="card-header">
                <a href="{{route('compras.index')}}">Compras</a> - Novo Registro
            </div>
        <form method="POST" action="{{ route('compras.update', $compra->id)}}">
            @csrf
            @method('PUT')
                <div class="card-body">
                    <div class="form-row card-body col-md-12">
                        <div class="form-group col-md-4 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="tr_id">TR</label>
                                <select class="form-control" id="tr_id" name="tr_id" required>
                                    <option value="{{$compra->tr_id}}" selected="true">{{$compra->tr->tr}}</option>
                                    @foreach($trs as $t)
                                        <option value="{{$t->id}}">{{$t->tr}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="user">Usuario</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    <option value="{{$compra->user_id}}" selected="true">{{$compra->user->name}}</option>
                                    @foreach($users as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="form-row card-body col-md-12">

                        <div class="form-group col-md-3 {{ $errors->has('pac') ? ' has-error' : '' }}">
                                <label for="pac">PAC:</label>
                                   <input type="text" class="form-control" id="pac" name="pac" value="{{$compra->pac}}" required>
                                    @if ($errors->has('pac'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('pac')}}</strong>
                                        </span>
                                    @endif
                        </div>
                        <div class="form-group col-md-6 {{ $errors->has('modalidade') ? ' has-error' : '' }}">
                                <label for="modalidade">Modalidade:</label>
                                   <input type="text" class="form-control" id="modalidade" name="modalidade" value="{{$compra->modalidade}}" required>
                                    @if ($errors->has('modalidade'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('modalidade')}}</strong>
                                        </span>
                                    @endif
                        </div>
                        <div class="form-group col-md-3{{ $errors->has('cotacao') ? ' has-error' : '' }}">
                                <label for="cotacao">Data cotaçao:</label>
                                <input type="date" class="form-control" id="cotacao" name="cotacao" value="{{$compra->cotacao}}">
                                    @if ($errors->has('cotacao'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('cotacao')}}</strong>
                                        </span>
                                    @endif
                            </div>

                    </div>
                </div>
                <div id="accordion">

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseOne">
                                Reserva Orçamentaria.
                            </a>
                        </div>

                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="form-row card-body col-md-12">

                                    <div class="form-group col-md-3{{ $errors->has('reservaorcamentariainicio') ? ' has-error' : '' }}">
                                        <label for="reservaorcamentariainicio">Data envio:</label>
                                        <input type="date" class="form-control" id="reservaorcamentariainicio" name="reservaorcamentariainicio" value="{{$compra->reservaorcamentariainicio}}">
                                            @if ($errors->has('reservaorcamentariainicio'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('reservaorcamentariainicio')}}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="form-group col-md-3{{ $errors->has('reservaorcamentariafim') ? ' has-error' : '' }}">
                                        <label for="reservaorcamentariafim">Data retorno:</label>
                                        <input type="date" class="form-control" id="reservaorcamentariafim" name="reservaorcamentariafim"  value="{{$compra->reservaorcamentariafim}}">
                                            @if ($errors->has('reservaorcamentariafim'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('reservaorcamentariafim')}}</strong>
                                                </span>
                                            @endif
                                    </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                Mapa Sigma
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="form-row card-body col-md-12">

                                        <div class="form-group col-md-3{{ $errors->has('mapasigma') ? ' has-error' : '' }}">
                                            <label for="mapasigma">Data envio:</label>
                                            <input type="date" class="form-control" id="mapasigma" name="mapasigma" value="{{$compra->mapasigma}}">
                                                @if ($errors->has('mapasigma'))
                                                    <span class="help-block">
                                                        <strong>{{$errors->first('mapasigma')}}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                Autuaçao
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="form-row card-body col-md-12">

                                    <div class="form-group col-md-3{{ $errors->has('autuacao') ? ' has-error' : '' }}">
                                        <label for="autuacao">Data envio:</label>
                                        <input type="date" class="form-control" id="autuacao" name="autuacao" value="{{$compra->autuacao}}">
                                            @if ($errors->has('autuacao'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('autuacao')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapse4">
                                    Ordenador.
                                </a>
                            </div>
                            <div id="collapse4" class="collapse" data-parent="#accordion">
                                <div class="form-row card-body col-md-12">

                                        <div class="form-group col-md-3{{ $errors->has('ordenadorinicio') ? ' has-error' : '' }}">
                                            <label for="ordenadorinicio">Data envio:</label>
                                            <input type="date" class="form-control" id="ordenadorinicio" name="ordenadorinicio" value="{{$compra->ordenadorinicio}}">
                                                @if ($errors->has('ordenadorinicio'))
                                                    <span class="help-block">
                                                        <strong>{{$errors->first('ordenadorinicio')}}</strong>
                                                    </span>
                                                @endif
                                        </div>

                                        <div class="form-group col-md-3{{ $errors->has('ordenadorfim') ? ' has-error' : '' }}">
                                            <label for="ordenadorfim">Data retorno:</label>
                                            <input type="date" class="form-control" id="ordenadorfim" name="ordenadorfim" value="{{$compra->ordenadorfim}}">
                                                @if ($errors->has('ordenadorfim'))
                                                    <span class="help-block">
                                                        <strong>{{$errors->first('ordenadorfim')}}</strong>
                                                    </span>
                                                @endif
                                        </div>

                                </div>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapse5">
                                    COAF.
                                </a>
                            </div>
                            <div id="collapse5" class="collapse" data-parent="#accordion">
                                <div class="form-row card-body col-md-12">

                                        <div class="form-group col-md-3{{ $errors->has('coafinicio') ? ' has-error' : '' }}">
                                            <label for="coafinicio">Data envio:</label>
                                            <input type="date" class="form-control" id="coafinicio" name="coafinicio" value="{{$compra->coafinicio}}">
                                                @if ($errors->has('coafinicio'))
                                                    <span class="help-block">
                                                        <strong>{{$errors->first('coafinicio')}}</strong>
                                                    </span>
                                                @endif
                                        </div>

                                        <div class="form-group col-md-3{{ $errors->has('coaffim') ? ' has-error' : '' }}">
                                            <label for="coaffim">Data retorno:</label>
                                            <input type="date" class="form-control" id="coaffim" name="coaffim" value="{{$compra->coaffim}}">
                                                @if ($errors->has('coaffim'))
                                                    <span class="help-block">
                                                        <strong>{{$errors->first('coaffim')}}</strong>
                                                    </span>
                                                @endif
                                        </div>

                                </div>
                            </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse6">
                                E-mail.
                            </a>
                        </div>
                        <div id="collapse6" class="collapse" data-parent="#accordion">
                            <div class="form-row card-body col-md-12">

                                    <div class="form-group col-md-3{{ $errors->has('emailtrcontrato') ? ' has-error' : '' }}">
                                        <label for="emailtrcontrato">Data envio:</label>
                                        <input type="date" class="form-control" id="emailtrcontrato" name="emailtrcontrato" value="{{$compra->emailtrcontrato}}">
                                            @if ($errors->has('emailtrcontrato'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('emailtrcontrato')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse7">
                                Minuta.
                            </a>
                        </div>
                        <div id="collapse7" class="collapse" data-parent="#accordion">
                            <div class="form-row card-body col-md-12">

                                    <div class="form-group col-md-3{{ $errors->has('minutainicio') ? ' has-error' : '' }}">
                                        <label for="minutainicio">Data envio:</label>
                                        <input type="date" class="form-control" id="minutainicio" name="minutainicio" value="{{$compra->minutainicio}}">
                                            @if ($errors->has('minutainicio'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('minutainicio')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="form-group col-md-3{{ $errors->has('minutafim') ? ' has-error' : '' }}">
                                        <label for="minutafim">Data retorno:</label>
                                        <input type="date" class="form-control" id="minutafim" name="minutafim" value="{{$compra->minutafim}}">
                                            @if ($errors->has('minutafim'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('minutafim')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse8">
                                Juridico.
                            </a>
                        </div>
                        <div id="collapse8" class="collapse" data-parent="#accordion">
                            <div class="form-row card-body col-md-12">

                                    <div class="form-group col-md-3{{ $errors->has('juridicoinicio') ? ' has-error' : '' }}">
                                        <label for="juridicoinicio">Data envio:</label>
                                        <input type="date" class="form-control" id="juridicoinicio" name="juridicoinicio" value="{{$compra->juridicoinicio}}">
                                            @if ($errors->has('juridicoinicio'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('juridicoinicio')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="form-group col-md-3{{ $errors->has('juridicofim') ? ' has-error' : '' }}">
                                        <label for="juridicofim">Data retorno:</label>
                                        <input type="date" class="form-control" id="juridicofim" name="juridicofim" value="{{$compra->juridicofim}}">
                                            @if ($errors->has('juridicofim'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('juridicofim')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse9">
                                PGM.
                            </a>
                        </div>
                        <div id="collapse9" class="collapse" data-parent="#accordion">
                            <div class="form-row card-body col-md-12">

                                    <div class="form-group col-md-3{{ $errors->has('pgminicio') ? ' has-error' : '' }}">
                                        <label for="pgminicio">Data envio:</label>
                                        <input type="date" class="form-control" id="pgminicio" name="pgminicio" value="{{$compra->pgminicio}}">
                                            @if ($errors->has('pgminicio'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('pgminicio')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="form-group col-md-3{{ $errors->has('pgmfim') ? ' has-error' : '' }}">
                                        <label for="pgmfim">Data retorno:</label>
                                        <input type="date" class="form-control" id="pgmfim" name="pgmfim" value="{{$compra->pgmfim}}">
                                            @if ($errors->has('pgmfim'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('pgmfim')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse10">
                                Ratificaçao.
                            </a>
                        </div>
                        <div id="collapse10" class="collapse" data-parent="#accordion">
                            <div class="form-row card-body col-md-12">

                                    <div class="form-group col-md-3{{ $errors->has('preparoratificacao') ? ' has-error' : '' }}">
                                        <label for="preparoratificacao">Data preparo:</label>
                                        <input type="date" class="form-control" id="preparoratificacao" name="preparoratificacao" value="{{$compra->preparoratificacao}}">
                                            @if ($errors->has('preparoratificacao'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('preparoratificacao')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="form-group col-md-3{{ $errors->has('assinaturaratificacaoinicio') ? ' has-error' : '' }}">
                                        <label for="assinaturaratificacaoinicio">Data envio:</label>
                                        <input type="date" class="form-control" id="assinaturaratificacaoinicio" name="assinaturaratificacaoinicio" value="{{$compra->assinaturaratificacaoinicio}}">
                                            @if ($errors->has('assinaturaratificacaoinicio'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('assinaturaratificacaoinicio')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="form-group col-md-3{{ $errors->has('assinaturaratificacaofim') ? ' has-error' : '' }}">
                                        <label for="assinaturaratificacaofim">Data retorno:</label>
                                        <input type="date" class="form-control" id="assinaturaratificacaofim" name="assinaturaratificacaofim" value="{{$compra->assinaturaratificacaofim}}">
                                            @if ($errors->has('assinaturaratificacaofim'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('assinaturaratificacaofim')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="form-group col-md-3{{ $errors->has('publicacaoratificacao') ? ' has-error' : '' }}">
                                        <label for="publicacaoratificacao">Data publicaçao:</label>
                                        <input type="date" class="form-control" id="publicacaoratificacao" name="publicacaoratificacao" value="{{$compra->publicacaoratificacao}}">
                                            @if ($errors->has('publicacaoratificacao'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('publicacaoratificacao')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse11">
                                Conclusao.
                            </a>
                        </div>
                        <div id="collapse11" class="collapse" data-parent="#accordion">
                            <div class="form-row card-body col-md-12">

                                    <div class="form-group col-md-3{{ $errors->has('conclusao') ? ' has-error' : '' }}">
                                        <label for="conclusao">Data:</label>
                                        <input type="date" class="form-control" id="conclusao" name="conclusao" value="{{$compra->conclusao}}">
                                            @if ($errors->has('conclusao'))
                                                <span class="help-block">
                                                    <strong>{{$errors->first('conclusao')}}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            <br>
            <div class="card-footer">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Alterar
                            </button>
                    </div>
                </div>

                <a href="{{route('compras.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
            </div>
        </form>
    </div>
</div>
@endsection
