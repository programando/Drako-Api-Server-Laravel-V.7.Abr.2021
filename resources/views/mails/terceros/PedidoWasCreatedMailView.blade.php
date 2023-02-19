<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="utf-8">
  <meta name="x-apple-disable-message-reformatting">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
  <!--[if mso]>
    <xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml>
    <style>
      td,th,div,p,a,h1,h2,h4,h4,h5,h6 {font-family: "Segoe UI", sans-serif; mso-line-height-rule: exactly;}
    </style>
  <![endif]-->
    <title>Orden de compra</title>
</head>
<body style="font-size: 12px; margin: 0; padding: 0; width: 60%; word-break: break-word; -webkit-font-smoothing: antialiased; background-color: #fff;">
 
  <div role="article"  lang="en">
    <header style="display: flex; margin: 0 40px;">
 
    </header> 
    <aside style="margin: 0 40px; margin-top: 50px;">
      <div>
        <h4 style="font-weight: 500;"></h4>
        <br><br><br>
        <h4 style="font-weight: 500;">         
      <p style="text-align: justify;">
        Señores : <br>
        <strong> Drako Autopartes </strong>, <br><br>
        Se ha creado un nuevo pedido con número:  <strong>{{ $NumeroPedido }}</strong>, a nombre de <strong>{{ $NombreCliente }}</strong> <br> <br>
        Se requiere confirmación del respectivo pago antes de: <strong>{{ $FchaFinReserva }}</strong>  para iniciar el proceso de despacho a la dirección indicada por el cliente.  
        <br><br>Esta información la podrá consultar en nuestro sistema de información citando el número de pedido mencionado anteriormente, una vez que haya confirmado el pago por parte del cliente. 
        <br><br>Si el pedido no es pagado antes de esta fecha/hora límite, el sistema borrará el pedido de manera automática. Este procedimiento será informado al cliente mediante un correo electrónico.
        <br><br>
        A continuación los detalles del pedido
         <div style="margin: 0 auto;">
            <table    width="100%" style="margin: 0 auto;" >

                  <thead  style="text-align: center; color: #fff; background-color: #272C6B; height:25px;">
                    <tr>
                      <th>&nbsp;CANTIDAD</th>
                      <th>&nbsp;PRODUCTO</th>
                      <th>&nbsp;VR.UNITARIO&nbsp;</th>
                      <th>&nbsp;SUB.TOTAL&nbsp;</th>
                      <th>&nbsp;I.V.A&nbsp;</th>
                      <th>&nbsp;VR.TOTAL&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody style="font-size:13px;border: black 1px solid;">
                        {!! $BodyTable !!}
                  </tbody>
                  <br>
                  <tr>
                    <td colspan="5" style="text-align:right"> TOTAL : </td>
                    <td style="text-align:right"><strong> {{ $VrTotalPedido}}</strong> </td>
                  </tr> 

 
            </table>
        </div>
      </p>
    </h4>
  </div>
 
     </aside>
    <div style="margin: 0 0px; margin-top: 50px;">
     
    </div>
  </div>
  <footer>
    <br><br><br><br><br><br>
    <h5 style="font-weight: 500;">         
        Correo generado automáticamente por el sistema de información.
    </h5>
  </footer>
</body>
</html>