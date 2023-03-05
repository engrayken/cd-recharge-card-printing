<?php
$func=$_GET['id'];
require_once('../vendor/autoload.php');
require_once('../lib/CPHelper.php');
require_once('../lib/coinPayments.php');
require_once('../lib/CoinPaymentHosted.php');
if($func=='depositconfirm'){
	depositconfirm();
}elseif($func=='ipnpaypal'){
	ipnpaypal();
}elseif($func=='ipnperfect'){
	ipnperfect();
}elseif($func=='ipnskrill'){
	ipnskrill();
}elseif($func=='ipnblockchain'){
	ipnblockchain();
}elseif($func=='coinpaybtc'){
	coinpaybtc();
}elseif($func=='coinpayeth'){
	coinpayeth();
}elseif($func=='coinpaybch'){
	coinpaybch();
}elseif($func=='coinpaydash'){
	coinpaydash();
}elseif($func=='coinpaydoge'){
	coinpaydoge();
}elseif($func=='coinpayltc'){
	coinpayltc();
}elseif($func=='ipncoinpayment'){
	ipncoinpayment();
}elseif($func=='coinpay'){
	coinpay();
}
function userDataUpdate($track){
	$data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
	mysqli_query($dbc,"UPDATE deposits SET status=1 WHERE id='".$data['id']."'");
	$user = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$data['user_id']."'"));
	$bal = $user['balance']+$data['amount'];
	mysqli_query($dbc,"UPDATE users SET balance='$bal' WHERE id='".$data['user_id']."'");
}

function depositconfirm(){
	require_once("config.php");
	$track = mysqli_real_escape_string($dbc, trim($_POST['trx']));
	$data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
	if ($data['status'] != 0) {
        redirect($url."/user/fund/4");
    }
    $gatewayData=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id='".$data['gateway_id']."'"));
    if ($data['gateway_id'] == 101) {
    	redirect($url."/user/payment/paypal?id=".$track);
	}elseif ($data['gateway_id'] == 102) {
        redirect($url."/user/payment/perfect?id=".$track);
    }elseif ($data['gateway_id'] == 104) {
      	redirect($url."/user/payment/skrill?id=".$track);
    }elseif ($data['gateway_id'] == 501) {
        $all = file_get_contents("https://blockchain.info/ticker");
        $res = json_decode($all);
        $btcrate = $res->USD->last;
        $usd = $data['usd'];
        $btcamount = $usd / $btcrate;
        $btc = round($btcamount, 8);
        $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
        if ($data['btc_amo'] == 0 || $data['btc_wallet'] == "") {
            $blockchain_root = "https://blockchain.info/";
            $blockchain_receive_root = "https://api.blockchain.info/";
            $mysite_root = $url;
            $secret = "ABIR";
            $my_xpub = $gatewayData['val2'];
            $my_api_key = $gatewayData['val1'];
            $invoice_id = $track;
            $callback_url = $mysite_root . "/app/payment?id=ipnblockchain&invoice_id=" . $invoice_id . "&secret=" . $secret;
            $resp = @file_get_contents($blockchain_receive_root . "v2/receive?key=" . $my_api_key . "&callback=" . urlencode($callback_url) . "&xpub=" . $my_xpub);
            if (!$resp) {
            	redirect($url."/user/fund/5");
            }
            $response = json_decode($resp);
            $sendto = $response->address;
            mysqli_query($dbc,"UPDATE deposits SET btc_wallet='$sendto',btc_amo='$btc' WHERE trx='$track'");
        }
        $DepositData = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
        $btcamo = $DepositData['btc_amo'];
        $btcwallet = $DepositData['btc_wallet'];
        $var = "bitcoin:$btcwallet?amount=$btcamo";
		redirect($url."/user/payment/blockchain?id=".$var."&amount=".$btcamo."&sendto=".$btcwallet);
    }elseif ($data['gateway_id'] == 505) {
            $method = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=505"));
            if ($data['btc_amo'] == 0 || $data['btc_wallet'] == "") {
                $cps = new CoinPaymentHosted();
                $cps->Setup($method['val2'], $method['val1']);
                $callbackUrl = $url."/app/payment?id=coinpaybtc";
                $req = array(
                    'amount' => $data['usd'],
                    'currency1' => 'USD',
                    'currency2' => 'BTC',
                    'custom' => $data['trx'],
                    'ipn_url' => $callbackUrl,
                );
                $result = $cps->CreateTransaction($req);
                if ($result['error'] == 'ok') {
                    $bcoin = sprintf('%.08f', $result['result']['amount']);
                    $sendadd = $result['result']['address'];
                    $data['btc_amo'] = $bcoin;
                    $data['btc_wallet'] = $sendadd;
                    mysqli_query($dbc,"UPDATE deposits SET btc_wallet='$wallet',btc_amo='$bcin' WHERE trx='$track'");
                } else {
                    redirect($url."/user/fund/6");
                }
            }
            $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
            $btcwallet = $data['btc_wallet'];
            $btcamo = $data['btc_amo'];
            $var = "bitcoin:$wallet";
            redirect($url."/user/payment/coinpaybtc?id=".$var."&amount=".$btcamo."&sendto=".$btcwallet);
    }elseif ($data['gateway_id'] == 506) {
        $method = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=506"));
        if ($data['btc_amo'] == 0 || $data['btc_wallet'] == "") {
            $cps = new CoinPaymentHosted();
            $cps->Setup($method['val2'], $method['val1']);
            $callbackUrl = $url."/app/payment?id=coinpayeth";
            $req = array(
                'amount' => $data['usd'],
                'currency1' => 'USD',
                'currency2' => 'ETH',
                'custom' => $data['trx'],
                'ipn_url' => $callbackUrl,
            );
            $result = $cps->CreateTransaction($req);
            if ($result['error'] == 'ok') {
                $bcoin = sprintf('%.08f', $result['result']['amount']);
                $sendadd = $result['result']['address'];
                $data['btc_amo'] = $bcoin;
                $data['btc_wallet'] = $sendadd;
                mysqli_query($dbc,"UPDATE deposits SET btc_wallet='$wallet',btc_amo='$bcin' WHERE trx='$track'");
            } else {
                redirect($url."/user/fund/6");
            }
        }
        $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
        $btcwallet = $data['btc_wallet'];
        $btcamo = $data['btc_amo'];
        $var = "ethereum:$wallet";
        redirect($url."/user/payment/coinpayeth?id=".$var."&amount=".$btcamo."&sendto=".$btcwallet);
    }elseif ($data['gateway_id'] == 507) {
        $method = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=507"));
        if ($data['btc_amo'] == 0 || $data['btc_wallet'] == "") {
            $cps = new CoinPaymentHosted();
            $cps->Setup($method['val2'], $method['val1']);
            $callbackUrl = $url."/app/payment?id=coinpaybch";
            $req = array(
                'amount' => $data['usd'],
                'currency1' => 'USD',
                'currency2' => 'BCH',
                'custom' => $data['trx'],
                'ipn_url' => $callbackUrl,
            );
            $result = $cps->CreateTransaction($req);
            if ($result['error'] == 'ok') {
                $bcoin = sprintf('%.08f', $result['result']['amount']);
                $sendadd = $result['result']['address'];
                $data['btc_amo'] = $bcoin;
                $data['btc_wallet'] = $sendadd;
                mysqli_query($dbc,"UPDATE deposits SET btc_wallet='$wallet',btc_amo='$bcin' WHERE trx='$track'");
            } else {
                redirect($url."/user/fund/6");
            }
        }
        $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
        $btcwallet = $data['btc_wallet'];
        $btcamo = $data['btc_amo'];
        $var = "bitcoincash:$wallet";
        redirect($url."/user/payment/coinpaybch?id=".$var."&amount=".$btcamo."&sendto=".$btcwallet);
    }elseif ($data['gateway_id'] == 508) {
        $method = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=508"));
        if ($data['btc_amo'] == 0 || $data['btc_wallet'] == "") {
            $cps = new CoinPaymentHosted();
            $cps->Setup($method['val2'], $method['val1']);
            $callbackUrl = $url."/app/payment?id=coinpaydash";
            $req = array(
                'amount' => $data['usd'],
                'currency1' => 'USD',
                'currency2' => 'DASH',
                'custom' => $data['trx'],
                'ipn_url' => $callbackUrl,
            );
            $result = $cps->CreateTransaction($req);
            if ($result['error'] == 'ok') {
                $bcoin = sprintf('%.08f', $result['result']['amount']);
                $sendadd = $result['result']['address'];
                $data['btc_amo'] = $bcoin;
                $data['btc_wallet'] = $sendadd;
                mysqli_query($dbc,"UPDATE deposits SET btc_wallet='$wallet',btc_amo='$bcin' WHERE trx='$track'");
            } else {
                redirect($url."/user/fund/6");
            }
        }
        $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
        $btcwallet = $data['btc_wallet'];
        $btcamo = $data['btc_amo'];
        $var = "dash:$wallet";
        redirect($url."/user/payment/coinpaydash?id=".$var."&amount=".$btcamo."&sendto=".$btcwallet);
    }elseif ($data['gateway_id'] == 509) {
        $method = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=509"));
        if ($data['btc_amo'] == 0 || $data['btc_wallet'] == "") {
            $cps = new CoinPaymentHosted();
            $cps->Setup($method['val2'], $method['val1']);
            $callbackUrl = $url."/app/payment?id=coinpaydoge";
            $req = array(
                'amount' => $data['usd'],
                'currency1' => 'USD',
                'currency2' => 'DOGE',
                'custom' => $data['trx'],
                'ipn_url' => $callbackUrl,
            );
            $result = $cps->CreateTransaction($req);
            if ($result['error'] == 'ok') {
                $bcoin = sprintf('%.08f', $result['result']['amount']);
                $sendadd = $result['result']['address'];
                $data['btc_amo'] = $bcoin;
                $data['btc_wallet'] = $sendadd;
                mysqli_query($dbc,"UPDATE deposits SET btc_wallet='$wallet',btc_amo='$bcin' WHERE trx='$track'");
            } else {
                redirect($url."/user/fund/6");
            }
        }
        $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
        $btcwallet = $data['btc_wallet'];
        $btcamo = $data['btc_amo'];
        $var = "doge:$wallet";
        redirect($url."/user/payment/coinpayeth?id=".$var."&amount=".$btcamo."&sendto=".$btcwallet);
    }elseif ($data['gateway_id'] == 510) {
        $method = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=510"));
        if ($data['btc_amo'] == 0 || $data['btc_wallet'] == "") {
            $cps = new CoinPaymentHosted();
            $cps->Setup($method['val2'], $method['val1']);
            $callbackUrl = $url."/app/payment?id=coinpayltc";
            $req = array(
                'amount' => $data['usd'],
                'currency1' => 'USD',
                'currency2' => 'LTC',
                'custom' => $data['trx'],
                'ipn_url' => $callbackUrl,
            );
            $result = $cps->CreateTransaction($req);
            if ($result['error'] == 'ok') {
                $bcoin = sprintf('%.08f', $result['result']['amount']);
                $sendadd = $result['result']['address'];
                $data['btc_amo'] = $bcoin;
                $data['btc_wallet'] = $sendadd;
                mysqli_query($dbc,"UPDATE deposits SET btc_wallet='$wallet',btc_amo='$bcin' WHERE trx='$track'");
            } else {
                redirect($url."/user/fund/6");
            }
        }
        $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
        $btcwallet = $data['btc_wallet'];
        $btcamo = $data['btc_amo'];
        $var = "litecoin:$wallet";
        redirect($url."/user/payment/coinpayeth?id=".$var."&amount=".$btcamo."&sendto=".$btcwallet);
    }elseif ($data['gateway_id'] == 512) {
        $method = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=512"));
        $usd = $data['usd'];
        \CoinGate\CoinGate::config(array(
            'environment'               => 'live', // sandbox OR live
            'auth_token'                => $method['val1']
        ));
        $post_params = array(
            'order_id'          => $data['trx'],
            'price_amount'      => $usd,
            'price_currency'    => 'USD',
            'receive_currency'  => 'USD',
            'callback_url'      => $url."/app/payment?id=ipncoinpayment",
            'cancel_url'        => $url."/user/fund/0",
            'success_url'       => $url."/user/fund/0",
            'title'             => 'Deposit' . $data['trx'],
            'description'       => 'Deposit'
        );
        $order = \CoinGate\Merchant\Order::create($post_params);
        if ($order){
            redirect($order->payment_url);
            exit();
        }else{
			redirect($url."/user/fund/2");
        }
    }elseif ($data['gateway_id'] == 513) {
        $all = file_get_contents("https://blockchain.info/ticker");
        $res = json_decode($all);
        $btcrate = $res->USD->last;
        $amon = $data['amount'];
        $usd = $data['usd'];
        $bcoin = round($usd / $btcrate, 8);
        $method = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=513"));
        $callbackUrl = $url."/app/payment?id=coinpay";
        $CP = new coinPayments();
        $CP->setMerchantId($method['val1']);
        $CP->setSecretKey($method['val2']);
        $ntrc = $data['trx'];
        $form = $CP->createPayment('Purchase Coin', 'BTC', $bcoin, $ntrc, $callbackUrl);
        $bit['form']=$form;
        redirect($url."/user/payment/coinpay?id=".$bit);
    }
}
function ipnpaypal(){
	require_once("config.php");
    $raw_post_data = file_get_contents('php://input');
    $raw_post_array = explode('&', $raw_post_data);
    $myPost = array();
    foreach ($raw_post_array as $keyval) {
        $keyval = explode('=', $keyval);
        if (count($keyval) == 2)
            $myPost[$keyval[0]] = urldecode($keyval[1]);
    }

    $req = 'cmd=_notify-validate';
    if (function_exists('get_magic_quotes_gpc')) {
        $get_magic_quotes_exists = true;
    }
    foreach ($myPost as $key => $value) {
        if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
            $value = urlencode(stripslashes($value));
        } else {
            $value = urlencode($value);
        }
        $req .= "&$key=$value";
    }

    $paypalURL = "https://ipnpb.paypal.com/cgi-bin/webscr?";
    $callUrl = $paypalURL . $req;
    $verify = file_get_contents($callUrl);
    if ($verify == "VERIFIED") {
        //PAYPAL VERIFIED THE PAYMENT
        $receiver_email = $_POST['receiver_email'];
        $mc_currency = $_POST['mc_currency'];
        $mc_gross = $_POST['mc_gross'];
        $track = $_POST['custom'];

        //GRAB DATA FROM DATABASE!!
        $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
        $gatewayData=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=101"));
        $amount = $data['usd'];

        if ($receiver_email == $gatewayData['val1'] && $mc_currency == "USD" && $mc_gross == $amount && $data['status'] == '0') {
            //Update User Data
            userDataUpdate($track);
        }
    }
}
function ipnperfect(){
    $gatewayData=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=102"));
    $passphrase = strtoupper(md5($gatewayData['val2']));

    define('ALTERNATE_PHRASE_HASH', $passphrase);
    define('PATH_TO_LOG', '/somewhere/out/of/document_root/');
    $string =
        $_POST['PAYMENT_ID'] . ':' . $_POST['PAYEE_ACCOUNT'] . ':' .
        $_POST['PAYMENT_AMOUNT'] . ':' . $_POST['PAYMENT_UNITS'] . ':' .
        $_POST['PAYMENT_BATCH_NUM'] . ':' .
        $_POST['PAYER_ACCOUNT'] . ':' . ALTERNATE_PHRASE_HASH . ':' .
        $_POST['TIMESTAMPGMT'];

    $hash = strtoupper(md5($string));
    $hash2 = $_POST['V2_HASH'];

    if ($hash == $hash2) {

        $amo = $_POST['PAYMENT_AMOUNT'];
        $unit = $_POST['PAYMENT_UNITS'];
        $track = $_POST['PAYMENT_ID'];

        $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));

        if ($_POST['PAYEE_ACCOUNT'] == $gatewayData['val1'] && $unit == "USD" && $amo == $data['usd'] && $data['status'] == '0') {
            //Update User Data
            userDataUpdate($track);
        }
    }
}
function ipnskrill(){
	$track = $_POST['transaction_id'];
    $skrill = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=102"));
    $concatFields = $_POST['merchant_id']
        . $_POST['transaction_id']
        . strtoupper(md5($skrill['val2']))
        . $_POST['mb_amount']
        . $_POST['mb_currency']
        . $_POST['status'];

	$data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));

    if (strtoupper(md5($concatFields)) == $_POST['md5sig'] && $_POST['status'] == 2 && $_POST['pay_to_email'] == $skrill['val1'] && $data['status'] = '0') {
        //Update User Data
        userDataUpdate($track);

    }
}
function ipnblockchain(){
    $gatewayData = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id=501"));
    $track = $_GET['invoice_id'];
    $secret = $_GET['secret'];
    $address = $_GET['address'];
    $value = $_GET['value'];
    $confirmations = $_GET['confirmations'];
    $value_in_btc = $_GET['value'] / 100000000;
    $trx_hash = $_GET['transaction_hash'];
    $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
    if ($data['status'] == 0) {
        if ($data['btc_amo'] == $value_in_btc && $data['btc_wallet'] == $address && $secret == "ABIR" && $confirmations > 2) {
           userDataUpdate($track);
        }
    }
}
function coinpaybtc(Request $request){
    $track = $request->custom;
    $status = $request->status;
    $amount2 = floatval($request->amount2);
    $currency2 = $request->currency2;
    $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
    $bcoin = $data['btc_amo'];
    if ($status >= 100 || $status == 2) {
        if ($currency2 == "BTC" && $data['status'] == '0' && $data['btc_amo'] <= $amount2) {
            userDataUpdate($track);
        }
    }
}function coinpayeth(Request $request){
    $track = $request->custom;
    $status = $request->status;
    $amount2 = floatval($request->amount2);
    $currency2 = $request->currency2;
    $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
    $bcoin = $data['btc_amo'];
    if ($status >= 100 || $status == 2) {
        if ($currency2 == "ETH" && $data['status'] == '0' && $data['btc_amo'] <= $amount2) {
            userDataUpdate($track);
        }
    }
}function coinpaybch(Request $request){
    $track = $request->custom;
    $status = $request->status;
    $amount2 = floatval($request->amount2);
    $currency2 = $request->currency2;
    $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
    $bcoin = $data['btc_amo'];
    if ($status >= 100 || $status == 2) {
        if ($currency2 == "BCH" && $data['status'] == '0' && $data['btc_amo'] <= $amount2) {
            userDataUpdate($track);
        }
    }
}function coinpaydash(Request $request){
    $track = $request->custom;
    $status = $request->status;
    $amount2 = floatval($request->amount2);
    $currency2 = $request->currency2;
    $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
    $bcoin = $data['btc_amo'];
    if ($status >= 100 || $status == 2) {
        if ($currency2 == "DASH" && $data['status'] == '0' && $data['btc_amo'] <= $amount2) {
            userDataUpdate($track);
        }
    }
}function coinpaydoge(Request $request){
    $track = $request->custom;
    $status = $request->status;
    $amount2 = floatval($request->amount2);
    $currency2 = $request->currency2;
    $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
    $bcoin = $data['btc_amo'];
    if ($status >= 100 || $status == 2) {
        if ($currency2 == "DOGE" && $data['status'] == '0' && $data['btc_amo'] <= $amount2) {
            userDataUpdate($track);
        }
    }
}function coinpayltc(Request $request){
    $track = $request->custom;
    $status = $request->status;
    $amount2 = floatval($request->amount2);
    $currency2 = $request->currency2;
    $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
    $bcoin = $data['btc_amo'];
    if ($status >= 100 || $status == 2) {
        if ($currency2 == "LTC" && $data['status'] == '0' && $data['btc_amo'] <= $amount2) {
            userDataUpdate($track);
        }
    }
}    
function ipncoinpayment(){
    $data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='".$_POST['order_id']."'"));
    if($_POST['status'] == 'paid' && $_POST['price_amount'] == $data['usd_amo'] && $data['status'] == '0')
    {
       userDataUpdate($data);
    }

}
function coinpay(Request $request){
    $track = $request->custom;
    $status = $request->status;
    $amount1 = floatval($request->amount1);
    $currency1 = $request->currency1;
	$data = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE trx='$track'"));
    $bcoin = $data['btc_amo'];
    if ($currency1 == "BTC" && $amount1 >= $bcoin && $data['status'] == '0') {
        if ($status >= 100 || $status == 2) {
            userDataUpdate($data);
        }
    }

}

