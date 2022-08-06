<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FctrasElctrncasTax
 * 
 * @property int $id
 * @property int|null $id_fact_elctrnca
 * @property float|null $vr_base
 * @property float|null $pctje_iva
 * @property float|null $vr_iva
 * 
 * @property FctrasElctrnca|null $fctras_elctrnca
 *
 * @package App\Models
 */
class FctrasElctrncasTax extends Model
{
	protected $table = 'fctras_elctrncas_taxes';
	public $timestamps = false;

	protected $casts = [
		'id_fact_elctrnca' => 'int',
		'vr_base' => 'float',
		'pctje_iva' => 'float',
		'vr_iva' => 'float'
	];

	protected $fillable = [
		'id_fact_elctrnca',
		'vr_base',
		'pctje_iva',
		'vr_iva'
	];

	public function fctras_elctrnca()
	{
		return $this->belongsTo(FctrasElctrnca::class, 'id_fact_elctrnca');
	}
}
