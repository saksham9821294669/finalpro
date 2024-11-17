<?php
// eSewa transaction verification
$refId = $_GET['refId'];
$pid = $_GET['oid'];
$amount = $_GET['amt'];
$scd = "your-merchant-id";

// eSewa verification URL
$esewa_verification_url = "https://uat.esewa.com.np/epay/transrec";

$data = [
    'amt' => $amount,
    'rid' => $refId,
    'pid' => $pid,
    'scd' => $scd,
];

$curl = curl_init($esewa_verification_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
curl_close($curl);

if (strpos($response, "Success") !== false) {
    // Payment was successful, update your order status
    echo "Payment was successful!";
} else {
    // Payment failed, handle accordingly
    echo "Payment verification failed!";
}
?>
