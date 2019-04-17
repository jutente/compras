@extends('layouts.app')

@section('content')
<br>
<div class="container">

    <div class="card">
            <div class="card-header">
                <a href="{{route('tr.index')}}">TR</a> - Novo Registro
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('tr.store') }}">
                    @csrf

                    <!-- tr -->
                    <div class="form-group col-md-8 {{ $errors->has('tr') ? ' has-error' : '' }}">
                        <label for="tr">TR:</label>
                           <input type="text" class="form-control" id="tr" name="tr" placeholder="tr..." required>
                            @if ($errors->has('tr'))
                                <span class="help-block">
                                    <strong>{{$errors->first('tr')}}</strong>
                                </span>
                            @endif
                    </div>

                    <!-- objeto  -->
                    <div class="form-group col-md-8 {{ $errors->has('objeto') ? ' has-error' : '' }}">
                        <label for="objeto">Objeto:</label>
                            <textarea class="form-control" id="objeto" name="objeto" placeholder="Objeto..." rows="3" required></textarea>
                            @if ($errors->has('objeto'))
                                <span class="help-block">
                                    <strong>{{$errors->first('objeto')}}</strong>
                                </span>
                            @endif
                    </div>

                    <!-- superintendencia  -->
                    <div class="form-group col-md-8 {{ $errors->has('superintendencia') ? ' has-error' : '' }}">
                        <label for="superintendencia">Superintendencia</label>
                        <select class="form-control" id="superintendencia_id" name="superintendencia_id" required>
                            <option value="" selected="true">Selecione ...</option>
                            @foreach($superintendencias as $s)
                                <option value="{{$s->id}}">{{$s->superintendencia}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- setor   -->
                    <div class="form-group col-md-8 {{ $errors->has('setor') ? ' has-error' : '' }}">
                            <label for="setor">Setor</label>
                            <select class="form-control" id="setor_id" name="setor_id" required>
                                <option value="" selected="true">Selecione ...</option>
                                @foreach($setors as $s)
                                    <option value="{{$s->id}}">{{$s->setor}}</option>
                                @endforeach
                            </select>
                    </div>

                    <!-- user  -->
                    <div class="form-group col-md-8 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="user">Usuario</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="" selected="true">Selecione ...</option>
                                @foreach($users as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                    </div>

                    <!-- observacao  -->
                    <div class="form-group col-md-8 {{ $errors->has('observacao') ? ' has-error' : '' }}">
                        <label for="observacao">Observaçao:</label>
                            <textarea class="form-control" id="observacao" name="observacao" placeholder="observaçao..." rows="3" required></textarea>
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
                            <button type="submit" class="btn btn-primary">
                                Incluir
                            </button>
                    </div>
                </div>

               </form>

                <a href="{{route('tr.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
            </div>
    </div>

</div>
@endsection
