<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "finiup@doifoo.zendesk.com";
    $email_subject = "Pay.richiesoft | New Wire deposit";
 
    function died($error) {
        // your error code can go here
		echo "<br \><br \><div align='center'><img src='payrichiesoft_black.png' width='200px'></div><br \><br />";
        echo "<div align='center'>Pay.richiesoft | Submission Error</div><br />";
        echo "<div align='center'>Kindly enter a valid Email Address.</div><br /><br />";
        /* echo $error."<br /><br />"; */
        echo "<div align='center'>Please <a href='https://finiup.com/adpotbox/others.html#wire'>go back</a> and 
		fix these errors.</div><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['type']) ||
	    !isset($_POST['name']) ||
        !isset($_POST['product']) ||
		!isset($_POST['bank']) ||
		!isset($_POST['reference']) ||
	    !isset($_POST['paid_to']) ||
	    !isset($_POST['currency']) ||
		!isset($_POST['amount']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['person'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     

	$type = $_POST['type']; // required
    $name = $_POST['name']; // required
    $product = $_POST['product']; // required
	$bank = $_POST['bank']; // required
	$reference = $_POST['reference']; // required
	$paid_to = $_POST['paid_to']; // required
	$currency = $_POST['currency']; // required
	$amount = $_POST['amount']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // required
    $person = $_POST['person']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
 /*
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  
 */ 
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Wire details below. Powered by Adpotbox.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Transfer type: ".clean_string($type)."\n";
    $email_message .= "Company Name: ".clean_string($name)."\n";
    $email_message .= "Ad-slot product: ".clean_string($product)."\n";
    $email_message .= "Bank Name: ".clean_string($bank)."\n";
	$email_message .= "Reference Number: ".clean_string($reference)."\n";
	$email_message .= "Paid to: ".clean_string($paid_to)."\n";
	$email_message .= "Currency: ".clean_string($currency)."\n";
	$email_message .= "Amount INR: ".clean_string($amount)."\n";
	$email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Mobile/Phone: ".clean_string($phone)."\n";
	$email_message .= "Contact Person: ".clean_string($person)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
<br><br>
<body bgcolor="#E91E63">
<div align="center"><img src="payrichiesoft_white.png" width="200px"></div><br>
<p align="center"><font style="color:white">Successfully processed your wire details. You'll receive confirmation mail in your Email ID.<br><br>Click ADPOTBOX button on top for new activity.</font></p>
<meta name="viewport" content="width=device-width, initial-scale=1">
</body>

<?php
 
}
?>