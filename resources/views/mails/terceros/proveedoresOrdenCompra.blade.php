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
        <strong> {{ $Proveedor }} </strong>, <br><br>
         Con número de orden de compra : <strong>{{ $Numero }}</strong>, solicitamos despachar lo siguiente:
          <br><br><br>
         <div style="margin: 0 auto;">
            <table    width="100%" style="margin: 0 auto;" >

                  <thead  style="text-align: center; color: #fff; background-color: #272C6B; height:25px;">
                    <tr>
                      <th>&nbsp;CÓD.DRAKO</th>
                      <th>&nbsp;CÓD.PROVEED.</th>
                      <th>&nbsp;PRODUCTO&nbsp;</th>
                      <th>&nbsp;CANT.&nbsp;</th>
                      <th>&nbsp;VR.UNITARIO&nbsp;</th>
                      <th>&nbsp;VR.ÍTEM&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody style="font-size:13px;border: black 1px solid;">
                        {!! $BodyTable !!}
                  </tbody>
                  <br>
                  <tr>
                    <td colspan="5" style="text-align:right"> SUB-TOTAL : </td>
                    <td style="text-align:right"> {{ $SubTotal}}</td>
                  </tr> 

                  <tr>
                    <td colspan="5" style="text-align:right"> IVA : </td>
                    <td style="text-align:right"> {{ $Iva}}</td>
                  </tr> 
                  <tr>
                    <td colspan="5" style="text-align:right"> TOTAL : </td>
                    <td style="text-align:right"> {{ $Total}}</td>
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