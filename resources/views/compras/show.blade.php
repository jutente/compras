@extends('layouts.app')

@section('content')
<br>
<div class="container">

    <div class="card">
            <div class="card-header">
                <a href="{{route('compras.index')}}">TR</a> - Excluir Registro
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('compras.destroy', $compra->id) }}">
                    @csrf
                    @method('DELETE')

                    <div class="card-body">
                        <div class="form-row card-body col-md-12">
                            <div class="form-group col-md-4 {{ $errors->has('tr_id') ? ' has-error' : '' }}">
                                    <label for="tr_id">TR</label>
                                    <input type="text" class="form-control" id="tr_id" name="tr_id" value="{{$compra->tr->tr}}" readonly>
                                    @if ($errors->has('tr_id'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('tr_id')}}</strong>
                                            </span>
                                    @endif
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="user">Usuario</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$compra->user->name}}" readonly>
                                    @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('name')}}</strong>
                                            </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-row card-body col-md-12">

                            <div class="form-group col-md-3 {{ $errors->has('pac') ? ' has-error' : '' }}">
                                    <label for="pac">PAC:</label>
                                       <input type="text" class="form-control" id="pac" name="pac" value="{{$compra->pac}}" readonly>
                                        @if ($errors->has('pac'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('pac')}}</strong>
                                            </span>
                                        @endif
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('modalidade') ? ' has-error' : '' }}">
                                    <label for="modalidade">Modalidade:</label>
                                       <input type="text" class="form-control" id="modalidade" name="modalidade" value="{{$compra->modalidade}}" readonly>
                                        @if ($errors->has('modalidade'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('modalidade')}}</strong>
                                            </span>
                                        @endif
                            </div>
                            <div class="form-group col-md-3{{ $errors->has('cotacao') ? ' has-error' : '' }}">
                                    <label for="cotacao">Data cotaçao:</label>
                                    <input type="date" class="form-control" id="cotacao" name="cotacao" value="{{$compra->cotacao}}" readonly>
                                        @if ($errors->has('cotacao'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('cotacao')}}</strong>
                                            </span>
                                        @endif
                                </div>

                        </div>
                    </div>

            </div>

            <div class="card-footer">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-danger">
                            Excluir
                        </button>
                    </div>
                </div>

               </form>

                <a href="{{route('compras.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
            </div>
    </div>

</div>
@endsection
