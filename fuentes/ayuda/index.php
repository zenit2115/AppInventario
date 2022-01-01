
<?php
$pdf = 'C:\xampp\htdocs\AppInventario\images\ayuda.pdf';
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="'.$pdf.'"');
readfile($pdf);

?>