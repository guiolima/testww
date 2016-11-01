<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;


class cliente extends Model
{
	protected $fillable = ['nome', 'email'];

	protected function formatValidationErrors(Validator $validator)
	{
		return $validator->errors()->all();
	}

	public function pedidos()
	{
		return $this->hasMany('App\Pedido');
	}

	public function chamados()
	{
		return $this->hasMany('App\Chamado');
	}
}
