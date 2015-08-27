<?php

// Check that name & email aren't empty.
if(empty($_POST['user_firstname']) || empty($_POST['user_email'])){
    die('Please ensure name and email are provided.');
}

// Check the checkbox
/*
$checkString = 'I have not been checked.';
if(isset($_POST['checkme'])){
    $checkString = 'I have been checked.';
}
*/

// multiple recipients
$to  = 'contact@liebregts-metals.com' . ', '; // note the comma
$to .= 'info@tanten.nl';

// subject
$subject = 'Liebregts Metals - Website Contactform';

// message
$message = '
<html>
<head>
  <title>Liebregts Metals - Website Contactform</title>
</head>
<body>
  <p>Someone wants to get in contact with Liebregts Metals!</p>
  <table>
    <tr>
      <th align="left">Contact Information</th>
    </tr>
    <tr>
      <th align="left">Date/Time</th><td>'.date('l jS \of F Y h:i:s A').'</td>
    </tr>
    <tr>
      <th align="left">Firstname</th><td>'.$_POST['user_firstname'].'</td>
    </tr>
    <tr>
      <th align="left">Lastname</th><td>'.$_POST['user_surname'].'</td>
    </tr>
    <tr>
      <th align="left">Company</th><td>'.$_POST['user_company'].'</td>
    </tr>
    <tr>
      <th align="left">Email</th><td>'.$_POST['user_email'].'</td>
    </tr>
    <tr>
      <th align="left">Phone</th><td>'.$_POST['user_phone'].'</td>
    </tr>
    <tr>
      <th align="left">Message</th><td>'.$_POST['user_message'].'</td>
    </tr>	
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: Info TANTENmedia <info@tanten.com>'. "\r\n";
$headers .= 'From: Liebregts Metals - Website Contactform <no-reply@liebregts-metals.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
if(!mail($to, $subject, $message, $headers)){
    die('Error sending email.');
}else{
    die('Email sent!');	
}

?>