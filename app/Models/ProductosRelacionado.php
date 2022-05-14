<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\StringsHelper;


class ProductosRelacionado extends Model
{
	protected $table = 'productos_relacionados';
	protected $primaryKey = 'idregistro';
	public $timestamps = false;

	protected $casts = [
		'idproducto' => 'int',
		'idproducto_dt' => 'int'
	];

	protected $fillable = [
		'idprdcto_ppal',
		'idproducto',
		'idproducto_dt',
		'codproducto',
		'nombre_impreso',
		'idmd5'
	];

	public function getNombreImpresoAttribute( $value ){
		return StringsHelper::InicialMayuscula ($value);
	}

	public function imagenes()
	{
		return $this->hasMany(ProductosImagene::class, 'idproducto', 'idproducto');
	}
}
