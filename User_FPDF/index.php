<?php 
    require "FPDF/fpdf.php";

    class report extends FPDF{
        function header(){
            $this->SetFont('Arial','B',14);
            $this->Cell(276,5,"User Details",0,0,'C');
            $this->Ln();
            $this->SetFont('Times','',12);
            $this->Cell(276,10,"Surprise Insight",0,0,'C');
            $this->Ln(20);
        }

        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
        }

        function headerTable(){
            $this->SetFont('Times','B',12);
            $this->Cell(20,10,"ID",1,0,'C');
            $this->Cell(40,10,"First Name",1,0,'C');
            $this->Cell(40,10,"Last Name",1,0,'C');
            $this->Cell(40,10,"User Name",1,0,'C');
            $this->Cell(60,10,"Email Address",1,0,'C');
            $this->Cell(40,10,"User Role",1,0,'C');
            $this->Ln();

        }

    }

    $pdf =new report();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerTable();
    $pdf->Output();






















?>