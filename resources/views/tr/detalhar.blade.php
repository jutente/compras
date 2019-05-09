@extends('layouts.app')

@section('content')
<br>
<div class="container">

    <div class="card">
            <div class="card-header">
                <a href="{{route('tr.index')}}">TR</a> - Detalhes do Registro
            </div>

            <div class="card-body">

                    <!-- tr -->
                    <div class="form-group col-md-8 {{ $errors->has('tr') ? ' has-error' : '' }}">
                        <label for="tr">TR:</label>
                           <input type="text" class="form-control" id="tr" name="tr" value="{{$tr->tr}}" readonly>
                            @if ($errors->has('tr'))
                                <span class="help-block">
                                    <strong>{{$errors->first('tr')}}</strong>
                                </span>
                            @endif
                    </div>

                    <!-- objeto  -->
                    <div class="form-group col-md-8 {{ $errors->has('objeto') ? ' has-error' : '' }}">
                        <label for="objeto">Objeto:</label>
                            <textarea class="form-control" id="objeto" name="objeto" rows="3" readonly>{{$tr->objeto}}</textarea>
                            @if ($errors->has('objeto'))
                                <span class="help-block">
                                    <strong>{{$errors->first('objeto')}}</strong>
                                </span>
                            @endif
                    </div>

                    <!-- superintendencia  -->
                    <div class="form-group col-md-8 {{ $errors->has('superintendencia') ? ' has-error' : '' }}">
                            <label for="superintendencia">Superintendencia</label>
                            <input type="text" class="form-control" id="superintendencia_id" name="superintendencia_id" value="{{$tr->superintendencia->superintendencia}}" readonly>
                            @if ($errors->has('tr'))
                                <span class="help-block">
                                    <strong>{{$errors->first('tr')}}</strong>
                                </span>
                            @endif
                    </div>

                     <!-- setor   -->
                     <div class="form-group col-md-8 {{ $errors->has('setor') ? ' has-error' : '' }}">
                        <label for="setor">Setor</label>
                        <input type="text" class="form-control" id="setor_id" name="setor_id" value="{{$tr->setor->setor}}" readonly>
                        @if ($errors->has('setor'))
                        <span class="help-block">
                            <strong>{{$errors->first('setor')}}</strong>
                        </span>
                        @endif
                    </div>

                    <!-- user  -->
                    <div class="form-group col-md-8 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="user">Usuario</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" value="{{$tr->user->name}}" readonly>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                            @endif
                    </div>

                    <!-- observacao  -->
                    <div class="form-group col-md-8 {{ $errors->has('observacao') ? ' has-error' : '' }}">
                        <label for="observacao">Observaçao:</label>
                            <textarea class="form-control" id="observacao" name="observacao" rows="3" readonly>{{$tr->observacao}}</textarea>
                            @if ($errors->has('observacao'))
                                <span class="help-block">
                                    <strong>{{$errors->first('observacao')}}</strong>
                                </span>
                            @endif
                    </div>

            </div>

            <div class="card-footer">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                         <a href="{{route('tr.index')}}" class="btn btn-primary" role="button">Voltar</a>
                    </div>
                </div>


                <a href="{{route('tr.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
            </div>
    </div>

</div>
@endsection
