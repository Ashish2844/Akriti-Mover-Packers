<?php

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'ashishd595@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form();
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>

<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $to = "ashishd595@gmail.com";  // Change to your email
//     $subject = strip_tags(trim($_POST["subject"]));
//     $name = strip_tags(trim($_POST["name"]));
//     $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
//     $message = trim($_POST["message"]);

//     if (empty($name) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         die("Invalid form input.");
//     }

//     $headers = "From: $email\r\n";
//     $headers .= "Reply-To: $email\r\n";
//     $headers .= "Content-Type: text/plain; charset=UTF-8";

//     $body = "Name: $name\n";
//     $body .= "Email: $email\n\n";
//     $body .= "Subject: $subject\n\n";
//     $body .= "Message:\n$message\n";

//     if (mail($to, $subject, $body, $headers)) {
//         echo "Message sent successfully!";
//     } else {
//         echo "Error sending message.";
//     }
// } else {
//     echo "Invalid request.";
// }
?>
