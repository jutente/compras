@extends('layouts.app')

@section('content')
<div class="container-fluid">
<br>
	        {{-- avisa se um usuario foi excluido --}}
	        @if(Session::has('deleted_tr'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Info!</strong> {{ session('deleted_tr') }}
                </div>
	        @endif
	        {{-- avisa quando um usuário foi modificado --}}
	        @if(Session::has('create_tr'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Info!</strong> {{ session('create_tr') }}
                </div>
            @endif
<br>
	        <div class="card">
	            <div class="card-header">
					<div class="row">
					  <div class="col-sm-4">
                        TR
					  </div>
					  <div class="col-sm-8 text-right">
                        <div class="btn-group btn-group-sm">
							<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modalFilter"><i class="fas fa-filter"></i> Filtrar</button>
							<a href="{{route('tr.create')}}" class="btn btn-primary">Novo Registro</a>
					  	</div>
					  </div>
					</div>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>TR</th>
                                <th>Objeto</th>
                                <th>Superintendencia</th>
                                <th>Setor</th>
                                <th>Usuario</th>
                                <th>Observaçao</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($tr as $p)
                                <tr>
                                    <td>{{$p->tr}}</td>
                                    <td data-toggle="tooltip" title="{{$p->objeto}}">{{substr($p->objeto,0,30)}}</td>
                                    <td>{{$p->superintendencia->superintendencia}}</td>
                                    <td>{{$p->setor->setor}}</td>
                                    <td>{{$p->user->name}}</td>
                                    <td data-toggle="tooltip" title="{{$p->observacao}}">{{substr($p->observacao,0,30)}}</td>

                                    <td style="text-align: right">
                                        <div class="btn-group">
                                            <a href="{{route('tr.detalhar',$p->id)}}" class="btn btn-info btn-sm" role="button">Detalhar</a>
                                            <a href="{{route('tr.edit',$p->id)}}" class="btn btn-primary btn-sm" role="button">Alterar</a>
                                            <a href="{{route('tr.show',$p->id)}}" class="btn btn-danger btn-sm" role="button">Excluir</a>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row text-center pagination justify-content-center">
                        {{$tr->links()}}
                    </div>
                </div>
    </div>
</div>

<!-- Janela de filtragem da consulta -->
<div class="modal fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="JanelaFiltro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-filter"></i> Filtro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="GET" action="{{ route('tr.index') }}">
            <div class="modal-body">
                <!-- Filtragem dos dados -->

                    <div class="form-group col-md-8">
                        <label for="tr">TR:</label>
                        <input type="text" class="form-control" id="tr" name="tr">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary text-left"><i class="fas fa-search"></i>Filtrar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i>Fechar</button>
            </div>

        </form>
      </div>
    </div>
  </div>
@endsection
