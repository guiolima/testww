<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $fillable = ['numero_pedido', 'cliente_id'];

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }
}
