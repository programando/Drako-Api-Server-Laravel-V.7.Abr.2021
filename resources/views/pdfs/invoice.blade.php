<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>DRAKO-AUTOPARTES</title>
   <style>
    @page           { size:1910pt 2467pt; }
    *               { margin:0; padding:0; }
    html            { margin:0; padding:0; font-family:Arial, Helvetica, sans-serif; font-size:20pt; line-height:20pt; }
    table, tr, td   { margin:0; padding:0; border:0; border-spacing:0; }
    .pagion         { padding:55pt 75pt 0 75pt; }
    .colorfff       { color:#000; }
    .bAzul          { background-color:#EEEEEE; }
    .h60            { height:60pt;}
    .taC            { text-align:center;}
    .taR            { text-align:right;}
    .tB             { font-weight:bold;}
    .t18            { font-size:18pt; line-height:18pt; }
    .t24            { font-size:24pt; line-height:24pt; }
    .t26            { font-size:26pt; line-height:26pt; }
    .t32            { font-size:32pt; line-height:32pt; }
    .t34            { font-size:34pt; line-height:34pt; }
    .t36            { font-size:36pt; line-height:36pt; }
    .t38            { font-size:38pt; line-height:38pt; }
    .mb3            { margin-bottom:3pt; }
    .mb10           { margin-bottom:10pt; }
    .mb15           { margin-bottom:15pt; }
    .mb40           { margin-bottom:40pt; }
    .p105           { padding:20pt 8pt; }
    .p128           { padding:12pt 8pt; }
    .p5             { padding:5pt 8pt; }
    .p8             { padding:8pt; }
    .p10            { padding:10pt; }
    .p20            { padding:20pt; }
    .linea          { height:5pt; }
    .bS1            { border:3pt solid #333; }
    .bRS1           { border-right:3pt solid #333; }
    .bBS1           { border-bottom:3pt solid #333; }
    .bTS1           { border-top:3pt solid #333; }
    .bB0            { border-bottom:none; }
    .bRad           { border-radius:10pt; }
    .bRad1          { border-radius:10pt 10pt 0 0; }
    .bRad2          { border-radius:0 0 10pt 10pt; }
    .vatop          { vertical-align:top;}
</style>

  </head>
  <body>
 
 
<div>
    <div class="pagion">
        <table width="100%" class="mb40">
            <tr>
                <td width="40%">
                   <img src="https://api.drako.com.co/storage/images/drako/logo.jpg" alt="">              
                </td>
              
                <td width="60%" class="taC">
                    <div class="t38 tB"> EDGAR CALVO GARCÍA </div>
                    <div class="t24">311 747 09 55</div>
                    <div class="t24 mb15">CRA 13 9 19 BARRIO PANAMERICANO </div>
                    <div >Santander de Quilichao, Cauca,Colombia </div>
                    <div class="tB">  </div>
                </td>
                <td width="30%" class="taR">
                    <div class="t24">NIT: 10.485.950-1</div>
                     
                    <div >RÉGIMEN IMPUESTOS SOBRE LAS VENTAS - IVA </div>
                    <div >Persona Natural </div>
                    <div >Resolución DIAN N°.: {{ $Resolution['resolution'] }}</div>
                    <div >Fecha:  {{ $Resolution['resolution_date'] }}</div>  
                    <div >Vigencia:  {{ $Resolution['date_to'] }}</div>  
                    <div >Autorización de Facturación</div>
                    <div >{{ $Resolution['prefix'].$Resolution['from']. ' hasta '. $Resolution['prefix'].$Resolution['to']  }}</div>
                </td>
            </tr>
        </table>

        <div class="bAzul linea mb40"></div>

        <table width="100%" class="mb40">
            <tr>
                <td width="30%">
                    <div class="bAzul bS1 bRad1 bB0">
                        <table width="100%" class="taC colorfff tB">
                            <tr>
                                <td class="p8 bRS1">Fecha Factura</td>
                            </tr>
                        </table>
                    </div>
                    <div class="bS1 bRad2">
                        <table width="100%" class="taC">
                            <tr>
                                
                                <td width="34%" class="p5 bRS1">{{  $Fechas['FactHour'] }}</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td></td>
                <td width="30%">
                    <div class="bAzul bS1 bRad1 bB0">
                        <table width="100%" class="taC colorfff tB">
                            <tr>
                                <td class="p8 bRS1">Fecha Vencimiento</td>
                            </tr>
                        </table>
                    </div>
                    <div class="bS1 bRad2">
                        <table width="100%" class="taC">
                            <tr>
                                <td width="33%" class="p5 bRS1">{{ $Fechas['VenceDia'] }}</td>
                                <td width="33%" class="p5 bRS1">{{ $Fechas['VenceMes'] }}</td>
                                <td width="34%" class="p5 bRS1">{{ $Fechas['VenceYear'] }}</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td></td>
                <td width="35%">
                    <div class="t26 taC mb3"><strong> FACTURA ELECTRÓNICA DE VENTA </strong> </div>
                    <div class="p8 bS1 bRad tB taC t32"> {{ $Factura['prfjo_dcmnto']. ' ' . $Factura['nro_dcmnto'] }}</div>
                </td>
            </tr>
        </table>

        <div class="bS1 bRad p20 mb40">
            <table width="100%"  >
                <tr >
                    <td width="10%" class="p5 tB">Cliente :</td>
                    <td width="35%" class="p5"> {{ $Customer['name'] }} </td>
                    <td width="10%" class="p5 tB">N.I.T.:</td>
                    <td width="25%" class="p5">{{ $Customer['identification_number'] }}</td>
                    <td width="10%" class="p5 tB">Firmado:</td>
                    <td width="20%" class="p5">{{ $Factura['created_at'] }}</td>
                </tr>
                <tr>
                    <td width="10%" class="p5 tB">Dirección:</td>
                    <td width="25%" class="p5">{{ $Customer['address'] }}</td>
                    <td width="10%" class="p5 tB">Municipio:</td>
                    <td width="25%" class="p5">{{ $Additionals['mcipio'] . ' - '. $Additionals['dpto'] }}</td>
                    <td width="10%" class="p5 tB">Teléfono :</td>
                    <td width="20%" class="p5">{{ $Additionals['nro_tlfno'] }}</td>
                    
                </tr>
                <tr>
                    <td width="10%" class="p5 tB">Email :</td>
                    <td width="25%" class="p5">{{ $Customer['email'] }}</td>
                    <td width="10%" class="p5 tB">Forma Pago:</td>
                    <td width="25%" class="p5">{{ $Additionals['frma_pgo']==='EFECTIVO' ? 'CONTADO' : $Additionals['frma_pgo'] }}</td>
                    <td width="10%" class="p5 tB">Medio pago:</td>
                    <td width="25%" class="p5">{{ $Additionals['medio_pgo'] }}</td>
                </tr>

            </table>
        </div>

 
        <div class="bS1 bRad mb40">
            <table width="100%" class="bAzul taC colorfff tB">
                <tr>
                    <td width="10%" class="p8 bRS1">CÓDIGO</td>
                    <td width="50%" class="p8 bRS1">DESCRIPCIÓN</td>
                    <td width="10%" class="p8 bRS1">MEDIDA</td>
                    <td width="10%" class="p8 bRS1">CANT.</td>
                    <td width="10%" class="p8 bRS1">VR UNIT.</td>
                    <td width="10%" class="p8 bRS1">IVA</td>
                    <td width="10%" class="p8 ">TOTAL</td>
                </tr>
            </table>
            <table width="100%">
                {{ $CantItems = 0}}
                @foreach($Products as $Product )
                    <tr>
                        <td width="10%" class="p128 bRS1 ">  {{ $Product['code']                                          }} </td>
                        <td width="50%" class="p128 bRS1 ">     {{ $Product['description']                                   }} </td>
                        <td width="10%" class="p128 bRS1">    Unidad   </td>
                        <td width="10%" class="p128 bRS1 taR">  {{ $Product['invoiced_quantity']                             }}</td>
                        <td width="10%" class="p128 bRS1 taR">  {{ Numbers::invoiceFormat($Product['price_amount'])          }}</td>
                        <td width="10%" class="p128 bRS1 taR">  {{ Numbers::invoiceFormat($Product['percent'])               }}</td>
                        <td width="10%" class="p128  taR">      {{ Numbers::invoiceFormat($Product['line_extension_amount'])          }}</td>
                         {{ $CantItems ++}}
                    </tr>
                @endforeach
                {{ $CantFaltante= 23- $CantItems }}
                @for ($i = 1; $i <= $CantFaltante; $i++)
                     <tr>
                        <td width="10%" class="p128 bRS1 taC">   </td>
                        <td width="50%" class="p128 bRS1"></td>
                        <td width="10%" class="p128 bRS1"></td>
                        <td width="10%" class="p128 bRS1 taR"></td>
                        <td width="10%" class="p128 bRS1 taR  "></td>
                        <td width="10%" class="p128 bRS1 taR  "></td>
                        <td width="10%" class="p128  taR"></td>
                    </tr>       
                @endfor 
            </table>
            
            <table class="bTS1" width="100%">
                <tr class="vatop">

                    <td width="70%" class="p128 bRS1">
                    <div class="mb15">
                            <strong>SON:</strong>
                            {{ $Additionals['vr_letras'] }}
                        </div>
                        <div class="mb15">
                            <strong>CUFE:</strong>
                            {{ $Factura['uuid']}}
                        </div>

                        <div >
                            <strong>NOTAS:</strong>
                            {!! $Factura['notes'] !!}
                        </div>
                    </td>

                    <td width="30%">
                        <table width="100%">
                            <tr>
                                <td width="50%" class="p10 tB bRS1 bBS1">SUBTOTAL :</td>
                                <td width="50%" class="t20 tB p10 bBS1 taR">{{ Numbers::invoiceFormat($Totals['line_extension_amount']) }}</td>
                            </tr>
                        </table>
                         <table width="100%">
                            <tr>
                                <td width="50%" class="p10 tB bRS1 bBS1">Cargos :</td>
                                <td width="50%" class="t20 tB p10 bBS1 taR">{{ 0 }}</td>
                            </tr>
                        </table>   
                         <table width="100%">
                            <tr>
                                <td width="50%" class="p10 tB bRS1 bBS1">Descuentos :</td>
                                <td width="50%" class="t20 tB p10 bBS1 taR">{{ 0 }}</td>
                            </tr>
                        </table>                                            
                        <table width="100%">
                            <tr>
                                <td width="50%" class="p10 tB bRS1 bBS1">IVA</td>
                                <td width="50%" class="t20 tB p10 bBS1 taR">{{ Numbers::invoiceFormat($Additionals['vr_iva']) }}</td>
                            </tr>
                        </table>
                        <table width="100%">
                            <tr>
                                <td width="50%" class="p10 tB bRS1">TOTAL</td>
                                <td width="50%" class="t20 tB p10 taR">{{ Numbers::invoiceFormat($Totals['payable_amount']) }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div class="bS1 bRad p10 mb40">
            <table width="100%">
                <tr>
                    <td width="70%" >
                        <div class="bS1 bRad">
                            <table class="bBS1 taC" width="100%">
                                <tr>
                                    <td width="40%" class="p5 bRS1">TIPO DE IMPUESTO</td>
                                    <td width="20%" class="p5 bRS1">BASE</td>
                                    <td width="20%" class="p5 bRS1">TARIFA</td>
                                    <td width="20%" class="p5">IMPUESTO</td>
                                </tr>
                            </table>
                            
                            <table width="100%">
                            @foreach($Taxes as $Tax )
                                <tr>
                                    <td width="40%" class="p5 bRS1">{{ $Tax['texto']  }}</td>
                                    <td width="20%" class="p5 taR bRS1">{{ Numbers::invoiceFormat($Tax['vr_base']) }}</td>
                                    <td width="20%" class="p5 taR bRS1">{{ Numbers::invoiceFormat($Tax['pctje_iva']) .'%'}}</td>
                                    <td width="20%" class="p5 taR">{{ Numbers::invoiceFormat($Tax['vr_iva']) }}</td>
                                </tr>
                            @endforeach 

                            </table>
                        </div>
                    </td>
                    <td width="30%" class="taR">
                        <img src="data:image/png;base64,{{ base64_encode($CodigoQR) }}">
                          
                    </td>
                </tr>
            </table>
        </div>

        <div class="h60"></div>

        <div class="bS1 bRad p8 taC">

            <div class="tB">Esta factura es un título valor de acuerdo al art. 774 del C.C. y una vez aceptada declara haber recibido los bienes y servicios a satisfacción</div>
            <br>
            <br>
            <div >
            <small>
                Factura electrónica generada por DRAKO AUTOPARTES Nit: 10.485.950-1  <br>
                Envío facturación directa a través de servicio Web dispuesto por la DIAN. ( No aplica proveedor tecnológico)
                Terminal: 192.168.1.144
                </small>
            </div>
        </div>

    </div>
</div>



  </body>
</html>