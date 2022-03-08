<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $idregistro
 * @property int|null $idgrupo
 * @property int|null $idproducto
 * @property int|null $idproducto_dt
 * @property string|null $codproducto
 * @property string|null $cod_oem
 * @property string|null $nombre_tecnico
 * @property string|null $nombre_popular
 * @property string|null $nombre_otros
 * @property string|null $nombre_impreso
 * @property string|null $medida_diametro
 * @property string|null $medida_largo
 * @property string|null $medida_alto
 * @property string|null $medida_ancho
 * @property string|null $medida_interna
 * @property string|null $medida_externa
 * @property float|null $peso_kg
 * @property string|null $vehiculos
 * @property float|null $precio_base
 * @property float|null $precio_oferta
 * @property float|null $iva
 * @property int|null $horas_reserva
 * @property string|null $tags
 * @property bool|null $inactivo
 * 
 * @property ProductosGrupo|null $productos_grupo
 * @property ProductosImagene|null $productos_imagene
 * @property Collection|ProductosImagene[] $productos_imagenes
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';
	protected $primaryKey = 'idregistro';
	public $timestamps = false;

	protected $casts = [
		'idgrupo' => 'int',
		'idproducto' => 'int',
		'idproducto_dt' => 'int',
		'peso_kg' => 'float',
		'precio_base' => 'float',
		'precio_oferta' => 'float',
		'iva' => 'float',
		'horas_reserva' => 'int',
		'inactivo' => 'bool'
	];

	protected $fillable = [
		'idgrupo',
		'idproducto',
		'idproducto_dt',
		'codproducto',
		'cod_oem',
		'nombre_tecnico',
		'nombre_popular',
		'nombre_otros',
		'nombre_impreso',
		'medida_diametro',
		'medida_largo',
		'medida_alto',
		'medida_ancho',
		'medida_interna',
		'medida_externa',
		'peso_kg',
		'vehiculos',
		'precio_base',
		'precio_oferta',
		'iva',
		'horas_reserva',
		'tags',
		'inactivo'
	];

	public function grupos()
	{
		return $this->belongsTo(ProductosGrupo::class, 'idgrupo');
	}



	public function imagenes()
	{
		return $this->hasMany(ProductosImagene::class, 'idproducto', 'idproducto');
	}
}
