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
							<a href="#"  class="btn btn-primary">Filtro</a>
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

@endsection
