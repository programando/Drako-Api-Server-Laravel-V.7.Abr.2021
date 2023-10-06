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
    .t42            { font-size:42pt; line-height:38pt; }
    .mb3            { margin-bottom:3pt; }
    .mb10           { margin-bottom:10pt; }
    .mb15           { margin-bottom:15pt; }
    .mb40           { margin-bottom:40pt; }
    .p105           { padding:20pt 8pt; }
    .p128           { padding:12pt 8pt; }
    .p64            { padding:5pt 6pt; }
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
                    <div class="t42 tB"> EDGAR CALVO GARCÍA </div>
                    <div class="t24">311 747 09 55</div>
                    <div class="t24 mb15">CRA 13 9 19 BARRIO PANAMERICANO </div>
                    <div >Santander de Quilichao, Cauca,Colombia </div>
                    <div class="tB">  </div>
                </td>
                <td width="30%" class="taR">
                    <div class="t24">NIT: 10.485.950-1</div>
                     
                    <div >RÉGIMEN IMPUESTOS SOBRE LAS VENTAS - IVA </div>
                    <div >Persona Natural </div>
                    <div ></div>
                    <div ></div>  
                    <div ></div>  
                    <div ></div>
                    <div ></div>
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
                                <td class="p8 bRS1">Fecha orden de compra</td>
                            </tr>
                        </table>
                    </div>
                    <div class="bS1 bRad2">
                        <table width="100%" class="taC">
                            <tr>
                                <td width="33%" class="p5 bRS1">{{ $Fechas['FactDia'] }}</td>
                                <td width="33%" class="p5 bRS1">{{ $Fechas['FactMes'] }}</td>
                                <td width="34%" class="p5 bRS1">{{ $Fechas['Factyear'] }}</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td></td>
                <td width="30%">
                    <div  >
 
                    </div>
                    <div class=" ">
 
                    </div>
                </td>
                <td></td>
                <td width="35%">
                    <div class="t26 taC mb3"><strong> Número orden de compra </strong> </div>
                    <div class="p8 bS1 bRad tB taC t32">{{ $OrdenesCompra[0]['numero'] }}  </div>
                </td>
            </tr>
        </table>

        <div class="bS1 bRad p20 mb40">
            <table width="100%"  >
                <tr >
                    <td width="10%" class="p5 tB">Proveedor :</td>
                    <td width="35%" class="p5"> {{ $OrdenesCompra[0]['proveedor'] }} </td>
                    <td width="10%" class="p5 tB">N.I.T.:</td>
                    <td width="25%" class="p5"> {{ $OrdenesCompra[0]['nit'] }} </td>
                    <td width="10%" class="p5 tB"></td>
                    <td width="20%" class="p5"></td>
                </tr>
                <tr>
                    <td width="10%" class="p5 tB">Dirección:</td>
                    <td width="25%" class="p5">{{ $OrdenesCompra[0]['direccion'] }} </td>
                    <td width="10%" class="p5 tB">Municipio:</td>
                    <td width="25%" class="p5">{{ $OrdenesCompra[0]['municpio'] }} </td>
                    <td width="10%" class="p5 tB">Teléfono :</td>
                    <td width="20%" class="p5">{{ $OrdenesCompra[0]['telefono'] }} </td>
                </tr>
                <tr>
                    <td width="10%" class="p5 tB">Email(1) :</td>
                    <td width="25%" class="p5">{{ $OrdenesCompra[0]['email_asesor'] }} </td>
                    <td width="10%" class="p5 tB">Email(2) :</td>
                    <td width="25%" class="p5">{{ $OrdenesCompra[0]['email_proveedor'] }} </td>

                </tr>

            </table>
        </div>

 
        <div class="bS1 bRad mb40">
            <table width="100%" class="bAzul taC colorfff tB">
                <tr>
                    <td width="15%" class="p8 bRS1">CÓD.DRAKO</td>
                    <td width="15%" class="p8 bRS1">CÓD.PROVE.</td>
                    <td width="70%" class="p8 bRS1">PRODUCTO</td>
                    <td width="10%" class="p8 bRS1">CANT.</td>
                    <td width="10%" class="p8 bRS1">VR UNIT.</td>
                    <td width="10%" class="p8 ">VR.ÍTEM</td>
                </tr>
            </table>
          

 
            <table width="100%">
                {{ $CantItems = 0}}
                @foreach($OrdenesCompra as $Product )
                    <tr>
                        <td width="15%" class="p64 bRS1 ">     {{  trim( $Product['codproducto']  )                                  }} </td>
                        <td width="15%" class="p64 bRS1 ">     {{  trim ($Product['ref_proveedor'] )                              }} </td>
                        <td width="70%" class="p64 bRS1 ">     {{  trim($Product['producto'] )                                  }} </td>
                        <td width="10%" class="p64 bRS1 taR">  {{  $Product['cantidad']                                   }} </td>
                        <td width="10%" class="p64 bRS1 taR">  {{  Numbers::invoiceFormat( $Product['vr_unitario'] )                               }} </td>
                        <td width="10%" class="p64  taR">      {{  Numbers::invoiceFormat($Product['vr_item'] )                                   }} </td>
                         {{ $CantItems ++}}
                    </tr>
                @endforeach
                {{ $CantFaltante= 45- $CantItems }}
                    @for ($i = 1; $i <= $CantFaltante; $i++)
                     <tr>
                        < width="10%" class="p128 bRS1 taC"> &nbsp;  </td>
                        <td width="15%" class="p128 bRS1"></td>
                        <td width="15%" class="p128 bRS1"></td>
                        <td width="70%" class="p128 bRS1 taR"></td>
                        <td width="10%" class="p128 bRS1 taR  "></td>
                        <td width="10%" class="p128 bRS1 taR  "></td>
                        <td width="10%" class="p128  taR  "></td>
  
                    </tr>       
                @endfor 
            </table>
                
 
            <table class="bTS1" width="100%">
                <tr class="vatop">

                    <td width="70%" class="p128 bRS1">
                    <div class="mb15">
                            <strong>OBSERVACIONES:</strong>
                             {{ $OrdenesCompra[0]['observaciones'] }}
                        </div>
                        <div class="mb15">
                            
                        </div>

                        <div >
 
                        </div>
                    </td>

                    <td width="30%">
                        <table width="100%">
                            <tr>
                                <td width="50%" class="p10 tB bRS1 bBS1">SUBTOTAL :</td>
                                <td width="50%" class="t20 tB p10 bBS1 taR"> {{ Numbers::invoiceFormat($OrdenesCompra[0]['sub_total']) }}</td>
                            </tr>
                        </table>
    
                                             
                        <table width="100%">
                            <tr>
                                <td width="50%" class="p10 tB bRS1 bBS1">IVA</td>
                                <td width="50%" class="t20 tB p10 bBS1 taR">{{ Numbers::invoiceFormat($OrdenesCompra[0]['iva']) }}</td>
                            </tr>
                        </table>
                        <table width="100%">
                            <tr>
                                <td width="50%" class="p10 tB bRS1">TOTAL</td>
                                <td width="50%" class="t20 tB p10 taR">{{ Numbers::invoiceFormat($OrdenesCompra[0]['total'] )}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

 

        <div class="h60"></div>

        <div class="bS1 bRad p8 taC">

            <div class="tB">Señor proveedor, favor citar este número de orden de compra cuando emita su factura</div>
            <br>
            <br>
            <div >
            <small>
                 
                </small>
            </div>
        </div>

    </div>
</div>



  </body>
</html>