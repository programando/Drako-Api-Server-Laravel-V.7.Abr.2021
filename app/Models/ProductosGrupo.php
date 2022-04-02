<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use DB;
class ProductosGrupo extends Model
{
	protected $table = 'productos_grupos';
	protected $primaryKey = 'idgrupo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idgrupo' => 'int',
		'inactivo' => 'bool'
	];

	protected $fillable = [
		'nomgrupo',
		'prefijo',
		'inactivo'
	];

	
	public static function getGruposConProductos () { 
		return DB::select('call api_productos_grupos_con_productos_asignados()' );
	}


	public function productos()	{
		return $this->hasMany(Producto::class, 'idgrupo');
	}



	

}
