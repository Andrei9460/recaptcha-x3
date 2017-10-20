инструкция по добавлению формы ecaptcha x3
1) 
добавить <?php session_start(); ?> перед <!DOCTYPE html >

2)
    преред <head> добавить
    <?php
 
// grab recaptcha library
require_once "recaptchalib.php";
 ?>

 <script type="text/javascript">
      var verifyCallback = function(response) {
        alert(response);
      };
      var widgetId1;
      var widgetId2;
      var onloadCallback = function() {
        // Renders the HTML element with id 'example1' as a reCAPTCHA widget.
        // The id of the reCAPTCHA widget is assigned to 'widgetId1'.
        widgetId1 = grecaptcha.render('recaptcha1', {
          'sitekey' : '6LcBFDEUAAAAAEtl8ongfQWfst3Rk-YJYFIKN2Xy'
        });
        widgetId2 = grecaptcha.render(document.getElementById('recaptcha2'), {
          'sitekey' : '6LcBFDEUAAAAAEtl8ongfQWfst3Rk-YJYFIKN2Xy'
        });
        widgetId3 = grecaptcha.render(document.getElementById('recaptcha3'), {
          'sitekey' : '6LcBFDEUAAAAAEtl8ongfQWfst3Rk-YJYFIKN2Xy'
        });

      };
    </script> 

3)

добавить перед закрытием </head>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

4) 

после тега <body>

<? $captcha = rand(10000, 99999);?>
<?php
 
// grab recaptcha library
require_once "recaptchalib.php";
 ?>
 <?php
  $sevename = $_COOKIE['cookiename'];
  $sevenamef = $_COOKIE['cookienamef'];
  $sevenameo = $_COOKIE['cookienameo'];
  $sevetext = $_COOKIE['cookietext'];
  $seveemail = $_COOKIE['cookieemail'];
  $sevephone = $_COOKIE['cookiephone'];
 ?>


 <a href="#x" class="overlay" id="ok"></a>

  <div class="popup"> 

    <div id="form-ok"><p>Сообщение успешно отправлено</p></div>

    <a class="close" title="Закрыть" href="#close"></a> 

  </div>

<a href="#x" class="overlay" id="error"></a>

  <div class="popup"> 

    <div id="form-no"><p>Ошибка, попробуйте позже</p></div>

    <a class="close" title="Закрыть" href="#close"></a> 

  </div>

<a href="#x" class="overlay" id="captcha_error"></a>

  <div class="popup"> 

    <div id="form-no"><p>Ошибка, не пройдена проверка captcha</p></div>

    <a class="close" title="Закрыть" href="#close"></a> 

  </div>

5)

добавляем ссылку на модальное окно и само модальное окно
пример:
ссылка
<a class="head-button" data-toggle="modal" data-target="#myModal1">Записаться на обучение</a>
форма
<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

              </div>
               <div class="modal-body">
                <div class="quickcontact">
                  <div id="form" class="form">
                    
                    <div class="contact-contact" id="contactform">
                      <h3>Заказать звонок</h3>
                      <form method="post" action="form.php">
                        <div class="input-group input-group-lg">
                          <input name="name" type="text" class="form-control" placeholder="Имя*" required=" " pattern="[A-Za-zА-Яа-яЁё\s]{3,}" title="Введите имя от 3-х букв" value="<?php echo $sevename;?>">
                        </div>
                        <div class="input-group input-group-lg">
                          <input name="email" type="email" class="form-control" placeholder="E-mail*" required=" " title="Почта в формате name@domain.ru" value="<?php echo $seveemail;?>">
                        </div>
                        <div class="input-group input-group-lg">
                          <input name="phone" type="text" class="form-control"  class="user_phone" placeholder="Телефон*" required=" " pattern="\+7\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}" onfocus="this.placeholder='+7 (ххх) ххх-хх-хх'" onblur="this.placeholder='Телефон*'" title="Телефон в формате +7 (ххх) ххх-хх-хх" value="<?php echo $sevephone;?>">
                        </div>
                        <div class="input-group input-group-lg">
                          <input name="theme" type="text" class="form-control" placeholder="Тема вопроса*" required=" " pattern="[A-Za-zА-Яа-яЁё\s]{3,}" title="Введите тему вопроса" >
                        </div>
                        <div class="clearfix"> </div>
                        <div id="recaptcha1"></div> 
                        <input type="submit" class="btn btn-primary" value="Отправить">
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="modal-footer">

              </div>
          </div>
      </div>
  </div>


стили 

.overlay:target {
    visibility: visible;
    opacity: 1;
}

.overlay {
    background-color: rgba(0, 0, 0, 0.7);
    bottom: 0;
    cursor: default;
    left: 0;
    opacity: 0;
    position: fixed;
    right: 0;
    top: 0;
    visibility: hidden;
    z-index: 10099;
    -webkit-transition: opacity .5s;
    -moz-transition: opacity .5s;
    -ms-transition: opacity .5s;
    -o-transition: opacity .5s;
    transition: opacity .5s;
}

.popup {
    width: 300px;
    background-color: #fefefc;
    border: none;
    display: inline-block;
    /* left: 45%; */
    opacity: 0;
    padding: 15px;
    /* padding-left: 15px; */
    position: fixed;
    text-align: justify;
    font: normal 14px/21px 'Ubuntu', sans-serif;
    /* top: 40%; */
    visibility: hidden;
    z-index: 10;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    -ms-border-radius: 0px;
    -o-border-radius: 0px;
    border-radius: 0px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -ms-box-shadow: none;
    -o-box-shadow: none;
    box-shadow: none;
}

img.contakt {
    width: 45px!important;
}

.close {
    background-color: #000;
    height: 24px;
    line-height: 24px;
    position: absolute;
    right: 0px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    top: 0px;
    width: 24px;
}
.close:before {
    color: rgba(255, 255, 255, 0.9);
    content: "X";
    font-size: 14px;
    text-shadow: 0 -1px rgba(0, 0, 0, 0.9);
}
.close:hover {
    background-color: #000!important;
}
div#form-ok p {
    font-size: 20px;
    line-height: 1;
}.overlay:target {
    visibility: visible;
    opacity: 1;
}

.overlay {
    background-color: rgba(0, 0, 0, 0.7);
    bottom: 0;
    cursor: default;
    left: 0;
    opacity: 0;
    position: fixed;
    right: 0;
    top: 0;
    visibility: hidden;
    z-index: 10099;
    -webkit-transition: opacity .5s;
    -moz-transition: opacity .5s;
    -ms-transition: opacity .5s;
    -o-transition: opacity .5s;
    transition: opacity .5s;
}

.popup {
    width: 300px;
    background-color: #fefefc;
    border: none;
    display: inline-block;
    /* left: 45%; */
    opacity: 0;
    padding: 15px;
    /* padding-left: 15px; */
    position: fixed;
    text-align: justify;
    font: normal 14px/21px 'Ubuntu', sans-serif;
    /* top: 40%; */
    visibility: hidden;
    z-index: 10;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    -ms-border-radius: 0px;
    -o-border-radius: 0px;
    border-radius: 0px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -ms-box-shadow: none;
    -o-box-shadow: none;
    box-shadow: none;
}

img.contakt {
    width: 45px!important;
}

.close {
    background-color: #000;
    height: 24px;
    line-height: 24px;
    position: absolute;
    right: 0px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    top: 0px;
    width: 24px;
}
.close:before {
    color: rgba(255, 255, 255, 0.9);
    content: "X";
    font-size: 14px;
    text-shadow: 0 -1px rgba(0, 0, 0, 0.9);
}
.close:hover {
    background-color: #000!important;
}
div#form-ok p {
    font-size: 20px;
    line-height: 1;
}


.input-group.input-group-lg {
    width: 99%;
    padding-bottom: 5px;
}