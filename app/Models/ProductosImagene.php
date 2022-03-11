<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use App\Helpers\FoldersHelper as Files;
use Storage ;

class ProductosImagene extends Model
{
 
	protected $table = 'productos_imagenes';
	protected $primaryKey = 'idregistro';
	public $timestamps = false;

	protected $casts    = [ 'idproducto' => 'int' ];
	protected $fillable = [ 	'idproducto', 'nom_imagen'];
	protected $appends  = ['_70x70','_150x150','_240x240','_480x480','_600x600','_800x800'  ];

 
	public function producto() 	{
		return $this->belongsTo(Producto::class, 'idproducto', 'idproducto');
	}

	public function productos() 	{
		return $this->hasMany(Producto::class, 'idproducto', 'idproducto');
	}
	 
	 public function getNomImagenAttribute( $value ) {
		 	return strtolower($value );
	 }
	 public function get70x70Attribute() {  
      return Files::ProductsImages() .'/70x70/'. $this->nom_imagen  ;
  }
		 public function get150x150Attribute() {  
      return  Files::ProductsImages() .'/150x150/'. $this->nom_imagen  ;
  }

		 public function get240x240Attribute() {  
      return  Files::ProductsImages() .'/240x240/'. $this->nom_imagen  ;
  }

		 public function get480x480Attribute() {  
      return  Files::ProductsImages() .'/480x480/'. $this->nom_imagen  ;
  }

		 public function get600x600Attribute() {  
      return  Files::ProductsImages() .'/600x600/'. $this->nom_imagen  ;
  }

		 public function get800x800Attribute() {  
      return  Files::ProductsImages() .'/800x800/'. $this->nom_imagen  ;
			
  }

}
