<?php
require_once "../../app/config.php";
$transactionPayEmail = $_POST['pay_to_email'];
$transactionPayFromEmail = $_POST['pay_from_email'];
$transactionMerchantId = $_POST['merchant_id'];
$transactionMbTransactionId = $_POST['mb_transaction_id'];
$transactionMAmount = $_POST['mb_amount'];
$transactionMbCurrency = $_POST['mb_currency'];
$transactionStatus = $_POST['status'];
$transactionMd5sig = $_POST['md5sig'];
$transactionAmount = $_POST['amount'];
$transactionCurrency = $_POST['currency'];
if (isset($_POST['customer_id']))
    $transactionCustomerId = $_POST['customer_id'];
if (isset($_POST['transaction_id']))
    $transactionId = $_POST['transaction_id'];
else
    $transactionId = '';
if (isset($_POST['detail1_description']))
    $detail1_description = $_POST['detail1_description'];
else
    $detail1_description = '';
if (isset($_POST['failed_reason_code']))
    $transactionFailedReasonCode = $_POST['failed_reason_code'];
if (isset($_POST['sha2sig']))
    $transactionSha2sig = $_POST['sha2sig'];
if (isset($_POST['neteller_id']))
    $transactionNetellerId = $_POST['neteller_id'];
if (isset($_POST['payment_type']))
    $transactionPaymentType = $_POST['payment_type'];
if (isset($_POST['merchant_fields']))
    $transactionMerchantFields = $_POST['merchant_fields'];

$md5signature = $transactionMerchantId . $transactionId . strtoupper($psetting['skrillmd5']) . $transactionMAmount . $transactionMbCurrency . $transactionStatus;

if ($md5signature == $transactionMd5sig)
    if ($transactionStatus == 2) {
        
        // Transaction is processed, do whatever you want with the given information
$castro=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposit WHERE token='$transactionId'"));
mysqli_query($dbc, "UPDATE deposit SET status=1 WHERE token='$transactionId'");
$user=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$castro['user_id']."'"));
$a=$user['balance']+$castro['amount'];
mysqli_query($dbc, "UPDATE users SET balance='$a' WHERE id='".$castro['user_id']."'");
echo"<script>window.location.href='".$url."/user/fund/1';</script>";
    } else {
echo"<script>window.location.href='".$url."/user/fund/2';</script>";
    }
else {
    //Signature mismatch
}