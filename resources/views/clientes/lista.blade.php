@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de Clientes

				</div>
				<div class="panel-body">
					@if(Session::has('message_success'))
					<div class="alert alert-success">{{ Session::get('message_success') }}</div>
				@endif

					@if(Session::has('message_fail'))
					<div class="alert alert-danger">{{ Session::get('message_fail') }}</div>
				@endif
					<table class="table">
						<th>Nome</th>
						<th>E-mail</th>
						<th>Ações</th>
						<tbody>
							@foreach( $clientes  as $cliente)
							<tr>
								<td>{{ $cliente->nome}}</td>
								<td>{{ $cliente->email}}</td>
								<td>
									<a href="/clientes/{{ $cliente->id }}/editar" class="btn btn-default">Editar</a>
									{!! Form::open(['method' => 'DELETE', 'url' => 'clientes/' . $cliente->id, 'style' => 'display:  inline']) !!}
									<button type="submit" class="btn btn-default">Excluir</button>
									{!! Form::close() !!}
								</td>
							</tr>
							@endforeach 
						</tbody>
					</table>
					{!!$clientes->render()!!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
