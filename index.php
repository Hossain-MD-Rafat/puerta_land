<?php
	$db=new mysqli("localhost","root","","puerta_update");
    // Connect with the database 
	//$db = new mysqli("localhost", "root", "", "rafathas_project"); 
	// Display error if failed to connect 
	if ($db->connect_errno) { 
	printf("Connect failed: %s\n", $db->connect_error); 
}
$p = "";
$p1 = "";
?>
<?php
if(isset($_POST['submit'])){
  $to       = "hossainmdrafat10@gmail.com";
  $subject  = "Puerta Client";
  $message  = "Nombre: ".$_POST['number'];
  $message .= "\nTelefono: ".$_POST['phone'];
  $message .= "\nCorreo: ".$_POST['mail'];
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <puerta@mail.com>' . "\r\n";
  $headers .= 'Cc: rafat.rafathasan18@gmail.com' . "\r\n";
//echo $to.$subject.$message.$headers;
 if(mail($to, $subject, $message, $headers)){
  $p = "Tu mensaje ha sido enviado, en breve nos comunicaremos contigo.
  Gracias";
 }
}
if(isset($_POST['submit1'])){
  $to       = "hossainmdrafat10@gmail.com";
  $subject  = "Puerta Client";
  $message  = "Nombre: ".$_POST['number1'];
  $message .= "\nTelefono: ".$_POST['phone1'];
  $message .= "\nCorreo: ".$_POST['mail1'];
  $message .= "\nMensaje: ".$_POST['mail1'];
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <puerta@mail.com>' . "\r\n";
  $headers .= 'Cc: rafat.rafathasan18@gmail.com' . "\r\n";
//echo $to.$subject.$message.$headers;
if(mail($to, $subject, $message, $headers)){
  $p1 = "Tu mensaje ha sido enviado, en breve nos comunicaremos contigo.
  Gracias";
 }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Puerta De Hierro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="icon/css" href="img/icon.png">

    <!-- <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Abril+Fatface:400,700" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/fancybox.min.css">

    <!-- Video Slider CSS -->
    <link rel="stylesheet" href="css/rvslider.css">
    <link rel="stylesheet" href="css/rvslider.min.css">

    <!-- Jssor Slider -->
    <!-- Source: https://www.jssor.com/demos/image-gallery.slider/=edit -->
    <script src="js/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jssor-slider.js"></script>

    <!-- Toggle CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">


    <script>
      let total = 0.0;
      let enganche = "$0";
      let admins = "$0";
      let cash_price = "$0";
      let price_12 = "$0";
      let price_24 = "$0";
      let price_36 = "$0";
      let cash_down = "$0";
      let down_12 = "$0";
      let down_24 = "$0";
      let down_36 = "$0";
      let usd = 20.60;
      let cur_price = 0.0;
      let cur_down = 0.0;
      let cur_monthly = 0.00;

      function convert(strr){
              strr = strr.toString().replace("$","");
              strr = strr.toString().replace(",","");
              strr = strr.toString().replace(",","");
              strr = strr.toString().replace(",","");
              strr = parseFloat(strr);
              return strr;
      }
      function numberWithCommas(x) {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        str = '$';
        return str.concat(parts.join("."));
      }
      function showInfo(val){
        val = val.split(" ");
        val = val[0];
        if(val){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function(){
            if(this.readyState===4 && this.status==200){
              var values = this.responseText.split(" ");
              total = values[3];
              cash_price = values[5];
              price_12 = values[7];
              price_24 = values[9];
              price_36 = values[11];
              cash_down = values[14];
              down_12 = values[15];
              down_24 = values[16];
              down_36 = values[17];
              usd = parseFloat(values[18]);
              document.getElementById("wide").innerText = values[0];
              document.getElementById("large").innerText = values[1];
              document.getElementById("area").innerText = values[2];
              document.getElementById("total").innerText = values[3];
              document.getElementById("admins").innerText = values[13];
              document.getElementById("enganche").innerText = cash_down;
              document.getElementById("net-total").innerText = cash_price;
              total = convert(total);
              cur_price = convert(cash_price);
              cur_down = convert(cash_down);
              cur_monthly = numberWithCommas((cur_price-cur_down).toFixed(2));
              document.getElementById("balance").innerText = cur_monthly;
              document.getElementById("men").style.display = "none";
              document.getElementById("bal").style.display = "block";
              document.getElementById("option_val").value = "cash";
              document.getElementById('pesos').checked = true;
            }
          };
          xhttp.open("GET","getvalue.php?q="+val,true);
          xhttp.send()
        }
      }
      function showData(str){
        document.getElementById('pesos').checked = true;
        if(str==="12"){
          cur_price = price_12;
          cur_down = down_12;
          document.getElementById("net-total").innerText = numberWithCommas(convert(price_12));
          document.getElementById("enganche").innerText = numberWithCommas(convert(down_12));
          price_12 = convert(price_12);
          down_12 = convert(down_12);
          monthly_12 = numberWithCommas(((price_12-down_12)/12).toFixed(2));
          cur_monthly = monthly_12;
          document.getElementById("monthly").innerText = monthly_12;
          document.getElementById("men").style.display = "block";
          document.getElementById("bal").style.display = "none";
        }
        else if(str==="24"){
          cur_price = price_24;
          cur_down = down_24;
          document.getElementById("net-total").innerText = numberWithCommas(convert(price_24));
          document.getElementById("enganche").innerText = numberWithCommas(convert(down_24));
          price_24 = convert(price_24);
          down_24 = convert(down_24);
          monthly_24 = numberWithCommas(((price_24-down_24)/24).toFixed(2));
          cur_monthly = monthly_24;
          document.getElementById("monthly").innerText = monthly_24;
          document.getElementById("men").style.display = "block";
          document.getElementById("bal").style.display = "none";
        }
        else if(str==="36"){
          cur_price = price_36;
          cur_down = down_36;
          document.getElementById("net-total").innerText = numberWithCommas(convert(price_36));
          document.getElementById("enganche").innerText = numberWithCommas(convert(down_36));
          price_36 = convert(price_36);
          down_36 = convert(down_36);
          monthly_36 = numberWithCommas(((price_36-down_36)/36).toFixed(2));
          cur_monthly = monthly_36;
          document.getElementById("monthly").innerText = monthly_36;
          document.getElementById("men").style.display = "block";
          document.getElementById("bal").style.display = "none";
        }
        else if(str==="cash"){
          cur_price = convert(cash_price);
          cur_down = convert(cash_down);
          document.getElementById("net-total").innerText = cash_price;
          document.getElementById("enganche").innerText = cash_down;
          cur_monthly = numberWithCommas((cur_price-cur_down).toFixed(2));
          document.getElementById("balance").innerText = cur_monthly;
          document.getElementById("men").style.display = "none";
          document.getElementById("bal").style.display = "block";
        }
      }



      
      function setData(curr){
        let total1 = total;
        let cur_price1 = cur_price;
        let cur_down1 = cur_down;
        let cur_monthly1 = cur_monthly;
        //console.log(cur_monthly);
        cur_price1 = convert(cur_price1);
        cur_down1 = convert(cur_down1);
        cur_monthly1 = convert(cur_monthly1);
        //console.log(cur_price1, cur_down1, cur_monthly1);
        let admin = 1500.00;
        let monthly1 = cur_monthly1;

        if(curr==="usd"){
          total1 = (total1/usd).toFixed(2);
          cur_price1 = (cur_price1/usd).toFixed(2);
          cur_down1 = (cur_down1/usd).toFixed(2);
          admin = (1500/usd).toFixed(2);
          monthly1 = (cur_monthly1/usd).toFixed(2);
        }
        else if(curr==="pesos"){
          total1 = (total1*usd).toFixed(2);
          cur_price1 = (cur_price1*usd).toFixed(2);
          cur_down1 = (cur_down1*usd).toFixed(2);
          // admin = 1500;
          // monthly1 = (cur_monthly1*usd).toFixed(2);
        }

        document.getElementById("total").innerText = numberWithCommas(total1);
        document.getElementById("net-total").innerText = numberWithCommas(cur_price1);
        document.getElementById("enganche").innerText = numberWithCommas(cur_down1);
        document.getElementById("admins").innerText = numberWithCommas(admin);
        document.getElementById("monthly").innerText = numberWithCommas(monthly1);
        document.getElementById("balance").innerText = numberWithCommas(monthly1);



      }

        // if(curr==="usd"){         
        //   total = numberWithCommas((total/usd).toFixed(2));
        //   cur_price = numberWithCommas(((convert(cur_price))/usd).toFixed(2));
        //   cur_down = numberWithCommas(((convert(cur_down))/usd).toFixed(2));
        //   administrative = numberWithCommas((1500/usd).toFixed(2));
        //   montly = numberWithCommas(((cur_price-cur_down)/12).toFixed(2))
        // }
        // else{
        //   total = numberWithCommas((total*usd).toFixed(2));
        //   cur_price1 = numberWithCommas(((convert(cur_price))*usd).toFixed(2));
        //   cur_down1 = numberWithCommas(((convert(cur_down))*usd).toFixed(2));
        //   administrative = numberWithCommas(1500);
        //   console.log(cur_price);
        //   montly = numberWithCommas(((cur_price-cur_down)/12).toFixed(2));
        // }
        // document.getElementById("total").innerText = total;
        // document.getElementById("net-total").innerText = cur_price1;
        // document.getElementById("enganche").innerText = cur_down1;
        // document.getElementById("admins").innerText = administrative;
        // if(document.getElementById("monthly").value==="cash"){
        //   document.getElementById("monthly").innerText = "$0";
        // }
        // else{
        //   document.getElementById("monthly").innerText = montly;
        // }

       // if(typeof total === "string"){
          //   console.log("total", total);
          //   total = convert(total);
          //   console.log("total1", total);
          // }
          // if(typeof cur_price === "string")
          // {
          //   console.log("cur_price", cur_price);
          //   cur_price = convert(cur_price);
          //   console.log("cur_price1", cur_price);
          // }
          // if(typeof cur_down === "string")
          // {
          //   console.log("cur_down",cur_down);
          //   cur_down = convert(cur_down);
          //   console.log("cur_down1",cur_down);
          // }

    </script>
    
  </head>
  <body>
    <div class="js-animsition animsition" id="site-wrap" data-animsition-in-class="fade-in" data-animsition-out-class="fade-out">
      <!-- header -->
      <div class="s-header">
          <nav class="header-nav">
              <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

              <div class="header-nav__content">
                  <h3>Puerta de Hierro</h3>
                  
                  <ul class="header-nav__list">
                      <li class="current"><a class="smoothscroll"  href="#Conoce">Conoce Mérida</a></li>
                      <li><a class="smoothscroll"  href="#Video" >Video Puerta de Hierro</a></li>
                      <li><a class="smoothscroll"  href="#Por" >¿Por qué invertir en lotes residenciales?</a></li>
                      <li><a class="smoothscroll"  href="#Nuestros" >Nuestros “Modelos de Casas”</a></li>
                      <li><a class="smoothscroll"  href="#Enamórate" >¡Enamórate de Yucatán!</a></li>
                      <li><a class="smoothscroll"  href="#Videos" >Videos “Modelos de Casas”</a></li>
                      <li><a class="smoothscroll"  href="#Aparta" >Aparta tu lote</a></li>
                      <li><a class="smoothscroll"  href="#Contáctanos" >Contáctanos</a></li>
                  </ul>
      
                  <ul class="header-nav__social">
                      <li>
                          <a href="https://www.facebook.com/Raices32/" target="_blank"><i class="fab fa-facebook"></i></a>
                      </li>
                      <li>
                          <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                      </li>
                      <li>
                          <a href="https://www.instagram.com/raices_32/" target="_blank"><i class="fab fa-instagram"></i></a>
                      </li>
                      <li>
                          <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                      </li>
                      <li>
                          <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                      </li>
                  </ul>

              </div> <!-- end header-nav__content -->
          </nav> <!-- end header-nav -->

          <a class="header-menu-toggle" href="#0">
              <span class="header-menu-icon"></span>
          </a>
      </div> <!-- end s-header -->

      <header class="site-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-4 site-logo" data-aos="fade">
              <a href="index.html" class="animsition-link"><img src="img/LOGO 2 W.png"></a>
            </div> 
          </div>
        </div>
      </header>
      <!-- END head -->


    <!-- Banner Slider Section Start -->
    <section class="home-slider owl-carousel" id="Conoce" data-aos="fade-down">
      <div class="slider-item" style="">
        <div class="ovrley">
          <img src="img/banner/Render (2).jpg">
        </div>
      </div>

      <div class="slider-item" style="">
        <div class="ovrley">
          <img src="img/banner/Render (4).jpg">
        </div>
      </div>

      <div class="slider-item" style="">
        <div class="ovrley">
          <img src="img/banner/Render (5).jpg">
        </div>
      </div>
    </section>
    <!-- Banner Slider Section End -->


    <!-- Video Section Start -->
    <section class="single-video-section" id="Video">
      <div class="container">
        <div class="full-single-video">
          <div class="single-v-border">
            <fieldset>
              <div class="border-v"></div>
              <legend><img src="img/LOGO 2 W.png" width="145px"></legend>
              <div class="row">

                <div class="col-md-4">
                  <div class="single-video">
                    <span class="text-center">Conoce MÉRIDA</span>
                    <img src="img/video-img/one.png" width="100%" class="video-single-img">
                    <div class="video-middle">
                      <a href="video/Merida, Yucatan FINAL.mp4"  data-fancybox class="btn-play d-flex">
                        <span class="icon align-self-center mr-3"><span class="fa fa-play"></span></span>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="single-video">
                    <span class="text-center">Puerta de Hierro</span>
                    <img src="img/video-img/two.png" width="100%" class="video-single-img">
                    <div class="video-middle">
                      <a href="video/Video Final PUERTA DE HIERRO.mp4"  data-fancybox class="btn-play d-flex">
                        <span class="icon align-self-center mr-3"><span class="fa fa-play"></span></span>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="single-video">
                    <span class="text-center">¿Por QUÉ Invertir?</span>
                    <img src="img/video-img/three.png" width="100%" class="video-single-img">
                    <div class="video-middle">
                      <a href="video/SegundoCorte_PuertadeHierro.mp4"  data-fancybox class="btn-play d-flex">
                        <span class="icon align-self-center mr-3"><span class="fa fa-play"></span></span>
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </fieldset>
          </div>
        </div>
      </div>
    </section>
    <!-- Video Section End -->


    <!-- Image Slider Start -->
    <section class="image-section" id="Nuestros">
      <h2 class="puerta-title text-center">Nuestros “Modelos de Casas” </h2>

      <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px; width:980px; height:660px; overflow:hidden;visibility:hidden;" data-aos="fade-down">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px; height:560px; overflow:hidden;">
            <div>
              <a data-fancybox="gallery" href="img/house/Slide1.jpg">
                <img data-u="image" src="img/house/Slide1.jpg" width="1000px">
              </a>
              <img data-u="thumb" src="img/house/Slide1.jpg" >
            </div>
            <div>
              <a data-fancybox="gallery" href="img/house/Slide2.jpg">
                <img data-u="image" src="img/house/Slide2.jpg" >
              </a>
              <img data-u="thumb" src="img/house/Slide2.jpg">
            </div>
            <div>
              <a data-fancybox="gallery" href="img/house/Slide3.jpg">
                <img data-u="image" src="img/house/Slide3.jpg" >
              </a>
              <img data-u="thumb" src="img/house/Slide3.jpg" >
            </div>
            <div>
              <a data-fancybox="gallery" href="img/house/Slide4.jpg">
                <img data-u="image" src="img/house/Slide4.jpg" >
              </a>
              <img data-u="thumb" src="img/house/Slide4.jpg" >
            </div>
            <div>
              <a data-fancybox="gallery" href="img/house/Slide5.jpg">
                <img data-u="image" src="img/house/Slide5.jpg">
              </a>
              <img data-u="thumb" src="img/house/Slide5.jpg">
            </div>
            <div>
              <a data-fancybox="gallery" href="img/house/Slide6.jpg">
                <img data-u="image" src="img/house/Slide6.jpg">
              </a>
              <img data-u="thumb" src="img/house/Slide6.jpg">
            </div>
            <div>
              <a data-fancybox="gallery" href="img/house/Slide7.jpg">
                <img data-u="image" src="img/house/Slide7.jpg">
              </a>
              <img data-u="thumb" src="img/house/Slide7.jpg">
            </div>
            <div>
              <a data-fancybox="gallery" href="img/house/Slide8.jpg">
                <img data-u="image" src="img/house/Slide8.jpg">
              </a>
              <img data-u="thumb" src="img/house/Slide8.jpg">
            </div>
            <div>
              <a data-fancybox="gallery" href="img/house/Slide9.jpg">
                <img data-u="image" src="img/house/Slide9.jpg">
              </a>
              <img data-u="thumb" src="img/house/Slide9.jpg">
            </div>
            
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75" data-aos="fade-up">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:190px;height:90px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                    <svg viewbox="0 0 16000 16000" class="cv">
                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute; top:150%; left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute; top:150%; left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init(); </script>
    <!-- #endregion Jssor Slider End -->   
    </section>
    <!-- Image Slider End -->


    <!-- Icons Section Start -->
    <section class="icons-section" style="padding: 100px 0;" data-aos="fade-up">
      <div class="container">
        <div class="row full-icons">
          <div class="col-md-12 icons-img">
            <img src="img/LOGO 2 W.png">
          </div>
          <div class="col-md-6 icons" data-aos="fade-up">
            <ul class="ico-img">
              <li> <img src="img/icons/1.png"> 18 PALAPAS CON ASADOR</li>
              <li> <img src="img/icons/2.png"> SALON PARA EVENTOS</li>
              <li> <img src="img/icons/3.png"> 3 ALBERCAS</li>
              <li> <img src="img/icons/4.png"> 2 CANCHAS DE USOS MÚLTIPLES</li>
              <li> <img src="img/icons/5.png"> 3 AREAS DE JUEGOS INFANTILES</li>
              <li> <img src="img/icons/6.png"> CICLOPISTA Y PISTA PARA CORRER</li>
            </ul>
          </div>
          <div class="col-md-6 icons" data-aos="fade-up">
            <ul class="ico-img">
              <li> <img src="img/icons/7.png"> GYM CLIMATIZADO Y CON TELEVISIÓN </li>
              <li> <img src="img/icons/8.png"> MÁQUINAS PARA EJERCICIOS AL AIRE LIBRE</li>
              <li> <img src="img/icons/9.png"> TEMAZCAL PARA USO EXCLUSIVO DE RESIDENTES</li>
              <li> <img src="img/icons/10.png"> ÁRBOLES FRUTALES DE LA REGIÓN</li>
              <li> <img src="img/icons/11.png"> CÁMARAS DE SEGURIDAD</li>
              <li> <img src="img/icons/12.png"> ASESORÍA PARA DISEÑO Y CONSTRUCCIÓN</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- Icons Section End -->


    <!-- Video Slider Start -->
    <section class="video-section" id="Videos" data-aos="fade-up">
      <h2 class="puerta-title text-center">Videos de “Modelos de Casas”</h2>
      <div class="rvs-container container">
        <div class="rvs-item-container">
          <div class="rvs-item-stage">
            <!-- Video item one -->
            <div class="rvs-item" style="background-image: url('img/video-img/video.PNG')">
              <p class="rvs-item-text">Puerta De Hierro<small>by Priscila Azzini Interior Design/Architecture</small></p>
              <a href="https://youtu.be/fENukpBQGPg" class="rvs-play-video"></a>
            </div>
            <!-- Video item two -->
            <div class="rvs-item" style="background-image: url('img/video-img/video2.PNG')">
              <p class="rvs-item-text">Puerta De Hierro <small>by ArchTECH</small></p>
              <a href="https://youtu.be/xd90r6lcuwg" class="rvs-play-video"></a>
            </div>
            <!-- Video item three -->
            <div class="rvs-item" style="background-image: url('img/video-img/video3.PNG')">
              <p class="rvs-item-text">Puerta De Hierro <small>by Jorman S.A. Planos de Casas</small></p>
              <a href="https://youtu.be/EbYUlJApnnA" class="rvs-play-video"></a>
            </div>
            <!-- Video item four -->
            <div class="rvs-item" style="background-image: url('img/video-img/video4.PNG')">
              <p class="rvs-item-text">Puerta De Hierro <small>by Fachadas de casas</small></p>
              <a href="https://youtu.be/ebChbYoa-qk" class="rvs-play-video"></a>
            </div>
            <!-- Video item Five -->
            <div class="rvs-item" style="background-image: url('img/video-img/video5.PNG')">
              <p class="rvs-item-text">Puerta De Hierro <small>by FD Projetos</small></p>
              <a href="https://youtu.be/ntHToSvv2SU" class="rvs-play-video"></a>
            </div>
            <!-- Video item Six -->
            <div class="rvs-item" style="background-image: url('img/video-img/video6.PNG')">
              <p class="rvs-item-text">Puerta De Hierro <small>by Fadhil Budiman</small></p>
              <a href="https://youtu.be/LnX5a9FOgKk" class="rvs-play-video"></a>
            </div>
            <!-- Video item Seven -->
            <div class="rvs-item" style="background-image: url('img/video-img/video7.PNG')">
              <p class="rvs-item-text">Puerta De Hierro <small>by FD Projetos</small></p>
              <a href="https://youtu.be/gNtC7F8hEHA" class="rvs-play-video"></a>
            </div>
            <!-- Video item Eight -->
            <div class="rvs-item" style="background-image: url('img/video-img/video8.PNG')">
              <p class="rvs-item-text">Puerta De Hierro <small>by Priscila Azzini Interior Design / Architecture</small></p>
              <a href="https://youtu.be/mm3xnREbCIg" class="rvs-play-video"></a>
            </div>
            <!-- Video item Nine -->
            <div class="rvs-item" style="background-image: url('img/video-img/video9.PNG')">
              <p class="rvs-item-text">Puerta De Hierro <small>by Priscila Azzini Interior Design / Architecture</small></p>
              <a href="https://youtu.be/ShkX1nXYD8Y" class="rvs-play-video"></a>
            </div>
            <!-- Video item Ten -->
            <div class="rvs-item" style="background-image: url('img/video-img/video10.PNG')">
              <p class="rvs-item-text">Puerta De Hierro <small>by Jorman S.A. Planos de Casas</small></p>
              <a href="https://youtu.be/6CrcPC8Ncc4" class="rvs-play-video"></a>
            </div>

          </div>
        </div>

        <div class="rvs-nav-container">
          <a class="rvs-nav-prev"></a>
          <div class="rvs-nav-stage" data-aos="fade-up">
            <!-- Video Gallery item one -->
            <a class="rvs-nav-item">
              <span class="rvs-nav-item-thumb" style="background-image: url('img/video-img/video.PNG')"></span>
              <h4 class="rvs-nav-item-title">Puerta De Hierro</h4>
              <small class="rvs-nav-item-credits">by Priscila Azzini Interior Design/Architecture</small>
            </a>
            <!-- Video Gallery item two -->
            <a class="rvs-nav-item">
              <span class="rvs-nav-item-thumb" style="background-image: url('img/video-img/video2.PNG')"></span>
              <h4 class="rvs-nav-item-title">Puerta De Hierro</h4>
              <small class="rvs-nav-item-credits">by ArchTECH</small>
            </a>
            <!-- Video Gallery item three -->
            <a class="rvs-nav-item">
              <span class="rvs-nav-item-thumb" style="background-image: url('img/video-img/video3.PNG"></span>
              <h4 class="rvs-nav-item-title">Puerta De Hierro</h4>
              <small class="rvs-nav-item-credits">by Jorman S.A. Planos de Casas</small>
            </a>
            <!-- Video Gallery item four -->
            <a class="rvs-nav-item">
              <span class="rvs-nav-item-thumb" style="background-image: url('img/video-img/video4.PNG"></span>
              <h4 class="rvs-nav-item-title">Puerta De Hierro</h4>
              <small class="rvs-nav-item-credits">by Fachadas de casas</small>
            </a>
            <!-- Video Gallery item Five -->
            <a class="rvs-nav-item">
              <span class="rvs-nav-item-thumb" style="background-image: url('img/video-img/video5.PNG"></span>
              <h4 class="rvs-nav-item-title">Puerta De Hierro</h4>
              <small class="rvs-nav-item-credits">by FD Projetos</small>
            </a>
            <!-- Video Gallery item Six -->
            <a class="rvs-nav-item">
              <span class="rvs-nav-item-thumb" style="background-image: url('img/video-img/video6.PNG"></span>
              <h4 class="rvs-nav-item-title">Puerta De Hierro</h4>
              <small class="rvs-nav-item-credits">by Fadhil Budiman</small>
            </a>
            <!-- Video Gallery item Seven -->
            <a class="rvs-nav-item">
              <span class="rvs-nav-item-thumb" style="background-image: url('img/video-img/video7.PNG"></span>
              <h4 class="rvs-nav-item-title">Puerta De Hierro</h4>
              <small class="rvs-nav-item-credits">by FD Projetos</small>
            </a>
            <!-- Video Gallery item Eight -->
            <a class="rvs-nav-item">
              <span class="rvs-nav-item-thumb" style="background-image: url('img/video-img/video8.PNG"></span>
              <h4 class="rvs-nav-item-title">Puerta De Hierro</h4>
              <small class="rvs-nav-item-credits">by Priscila Azzini Interior Design / Architecture</small>
            </a>
            <!-- Video Gallery item Nine -->
            <a class="rvs-nav-item">
              <span class="rvs-nav-item-thumb" style="background-image: url('img/video-img/video9.PNG"></span>
              <h4 class="rvs-nav-item-title">Puerta De Hierro</h4>
              <small class="rvs-nav-item-credits">by Priscila Azzini Interior Design / Architecture</small>
            </a>
            <!-- Video Gallery item Ten -->
            <a class="rvs-nav-item">
              <span class="rvs-nav-item-thumb" style="background-image: url('img/video-img/video10.PNG"></span>
              <h4 class="rvs-nav-item-title">Puerta De Hierro</h4>
              <small class="rvs-nav-item-credits">by Jorman S.A. Planos de Casas</small>
            </a>

          </div>
          <a class="rvs-nav-next"></a>
        </div>
      </div>
    </section>
    <!-- Video slider Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Video Slider JS -->
    <script src="js/rvslider.js"></script>
    <script src="js/rvslider.min.js"></script>
    <script>
      jQuery(function($){
        $('.rvs-container').rvslider();
      });
    </script>
    <!-- Video Slider END -->


    <!-- Common Padding -->
    <section class="cmn-padding"></section>


    <!-- Image Carousel Start -->
    <section class="image-carousel-section" id="Enamórate" data-aos="fade-up">
      <div class="">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="img/villa/Villa (1).jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/villa/Villa (2).jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/villa/Villa (3).jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
    <!-- Image Carousel End -->


    <!-- Apartment Plot Section Start -->
    <section class="apartment-section cmn-padding" id="Aparta">
    	<h2 class="puerta-title text-center">Aparta tu lote</h2>
      <div class="container">
        <div class="row full-apartment">
          <!-- Plots Start -->
          <div class="col-md-7 col-sm-12 full-plot" data-aos="fade-down">
            <img src="img/plot/PlanoLlaveRGB.jpg" width="100%">
          </div>
          <!-- Plots End -->

        

          <!-- Apartment Right Side Start -->
          <div class="col-md-4 full-plot-info" data-aos="fade-up">
            <div class="col-md-12 info-title">
              <img src="img/LOGO 2 W.png" width="150px;">
              <!--<h2 style="padding-top: 30px">Aparta tu lote.</h2>
              <p>Da clic en lote de tu intere`s para ver el precio, enganches y mensualidades disponibles.</p> -->
            </div>
            <div class="col-md-12 status-info">
              <ul class="status-ul">
                <li class="back">*Lote:
                  <select id="lotes" name="plot" onchange="showInfo(this.value)">
                    <option value="0"> Select Lote </option>
                    <option value="1"> 01 - Comercial </option>
                    <option value="2"> 02 - Comercial </option>
                    <option value="3"> 03 - Comercial </option>
                    <option value="4"> 04 - Comercial </option>
                    <option value="5"> 05 - Comercial </option>
                    <option value="6"> 06 - Comercial </option>
                    <option value="7"> 07 - Comercial </option>
                    <option value="8"> 08 - Comercial </option>
                    <option value="9"> 09 - Comercial </option>
                    <option value="10"> 10 - Diamante </option>
                    <option value="11"> 11 - Diamante </option>
                    <option value="12"> 12 - Diamante </option>
                    <option value="13"> 13 - Diamante </option>
                    <option value="14"> 14 - Diamante </option>
                    <option value="15"> 15 - Diamante</option>
                    <option value="16"> 16 - Diamante </option>
                    <option value="17"> 17 - Diamante </option>
                    <option value="18"> 18 - Diamante </option>
                    <option value="19"> 19 - Diamante </option>
                    <option value="20"> 20 - Diamante </option>
                    <option value="21"> 21 - Diamante </option>
                    <option value="22"> 22 - Diamante </option>
                    <option value="23"> 23 - Diamante </option>
                    <option value="24"> 24 - Diamante </option>
                    <option value="25"> 25 - Diamante </option>
                    <option value="26"> 26 - Diamante </option>
                    <option value="27"> 27 - Diamante </option>
                    <option value="28"> 28 - Diamante </option>
                    <option value="29"> 29 - Diamante </option>
                    <option value="30"> 30 - Diamante </option>
                    <option value="31"> 31 - Diamante </option>
                    <option value="32"> 32 - Diamante </option>
                    <option value="33"> 33 - Diamante </option>
                    <option value="34"> 34 - Diamante </option>
                    <option value="35"> 35 - Diamante </option>
                    <option value="36"> 36 - Diamante </option>
                    <option value="37"> 37 - Rubi </option>
                    <option value="38"> 38 - Rubi </option>
                    <option value="39"> 39 - Rubi </option>
                    <option value="40"> 40 - Rubi </option>
                    <option value="41"> 41 - Rubi </option>
                    <option value="42"> 42 - Rubi </option>
                    <option value="43"> 43 - Rubi </option>
                    <option value="44"> 44 - Rubi </option>
                    <option value="45"> 45 - Rubi </option>
                    <option value="46"> 46 - Rubi </option>
                    <option value="47"> 47 - Rubi </option>
                    <option value="48"> 48 - Rubi </option>
                    <option value="49"> 49 - Rubi </option>
                    <option value="50"> 50 - Rubi </option>
                    <option value="51"> 51 - Rubi </option>
                    <option value="52"> 52 - Rubi </option>
                    <option value="53"> 53 - Rubi </option>
                    <option value="54"> 54 - Rubi </option>
                    <option value="55"> 55 - Rubi </option>
                    <option value="56"> 56 - Rubi </option>
                    <option value="57"> 57 - Rubi </option>
                    <option value="58"> 58 - Rubi </option>
                    <option value="59"> 59 - Rubi </option>
                    <option value="60"> 60 - Rubi </option>
                    <option value="61"> 61 - Rubi </option>
                    <option value="62"> 62 - Rubi </option>
                    <option value="63"> 63 - Esmeralda </option>
                    <option value="64"> 64 - Esmeralda </option>
                    <option value="65"> 65 - Esmeralda </option>
                    <option value="66"> 66 - Esmeralda </option>
                    <option value="67"> 67 - Esmeralda </option>
                    <option value="68"> 68 - Esmeralda </option>
                    <option value="69"> 69 - Esmeralda </option>
                    <option value="70"> 70 - Esmeralda </option>
                    <option value="71"> 71 - Esmeralda </option>
                    <option value="72"> 72 - Esmeralda </option>
                    <option value="73"> 73 - Esmeralda </option>
                    <option value="74"> 74 - Esmeralda </option>
                    <option value="75"> 75 - Esmeralda </option>
                    <option value="76"> 76 - Esmeralda </option>
                    <option value="77"> 77 - Esmeralda </option>
                    <option value="78"> 78 - Esmeralda </option>
                    <option value="79"> 79 - Esmeralda </option>
                    <option value="80"> 80 - Esmeralda </option>
                    <option value="81"> 81 - Esmeralda </option>
                    <option value="82"> 82 - Esmeralda </option>
                    <option value="83"> 83 - Esmeralda </option>
                    <option value="84"> 84 - Esmeralda </option>
                    <option value="85"> 85 - Esmeralda </option>
                    <option value="86"> 86 - Esmeralda </option>
                    <option value="87"> 87 - Esmeralda </option>
                    <option value="88"> 88 - Zafiro </option>
                    <option value="89"> 89 - Zafiro </option>
                    <option value="90"> 90 - Zafiro </option>
                    <option value="91"> 91 - Zafiro </option>
                    <option value="92"> 92 - Zafiro </option>
                    <option value="93"> 93 - Zafiro </option>
                    <option value="94"> 94 - Zafiro </option>
                    <option value="95"> 95 - Zafiro </option>
                    <option value="96"> 96 - Zafiro </option>
                    <option value="97"> 97 - Zafiro </option>
                    <option value="98"> 98 - Zafiro </option>
                    <option value="99"> 99 - Zafiro </option>
                    <option value="100"> 100 - Zafiro </option>
                    <option value="101"> 101 - Zafiro </option>
                    <option value="102"> 102 - Zafiro </option>
                    <option value="103"> 103 - Zafiro </option>
                    <option value="104"> 104 - Zafiro </option>
                    <option value="105"> 105 - Zafiro </option>
                    <option value="106"> 106 - Zafiro </option>
                    <option value="107"> 107 - Zafiro </option>
                    <option value="108"> 108 - Zafiro </option>
                    <option value="109"> 109 - Zafiro </option>
                    <option value="110"> 110 - Zafiro </option>
                    <option value="111"> 111 - Zafiro </option>
                    <option value="112"> 112 - Zafiro </option>
                    <option value="113"> 113 - Zafiro </option>
                    <option value="114"> 114 - Zafiro </option>
                    <option value="115"> 115 - Zafiro </option>
                    <option value="116"> 116 - Zafiro </option>
                    <option value="117"> 117 - Zafiro </option>
                    <option value="118"> 118 - Zafiro </option>
                    <option value="119"> 119 - Zafiro </option>
                    <option value="120"> 120 - Zafiro </option>
                    <option value="121"> 121 - Zafiro </option>
                    <option value="122"> 122 - Zafiro </option>
                    <option value="123"> 123 - Zafiro </option>
                    <option value="124"> 124 - Zafiro </option>
                    <option value="125"> 125 - Zafiro </option>
                    <option value="126"> 126 - Zafiro </option>
                    <option value="127"> 127 - Zafiro </option>
                    <option value="128"> 128 - Zafiro </option>
                    <option value="129"> 129 - Zafiro </option>
                    <option value="130"> 130 - Zafiro </option>
                    <option value="131"> 131 - Zafiro </option>
                    <option value="132"> 132 - Zafiro </option>
                    <option value="133"> 133 - Perla </option>
                    <option value="134"> 134 - Perla </option>
                    <option value="135"> 135 - Perla </option>
                    <option value="136"> 136 - Perla </option>
                    <option value="137"> 137 - Perla </option>
                    <option value="138"> 138 - Perla </option>
                    <option value="139"> 139 - Perla </option>
                    <option value="140"> 140 - Perla </option>
                    <option value="141"> 141 - Perla </option>
                    <option value="142"> 142 - Perla </option>
                    <option value="143"> 143 - Perla </option>
                    <option value="144"> 144 - Perla </option>
                    <option value="145"> 145 - Perla </option>
                    <option value="146"> 146 - Perla </option>
                    <option value="147"> 147 - Perla </option>
                    <option value="148"> 148 - Perla </option>
                    <option value="149"> 149 - Perla </option>
                    <option value="150"> 150 - Perla </option>
                    <option value="151"> 151 - Perla </option>
                    <option value="152"> 152 - Perla </option>
                    <option value="153"> 153 - Perla </option>
                    <option value="154"> 154 - Perla </option>
                    <option value="155"> 155 - Perla </option>
                    <option value="156"> 156 - Perla </option>
                    <option value="157"> 157 - Perla </option>
                    <option value="158"> 158 - Perla </option>
                    <option value="159"> 159 - Perla </option>
                    <option value="160"> 160 - Perla </option>
                    <option value="161"> 161 - Perla </option>
                    <option value="162"> 162 - Perla </option>
                    <option value="163"> 163 - Perla </option>
                    <option value="164"> 164 - Perla </option>
                    <option value="165"> 165 - Perla </option>
                    <option value="166"> 166 - Perla </option>
                    <option value="167"> 167 - Perla </option>
                    <option value="168"> 168 - Perla </option>
                    <option value="169"> 169 - Perla </option>
                    <option value="170"> 170 - Perla </option>
                    <option value="171"> 171 - Perla </option>
                    <option value="172"> 172 - Perla </option>
                    <option value="173"> 173 - Perla </option>
                    <option value="174"> 174 - Perla </option>
                    <option value="175"> 175 - Perla </option>
                    <option value="176"> 176 - Perla </option>
                    <option value="177"> 177 - Perla </option>
                    <option value="178"> 178 - Perla </option>
                    <option value="179"> 179 - Perla </option>
                    <option value="180"> 180 - Perla </option>
                    <option value="181"> 181 - Perla </option>
                    <option value="182"> 182 - Perla </option>
                    <option value="183"> 183 - Perla </option>
                    <option value="184"> 184 - Perla </option>
                    <option value="185"> 185 - Perla </option>
                    <option value="186"> 186 - Perla </option>
                    <option value="187"> 187 - Perla </option>
                    <option value="188"> 188 - Perla </option>
                    <option value="189"> 189 - Perla </option>
                    <option value="190"> 190 - Perla </option>
                    <option value="191"> 191 - Perla </option>
                    <option value="192"> 192 - Perla </option>
                    <option value="193"> 193 - Perla </option>
                    <option value="194"> 194 - Perla </option>
                    <option value="195"> 195 - Perla </option>
                    <option value="196"> 196 - Perla </option>
                    <option value="197"> 197 - Perla </option>
                    <option value="198"> 198 - Perla </option>
                    <option value="199"> 199 - Perla </option>
                    <option value="200"> 200 - Perla </option>
                    <option value="201"> 201 - Perla </option>
                    <option value="202"> 202 - Perla </option>
                    <option value="203"> 203 - Perla </option>
                    <option value="204"> 204 - Perla </option>
                    <option value="205"> 205 - Perla </option>
                    <option value="206"> 206 - Perla </option>
                    <option value="207"> 207 - Perla </option>
                    <option value="208"> 208 - Perla </option>
                    <option value="209"> 209 - Perla </option>
                    <option value="210"> 210 - Perla </option>
                    <option value="211"> 211 - Turqueza </option>
                    <option value="212"> 212 - Turqueza </option>
                    <option value="213"> 213 - Turqueza </option>
                    <option value="214"> 214 - Turqueza </option>
                    <option value="215"> 215 - Turqueza </option>
                    <option value="216"> 216 - Turqueza </option>
                    <option value="217"> 217 - Turqueza </option>
                    <option value="218"> 218 - Turqueza </option>
                    <option value="219"> 219 - Turqueza </option>
                    <option value="220"> 220 - Turqueza </option>
                    <option value="221"> 221 - Turqueza </option>
                    <option value="222"> 222 - Turqueza </option>
                    <option value="223"> 223 - Turqueza </option>
                    <option value="224"> 224 - Turqueza </option>
                    <option value="225"> 225 - Turqueza </option>
                    <option value="226"> 226 - Turqueza </option>
                    <option value="227"> 227 - Turqueza </option>
                    <option value="228"> 228 - Turqueza </option>
                    <option value="229"> 229 - Turqueza </option>
                    <option value="230"> 230 - Turqueza </option>
                    <option value="231"> 231 - Turqueza </option>
                    <option value="232"> 232 - Turqueza </option>
                    <option value="233"> 233 - Turqueza </option>
                    <option value="234"> 234 - Turqueza </option>
                    <option value="235"> 235 - Turqueza </option>
                    <option value="236"> 236 - Turqueza </option>
                    <option value="237"> 237 - Turqueza </option>
                    <option value="238"> 238 - Turqueza </option>
                    <option value="239"> 239 - Turqueza </option>
                    <option value="240"> 240 - Turqueza </option>
                    <option value="241"> 241 - Turqueza </option>
                    <option value="242"> 242 - Turqueza </option>
                    <option value="243"> 243 - Turqueza </option>
                    <option value="244"> 244 - Turqueza </option>
                    <option value="245"> 245 - Turqueza </option>
                    <option value="246"> 246 - Turqueza </option>
                    <option value="247"> 247 - Turqueza </option>
                    <option value="248"> 248 - Turqueza </option>
                    <option value="249"> 249 - Turqueza </option>
                    <option value="250"> 250 - Turqueza </option>
                    <option value="251"> 251 - Turqueza </option>
                    <option value="252"> 252 - Turqueza </option>
                    <option value="253"> 253 - Turqueza </option>
                    <option value="254"> 254 - Turqueza </option>
                    <option value="255"> 255 - Turqueza </option>
                    <option value="256"> 256 - Turqueza </option>
                    <option value="257"> 257 - Turqueza </option>
                    <option value="258"> 258 - Turqueza </option>
                    <option value="259"> 259 - Turqueza </option>
                    <option value="260"> 260 - Turqueza </option>
                    <option value="261"> 261 - Turqueza </option>
                    <option value="262"> 262 - Turqueza </option>
                    <option value="263"> 263 - Turqueza </option>
                    <option value="264"> 264 - Turqueza </option>
                    <option value="265"> 265 - Turqueza </option>
                    <option value="266"> 266 - Turqueza </option>
                    <option value="267"> 267 - Turqueza </option>
                    <option value="268"> 268 - Turqueza </option>
                    <option value="269"> 269 - Turqueza </option>
                    <option value="270"> 270 - Turqueza </option>
                    <option value="271"> 271 - Turqueza </option>
                    <option value="272"> 272 - Turqueza </option>
                    <option value="273"> 273 - Turqueza </option>
                    <option value="274"> 274 - Turqueza </option>
                    <option value="275"> 275 - Turqueza </option>
                    <option value="276"> 276 - Turqueza </option>
                    <option value="277"> 277 - Turqueza </option>
                    <option value="278"> 278 - Turqueza </option>
                    <option value="279"> 279 - Turqueza </option>
                    <option value="280"> 280 - Turqueza </option>
                    <option value="281"> 281 - Turqueza </option>
                    <option value="282"> 282 - Turqueza </option>
                    <option value="283"> 283 - Turqueza </option>
                    <option value="284"> 284 - Turqueza </option>
                    <option value="285"> 285 - Turqueza </option>
                    <option value="286"> 286 - Turqueza </option>
                    <option value="287"> 287 - Turqueza </option>
                    <option value="288"> 288 - Turqueza </option>
                  </select>
                </li>
                <li class="no-back">Superficie: <span id="area">0.00</span>
                <span style="margin-left: 50px">m<sup>2</sup></span></li>
                <li class="no-back">Largo(Large): <span id="large">0.00</span><span style="margin-left: 40px;">m</span></li>
                <li class="no-back">Ancho(Wide): <span id="wide">0.00</span><span style="margin-left: 40px;">m</span></li>
              </ul>
            </div>
            <!-- Resumen Item -->
            <div class="col-md-12 resumen">
              <h2 style = "font-size:24px; color:yellowgreen " class="resumen-txt">PROMOCIONES 2021</h2>
              <div class="row status-info">
                <div class="col-md-12">
                  <ul class="status-ul">
                    <li class="back">*Plan:
                    <input style="margin-left: 20px;" type="radio" id="pesos" name="currency" value="Pesos" checked onclick="setData(this.value)">
                    <label for="pesos">Pesos MX</label>
                    <input style="margin-left: 20px;" type="radio" id="usd" name="currency" value="usd" onclick="setData(this.value)">
                    <label for="usd">USD</label>
                      <select id="option_val" onchange="showData(this.value)">
                        <!--option value="efectivo">Efectivo (0% Descuento)</option-->
                        <option value="cash">Efectivo (35% Off)</option>
                        <option value="12">12 meses (20% Off)</option>
                        <option value="24">24 meses (15% Off)</option>
                        <option value="36">36 meses (10% Off)</option>
                      </select>
                    </li>
                    <li class="no-back">Total: <span style="width: 60%; text-decoration: line-through;" id="total">$0</span></li>
                    <li class="no-back">Net Total: <span style="width: 60%;" id="net-total">$0</span></li>
                    <li class="no-back">Enganche: <span id="enganche">$0</span></li>
                    <li class="no-back">Administrativos: <span id="admins">$1,500.00</span></li>
                    <li class="no-back" id="bal">BALANCE: <span id="balance">$0</span></li>
                    <li class="no-back" style="display: none;" id="men">Mensualidad: <span id="monthly">$0</span></li>
                    <p style="color: #fff; font-size:12px; margin-top:30px; letter-spacing: 0.85px">*Dimensiones y precios son
aproximados y están Sujetos a
Cambio Sin Previo Aviso, contáctanos
para más información.</p>
                  </ul>
                </div>
              </div>
            </div>

          </div>
          <!-- Apartment Right Side End -->

          <div class="col-md-12 full-estoy">
            <form class="estoy-cont-btn" action="index.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-3" data-aos="fade-up">
                  <label for="">Nombre</label>
                  <input type="number" name="number" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group col-md-3" data-aos="fade-up">
                  <label for="">TELÉFONO</label>
                  <input type="number" name="phone" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group col-md-3" data-aos="fade-up">
                  <label for="">Correo</label>
                  <input type="mail" name="mail" class="form-control" id="" placeholder="">
                </div> 
              </div>
              <button type="submit" name="submit" class="btn btn-primary estoy-btn" data-aos="fade-up">Estoy Interesado</button>
            </form>
            <p style="font-size: 14px; color: #222; text-align: center;"><?php echo $p;?></p>
          </div>

        </div>
      </div>
    </section>
    <!-- Apartment Plot Section End -->
    

    <!-- Contact Section Start -->
    <section class="contact-section" id="Contáctanos">
      <div class="container">
        <div class="row full-contact" data-aos="fade-up">
          <div class="col-md-5 cont-img">
            <img src="img/LOGO 2.png" data-aos="fade-up">
          </div>
          <div class="col-md-7 cont-form">
            <form action="index.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-12" data-aos="fade-up">
                  <label for="">Nombre</label>
                  <input type="number" name="number1" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group col-md-12" data-aos="fade-up">
                  <label for="">Email</label>
                  <input type="email" name="mail1" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group col-md-12" data-aos="fade-up">
                  <label for="">Phone</label>
                  <input type="number" name="phone1" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group col-md-12" data-aos="fade-up">
                  <label for="">Mensaje</label>
                  <input type="txt" name="msg" class="form-control" id="" placeholder="">
                </div>
              </div>
              <button type="submit" name="submit1" class="btn btn-primary cont-btn hvr-bounce-to-right" data-aos="fade-up">Enviar</button>
            </form>
            <p style="font-size: 14px; color: #fff; text-align: center"><?php echo $p1;?></p>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Section End -->


    <!-- Footer Section Start -->
    <footer class="footer-section">
      <div class="container">
        <div class="row fot-padd" data-aos="fade-up">
          <div class="col-md-3 mb-5">
            <h3>Quick Link</h3>
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Help</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <h3>Support</h3>
            <ul class="list-unstyled link">
              <li><a href="#">Our Location</a></li>
              <li><a href="#">The Hosts</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <h3>Contact Info</h3>
            <p><span class="d-block">Address:</span> <span>US Address:   6132 Foothill Blvd, Oakland, CA 94605<br>
Direccion Mexico:  Madeira 663, Colonia Los Viñedos, Santa Catarina, N.L. Mexico 66350 </span></p>
            <p><span class="d-block">Phone:</span> <span>+1 (925) 234-8522</span></p>
            <p><span class="d-block">Email:</span> <span>ederhumberto@hotmail.com </span></p>
          </div>
          <div class="col-md-3 mb-5">
            <h3>Suscribe</h3>
            <p>Sign up for our newsletter</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="container divider"></div>
        <div class="row bordertop text-center pt-5">
          <div class="col-md-6">
            <img src="img/LOGO 2 W.png" width="100px" style="float: left;">
          </div>
            
          <p class="col-md-6 social">
            <a href="#" target="_blank"><span class="fa fa-youtube"></span></a>
            <a href="#" target="_blank"><span class="fa fa-linkedin"></span></a>
            <a href="https://www.instagram.com/raices_32/" target="_blank"><span class="fa fa-instagram"></span></a>
            <a href="#" target="_blank"><span class="fa fa-twitter"></span></a>
            <a href="https://www.facebook.com/Raices32/" target="_blank"><span class="fa fa-facebook"></span></a>
          </p>
        </div>
      </div>
    </footer>
  </div> <!-- .animsition -->
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
    <!-- Toggle bar Srcipr -->
    <script src="js/mainJs/plugins.js"></script>
    <script src="js/mainJs/main.js"></script>


    <!-- Video slider Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Video Slider JS -->
    <script src="js/rvslider.js"></script>
    <script src="js/rvslider.min.js"></script>
    <script>
      jQuery(function($){
        $('.rvs-container').rvslider();
      });
    </script>

    <!-- Tooltip Button -->
    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>

  </body>
</html>