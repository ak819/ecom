<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');  
require_once APPPATH."/third_party/PHPExcel.php";
 
class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }

  /*public function stream($filename, $table_data = null) 
  {
  	/*echo "In Stream function";
  	echo "FileName :".$filename;
  	print_r($table_data);
  	exit;*/

  	//$this->load->library('excel');
	/*$this->excel->setActiveSheetIndex(0);
	$this->excel->getActiveSheet()
    ->getPageSetup()
    ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	$this->excel->getActiveSheet()
    ->getPageSetup()
    ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
	
	$this->excel->getActiveSheet()
    ->getPageMargins()->setTop(1);
	$this->excel->getActiveSheet()
    ->getPageMargins()->setRight(0.75);
	$this->excel->getActiveSheet()
    ->getPageMargins()->setLeft(0.10);
	$this->excel->getActiveSheet()
    ->getPageMargins()->setBottom(1);

	$this->excel->getActiveSheet()->setTitle('test worksheet');

	$this->excel->getActiveSheet()->setCellValue('A1', $cat_name);
//change the font size
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
//make the font become bold
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
//merge cell A1 until D1
$this->excel->getActiveSheet()->mergeCells('A1:E1');
//set aligment to center for that merged cell (A1 to D1)
$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 $styleArray = array(
      'borders' => array(
          'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
          )
      )
  );

 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
 //$this->excel->getActiveSheet()->getRowDimension($columnID)->setRowHeight(10);
$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);

//$this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
//$this->excel->getActiveSheet()->getColumnDimension('H')->setVisible(false);

$this->excel->getActiveSheet()->getStyle('B3:N3')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('B3:N3')->getFont()->setBold(true);

foreach(range('B2','J2') as $columnID)
{
   // $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
   //$this->excel->getActiveSheet()->getRowDimension($columnID)->setRowHeight(10);
	$this->excel->getActiveSheet()->getStyle($columnID)->getFont()->setSize(12);
	$this->excel->getActiveSheet()->getStyle($columnID)->getFont()->setBold(true);
	

}

foreach(range('B3','J3') as $columnID)
{
   // $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
   //$this->excel->getActiveSheet()->getRowDimension($columnID)->setRowHeight(10);
	$this->excel->getActiveSheet()->getStyle($columnID)->getFont()->setSize(12);
	$this->excel->getActiveSheet()->getStyle($columnID)->getFont()->setBold(true);
	
}
$phpColor = new PHPExcel_Style_Color();
$phpColor->setRGB('FF0000');  
$phpColor->setRGB('FF0000');
$this->excel->getActiveSheet()->setAutoFilter('B3:J3');

$this->excel->getActiveSheet()->setCellValue('B3', 'Item Number');
//$this->excel->getActiveSheet()->getColumnDimension('B3')->setWidth(12);
$this->excel->getActiveSheet()->setCellValue('C3', 'Desciption');

$this->excel->getActiveSheet()->setCellValue('D3', 'SLCD');
$this->excel->getActiveSheet()->setCellValue('E3', 'Groupnm');
$this->excel->getActiveSheet()->setCellValue('F3', 'MFG');
$this->excel->getActiveSheet()->setCellValue('G3', 'Rate');

$this->excel->getActiveSheet()->setCellValue('H3', 'Crate');
$this->excel->getActiveSheet()->setCellValue('I3', 'Amount');
$this->excel->getActiveSheet()->setCellValue('J3', 'Prate');

$this->excel->getActiveSheet()->setCellValue('K3', 'Min Rate');
$this->excel->getActiveSheet()->setCellValue('L3', 'Max Rate');
$this->excel->getActiveSheet()->setCellValue('M3', 'Stkqty');

$this->excel->getActiveSheet()->setCellValue('N3', 'Pendord');
$this->excel->getActiveSheet()->setCellValue('O3', 'HSN');
$this->excel->getActiveSheet()->setCellValue('P3', 'GST');

$this->excel->getActiveSheet()->setCellValue('Q3', 'CGST');
$this->excel->getActiveSheet()->setCellValue('R3', 'SGST');

$this->excel->getActiveSheet()->getStyle('B3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('C3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('D3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('E3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('F3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('G3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('H3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('I3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('J3')->getFont()->setColor( $phpColor );

$this->excel->getActiveSheet()->getStyle('K3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('L3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('M3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('N3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('O3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('P3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('Q3')->getFont()->setColor( $phpColor );
$this->excel->getActiveSheet()->getStyle('R3')->getFont()->setColor( $phpColor );
//$this->excel->getActiveSheet()->getStyle('J3')->getFont()->setColor( $phpColor );
//$this->excel->getActiveSheet()->getStyle('K3')->getFont()->setColor( $phpColor );

	$i=4;
	$j='B';
	$k='C';
	$l='D';
	$m='E';
	$n='F';
	$o='G';
	$p='H';
	$q='I';
	$r='J';

	$s='K';
	$t='L';
	$u='M';
	$v='N';
	$w='O';
	$x='P';
	$y='Q';
	$z='R';
	

	foreach($table_data as $row)
		{
			//$this->excel->getDefaultStyle()->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($j.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($k.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($l.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($m.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($n.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($o.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($p.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($q.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($r.$i)->applyFromArray($styleArray);

			$this->excel->getActiveSheet()->getStyle($s.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($t.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($u.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($v.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($w.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($x.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($y.$i)->applyFromArray($styleArray);
			$this->excel->getActiveSheet()->getStyle($z.$i)->applyFromArray($styleArray);
						
			//$this->excel->getActiveSheet()->getStyle($s.$i)->applyFromArray($styleArray);
			
			
			$this->excel->getActiveSheet()->getStyle($j.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($k.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($l.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($m.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($n.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($o.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($p.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($q.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($r.$i)->getFont()->setBold(false);

			$this->excel->getActiveSheet()->getStyle($s.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($t.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($u.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($v.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($w.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($x.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($y.$i)->getFont()->setBold(false);
			$this->excel->getActiveSheet()->getStyle($z.$i)->getFont()->setBold(false);
			
			
			
			$this->excel->getActiveSheet()->getStyle($j.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($j.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$this->excel->getActiveSheet()->getStyle($k.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($l.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			 	//$this->excel->getActiveSheet()->getStyle($l.$i)->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle($m.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($n.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($o.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($p.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($q.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($r.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

			$this->excel->getActiveSheet()->getStyle($s.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($t.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($u.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($v.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($w.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($x.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

			$this->excel->getActiveSheet()->getStyle($y.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$this->excel->getActiveSheet()->getStyle($z.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			
			//$this->excel->getActiveSheet()->getStyle($s.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


				 $this->excel->setActiveSheetIndex(0)->setCellValue($j.$i, $row->uname);
				 $this->excel->setActiveSheetIndex(0)->setCellValue($k.$i, $row->fee_cat);
				 $this->excel->setActiveSheetIndex(0)->setCellValue($l.$i, $row->paymentmode);
				  $this->excel->setActiveSheetIndex(0)->setCellValue($m.$i, $row->amount);
				   $this->excel->setActiveSheetIndex(0)->setCellValue($n.$i, $row->txnid);

				   if(($row->paymentmode=='dd')||($row->paymentmode=='neft')){
				   	$this->excel->setActiveSheetIndex(0)->setCellValue($o.$i, $row->tr_date);
				   }
				   else
				   {
				   		$this->excel->setActiveSheetIndex(0)->setCellValue($o.$i, $row->date);
				   }
				    
				     $this->excel->setActiveSheetIndex(0)->setCellValue($p.$i, $row->status);
				     $this->excel->setActiveSheetIndex(0)->setCellValue($q.$i, $row->email);
				      $this->excel->setActiveSheetIndex(0)->setCellValue($r.$i, $row->mobile);
	$i++;
		}	

 	$filename='product.xls'; //save our workbook as this file name
 
        header('Content-Type: application/vnd.ms-excel'); //mime type
 
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
 
        header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
       
    }
    */

}
?>