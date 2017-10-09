<?php
  include('template/_header.php');
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    // var_dump($_POST);
    $name = trim(filter_input(INPUT_POST,"Name",FILTER_SANITIZE_STRING));//trim is removes white space from the beginning and end of a piece of text
    $email = trim(filter_input(INPUT_POST,"Email",FILTER_SANITIZE_EMAIL));
    $message = trim(filter_input(INPUT_POST,"Message",FILTER_SANITIZE_SPECIAL_CHARS));

    if ($name == "" or $email == "" or $message == "") {
      $error_message = $language['Error1'][$i];
    }
    if (!isset($error_message) && $_POST["address"] != "")
      $error_message = $language['Error2'][$i];

  require_once "inc/phpmailer/class.phpmailer.php";
  $mail = new PHPMailer(true);
  if (!isset($error_message) && !$mail->ValidateAddress($email)) {
    $error_message = $language['Error3'][$i];
  }

  if (!isset($error_message)) {

      $email_body = "";
      $email_body .= "Name " . $name . "<br>";
      $email_body .= "Email " . $email . "<br>";
      $email_body .= "Message " . $message . "<br>";

      try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'enes843@gmail.com';                // SMTP username
        $mail->Password = '********';                         // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('enes843@gmail.com', 'Enes Kılıç');     // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->CharSet = 'UTF-8';

        $mail->Subject = 'kilicsuayip.com '. $name;
        $mail->Body    = $email_body;

        $mail->send();
        echo 'Message has been sent';
        header('Location:Contact.php?status=thanks');
        exit;
    } catch (Exception $e) {
        $error_message = $language['Error4'][$i];
        $error_message .= 'Mailer Error: ' . $mail->ErrorInfo;
    }
  }

  }

  include('template/_newcontact.php');

  if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
    echo $language['Thanks'][$i];
  }
  else{
 ?>
</div>
<div class="w3-container w3-padding-large w3-light-grey w3-margin-bottom">
    <hr class="w3-opacity">

      <?php   if (isset($error_message))
          echo '<div class="w3-panel w3-border w3-yellow w3-border-red">
          <h6>'.$error_message.' !!!</h6></div>';
         ?>

    <form method="post" action="Contact.php"><!--  target="_blank" form attribute openin new tab-->
    <div class="w3-section">
      <label for="Name"><?php echo $language['Name'][$i]; ?></label>
      <input class="w3-input w3-border" type="text" name="Name" id="Name" required>
    </div>
    <div class="w3-section">
      <label for="Email"><?php echo $language['Email'][$i]; ?></label>
      <input class="w3-input w3-border" type="text" name="Email" id="Email" required>
    </div>
    <div class="w3-section">
      <label for="Message"><?php echo $language['Message'][$i]; ?></label>
      <textarea class="w3-input w3-border" type="text" name="Message" id="Message" required></textarea>
    </div>
    <div class="w3-section" style="display:none">
      <label for="Address">Address</label>
      <textarea class="w3-input w3-border" type="text"  name="Address" id="Address"></textarea>
      <p>Please leave this field blank. </p>
    </div>
    <button type="submit" class="w3-button w3-black w3-margin-bottom"><?php echo $language['Send Email'][$i]; ?></button>
    </form>
  </div>
    <?php }

    include('template/_footer.php');
?>
