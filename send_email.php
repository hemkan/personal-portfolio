<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$subject = htmlspecialchars($_POST['subject']);
	$message = htmlspecialchars($_POST['message']);

	$to = "hema.j.kanoujia@gmail.com";
	$headers = "From: " . $email . "\r\n";
	$headers .= "Reply-To: " . $email . "\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$email_subject = "Contact Form Submission: " . $subject;
	$email_body = "<h2>Contact Form Submission</h2>
	               <p><strong>Name:</strong> {$name}</p>
	               <p><strong>Email:</strong> {$email}</p>
	               <p><strong>Subject:</strong> {$subject}</p>
	               <p><strong>Message:</strong><br />{$message}</p>";

	if (mail($to, $email_subject, $email_body, $headers)) {
		echo "Message sent successfully.";
	} else {
		echo "Failed to send message.";
	}
} else {
	echo "Invalid request.";
}
?>
