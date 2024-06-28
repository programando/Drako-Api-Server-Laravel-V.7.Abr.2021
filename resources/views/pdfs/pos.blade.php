<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>DRAKO-AUTOPARTES</title>
    <style>
        @page { margin: 0px 10px; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {             font-family: Courier, monospace; }
        table, tr, td { border: none; border-spacing: 0; }
        .pagion { padding: 0 0 0 0; }
        .colorfff { color: #000; }
        .bAzul { background-color: #EEEEEE; }
        .h60 { height: 60px; }
        .taC { text-align: center; }
        .taR { text-align: right; }
        .taL { text-align: left; }
        .tB { font-weight: bold; }

        .t5 { font-size: 5px; line-height: 5px; }
        .t6 { font-size: 6px; line-height: 6px; }
        .t7 { font-size: 7px; line-height: 7px; }
        .t8 { font-size: 8px; line-height: 8px; }
        .t9 { font-size: 9px; line-height: 9px; }
        .t10 { font-size: 10px; line-height: 10px; }
        .t11 { font-size: 11px; line-height: 11px; }
        .t12 { font-size: 12px; line-height: 12px; }
        .t13 { font-size: 13px; line-height: 13px; }
        .t14 { font-size: 14px; line-height: 14px; }
        .t15 { font-size: 15px; line-height: 15px; }
        .t16 { font-size: 16px; line-height: 16px; }
        .t17 { font-size: 17px; line-height: 17px; }

        .t18 { font-size: 18px; line-height: 18px; }
        .t24 { font-size: 24px; line-height: 24px; }
        .t26 { font-size: 26px; line-height: 26px; }
        .t32 { font-size: 32px; line-height: 32px; }
        .t34 { font-size: 34px; line-height: 34px; }
        .t36 { font-size: 36px; line-height: 36px; }
        .t38 { font-size: 38px; line-height: 38px; }

        .ml4 { margin-left: 4px; }
        .ml5 { margin-left: 5px; }
        .ml6 { margin-left: 5px; }
        .ml7 { margin-left: 7px; }

        .mt12 { margin-top: 12px; }
        .mt14 { margin-top: 14px; }

        .mb3 { margin-bottom: 3px; }
        .mb10 { margin-bottom: 10px; }
        .mb15 { margin-bottom: 15px; }
        .mb40 { margin-bottom: 40px; }
        .p105 { padding: 20pt 8px; }
        .p128 { padding: 12pt 8px; }

        .p1 { padding: 1px 1px; }
        .p2 { padding: 2pt 2px; }
        .p5 { padding: 5pt 8px; }
        .p8 { padding: 8px; }
        .p10 { padding: 10px; }
        .p20 { padding: 20px; }
        .linea { height: 5px; }
        .bS1 { border: 3pt solid #333; }
        .bRS1 { border-right: 3pt solid #333; }
        .bBS1 { border-bottom: 3pt solid #333; }
        .bTS1 { border-top: 3pt solid #333; }
        .bB0 { border-bottom: none; }
        .bRad { border-radius: 10px; }
        .bRad1 { border-radius: 10pt 10pt 0 0; }
        .bRad2 { border-radius: 0 0 10pt 10px; }
        .vatop { vertical-align: top; }
    </style>
</head>

<body>
    <div class='pagion'>
        <table width="100%" class="mt12 ml5">
            <tr>
                <td width="100%" class="taC">

                    <div class="t17 tB">DRAKO AUTOPARTES</div>
                    <br>
                    <div class="t13 tB">EDGAR CALVO GARCÍA</div>
                    <div class="t10 tB">NIT: 10.485.950-1</div>
                    <div class="t10 tB">CRA 13 9 19 Stder.Quilichao</div>
                    <div class="t10 tB">311 747 09 55</div>
                </td>
            </tr>
            <tr>
                <td width="100%" class="taC t11 tB">
                    <br><br>
                    <p class="tB t12">FACTURA ELECTRÓNICA DE VENTA</p>
                    <p class="tB t11 p2">{{ $Factura['prfjo_dcmnto']. ' ' . $Factura['nro_dcmnto'] }}</p>
                    <p class="t9">Fecha : {{  $Fechas['FactHour'] }}</p>
                    <p class="t9">Firma : {{ $Factura['created_at'] }}</p>
                    <p class="t9">{{ $Additionals['frma_pgo']==='EFECTIVO' ? 'CONTADO' : $Additionals['frma_pgo'] }} - {{ $Additionals['medio_pgo'] }}</p>
 

                    <br>
                    <div class="t10 taC ">RÉG. IMPUESTOS SOBRE VENTAS  </div>
                    <div class="t10 taC ">I.V.A. PERSONA NATURAL </div>
                    <div class="t10 taL ">Resol. DIAN N°.: {{ $Resolution['resolution'] }}</div>
                    <div class="t10 taL ">Fecha:  {{ $Resolution['resolution_date'] }}</div>  
                    <div class="t10 taL ">Autorizado {{ $Resolution['prefix'].$Resolution['from']. ' hasta '. $Resolution['prefix'].$Resolution['to']  }}</div>
                    <div class="t10 taL ">Vigencia:  {{ $Resolution['date_to'] }}</div>  
                </td>
            </tr>  
            
            <tr>
                <td width="100%" class="taL t11 "><br><br>
                    <div class="tB">CLIENTE</div>
                    <div class="t11 ml5 p1 tB">Nombre: {{ $Customer['name'] }} </div>
                    <div class="t11 ml5 p1 tB">Identf.: {{ $Customer['identification_number'] }}</div>      
                    <div class="t11 ml5 p1 tB">{{ $Customer['address'] }}</div>  
                    <div class="t11 ml5 p1 tB">{{ $Customer['email'] }}</div>     
                    <div class="t11 ml5 p1 tB">{{ $Additionals['mcipio'] . ' - '. $Additionals['dpto'] }}</div>      
                    <div class="t11 ml5 p1 tB">{{ $Additionals['nro_tlfno'] }}</div>      
                         
                </td>                    
            </tr>
            <br>
            <tr>   
                <p class="ml4 t11">--------------------------------</p>    
                <p class="ml4 t11 tB">CANT.&nbsp;&nbsp;DESCRIPCIÓN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR</p>
                <p class="ml4 t11">--------------------------------</p> 
            </tr>
 


        </table>
        <table width="90%">
            @foreach($Products as $Product )
                <tr>
                    <td class="t10 tB ml7">      {{ $Product['invoiced_quantity'] }} </td>
                    <td  class="t10 tB p2">     {{ $Product['code'] }}  -  {{ $Product['description']  }} </td>
                    <td class="t10  tB taR p2">  {{ Numbers::invoiceFormat($Product['line_extension_amount'])   }}</td>
                </tr>
            @endforeach
        </table> 
        <br><br>

        <table width="100%" >
            <tr>
                <td  class="t11 tB">SUBTOTAL :</td>
                <td  class="t11 tB taR">{{ Numbers::invoiceFormat($Totals['line_extension_amount']) }}</td>
            </tr>
             <tr>
                <td  class="t11 tB">IVA :</td>
                <td  class="t11 tB   taR">{{ Numbers::invoiceFormat($Additionals['vr_iva']) }}</td>
                
            </tr>  
              <tr>
                <td  class="t11 tB">TOTAL :</td>
                <td  class="t11 tB  taR">{{ Numbers::invoiceFormat($Totals['payable_amount']) }}</td>
            </tr>                                 
        </table>

        <br><br> 


        <table width="100%">
 
            <tr>
                <td class="t11 tB">Impuesto</td>
                <td class="t11 tB">Tarifa</td>
                <td  class="t11  tB">Base</td>
                <td  class="t11 taR tB">Valor</td>
            </tr> 

            @foreach($Taxes as $Tax )
                <tr>
                    <td class="t10 tB p1 ">{{ trim($Tax['texto']) === 'IMPUESTO A LA BOLSA' ? 'IMPTO. BOLSA' : $Tax['texto'] }}</td>
                    <td  class="t10 tB p1 ">{{ Numbers::invoiceFormat($Tax['pctje_iva']) .'%'}}</td>
                    <td  class="t10 tB p1 ">{{ Numbers::invoiceFormat($Tax['vr_base']) }}</td>
                    <td  class="t10 tB p1 taR">{{ Numbers::invoiceFormat($Tax['vr_iva']) }}</td>
                </tr>
            @endforeach 
             
        </table>    

        <br><br> 
                        
        <div width="100%" class="taC">
            <img style="width: 120px; height: auto;" src="data:image/png;base64,{{ base64_encode($CodigoQR) }}">
        </div>
        <div>
            <p class="taC t10 tB">CUFE</p>
            <p class="taC t10 tB">{{ Str::substr($Factura['uuid'], 0, 20) }}</p>
            <p class="taC t10 tB">{{ Str::substr($Factura['uuid'], 21, 40) }}</p>
            <p class="taC t10 tB">{{ Str::substr($Factura['uuid'], 41, 60) }}</p>
            <p class="taC t10 tB">{{ Str::substr($Factura['uuid'], 61, 80) }}</p>
            <p class="taC t10 tB">{{ Str::substr($Factura['uuid'], 81, 100) }}</p>
        </div>
            
        <br> 
        <div>
            <p class="t10 tB taC">TODA GARANTÍA SE DA CON LA PRESENTACIÓN DE LA FACTURA.</p>
            <p class="t10 tB taC"> EL SERVICIO ELÉCTRICO NO </p>
            <p class="t10 tB taC">TIENE CAMBIO NI GARANTÍA </p>
        </div>
        <br>
        <div>
            <p class="t10 tB taC">ESTA FACTURA SE ASIMILA, PARA</p>
            <p class="t10 tB taC">TODOS SUS EFECTOS, A LA LETRA DE CAMBIO DE CONFORMIDAD</p>
            <p class="t10 tB taC">CON EL ARTÍCULO 774 DEL</p>
            <p class="t10 tB taC">CÓDIGO DE COMERCIO</p>
        </div>
        <br>
        <div>
            <p class="t10 tB taC">FACTURA ELECTRÓNICA GENERADA POR </p>
            <p class="t10 tB taC">DRAKO AUTOPARTES Nit.: 10.485.950-1</p>
            <br>
            <p class="t10 tB taC">Envío facturación directa a través de servicio Web dispuesto por la DIAN.( No aplica proveedor tecnológico )</p>
            <p class="t10 tB taC">Terminal: 192.168.1.144</p>
        </div>
        <div><p></p></div>
        <div><p></p></div>
        <div><p></p></div>
    </div>
</body>
</html>

 