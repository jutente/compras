@extends('layouts.app')

@section('content')
<br>
<div class="container">

    <div class="card">
            <div class="card-header">
                <a href="{{route('superintendencia.index')}}">Superintendencia</a> - Alterar Registro
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('superintendencia.update', $superintendencia->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- superintendencia -->

                    <div class="form-group col-md-8 {{ $errors->has('superintendencia') ? ' has-error' : '' }}">
                        <label for="superintendencia">Superintendencia:</label>
                           <input type="text" class="form-control" id="superintendencia" name="superintendencia" value="{{$superintendencia->superintendencia}}" required>
                            @if ($errors->has('superintendencia'))
                                <span class="help-block">
                                    <strong>{{$errors->first('superintendencia')}}</strong>
                                </span>
                            @endif
                    </div>

                    <!-- centrocusto  -->
                    <div class="form-group col-md-6 {{ $errors->has('centrocusto') ? ' has-error' : '' }}">
                        <label for="centrocusto">Centro de custo:</label>
                            <input type="text" class="form-control" id="centrocusto" name="centrocusto" value="{{$superintendencia->centrocusto}}" required>
                            @if ($errors->has('centrocusto'))
                                <span class="help-block">
                                    <strong>{{$errors->first('centrocusto')}}</strong>
                                </span>
                            @endif
                    </div>

            </div>

            <div class="card-footer">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Alterar
                            </button>
                    </div>
                </div>

               </form>

                <a href="{{route('superintendencia.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
            </div>
    </div>

</div>
@endsection
