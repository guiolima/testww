@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Preencha os Campos Abaixo:
					<a  class="pull-right" href="{{ url('clientes') }}">Lista</a>

				</div>
				<div class="panel-body">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif


					@if(Session::has('message_success'))
						<div class="alert alert-success">{{ Session::get('message_success') }}</div>
					@endif

					
					{!! Form::model($cliente, ['method' => 'PATCH', 'url' => 'clientes/' . $cliente->id]) !!}
				
						{!! Form::label('nome', 'Nome:') !!}
						{!! Form::input('text', 'nome' ,null, ['class'=>'form-control', 'autofocus']) !!}
						</br>
			
						{!! Form::label('email', 'E-mail:') !!}
						{!! Form::email('email' ,null, ['class'=>'form-control']) !!}
						</br>
		
						{!! Form::submit('Salvar', ['class'=>'btn btn-primary form-control']) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
