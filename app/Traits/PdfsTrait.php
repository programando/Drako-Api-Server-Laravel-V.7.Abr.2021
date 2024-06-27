<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Dompdf\Dompdf;
use Dompdf\Options;

trait PdfsTrait {

    private function pdfCreateFileTrait($View, $DataFile) {
        $pdf = App::make('dompdf.wrapper');
        return $pdf->loadView($View, $DataFile)->output();
    }

    private function pdfCreatePosFileTrait($View, $DataFile) {
        $pdf = new Dompdf();

        $width = 58; // mm
        $height = 300; // mm (altura inicial fija)
        $width_in_points = ($width / 25.4) * 72;
        $height_in_points = ($height / 25.4) * 72;

        // Configuración inicial del tamaño del papel
        $pdf->setPaper(array(0, 0, $width_in_points, $height_in_points));

        // Cargar la vista y renderizar el PDF
        $pdf->loadHtml(view($View, $DataFile)->render());

        // Renderizar el PDF y obtener el contenido
        $pdf->render();

        // Devolver el PDF generado
        return $pdf->output();
    }

}
