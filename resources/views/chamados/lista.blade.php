@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de Chamados
				<a  class="pull-right" href="{{ url('chamados/criar') }}">Criar</a>

				</div>
				<div class="panel-body">
					@if(Session::has('message_success'))
					<div class="alert alert-success">{{ Session::get('message_success') }}</div>
				@endif
					<table class="table">
						<th>E-mail </th>
						<th>Número do Pedido</th>
						<th>Ações</th>
						<tbody>
						<tr>
								
								<td>
									{!! Form::open (['url' => 'chamados', 'method' => 'GET'])!!}
										

										<div class="form-group">
										
										<select class="form-control" name="email" onchange='this.form.submit()'>
											<option value="0">Selecionar</option>
											<option value="">Todos</option>

										@foreach($clientes as $cliente)
											<option value="{{$cliente->id}}">{{$cliente->email}}</option>
											@endforeach
										</select>
									</div>
									{!! Form::close() !!}
								</td>
								<td>
									{!! Form::open (['url' => 'chamados', 'method' => 'GET'])!!}
										

										<div class="form-group">
										
										<select class="form-control" name="pedido" onchange='this.form.submit()'>
										<option value="0">Selecionar</option>
											<option value="">Todos</option>
										@foreach($pedidos as $pedido)
											<option value="{{$pedido->id}}">{{$pedido->numero_pedido}}</option>
											@endforeach
										</select>
										
									</div>
									{!! Form::close() !!}
								</td>
								<td></td>
								
							</tr>
							@foreach( $chamados  as $chamado)
							<tr>
								<td>{{ $chamado->cliente->email}}</td>
								<td>{{ $chamado->pedido->numero_pedido}}</td>

								<td>
								<a href="/chamados/{{ $chamado->id }}/ver" class="btn btn-default">Ver</a>
									{!! Form::open(['method' => 'DELETE', 'url' => 'chamados/' . $chamado->id, 'style' => 'display:  inline']) !!}
										<button type="submit" class="btn btn-default">Excluir</button>
									{!! Form::close() !!}
								</td>
							</tr>
							@endforeach 
						</tbody>
					</table>
					{!!$chamados->render()!!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
