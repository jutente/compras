@extends('layouts.app')

@section('content')
<div class="container-fluid">
<br>
	        {{-- avisa se um usuario foi excluido --}}
	        @if(Session::has('deleted_compra'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Info!</strong> {{ session('deleted_compra') }}
                </div>
	        @endif
	        {{-- avisa quando um usuário foi modificado --}}
	        @if(Session::has('create_compra'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Info!</strong> {{ session('create_compra') }}
                </div>
            @endif
<br>
	        <div class="card">
	            <div class="card-header">
					<div class="row">
					  <div class="col-sm-4">
                        Compras
					  </div>
					  <div class="col-sm-8 text-right">
                        <div class="btn-group btn-group-sm">
							<a href="#"  class="btn btn-primary">Filtro</a>
							<a href="{{route('compras.create')}}" class="btn btn-primary">Novo Registro</a>
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
                                <th>PAC</th>
                                <th>Modalidade</th>
                                <th>Responsavel</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($compra as $p)
                                <tr>
                                    <td>{{$p->tr->tr}}</td>
                                    <td>{{$p->pac}}</td>
                                    <td>{{$p->modalidade}}</td>
                                    <td>{{$p->user->name}}</td>

                                    <td style="text-align: right">
                                        <div class="btn-group">
                                            <a href="{{route('compras.edit',$p->id)}}" class="btn btn-primary btn-sm" role="button">Alterar</a>
                                            <a href="{{route('compras.show',$p->id)}}" class="btn btn-danger btn-sm" role="button">Excluir</a>
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
                        {{$compra->links()}}
                    </div>
                </div>
    </div>
</div>

@endsection
