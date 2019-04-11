@extends('layouts.app')

@section('content')
<div class="container-fluid">
<br>
	        {{-- avisa se um usuario foi excluido --}}
	        @if(Session::has('deleted_setor'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Info!</strong> {{ session('deleted_setor') }}
                </div>
	        @endif
	        {{-- avisa quando um usuário foi modificado --}}
	        @if(Session::has('create_setor'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Info!</strong> {{ session('create_setor') }}
                </div>
            @endif
<br>
	        <div class="card">
	            <div class="card-header">
					<div class="row">
					  <div class="col-sm-4">
                        Setor
					  </div>
					  <div class="col-sm-8 text-right">
                        <div class="btn-group btn-group-sm">
							<a href="#"  class="btn btn-primary">Filtro</a>
							<a href="{{route('setor.create')}}" class="btn btn-primary">Novo Registro</a>
					  	</div>
					  </div>
					</div>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Setor</th>
                                <th>Centro de Custo</th>
                                <th>Superintendencia</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($setor as $p)
                                <tr>
                                    <td>{{$p->setor}}</td>
                                    <td>{{$p->centrocusto}}</td>
                                    <td>{{$p->superintendencia->superintendencia}}</td>

                                    <td style="text-align: right">
                                        <div class="btn-group">
                                            <a href="{{route('setor.edit',$p->id)}}" class="btn btn-primary btn-sm" role="button">Alterar</a>
                                            <a href="{{route('setor.show',$p->id)}}" class="btn btn-danger btn-sm" role="button">Excluir</a>
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
                        {{$setor->links()}}
                    </div>
                </div>
    </div>
</div>

@endsection
