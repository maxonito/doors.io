<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thank you!</title>
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">
</head>
	<body>
	<div class="contain">
		<div class="message">
			Спасибо, что задали вопрос! <br>
			В ближайшее время мы <br>
			с Вами свяжемся
		</div>
		<div class="copyright">© 2018 Двери. All rights reserved.</div>
	</div>
	</body>
</html>

<?php 


$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'glass-gun@mail.ru';                 // Наш логин
$mail->Password = 'blackfriday';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('glass-gun@mail.ru', '');   // От кого письмо 
$mail->addAddress('Shumlianskiia@gmail.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Новый заказ';
$mail->Body    = '
	Пользователь оставил свои данные <br><br> 
	Имя: '.$name.' <br>
	E-mail: '.$email.' <br>
	Текст вопроса: '.$text.' <br>'
	;
	
if(strlen($name) < 3) {
	echo'<meta http-equiv="refresh" content="0; url=index.html">';
	return false;
};

if(strlen($email) < 6) {
	echo'<meta http-equiv="refresh" content="0; url=index.html">';
	return false;
};

if(strlen($text) < 6) {
	echo'<meta http-equiv="refresh" content="0; url=index.html">';
	return false;
};

if(!$mail->send()) {
    return false;
} else {
echo('<center><br><br><img src="http://www.pd4pic.com/images/tick-ok-check-correct-okay-confirm-icon-yes.png" alt="ок!" style="width: 200px;"></h1><br><h1>Спасибо за Ваш вопрос!</h1><br><h2>Мы свяжемся с Вами в самое ближайшее время</h2></center><meta http-equiv="refresh" content="3; url=index.html">');
}

?>