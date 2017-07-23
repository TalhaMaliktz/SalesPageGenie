<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentController extends Controller
{
   public function Index()
   {
      return View('Index');
   }
   public function paymentComplete(Request $request)
   {
       // print_r($_GET);
       // The custom hidden field (user id) sent along with the button is retrieved here. 
        if($_GET['cm'])
        {
            $user=$_GET['cm'];
        }
        if($_GET['st'])
        {
            $status= $_GET['st'];  
        } 
        if($_GET['amt'])
        {
            $amount= $_GET['amt'];   
        } 
        // The unique transaction id. 
        if($_GET['tx'])
        {
            $tx= $_GET['tx'];   
        } 
        $identity = '52oFK3ACb_qkIFzQqk_ph_Y3gdugH-BjcGrAeWj5NjdyesNeYrmhp8b1Fkm'; 
        // Init curl
        $ch = curl_init(); 
        // Set request options 
        curl_setopt_array($ch, array ( CURLOPT_URL => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
        CURLOPT_POST => TRUE,
        CURLOPT_POSTFIELDS => http_build_query(array
            (
            'cmd' => '_notify-synch',
            'tx' => $tx,
            'at' => $identity,
            )),
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HEADER => FALSE,
        // CURLOPT_SSL_VERIFYPEER => TRUE,
        // CURLOPT_CAINFO => 'cacert.pem',
        ));
        // Execute request and get response and status code
        $response = curl_exec($ch);
        $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // Close connection
        curl_close($ch);
        if($status == 200 AND strpos($response, 'SUCCESS') === 0)
        {
           $paymentDetails = new Payment;
           $paymentDetails->TransactionID = $tx;
           $paymentDetails->Amount = $amount;
           $paymentDetails->Status = $status;
           $paymentDetails->user_id = $user;
           $paymentDetails->save();
           return View('PaymentComplete');
        }
        else{
           return View('PaymentCancel');   
        }

   }
   public function paymentCancel()
   {
       return View('PaymentCancel');
   }


   public function IPN()
   {
        // $req = 'cmd=_notify-validate';
        // foreach ($_POST as $key => $value) {
        // $value = urlencode(stripslashes($value));
        // $req .= "&$key=$value";
        // }
        // // post back to PayPal system to validate
        // $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
        // $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        // $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
        
        // $fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
        
        
        // if (!$fp) {
        // // HTTP ERROR
        // } else {
        // fputs ($fp, $header . $req);
        // while (!feof($fp)) {
        // $res = fgets ($fp, 1024);
        // if (strcmp ($res, "VERIFIED") == 0) {
        
        // echo 'payment done';
        
        // }
        
        // else if (strcmp ($res, "INVALID") == 0) {
        
        //         echo 'payment done not';
        // // PAYMENT INVALID & INVESTIGATE MANUALY!
        
        // }
        // }
        // fclose ($fp);
        // }
    }
}
