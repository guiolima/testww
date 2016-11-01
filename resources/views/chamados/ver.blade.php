@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Detalhe do Chamado
					<a  class="pull-right" href="{{ url('chamados') }}">Voltar</a>

				</div>
				<div class="panel-body">
				<h1> {{$chamado->titulo}}</h1>
				<div class="content">
					<div class="" >						
						<b>Nome:</b>
						<p>{{ $chamado->cliente->nome}}</p>
						<br/>
					</div>
					<div class="" >
						<b>E-mail:</b>
						<p>{{ $chamado->cliente->email}}</p>
						<br/>
						
					</div>
					<div class="" >
						<b>Número do pedido:</b>
						<p>{{ $chamado->pedido->numero_pedido}}</p>
						<br/>
						
					</div>
					<div class="panel" >						
						<h2>Descrição:</h2>
					<hr>

						<p>{{ $chamado->descricao}}</p>
						<br/>
					
					</div>
				</div>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
