<?php

namespace App\Service;

use App\Entity\Payements;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
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


    /**
     * Génération détail Excel
     * @param  Payements $payementBookingForm $bookingForm
     * @return array
     */
    public function generateExcel($payements)
    {
        // Création d'un nouveau spreadsheet
        $spreadsheet    = new Spreadsheet();
        $sheet          = $spreadsheet->getActiveSheet();

        // En-têtes des colonnes
        $sheet->setCellValue('A1', 'Date Submitted');
        $sheet->setCellValue('B1', 'Invoice No');
        $sheet->setCellValue('C1', 'Claim No');
        $sheet->setCellValue('D1', 'Claim Amount(MUR)');
        $sheet->setCellValue('E1', 'Payment Date');
        $sheet->setCellValue('F1', 'Status');

        // Remplissage des données
        $row = 2; // Commence à la ligne 2 (après les en-têtes)
        foreach ($payements as $payment) {
            $sheet->setCellValue('A'.$row, $payment['dateSubmitted'] ?? '');
            $sheet->setCellValue('B'.$row, $payment['invoiceNum'] ?? '');
            $sheet->setCellValue('C'.$row, $payment['claimNum'] ?? '');
            $sheet->setCellValue('D'.$row, $payment['claimAmount'] ?? '');
            $sheet->setCellValue('E'.$row, $payment['payementDate'] ?? '');
            $sheet->setCellValue('F'.$row, $payment['statusName'] ?? '');
            $row++;
        }

        // Style des en-têtes
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'fill' => [
                'fillType' => 'SOLIDE',
                'color' => ['rgb' => '4472C4']
            ]
        ];
        // $sheet->getStyle('A1')->applyFromArray($headerStyle);

        // Auto-ajustement des colonnes
        foreach (range('A', 'F') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Création du writer
        $writer = new Xlsx($spreadsheet);

        // Génération du nom de fichier
        $date = (new \DateTime())->format('d_m_Y_H_i_s');
        $filename = "payments_" . $date . ".xlsx";

        $response = new StreamedResponse(function() use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="'.$filename.'"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }
}