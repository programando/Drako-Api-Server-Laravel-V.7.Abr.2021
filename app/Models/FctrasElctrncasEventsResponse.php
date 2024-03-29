<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FctrasElctrncasEventsResponse extends Model
{
	protected $table = 'fctras_elctrncas_events_response';
	public $timestamps = false;

	protected $casts = [
		'id_fact_elctrnca' => 'int'
	];

	protected $fillable = [
		'id_fact_elctrnca',
		'cod_event',
		'qr_data',
		'application_response_base64_bytes',
		'attached_document_base64_bytes',
		'pdf_base64_bytes',
		'zip_base64_bytes',
		'dian_response_base64_bytes'
	];

	public function fctras_elctrnca()
	{
		return $this->belongsTo(FctrasElctrnca::class, 'id_fact_elctrnca');
	}
}
