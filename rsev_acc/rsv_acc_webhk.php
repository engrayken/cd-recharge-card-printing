<?php

require_once("../app/config.php");
include'concat.php';

$serName = $_SERVER['HTTP_HOST'];	

		$now = date('Y-m-d H:i:s', time());				
	//$user = $_SESSION['user'];
	
//Webhook Notification Data - Account Transfer






if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // fetch RAW input
    $json = file_get_contents('php://input');

    // decode json
    $request = json_decode($json);

    // expecting valid json
    if (json_last_error() !== JSON_ERROR_NONE) {
        die(header('HTTP/1.0 415 Unsupported Media Type'));
    }

    /**
     * Do something with object, structure will be like:
     * $object->accountId
     * $object->details->items[0]['contactName']
     */


 $code=$clientSecret.'|'.$request->paymentReference.'|'.$request->amountPaid.'|'.$request->paidOn.'|'.$request->transactionReference;

 $hashed = hash("sha512", $code);

$jhashed=$request->transactionHash;


if($jhashed!=$hashed) {
die('hash not match');
}

$transactionReference=$request->transactionReference;
			
	$ins = mysqli_query($dbc,"SELECT * FROM deposits WHERE trx='$transactionReference' ");
	$data = mysqli_fetch_array($ins);
								
	$status = $data['status'];
	
	
           

              $tid = $data['trx'];
if($transactionReference==$tid)
{ die(' <h2>error ocure during transaction please contact support  on '.$mynumber.'</h2>');

}

if($status=='success')
{ die('<h2>error ocure during funding wallet please contact support  on '.$mynumber.'</h2>');

}

 // confirm  payment    

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.monnify.com/api/v1/merchant/transactions/query?transactionReference=". rawurlencode($transactionReference));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Authorization: Basic $b64"
));

 $response = curl_exec($ch);
curl_close($ch);



 $tranx = json_decode($response);

if(!$tranx->responseBody->paymentStatus){
  // there was an error from the API
  die('API returned error: ' . $tranx->message);
}

//4000026317
$reference=$request->product->reference;


$ref= $tranx->responseBody->transactionReference;

if($tranx->responseBody->paymentStatus === 'PAID'){
    
    
  // amount to credit minus fees

 $paidamt = $tranx->responseBody->amountPaid;

$email=$tranx->responseBody->customerEmail;

 $charge ='60';


 $payamt = $paidamt-$charge;

$amtshow = number_format($payamt,2,'.',',');

 $fcredit=$amtshow;
    
 $fcredite= number_format($payamt,0,'.','');

$query_rec =mysqli_query($dbc, "SELECT * FROM users where reference='$reference' ");
			
$user=mysqli_fetch_array($query_rec);

  $aauser= $user['id'];          
 $ausername= $user['username'];  
 $aname= $user['name'];  
  $aemail= $user['email'];  
  
$axubalance= $user['dep_balance'];  

$balance=$axubalance+$fcredit;



                // update
             //   $tk = md5(uniqid());

     
mysqli_query($dbc, "UPDATE users SET dep_balance=dep_balance+$fcredite WHERE id='$aauser'");
				$statu = "success";
           
                $ta=$axubalance+$fcredite;
$product='Fund Wallet';

		$sqlpaylog="INSERT INTO deposits (user_id,amount,created_at,trx,balance,fbalance,status,rstatus,gateway_id) VALUES('$aauser','$fcredit','$now','$ref','$axubalance','$ta','1','$rstatus','101')";
		
 mysqli_query($dbc,$sqlpaylog); 




   // file_put_contents('error.txt', print_r($update, true));




/*
		$log = new insert();
		$log->input('transaction', 'id, type, credit, user, tuser, date', "0, 'EPAYMENT', $fcredit, 0, $aauser, '$now'");
		$log->input('transaction', 'id, type, credit, user, tuser, date', "0, 'EPAYMENT', $fcredit, $aauser, 0, '$now'");
				
$dat = date("d/m/Y");
*/

				// send email....

$to = $aemail;
$too='kennethayogu@gmail.com';

require '../lib/phpmailer/PHPMailerAutoload.php';
		if($eset['status']==1){
			require_once "../lib/mail/cashdeposit_ver.php";
			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
			$mail->SMTPDebug = 0;                                
			$mail->isSMTP();                                      
			$mail->Host = $eset['hoste'];; 
			$mail->SMTPAuth = true;                        
			$mail->Username = $eset['username'];                 
			$mail->Password = $eset['password'];                          
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = $eset['porte'];                                    
			$mail->setFrom($eset['frome'], $set['site_name']);
			$mail->addAddress($to, $set['site_name']);          
			$mail->addReplyTo($eset['reply_to'], $set['site_name']);
			$mail->isHTML(true);                               // Set email format to HTML
			$mail->Subject ='Deposit request under review';
			$mail->Body=$email_content;
			$mail->AltBody = $set['site_name'];
			$mail->send();

    // dump to file so you can see
    file_put_contents('test.txt', print_r($request, true));

	}	


}

}


?>