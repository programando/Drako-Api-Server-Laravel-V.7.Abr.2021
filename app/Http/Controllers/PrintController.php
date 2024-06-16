<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Traits\QrCodeTrait;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;

use Storage;
class PrintController extends Controller
{
    use  QrCodeTrait ;

    public function printExample()
    {
        try {
            // Texto y número
            $texto = "Ejemplo de impresión desde Laravel";
            $numero = 123456;

            // Datos de la tabla
            $registros = [
                ['codigo' => '001', 'producto' => 'Producto A'],
                ['codigo' => '002', 'producto' => 'Producto B'],
            ];

            // Generar texto para la impresora
            $contenido = "";
            $contenido .= "Texto: " . $texto . "\n";
            $contenido .= "Número: " . $numero . "\n";
            $contenido .= "\n";
            $contenido .= "Tabla:\n";
            $contenido .= "-----------------\n";
            foreach ($registros as $registro) {
                $contenido .= sprintf("%-10s %-20s\n", $registro['codigo'], $registro['producto']);
            }
            $contenido .= "-----------------\n";

            // Conectar a la impresora (en este ejemplo, se usa un archivo de salida)
            $printername="TM20";        
            $connector = new WindowsPrintConnector($printername);
            $printer = new Printer($connector);

            // Establecer atributos de impresión
            $printer->setJustification(Printer::JUSTIFY_CENTER);  // Alinear texto al centro

            // Imprimir contenido
            $printer->text($contenido);

            // Generar y imprimir código QR
            // $url = 'https://example.com/qrcode';  // Reemplaza con la URL deseada
            // $qrCode = QrCode::encoding('UTF-8')->size(200)->generate($url);
            // $CodigoQR        = $this->QrCodeGenerateTrait( 'https://catalogo-vpfe.dian.gov.co/document/searchqr?documentkey=3cd361c83687833f87b3541e758c76ca102670faba6a5a72fb218dd1e8f780f5bb8512f36e47e37a1095e6d19c98bf7b', 300 );

            // Storage::disk('Files')->put( 'qr.png' , $CodigoQR  );
            // $fileContent = Storage::disk('Files')->get('qr.png');

            
            // $filePath = Storage::disk('Files')->path('qr.png');
            // //dd (  $filePath);
            // $tux = EscposImage::load( $filePath, false);
            // //  $printer->bitImage($qrCodeData);
            // $printer->bitImage($tux );

            // Cortar papel (opcional, depende de la configuración de la impresora)
            $printer->cut();

            // Cerrar conexión con la impresora
            $printer->close();
            Storage::disk('Files')->delete('qr.png');
             

        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
