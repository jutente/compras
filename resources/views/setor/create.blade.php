@extends('layouts.app')

@section('content')
<br>
<div class="container">

    <div class="card">
            <div class="card-header">
                <a href="{{route('setor.index')}}">Setor</a> - Novo Registro
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('setor.store') }}">
                    @csrf

                    <!-- setor -->
                    <div class="form-group col-md-8 {{ $errors->has('setor') ? ' has-error' : '' }}">
                        <label for="setor">setor:</label>
                           <input type="text" class="form-control" id="setor" name="setor" placeholder="setor..." required>
                            @if ($errors->has('setor'))
                                <span class="help-block">
                                    <strong>{{$errors->first('setor')}}</strong>
                                </span>
                            @endif
                    </div>

                    <!-- centrocusto  -->
                    <div class="form-group col-md-6 {{ $errors->has('centrocusto') ? ' has-error' : '' }}">
                        <label for="centrocusto">Centro de custo:</label>
                            <input type="text" class="form-control" id="centrocusto" name="centrocusto" placeholder="centro de custo..." required>
                            @if ($errors->has('centrocusto'))
                                <span class="help-block">
                                    <strong>{{$errors->first('centrocusto')}}</strong>
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

                <a href="{{route('setor.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
            </div>
    </div>

</div>
@endsection
