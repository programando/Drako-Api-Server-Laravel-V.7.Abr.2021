<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Helpers\StringsHelper;
use Illuminate\Database\Eloquent\Model;


class ProductosVenta extends Model
{
	protected $table = 'productos_ventas';
	protected $primaryKey = 'idregistro';
	public $timestamps = false;

	protected $casts = [
		'idproducto' => 'int'
	];

	protected $fillable = [
		'idproducto',
		'idproducto_dt',
		'codproducto',
		'nombre_impreso'
	];

  public function getNombreImpresoAttribute( $value ){
		return StringsHelper::InicialMayuscula ($value);
	}


	public function imagenes(){
		return $this->belongsTo(ProductosImagene::class, 'idproducto', 'idproducto');
	}
}
