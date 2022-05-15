<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipio
 * 
 * @property int $idmcipio
 * @property string|null $nommcipio
 * @property bool|null $inactivo
 *
 * @package App\Models
 */
class Municipio extends Model
{
	protected $table = 'municipios';
	protected $primaryKey = 'idmcipio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idmcipio' => 'int',
		'inactivo' => 'bool'
	];

	protected $fillable = [
		'nommcipio',
		'inactivo'
	];

	public function getNommcipioAttribute  ( $value ){
		return trim ( $value );
	}
}
