<?php
require_once('../dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class pdfCreator {

    private function getHtml() {
        ob_start();
        include('./studentinfo.php');
        $retStr = ob_get_contents();
        ob_end_clean();

        return $retStr;
    }

    public function getPdf() {      
        $html = $this->getHtml();
        $dompdf = new Dompdf(array('enable_remote' => true));
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();

        $pdfFileName = './invoice.pdf';
        file_put_contents($pdfFileName, $output);
        ob_end_clean();
        $dompdf->stream("./invoice.pdf", array("Attachment" => 1));
    }
}


$pdfCreator = new pdfCreator();
$pdfCreator->getPdf();
?>