<?
require_once "SendMailSmtpClass.php";
// grab recaptcha library
require_once "recaptchalib.php";
 
$name = strip_tags(htmlspecialchars($_POST["name"]));
$namef = strip_tags(htmlspecialchars($_POST["namef"]));
$nameo = strip_tags(htmlspecialchars($_POST["nameo"]));
$email = strip_tags(htmlspecialchars($_POST["email"]));
$phone = htmlspecialchars($_POST["phone"]);
$text = strip_tags(htmlspecialchars($_POST["text"]));
$theme = strip_tags(htmlspecialchars($_POST["theme"]));
$cat = strip_tags(htmlspecialchars($_POST["cat"]));
$med = strip_tags(htmlspecialchars($_POST["med"]));
$date = strip_tags(htmlspecialchars($_POST["date"]));
 
setcookie("cookiename", $_POST['name']);
setcookie("cookienamef", $_POST['namef']);
setcookie("cookienameo", $_POST['nameo']);
setcookie("cookietext", $_POST['text']);
setcookie("cookieemail", $_POST['email']);
setcookie("cookiephone", $_POST['phone']);
 

$secret = "6LcBFDEUAAAAAPZ38nyB-HZlhlw2VnJufzor7Z31";
$reCaptcha = new ReCaptcha($secret);

$response = null;

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
$response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
 
 $message = "Фамилия: ".$_POST['namef'].'<br>'."Имя: ".$_POST['name'].'<br>'."Отчество: ".$_POST['nameo'].'<br>'."Дата рождения: ".$_POST['date'].'<br>'."\nEmail: ".$_POST['email'].'<br>'."\nТел: ".$_POST['phone'].'<br>'."\nТема: ".$_POST['theme'].'<br>'."\nКатегория обучения: ".$_POST['cat'].'<br>'."\nНаличие мед книжки: ".$_POST['med'].'<br>'."\nСообщение: ".$_POST['text'];

if ( isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
	 $mailSMTP = new SendMailSmtpClass('XXXXXXXXXX@yandex.ru', 'XXXXXXXXXXXXX', 'ssl://smtp.yandex.ru', 'site.ru', 465); 
	
	$headers= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
	$headers .= "From: site <site.ru>\r\n"; // от кого письмо
	$result =  $mailSMTP->send( "site@mail.ru" ,  'Заявка из формы обратной связи', $message , $headers); // отправляем письмо
		
	if($result === true){
		header('Location: http://www.site.ru/#ok');
	}else{
		header('Location: http://www.site.ru/#error');
	}

}else{
	header('Location: http://www.site.ru/#captcha_error');

}

