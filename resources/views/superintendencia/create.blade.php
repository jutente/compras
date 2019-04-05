@extends('layouts.app')

@section('content')
<br>
<div class="container">

    <div class="card">
            <div class="card-header">
                <a href="{{route('setor.index')}}">setor</a> - Novo Registro
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('superintendencia.store') }}">
                            @csrf

                    <!-- superintendencia -->

                    <div class="form-group {{ $errors->has('superintendencia') ? ' has-error' : '' }}">
                        <label for="superintendencia">Superintendencia:</label>
                        <div class="col-md-8">
                           <input type="text" class="form-control" id="superintendencia" placeholder="superintendencia.." required>
                            @if ($errors->has('superintendencia'))
                                <span class="help-block">
                                    <strong>{{$errors->first('superintendencia')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- centrocusto  -->
                    <div class="form-group {{ $errors->has('centrocusto') ? ' has-error' : '' }}">
                        <label for="centrocusto">Centro de custo:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="centrocusto" placeholder="centro de cust..." required>
                            @if ($errors->has('centrocusto'))
                                <span class="help-block">
                                    <strong>{{$errors->first('centrocusto')}}</strong>
                                </span>
                            @endif
                        </div>
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

                <a href="{{route('superintendencia.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
            </div>
    </div>

</div>
@endsection
