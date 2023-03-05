
<?php
require_once("../app/config.php");

    $new_ticket = mysqli_query($dbc, "SELECT * FROM mypin where user_id=$row[id] and  pin!='' and orderno=$_GET[pdf] ");
 

require('fpdf/WriteHTML.php');
 
$pdf=new PDF_HTML();
$pdf->AliasNbPages();
 
//add page automatically for its true parameter
 
$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();
 


   
//add logo image here
 
//$pdf->Image('../asset/images/logo.png',18,13,33);
 
//set font style
 /*
$pdf->SetFont('Arial','B',14);
$pdf->WriteHTML('<para><h1>Codefixup.com - API and Web development Tutorial Website</h1><br>
Website: <u>www.codefixup.com</u></para><br><br>How to Convert HTML to PDF with fpdf example');
 
//set the form of pdf
 
$pdf->SetFont('Arial','B',8);
*/

 
//assign the form post value in a variable and pass it. 


$htmlTable='<table width="100%">
    <tr>
    <td>
    <form id="form1" name="form1" method="post" action="voucher.php">
    <table class="mystyle" cellpadding="3" width="100%"  border="2">'; 

$no = 0;
	
   while($ticket_row= mysqli_fetch_array($new_ticket)){
		//if($no == 0){ 
//$htmlTable1=' <tr>';
}
//}
/*
$htmlTable2='   <td>
<table><tr><td>'.$row['bname'].'</td><td>';
 
if(strtolower($ticket_row['net'])=='mtn') {
$htmlTable3='<small style="font-size:15px">N'.$ticket_row['deno'].'  <img src="../asset/images/MTN-Airtime.jpg" height="20" width="20" /></small>';
}
elseif(strtolower($ticket_row['net'])=='airtel') { 
$htmlTable4='<small style="font-size:15px">N'.$ticket_row['deno'].'  <img src="../asset/images/Airtel-Airtime.jpg" height="20" width="20" /></small>'; }
elseif(strtolower($ticket_row['net'])=='glo') { 
$htmlTable5='<small style="font-size:15px">N'.$ticket_row['deno'].'  <img src="../asset/images/GLO-Airtime.jpg" height="20" width="20" /></small>'; }

elseif(strtolower($ticket_row['net'])=='9mobile') { $htmlTable6='<small style="font-size:15px">N'.$ticket_row['deno'].'<img src="../asset/images/9mobile-Airtime.jpg" height="20" width="20" /></small>'; }
 $htmlTable7='</td></tr></table>
<small style="font-size:12px"><table cellpadding="1">

<tr><td style="font-size:10px">Ref:</td><td style="font-size:10px">'.$ticket_row['orderno'].'</td></tr>
<tr><td><h4>PIN:</h4></td><td><h4><b>'. implode('-', str_split($ticket_row['pin'], 4)).'</b></h4></td></tr>
<tr><td>S/N:</td><td>'.$ticket_row['seria'].'</td></tr>
<tr><td>Dial:</td><td><b>'.$ticket_row['descr'].'</b></td></tr>
<tr><td>DATE:</td><td>'.$ticket_row['date'].'</td></tr></table></small>';
$no = $no + 1;
  $htmlTable8=' </td>';
if($no ==$noo)
		{
  $htmlTable9='   </tr>';
$no =0;
		}
	}

  $htmlTable10='</table>
      </form>
      </td>
    </tr>
    </table>';
*/
//Write HTML to pdf file and output that file on the web browser.
 
$pdf->WriteHTML("$htmlTable $htmlTable1");
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 
 
?>