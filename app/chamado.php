<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;


class chamado extends Model
{
    protected $fillable = ['titulo', 'descricao','cliente_id','pedido_id'];

	protected function formatValidationErrors(Validator $validator)
	{
		return $validator->errors()->all();
	}

	public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }

    public function pedido()
    {
    	return $this->belongsTo('App\Pedido');
    }

    public function scopeSearch($query, $email, $nome, $pedido)
    {
        if($nome){
        return  $query->where('cliente_id', 'LIKE', "%$nome%");            
        }

        if($email){
        return  $query->where('cliente_id', 'LIKE', "%$email%");            
        }

        if($pedido){
        return  $query->where('pedido_id', 'LIKE', "%$pedido%");            
        }
    }
}
