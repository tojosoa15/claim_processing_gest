<?php

namespace App\Service;

use App\Entity\Payements;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Twig\Environment;

/**
 * Class BookingFormService
 * @package App\Service
 */
class PayementService
{
    /**
	 * @param EntityManagerInterface $entityManager
     * @param Environment $twig
	 */
    public function __construct(
        private EntityManagerInterface $entityManager,
        private Environment $twig
    )
    {
    }

     /**
     * Génération détail PDF
     * @param Payements $payement
     * @return void
     */
    public function generatePdf($payements)
    {
        $pdfOptions = new \Dompdf\Options();
        $pdfOptions->set('defaultFont', 'Arial')->setIsRemoteEnabled(true);
        $pdfOptions->set("isPhpEnabled", true);
        $pdf = new Dompdf($pdfOptions);
        
        $template = $this->twig->render("payement/pdf.html.twig", [
            'payement' => $payements
        ]);

        $pdf->loadHtml($template);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $date           = (new \DateTime())->format('d_m_Y_H_i_s');
        $filename       = "payments_" . $date . ".pdf";
        $pdf->stream($filename, ["Attachment" => true]);
        exit();
    }
}