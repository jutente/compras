@extends('layouts.app')

@section('content')
<div class="container-fluid">

	        {{-- avisa se um usuario foi excluido --}}
	        @if(Session::has('deleted_setor'))
	        <div class="alert alert-info">
	            <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('deleted_setor') }}
	        </div>
	        @endif
	        {{-- avisa quando um usuário foi modificado --}}
	        @if(Session::has('create_setor'))
	        <div class="alert alert-info">
	            <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('create_setor') }}
	        </div>
            @endif
<br>
	        <div class="card">
	            <div class="card-header">
					<div class="row">
					  <div class="col-sm-4">
					  	Setores
					  </div>
					  <div class="col-sm-6 text-right">
                        <div class="btn-group btn-group-sm">
							<a href="#">Filtro</a>
							<a href="{{route('superintendencia.create')}}" class="btn btn-primary">Novo Registro</a>
					  	</div>
					  </div>
					</div>
				</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Superintendencia</th>
                                <th>Centro de Custo</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($superintendencias as $p)
                                <tr>
                                    <td>{{$p->superintendencia}}</td>
                                    <td>{{$p->centrocusto}}</td>

                                    <td style="text-align: right">
                                        <div class="btn-group">
                                            <a href="{{route('superintendencia.edit',$p->id)}}" class="btn btn-primary btn-sm" role="button">Alterar</a>
                                            <a href="{{route('superintendencia.show',$p->id)}}" class="btn btn-danger btn-sm" role="button">Excluir</a>
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
                        {{$superintendencias->links()}}
                    </div>
                </div>
    </div>
</div>

@endsection
