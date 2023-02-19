<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 
class PedidosDt extends Model
{
	protected $table = 'pedidos_dt';
	protected $primaryKey = 'idpedido_dt';
	public $timestamps = false;

	protected $casts = [
		'idpedido' => 'int',
		'idproducto' => 'int',
		'idproducto_dt' => 'int',
		'cantidad' => 'int',
		'precioUnitario' => 'float',
		'iva' => 'float',
		'subtotal' => 'float',
		'total' => 'float'
	];

	protected $fillable = [
		'idpedido',
		'idproducto',
		'idproducto_dt',
		'cantidad',
		'precioUnitario',
		'iva',
		'vr_iva',
		'subtotal',
		'total'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'idpedido');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'idproducto', 'idproducto');
	}
	
}
