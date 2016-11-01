@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de Pedidos

				</div>
				<div class="panel-body">	
					@if(Session::has('message_success'))
					<div class="alert alert-success">{{ Session::get('message_success') }}</div>
				@endif

					@if(Session::has('message_fail'))
					<div class="alert alert-danger">{{ Session::get('message_fail') }}</div>
				@endif		
					<table class="table">
						<th>Número do Pedido</th>
						<th>Cliente</th>
						<th>Ações</th>

						<tbody>
							@foreach( $pedidos  as $pedido)
							<tr>
								<td>{{ $pedido->numero_pedido}}</td>
						 		<td>{{ $pedido->cliente->nome}}</td>
						 		<td>
									{!! Form::open(['method' => 'DELETE', 'url' => 'pedidos/' . $pedido->id, 'style' => 'display:  inline']) !!}
									<button type="submit" class="btn btn-default">Excluir</button>
									{!! Form::close() !!}
								</td>
							</tr>
							@endforeach 
						</tbody>
					</table>
					{!!$pedidos->render()!!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
