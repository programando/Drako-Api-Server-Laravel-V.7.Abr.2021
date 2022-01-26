<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

 
class OrdenesCompra extends Model
{
	protected $table = 'ordenes_compra';
	protected $primaryKey = 'idregistro';
	public $timestamps = false;

	protected $casts = [
		'cantidad' => 'float',
		'vr_unitario' => 'float',
		'vr_item' => 'float',
		'sub_total' => 'float',
		'iva' => 'float',
		'total' => 'float',
		'enviada' => 'bool'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'numero',
		'proveedor',
		'email_asesor',
		'email_proveedor',
		'fecha',
		'producto',
		'cantidad',
		'vr_unitario',
		'vr_item',
		'sub_total',
		'iva',
		'total',
		'observaciones',
		'enviada'
	];

	public static function scopegetOrdenesCompraInformarProveedor(  $query ) {
		return  $query->where('enviada','0')->get();
	}

	public function getEmailAsesorAttribute ( $value ){
			return  trim($value);
	}
		public function getProveedorAttribute ( $value ){
				return    trim($value);
	}
	public function getEmailProveedorAttribute ( $value ){
				return    trim($value);
	}
				public function getObservacionesAttribute ( $value ){
				return    trim($value);
	}

}
