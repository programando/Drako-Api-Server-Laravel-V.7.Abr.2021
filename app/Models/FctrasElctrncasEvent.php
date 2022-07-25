<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

 
class FctrasElctrncasEvent extends Model
{
	protected $table = 'fctras_elctrncas_events';
	public $timestamps = false;

	protected $casts = [
		'id_fact_elctrnca'        => 'int',
		'event_030_acse_rbo'      => 'bool',
		'event_031_rclmo_rchzo'   => 'bool',
		'event_032_rcbo_bn'       => 'bool',
		'event_033_acptcn_exprsa' => 'bool',
		'event_034_acptcn_tcta'   => 'bool'
	];

	protected $dates = [
		'event_030_fcha',
		'event_031_rclmo_rchzo_fcha',
		'event_032_rcbo_bn_fcha',
		'event_033_acptcn_exprsa_fcha',
		'event_034_acptcn_tcta_fcha'
	];

	protected $fillable = [
		'id_fact_elctrnca',
		'event_030_acse_rbo',
		'event_031_rclmo_rchzo',
		'event_032_rcbo_bn',
		'event_033_acptcn_exprsa',
		'event_034_acptcn_tcta',
		'event_030_fcha',
		'event_031_fcha',
		'event_032_fcha',
		'event_033_fcha',
		'event_034_fcha'
	];

	public function fctras_elctrnca()
	{
		return $this->belongsTo(FctrasElctrnca::class, 'id_fact_elctrnca');
	}

 

}