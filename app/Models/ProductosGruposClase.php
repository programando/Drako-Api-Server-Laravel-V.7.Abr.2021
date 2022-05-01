<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\StringsHelper;

class ProductosGruposClase extends Model
{
	protected $table = 'productos_grupos_clases';
	protected $primaryKey = 'id_clase_grupo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_clase_grupo' => 'int',
		'inactivo' => 'bool'
	];

	protected $fillable = [
		'nom_clase_grupo',
		'inactivo'
	];

	public function getNomClaseGrupoAttribute( $value ){
		return  StringsHelper::InicialMayuscula ($value);
	}

	public function Grupos(){
		return $this->hasMany(ProductosGrupo::class, 'id_clase_grupo');
	}

}
