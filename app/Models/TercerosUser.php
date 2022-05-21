<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\StringsHelper as Strings;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;
 
class TercerosUser extends Authenticatable
{
	protected $table = 'terceros_users';
	protected $primaryKey = 'idtercero_web';

	protected $casts = [
		'idtercero_drako' => 'int',
		'tipo_persona'    => 'int',
		'idmcipio'        => 'int',
		'inactivo'        => 'bool'
	];

	protected $dates = [
		'tmp_token_expira'
	];

	protected $hidden = [
		'password',
		'remember_token',
		'tmp_token'
	];

	protected $fillable = [
		'identificacion',
		'tipo_persona',
		'regimen',
		'idmcipio',
		'pnombre',
		'papellido',
		'direccion',
		'direccion_cmplmnto',
		'celular',
		'email',
		'password',
		'inactivo',
		'remember_token',
		'tmp_token',
		'tmp_token_expira'
	];

	public function municipio()
	{
		return $this->belongsTo(Municipio::class, 'idmcipio');
	}


	    //  MUTATORS:
	public function setPasswordAttribute ( $value ){
			$this->attributes['password'] = Hash::make( $value );
	}

	public function setPnombreAttribute ( $value ){
		$this->attributes['pnombre'] = Strings:: UpperTrim( $value );
	}

	public function setPapellidoAttribute ( $value ){
		$this->attributes['papellido'] = Strings:: UpperTrim( $value );
	}

	public function setDireccionAttribute ( $value ){
		$this->attributes['direccion'] = Strings:: UpperTrim( $value );
	}

	public function setDireccionCmplmntoAttribute ( $value ){
		$this->attributes['direccion_cmplmnto'] = Strings:: UpperTrim( $value );
	}

	public function setEmailAttribute ( $value ){
			$this->attributes['email']    = Strings::LowerTrim( $value );
	}

	public function getEmailAttribute ( $value ){
		return trim ( $value );
	}

}
