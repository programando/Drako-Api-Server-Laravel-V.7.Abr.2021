<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

 
class Pedido extends Model
{
	protected $table = 'pedidos';
	protected $primaryKey = 'idpedido';
	public $timestamps = false;

	protected $casts = [
		'idtercero' => 'int',
		'horas_reserva' => 'int',
		'subtotal' => 'float',
		'iva' => 'float',
		'flete' => 'float',
		'total' => 'float'
	];

	protected $dates = [
		'fcha_pedido',
		'fcha_fin_reserva'
	];

	protected $fillable = [
		'idtercero',
		'fcha_pedido',
		'horas_reserva',
		'fcha_fin_reserva',
		'subtotal',
		'iva',
		'flete',
		'total'
	];

	public function pedidos_dts()
	{
		return $this->hasMany(PedidosDt::class, 'idpedido');
	}
}
