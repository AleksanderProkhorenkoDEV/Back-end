<?php

namespace App\Services;

use Dompdf\Dompdf;

class CreatePdf
{
    private $dompdf;

    public function __construct(Dompdf $dompdf)
    {
        $this->dompdf = $dompdf;
    }

    public function createPdf($html)
    {
        $this->dompdf->loadHtml($html);
        return $this->dompdf;
    }
}
