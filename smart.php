<?php 


$name = $_POST['name'];
$number = $_POST['number'];

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
$mail->addAddress('maxon4up@bk.ru');     // Add a recipient
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
	Номер: '.$number.' <br>'
	;
	
if(strlen($name) < 3) {
	echo'<meta http-equiv="refresh" content="0; url=index.html">';
	return false;
};

if(strlen($number) < 3) {
	echo'<meta http-equiv="refresh" content="0; url=index.html">';
	return false;
};

if(!$mail->send()) {
    return false;
} else {
echo('<center><br><br><img src="http://www.pd4pic.com/images/tick-ok-check-correct-okay-confirm-icon-yes.png" alt="ок!" style="width: 200px;"></h1><br><h1>Спасибо за заявку!</h1><br><h2>Мы свяжемся с Вами в самое ближайшее время</h2></center><meta http-equiv="refresh" content="3; url=index.html">');
}

?>