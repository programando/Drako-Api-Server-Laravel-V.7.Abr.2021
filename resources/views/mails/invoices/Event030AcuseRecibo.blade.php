<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body style="box-sizing: border-box; 
         font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; 
         position: relative; 
         -webkit-text-size-adjust: none; 
         background-color: #ffffff; 
         color: #718096; 
         height: 100%; 
         line-height: 1.4; 
         margin: 0; 
         padding: 0; width: 100% !important;" >

   <div style="box-sizing:border-box;
      font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe   UI Emoji','Segoe UI Symbol';   
      background-color:#ffffff;     color:#718096;    height:100%;   line-height:1.4;   margin:0;      padding:0;     width:100%!important">
      <table width="100%" cellpadding="0" cellspacing="0" 
         style="height:100%; box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#edf2f7;margin:0;padding:0;width:100%">
         <tbody>
            <tr>
               <td  style="box-sizing:border-box;
                  font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
                  <table width="100%" cellpadding="0" cellspacing="0" style="box-sizing:border-box;
                     font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,
                     Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
                     margin:0;padding:0;width:100%">
                     <tr> 
                        @include('mails.partials.TituloEmpresa') 
                     </tr>
                     <tr>
                        <td width="100%" cellpadding="0" cellspacing="0" style="box-sizing:border-box;
                           font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#edf2f7;border-bottom:1px solid #edf2f7;border-top:1px solid #edf2f7;margin:0;padding:0;width:100%">
                           <table align="center"  width="570" cellpadding="0" cellspacing="0" style="box-sizing:border-box;
                              font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#ffffff;border-color:#e8e5ef;border-radius:2px;border-width:1px;margin:0 auto;padding:0;width:570px">
                              <tbody>
                                 <tr>
                                    <td style="box-sizing:border-box;
                                       font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px">
                                       <h1 style="box-sizing:border-box;
                                          font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color   Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#3d4852;font-size:18px;font-weight:bold;margin-top:0;text-align:left">
                                        ACUSE DE RECIBO FACTURA ELECTRÓNICA
                                    </h1>

                                    <div style="box-sizing:border-box;
                                          font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe   UI Emoji','Segoe UI Symbol'">
                                       <p>Cliente:   {{ $Factura['customer']['name'] }} </p>
                                       <p>Tipo documento:  Factura electrónica  </p>
                                       <p>Número documento:  {{ $Factura['document_number'] }} </p>
                                       <p>CUFE:  {{ $Factura['uuid'] }}  </p>
                                    </div>


                                    &nbsp;&nbsp;&nbsp;
<a 
   href="{{ $SPA_Url_Factura }}" 
   style="box-sizing:border-box;
      font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';border-radius:4px;color:#fff;display:inline-block;overflow:hidden;text-decoration:none;background-color:#48bb78;border-bottom:8px solid #48bb78;border-left:18px solid #48bb78;border-right:18px solid #48bb78;border-top:8px solid #48bb78" target="_blank">
   Generar evento - Recibo del bien o servicio
</a>
&nbsp;&nbsp;&nbsp;

                                    


                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr>
                        
                     </tr>
            </tbody>
         </table>
         </td>
      </tr>
   </tbody>
   </table>
</div>

</body>