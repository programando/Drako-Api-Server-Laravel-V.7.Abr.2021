<?php

namespace App\Traits;
 
use Illuminate\Support\Str;
use App\Models\FctrasElctrnca;
use App\Models\FctrasElctrncasDataResponse;
use App\Models\FctrasElctrncasErrorsMessage;
use Illuminate\Support\Facades\Hash;
use App\Helpers\DatesHelper as Fecha;
use App\Helpers\NumbersHelper as Numbers;
use App\Helpers\StringsHelper as Strings;



trait DocsSoporteTrait {
    
    protected $PdfFile, $XmlFile, $DocumentNumber;
    
    

    protected function DocSoporteHeaderTrait($Document , &$jsonObject ) {      
        $jsonObject= [
            'number'            => $Document["number"],
            'type_document_id'  => $Document["type_document_id"],
            'type_operation_id' => $Document["type_operation_id"],
            //'resolution_id'     => $Document["resolution_id"],
            'sync'              => true,
            ] ;
        }

    protected function DocSoporteEnvironmentTrait ( &$jsonObject ) {
        $jsonObject['environment']=[
                'type_environment_id' => '2',                                      // 1 producction,   2 habilitacion o pruebas
        ]; 
    }

    protected function DocSoporteResolutionTrait ( &$jsonObject ) {
         
        $jsonObject['resolution']=[
                'prefix'          => 'SETP',                                   
                'resolution'      => '18760000001',                            
                'resolution_date' => '0001-01-01',                               
                'technical_key'   => 'fc8eac422eba16e22ffd8c6f94b3f40a6e38162c',   
                'from'            => '990000000',                              
                'to'              => '995000000',                              
                'date_from'       => '2019-01-19',                               
                'date_to'         => '2030-01-19',                               
        ]; 
    }


    protected function DocSoporteWithHoldingTaxTotalsTrait( $Retenciones, &$jsonObject, $jsonKey  ) {
        
        if (  $Retenciones->count() === 0 )  return ;

        $WithHoldingTaxTotals    = [];
        $WithHoldingTaxTotalLine = [];
        foreach ($Retenciones as $Retencion) {
           $WithHoldingTaxTotalLine = [
             'tax_id'         => $Retencion['tax_id'],
             'percent'        => Numbers::jsonFormat ( $Retencion['percent'], 2),
             'tax_amount'     => Numbers::jsonFormat ( $Retencion['tax_amount'], 2),
             'taxable_amount' => Numbers::jsonFormat ( $Retencion['taxable_amount'], 2),  
           ];  
            $WithHoldingTaxTotals[] = $WithHoldingTaxTotalLine ;
        }
        $jsonObject [$jsonKey] = $WithHoldingTaxTotals;
    }

    protected function DocSoporteLegalMonetaryTotalsTrait ( $Totals, &$jsonObject, $key  ) {
        $jsonObject[$key] =[
            'line_extension_amount'  => Numbers::jsonFormat($Totals['line_extension_amount'],2),
            'tax_exclusive_amount'   => Numbers::jsonFormat($Totals  ['tax_exclusive_amount'],2),
            'tax_inclusive_amount'   => Numbers::jsonFormat($Totals  ['tax_inclusive_amount'],2),
            'payable_amount'         => Numbers::jsonFormat($Totals  ['payable_amount'],2),
        ];      
    }

    protected function DocSoporteInvoiceLinesTrait ( $Products, &$jsonObject, $jsonKey  ) {
        $Productos = [];          
        foreach ($Products as $Product) {
         $ProductToCreate = [
             'unit_measure_id'             => $Product['unit_measure_id'],
             'invoiced_quantity'           => Numbers::jsonFormat ( $Product['invoiced_quantity'], 6),
             'vendor_code'                 => $Product['vendor_code'],
             'line_extension_amount'       => Numbers::jsonFormat ($Product['line_extension_amount'], 2),
             'invoice_period'              => [
                'start_date'                        =>  '2022-07-18',
                'form_generation_transmission_id'   => '2' ,  
             ],
             'description'                 => $Product['description'],
             'code'                        => $Product['code'],
             'type_item_identification_id' => $Product['type_item_identification_id'],
             'price_amount'                => Numbers::jsonFormat ($Product['price_amount'],2),
             'base_quantity'               => Numbers::jsonFormat ($Product['base_quantity'],2)
           ];  
 
            $Productos[] = $ProductToCreate ;
        }
        $jsonObject [$jsonKey] = $Productos;
    }

 

/*
      'start_date'                        =>  '20220718';//$Product['start_date'],
                'form_generation_transmission_id'   => '2' ;        //$Product['form_generation_transmission_id']
                */

}
