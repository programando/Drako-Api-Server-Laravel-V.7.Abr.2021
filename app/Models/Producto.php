<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use App\Helpers\StringsHelper;

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

	protected $fillable = [ 		'idgrupo', 		'idproducto',  		'idproducto_dt',  		'codproducto', 		'cod_oem',  		'nombre_tecnico',  		'nombre_popular',  		'nombre_otros',
															'nombre_impreso',  		'medida_diametro',  		'medida_largo',  		'medida_alto',  		'medida_ancho',  		'medida_interna',  		'medida_externa',
															'peso_kg',  		'vehiculos',  		'precio_base',  		'precio_oferta',  		'iva', 		'horas_reserva', 		'tags',  		'inactivo' ,'idmd5',
														'cant_reservada','saldo', 'cant_reservada_in_drako'	];



protected $appends  = ['cantidad', 'precio_base_format','precio_oferta_format'];
	//************************/
	//// 	SCOPES
	//************************/


	public  function scopebusquedaTexto($query, $busqueda) {
    	if ($busqueda) {
    		return $query->where('tags'					,	'like',"%$busqueda%")
						->orWhere('codproducto'			,	'like',"%$busqueda%")
						->orWhere('nombre_tecnico'		,	'like',"%$busqueda%")
						->orWhere('nombre_popular'		,	'like',"%$busqueda%")
						->orWhere('nombre_otros'		,	'like',"%$busqueda%")
						->orWhere('nombre_impreso'		,	'like',"%$busqueda%")
						->orWhere('cod_oem'				,	'like',"%$busqueda%");
    	}

	}

	public function getCantidadAttribute() {  
		return  0;
	}

	public function scopebusquedaPorGrupos ( $query, $idgrupos ){
			return $query->whereIn('idgrupo',  (array)$idgrupos);
	}

	public function scopeProductosPorGrupo ( $query, $idgrupo ){
		return $query->Where('saldo','>','0')
					 ->where('inactivo', '0')
					 ->where('idgrupo', "$idgrupo"); // Facturas
	}

	public   function scopesaldoPorIdProducto ( $query, $idproducto ) {
		$response = $query->where('idproducto',$idproducto)->first();
		//$response = $response->shift();
		return $response ;
	}
	//************************/
	//// 	ACCESORS
	//************************/
   public function getCodOemAttribute ( $value ){
	   return trim($value);
   }
	public function getPrecioBaseFormatAttribute() {
		return number_format( $this->precio_base, 0, ",", ".");
	}
	
	 public function getPrecioOfertaFormatAttribute() {
		return number_format( $this->precio_oferta, 0, ",", ".");
	}

	public function getTagsAttribute( $value ){
		return StringsHelper::LowerTrim ($value);
	}

	public function getNombreImpresoAttribute( $value ){
		return StringsHelper::InicialMayuscula ($value);
	}

	public function getNombrePopularAttribute( $value ){
		return StringsHelper::InicialMayuscula ($value);
	}
	
	public function getNombreTecnicoAttribute( $value ){
		return StringsHelper::InicialMayuscula ($value);
	}

	public function getNombreOtrosAttribute( $value ){
		return StringsHelper::InicialMayuscula ($value);
	}

	public function getVehiculosAttribute( $value ){
		return StringsHelper::FixEnterTab ($value);
	}

	public function getMedidaDiametroAttribute( $value ){
		return StringsHelper::UpperTrim ($value, 10);
	}

	public function getMedidaLargoAttribute( $value ){
		return StringsHelper::UpperTrim ($value, 10);
	}

	public function getMedidaAltoAttribute( $value ){
		return StringsHelper::UpperTrim ($value, 10);
	}
	public function getMedidaAnchoAttribute( $value ){
		return StringsHelper::UpperTrim ($value, 10);
	}
	public function getMedidaInternaAttribute( $value ){
		return StringsHelper::UpperTrim ($value, 10);
	}
	public function getMedidaExternaAttribute( $value ){
		return StringsHelper::UpperTrim ($value, 10);
	}

	
	//************************/
	//// 	RELACIONES
	//************************/
	public function grupos(){
		return $this->belongsTo(ProductosGrupo::class, 'idgrupo');
	}

	public function imagenes(){
		return $this->hasMany(ProductosImagene::class, 'idproducto', 'idproducto');
	}


}
