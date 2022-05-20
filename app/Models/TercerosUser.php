<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use Strings;
 
class TercerosUser extends Model
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
		'idmcipio',
		'pnombre',
		'papellido',
		'direccion',
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

	public function setEmailAttribute ( $value ){
			$this->attributes['email']    = Strings::LowerTrim( $value );
	}

	public function getEmailAttribute ( $value ){
		return trim ( $value );
	}

}
