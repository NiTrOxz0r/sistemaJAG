<?php

/**
 * @author Alejandro Granadillo <slayerfat@hotmail.com>
 *
 * {@internal clase creada para generar header y navbar personalizado
 * para la institucion, TRABAJO EN PROGRESO.}
 *
 * @version 0.1
 */
class TCPDFEnvenenado extends TCPDF {

  public function Header() {
    // Logo
    $this->SetY(30);
    $enlace = enlaceDinamico('imagenes/logo_institucion.jpg');
    $this->Image($enlace, 0, 0, '30', '30', 'JPG', '', 'T', true, 300, '', false, false, 0, true, false, false);
    // Set font
    $this->SetFont('helvetica', 'B', 12);
    $this->ln();
    // Title,
  // "
    $this->Cell(0, 0, 'Republica Bolivariana de Venezuela', 0, 1, 'C', 0, '', 0);
    $this->Cell(0, 0, 'Ministerio del Poder Popular para la Educacion', 0, 1, 'C', 0, '', 0);
    $this->Cell(0, 0, 'Unidad Educativa Nacional Bolivariana "José Antonio González"', 0, 1, 'C', 0, '', 0);
  }

  public function Footer() {
    // Position at 15 mm from bottom
    $this->SetY(-15);
    // Set font
    $this->SetFont('helvetica', 'I', 8);
    // Page number
    $this->Cell(0, 10, 'Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
  }
}
?>
