<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use App\Helpers\DatesHelper as Fechas;
 

class FctrasElctrnca extends Model
{
	protected $primaryKey   = 'id_fact_elctrnca';
	protected $table        = 'fctras_elctrncas';
	public    $allowedSorts = ['fcha_dcmnto'];
	public    $timestamps   = false;
	public    $type         = 'facturas-electronicas';

	protected $casts = [
		'number'            => 'int',
		'sync'              => 'bool',
		'send'              => 'bool',
		'type_operation_id' => 'int',
		'type_document_id'  => 'int',
		'resolution_id'     => 'int',
		'type_currency_id'  => 'int',
		'rspnse_dian'       => 'bool',
		'rspnse_is_valid'   => 'bool'
	];

	protected $dates = [
		'due_date',
		'rspnse_issue_date',
		'fcha_dcmnto'
	];

	protected $fillable = [	'number',	'sync',	'send',	'notes',	'type_operation_id',	'type_document_id',	'resolution_id','fcha_dcmnto','due_date',
		'type_currency_id',	'order_reference','receipt_document_reference',	'rspnse_dian','is_valid','document_number','uuid','issue_date',
		'zip_key','status_code','status_description','status_message','xml_file_name','zip_name','cstmer_rspnse','cstmer_rspnse_date'
	];

	protected $appends = ['PdfFile','XmlFile', 'fechaEmision', 'UrlDian'];

		public function fields(){
			return [
					'id'            => $this->id_fact_elctrnca,
					'prefijo'       => $this->prfjo_dcmnto,
					'number'        => $this->number,
					'fcha_dcmnto'   => $this->fcha_dcmnto,
					'diffForHumans' => $this->fcha_dcmnto->diffForHumans(),
					'fecha-factura' => $this->fcha_dcmnto->format('d-M-Y'),
					'rspnse_dian'   => $this->is_valid,
			];
		}
		


		public function getFechaEmisionAttribute() {  
			return   Fechas::DMY ( $this->fcha_dcmnto);
		}
		public function getUrlDianAttribute() {  
			return   "https://catalogo-vpfe.dian.gov.co/document/ShowDocumentToPublic/$this->uuid";
		}

		public function getPdfFileAttribute() {  
			return  asset('storage/documents')."/".$this->document_number.'.pdf';
		}

		public function getXmlFileAttribute() {  
			return   asset('storage/documents')."/".$this->document_number.'.xml';
		}

		public static function notesBillingReferenceGetUuid() {
			return DB::select('call fctras_elctrncas_notes_billing_reference_get_uuid()' );
		}


		public function customer() {
			return $this->hasOne(FctrasElctrncasCustomer::class, 'id_fact_elctrnca');	
		}

		public function total() {
			return $this->hasOne(FctrasElctrncasLegalMonetaryTotal::class, 'id_fact_elctrnca');
		}

		public function events() {
			return $this->hasOne(FctrasElctrncasEvent::class, 'id_fact_elctrnca');
		}

		public function products() {
			return $this->hasMany(FctrasElctrncasInvoiceLine::class, 'id_fact_elctrnca');
		}
		public function emails() {
			return $this->hasMany(FctrasElctrncasEmailSend::class, 'id_fact_elctrnca');
		}
		public function noteBillingReference() {
			return $this->hasOne(FctrasElctrncasNotesBillingReference::class, 'id_fact_elctrnca');
		}
		public function noteDiscrepancy() {
			return $this->hasOne(FctrasElctrncasNotesDiscrepancyResponse::class, 'id_fact_elctrnca');
		}
		public function additionals() {
			return $this->hasOne(FctrasElctrncasAdditional::class, 'id_fact_elctrnca');
		}
		public function serviceResponse() {
			return $this->hasOne(FctrasElctrncasDataResponse::class, 'id_fact_elctrnca');
		}
 
		public function eventsResponse030() {
			return $this->hasOne(FctrasElctrncasEventsResponse::class, 'id_fact_elctrnca')->where('cod_event','030');
		}
		
		public function docsSoporteRetenciones() {
			return $this->hasMany(DcmntosSprteWithholdingTaxTotal::class, 'id_fact_elctrnca');
		}
		
		public function taxes() {
			return $this->hasMany(FctrasElctrncasTax::class, 'id_fact_elctrnca');
		}
 
		public function docsSoporteResponse() {
			return $this->hasMany(FctrasElctrncasSoportDocumentResponse::class, 'id_fact_elctrnca');
		}


		// SCOPES
		//=========
			public function scopeInvoicesSearchDataByUUID ($query, $uuid ){
 
				return $query->Where('uuid', "=","$uuid")->get(); // Facturas
			}
			public function scopeInvoicesToSend ( $query ){
				return $query->Where('rspnse_dian','0')->where('type_document_id', '1'); // Facturas
			}
			public function scopeCreditNotesToSend ( $query ){
				return $query->Where('rspnse_dian','0')->whereIn('type_document_id', array('5','6'))->get();	// Notas Crédito/Débito
			}
			public function scopeDocumentosSoporteToSend ( $query ){
				return $query->Where('rspnse_dian','0')->where('type_document_id',  array('12','13'))->get(); // Documentos soporte
			}

		// ACCESORS
		//=========
			public function getDocumentNumberAttribute( $value ){
				return trim($value);
			}
			
			public static function documentsList() {
				return     DB::select(' call fctras_elctrncas_list');
			}

			public function getPrfjoDcmntoAttribute( $value ){
				return trim($value);
			}
			public function getUuidAttribute( $value ){
				return trim($value);
			}



	}
