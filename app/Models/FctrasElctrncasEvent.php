<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FctrasElctrncasEvent
 * 
 * @property int $id
 * @property int|null $id_fact_elctrnca
 * @property bool|null $event_030
 * @property bool|null $event_031
 * @property bool|null $event_032
 * @property bool|null $event_033
 * @property bool|null $event_034
 * @property Carbon|null $event_030_fcha
 * @property Carbon|null $event_031_fcha
 * @property Carbon|null $event_032_fcha
 * @property Carbon|null $event_033_fcha
 * @property Carbon|null $event_034_fcha
 * 
 * @property FctrasElctrnca|null $fctras_elctrnca
 *
 * @package App\Models
 */
class FctrasElctrncasEvent extends Model
{
	protected $table = 'fctras_elctrncas_events';
	public $timestamps = false;

	protected $casts = [
		'id_fact_elctrnca' => 'int',
		'event_030' => 'bool',
		'event_031' => 'bool',
		'event_032' => 'bool',
		'event_033' => 'bool',
		'event_034' => 'bool'
	];

	protected $dates = [
		'event_030_fcha',
		'event_031_fcha',
		'event_032_fcha',
		'event_033_fcha',
		'event_034_fcha'
	];

	protected $fillable = [
		'id_fact_elctrnca',
		'event_030',
		'event_031',
		'event_032',
		'event_033',
		'event_034',
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
