<?php
$userid=$_GET['userid'];

require('invoice.php');
$db=new PDO("mysql:host=localhost;dbname=si", 'root', '');

$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "Surprise Inside",
                  "Address\n" .
                  "No 87A\n".
                  "Colombo 6\n" .
                  "Western Province\n".
                  "Srilanka");
$pdf->fact_dev( "Invoice");
$pdf->temporaire( "Surprise Inside" );

date_default_timezone_set('Asia/Colombo');
$currentdate = date("m-d-Y");
//$pdf->addDate($currentdate );


$stmp=$db->query("SELECT * FROM `user` WHERE `userID`= '$userid'");
while($data=$stmp->fetch(PDO::FETCH_OBJ)){
    $pdf->addPageNumber("1");
    $pdf->addDate($currentdate );
    $pdf->addClient($data->username);
    $pdf->addClientAdresse("Client Details\n\nName: ".$data->firstName." ".$data->lastName."\nEmail Address: ".$data->emailAddress.
    "\nCient Referenrce: SI000".$data->userID);
    $pdf->addReglement("PICK UP");
    $pdf->addEcheance("7 DAYS");
    $pdf->addNumTVA("SI");
    $pdf->addReference($data->userID);
}
    

$cols=array( "ITEM ID"    => 23,
             "ITEM NAME"  => 78,
             "QUANTITY"     => 22,
             "UNIT PRICE"      => 26,
             "SUB TOTAL" => 20,
             "TOTAL"          => 21 );
$pdf->addCols( $cols);
$cols=array( "ITEM ID"    => "L",
             "ITEM NAME"  => "L",
             "QUANTITY"     => "C",
             "UNIT PRICE"      => "R",
             "SUB TOTAL" => "R",
             "TOTAL"          => "C" );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

$y    = 109;
$stmp=$db->query("SELECT * FROM `cart` WHERE `cart_userid`='$userid'");
$total=0;
while($data=$stmp->fetch(PDO::FETCH_OBJ)){
    $line = array( "ITEM ID"    => $data->cart_itemid,
                "ITEM NAME"     => $data->cart_itemname."\n" ."Description\n",
                "QUANTITY"      => $data->quantity,
                "UNIT PRICE"    => "Rs ".$data->cart_itemprice ,
                "SUB TOTAL" => "Rs ".$data->cart_itemprice*$data->quantity,
                "TOTAL"          => "-" );
                $total=$total+$data->cart_itemprice*$data->quantity;
    $size = $pdf->addLine( $y, $line );
    $y   += $size + 2;
}

$y    = 230;
$line = array( "ITEM ID"        => "-",
                "ITEM NAME"     => "-",
                "QUANTITY"      => "-",
                "UNIT PRICE"    => "-" ,
                "SUB TOTAL"     => "-",
                "TOTAL"         => "Rs ".$total );
$size = $pdf->addLine( $y, $line );



$pdf->Output();
?>
