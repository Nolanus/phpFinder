<?php
/*
 phpFinder - Ein Datei-Manager in php für die Datei-Verwaltung über den Browser
 Copyright (C) 2013 Sebastian Fuss

 This library is free software; you can redistribute it and/or
 modify it under the terms of the GNU Lesser General Public
 License as published by the Free Software Foundation; either
 version 2.1 of the License, or (at your option) any later version.

 This library is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 Lesser General Public License for more details.
 */
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);
session_set_cookie_params(1800);
session_start();
/*
 ====================================================
 === Ab hier dürfen Änderungen vorgenommen werden ===
 ====================================================
 */
// ================= Zugangsdaten ================= //
//Tragen Sie in der folgenden Zeile den gewünschten Nutzernamen ein!
define("USERNAME", "admin");

//Tragen Sie in der folgenden Zeile ihr MD5()-kodiertes Passwort ein!
//Auf www.md5-gen.de.vu können Sie den MD5-Hash Ihres Passworts berechnen
define("PASSWORT", "af9063199baf3a1cffc4a185dc18daae");

// =============== Einstellungs-Datei ============== //
//Relativer Pfad zur phpFinder Konfigurations-Datei
define("CONFIG_FILE", "phpFinder.conf");

//Mit folgendem Wert können Sie bestimmen, ob die Konfig-Datei oder die in der index.php
//vorgenommenem Einstellungen verwendet werden sollen
define("USE_CONFIG_FILE", true);

// =================== Wichtige Einstellungen ======== //
// Wichtige Einstellungen können nur hier festgelegt werden und nicht durch Einstellungen in der Konfigurations-Datei
// überschrieben werden.

//Folgender Wert definiert ob Sie das komplette Entfernen von phpFinder über das
//Web Interface erlauben möchten (true) oder nicht (false)
define("ALLOW_REMOVAL", true);

//Folgendes Array enthält alle Dateitypen, die standardmäßig nicht als Textdateien erkannt werden,
//allerdings dennoch als solche behandelt werden sollen (Bsp.: $ALLOWED_EXT = array("foo","bar"); )
$ALLOWED_EXT = array();

// Sollen die phpFinder Dateien ebenfalls aufgelistet werden?
define("LIST_FINDER_FILES", false);

// ===== Zusätzliche Einstellungsmöglichkeiten ===== //
// Zusätzliche Einstellungen können über die Einstellungsseite bearbeitet werden und werden
// in der Konfigurations-Datei gespeichert

//Manchmal gibt es Probleme mit der Werbung, die von den Hostern automatisch eingeblendet werden.
//Setze folgenden Wert auf true, um die Werbung zu blockieren (nur in eingloggtem Zustand)
//ACHTUNG: OFT VERSTÖßT DIES GEGEN DIE AGB DES HOSTERS!
$BLOCK_ADS = false;

//Definieren Sie hier die maximale Anzahl an Dateien, die gleichzeitig hochgeladen werden dürfen
$MAX_UPLOAD = 5;

//Setzen Sie folgenden Wert auf true, wenn Sie den Bild-Editor nicht Pixlr verwenden möchten
$BLOCK_PIXLR = false;

//Geben Sie hier den Pfad zum Ordner der phpFinder Bilder ein. Falls Sie die Bilder im Unterordner
//"img" lassen, brauchen Sie dies nicht zu ändern. (OHNE / am Ende!)
$IMG = "sprite.png";

//Mit der folgenden Variable können Sie festlegen, ob automatisch nach Updates für phpFinder
//gesucht werden soll (empfohlen)
$AUTO_VERSION_CHECK = true;

//Geben Sie Ihren Google API Key ein, um den goo.gl URL-Shortener nutzen zu können
$GOOGLE_API = "";

/*
 ====================================================
 ======= Ab hier am besten nichts mehr ändern =======
 ====================================================
 */
//Angabe der Version
$VERSION = 0.905;

//Angabe der Standard Farben
$defaultColors = array("#e3f1fe", "#3C86D1", "#aacfe4", "#0067CE", "#eeeeee");

//Config-Datei Integrierung
if (USE_CONFIG_FILE && file_exists(CONFIG_FILE)) {
	include (CONFIG_FILE);
	if (!$useColors) {
		$colors = $defaultColors;
	}
} else {
	$colors = $defaultColors;
}
//Zeitzone
if (!isset($timezone) || $timezone == "") {
	$timezone = date_default_timezone_get();
} else {
	date_default_timezone_set($timezone);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<meta name="author" content="Sebastian Fuss; e-mail: Sebastian.Fuss@googlemail.com; https://github.com/Nolanus/phpFinder" />
	<meta name="description" content="PHP Script zum supereinfachen Verwalten von Dateien und Ordner auf einem Webspace über jeden Browser" />
  	<?php
	// Tablet "support"
	if (isset($_GET['forceTablet']) || stripos($_SERVER["HTTP_USER_AGENT"], "Tablet") || stripos($_SERVER["HTTP_USER_AGENT"], "iPad") || (stripos($_SERVER["HTTP_USER_AGENT"], "Android") && !stripos($_SERVER["HTTP_USER_AGENT"], "Mobile"))) {
		echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
	}
  	?>
	<link href="data:image/x-icon;base64,AAABAAIAEBAAAAEAIABoBAAAJgAAABAQAAABAAgAaAUAAI4EAAAoAAAAEAAAACAAAAABACAAAAAAAAAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACocVGpw45o/8CLZv++iGT/u4Vh/7mDX/+0flz/snxa/7F7WP+ueVf/rXZW/6t1VP+pc1P/qXFR/6hxUakAAAAAyJJs////////////////////////////3Kd7//////////////////////////////////////+pclH/AAAAAMqUbv//////8/Pz/7u7u/+7u7v//////9yne///////cYyb/3ylxP+kx9z//v76//z8+f//////qnNT/wAAAADMl2////////Pz8/+7u7v////////////cp3v//////02Dq/+XxvH/T5DJ/2udx//7+/b//////6x1VP8AAAAA0Zxz///////z8/P/u7u7/7u7u///////3Kd7//////+Dssz/oMns/y2Mwv9Spc7/W5rQ//////+welj/AAAAANSedf//////8/Pz/7u7u////////////9yne///////p8zd/3uz0v+D3vH/XN31/3DL7v+GvOj/snxa/wAAAADVoHb//////7u7u/+7u7v/u7u7///////cp3v///////v49P/Q4uj/otrs/5Lq+f9E1vT/cMvu/1OLwP8AAAAA2KJ5//////+7u7v/////////////////3Kd7///////79vH/+PTu/7fg6P+K2/H/ker5/1zd9f9xze7/QJXartmjef//////tra2/7u7u////////////9yne///////9/Pt//bv6v/16+f/tNrk/6Ti8/+P5Pf/bcHp/3iw3//bpHr////////////////////////////cp3v////////////////////////////V8fn/gs/v/7bY8//E3/j/3Kd7/9yne//cp3v/3Kd7/9yne//cp3v/3Kd7/9yne//cp3v/3Kd7/9yne//cp3v/3Kd7/6innf9tq9f/mMHk/9yshf3ouZL/6LmS/+i5kv/ouZL/6LmS/+i5kv/ouZL/6LmS/+i5kv/ouZL/6LmS/+i5kv/ouZL/wJBu/QAAAACpcFFr3LCN9Nyne//cpnr/2qR6/9iief/VoHb/1J51/9Kdc//PmnL/zplw/8uWb//JlGz/xJl69KlwUWsAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP//AAD//wAAAAEAAAABAAAAAQAAAAEAAAABAAAAAQAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAQAAgAMAAP//AAAoAAAAEAAAACAAAAABAAgAAAAAAAACAAAAAAAAAAAAAAAAAAAAAAAAAAAA/6lxUf+pclL/qnNT/6t1VP+sdVT/rXZW/655V/+welj/sXtY/7J8Wv+0flz/uYNf/7uFYf++iGT/wItm/8OOaP/BkG//yJJs/8mUbP/KlG7/y5Zv/8yXb//OmXD/z5py/8Saev/RnHP/0p1z/9Sedf/VoHb/2KJ5/9mjef/apHr/26R6/9ymev9xjJv/TYOr/y2Mwv9Ti8D/T5DJ/0GV2/9bmtD/a53H/1Klzv98pcT/bavX/3uz0v94sN//RNb0/1zd9f9twen/cMvu/3HN7v+op53/tra2/7u7u//drIX/3bGN/+i5kv+Dssz/hrzo/6TH3P+nzN3/gs/v/5jB5P+XxvH/g97x/4rb8f+gyez/otrs/7Ta5P+22PP/j+T3/5Hq+f+S6vn/t+Do/6Ti8//E3/j/0OLo/9Xx+f/16+f/9u/q//fz7f/49O7/8/Pz//v28f/7+PT/+/v2//z8+f/+/vr//////wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAAAP///////////////////////////////////////////xAPDg0MCwoJBwYDBSL//xJaWlpaWiJaWlpaWlpaAv8TWlQ3N1oiWiMsPVlYWgP/FlpUN1paIlokQScqV1oE/xtaVDc3WiJaO0QlKylaCP8cWlQ3WloiWj4uQjE0PAv/HVo3NzdaIlpWTkVKMEIy/x5aN1paWiJaVVNLQ0oxNP8fWjY3WloiWlJRUEtMSDMvIllZWVpaIlpaWlpZT0NLTToiODgiIiIiIiIiIjpTTUT/WlI6Ojo6Ojo6Ojo6Ov////8iIiAeHRwbFxYTUP///////////////////////////wAA//8AAAABAAAAAQAAAAEAAAABAAAAAQAAAAEAAAABAAAAAAAAAAAAAAAAAAAAAAAAAAEAAIADAAD//wAA" rel="shortcut icon" />
	<title>phpFinder <?php echo $VERSION; ?></title>
	<style type="text/css">
  	/* <![CDATA[ */
	body{
		font-family:Verdana,Geneva,sans-serif;
		font-size: <?php echo (isset($fontsize) ? $fontsize : "90"); ?>%;
		margin: 0;
		padding: 0;
		border: 0;
		overflow: hidden;
		height: 100%;
		max-height: 100%;
		color: #000;
	}
	h2{
		border-bottom: 2px solid <?php echo $colors[2]; ?>;
		font-size:140%;
	}
	#leftArea{
		position: absolute;
		top: 0;
		left: 0;
		width: 250px;
		height: 100%;
		background-color: white;
		overflow: auto;
		border-right: 1px solid <?php echo $colors[2]; ?>;
	}
	#headArea{
		position: absolute;
		top: 0;
		right: 0;
		left: 250px;
		overflow: hidden;
		height: 120px;
		background-color: <?php echo $colors[4]; ?>;
	}
	#headArea i.icon{
		margin:0 <?php echo (isset($picdistance) ? $picdistance : 5); ?>px;
	}
	#footerArea img{
		margin:0 2.5px;
	}
	#footerArea{
		position: absolute;
		padding:3px;
		top: auto;
		left: 250px;
		bottom: 0;
		right: 0;
		height: 45px;
		background-color: <?php echo $colors[0]; ?>;
		<?php
		if (isset($drawBorders) && $drawBorders) {
			echo "border-style: solid;
		   border-width: 1px 0 0 1px;
		   border-color: " . $colors[2] . ";";
		}
		?>
	}
	#mainArea{
		position: fixed;
		left: 250px;
		top: 120px;
		right: 0;
		bottom: 45px;
		overflow: auto;
		background: #fff;
		<?php
		if (isset($drawBorders) && $drawBorders == true) {
			echo "border-top: 1px solid " . $colors[2] . ";";
		}
		?>
	}
	.wrap{
		margin: 15px;
	}
	p{
		margin: 5px 0;
	}
	p:first-child{
		margin-top: 0;
	}
	a{
		color: <?php echo $colors[1]; ?>;
		text-decoration: none;
	}
	a:hover{
		color: <?php echo $colors[3]; ?>;
		text-decoration: underline;
	}
	img{
		border: 0;
	}
	#leftArea tr:hover, .bgcolor{
		background-color: <?php echo $colors[0]; ?>;
	}
	#leftArea td{
		padding: 2px 0;
	}
	.bgcolor2{
		background-color: <?php echo $colors[2]; ?>;
	}
	.restrainImageSize{
		max-width: 400px;
		max-height: 350px;
	}
	.textcenter{
		text-align: center;
	}
	/* Icons */
	.icon {
		display:inline-block;
		background: url('<?php echo $IMG; ?>') no-repeat top left;
		width: 16px;
		height: 16px;
		vertical-align: middle;
	}
	.icon.delete {background-position: 0 0;}
	.icon.comments {background-position: -26px 0;}
	.icon.computer_add {background-position: -52px 0;}
	.icon.group {background-position: -78px 0;}
	.icon.help {background-position: -104px 0;}
	.icon.github {background-position: -130px 0;}
	.icon.link_go {background-position: -156px 0;}
	.icon.music {background-position: -182px 0;}
	.icon.page_white {background-position: -208px 0;}
	.icon.page_white_acrobat {background-position: -234px 0;}
	.icon.page_white_add {background-position: -260px 0;}
	.icon.page_white_add_upload {background-position: -286px 0;}
	.icon.page_white_compressed {background-position: -312px 0;}
	.icon.page_white_copy {background-position: -338px 0;}
	.icon.page_white_delete {background-position: -364px 0;}
	.icon.page_white_edit {background-position: -390px 0;}
	.icon.page_white_error {background-position: -416px 0;}
	.icon.page_white_excel {background-position: -442px 0;}
	.icon.page_white_gear {background-position: -468px 0;}
	.icon.page_white_get {background-position: -494px 0;}
	.icon.page_white_go, #leftArea .icon.file:hover {background-position: -520px 0;}
	.icon.page_white_link {background-position: -546px 0;}
	.icon.page_white_powerpoint {background-position: -572px 0;}
	.icon.page_white_rename {background-position: -598px 0;}
	.icon.page_white_text {background-position: -624px 0;}
	.icon.page_white_word {background-position: -650px 0;}
	.icon.page_white_wrench {background-position: -676px 0;}
	.icon.report {background-position: -702px 0;}
	.icon.server {background-position: -728px 0;}
	.icon.server_chart {background-position: -754px 0;}
	.icon.server_database {background-position: -780px 0;}
	.icon.server_go {background-position: -806px 0;}
	.icon.textfield_rename_go {background-position: -832px 0;}
	.icon.xhtml_valid {background-position: -858px 0;}
	.icon.cross {background-position: -884px 0;}
	.icon.check {background-position: -910px 0;}
	.icon.accept {background-position: -936px 0;}
	.icon.application_xp_terminal {background-position: -962px 0;}
	.icon.arrow_left {background-position: -988px 0;}
	.icon.arrow_refresh {background-position: -1014px 0;}
	.icon.arrow_turn_left {background-position: -1040px 0;}
	.icon.bug_error {background-position: -1066px 0;}
	.icon.cancel {background-position: -1092px 0;}
	.icon.cog {background-position: -1118px 0;}
	.icon.css_valid {background-position: -1144px 0;}
	.icon.disk {background-position: -1170px 0;}
	.icon.door_in {background-position: -1196px 0;}
	.icon.email_go {background-position: -1222px 0;}
	.icon.error {background-position: -1248px 0;}
	.icon.exclamation {background-position: -1274px 0;}
	.icon.editor {background-position: -1300px 0;}
	.icon.film {background-position: -1326px 0;}
	.icon.folder {background-position: -1352px 0;}
	.icon.folder_add {background-position: -1378px 0;}
	.icon.folder_copy {background-position: -1404px 0;}
	.icon.folder_delete {background-position: -1430px 0;}
	.icon.folder_edit, #leftArea .icon.folder:hover {background-position: -1456px 0;}
	.icon.folder_error {background-position: -1482px 0;}
	.icon.folder_explore {background-position: -1508px 0;}
	.icon.folder_go {background-position: -1534px 0;}
	.icon.folder_image {background-position: -1560px 0;}
	.icon.folder_key {background-position: -1586px 0;}
	.icon.folder_page_white {background-position: -1612px 0;}
	.icon.folder_rename {background-position: -1638px 0;}
	.icon.folder_table {background-position: -1664px 0;}
	.icon.folder_wrench {background-position: -1690px 0;}
	.icon.help {background-position: -1716px 0;}
	.icon.house {background-position: -1742px 0;}
	.icon.image {background-position: -1768px 0;}
	.icon.image_blur {background-position: -1794px 0;}
	.icon.image_bnw {background-position: -1820px 0;}
	.icon.image_brightness {background-position: -1846px 0;}
	.icon.image_compressed {background-position: -1872px 0;}
	.icon.image_contrast {background-position: -1898px 0;}
	.icon.image_copy {background-position: -1924px 0;}
	.icon.image_delete {background-position: -1950px 0;}
	.icon.image_edge {background-position: -1976px 0;}
	.icon.image_edit {background-position: -2002px 0;}
	.icon.image_emboss {background-position: -2028px 0;}
	.icon.image_go {background-position: -2054px 0;}
	.icon.image_grey {background-position: -2080px 0;}
	.icon.image_link {background-position: -2106px 0;}
	.icon.image_negativ {background-position: -2132px 0;}
	.icon.image_pixel {background-position: -2158px 0;}
	.icon.image_rename {background-position: -2184px 0;}
	.icon.image_resize {background-position: -2210px 0;}
	.icon.image_rotate {background-position: -2236px 0;}
	.icon.image_wrench {background-position: -2262px 0;}
	.icon.information {background-position: -2288px 0;}
	.icon.key_go {background-position: -2314px 0;}
	.icon.images {background-position: -936px -16px;}
	.icon.folder_user {background-position: -962px -16px;}
	.icon.magnifier {background-position: -988px -16px;}
	.icon.page_white_magnify {background-position: -1014px -16px;}
	.icon.wrench {background-position: -1040px -16px;}
	.icon.footerlogo{
		background-position: 0 -32px;
		height: 20px;
		width: 82px;
	}
	.icon.logo{
		background-position: -192px -17px;
		height: 173px;
		width: 722px;
		margin: 50px 0;
	}
	/* Loading Image Animation */
	@-webkit-keyframes loader {
		from { background-position: 0 -16px; }
		to { background-position: -192px -16px; }
	}
	@-moz-keyframes loader {
		from { background-position: 0 -16px; }
		to { background-position: -192px -16px; }
	}
	@keyframes loader {
		from { background-position: 0 -16px; }
		to { background-position: -192px -16px; }
	}
	.loadWheel {
		margin: 0 auto;
		-webkit-animation: loader 1.6s steps(12, end) infinite;
		-moz-animation: loader 1.6s steps(12, end) infinite;
		animation: loader 1.6s steps(12, end) infinite;
	}
	/* Statusbars */
	.message{
		padding: 10px 5px 10px 15px;
		text-align: left;
		border-width: 2px 0;
		border-style: solid;
	}
	.message:before{
		content: "";
		display: inline-block;
		height: 16px;
		width: 16px;
		background: transparent url('<?php echo $IMG; ?>') no-repeat -2288px 0;
		padding: 0 5px;
		float: left;
	}
	.message.error {
		background-color: #FFE4E3;
		border-color: #E47E7A;
	}
	.message.error:before{
		background-position: -1274px 0;
	}
	.message.warning {
		background-color: #FFF6BF;
		border-color: #ffd324;
	}
	.message.warning:before{
		background-position: -1248px 0;
	}
	.message.success {
		background-color: #E0FFD3;
		border-color: #8CD56A;
	}
	.message.success:before{
		background-position: -910px 0;
	}
	.message.information{
		background-color: #E3F1FE;
		border-color: #7AA6D3;
	}
	/* Buttons and Links */
	.buttons a, button{
		display: block;
		text-align: center;
		margin: 0 7px 0 0;
		background-color: #f5f5f5;
		border: 1px solid #dedede;
		border-top: 1px solid #eee;
		border-left: 1px solid #eee;
		font-family: "Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
		font-size: 100%;
		line-height: 130%;
		text-decoration: none;
		font-weight: bold;
		color: #565656;
		cursor: pointer;
		padding: 5px 10px 6px 7px;
	}
	button{
		width: auto;
		overflow: hidden;
		padding: 4px 10px 3px 7px; /* IE6 */
	}
	button[type]{
		padding: 5px 10px 5px 7px; /* Firefox */
		line-height: 17px; /* Safari */
	}
	*:first-child+html button[type]{
		padding: 4px 10px 3px 7px; /* IE7 */
	}
	button img, .buttons a img{
		margin: 0 3px -3px 0 !important;
		padding: 0;
		border: none;
		width: 16px;
		height: 16px;
	}
	button:hover, .buttons a:hover{
		background-color: #dff4ff;
		border: 1px solid #c2e1ef;
		color: #336699;
	}
	.buttons a:active{
		background-color: #6299c5;
		border: 1px solid #6299c5;
		color: #fff;
	}
	button.positive, .buttons a.positive{
		color: #529214;
	}
	.buttons a.positive:hover, button.positive:hover{
		background-color: #E6EFC2;
		border: 1px solid #C6D880;
		color: #529214;
	}
	.buttons a.positive:active{
		background-color: #529214;
		border: 1px solid #529214;
		color: #fff;
	}
	.buttons a.negative, button.negative{
		color: #d12f19;
	}
	.buttons a.negative:hover, button.negative:hover{
		background: #fbe3e4;
		border: 1px solid #fbc2c4;
		color: #d12f19;
	}
	.buttons a.negative:active{
		background-color: #d12f19;
		border: 1px solid #d12f19;
		color: #fff;
	}
	li{
		list-style-type: none;
		line-height: 25px;
	}
	.property_table{
		border: 0;
		min-width: 350px;
	}
	.property_table td{
		padding: 5px;
	}
	/* Datei Formate */
	.editlink{
		display:block;
	}
	/* Formulare */
	form{
		margin: 0 auto;
		width: 400px;
		padding: 14px;
	}
	form h1 {
		font-size: 14px;
		font-weight: bold;
		margin-bottom: 8px;
	}
	form h3 {
		white-space: nowrap;
	}
	form p{
		font-size: 11px;
		color: #666666;
		margin-bottom: 20px;
		border-bottom: solid 1px <?php echo $colors[1]; ?>;
		padding-bottom: 10px;
	}
	form label{
		display: block;
		font-weight: bold;
		text-align: right;
		width: 140px;
		float: left;
		clear: both;
	}
	form .small{
		color: #666666;
		display: block;
		font-size: 11px;
		font-weight: normal;
		text-align: right;
		width: 140px;
	}
	form input, form select{
		float: left;
		padding: 4px 2px;
		width: 200px;
		margin: 2px 0 20px 10px;
	}
	form select{
		width: 207px;
	}
	input,select,.styletext{
		background-color: <?php echo $colors[0]; ?>;
		border: 1px solid <?php echo $colors[2]; ?>;
	}
	input:hover,.styletext:hover, input:focus,.styletext:focus, select:hover, select:focus{
		border: 1px solid <?php echo $colors[3]; ?>;
	}
	.styletext{
		float: left;
		font-size: 12px;
		padding: 4px 2px;
		border: solid 1px <?php echo $colors[2]; ?>;
		width: 200px;
		margin: 2px 0 20px 10px;
	}
	.floatleft {
		float: left;
	}
	form button {
		clear: both;
		margin-left: 150px;
		margin-bottom: 20px;
		min-width: 135px;
		height: 31px;
		text-align: center;
		line-height: 31px;
	}
	/* ]]> */
	</style>
	<!--[if IE]>
	<style type="text/css">
	form input, select{
	  font-size: 100%;
	}
	li{
	  margin: 5px 0;
	}
	#navbar i, a .icon{
	  cursor: pointer;
	}
	.icon{
	  margin: 0 2px;
	}
	/* ]]> */
	</style>
	<![endif]-->
</head>
<body>
	<div id="headArea">
		<div class="wrap">
		<?php
		// Hier gehts nur weiter, falls die Einlog-Daten korrekt sind
		if (isset ($_POST['Login']) && md5($_POST['passwort']) == PASSWORT && $_POST['user'] == USERNAME) {
			$_SESSION['user'] = $_POST['user'];
		  	$_SESSION['ip'] = $_SERVER["REMOTE_ADDR"];
		  	// Hier geben wir der Sessionen den Zugangsschlüssel.
		}
		if (isset ($_GET['action']) && $_GET['action'] == "logout") {
			// Logout
		  	if (session_destroy()) {
		    	$logedout = true;
		  	} else {
		    	//Der Logout hat nicht geklappt
		    	$logedout = false;
		  	}
		}
		if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443){
			$connectionType = "https://";
		}else{
		    $connectionType = "http://";
		}
		// Check, ob zugangsberechtigt
		if (isset($_SESSION['user']) && $_SESSION['user'] == USERNAME && $_SESSION['ip'] == $_SERVER["REMOTE_ADDR"] && (!isset($logedout) || $logedout == false)) {
			// ====== Wichtige Dinge am Anfang ======= //
		  	clearstatcache();
		
			// Remove Magic Quotes from all inputs
			if(get_magic_quotes_gpc()){
				$_POST = array_map("stripslashes", $_POST);
			    $_GET = array_map("stripslashes", $_GET);
			}
			// ====== Bestimmung des anzuzeigenden Ordners ======= //
			if (isset ($_GET['dir']) && $_GET['dir'] != "" && $_GET['dir'] != " " && $_GET['dir'] != "/") {
				//Ist ein Verzeichnis per GET übergeben worden?
				if (substr($_GET['dir'], - 1) == "/") { // Trailing Slash?
  					$folder = $_GET['dir'];
				} else {
  					$folder = $_GET['dir'] . "/";
    			}
 			} else {
 				//Kein Verzeichnis übergeben wurde: aktuelles Verzeichnis angezeigt
    			$folder = "./";
			}
  			DEFINE("CURRENT_FOLDER", $folder);

  			//Definieren von "global" benötigten Variablen $self und $self_raw, die jeweils die aktuelle Datei + Pfad enthalten
			$self = str_replace("&", "&amp;", $_SERVER['PHP_SELF'] . "?dir=" . rawurlencode(CURRENT_FOLDER));
			$url = str_replace("&", "&amp;", $connectionType . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . http_build_query($_GET));
			$self_raw = str_replace("&", "&amp;", $_SERVER['PHP_SELF']);
			$ref = isset($_SERVER['HTTP_REFERER']) ? str_replace("&", "&amp;", $_SERVER['HTTP_REFERER']) : "";

			//Setzen der Cookielebenszeit
			$cookieparms = session_get_cookie_params();
			$cookie_end = $cookieparms['lifetime'];


			// ====== Wichtige Funktionen ======= //
            /**
            * Kodiert URL's so das Sie aufgerufen werden können, auch wenn im Dateinamen URL Escapezeichen vorkommen
            */
			function rawurlencode2($url) {
			    $url = rawurlencode($url);
			    return $url;
			}
            /**
            * Gibt eine Byte-Größe in der passenden Einheit wieder
            */
		  	function size_unit($size) {
			    if ($size < 1024) {
			    	return $size . " Byte";
			    } else if ($size < 1024000) {
			        return round($size / 1024, 2) . " KB";
			    } else if ($size < 1048576000) {
			        return round($size / 1048576, 2) . " MB";
			    } else if ($size < 1073741824000) {
			    	return round($size / 1073741824, 2) . " GB";
				}
		  	}
            /**
            * Entfernt den letzten Ordner aus einem Pfad String
            * Wird benötigt für den "Aufwärts"-Link
            */
            function cutLastFolder($path) {
                if (substr_count($path, "/") > 1) {
                    //Überprüfen ob im Pfad überhaupt ein Slash drin ist
                    $path_temp = strrchr($path, "/");
                    $path_new = substr($path, 0, (strlen($path_temp) * - 1));
                    if ($path_temp == "/") {
                        $path_temp = strrchr($path_new, "/");
                        $path_new = substr($path_new, 0, ((strlen($path_temp) - 1) * - 1));
                    } else {
                            $path_new .= "/";
                    }
                    return $path_new;
                } else {
                    //Falls kein Slash drin ist, wird. zurückgegeben und das Root Verzeichnis der Datei angezeigt
                    return "./";
                }
            }
            /**
            * Löscht einen Ordner inklusive Unterordner und Dateien
            */
            function delete($file) {
                chmod($file, 0777);
                if (is_dir($file)) {
                    $handle = opendir($file);
                    while ($filename = readdir($handle)) {
                        if ($filename != "." && $filename != "..") {
                            chmod($file . "/" . $filename, 0777);
                            delete($file . "/" . $filename);
                        }
                    }
                    closedir($handle);
                    rmdir($file);
                } else {
                        unlink($file);
                }
            }
            /**
            * Ermittelt die Größe eines Verzeichnisses und der darin enthaltenen Dateien
            */
            function dir_size($dir) {
                $gr = 0;
                $fp = opendir($dir);
                while ($datei = readdir($fp)) {
                    if (is_readable("$dir/$datei")){
                        if (is_dir("$dir/$datei") && $datei != "." && $datei != "..") {
                                $gr += dir_size("$dir/$datei");
                        } else {
                                $gr += filesize("$dir/$datei");
                        }
                    }
                }
                closedir($fp);
                return $gr;
            }
            /**
            * Zählt Unterordner und Dateien in einem Ordner
            */
            function dir_count($dir) {
                $dateien = 0;
                $ordner = 0;
                $fp = opendir($dir);
                //Elemente im Ordner durchlaufen
                while ($datei = readdir($fp)) {
                    if (is_dir("$dir/$datei") && $datei != "." && $datei != "..") {
                            $ordner = $ordner + 1;
                    }
                    if (is_file("$dir/$datei")) {
                            $dateien = $dateien + 1;
                    }
                }
                closedir($fp);
                return array("folders" => $ordner, "files" => $dateien);
            }
			/**
			 * Strip slashes and display special characters as HTML-Code
			 */
			function sanitize_names($name){
				return htmlspecialchars(stripslashes($name));
			}
			/**
			 * Ermittelt den Typ einer Datei anhand des Mime-Types und der Dateiendung
			 */
			function dateityp($ext, $file) {
				if (function_exists("mime_content_type")) {
					$temp_mime = mime_content_type($file);
				} else {
					$temp_mime = "";
				}
				// Each item has the following format: [array if commonly used extensions, filetype name, mimetype recognition string, additional mimetype display string]
				$ext_filetype = array(
					array(array("txt", "html", "htm", "php", "css", "js", "asc", "etx", "bat", "sh", "ini", "pl", "java", "c", "src"), "text", "text", ""),
					array(array("jpg", "jpeg", "gif", "png", "bmp", "svg", "jpe", "ico", "cgm", "jp2", "tif", "tiff"), "image", "image", ""),
					array(array("psd"), "photoshop", "application", "Photoshop"),
					array(array("avi", "flv", "swf", "wmv", "mp4", "m4v", "dif", "dv", "m4u", "mov", "movie", "mpeg", "mpe", "mpg", "qt"), "video", "video", ""),
					array(array("mp3", "wma", "wav", "mp2", "aac", "aiff", "aif", "aifc", "au", "kar", "m3u", "m4a", "m4b", "m4p", "mid", "midi", "mpga", "ra", "ram", "snd", "ogg"), "audio", "audio", ""),
					array(array("zip"), "zip", "application", "ZIP"),
					array(array("tar"), "tar", "application", "TAR"),
					array(array("rar"), "rar", "application", "rar"),
					array(array("gz", "tgz"), "gzip", "application", "GZIP"),
					array(array("7z"), "7zip", "application", "7zip"),
					array(array("bz2"), "bzip2", "application", "bzip2"),
					array(array("doc", "docx", "rtf"), "msword", "application", "Word"),
					array(array("ppt", "pptx"), "mspowerpoint", "application", "Powerpoint"),
					array(array("xls", "xlsx"), "msexcel", "application", "Excel"),
					array(array("arj"), "ARJ", "application", "ARJ"),
					array(array("com", "exe", "app"), "exe", "application", "Executable"),
					array(array("pdf"), "pdf", "PDF"),
				);
				foreach ($ext_filetype as &$filetype) {
				    if (in_array($ext, $filetype[0])){
				    	$temp_ext = $filetype[1];
				    	if (stripos($temp_mime, $filetype[2])){
							$return = $temp_mime;
							if ($filetype[3] != ""){
								$return .= " (" . $filetype[3] . ")";
							}
						}else{
							$return = "maybe/" . $ext . "-" . $filetype[1];
						}
						break;
				    }
				}
				if (isset($return)){
					return $return;
				} else if ($temp_mime != "") {
					return $temp_mime;
				} else {
					return "unknown";
				}
			}
			/**
			 * Überprüft, ob das übergebene Verzeichnis das ROOT Verzeichnis ist
			 */
			function dir_name($dir) {
				if (stripos($dir, "./") !== false) {
					$dir = substr($dir, 2);
				}
				if ($dir == "" || $dir == "." || $dir == " ") {
					return "ROOT";
				} else {
					return sanitize_names($dir);
				}
			}
			/**
			 * Funktion um herauszufinden, ob eine bestimmte Datei die phpFinder Datei ist
			 */
			function is_it_me($folder, $file) {
				if ($folder == "./") { //Sind wir im "ROOT"-Folder?!
					if ($file == basename($_SERVER['PHP_SELF']) || $file == CONFIG_FILE) {
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			}
			/**
			 * "Übersetzt" den Rückgabewert einer Funktion ins Deutsche
			 * Modus raw = 0: "Ja" oder "Nein"
			 * Modus raw = 1: "1" oder "0"
			 * Modus raw = 2: "true" oder "false"
			 */
			function status($code, $raw = 0) {
				switch ($raw) {
					case 1 :
					if ($code) {
							return "check";
						} else {
							return "cross";
						}
						break;
					case 2 :
						if ($code) {
							return "true";
						} else {
							return "false";
						}
						break;
					default :
						if ($code) {
							return "Ja";
						} else {
							return "Nein";
						}
				}
			}
			/**
			 * Prüft ob die Datei/ein Dateinamen $file1 eine Endung hat
			 * Wenn nein, wird geguckt welchen Endung $file2 und diese wird auch bei $file1 angehängt
			 * Wenn es keine $file2 gibt ($file2 = "nix") wird .txt angehängt
			 */
			function has_ext($file1, $file2 = "nix") {
				if (stripos($file1, ".") === false) {
					// File1 hat keine Dateiendung
					if ($file2 == "nix") {
						$new_ext = "txt";
					} else {
						$kleinkram = explode(".", $file2);
						$new_ext = $kleinkram[count($kleinkram) - 1];
						if ($new_ext == $file2) {
							$new_ext = "txt";
						}
					}
					$returnvar[0] = $file1 . "." . $new_ext;
					$returnvar[1] = "<div class=\"message warning\">Da Sie keine Dateiendung angegeben haben, wurde automatisch ." . $new_ext . " angehängt.</div><br />\n";
				} else {
					//file1 hat einen Dateinamen und alles ist gut
					$returnvar[0] = $file1;
					$returnvar[1] = "";
				}
				return $returnvar;
			}
			/**
			 * Liefert bestimmte Teile eines Pfad Strings zurück
			 * $what = 1: Nur den Dateinamen bzw. den letzten Ordner
			 * $what = 2: Alles bis auf den Teil nach dem letzten /
			 */
			function clear_path($path, $what = 1) {
				$path = explode("/", $path);
				if ($what == 1) {
					$x = 1;
					$return = "";
					while ($return == "") {
						$return = $path[count($path) - $x];
						$x = $x + 1;
					}
				} elseif ($what == 2) {
					unset ($path[count($path) - 1]);
					$return = implode("/", $path);
				}
				return $return;
			}
			/**
			 * Gibt den letzten aufgetretenen Fehler zurück
			 */
			function return_last_error() {
				$errors = error_get_last();
				if ($errors["message"] != "") {	//Wenn die letzte Fehlermeldung nicht leer ist
					return "<br /><i style=\"font-size:90%;\">Fehlermeldung: <tt>" . $errors["message"] . " (Zeile: " . $errors['line'] . " in " . $errors['file'] . ")</tt></i>";
				} else {
					return "";
				}
			}
			/**
			 * Checkt ob eine E-Mail-Adresse korrekt ist
			 */
			function check_email_address($email) {
				if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
					return false;
				}
				return true;
			}
			// ====== Wichtige Funktionen Ende ======= //
			//Überschrift
			echo "<small title=\"Nach einer bestimmten Zeit wird aus Sicherheitsgründen ihre Sitzung automatisch beendet und Sie werden ausgeloggt.\" style=\"float:right;font-size:11px;\">Automatischer Logout erfolgt <span id=\"logouttext\">nach</span> <span id=\"logouttime\">30</span> Min. (" . date("H:i:s", time() + $cookie_end) . ")</small>";
			echo "<h1 title=\"Aktueller Ordner\" style=\"white-space:nowrap;\" >" . dir_name(CURRENT_FOLDER) . "</h1>";
			echo '
			<p id="navbar">
				<a href="'.$self_raw.'" ><i class="icon house" title="Startseite" ></i></a>
				<a href="'.$url.'" ><i class="icon arrow_refresh" title="Neu laden" ></i></a>
				<a href="'.$self.'&amp;action=create_folder" ><i class="icon folder_add" title="Ordner erstellen" ></i></a>
				<a href="'.$self.'&amp;action=create_file" ><i class="icon page_white_add_upload" title="Datei hochladen" ></i></a>
				<a href="'.$self.'&amp;action=create_file&amp;from_url" ><i class="icon page_white_link" title="Datei importieren" ></i></a>
				<a href="'.$self.'&amp;action=create_file&amp;new" ><i class="icon page_white_add" title="Datei erstellen" ></i></a>
				<a href="'.$self.'&amp;action=search" ><i class="icon magnifier" title="Suchen" ></i></a>';
				if (USE_CONFIG_FILE) {
					echo '<a href="'.$self.'&amp;action=settings" ><i class="icon cog" title="Einstellungen" ></i></a>';
				}
				echo '<a href="'.$self.'&amp;action=info" title="Server Informationen" ><i class="icon server" title="Server Informationen" ></i></a>
				<a href="'.$self.'&amp;action=about" title="Über" ><i class="icon information" title="Über phpFinder" ></i></a>
				<a href="'.$self.'&amp;action=help" title="Hilfe" ><i class="icon help" title="Hilfe" ></i></a>
				<a href="'.$self.'&amp;action=logout" title="&quot;'.$_SESSION['user'].'&quot; Ausloggen" ><i class="icon door_in" title="Ausloggen" ></i></a>
			</p>
			<script type="text/javascript">
				//<![CDATA[
				function doCount() {
					var countdown = document.getElementById("logouttime").innerHTML;
					if (countdown > 0) {
						countdown--;
						if (countdown < 3) {
							document.getElementById("logouttime").style.color = "#ff0000";
							document.getElementById("logouttime").style.fontWeight = "bolder";
						} else if (countdown < 10) {
							document.getElementById("logouttime").style.color = "#ff9000";
							document.getElementById("logouttime").style.fontWeight = "bold";
						}
						document.getElementById("logouttime").innerHTML = countdown;
						window.setTimeout("doCount()", 60000) //Jede Minute aktualisieren
					} else {
						location.reload()
						// Seite neu laden wenn der Countdown abgelaufen ist
					}
				}
				window.setTimeout("doCount()", 60000)//Timer initialisieren
				document.getElementById("logouttext").innerHTML = "in";
				function go() {
					document.getElementById("loadimg").className = "icon loadWheel";
				}
				//]]>
			</script>';
			?>
		</div>
	</div>

	<div id="mainArea">
		<div class="wrap">
		<?php
		if (USE_CONFIG_FILE) {
			if (!file_exists(CONFIG_FILE)) {
				echo "<div class=\"message error\">Sie haben die Verwendung der Konfigurationsdatei aktiviert, jedoch noch keine erstellt!<br />Gehen Sie in den Einstellungsdialog und speichern die Einstellung.</div><br />";
			} else {
				if ($config_file_version != $VERSION) {
					//Versionen kompatibel
					echo "<div class=\"message warning\">Die Version Ihrer Konfigurations-Datei ($config_file_version) stimmt nicht mit der Version von phpFinder überein!<br />Gehen Sie in den Einstellungsdialog und speichern die Einstellung, um das Problem zu beheben.</div><br />";
				}
			}
		}
		if ("/" . basename($ref) == $self_raw && preg_match("/MSIE ([0-9]+)/", $_SERVER["HTTP_USER_AGENT"], $ieTestResult)) {
			if ($ieTestResult < 8){
				echo "<div class=\"message information\">Sie verwenden eine veraltete Version des Internet Explorer, um phpFinder anzuzeigen. Dieser Browser unterstützt nicht die korrekte Darstellung W3C valider Dokumente, weshalb vieles anders aussieht als bei der Entwicklung beabsichtigt. Daher empfehle ich Ihnen die Verwendung eines anderen Browsers wie Chrome oder Firefox oder ein Aktualisieren des Internet Explorers, um phpFinder bestmöglich nutzen zu können.</div>";
			}
		}
		// ====== Bearbeiten von Aufgaben ======= //
		if (isset ($_GET['action'])) { //Falls die GET Variable "action" übermittelt wurde
			if ($_GET['action'] == "create_folder") {
				if (!is_writeable(CURRENT_FOLDER)) {
					echo "<div class=\"message error\">Sie können in diesem Ordner (" . dir_name(CURRENT_FOLDER) . ") keine neuen Ordner erstellen, da Sie nicht die nötigen Rechte haben.\nÄndern Sie die CHMOD-Rechte dieses Ordners um in ihm Ordner erstellen zu können!</div>";
				} else {
						echo "<h2>Ordner in \"" . dir_name(CURRENT_FOLDER) . "\" erstellen</h2>\n";
						echo '
							<form action="' . $self . '&amp;action=post" method="post">
								<h3>Ordner erstellen</h3>\n
								<p>Bitte geben Sie den Namen für den neuen Ordner ein!</p>
								<label for="name">Ordnername</label>
								<input type="text" id="name" name="name" title="Name für den neuen Ordner" value="Neuer Ordner" />
								<button type="submit" name="FolderCreate" title="Ordner erstellen">
									<i class="icon folder_go" ></i>
									Erstellen
								</button>
							</form>';
						}
			} elseif ($_GET['action'] == "create_file") {
				if (!is_writeable(CURRENT_FOLDER)) {
					echo "<div class=\"message error\">Sie können in diesem Ordner (" . dir_name(CURRENT_FOLDER) . ") keine neuen Dateien erstellen, da Sie nicht die nötigen Rechte haben.\nÄndern Sie die CHMOD-Rechte dieses Ordners um in ihn Dateien laden zu können!</div>";
				} else { //Wenn der aktuelle Ordner schreibbar ist
					if (isset ($_GET['new'])){ //Neue Datei erstellen
						echo '<h2>Datei in "'.dir_name(CURRENT_FOLDER).'" erstellen</h2>
						<form action="'.$self.'&amp;action=post" method="post">
							<h3>Datei erstellen</h3>
							<p>Geben Sie den Namen inklusive Dateiendung der neuen Datei ein!</p>
							<label for="file">Dateiname
								<span class="small">Name der neuen Datei</span>
							</label>
							<input name="file" id="file" type="text" title="Geben Sie hier den Namen für die neue Datei ein" value="file.php" />
							<label for="wizard">New-File-Wizard
								<span class="small">Inhalt automatisch erstellen</span>
							</label>
							<select name="wizard" id="wizard" title="Wählen Sie aus, was automatisch in die Datei geschrieben werden soll">
								<option value="0">nicht verwenden</option>
								<option value="1">Leere PHP Datei</option>
								<option value="2">PHP Weiterleitung</option>
								<option value="3">PHP-Info</option>
								<option value="4">HTML Grundgerüst</option>
								<option value="5">HTML Weiterleitung</option>
							</select>
							<label for="help_box" id="help_text">Ziel-URL
								<span class="small">Ziel der Weiterleitung</span>
							</label>
							<input name="help_box" id="help_box" type="text" value="http://www.google.de" />
							<label for="no_ext" title="Deaktivieren Sie dies, wenn Sie nicht möchten das automatisch eine Dateiendung angefügt wird, falls keine eingegeben wurde.">Auto. Endungs-Ergänzung</label>
							<input type="checkbox" checked="checked" id="no_ext" name="no_ext" title="Deaktivieren Sie dies, wenn Sie nicht möchten das automatisch eine Dateiendung angefügt wird, falls keine eingegeben wurde." />
							<button type="submit" name="FileCreate" title="Datei erstellen">
								<i class="icon page_white_go" ></i>
								Erstellen
							</button>
						</form>
						<script type="text/javascript">
							//<![CDATA[
							document.getElementById("help_text").style.display = "none";
							document.getElementById("help_box").style.display = "none";
							var selectmenu = document.getElementById("wizard");
							selectmenu.onchange = function() {
								var chosenoption = this.options[this.selectedIndex]
								if (chosenoption.value == "2" || chosenoption.value == "5") {
									document.getElementById("help_text").style.display = "inline";
									document.getElementById("help_box").style.display = "inline";
								} else {
									document.getElementById("help_text").style.display = "none";
									document.getElementById("help_box").style.display = "none";
								}
							}
							//]]>
						</script>';
					} elseif (isset ($_GET['from_url'])) {
						//Datei von URL importieren
						echo "<h2>Datei nach \"" . dir_name(CURRENT_FOLDER) . "\" importieren</h2>";
						if (@ ini_get("allow_url_fopen") == false && @ function_exists("curl_init") == false) {
							echo "<div class=\"message error\">Da das Aufrufen von Dateien auf anderen Servern über PHP nicht erlaubt ist und dieser Server nicht über cURL verfügt, ist es leider nicht möglich Dateien zu importieren!</div>";
						} else {
							echo "<div class=\"message information\">Es ist sowohl möglich Dateien über HTTP als auch FTP zu importieren:
							<ul>
								<li>http://example.com/file.php</li>
								<li>http://user:password@example.com/file.php</li>
								<li>ftp://example.com/pub/file.txt</li>
								<li>ftp://user:password@example.com/pub/file.txt</li>
							</ul>
							</div>
							<form action=\"$self&amp;action=post\" method=\"post\" name=\"import\">
								<h3>Datei importieren</h3>
								<p>Geben Sie pro Zeile die URL einer Datei ein, die Sie auf ihren Server laden möchten.</p>
								<label for=\"sourcefile\" >Datei URL:</label>
								<textarea class=\"styletext\" id=\"sourcefile\" name=\"sourcefile\" title=\"URL der zu importierenden Datei\" rows=\"3\" cols=\"\" >http://</textarea>";
								if (@ ini_get("allow_url_fopen") && @ function_exists("curl_init")) {
									//Wenn beide Methoden zur Verfügung stehen, Auswahl anbieten
									echo "<label for=\"method\" >Methode:</label>
									<select id=\"method\" name=\"method\" title=\"Methode zum Importieren der Datei\" >
										<option value=\"curl\">cURL</option>
										<option value=\"fopen\">fopen</option>
									</select>\n\n";
								}
								echo "<label for=\"auto_replace\" title=\"Aktivieren Sie dies, wenn Dateien die den gleichen Dateinamen haben wie Dateien die Sie hier hochladen, automatisch ersetzt werden sollen.\">
								Automatisch ersetzen</label>
								<input type=\"checkbox\" name=\"auto_replace\"checked=\"checked\" id=\"auto_replace\" title=\"Aktivieren Sie dies, wenn Dateien die den gleichen Dateinamen haben wie Dateien die Sie hier hochladen, automatisch ersetzt werden sollen.\" />
								<button type=\"submit\" name=\"import\" title=\"Klicken Sie hier, um die Datei jetzt zu importieren.\" onclick=\"javascript:go();\">
									<i class=\"icon page_white_go\" id=\"loadimg\" ></i>
									Importieren
								</button>
								<input type=\"hidden\" name=\"zieldir\" title=\"zieldir\" readonly=\"readonly\" value=\"" . CURRENT_FOLDER . "\" />
							</form>";
						}
						//Ende der Else Schleife, die aufgerufen wird wenn der aktuelle Ordner schreibbar ist
					} else {
						//Wenn weder eine neue Datei erstellt noch eine importiert werden soll, wird eine Datei hochgeladen
						if (isset ($_GET['files']) && $_GET['files'] > 1){
							echo "<h2>Dateien";
						} else { 
							echo "<h2>Datei";
						}
						echo " nach \"" . dir_name(CURRENT_FOLDER) . "\" hochladen</h2>";
						if (@ ini_get("file_uploads")) {
							//Wenn Datei Uploads erlaubt sind
							echo '
							<table cellpadding="5" border="0" width="100%" style="text-align:center;">
							<colgroup>
							<col width="50%" />
							<col width="50%" />
							</colgroup>
							<tr>
							<td><div class="message information"><b>Serverbeschränkungen:</b>
							<br />Maximale Dateigröße einer Datei: '.ini_get("upload_max_filesize").'B
							<br />Max. Größe aller Dateien pro Upload: '.ini_get("post_max_size").'B</div>
							</td>
							<td>Mehrere Dateien gleichzeitig hochladen:<br />
							<form action="'.$url.'" method="get" style="width:auto;">
							
							<!-- Die beiden folgenden Elemente sind dazu da, dass auch nach dem Abschicken dieses Formulars
							über GET die GET-Attribute action=create_file und dir= aktuelles Verzeichnis in der URL sind -->
							<input type="hidden" name="dir" value="'.CURRENT_FOLDER.'" />
							<input type="hidden" name="action" value="create_file" />
							
							<select name="files" >';
							//Eine Schleife die durchlaufen wird um genug Auswahlfelder zu erstellen
							//$MAX_UPLOAD legt die maximale Anzahl von Fehlder fest
							$currentFileCount = 1;
							if (isset($_GET['files'])) {
								$currentFileCount = intval($_GET['files']);
							}
							for ($x = 1; $x <= $MAX_UPLOAD; $x++) {
								if ($x == $currentFileCount) {
									echo "<option value=\"$x\" selected=\"selected\">$x</option>";
								} else {
									echo "<option value=\"$x\">$x</option>";
								}
							}
							echo '</select>
							<input type="submit" value="OK" />
							</form>
							</td>
							</tr>
							</table>';
							if (isset($_GET['files']) && $_GET['files'] > $MAX_UPLOAD) {
								//Meldung ausgeben falls mehr als maximal erlaubt Dateidialog angezeigt werden sollen
								echo '<div class="message warning">Es können maximal ' . $MAX_UPLOAD . ' Dateien auf einmal hochgeladen werden.</div>';
							}
							echo '<form enctype="multipart/form-data" action="' . $self . '&amp;action=post" method="post">';
							if (isset($_GET['files']) && $_GET['files'] > 1) {
								echo "<h3>Dateien hochladen</h3>\n<p>Wählen Sie die Dateien aus, die sich hochladen möchten!</p>";
							} else {
								echo "<h3>Datei hochladen</h3>\n<p>Wählen Sie die Datei aus, die sich hochladen möchten!</p>";
							}
							if (isset($_GET['files'])) {
								if ($_GET['files'] > 0 && $_GET['files'] < $MAX_UPLOAD + 1) {
									$anzahl = $_GET['files'];
								} else if ($_GET['files'] > $MAX_UPLOAD) {
									$anzahl = $MAX_UPLOAD;
								} else {
									$anzahl = 1;
								}
							} else {
								$anzahl = 1;
							}
							for ($x = 1; $x <= $anzahl; $x++) {
								echo "<label for=\"file_$x\">Datei $x:</label>";
								echo '<input name="thefile[]" id="file_' . $x . '" type="file" title="Datei, die hochgeladen werden soll" />';
							}
							echo '
							<label for="auto_replace">Automatisch ersetzen</label>
							<input type="checkbox" name="auto_replace" id="auto_replace" checked="checked" />
							<button type="submit" name="FileLoad" title="Datei-Upload starten" onclick="javascript:go();">
								<i class="icon page_white_go" id="loadimg" ></i>
								Upload
							</button>
							</form>';
						} else {
							echo '<div class="message error">Leider ist es nicht möglich, eine Datei über HTTP hochzuladen, da dies durch die PHP Einstellungen blockiert wird.</div>';
						}
					}
				}
			} elseif ($_GET['action'] == "edit_folder") {
				//Soll ein Ordner bearbeitet werden
				echo "<h2>Ordner &quot;" . sanitize_names($_GET['name']) . "&quot; bearbeiten</h2>";
				if (is_dir(CURRENT_FOLDER . $_GET['name']) && file_exists(CURRENT_FOLDER . $_GET['name'])) {
					$lesbar = is_readable(CURRENT_FOLDER . $_GET['name']);
					$schreibbar = is_writable(CURRENT_FOLDER . $_GET['name']);
					echo "<ul>\n";
						echo '<li><i class="icon folder_go"></i> <a target="_blank" href="' . substr(CURRENT_FOLDER, 2) . rawurlencode2($_GET['name']) . '" title="Ordner auf dem Webspace in einem neuen Fenster öffnen">Ordner extern öffnen</a></li>';
						echo '<li><i class="icon folder_delete"></i> <a href="' . $self . '&amp;action=delete_folder&amp;name=' . rawurlencode2($_GET['name']) . '" title="Den Ordner vom Webspace entfernen">Ordner löschen</a></li>';
						echo '<li><i class="icon folder_rename"></i> <a href="' . $self . '&amp;action=rename&amp;name=' . rawurlencode2($_GET['name']) . '" title="Den Ordner umbennen">Ordner umbenennen</a></li>';
						echo '<li><i class="icon folder_wrench"></i> <a href="' . $self . '&amp;action=chmod&amp;name=' . rawurlencode2($_GET['name']) . '" title="CHMOD-Rechte ändern">Ordner-Rechte ändern</a></li>';
						echo '<li><i class="icon folder_copy"></i> <a href="' . $self . '&amp;action=copyfolder&amp;name=' . rawurlencode2($_GET['name']) . '" title="Den Ordner mit allen Unterordnern kopieren">Ordner kopieren</a></li>';
						echo '<li><i class="icon folder_key"></i> <a href="' . $self . '&amp;action=protect&amp;name=' . rawurlencode2($_GET['name']) . '" title="Den Ordner mit htaccess schützen">Ordner schützen</a></li>';
						if ($lesbar) {
							echo '<li><i class="icon folder_explore"></i> <a href="' . $self_raw . '?dir=' . rawurlencode2(CURRENT_FOLDER . $_GET['name']) . '" title="Ordner in phpFinder öffnen">Ordner öffnen</a></li>';
							echo '<li><i class="icon folder_table"></i> <a href="' . $self . '&amp;action=folderlist&amp;name=' . rawurlencode2($_GET['name']) . '" title="Ordnerinhalt auflisten">Ordnerinhalt auflisten</a></li>';
						}
					echo "</ul>\n";
					
					echo '<table class="property_table">
					<colgroup>
					<col width="50%" />
					<col width="50%" />
					</colgroup>
					<tr class="bgcolor">
						<td><b>Ordnername</b></td>
						<td>'.sanitize_names($_GET['name']).'</td>
					</tr>
					<tr>
						<td><b title="Ob man in diesem Ordner Dateien und Ordner lesen kann" >Lesbar</b></td>
						<td>';
						if (!$lesbar) {
							echo "<i class=\"icon cross\"></i> Nein";
						} else {
							echo "<i class=\"icon check\"></i> Ja";
						}
						echo '</td>
					</tr>
					<tr class="bgcolor">
						<td><b title="Ob man in diesem Ordner Dateien und Ordner erstellen bzw. bearbeiten kann" >Schreibbar</b></td>
						<td>';
						if (!$schreibbar) {
							echo "<i class=\"icon cross\"></i> Nein";
						} else {
							echo "<i class=\"icon check\"></i> Ja";
						}
						echo '</td>
					</tr>';
					if ($lesbar) {
						$dirCount = dir_count(CURRENT_FOLDER . $_GET['name']);
		                echo '<tr>
		                	<td><b title=\"Anzahl der direkten Unterordner\">Unterordner</b></td>
		                	<td>'.$dirCount['folders'].'</td>
		                </tr>
		                <tr style="background-color:#e3f1fe;">
		                	<td><b title="Anzahl der Dateien in diesem Ordner">Dateien</b></td>
		                	<td>'.$dirCount['files'].'</td>
		                </tr>
						<tr>
							<td><b title="inkl. Unterordner + Dateien">Größe</b></td>
							<td>'.size_unit(dir_size(CURRENT_FOLDER . $_GET['name'])).'</td>
						</tr>';
					}
					echo '<tr class="bgcolor">
						<td><b>CHMOD-Rechte</b></td>
						<td>'.substr(sprintf('%o', fileperms(CURRENT_FOLDER . $_GET['name'])), -4).'</td>
					</tr>
					</table>';
				} else {
					echo '<div class="message error">Der Ordner ist nicht (mehr) vorhanden oder es handelt sich nicht um einen Ordner.</div>';
				}
			} elseif ($_GET['action'] == "delete_folder") {
				echo "<h2>Ordner &quot;" . sanitize_names($_GET['name']) . "&quot; löschen</h2>";
				if (isset ($_GET['sure']) && $_GET['sure'] == true) {
					// Die Sicherheitsabfrage $_GET['sure'] mit true bestätigt
					@ delete(CURRENT_FOLDER . $_GET['name']);
					if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
						echo '<div class="message error">Der Ordner "' . sanitize_names($_GET['name']) . '" konnte nicht gelöscht werden.</div>';
					} else {
						echo '<div class="message success">Der Ordner "' . sanitize_names($_GET['name']) . '" wurde erfolgreich gelöscht.</div>';
					}
				} else {
					// Sicherheitsnachfrage
					echo '<div class="message warning">Das Löschen von Dateien und Ordner ist unwiderruflich, da Sie nicht auf etwas wie einen "Papierkorb" zurückgreifen können!</div>
					<br />
					<table align="center"><colgroup><col width="50%"/><col width="50%"/></colgroup><tr align="center">
						<td colspan="2">Möchten Sie den Ordner "' . sanitize_names($_GET['name']) . '" wirklich löschen?</td>
					</tr>
					<tr class="buttons">
						<td>
						<a href="' . $self . '&amp;action=delete_folder&amp;name=' . rawurlencode2($_GET['name']) . '&amp;sure=true" class="positive">
						<i class="icon accept"></i> Ja </a>
						</td>
						<td>
						<a href="' . $ref . '" class="negative">
						<i class="icon cancel"></i> Nein</a>
						</td>
					</tr>
					</table>';
				}
			} elseif ($_GET['action'] == "rename") {
				if (file_exists(CURRENT_FOLDER . $_GET['name'])){
					if (is_dir(CURRENT_FOLDER . $_GET['name'])) {
						echo "<h2>Ordner &quot;" . sanitize_names($_GET['name']) . "&quot; umbenennen</h2>";
						echo '<form action="' . $self . '&amp;action=post" method="post">
						<h3>Ordner umbenennen</h3>
						<p>Geben Sie bitte den neuen Ordnernamen ein!</p>';
					} elseif (is_file(CURRENT_FOLDER . $_GET['name'])) {
						echo "<h2>Datei &quot;" . sanitize_names($_GET['name']) . "&quot; umbenennen</h2>";
						echo '<form action="' . $self . '&amp;action=post" method="post">
						<h3>Datei umbenennen</h3>
						<p>Geben Sie bitte den neuen Dateinamen inklusive Dateiendung ein!</p>';
					}
					echo '<input type="hidden" name="old_name" title="Name vor dem umbenennen" readonly="readonly" value="' . sanitize_names($_GET['name']) . '" />
					<label for="newname" >Neuer Name
					<span class="small">Neuer Name der Datei</span></label>
					<input type="text" name="name" id="newname" title="Neuer Name, in den ' . sanitize_names($_GET['name']) . ' umbenannt werden soll" value="' . sanitize_names($_GET['name']) . '"/>
					
					<button type="submit" name="rename" title="Jetzt umbenennen">
					<i class="icon textfield_rename_go"></i>
					Umbenennen
					</button>
					</form>';
				}else{
					echo '<div class="message error">Die Datei oder der Ordner ist nicht (mehr) vorhanden.</div>';
				}
			} elseif ($_GET['action'] == "rotate") {
				if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
					echo "<h2>Bild &quot;" . sanitize_names($_GET['name']) . "&quot; drehen</h2>";
					echo '<div class="message warning">Eventuell geht beim Drehen der Bilder ein Teil der Qualität verloren. Ebenso geht ein transparenter Hintergrund verloren. Drehen Sie das Bild mit einem Bildbearbeitungsprogramm um Qualitätsverluste zu vermeiden.</div>';
					echo '<form action="' . $self . '&amp;action=post" method="post">
					<h3>Bild drehen</h3>
					<p>Füllen Sie das Formular aus um das Bild zu drehen</p>';
					echo '<input type="hidden" name="name" title="Name des Bildes" readonly="readonly" value="' . sanitize_names($_GET['name']) . '" />
					<label for="grad" >Drehung
					<span class="small">Wohin soll gedreht werden</span></label>
					<select name="grad" id="grad"><option value="270">90° nach rechts</option>
					<option value="90">90° nach links</option>
					<option value="180">180°</option>
					</select>
					
					<button type="submit" name="rotate" title="Bild drehen">
					<i class="icon image_go"></i>
					Drehen
					</button>
					</form>';
				} else {
					echo '<div class="message error">Die Datei \"' . sanitize_names($_GET['name']) . '\" ist nicht (mehr) vorhanden.</div>';
				}
			} elseif ($_GET['action'] == "info") {
				$gd = gd_info();
				echo "<h2>Server Informationen</h2>";
				echo '<div class="message information">Eventuell werden nicht alle Werte angezeigt. Diese werden dann von ihrem Server nicht zur Verfügung gestellt (durch aktivierten Safe-Mode oder andere Sicherheitsoptionen).</div><br />';
				echo "\n\n";
				if (!function_exists("mime_content_type")) {
					echo '<div class="message warning">Auf ihrem Server ist die Funktion des Mime-Type erkennens nicht vorhanden / aktiviert. phpFinder erkennt Dateien nun ausschließlich am Dateinamen! Seien Sie also vorsichtig und überprüfen, ob es sich bei der jeweiligen Datei wirklich um den erkannten Dateitypen handelt.</div><br />';
					echo "\n\n";
				}
				echo '<p style="text-align:center;"><i class="icon server_chart"></i> <a href="' . $self . '&amp;action=servertest" title="Testen Sie wie gut ihr Server für phpFinder geeignet ist">Server-Test durchführen</a></p>';
				echo "<table width=\"75%\" align=\"center\" class=\"property_table\" >
				<tr class=\"bgcolor\">
				<td>Server IP</td>
				<td>" . sanitize_names($_SERVER['SERVER_ADDR']) . "</td>
				</tr>
				<tr>
				<td>Server Hostname</td>
				<td>". sanitize_names($_SERVER['SERVER_NAME']) . "</td>
				</tr>
				<tr class=\"bgcolor\">
					<td>Server Software</td>
					<td>";
					if ($_SERVER['SERVER_SOFTWARE'] != "") {
						echo sanitize_names($_SERVER['SERVER_SOFTWARE']);
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr>
					<td>Server Protokoll</td>
					<td>";
					if ($_SERVER['SERVER_PROTOCOL'] != "") {
						echo $_SERVER['SERVER_PROTOCOL'];
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr class=\"bgcolor\">
					<td>Server OS</td>
					<td>";
					if (@ php_uname() != "") {
						echo @ php_uname();
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr>
					<td>CGI Spezifikation</td>
					<td>";
					if ($_SERVER['GATEWAY_INTERFACE'] != "") {
						echo $_SERVER['GATEWAY_INTERFACE'];
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr class=\"bgcolor\">
					<td>PHP Version</td>
					<td>";
					if (@ phpversion() != "") {
						echo @ phpversion();
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr>
					<td>GD library Version</td>
					<td>";
					if ($gd["GD Version"] != "") {
						echo $gd["GD Version"];
						$supported_formats = array();
						if ($gd["GIF Read Support"] == true && $gd["GIF Create Support"] == true){
							$supported_formats[] = "GIF";
						}
						if ((isset($gd["JPEG Support"]) && $gd["JPEG Support"] == true) || (isset($gd["JPG Support"]) && $gd["JPG Support"] == true)){
							$supported_formats[] = "JPG/JPEG";
						}
						if ($gd["PNG Support"] == true){
							$supported_formats[] = "PNG";
						}
						if (count($supported_formats) > 0){
							echo " (Bild-Formate: ".implode(", ", $supported_formats).")";
						}
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr class=\"bgcolor\">
					<td>Zend Engine Version</td>
					<td>";
					if (@ zend_version() != "") {
						echo @ zend_version();
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr>
					<td>Speicherauslastung durch PHP</td>
					<td>";
					if (@ memory_get_usage(TRUE) != "" || size_unit(@ memory_get_usage(TRUE)) != "0") {
						echo size_unit(@ memory_get_usage(TRUE));
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr class=\"bgcolor\">
					<td>Ihre User ID</td>
					<td>";
					if (@ getmyuid() != "" || @ getmyuid() != "0") {
						echo @ getmyuid();
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr>
					<td>Prozess ID dieses Scripts</td>
					<td>";
					if (@ getmypid() != "") {
						echo @ getmypid();
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr class=\"bgcolor\">
					<td>Memory Limit</td>
					<td>";
					if (@ ini_get("memory_limit") != "") {
						echo @ ini_get("memory_limit") . "B";
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr>
					<td>Max. PHP-Ausführungszeit</td>
					<td>";
					if (@ ini_get("max_execution_time") != "") {
						echo @ ini_get("max_execution_time");
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
					echo " Sekunden</td>
				</tr>
				<tr class=\"bgcolor\">
					<td>Dateiupload über HTTP</td>
					<td>";
					if (@ ini_get("file_uploads") != "") {
						echo "<i class=\"icon " . status(@ ini_get("file_uploads"), 1) . "\" title=\"" . status(@ ini_get("file_uploads")) . "\" ></i>";
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr>
					<td title=\"allow_url_fopen\">Zugriff auf Dateien auf anderen Servern</td>
					<td>";
					if (@ ini_get("allow_url_fopen") != "") {
						echo "<i class=\"icon " . status(@ ini_get("allow_url_fopen"), 1) . "\" title=\"" . status(@ ini_get("allow_url_fopen")) . "\" ></i>";
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr class=\"bgcolor\">
					<td>cURL Unterstützung</td>
					<td>";
					if (@ function_exists("curl_init") ||  !@ function_exists("curl_init")) {
						echo "<i class=\"icon " . status(@ function_exists("curl_init"), 1) . "\" title=\"" . status(@ function_exists("curl_init")) . "\" ></i>";
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>
				<tr>
					<td>Deaktivierte Funktionen</td>
					<td>";
					if (@ ini_get('disable_functions') != "") {
						$dis_funcs = @ ini_get('disable_functions');
						$dis_funcs = str_replace(",", ", ", $dis_funcs);
						$dis_funcs = str_replace(",", ", ", $dis_funcs);
						echo $dis_funcs;
					} else {
						echo "<i>kein Funktionen deaktiviert</i>";
					}
				echo "</td>
				</tr>
				<tr class=\"bgcolor\">
					<td>PHP Safe-Mode</td>
					<td>";
					if (@ ini_get("safe_mode") != "") {
						echo "<i class=\"icon " . status(@ ini_get("safe_mode"), 1) . "\" title=\"" . status(@ ini_get("safe_mode")) . "\" ></i>";
					} else {
						echo "<i>kein Wert hinterlegt</i>";
					}
				echo "</td>
				</tr>";
				//Herausfinden des Speicherplatzes
				$free_space_raw = @ disk_free_space(".");
				$total_space_raw = @ disk_total_space(".");
				//Nun erstmal überprüfen, ob überhaupt was in den Variablen steht
				if ($free_space_raw > 0 && $total_space_raw > 0) {
					$used_space_raw = $total_space_raw - $free_space_raw;
					//Nun die richtige Einheit finden
					$free_space = size_unit($free_space_raw);
					$total_space = size_unit($total_space_raw);
					$used_space = size_unit($used_space_raw);
					$prozent_frei = $free_space_raw / ($total_space_raw / 100);
					echo "<tr>
						<td>Freier Speicherplatz</td>
						<td>$free_space</td>
					</tr>
					<tr class=\"bgcolor\">
						<td>Genutzter Speicherplatz</td>
						<td>$used_space</td>
					</tr>
					<tr>
						<td>Gesamter Speicherplatz</td>
						<td>$total_space</td>
					</tr>
					<tr>
						<td colspan=\"2\" style=\"text-align:center;\" >
							<img src=\"http://chart.apis.google.com/chart?cht=p3&amp;chd=t:" . $prozent_frei . "," . (100 - $prozent_frei) . "&amp;chs=550x200&amp;chl=Freier%20Speicherplatz|Belegter%20Speicherplatz&amp;chco=65A4F7\" alt=\"\" />
						</td>
					</tr>";
				}
				echo "</table>";
			} elseif ($_GET['action'] == "servertest") {
				echo "<h2>Server-Test</h2>";
				$punkte = 0;
				echo '<table width="75%" align="center" class="property_table">
				<colgroup>
					<col width="5%" />
					<col width="70%" />
					<col width="15%" />
					<col width="10%" />
				</colgroup>
				<tr class="bgcolor2">
					<td>Nr.</td>
					<td>Test</td>
					<td>Ergebnis</td>
					<td>Punktzahl</td>
				</tr>
				<tr>
					<td>1.</td>
					<td>PHP Version</td>';
					if (substr(@ phpversion(), 0, 3) > 5.2) {
						echo "<td><i class=\"icon check\" title=\"Ja\"></i> " . @ phpversion() . "</td><td>+10</td>";
						$punkte = $punkte + 10;
					} else {
						echo "<td><i class=\"icon cross\" title=\"Nein\"></i> " . @ phpversion() . "</td><td>-10</td>";
						$punkte = $punkte - 10;
					}
				echo '</tr>
				<tr class="bgcolor">
					<td>2.</td>
					<td>Schreib- und Lesezugriff auf das ROOT Verzeichnis</td>';
					if (is_writeable(".") && is_readable(".")) {
						echo "<td><i class=\"icon check\" title=\"Ja\"></i></td><td>+10</td>";
						$punkte = $punkte + 10;
					} else {
						echo "<td><i class=\"icon cross\" title=\"Nein\"></i></td><td>-10</td>";
						$punkte = $punkte - 10;
					}
				echo '</tr>
				<tr>
					<td>3.</td>
					<td>Datei Upload</td>';
					if (@ ini_get("file_uploads")) {
						echo "<td><i class=\"icon check\" title=\"Ja\"></i></td><td>+5</td>";
						$punkte = $punkte + 5;
					} else {
						echo "<td><i class=\"icon cross\" title=\"Nein\"></i></td><td>-5</td>";
						$punkte = $punkte - 5;
					}
				echo '</tr>
				<tr class="bgcolor">
					<td>4.</td>
					<td>Zugriff auf externe Server</td>';
					if (@ function_exists("curl_init") || @ ini_get("allow_url_fopen")) {
						echo "<td><i class=\"icon check\" title=\"Ja\"></i></td><td>+5</td>";
						$punkte = $punkte + 5;
					} else {
						echo "<td><i class=\"icon cross\" title=\"Nein\"></i></td><td>-5</td>";
						$punkte = $punkte - 5;
					}
				echo '</tr>
				<tr>
					<td>5.</td>
					<td>Mime-Type Erkennung (PHP)</td>';
					if (@ function_exists("mime_content_type")) {
						echo "<td><i class=\"icon check\" title=\"Ja\"></i></td><td>+5</td>";
						$punkte = $punkte + 5;
					} else {
						echo "<td><i class=\"icon cross\" title=\"Nein\"></i></td><td>-5</td>";
						$punkte = $punkte - 5;
					}
				echo '</tr>
				<tr class="bgcolor">
					<td>6.</td>
					<td>Bildmanipulations-Funktion (GD Lib)</td>';
					if (@extension_loaded('gd') && @function_exists('gd_info')) {
						echo "<td><i class=\"icon check\" title=\"Ja\"></i></td><td>+4</td>";
						$punkte = $punkte + 4;
					} else {
						echo "<td><i class=\"icon cross\" title=\"Nein\"></i></td><td>-4</td>";
						$punkte = $punkte - 4;
					}
				echo '</tr>
				<tr>
					<td>7.</td>
					<td>FTP Funktion (PHP)</td>';
					if (@ function_exists("ftp_connect")) {
						echo "<td><i class=\"icon check\" title=\"Ja\"></i></td><td>+2</td>";
						$punkte = $punkte + 2;
					} else {
						echo "<td><i class=\"icon cross\" title=\"Nein\"></i></td><td>-2</td>";
						$punkte = $punkte - 2;
					}
				echo '</tr>
				<tr class="bgcolor">
					<td>8.</td>
					<td>E-Mail Funktion (PHP)</td>';
					if (@ function_exists("mail")) {
						echo "<td><i class=\"icon check\" title=\"Ja\"></i></td><td>+2</td>";
						$punkte = $punkte + 2;
					} else {
						echo "<td><i class=\"icon cross\" title=\"Nein\"></i></td><td>-2</td>";
						$punkte = $punkte - 2;
					}
				echo '</tr>
				<tr>
					<td>9.</td>
					<td>Kompressions-Funktion (PHP)</td>';
					if (@ class_exists('ZipArchive') || @ function_exists("gzopen") || @ function_exists("bzopen")) {
						echo "<td><i class=\"icon check\" title=\"Ja\"></i></td><td>+2</td>";
						$punkte = $punkte + 2;
					} else {
						echo "<td><i class=\"icon cross\" title=\"Nein\"></i></td><td>-2</td>";
						$punkte = $punkte - 2;
					}
				echo '</tr>
				<tr class="bgcolor2">
					<td></td>
					<td>Gesamt</td>
					<td>';
					if ($punkte > 39) {
						echo "<i class=\"icon check\" title=\"Ja\"></i>";
					} elseif ($punkte > 20) {
						echo "<i class=\"icon error\" title=\"Nein\"></i>";
					} else {
						echo "<i class=\"icon cross\" title=\"Nein\"></i>";
					}
				echo '</td>
					<td>'.$punkte.'</td>
				</tr>
				</table>';
				if ($punkte > 39) {
					echo "<p>Sehr gut. Sie können phpFinder komplett ohne oder nur mit leichter Einschränkung verwenden.</p>";
				} elseif ($punkte > 20) {
					echo "<p>Die Grundfunktionen von phpFinder sollten funktionieren, jedoch können Sie nicht den kompletten Funktionsumfang nutzen. Wenden Sie sich an ihren Hoster um dies zu ändern.</p>";
				} else {
					echo "<p>phpFinder funktioniert gar nicht oder nur mit großen Einschränkungen. Versuchen Sie einige der nicht bestandenen Tests zu beheben, um einen größeren Funktionsumfang von phpFinder nutzen zu können.</p>";
				}
			} elseif ($_GET['action'] == "help") {
				echo "<h2>phpFinder Wiki</h2>";
				if (isset ($_GET['page'])) { //Former kbid
					echo  "<div class=\"message information\"><p>Den gewünschten Artikel finden Sie direkt unter der folgenden URL: <a href=\"https://github.com/Nolanus/phpFinder/wiki/" . $_GET['page']. "\" target=\"_blank\">github.com/Nolanus/phpFinder/wiki/" . htmlspecialchars($_GET['page'])."</a></p></div>";
				}
				echo "<p>Informationen und Hilfen zur Verwendung von phpFinder finden Sie im Wiki des GitHub Repositories unter</p><p class=\"textcenter\"><a href=\"https://github.com/Nolanus/phpFinder/wiki\" target=\"_blank\" title=\"Wiki öffnen\"><i class=\"icon github\"></i> github.com/Nolanus/phpFinder/wiki</a></p>
				<p>Um einen Fehler zu melden oder einen Verbesserungsvorschlag zu machen, nutzten Sie bitte das <a href=\"https://github.com/Nolanus/phpFinder/issues/new\" target=\"_blank\" title=\"Bug/Fehler melden\" >Github Ticketsystem</a> (Anmeldung bei GitHub erforderlich) oder <a href=\"http://www.sebastian-fuss.de/contact\" target=\"_blank\">schreiben mir direkt</a>.</p>";
			} elseif ($_GET['action'] == "chmod") {
				echo "<h2>&quot;" . sanitize_names($_GET['name']) . "&quot; CHMOD Rechte ändern</h2>
				<div class=\"message warning\">Achtung: Lesen Sie bitte diesen <a href=\"" . $self . "&amp;action=help&amp;page=".rawurlencode("FAQ#hinweis-zur-chmod-funktion")."\" >Hinweis zur Nutzung der CHMOD-Funktion</a>!</div>";
				echo '
				<form action="' . $self . '&amp;action=post" method="post">
					<h3>CHMOD Rechte ändern</h3>
					<p>Bitte geben Sie die neuen CHMOD Rechte in oktalen Werten an!</p>
					<label for="rechte">Rechte
						<span class="small">Zugriffsrechte der/zur Datei</span>
					</label>
					<input type="text" name="rechte" maxlength="4" id="rechte" title="Oktaler CHMOD Wert" value="' . substr(sprintf('%o', fileperms(CURRENT_FOLDER . $_GET['name'])), - 4) . '" />
					<input type="hidden" name="file" title="Dateiname" value="' . sanitize_names($_GET['name']) . '" />
					<button type="submit" name="chmod" title="Rechte ändern">
						<i class="icon page_white_wrench"></i>
						Ändern
					</button>
				</form>';
			} elseif ($_GET['action'] == "file_edit") {
				echo "<h2>Datei &quot;" . sanitize_names($_GET['name']) . "&quot; bearbeiten</h2>\n";
				//Erstmal prüfen ob die Datei überhaupt noch vorhanden ist
				if (!isset($_GET['name'])) {
					echo "<div class=\"message error\">Es wurde kein Dateiname übergeben.</div>";
				} elseif (is_it_me(CURRENT_FOLDER, $_GET['name'])) {
					echo "<div class=\"message error\">Diese Datei kann nicht bearbeitet werden, da Sie zu phpFinder gehört!</div>";
				} elseif (is_file(CURRENT_FOLDER . $_GET['name'])) {
					$file_info = pathinfo(CURRENT_FOLDER . $_GET['name']);
					$ext = isset($file_info['extension']) ? $file_info['extension'] : "";
					$file_mime = @ dateityp($ext, CURRENT_FOLDER . $_GET['name']);
					$file_size_raw = @ filesize(CURRENT_FOLDER . $_GET['name']);
					$file_size = @ size_unit($file_size_raw);
					$lesbar = is_readable(CURRENT_FOLDER . $_GET['name']);
					$schreibbar = is_writable(CURRENT_FOLDER . $_GET['name']);
					if (stripos($file_mime, "image") !== false) {
						$currentFileClass = "image";
						$currentFileTitle = "Bild";
					} else {
						$currentFileClass = "page_white";
						$currentFileTitle = "Datei";
					}
					echo "<table width=\"100%\"><tr><td style=\"vertical-align:top;\">";
					echo "<ul>";
					echo '<li><i class="icon '.$currentFileClass.'_go"></i> <a title="'.$currentFileTitle.' öffnen" target="_blank" href="' . htmlspecialchars(substr(CURRENT_FOLDER, 2) . rawurlencode2($_GET['name'])) . '">'.$currentFileTitle.' öffnen</a></li>';
					echo '<li><i class="icon '.$currentFileClass.'_delete"></i> <a title="'.$currentFileTitle.' löschen" href="' . $self . '&amp;action=delete_file&amp;name=' . rawurlencode2($_GET['name']) . '">'.$currentFileTitle.' löschen</a></li>';
					if ($currentFileClass == "image"){
						echo '<li><i class="icon image_edit"></i> <a title="Bild bearbeiten" href="' . $self . '&amp;action=edit_image&amp;name=' . rawurlencode2($_GET['name']) . '">Bild bearbeiten</a></li>';
					}else{
						if ((stripos($file_mime, "text") !== false || in_array($ext, $ALLOWED_EXT)) && $lesbar) {
							if ($schreibbar) {
								echo '<li><i class="icon page_white_edit"></i> <a title="Datei bearbeiten" href="' . $self . '&amp;action=edit&amp;name=' . rawurlencode2($_GET['name']) . '">'.$currentFileTitle.' bearbeiten</a></li>';
							} else {
								echo '<li><i class="icon page_white_edit"></i> <a title="Dateiinhalt ansehen" href="' . $self . '&amp;action=edit&amp;name=' . rawurlencode2($_GET['name']) . '">'.$currentFileTitle.' ansehen</a></li>';
							}
						}
					}
					echo '<li><i class="icon '.$currentFileClass.'_wrench"></i> <a href="' . $self . '&amp;action=chmod&amp;name=' . rawurlencode2($_GET['name']) . '" title="CHMOD-Rechte ändern">CHMOD-Rechte ändern</a></li>';
					if ($lesbar) {
						//Aktionen die bei nicht lesbaren Dateien nicht gehen ausblenden
						echo '<li><i class="icon '.$currentFileClass.'_rename"></i> <a title="'.$currentFileTitle.' umbennen" href="' . $self . '&amp;action=rename&amp;name=' . rawurlencode2($_GET['name']) . '">'.$currentFileTitle.' umbenennen</a></li>
						<li><i class="icon '.$currentFileClass.'_copy"></i> <a title="'.$currentFileTitle.' kopieren" href="' . $self . '&amp;action=copy&amp;name=' . rawurlencode2($_GET['name']) . '">'.$currentFileTitle.' kopieren</a></li>
						<li><i class="icon folder_'.$currentFileClass.'"></i> <a title="'.$currentFileTitle.' verschieben" href="' . $self . '&amp;action=move&amp;name=' . rawurlencode2($_GET['name']) . '">'.$currentFileTitle.' verschieben</a></li>';
						if ((stripos($file_mime, "zip")) === false && stripos($file_mime, "tar") === false && stripos($file_mime, "rar") === false && stripos($file_mime, "compr") === false && stripos($file_mime, "ARJ") === false) {
							echo '<li><i class="icon '.$currentFileClass.'_compressed"></i> <a title="'.$currentFileTitle.' komprimieren" href="' . $self . '&amp;action=zip&amp;name=' . rawurlencode2($_GET['name']) . '">'.$currentFileTitle.' komprimieren</a></li>';
						} else {
							echo '<li><i class="icon '.$currentFileClass.'_compressed"></i> <a title="'.$currentFileTitle.' entpacken" href="' . $self . '&amp;action=unzip&amp;name=' . rawurlencode2($_GET['name']) . '">'.$currentFileTitle.' entpacken</a></li>';
						}
					}
					echo "</ul>
						</td>";
					echo "<td style=\"vertical-align:top;\">";
					echo "<ul>";
					echo '<li><i class="icon server_go"></i> <a title="'.$currentFileTitle.' an einen FTP Server senden" href="' . $self . '&amp;action=ftppush&amp;name=' . rawurlencode2($_GET['name']) . '">An FTP Server senden</a></li>';
					echo '<li><i class="icon email_go"></i> <a title="'.$currentFileTitle.' per E-Mail versenden" href="' . $self . '&amp;action=mail&amp;name=' . rawurlencode2($_GET['name']) . '">Per E-Mail versenden</a></li>';
					echo '<li><i class="icon link_go"></i> <a title="KurzURL für die '.$currentFileTitle.'adresse erstellen" href="' . $self . '&amp;action=shorturl&amp;name=' . rawurlencode2($_GET['name']) . '">KurzURL erstellen</a></li>';
					echo "</ul>";
					echo "</td></tr></table>";
					if ($lesbar && $currentFileClass == "image") {					
						echo "<a href=\"" . htmlspecialchars(CURRENT_FOLDER . $_GET['name']) . "\" target=\"_blank\"><img src=\"" . htmlspecialchars(substr(CURRENT_FOLDER, 2) . $_GET['name']) . "?".time()."\" title=\"" . sanitize_names($_GET['name']) . "\" style=\"float:right;\" class=\"restrainImageSize\" alt=\"Das Bild " . sanitize_names($_GET['name']) . "\" /></a>";
					}
					echo '<table class="property_table">
					<colgroup>
						<col width="50%" />
						<col width="50%" />
					</colgroup>
					<tr class="bgcolor">
						<td><b title="Der komplette Name der Datei">Dateiname</b></td>
						<td>'.sanitize_names($_GET['name']).'</td>
					</tr>
					<tr>
						<td><b title="Pfad zur Datei (relativ von phpFinder aus)">Pfad</b></td>
						<td>'.sanitize_names(substr(CURRENT_FOLDER, 2) . $_GET['name']).'</td>
					</tr>
					<tr class="bgcolor">
						<td><b title="Wann wurde die Datei der letzte mal geändert" >Letzte Änderung</b></td>
						<td>'.date("d.m.Y - H:i", filemtime(substr(CURRENT_FOLDER, 2) . $_GET['name'])).'</td>
					</tr>
					<tr>
						<td><b title="Dateigröße der Datei" >Dateigröße</b></td>
						<td>'.$file_size.'</td>
					</tr>
					<tr class="bgcolor">
						<td><b title="Ob der Inhalt der Datei von phpFinder gelesen werden kann" >Lesbar</b></td>
						<td>';
						if (!$lesbar) {
							echo "<i class=\"icon cross\"></i> Nein";
						} else {
							echo "<i class=\"icon check\"></i> Ja";
						}
						echo '</td>
					</tr>
					<tr>
						<td><b title="Ob diese Datei von phpFinder geschrieben werden kann" >Schreibbar</b></td>
						<td>';
						if (!$schreibbar) {
							echo "<i class=\"icon cross\"></i> Nein";
						} else {
							echo "<i class=\"icon check\"></i> Ja";
						}
						echo '</td>
					</tr>
					<tr class="bgcolor">
						<td><b title="Berechtigungen der Datei">CHMOD-Rechte</b></td>
						<td>'.substr(sprintf('%o', fileperms(CURRENT_FOLDER . $_GET['name'])), -4).'</td>
					</tr>';
					if ($lesbar) {
						echo '<tr>
							<td><b title="Dateityp">MIME-Type</b></td>
							<td>'.sanitize_names($file_mime).'</td>
						</tr>';
						if ($currentFileClass == "image") {
							//Zusatz in der Datei-Info-Tabelle für Bilder wird eingefügt, falls es ein Bild ist
							$bildmase = getimagesize(CURRENT_FOLDER . $_GET['name']);
							echo '<tr class="bgcolor"><td><b title="Höhe und Breite des Bildes">Bild Maße</b></td><td>';
							if ($bildmase[0] != "" && $bildmase[0] != "") {
								echo '' . $bildmase[0] . ' x ' . $bildmase[1] . ' Pixel';
							} else {
								echo '<i>Konnte nicht ausgelesen werden</i>';
							}
							echo '</td>
							</tr>
							<tr>';
						} else {
							echo ' <tr class="bgcolor">';
						}
						echo '
							<td><b title="MD5 Checksumme">MD5-Summe</b></td>
							<td style="font-family:monospace;padding: 0 5px;" >';
							if ($file_size_raw >= 5242880 && !isset($_GET['calcMD5'])) {
								echo "<a href=\"" . $self . "&amp;action=file_edit&amp;name=" . rawurlencode2($_GET['name']) . "&calcMD5\">Checksumme berechnen</a>";
							} else {
								echo @ md5_file(CURRENT_FOLDER . $_GET['name']);
							}
						echo '</td>
						</tr>';
					}
					echo "</table>";
				} else {
					echo "<div class=\"message error\">Die gesuchte Datei \"" . sanitize_names($_GET['name']) . "\" ist nicht (mehr) vorhanden.</div>";
				}
			} elseif ($_GET['action'] == "delete_file") {
				echo "<h2>Datei &quot;" . sanitize_names($_GET['name']) . "&quot; löschen</h2>";
				if (isset ($_GET['sure']) && $_GET['sure'] == true) {
					// Sicherheitsfrage sure bestätigt
					if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
						$size = size_unit(filesize(CURRENT_FOLDER . $_GET['name']));
						@ unlink(CURRENT_FOLDER . $_GET['name']);
						if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
							echo '<div class="message error">Die Datei "' . sanitize_names($_GET['name']) . '" konnte nicht gelöscht werden.</div>';
						} else {
							echo '<div class="message success">Die Datei "' . sanitize_names($_GET['name']) . '" (' . $size . ') wurde erfolgreich gelöscht.</div>';
						}
					} else {
						echo '<div class="message success">Die Datei "' . sanitize_names($_GET['name']) . '" ist nicht mehr vorhanden, vielleicht wurde Sie bereits gelöscht.</div>';
					}
				} else {
					// Sicherheitsabfrage stellen
					echo '<div class="message warning">Das Löschen von Dateien und Ordner ist unwiderruflich, da Sie nicht auf etwas wie einen "Papierkorb" zugreifen können!</div>
					<br />
					<table align="center">
					<colgroup>
						<col width="50%"/>
						<col width="50%"/>
					</colgroup>
					<tr>
						<td colspan="2" style="text-align:center;">';
						//Wenn es sich um ein Bild handelt wird es nochmal angezeigt
						$file_info = pathinfo(CURRENT_FOLDER . $_GET['name']);
						$ext = $file_info['extension'];
						$file_mime = @ dateityp($ext, CURRENT_FOLDER . $_GET['name']);
						if (stripos($file_mime, "image") !== false) {
							echo "<img src=\"" . substr(CURRENT_FOLDER, 2).rawurlencode2( $_GET['name']) . "\" title=\"Die Datei " . sanitize_names($_GET['name']) . "\" alt=\"Das Bild " . sanitize_names($_GET['name']) . "\" class=\"restrainImageSize\" /><br /><br />";
						}
						echo 'Möchten Sie die Datei "' . sanitize_names($_GET['name']) . '" wirklich löschen?</td>
					</tr>
					<tr class="buttons">
						<td>
						<a href="' . $self . '&amp;action=delete_file&amp;name=' . rawurlencode2($_GET['name']) . '&amp;sure=true" class="positive">
						<i class="icon accept" title="Datei löschen" ></i> Ja </a>
						</td>
						<td>
						<a href="' . $ref . '" class="negative">
						<i class="icon cancel" title="Datei nicht löschen" ></i> Nein</a>
						</td>
					</tr>
					</table>';
				}
			} elseif ($_GET['action'] == "copy") {
				echo "<h2>Datei &quot;" . sanitize_names($_GET['name']) . "&quot; kopieren</h2>
				<div class=\"message information\">
					<p>Um eine Datei eine Ebene nach oben (Aufwährts) zu kopieren, geben Sie &quot;..&quot; ein. Für einen Unterordner einfach den Namen des Ordners davor schreiben.</p>
					<p>Bsp. 1: Eine Datei soll in den Unterordner &quot;bilder&quot; kopiert werden: <i>bilder/neuedatei.txt</i></p>
					<p>Bsp. 2: Ein Datei im Ordner &quot;bilder&quot; soll in den gleichen Ordner wie der Ordner Bilder. (Gleiche Ebene): <i>../neuedatei.txt</i></p>
					<p>Bsp. 3: Um eine Datei in den selben Ordner zu kopieren, einfach den neuen Dateinamen eintippen.</p>
				</div>";
				echo '<form action="' . $self . '&amp;action=post" method="post">
					<h3>Datei kopieren</h3>
					<p>Bitte geben Sie den neuen Dateinamen inklusive Dateiendug ein!</p>
					<label for="new" >Neuer Name
						<span class="small">Name für die Kopie</span>
					</label>
					<input type="text" id="new" name="new" title="Dateiname der Kopie" value="Kopie_von_' . sanitize_names($_GET['name']) . '" />
					<input type="hidden" name="old" title="Alter Dateiname" readonly="readonly" value="' . sanitize_names($_GET['name']) . '" />
					<button type="submit" name="Copy" title="Datei kopieren" >
						<i class="icon page_white_copy" ></i>
						Kopieren
					</button>
				</form>';
			} elseif ($_GET['action'] == "move") {
				echo "<h2>Datei &quot;" . sanitize_names($_GET['name']) . "&quot; verschieben</h2>
				<div class=\"message information\"><p>Um eine Datei eine Ebene nach oben (Aufwährts) zu verschieben, wählen Sie &quot;..&quot; aus. Für einen Unterordner einfach den Namen des Ordners.</p>
					<p>Bsp. 1: In den Unterordner &quot;bilder&quot;: <i>bilder</i></p>
					<p>Bsp. 2: Eine Ebene aufwärts/zurück: <i>..</i></p>
				</div>";
				echo '<form action="' . $self . '&amp;action=post" method="post">
					<h3>Datei verschieben</h3>
					<p>Bitte wählen Sie den Zielordner aus!</p>
					<label for="folder">Zielordner
						<span class="small">Verschieben nach</span>
					</label>
					<select id="folder" name="folder">';
						$ordner_auswahl = "";
						$verzeichnis = openDir(CURRENT_FOLDER);
						//Durchläuft die Unterverzeichnisse und listet Sie auf zum einfacherern verschieben
						while ($file = readDir($verzeichnis)) {
							if ($file != "." && $file != ".." && is_dir(CURRENT_FOLDER . $file)) {
								$ordner_auswahl .= "<option value=\"".sanitize_names($file)."\">".sanitize_names($file)."</option>\n";
							} elseif ($file == ".." && dir_name(CURRENT_FOLDER) != "ROOT") {
								echo "<option value=\"$file\">Aufwärts (..)</option>\n";
							}
						}
						echo $ordner_auswahl;
						closeDir($verzeichnis);
					echo '</select>
					<label for="file">Dateiname
						<span class="small">Name der Datei (nicht veränderbar)</span>
					</label>
					<input type="text" id="file" name="file" readonly="readonly" title="Dateiname" value="' . sanitize_names($_GET['name']) . '" />
					<label for="auto_replace">Automatisch ersetzen</label>
					<input type="checkbox" name="auto_replace" id="auto_replace" />
					<button type="submit" name="Move" title="Datei verschieben" >
						<i class="icon folder_page_white" ></i>
						Verschieben
					</button>
				</form>';
			} elseif ($_GET['action'] == "edit") {
				if (is_it_me(CURRENT_FOLDER, $_GET['name'])){
					echo "<div class=\"message error\">Diese Datei kann nicht bearbeitet werden, da Sie zu phpFinder gehört!</div>";
				} elseif (file_exists(CURRENT_FOLDER . $_GET['name'])) {
					$schreibbar = is_writable(CURRENT_FOLDER . $_GET['name']);
					echo "<h2>Datei &quot;" . sanitize_names($_GET['name']) . "&quot; ";
					if ($schreibbar) {
						echo "bearbeiten</h2>";
					} else {
						echo "ansehen</h2>";
					}
					if (filesize(CURRENT_FOLDER . $_GET['name']) > 512000 && $_GET['sure'] == false) {
						// Prüfen ob die Datei nicht zu groß ist, wenn ja muss der GET-Paramter sure auf true sein, damit die Datei trotzdem bearbeitet wird
						echo "<div class=\"message warning\" >Die Datei &quot;" . sanitize_names($_GET['name']) . "&quot; ist sehr groß für eine reine Textdatei.
						Sind Sie sicher, dass Sie es sich um eine reine Text-Datei handelt? Durch das Öffnen von zu großen Dateien wird der Server und ihr Browser stark beansprucht.</div>
						<p class=\"buttons\"><a href=\"$url&amp;sure=true\" class=\"positive\"><i class=\"icon accept\" ></i> Trotzdem öffnen</a> <a href=\"$ref\" class=\"negative\" ><i class=\"icon cancel\" ></i> Nicht öffnen</a></p>";
					} else {
						if (!$schreibbar) {
							//Meldung ausgeben, falls Datei nicht schreibbar ist
							echo "<div class=\"message warning\">Die Datei ist nicht schreibbar. Änderungen können also nicht gespeichert werden.</div>\n\n";
						}
						echo "<form action=\"$self&amp;action=post\" method=\"post\" style=\"width:100%;margin:0;padding:0;\" >\n
						<textarea name=\"content\" style=\"width:99%;padding:5px;\" rows=\"20\" cols=\"\"";
						if (!$schreibbar) {
							//Textfeld nur lesbar machen, wenn die Datei nicht schreibbar ist
							echo " readonly=\"readonly\" ";
						}
						echo ">";
						$dateiinhalt = file_get_contents(CURRENT_FOLDER . $_GET['name']);
						//Dateiinhalt in einer Variable speichern
						//Tags immunisieren
						$dateiinhalt = str_replace(">", "&gt;", $dateiinhalt);
						$dateiinhalt = str_replace("<", "&lt;", $dateiinhalt);
						echo $dateiinhalt;
						echo "</textarea>\n";
						echo "<small title=\"Größe der Datei vor Beginn der Bearbeitung\" style=\"float:right;\" >" . size_unit(filesize(CURRENT_FOLDER . $_GET['name'])) . "</small>\n";
						echo "<small title=\"Kompletter Dateiname\" >" . sanitize_names(substr(CURRENT_FOLDER, 2) . $_GET['name']) . "\n</small>\n";
						if ($schreibbar) {
							//Falls die Datei schreibbar ist, werden die Sicherungseinstellungen angezeigt
							echo '<input type="hidden" name="file" title="Dateiname" readonly="readonly" value="' . sanitize_names($_GET['name']) . '" />
							<fieldset title="Optionen zum Abspeichern der Datei" style="margin: 10px 0;">
								<legend>Optionen</legend>
								<div style="padding: 14px; width: 400px; text-align: center;">
									<label title="Ersetzt deutsche Umlaute automatisch durch die passenden HTML Codes" for="replace">Umlaute ersetzen<span class="small">Deutsche Umlaute durch HTML-Codes ersetzen</span></label>
									<input type="checkbox" id="replace" name="replace" checked="checked"/>
									<label title="Datei unter einem anderen Dateinamen speichern" for="save_as" style="margin-top: 15px;">Speichern unter </label>
									<input type="checkbox" id="save_as" name="save_as" style="margin-top: 20px;"/>
									<label title="Datei unter einem anderen Dateinamen speichern" for="save_as_name">Neuer Dateiname <span class="small">Nur Falls "Speichern unter" aktiviert ist</span></label>
									<input type="text" title="Falls die Checkbox aktiviert ist, wird die Datei unter dem Dateinamen, der hier eingegeben wird, gespeichert." name="save_as_name" id="save_as_name"/>
								</div>
							</fieldset>
							<span class="buttons">
							<button class="positive floatleft" type="submit" name="save_file" title="Datei speichern (unter)">
								<i class="icon disk" ></i>
								Speichern
							</button>
							<a class="negative floatleft" href="' . $self_raw . '?dir=' . rawurlencode2(CURRENT_FOLDER) . '&amp;action=file_edit&amp;name=' . rawurlencode2($_GET['name']) . '" title="Bearbeiten Beenden und zum Datei-Dialog zurückkehren." >
								<i class="icon cancel" ></i> 
								Abbrechen
							</a>
							</span><br /><br /><br />
							</form>';
						} else {
							echo '<br /><br /><span class="buttons">
							<a href="' . $ref . '" title="Zurück zum Datei-Dialog" ><i class="icon arrow_left" class="floatleft" ></i> Zurück</a>
							</span>';
						}
					}
				} else {
					//Wenn die Datei zum bearbeiten nicht mehr vorhanden ist
					echo '<div class="message error">Die Datei "' . sanitize_names($_GET['name']) . '" kann nicht bearbeitet werden, da Sie nicht (mehr) vorhanden ist.</div>';
				}
			} elseif ($_GET['action'] == "zip") {
				echo "<h2>Datei \"" . sanitize_names($_GET['name']) . "\" komprimieren</h2>";
				$has_zip = class_exists('ZipArchive');
				$has_gzip = function_exists("gzopen");
				$has_bzip = function_exists("bzopen");
				if ($has_zip || $has_gzip || $has_bzip) {
					echo '<div class="message information">Sie können auch eine bereits existierende ZIP-Datei angeben. Die Datei &quot;' . sanitize_names($_GET['name']) . '&quot; wird dann einfach in die ZIP-Datei eingefügt.</div>
					<form action="' . $self . '&amp;action=post" method="post">
						<h3>Datei komprimieren</h3>
						<p>Bitte geben Sie den Dateinamen inkl. Endung für die komprimierte Datei ein!</p>
						<label for="new">Dateiname
							<span class="small">Name der komprimierten Datei</span>
						</label>
						<input type="text" name="new" id="new" title="Dateiname für die neue ZIP Datei" value="' . sanitize_names($_GET['name']) . '.zip" />
						<input type="hidden" name="file" title="Alter Dateiname" value="' . sanitize_names($_GET['name']) . '" />
						<label for="method" >Kompressions-verfahren</label>
						<select name="method" id="method" size="1" title="Kompressionsverfahren">';
							if ($has_zip) {
								echo '<option value="zip">ZIP (*.zip)</option>';
							}
							if ($has_gzip) {
								echo '<option value="gzip">GZip (*.gz)</option>';
							}
							if ($has_bzip) {
								echo '<option value="bzip2">BZip2 (*.bz2)</option>';
							}
						echo '</select>
						<button type="submit" name="zip" title="Datei komprimieren">
							<i class="icon page_white_compressed" ></i>
							Komprimieren
						</button>
					</form>';
				} else {
					echo '<div class="message error">Sie können leider keine Archive erstellen, da keine passenden Erweiterungen für PHP installiert sind.</div>';
				}
			} elseif ($_GET['action'] == "unzip") {
				echo "<h2>Datei \"" . sanitize_names($_GET['name']) . "\" entpacken</h2>";
				$has_zip = class_exists('ZipArchive');;
				$has_gzip = function_exists("gzopen");
				$has_bzip = function_exists("bzopen");
				if ($has_zip || $has_gzip || $has_bzip) {
					echo '<form action="' . $self . '&amp;action=post" method="post">
						<h3>Datei entpacken</h3>
						<p>Wählen Sie aus, wie die Datei entpackt werden soll.</p>
						<label for="method" >Dekompressions-verfahren</label>
						<select name="method" id="method" size="1" title="Kompressionsverfahren">';
							if ($has_zip) {
							echo '<option value="zip">ZIP (*.zip)</option>';
							}
							if ($has_gzip) {
							echo '<option value="gzip">GZip (*.gz)</option>';
							}
							if ($has_bzip) {
							echo '<option value="bzip2">BZip2 (*.bz2)</option>';
							}
						echo '</select>
						<div id="newFolderInput"><label for="unzipInNewFolter">Neuer Ordner
							<span class="small">In neuen Unterordner entpacken</span>
						</label>
						<input type="checkbox" name="unzipInNewFolter" id="unzipInNewFolter" title="In neuen Unterordner entpacken" /></div>
						
						<label for="replaceExisting">Überschreiben
							<span class="small">Vorhandene Dateien ersetzen</span>
						</label>
						<input type="checkbox" name="replaceExisting" id="replaceExisting" title="Vorhandene Dateien ersetzen" />
						
						<label for="deleteZip">Datei löschen
							<span class="small">Datei nach entpacken löschen</span>
						</label>
						<input type="checkbox" name="deleteZip" id="deleteZip" title="Datei nach entpacken löschen" />
						
						<button type="submit" name="unzip" title="Datei entpacken">
							<i class="icon page_white_compressed" ></i>
							Entpacken
						</button>
						<input type="hidden" name="file" value="'.sanitize_names($_GET['name']).'" />
					</form>
					<script type="text/javascript">
						//<![CDATA[
						document.getElementById("newFolderInput").style.display = "inline";
						document.getElementById("method").onchange = function(){
						if (this.options[this.selectedIndex].value == "zip"){
							document.getElementById("newFolderInput").style.display = "inline";
						}else{
							document.getElementById("newFolderInput").style.display = "none";
						}
						}
						//]]>
					</script>';
				} else {
					echo '<div class="message error">Sie können leider keine Archive erstellen, da keine passenden Erweiterungen für PHP installiert sind.</div>';
				}
			} elseif ($_GET['action'] == "editwfmfile") {
				echo "<h2>phpFinder Dateien bearbeiten</h2>";
				echo "<div id=\"message information\">Hier haben Sie die Möglichkeit bestimmte Aktionen mit den phpFinder Dateien durchzuführen</div>";
				//Erstmal prüfen ob die Datei überhaupt noch vorhanden ist
				if (file_exists(CURRENT_FOLDER . basename($_SERVER['PHP_SELF']))) {
					$file_size_raw = @ filesize(CURRENT_FOLDER . basename($_SERVER['PHP_SELF']));
					$file_size = @ size_unit($file_size_raw);
					$lesbar = is_readable(CURRENT_FOLDER . basename($_SERVER['PHP_SELF']));
					$schreibbar = is_writable(CURRENT_FOLDER . basename($_SERVER['PHP_SELF']));
					echo "<table width=\"100%\">
						<tr>
							<td style=\"vertical-align:top;\">";
							echo '<ul>
								<li><i class="icon page_white_go" ></i> <a title="Neues phpFinder Fenster" target="_blank" href="' . rawurlencode2(substr(CURRENT_FOLDER, 2) . basename($_SERVER['PHP_SELF'])) . '">Neues phpFinder Fenster</a></li>
								<li><i class="icon page_white_delete" ></i> <a title="phpFinder entfernen" href="' . $self . '&amp;action=delete_wfm&amp;name=' . rawurlencode2(basename($_SERVER['PHP_SELF'])) . '">phpFinder entfernen</a></li>
								<li><i class="icon page_white_rename" ></i> <a title="phpFinder Datei umbennen" href="' . $self . '&amp;action=rename&amp;name=' . rawurlencode2(basename($_SERVER['PHP_SELF'])) . '">phpFinder Datei umbennen</a></li>
							</ul>
							<ul>
								<li><i class="icon page_white_delete" ></i> <a title="Konfigurationsdatei entfernen" href="' . $self . '&amp;action=delete_wfm&amp;what=config">Konfigurationsdatei entfernen</a> (Einstellungen auf Standard)</li>
							</ul>
							</td>
						</tr>
					</table>';
				} else {
					echo "<div class=\"message error\">Die gesuchte Datei \"" . sanitize_names($_GET['name']) . "\" ist nicht (mehr) vorhanden.</div>";
				}
			} elseif ($_GET['action'] == "delete_wfm") {
				if (isset ($_GET['what']) && $_GET['what'] == "config") {
					echo "<h2>Konfigurationsdatei entfernen</h2>";
					if (isset ($_GET['sure']) && $_GET['sure'] == true) {
						// Sicherheitsabfrage wurde bestätigt
						if (@ unlink(CONFIG_FILE)) {
							echo '<div class="message success">Die Konfigurationsdatei wurde erfolgreich entfernt!<br /></div>';
							echo "<p class=\"buttons\"><a href=\"" . $self . "&amp;action=settings\" title=\"Einstellungsdialog aufrufen\">Jetzt neu anlegen!</a></p>";
						} else {
							echo '<div class="message error">Beim Löschen der Konfigurationsdatei ist ein Fehler aufgetreten. Wiederholen Sie den Vorgang oder löschen die Datei über FTP.<br /></div>';
						}
					} elseif(ALLOW_REMOVAL == true) {
						// Sicherheitsabfrage stellen
						echo '<div class="message warning">Hiermit haben Sie die Möglichkeit, die Einstellungsdateien von phpFinder zu löschen und somit die Einstellungen wieder auf Standard zurückzusetzen! Dieser Vorgang kann nicht rückgängig gemacht werden!</div>
						<br /><table align="center">
						<tr>
							<td colspan="2" style="text-align:center;">
								Möchten Sie die Konfigurationsdatei wirklich komplett vom Server entfernen?
							</td>
						</tr>
						<tr class="buttons">
							<td>
								<a href="' . $self . '&amp;action=delete_wfm&amp;what=config&amp;sure=true" class="positive">
									<i class="icon accept" ></i> Ja
								</a>
							</td>
							<td>
								<a href="' . $ref . '" class="negative">
									<i class="icon cancel" ></i> Nein
								</a>
							</td>
						</tr>
						</table>';
					} else {
						echo '<p>phpFinder kann nicht über das Interface vom Server entfernt werden, da es in den Einstellungen unterbunden wurde!</p>';
					}
				} else {
					echo "<h2>phpFinder entfernen</h2>";
					if (isset ($_GET['sure']) && $_GET['sure'] == true && ALLOW_REMOVAL) {
						//Wurde die Sicherheitsabfrage $_GET['sure'] schon mit true bestätigt?
						@ delete($IMG);
						//Ordner mit den Bildern löschen
						@ unlink(CONFIG_FILE);
						@ unlink(basename($_SERVER['PHP_SELF']));
						//Wenn die Datei nicht mehr da ist, wird eine Meldung ausgegeben
						echo '<div class="message success">phpFinder wurde erfolgreich entfernt!<br /></div>';
					} else {
						//Hier gehts weiter, falls die Variable "sure" nicht dabei ist
						//und das Löschen der Datei also noch nicht bestätigt wurde
						echo '<div class="message warning">Hiermit haben Sie die Möglichkeit, phpFinder inklusive aller Bilder und Einstellungsdateien vom Server zu löschen! Dieser Vorgang kann nicht rückgängig gemacht werden!</div>
						<br /><table align="center"><tr>
						<td colspan="2" style="text-align:center;">';
						if (ALLOW_REMOVAL == true) {
							echo 'Möchten Sie phpFinder wirklich komplett vom Server entfernen?</td>
							</tr>
							<tr class="buttons">
								<td>
									<a href="' . $self . '&amp;action=delete_wfm&amp;sure=true" class="positive">
										<i class="icon accept" ></i> Ja
									</a>
								</td>
								<td>
									<a href="' . $ref . '" class="negative">
										<i class="icon cancel" ></i> Nein
									</a>
								</td>
							</tr>
							</table>';
						} else {
							echo "<p>phpFinder kann nicht über das Interface vom Server entfernt werden, da es in den Einstellungen unterbunden wurde!</p></tr></table>";
						}
					}
				}
			} elseif ($_GET['action'] == "about") {
				echo "<p class=\"textcenter\"><i class=\"icon logo\"></i></p>
				<p>phpFinder ist ein PHP Script von <a href=\"http://www.sebastian-fuss.de\" title=\"Zur Website von Sebastian Fuss\">Sebastian Fuss</a>. Es befindet sich in der Beta-Phase, was bedeutet es kann Fehler enthalten, die zu unvorhergesehenen Ergebnissen führen. Die Benutzung erfolgt daher auf eigene Gefahr. Um mitzuhelfen das Script fortlaufend zu verbessern, melden Sie bitte jeden Fehler oder wenn es etwas nicht wie erwartet funktioniert. Gerne können Sie auch Vorschläge für weitere Funktionen einsenden.</p>\n
				<p>Javascript wird nicht zwingend benötigt, dennoch ist es empfohlen, da dadurch die Verwendung vereinfacht wird.</p>
				<table class=\"propertytable\" width=\"75%\">
				<tr><td>Lizenz</td><td><i class=\"icon report\"></i> <a rel=\"license\" target=\"_blank\" href=\"http://www.gnu.org/licenses/lgpl-3.0.html\" title=\"Lizenzbestimmungen von phpFinder\" >GNU LGPL</a></td></tr>
				<tr><td>Fehler melden</td><td><i class=\"icon bug_error\" title=\"Bug/Fehler melden\"></i> <a href=\"https://github.com/Nolanus/phpFinder/issues/new\" target=\"_blank\" title=\"Bug/Fehler melden\" >GitHub Ticketsystem</a> (Anmeldung bei GitHub erforderlich)</td></tr>
				<tr><td>Validate HTML/CSS</td><td><i class=\"icon xhtml_valid\" title=\"Valid XHTML 1.0 Transitional\"></i> <a href=\"http://validator.w3.org/check?uri=referer\" target=\"_blank\" title=\"XHTML Validität überprüfen\">XHTML 1.0</a> und <i class=\"icon css_valid\" title=\"Valid CSS level 2.0, 2.1 &amp; 3.0\"></i> <a href=\"http://jigsaw.w3.org/css-validator/check/referer\" target=\"_blank\" title=\"Valid CSS level 3.0\">CSS 3</a></td></tr>
				<tr><td>Hilfe</td><td><i class=\"icon github\"></i> <a href=\"$self&amp;action=help\">GitHub Wikiseiten</a></td></tr>
				<tr><td>phpFinder Version</td><td>$VERSION (<a href=\"http://versioncheck.sebastian-fuss.de/?w=0&amp;v=$VERSION&amp;s=2\" target=\"Versioncheck\">Nach Updates suchen</a>)</td></tr>
				</table>
				<p><iframe width=\"100%\" frameborder=\"0\" height=\"30\" scrolling=\"no\" name=\"Versioncheck\" ";
				if (isset ($_GET['versioncheck'])) {
					//Wenn der Versionscheck direkt durchgeführt werden soll wird die Seite via src-Parameter definiert damit Sie gleich geladen wird
					echo "src=\"http://versioncheck.sebastian-fuss.de/?w=0&amp;v=$VERSION&amp;s=2\" ";
				}
				echo "><p>Da ihr Browser keine iFrames untersützt, kann phpFinder ihnen nicht die neuste Version anzeigen!</p></iframe></p>
				<p>Icons von <a href=\"http://famfamfam.com\" target=\"_blank\" title=\"Zur Website FamFamFam.com\" >FamFamFam</a>.</p>";
			} elseif ($_GET['action'] == "protect") {
				echo "<h2>Ordner \"" . sanitize_names($_GET['name']) . "\" schützen</h2>";
				if (is_dir(CURRENT_FOLDER . $_GET['name']) && is_writable(CURRENT_FOLDER . $_GET['name'])) {
					//Falls der vorhandene Schutz ersetzt werden soll, werden hier die Dateien entfernt
					if (isset ($_GET['replace']) && $_GET['replace'] == true) {
						//Gucken ob der Schutz nicht schon weg ist
						if (file_exists(CURRENT_FOLDER . $_GET['name'] . "/.htaccess") && file_exists(CURRENT_FOLDER . $_GET['name'] . "/.htpasswd")) {
							//Wenn beide unlinks TRUE zurückgeben ist der Schutz weg
							if (unlink(CURRENT_FOLDER . $_GET['name'] . "/.htaccess") && unlink(CURRENT_FOLDER . $_GET['name'] . "/.htpasswd")) {
								echo "<div class=\"message success\">Der vorhandene htaccess Verzeichnisschutz wurde erfolgreich entfernt.</div>";
							} else {
								//Wenn nicht, konnte der Schutz nicht entfernt werden
								echo "<div class=\"message error\">Der vorhandene .htaccess Verzeichnisschutz konnte nicht entfernt werden.</div>";
							}
						} else {
							echo "<div class=\"message success\">Der htaccess Verzeichnisschutz ist nicht mehr vorhanden.</div>";
						}
					}
					if (!file_exists(CURRENT_FOLDER . $_GET['name'] . "/.htaccess") && !file_exists(CURRENT_FOLDER . $_GET['name'] . "/.htpasswd")) {
						if (!isset ($_GET['remove'])) {
							//Falls der Schutz entfernt werden sollte, das Formular nicht anzeigen
							//Ermitteln des Absoluten Pfades des Verzeichnis
							$abs_path = explode("/", $_SERVER['SCRIPT_FILENAME']);
							//Abs. Pfad des aktuellen Scripts bekommen
							unset ($abs_path[count($abs_path) - 1]);
							//Letzen Wert im Array (der Dateiname) entfernen
							$abs_path = implode("/", $abs_path);
							//Array wieder zu einem String machen
							$abs_path = $abs_path . "/" . substr(CURRENT_FOLDER, 2) . $_GET['name'];
							//Ordner anfügen
							echo '<form action="' . $self . '&amp;action=post" method="post">
								<h3>Ordner "' . sanitize_names($_GET['name']) . '" schützen</h3>
								<p>Bitte füllen Sie die benötigten Felder aus um den Ordner mit htaccess zu schützen.</p>
								
								<label for="area">Bereich
									<span class="small">Etwa: Privater Bereich</span>
								</label>
								<input type="text" name="area" id="area" title="Name des zu schützenden Bereiches" value="" />
								
								<label for="path">Absoluter Pfad
									<span class="small">Absoluter Pfad zum Ordner</span>
								</label>
								<input type="text" name="path" id="path" title="Absoluter Pfad des Ordners" value="' . sanitize_names($abs_path) . '" />
								
								<label for="username" >Benutzername
									<span class="small">Etwa: Admin</span>
								</label>
								<input type="text" name="username" id="username" title="Benutzername" value="" />
								
								<label for="password1">Passwort
									<span class="small">Dein Passwort</span>
								</label>
								<input type="password" name="password1" id="password1" title="Dein Passwort" value="" />
								
								<label for="password2">Passwort Wiederholung</label>
								<input type="password" name="password2" id="password2" title="Dein Passwort" value="" />
								
								<input type="hidden" name="folder" value="' . sanitize_names(substr(CURRENT_FOLDER, 2) . $_GET['name']) . '" />
								<button type="submit" name="protect" title="Ordner schützen">
									<i class="icon folder_key" ></i>
									Schützen
								</button>
							</form>';
						} else {
							echo "<p class=\"buttons\">
								<a href=\"$self&amp;action=edit_folder&amp;name=" . rawurlencode2($_GET['name']) . "\"><i class=\"icon folder_edit\" ></i> Ordner bearbeiten</a>
							</p>";
						}
					} else {
						echo "<div class=\"message error\">Der Ordner \"" . sanitize_names(substr(CURRENT_FOLDER, 2) . $_GET['name']) . "\" enthält bereits eine htaccess Datei.<br />\n
						Was möchten Sie tun?</div>";
						echo "<p class=\"buttons\">
							<a href=\"$ref\" class=\"floatleft\" title=\"Zurück\" ><i class=\"icon arrow_left\" ></i> Zurück</a>
							<a href=\"$url&amp;replace=true\" class=\"floatleft\" title=\"Vorhandenen htaccess Verzeichnisschutz ersetzen\" ><i class=\"icon page_white_copy\" ></i> Ersetzen</a>
							<a href=\"$url&amp;replace=true&amp;remove\" class=\"floatleft\" title=\"Vorhandenen htaccess Verzeichnisschutz entfernen\" ><i class=\"icon page_white_delete\" ></i> Entfernen</a>
						</p>";
					}
				} else {
					// Ordner nicht mehr da oder nicht schreibbar
					echo "<div class=\"message error\">Der Ordner \"" . sanitize_names(substr(CURRENT_FOLDER, 2) . $_GET['name']) . "\" kann nicht geschützt werden, da er nicht mehr vorhanden ist oder nicht schreibbar.</div>";
					echo "<p class=\"buttons\">
						<a href=\"$ref\"><i class=\"icon arrow_left\" class=\"floatleft\"></i> Zurück</a>
					</p>";
				}
			} elseif ($_GET['action'] == "copyfolder") {
				echo "<h2>Ordner \"" . sanitize_names($_GET['name']) . "\" kopieren</h2>";
				if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
					if (is_dir(CURRENT_FOLDER . $_GET['name'])) {
						echo '<div class="message information">Mit dieser Funktion können Sie einen Ordner mit seinem gesamten Inhalt kopieren. Perfekt um seine Homepage oder etwas anderes zu sichern.</div>
						<form action="' . $self . '&amp;action=post" method="post">
							<h3>Ordner kopieren</h3>
							<p>Bitte geben Sie den Namen für den neuen Ordner sowie eventuelle Unterordner ein!</p>
							<label for="new">Ordnername
								<span class="small">Name des neuen Ordners</span>
							</label>
							<input type="text" name="new" id="new" title="Dateiname für den neuen Ordner" value="Kopie_von_' . sanitize_names($_GET['name']) . '" />
							<input type="hidden" name="old" title="Alter Dateiname" value="' . sanitize_names($_GET['name']) . '" />
							
							<label for="ifexists" >Falls vorhanden</label>
							<select name="ifexists" id="ifexists" size="1" title="Falls vorhanden">
								<option value="0">Abbrechen</option>
								<option value="1">Ersetzen</option>
								<option value="2">Integrieren</option>
							</select>
							<button type="submit" name="FolderCopy" title="Ordner kopieren">
								<i class="icon folder_copy" ></i>
								Kopieren
							</button>
						</form>';
					} else {
						echo '<div class="message error">"' . sanitize_names($_GET['name']) . '" ist kein Ordner.</div>';
					}
				} else {
					echo '<div class="message error">Der Ordner "' . sanitize_names($_GET['name']) . '" existiert nicht (mehr).</div>';
				}
			} elseif ($_GET['action'] == "mail") {
				echo "<h2>Datei \"" . sanitize_names($_GET['name']) . "\" versenden</h2>";
				if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
					// Wenn als Dateityp "maybe/irgendwas" zurückkommt wird mime_type_erke
					if (function_exists("mime_content_type")) {
						$mime = mime_content_type(CURRENT_FOLDER . $_GET['name']);
						echo '<div class="message information">Mit dieser Funktion können Sie Dateien als E-Mail Anhang versenden.</div>
						<form action="' . $self . '&amp;action=post" method="post">
							<h3>Datei versenden</h3>
							<p>Füllen Sie das Formular aus um die E-Mail zu senden.</p>
							<label for="toname">Empfänger Name
								<span class="small">Name des Empfängers</span>
							</label>
							<input type="text" name="toname" id="toname" title="Name des Empfängers" value="" />
							<label for="tomail">Empfänger E-Mail
								<span class="small">E-Mail des Empfängers</span>
							</label>
							<input type="text" name="tomail" id="tomail" title="E-Mail-Adresse des Empfängers" value="" />
							<label for="fromname">Absender Name
								<span class="small">Name des Absenders</span>
							</label>
							<input type="text" name="fromname" id="fromname" title="Ihre Name" value="" />
							<label for="frommail">Absender E-Mail
								<span class="small">E-Mail des Absenders</span>
							</label>
							<input type="text" name="frommail" id="frommail" title="Ihre E-Mail-Adresse" value="" />
							<label for="subject">Betreff
								<span class="small">Betreff der E-Mail</span>
							</label>
							<input type="text" name="subject" id="subject" title="Betreff der E-Mail" value="" />
							<label for="message">Nachricht
								<span class="small">Eine kurze Nachricht</span>
							</label>
							<textarea class="styletext" id="message" name="message" title="Eine kurze Nachricht" cols="" rows="" ></textarea>
							<input type="hidden" name="file" title=" Dateiname" value="' .sanitize_names($_GET['name']) . '" />
							<button type="submit" name="MailSend" title="Datei versenden">
								<i class="icon email_go" ></i>
								Senden
							</button>
						</form>';
					} else {
						echo '<div class="message error">Auf ihrem Server ist die Funktion des Mime-Type erkennens nicht vorhanden / aktiviert. Aus Sicherheitsgründen ist das Versenden von Dateien als E-Mail-Anhang daher nicht möglich.</div><br />';
					}
				} else {
					//Else Schleife die aufgerufen wird wenn die Datei nicht mehr vorhanden ist
					echo '<div class="message error">Die Datei "' . sanitize_names($_GET['name']) . '" existiert nicht (mehr).</div>';
				}
			} elseif ($_GET['action'] == "ftppush") {
				echo "<h2>Datei \"" . sanitize_names($_GET['name']) . "\" an FTP Server senden</h2>";
				if (function_exists("ftp_connect") && function_exists("ftp_login") && function_exists("ftp_put") && function_exists("ftp_quit")) {
					if (file_exists(CURRENT_FOLDER . $_GET['name']) && is_file(CURRENT_FOLDER . $_GET['name'])) {
						echo '<div class="message information">Mit dieser Funktion können Sie mithilfe der FTP Funktionen von PHP eine Datei an einen entfernten FTP Server senden.</div>
						<form action="' . $self . '&amp;action=post" method="post">
							<h3>Datei senden</h3>
							<p>Geben Sie bitte die Verbindungsdaten des Servers sowie den Zielordner ein.</p>
							<label for="server">FTP-Server
								<span class="small">URL des FTP-Servers</span>
							</label>
							<input type="text" name="server" id="server" title="URL des FTP-Servers" value="ftp.example.com" />
							
							<label for="port">FTP-Port
								<span class="small">Port des FTP Servers</span>
							</label>
							<input type="text" name="port" id="port" title="FTP-Port" value="21" />
							
							<label for="username">Benutzername</label>
							<input type="text" name="ftpusername" id="username" title="Benutzername" value="" />
							
							<label for="password">Passwort</label>
							<input type="password" name="ftppassword" id="password" title="Passwort" value="" />
							
							<label for="folder">Zielordner
								<span class="small">Ordnername oder / lassen</span>
							</label>
							<input type="text" name="folder" id="folder" title="Zielordner" value="/" />
							
							<label for="modus">Transfer-Modus</label>
							<select name="modus" id="modus" size="1" title="Transfer-Modus">
								<option value="0">ASCII-Modus</option>
								<option value="1">Binary-Modus</option>
							</select>
							
							<label for="passiv">Passiver Modus
							<span class="small">Passiven FTP Modus verwenden</span></label>
							<input type="checkbox" name="passiv" id="passiv" title="Passiven Modus Verwenden" />
							
							<input type="hidden" name="file" title="Filename" value="' . sanitize_names($_GET['name']) . '" />
							
							<button type="submit" name="FTPPush" title="Datei senden" onclick="javascript:go();">
								<i class="icon server_go" id="loadimg" ></i>
								Datei senden
							</button>
						</form>';
					} else {
						echo '<div class="message error">Die Datei "' . sanitize_names($_GET['name']) . '" existiert nicht (mehr) oder es handelt sich nicht um eine Datei.</div>';
					}
				} else {
					echo "<div class=\"message error\">Auf diesem Server sind die FTP-Funktionen für PHP nicht verfügbar bzw. aktiviert.</div>";
				}
			} elseif ($_GET['action'] == "shorturl") {
				echo "<h2>KurzURL für \"" . sanitize_names($_GET['name']) . "\" erstellen</h2>";
				if (@ !ini_get("allow_url_fopen") && @ !function_exists("curl_init")) {
					//Wenn keine der zwei Methoden (cURL und url_fopen) unterstützt werden
					echo "<div class=\"message warning\">Da das Aufrufen von Dateien auf anderen Servern über PHP nicht erlaubt ist und dieser Server nicht über cURL verfügt, ist es leider nicht möglich KurzURL direkt zu erstellen.</div>";
					echo "<p>Alternativ finden Sie daher hier eine Liste mit Links, die direkt zu den Anbietern führen und auf diese Weise die KurzURLs erstellen.</p>";
					echo '<ul>
						<li><a href="http://tinyurl.com/create.php?url=' . urlencode($connectionType . $_SERVER['HTTP_HOST'] . clear_path($_SERVER['PHP_SELF'], 2) . "/" . sanitize_names(substr(CURRENT_FOLDER, 2) . $_GET['name'])) . '" target="_blank">tinyurl.com</a></li>
						<li><a href="http://is.gd/create.php?longurl=' . urlencode($connectionType . $_SERVER['HTTP_HOST'] . clear_path($_SERVER['PHP_SELF'], 2) . "/" . sanitize_names(substr(CURRENT_FOLDER, 2) . $_GET['name'])) . '" target="_blank">is.gd</a></li>
						<li><a href="http://goo.gl/" target="_blank">goo.gl</a> (Keine sofortige URL-Erstellung möglich)</li>
					</ul>';
				} else {
					echo '<form action="' . $self . '&amp;action=post" method="post">
						<h3>ShortURL erstellen</h3>
						<p>Markieren Sie, welchen ShortURL-Service Sie verwenden möchten.</p>
						
						<label for="tinyurl">tinyurl.com
							<span class="small"><a href="http://www.tinyurl.com" target="_blank">www.tinyurl.com</a></span>
						</label>
						<input type="checkbox" name="tinyurl" id="tinyurl" title="tinyurl.com URL erstellen" />
						
						<label for="isgd">is.gd
							<span class="small"><a href="http://www.is.gd" target="_blank">www.is.gd</a></span>
						</label>
						<input type="checkbox" name="isgd" id="isgd" title="is.gd URL erstellen" />
						
						<label for="googl">goo.gl
							<span class="small"><a href="http://www.goo.gl" target="_blank">www.goo.gl</a></span>
						</label>
						<input type="checkbox" name="googl" id="googl" title="goo.gl URL erstellen" />
						
						<label for="url">Datei URL
							<span class="small">Adresse der Datei</span>
						</label>
						<input type="text" name="file" id="url" title="Komplette URL der Datei" value="' . sanitize_names($connectionType . $_SERVER['HTTP_HOST'] . clear_path($_SERVER['PHP_SELF'], 2) . "/" . substr(CURRENT_FOLDER, 2) . $_GET['name']) . '" />
						
						<button type="submit" name="ShortenURL" title="KurzURL erstellen">
							<i class="icon link_go" ></i>
							Kürzen
						</button>
					</form>';
				}
			} elseif ($_GET['action'] == "edit_image") {
				echo "<h2>Bild \"" . sanitize_names($_GET['name']) . "\" bearbeiten</h2>";
				if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
					if (extension_loaded('gd') && function_exists('gd_info')) {
						echo "<a href=\"" . htmlspecialchars(CURRENT_FOLDER . $_GET['name']) . "\" target=\"_blank\"><img src=\"" . htmlspecialchars(CURRENT_FOLDER . $_GET['name']) . "\" title=\"" . $_GET['name'] . "\" class=\"restrainImageSize\" style=\"float:right;\" alt=\"Das Bild " . $_GET['name'] . "\" /></a>";
						echo '<ul>
							<li><i class="icon images" ></i> <a title="Bild konvertieren" href="' . $self . '&amp;action=image_convert&amp;name=' . rawurlencode2($_GET['name']) . '">Bild konvertieren</a></li>
							<li><i class="icon image_rotate" ></i> <a title="Bild drehen" href="' . $self . '&amp;action=rotate&amp;name=' . rawurlencode2($_GET['name']) . '">Bild drehen</a></li>
							<li><i class="icon image_resize" ></i> <a title="Miniaturansicht erzeugen / Bilder verkleinern" href="' . $self . '&amp;action=imagethumb&amp;name=' . rawurlencode2($_GET['name']) . '">Miniaturansicht erzeugen / Bild verkleinern</a></li>';
						if (function_exists("imagefilter")) {
							echo '<li><i class="icon image_brightness" ></i> <a title="Helligkeit des Bildes einstellen" href="' . $self . '&amp;action=image_brightness&amp;name=' . rawurlencode2($_GET['name']) . '">Helligkeit einstellen</a></li>
							<li><i class="icon image_contrast" ></i> <a title="Kontrast des Bildes einstellen" href="' . $self . '&amp;action=image_contrast&amp;name=' . rawurlencode2($_GET['name']) . '">Kontrast einstellen</a></li>
							<li><i class="icon image_grey" ></i> <a title="Graustufen-Bild erzeugen" href="' . $self . '&amp;action=image_apply_filter&amp;filter=greyscale&amp;name=' . rawurlencode2($_GET['name']) . '">Graustufen-Bild erzeugen</a></li>
							<li><i class="icon image_bnw" ></i> <a title="Schwarz-Weiß-Bild erzeugen" href="' . $self . '&amp;action=image_apply_filter&amp;filter=bnw&amp;name=' . rawurlencode2($_GET['name']) . '">Schwarz-Weiß-Bild erzeugen</a></li>
							<li><i class="icon image_negativ" ></i> <a title="Negativ-Bild erzeugen" href="' . $self . '&amp;action=image_apply_filter&amp;filter=negate&amp;name=' . rawurlencode2($_GET['name']) . '">Negativ-Bild erzeugen</a></li>
							<li><i class="icon image_edge" ></i> <a title="Umrisse/Kanten des Bildes hervorheben" href="' . $self . '&amp;action=image_apply_filter&amp;filter=edgedetect&amp;name=' . rawurlencode2($_GET['name']) . '">Umrisse hervorheben</a></li>
							<li><i class="icon image_emboss" ></i> <a title="Gravur-Bild erzeugen" href="' . $self . '&amp;action=image_apply_filter&amp;filter=emboss&amp;name=' . rawurlencode2($_GET['name']) . '">Gravur-Bild erzeugen</a></li>
							<li><i class="icon image_blur" ></i> <a title="Bild-Unschärfe erzeugen" href="' . $self . '&amp;action=image_apply_filter&amp;filter=blur&amp;name=' . rawurlencode2($_GET['name']) . '">Bild-Unschärfe erzeugen</a></li>
							<li><i class="icon image_pixel" ></i> <a title="Verpixeltes Bild erzeugen" href="' . $self . '&amp;action=image_pixel&amp;name=' . rawurlencode2($_GET['name']) . '">Verpixeltes Bild erzeugen</a></li>';
						}
						else {
							echo '<li><i class="icon image_bnw" ></i> <a title="Schwarz-Weiß-Bild erzeugen" href="' . $self . '&amp;action=image_apply_filter&amp;filter=bnw&amp;name=' . rawurlencode2($_GET['name']) . '">Schwarz-Weiß-Bild erzeugen</a></li>
							<li><i class="icon image_grey" ></i> <a title="Graustufen-Bild erzeugen" href="' . $self . '&amp;action=image_apply_filter&amp;filter=greyscale&amp;name=' . rawurlencode2($_GET['name']) . '">Graustufen-Bild erzeugen</a></li>';
						}
						if (!$BLOCK_PIXLR) {
							echo '<li><i class="icon image_edit" ></i> <a title="Bild online bearbeiten mit Pixlr" href="http://www.pixlr.com/editor/?image=' . urlencode(dirname($connectionType . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']) . '/' . substr(CURRENT_FOLDER, 2) . $_GET['name']) . '&amp;loc=de&amp;referrer=phpFinder&amp;title=' . urlencode($_GET['name']) . '&amp;method=GET&amp;target=' . urlencode($connectionType . $_SERVER['SERVER_NAME'] . $self) . '" >Bild online mit Pixlr bearbeiten</a></li>';
						}
						echo '</ul>
						<p class="buttons"><a href="' . $self . '&amp;action=file_edit&amp;name=' . rawurlencode2($_GET['name']) . '" title="Zurück zum normalen Bearbeiten Dialog" class="floatleft"><i class="icon arrow_left" title="Zurück zum normalen Bearbeiten Dialog"></i> Zurück</a></p>';
					} else {
						echo "<div class=\"message information\">Da auf ihrem Server die Funktions-Library GD Lib nicht installiert ist, stehen ihnen die Bildbearbeitungsoptionen nicht zur Verfügung.</div>";
					}
				} else {
					echo '<div class="message error">Die Datei "' . sanitize_names($_GET['name']) . '" ist nicht (mehr) vorhanden.</div>';
				}
			} elseif ($_GET['action'] == "image_apply_filter"){
				if ($_GET['filter'] == "greyscale" || $_GET['filter'] == "bnw" || function_exists("imagefilter")) {
					if (isset($_GET['filter']) && in_array($_GET['filter'], array("greyscale", "bnw", "negate", "edgedetect", "emboss", "blur"))){
						$descr = array(
							"greyscale" => "Graustufe",
							"bnw" => "Schwarz-Weiß",
							"negate" => "Negativ",
							"edgedetect" => "Umrisse hervorheben",
							"emboss" => "Gravur",
							"blur" => "Unschärfe");
						if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
							echo "<h2>Bild &quot;" . sanitize_names($_GET['name']) . "&quot; verändern - ".$descr[$_GET['filter']].'</h2>
							<div class="message information">Wenn Sie den selben Dateinamen wie den des Original-Bildes eingeben wird dieses ersetzt!</div>
							<form action="' . $self . '&amp;action=post" method="post">
								<h3>Bildeffekt anwenden</h3>
								<p>Füllen Sie das Formular aus um das Bild zu verändern</p>
								<input type="hidden" name="name" title="Name des Bildes" readonly="readonly" value="' . sanitize_names($_GET['name']) . '" />
								<label for="new_name" >Dateiname
									<span class="small">Name des veränderten Bildes</span>
								</label>
								<input type="text" id="new_name" name="new_name" title="Name des Bildes" value="'.sanitize_names($_GET['filter'].'_' . $_GET['name']) . '" />
								<button type="submit" name="'.$_GET['filter'].'" title="Bild verändern">
									<i class="icon image_go"></i>
									Anwenden
								</button>
								<input type="hidden" name="edit_image" value="'.$_GET['filter'].'" />
							</form>';
						}
						else {
							echo '<div class="message error">Die Datei "' . sanitize_names($_GET['name']) . '" ist nicht (mehr) vorhanden.</div>';
						}
					}else{
						echo '<div class="message error">Der übergeben Effekt ist ungültig.</div>';
					}
				} else {
					echo "<div class=\"message information\">Da auf ihrem Server die Funktion \"imagefilter\" der GD Lib nicht unterstützt wird, steht ihnen diese Bildbearbeitungsoptionen nicht zur Verfügung.</div>";
				}
			} elseif ($_GET['action'] == "image_convert") {
				if (extension_loaded('gd') && function_exists('gd_info')) {
					if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
						$gd = gd_info();
						echo "<h2>Bild &quot;" . sanitize_names($_GET['name']) . '&quot; verändern - Konvertieren</h2>
						<form action="' . $self . '&amp;action=post" method="post">
							<h3>Bild konvertieren</h3>
							<p>Füllen Sie das Formular aus um das Bild zu verändern</p>
							<input type="hidden" name="name" title="Name des Bildes" readonly="readonly" value="' . sanitize_names($_GET['name']) . '" />
							<label for="format">Ziel-Format</label>
							<select name="format" id="format" size="1" title="Ziel-Format">
								<option value="gif"';
								if (!isset($gd['GIF Read Support']) || $gd['GIF Read Support'] == false || $gd['GIF Create Support'] == false){
									echo " disabled=\"disabled\" ";
								}
								echo '>GIF</option>
								<option value="jpg"';
								if ((isset($gd['JPEG Support']) && $gd['JPEG Support'] == false) || ( isset($gd['JPG Support']) && $gd['JPG Support'] == false)){
									echo " disabled=\"disabled\" ";
								}
								echo '>JPG/JPEG</option>
								<option value="png"';
								if (isset($gd['PNG Support']) && $gd['PNG Support'] == false){
									echo " disabled=\"disabled\" ";
								}
								echo '>PNG</option>
								<option value="webp"';
								if (!isset($gd['WebP Support']) || $gd['WebP Support'] == false){
									echo " disabled=\"disabled\" ";
								}
								echo '>WebP</option>
							</select>
							<button type="submit" name="image_convert" title="Bild konvertieren">
								<i class="icon image_go"></i>
								Anwenden
							</button>
						</form>';
					} else {
						echo '<div class="message error">Die Datei "' . sanitize_names($_GET['name']) . '" ist nicht (mehr) vorhanden.</div>';
					}
				} else {
					echo "<div class=\"message information\">Da auf ihrem Server die Funktions-Library GD Lib nicht installiert ist, steht ihnen diese Bildbearbeitungsoptionen nicht zur Verfügung.</div>";
				}
			} elseif ($_GET['action'] == "image_brightness") {
				if (function_exists("imagefilter")) {
					if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
						echo "<h2>Bild &quot;" . sanitize_names($_GET['name']) . '&quot; verändern - Helligkeit</h2>
						<div class="message information">Wenn Sie den selben Dateinamen wie den des Original-Bildes eingeben wird dieses ersetzt!</div>
						<form action="' . $self . '&amp;action=post" method="post">
							<h3>Bildeffekt anwenden</h3>
							<p>Füllen Sie das Formular aus um das Bild zu verändern</p>
							<input type="hidden" name="name" title="Name des Bildes" readonly="readonly" value="' . sanitize_names($_GET['name']) . '" />
							<label for="new_name" >Dateiname
								<span class="small">Name des Erhellten-Bildes</span>
							</label>
							<input type="text" id="new_name" name="new_name" title="Name des Bildes" value="bright_' . sanitize_names($_GET['name']) . '" />
							
							<label for="brightnesslvl" >Helligkeits-Level
								<span class="small">0 bis 255</span>
							</label>
							<input type="text" id="brightnesslvl" name="brightnesslvl" title="Level der Helligkeit" value="50" />
							
							<button type="submit" name="image_brightness" title="Bild verändern">
								<i class="icon image_go"></i>
								Anwenden
							</button>
							<input type="hidden" name="edit_image" value="image_brightness" />
						</form>';
					} else {
						echo '<div class="message error">Die Datei "' . sanitize_names($_GET['name']) . '" ist nicht (mehr) vorhanden.</div>';
					}
				}else {
					echo "<div class=\"message information\">Da auf ihrem Server die Funktion \"imagefilter\" der GD Lib nicht unterstützt wird, steht ihnen diese Bildbearbeitungsoptionen nicht zur Verfügung.</div>";
				}
			} elseif ($_GET['action'] == "image_contrast") {
				if (function_exists("imagefilter")) {
					if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
						echo "<h2>Bild &quot;" . sanitize_names($_GET['name']) . '&quot; verändern - Kontrast</h2>
						<div class="message information">Wenn Sie den selben Dateinamen wie den des Original-Bildes eingeben wird dieses ersetzt!</div>
						<form action="' . $self . '&amp;action=post" method="post">
							<h3>Bildeffekt anwenden</h3>
							<p>Füllen Sie das Formular aus um das Bild zu verändern</p>
							<input type="hidden" name="name" title="Name des Bildes" readonly="readonly" value="' .sanitize_names( $_GET['name']) . '" />
							<label for="new_name" >Dateiname
								<span class="small">Name des Veränderten-Bildes</span>
							</label>
							<input type="text" id="new_name" name="new_name" title="Name des Bildes" value="contrast_' . sanitize_names($_GET['name']) . '" />
							
							<label for="contrastlvl" >Kontrast-Level
								<span class="small"></span>
							</label>
							<input type="text" id="contrastlvl" name="contrastlvl" title="Level des Kontrasts" value="20" />
							
							<button type="submit" name="image_contrast" title="Bild verändern">
								<i class="icon image_go"></i>
								Anwenden
							</button>
							<input type="hidden" name="edit_image" value="image_contrast" />
						</form>';
					} else {
						echo '<div class="message error">Die Datei "' . sanitize_names($_GET['name']) . '" ist nicht (mehr) vorhanden.</div>';
					}
				} else {
					echo "<div class=\"message information\">Da auf ihrem Server die Funktion \"imagefilter\" der GD Lib nicht unterstützt wird, steht ihnen diese Bildbearbeitungsoptionen nicht zur Verfügung.</div>";
				}
			} elseif ($_GET['action'] == "image_pixel") {
				if (function_exists("imagefilter")) {
					if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
						echo "<h2>Bild &quot;" . sanitize_names($_GET['name']) . '&quot; verändern - Verpixeln</h2>
						<div class="message information">Wenn Sie den selben Dateinamen wie den des Original-Bildes eingeben wird dieses ersetzt!</div>
						<form action="' . $self . '&amp;action=post" method="post">
							<h3>Bildeffekt anwenden</h3>
							<p>Füllen Sie das Formular aus um das Bild zu verändern</p>
							<input type="hidden" name="name" title="Name des Bildes" readonly="readonly" value="' . sanitize_names($_GET['name']) . '" />
							<label for="new_name" >Dateiname
								<span class="small">Name des Veränderten-Bildes</span>
							</label>
							<input type="text" id="new_name" name="new_name" title="Name des Bildes" value="pixeled_' . sanitize_names($_GET['name']) . '" />
							
							<label for="pixelsize" >Pixelblöcke
								<span class="small">Größe der Pixelblöcke (in px)</span>
							</label>
							<input type="text" id="pixelsize" name="pixelsize" title="Größe der Pixelblöcke in px" value="5" />
							
							<label for="pixelmode" >Erweiterter Pixeleffekt
								<span class="small">(empfohlen)</span>
							</label>
							<input type="checkbox" id="pixelmode" checked="checked" title="Erweiterten Pixeleffekt verwenden" name="pixelmode" />
							
							<button type="submit" name="image_pixel" title="Bild verändern">
								<i class="icon image_go"></i>
								Anwenden
							</button>
							<input type="hidden" name="edit_image" value="image_pixel" />
						</form>';
					} else {
						echo '<div class="message error">Die Datei "' . sanitize_names($_GET['name']) . '" ist nicht (mehr) vorhanden.</div>';
					}
				} else {
					echo "<div class=\"message information\">Da auf ihrem Server die Funktion \"imagefilter\" der GD Lib nicht unterstützt wird, steht ihnen diese Bildbearbeitungsoptionen nicht zur Verfügung.</div>";
				}
			} elseif ($_GET['action'] == "imagethumb") {
				if (file_exists(CURRENT_FOLDER . $_GET['name'])) {
					echo "<h2>Miniaturansicht von &quot;" . sanitize_names($_GET['name']) . '&quot; erstellen / Bild verkleinern</h2>
					<div class="message information">
						Wenn Sie den selben Dateinamen wie den des Original-Bildes eingeben wird dieses ersetzt!<br /><br />
						Geben Sie bei Zielgröße die gewünschte Zielgröße des Zielbereiches ein. Etwa 100 für 100px. Bei Zielbereich wählen Sie anschließend ob das Bild 100 Pixel breit oder hoch sein soll.
						Die andere Seite wird errechnet, damit das Seitenverhältnis gleich bleibt.<br />
						Wenn Sie Prozent wählen werden beide Seiten des Bildes proportional auf den angegebene Prozentwert der Ursprungsgröße verkleinert (etwa 50 = 50%).
					</div>
					<form action="' . $self . '&amp;action=post" method="post">
						<h3>Thumbnail erzeugen</h3>
						<p>Füllen Sie das Formular aus um das Bild zu verkleinern</p>
						<input type="hidden" name="name" title="Name des Bildes" readonly="readonly" value="' . sanitize_names($_GET['name']) . '" />
						<label for="new_name" >Dateiname
							<span class="small">Name des Verkleinerten-Bildes</span>
						</label>
						<input type="text" name="new_name" id="new_name" title="Name des verkleinerten Bildes" value="thumb_' . sanitize_names($_GET['name']) . '" />
						
						<label for="new_size" >Zielgröße
							<span class="small">etwa 90</span>
						</label>
						<input type="text" id="new_size" name="new_size" title="Pixel oder % des neuen Bildes" value="90" />
						
						<label for="area" >Zielbereich
							<span class="small">Höhe, Breite oder Verhältnis</span>
						</label>
						<select name="area" id="area" title="Zielbereich">
							<option value="0">Höhe</option>
							<option value="1">Breite</option>
							<option value="2">Prozent</option>
						</select>
						
						<button type="submit" name="imagethumbnail" title="Bild verkleinern">
							<i class="icon image_go"></i>
							Verkleinern
						</button>
						<input type="hidden" name="edit_image" value="imagethumbnail" />
					</form>';
				} else {
					echo '<div class="message error">Die Datei "' . sanitize_names($_GET['name']) . '" ist nicht (mehr) vorhanden.</div>';
				}
			} elseif ($_GET['action'] == "search") {
				echo '<h2>Dateien und Ordner suchen</h2>";
				<div class="message information">Bei der Suche werden alle Unterordner des aktuellen Verzeichnisses rekursiv durchlaufen. Je nach Anzahl der Dateien und Unterordner kann die Suche eine Weile dauern.</div>
				<form action="' . $self . '&amp;action=post" method="post">
				<h3>Dateien und Ordner suchen</h3>
				<p>Geben Sie an, wonach gesucht werden soll.</p>
				<label for="searchterm" >Suchbegriff</label>
				<input type="text" name="searchterm" id="searchterm" title="Suchbegriff" value="" />
				
				<label for="resultcount" >Ergebnisse
					<span class="small">Nach wie vielen Ergebnissen abbrechen</span>
				</label>
				<input type="text" id="resultcount" name="resultcount" title="" value="50" />
				
				<label for="searchtype" >Suchtyp
					<span class="small">Dateien oder Ordner finden?</span>
				</label>
				<select name="searchtype" id="searchtype" title="Suchtyp">
					<option value="0">Dateien und Ordner</option>
					<option value="1">Nur Dateien</option>
					<option value="2">Nur Ordner</option>
				</select>
				
				<label for="filecontents">Dateiinhalt durchsuchen
					<span class="small">Suchterm in Text-Dateien suchen</span>
				</label>
				<input type="checkbox" name="filecontents" id="filecontents" title="Suchterm in Text-Dateien suchen"  />
				
				<button type="submit" name="search" title="Suchen" onclick="javascript:go();">
					<i class="icon magnifier" id="loadimg"></i>
					Suchen
				</button>
				</form>';
			} elseif ($_GET['action'] == "folderlist") {
				echo "<h2>Ordner- und Dateiliste erstellen</h2>";
				function crawlfolder($folder) {
					if (is_dir($folder)) {
						$verzeichnis = openDir($folder);
						$return = "";
						if (strrchr($folder, "/") == false) {
							$return .= "<li title=\"Ordner ".sanitize_names($folder)."\"><b>".sanitize_names($folder)."</b></li>\n";
						} else {
							$return .= "<li title=\"Ordner ".sanitize_names($folder)."\"><b>" . sanitize_names(substr(strrchr($folder, "/"), 1)) . "</b></li>\n";
						}
						$return .= "<ul>\n";
						while ($file = readDir($verzeichnis)) {
							// Höhere Verzeichnisse nicht anzeigen!
							if ($file != "." && $file != "..") {
								if (is_dir($folder . "/" . $file)) {
									$return .= crawlfolder($folder . "/" . $file);
								} else {
									// Link erstellen
									$return .= "<li title=\"Datei ".sanitize_names($file)."\">".sanitize_names($file)."</li>\n";
								}
							}
						}
						$return .= "</ul>\n";
						closeDir($verzeichnis);
					}
					return $return;
				}
				if (isset ($_GET['sure'])) {
					echo "<ul>" . crawlfolder(substr(CURRENT_FOLDER, 2) . $_GET['name']) . "</ul>";
					echo '<p class="buttons"><a href="' . $self . '&amp;action=edit_folder&amp;name=' . rawurlencode2($_GET['name']) . '" title="Zurück" class="floatleft" ><i class="icon arrow_left" title="Zurück"></i> Zurück</a></p>';
				} else {
					echo '<div class="message warning">Das Generieren der Ordnerliste kann je nach Menge der enthaltenen Ordner und Dateien eine Weile dauern.</div>
					<br />
					<table align="center">
						<tr>
							<td colspan="2" style="text-align:center;">
							<br /><br />Möchten Sie eine Ordner- und Dateiliste vom Ordner "' . sanitize_names($_GET['name']) . '" erstellen?
							</td>
						</tr>
						<tr class="buttons">
							<td>
								<a href="' . $self . '&amp;action=folderlist&amp;name=' . rawurlencode2($_GET['name']) . '&amp;sure=true" class="positive">
									<i class="icon accept"></i> Ja
								</a>
							</td>
							<td>
								<a href="' . $ref . '" class="negative">
									<i class="icon cancel"></i> Nein
								</a>
							</td>
						</tr>
					</table>';
				}
			} elseif ($_GET['action'] == "settings") {
				echo '<h2>Einstellungen</h2>
				<p class="buttons textcenter">
					<a href="'.$self.'&amp;action=settings" style="display: inline;">
						<i class="icon wrench"></i> Allgemeine Einstellungen
					</a> 
					<a href="'.$self.'&amp;action=settings&amp;part=visual" style="display: inline;">
						<i class="icon editor"></i> Ansichts-Einstellungen
					</a>
				</p>
				<form action="' . $self . '&amp;action=post" method="post">
				<h3>Einstellungen ändern</h3>';
				if (isset($_GET['part']) && $_GET['part'] == "visual"){
					echo '<p>Passen Sie das Aussehen Ihren Wünschen an</p>
					<label for="fontsize">Schriftgröße
						<span class="small">in Prozent (30-200)</span>
					</label>
					<input type="text" name="fontsize" id="fontsize" title="Ändern Sie die Größe der Schrift" value="' . $fontsize . '" />
					
					<label for="picdistance">Abstand der Bilderbuttons
						<span class="small">in Pixeln (0-20)</span>
					</label>
					<input type="text" name="picdistance" id="picdistance" title="Wählen Sie aus, wie viel Abstand zwischen den Icons in der Kopfzeile sein soll" value="' . $picdistance . '" />
					
					<label for="drawBorders">Rahmen zeichnen
						<span class="small">Bereiche mit Rahmen abgrenzen</span>
					</label>
					<input type="checkbox" name="drawBorders" id="drawBorders" title="Interface auf der Grundfarbe aufbauen" ';
					if (isset($drawBorders) && $drawBorders == true) {
						echo " checked=\"checked\" ";
					}
					echo ' />
					
					<label for="useColors">Farben aktivieren
						<span class="small">Interface auf der Grundfarbe aufbauen</span>
					</label>
					<input type="checkbox" name="useColors" id="useColors" title="Interface auf der Grundfarbe aufbauen" ';
					if (isset($useColors) && $useColors == true) {
						echo " checked=\"checked\" ";
					}
					echo ' />
					
					<label for="lighter1">Hellere Farbe 1
						<span class="small">RGB-Hexfarbe</span>
					</label>
					<input type="text" name="lighter1" id="lighter1" title="Eine sehr helle RGB-Hexfarbe für Tabellenzeilen und Hervorhebungen" value="' . $colors[0] . '" />
					
					<label for="lighter2">Hellere Farbe 2
						<span class="small">RGB-Hexfarbe</span>
					</label>
					<input type="text" name="lighter2" id="lighter2" title="Eine helle RGB-Hexfarbe des Kopfes für konstrastrierende Tabellenzeilen" value="'. $colors[1]. '" />
					
					<label for="basecolor">Grundfarbe
						<span class="small">RGB-Hexfarbe</span>
					</label>
					<input type="text" name="basecolor" id="basecolor" title="RGB-Hexfarbe für Ränder und Links" value="' . $colors[2]. '" />
					
					<label for="darker">Dunkle Farbe
						<span class="small">RGB-Hexfarbe</span>
					</label>
					<input type="text" name="darker" id="darker" title="Eine dunkle RGB-Hexfarbe für Links" value="' . $colors[3]. '" />
					
					<label for="headColor">Header-Farbe
						<span class="small">RGB-Hexfarbe</span>
					</label>
					<input type="text" name="headColor" id="headColor" title="Eine RGB-Hexfarbe für den Kopf Bereich" value="' . $colors[4].'" />
					
					<label for="ffcount">Ordner-Count
						<span class="small">Position der "x Dateien" Anzeige</span>
					</label>
					<select name="ffcount" id="ffcount" title="Wählen Sie aus, wo die Anzeige \'x Dateien und x Ordner\' angezeigt werden soll">
						<option value="0" ';
						if ($ffcount == 0) {
							echo ' selected="selected"';
						}
						echo '>unten</option>
						<option value="1"';
						if ($ffcount == 1) {
							echo ' selected="selected"';
						}
						echo '>ganz oben</option>
						<option value="2"';
						if ($ffcount == 2) {
							echo ' selected="selected"';
						}
						echo '>oben</option>
					</select>
					
					<label for="ffcountpos">Ordner-Count Ausrichtung
						<span class="small">Rechts, Links, Zentriert</span>
					</label>
					<select name="ffcountpos" id="ffcountpos" title="Wählen Sie aus, wie die Anzeige \'x Dateien und x Ordner\' ausgreichtet werden soll">
						<option value="0" ';
						if ($ffcountpos == 0) {
						echo ' selected="selected"';
						}
						echo '>rechts</option>
						<option value="1"';
						if ($ffcountpos == 1) {
						echo ' selected="selected"';
						}
						echo '>links</option>
						<option value="2"';
						if ($ffcountpos == 2) {
						echo ' selected="selected"';
						}
						echo '>zentriert</option>
					</select>
					
					<button type="submit" name="savevisualsettings" title="Einstellungen speichern">
						<i class="icon disk"></i>
						Speichern
					</button>';
				}else{
					echo '<p>Passen Sie die Einstellungen Ihren Wünschen an</p>
					<label for="spritePath" >Sprite Bild
						<span class="small">URL des CSS-Sprites</span>
					</label>
					<input type="text" name="spritePath" id="spritePath" title="URL des CSS-Sprites" value="' . str_replace("\"", "&quot;", $IMG) . '" />
					
					<label for="timezone">Zeitzone
						<span class="small">Serverzeitzone festlegen (<a href="http://www.php.net/manual/de/timezones.php" target="_blank">Hilfe</a>)</span>
					</label>
					<input type="text" name="timezone" id="timezone" title="Geben Sie den PHP-kompatiblen Namen der Zeitzone an" value="' . str_replace("\"", "&quot;", $timezone) . '" />
					
					<label for="maxuploads">Max. Uploads
						<span class="small">Anzahl max. Dateiuploads</span>
					</label>
					<input type="text" name="maxuploads" id="maxuploads" title="Maximale Anzahl gleichzeitiger Dateiuploads" value="' . $MAX_UPLOAD . '" />
					
					<label for="bannerblock">Banner-Block
						<span class="small">Werbebanner des Hosters blockieren</span>
					</label>
					<input type="checkbox" name="bannerblock" id="bannerblock" title="Banner-Block aktivieren" ';
					if ($BLOCK_ADS) {
						echo " checked=\"checked\" ";
					}
					echo ' />
					
					<label for="pixlrblock">Pixlr blockieren
						<span class="small">Bild-Editor Pixlr nicht verwenden</span>
					</label>
					<input type="checkbox" name="pixlrblock" id="pixlrblock" title="Pixlr nicht verwenden" ';
					if ($BLOCK_PIXLR) {
						echo " checked=\"checked\" ";
					}
					echo ' />
					
					<label for="autoversioncheck">Versionscheck
						<span class="small">Automatische Prüfung auf Updates</span>
					</label>
					<input type="checkbox" name="autoversioncheck" id="autoversioncheck" title="Automatische Versionsprüfung aktivieren" ';
					if ($AUTO_VERSION_CHECK) {
						echo " checked=\"checked\" ";
					}
					echo ' />
					
					<label for="googleapi">API-Key
						<span class="small">goo.gl API Key</span>
					</label>
					<input type="text" name="googleapi" id="googleapi" title="Key für die Nutzung des goo.gl API" value="' . str_replace("\"", "&quot;", $GOOGLE_API) . '" />
					
					<button type="submit" name="savesettings" title="Einstellungen speichern">
						<i class="icon disk"></i>
						Speichern
					</button>';
				}
				echo '</form>';
			} elseif ($_GET['action'] == "logout") {
				if (!$logedout) {
					echo '<div class="message error" title="Ein Fehler ist aufgetreten">Sie konnten nicht ausgeloggt werden. Evtl. ist die Session bereits verfallen.</div>';
				}
			} elseif ($_GET['action'] == "post") {
				//Hierher gehts, falls die Aktion per Post übergeben wurde.
				if (isset ($_POST['savesettings']) || isset ($_POST['savevisualsettings'])) {
					echo "<h2>Einstellungen speichern</h2>";
					$handler = fOpen(CONFIG_FILE, "w+");
					if ($handler !== false) {
						// Dateiinhalt in die Datei schreiben
						fWrite($handler, "<?php\n// Dies ist die Konfigurationsdatei von phpFinder. Ändern Sie nichts manuell an dieser Datei!\n");
						fWrite($handler, '$config_file_version = "' . $VERSION . "\";\n");
						fWrite($handler, '$IMG = "' . (isset($_POST['spritePath']) ? str_replace("\"", "\\\"", $_POST['spritePath']) : $IMG) . "\";\n");
						fWrite($handler, '$fontsize = "' . (isset($_POST['savevisualsettings']) ? ((isset($_POST['fontsize']) && intval($_POST['fontsize']) < 200 && intval($_POST['fontsize']) > 30) ? intval($_POST['fontsize']) : 90) : $fontsize) . "\";\n");
						fWrite($handler, '$picdistance = "' . (isset($_POST['savevisualsettings']) ? (isset($_POST['picdistance']) && intval($_POST['picdistance']) < 20 && intval($_POST['picdistance']) > 0 ? intval($_POST['picdistance']) : 5) : $picdistance ) . "\";\n");
						fWrite($handler, '$timezone = "' . (isset($_POST['timezone']) ? str_replace("\"", "\\\"", $_POST['timezone']) : $timezone) . "\";\n");
						fWrite($handler, '$MAX_UPLOAD = ' . (isset($_POST['maxuploads']) ? intval($_POST['maxuploads']) : $MAX_UPLOAD) . ";\n");
						fWrite($handler, '$BLOCK_ADS = ' . status((isset($_POST['savesettings']) ? isset($_POST['bannerblock']) : $BLOCK_ADS), 2). ";\n");
						fWrite($handler, '$BLOCK_PIXLR = ' . status((isset($_POST['savesettings']) ? isset($_POST['pixlrblock']) : $BLOCK_PIXLR), 2). ";\n");
						fWrite($handler, '$AUTO_VERSION_CHECK = ' . status((isset($_POST['savesettings']) ? isset($_POST['autoversioncheck']) : $AUTO_VERSION_CHECK), 2). ";\n");
						fWrite($handler, '$ffcount = "' . (isset($_POST['ffcount']) ? intval($_POST['ffcount']) : $ffcount) . "\";\n");
						fWrite($handler, '$ffcountpos = "' . (isset($_POST['ffcountpos']) ? intval($_POST['ffcountpos']) : $ffcountpos) . "\";\n");
						fWrite($handler, '$drawBorders = ' . (status((isset($_POST['savevisualsettings']) ? isset($_POST['drawBorders']) : $drawBorders), 2)). ";\n");
						fWrite($handler, '$useColors = ' . (status((isset($_POST['savevisualsettings']) ? isset($_POST['useColors']) : $useColors), 2)). ";\n");
						fWrite($handler, '$colors = array("' . (isset($_POST['lighter1']) ? $_POST['lighter1'] : $colors[0]) . '", "'
						. (isset($_POST['lighter2']) ? $_POST['lighter2'] : $colors[1]) . '", "'
						. (isset($_POST['basecolor']) ? $_POST['basecolor'] : $colors[2]) . '", "'
						. (isset($_POST['darker']) ? $_POST['darker'] : $colors[3]) . '", "'
						. (isset($_POST['headColor']) ? $_POST['headColor'] : $colors[4]) . "\");\n");
						fWrite($handler, '$GOOGLE_API = "' . (isset($_POST['googleapi']) ? str_replace("\"", "\\\"", $_POST['googleapi']) : $GOOGLE_API) . "\";\n");
						fWrite($handler, '?');
						fWrite($handler, '>');
						fClose($handler);
						// Datei schließen
						echo "<div class=\"message success\">Die Einstellungen wurden erfolgreich gespeichert. Laden Sie eine neue Seite, um die Änderungen zu sehen!</div>";
					}
					else {
						echo "<div class=\"message error\">Fehler beim Öffnen bzw. Erstellen der Datei. Eventuell sind nicht die benötigten CHMOD Rechte gesetzt.</div>";
					}
					echo '<p class="buttons"><a href="' . $ref . '" class="floatleft" ><i class="icon arrow_left"></i> Zurück zum Einstellungs-Dialog</a></p>';
				} elseif (isset ($_POST['FolderCopy'])) {
					function smartCopy($source, $dest, $options = array('folderPermission' => 0755, 'filePermission' => 0755)) {
						$result = false;
						if (is_file($source)) {
							if ($dest[strlen($dest) - 1] == '/') {
								if (!file_exists($dest)) {
									cmfcDirectory :: makeAll($dest, $options['folderPermission'], true);
								}
								$__dest = $dest . "/" . basename($source);
							} else {
								$__dest = $dest;
							}
							$result = copy($source, $__dest);
							chmod($__dest, $options['filePermission']);
						} elseif (is_dir($source)) {
							if ($dest[strlen($dest) - 1] == '/') {
								if ($source[strlen($source) - 1] == '/') {
									//Copy only contents
								} else {
									//Change parent itself and its contents
									$dest = $dest . basename($source);
									mkdir($dest);
									chmod($dest, $options['filePermission']);
								}
							} else {
								if ($source[strlen($source) - 1] == '/') {
									//Copy parent directory with new name and all its content
									mkdir($dest, $options['folderPermission']);
									chmod($dest, $options['filePermission']);
								} else {
									//Copy parent directory with new name and all its content
									mkdir($dest, $options['folderPermission']);
									chmod($dest, $options['filePermission']);
								}
							}
							$dirHandle = opendir($source);
							while ($file = readdir($dirHandle)) {
								if ($file != "." && $file != "..") {
									if (!is_dir($dirsource . "/" . $file)) {
										$__dest = $dest . "/" . $file;
									} else {
										$__dest = $dest . "/" . $file;
									}
									//echo "$source/$file ||| $__dest<br />";
									$result = smartCopy($source . "/" . $file, $__dest, $options);
								}
							}
							closedir($dirHandle);
						} else {
							$result = false;
						}
						return $result;
					}
					$abrechen = false;
					echo "<h2>Ordner \"" . sanitize_names($_POST['old']) . "\" kopieren</h2>";
					if (file_exists(CURRENT_FOLDER . $_POST['new'])) {
						//Wenn der Ordner bereits vorhanden ist
						if ($_POST['ifexists'] == 0) {
							echo '<div class="message error">Der Ordner "' . sanitize_names($_POST['old']) . '" kann nicht nach "' . sanitize_names($_POST['new']) . '" kopiert werden, da ein Ordner mit diesem Namen bereits existiert.</div>';
							echo '<p class="buttons"><a href="' . $ref . '" ><i class="icon arrow_left" class="floatleft"></i> Zurück</a></p>';
							//Wenn abgebrochen werden soll, abbrechen
							$abrechen = true;
						} elseif ($_POST['ifexists'] == 1) {
							@ delete($_POST['new']);
						}
					}
					if (!$abrechen) {
						if (@ smartCopy(CURRENT_FOLDER . $_POST['old'], CURRENT_FOLDER . $_POST['new'])) {
							echo '<div class="message success">Der Ordner "' . sanitize_names($_POST['old']) . '" wurde erfolgreich nach "' . sanitize_names($_POST['new']) . '" kopiert.</div>';
						} else {
							echo '<div class="message error">Beim Kopieren des Ordners "' . sanitize_names($_POST['old']) . '" nach "' . sanitize_names($_POST['new']) . '" ist ein Fehler aufgetreten. Eventuell müssen Sie das neue Verzeichnis löschen.' . return_last_error() . '</div>';
						}
					}
				} elseif (isset ($_POST['ShortenURL'])) {
					echo "<h2>KurzURL für \"" . sanitize_names($_POST['file']) . "\" erstellen</h2>";
					/**
					 * Diese Funktion gibt den Quellcode/Inhalt der $url zurück
					 */
					function get_curl_string($url, $name, $alt_url) {
						$ch = curl_init($url);
						if ($ch !== false){
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($ch, CURLOPT_HEADER, 0);
							$return = curl_exec($ch);
							if (curl_exec($ch) === false) {
								return '<div class="message error"><b>' . $name . '</b>: cURL-Fehler: ' . curl_error($ch) . '<br /><a href="' . $alt_url . '" target="_blank">KurzURL manuell erstellen</a></div><br /><br />';
							} else {
								return '<div class="message success"><b>' . $name . '</b>: <a href="' . $return . '" target="_blank">' . $return . '</a></div><br /><br />';
							}
						}else{
							return '<div class="message error"><b>' . $name . '</b>: cURL-Fehler: ' . curl_error($ch) . '<br /><a href="' . $alt_url . '" target="_blank">KurzURL manuell erstellen</a></div><br /><br />';
						}
						curl_close($ch);
					}
					function get_fopen_string($url, $name, $alt_url) {
						$string = file_get_contents($url);
						if (substr($string, 0, 4) == "http") {
							return '<div class="message success"><b>' . $name . '</b>: <a href="' . $string . '" target="_blank">' . $string . '</a></div><br /><br />';
						} else {
							return '<div class="message error"><b>' . $name . '</b>: Ein Fehler ist aufgetreten.<br /><a href="' . $alt_url . '" target="_blank">KurzURL manuell erstellen</a></div><br /><br />';
						}
					}
					function make_googl_url($longUrl, $apiKey, $how){
						$url = 'https://www.googleapis.com/urlshortener/v1/url';
						$data = array('longUrl' => $longUrl);
						if ($apiKey != "") {
							$data['key'] = $apiKey;
						}
						if ($how == "fOpen") {
							// use key 'http' even if you send the request to https://...
							$options = array(
							'http' => array(
							'header'  => "Content-type: application/json\r\n",
							'method'  => 'POST',
							'content' => http_build_query($data),
							),
							);
							$context  = stream_context_create($options);
							$result = file_get_contents($url, false, $context);
						} else {
							$ch = curl_init($url);
							curl_setopt($ch, CURLOPT_POST, 1);
							curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
							curl_setopt($ch, CURLOPT_HEADER, 0);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$result = curl_exec($ch);
							curl_close($ch);
						}
						$resultData = json_decode($result, true);
						if ($resultData['kind'] == "urlshortener#url") {
							return '<div class="message success"><b>goo.gl</b>: <a href="' . $resultData['id'] . '" target="_blank">' . $resultData['id'] . '</a></div><br /><br />';
						} elseif(isset($resultData['error']['errors']['message'])) {
							return '<div class="message error"><b>goo.gl</b>: Ein Fehler ist aufgetreten: '.$resultData['error']['errors']['message'].'</div><br /><br />';
						} else {
							return '<div class="message error"><b>goo.gl</b>: Ein Fehler ist aufgetreten.</div><br /><br />';
						}
					}
					
					if (!isset ($_POST['googl']) && !isset ($_POST['isgd']) && !isset ($_POST['tinyurl'])) {
						echo "<div class=\"message error\">Es wurde kein KurzURL Dienst ausgewählt!</div>";
					} else {
						if (@ ini_get("allow_url_fopen") == 1) {
							//Wenn allow_url_fopen = true ist
							if (isset ($_POST['tinyurl'])){
								echo get_fopen_string("http://tinyurl.com/api-create.php?url=" . urlencode($_POST['file']), "TinyURL.com", "http://tinyurl.com/create.php?url=" . $_POST['file']);
							}
							if (isset ($_POST['isgd'])){
								echo get_fopen_string("http://is.gd/api.php?longurl=" . urlencode($_POST['file']), "is.gd", "http://is.gd/create.php?longurl=" . $_POST['file']);
							}
							if (isset ($_POST['googl'])){
								echo make_googl_url($_POST['file'], $GOOGLE_API, "fopen");
							}
						} elseif (function_exists("curl_init")) {
							//Wenn curl vorhanden ist
							if (isset ($_POST['tinyurl'])) {
								echo get_curl_string("http://tinyurl.com/api-create.php?url=" . urlencode($_POST['file']), "TinyURL.com", "http://tinyurl.com/create.php?url=" . $_POST['file']);
							}
							if (isset ($_POST['isgd'])) {
								echo get_curl_string("http://is.gd/api.php?longurl=" . urlencode($_POST['file']), "is.gd", "http://is.gd/create.php?longurl=" . $_POST['file']);
							}
							if (isset ($_POST['googl'])){
								echo make_googl_url($_POST['file'], $GOOGLE_API, "curl");
							}
						}else {
							//Wenn beides nicht geht wird eine Liste zum manuellen erstellen angezeigt
							echo "<div class=\"message warning\">Da das Aufrufen von Dateien auf anderen Servern über PHP nicht erlaubt ist und dieser Server nicht über cURL verfügt, ist es leider nicht möglich KurzURL direkt zu erstellen.</div>";
						}
					}
				}else if(isset($_POST['search'])){
					echo "<h2>Dateien und Ordner suchen</h2>";
					function searchFolder($folder, $searchterm, $searchtype, $resultcount) {
						if (is_dir($folder)) {
							$verzeichnis = openDir($folder);
							$return = array();
							while ($file = readDir($verzeichnis)) {
								if ($resultcount <= 0){
									break;
								}
								if ($file != "." && $file != ".."){
									$isFile = is_file($folder . "/" . $file);
									$isFolder = is_dir($folder . "/" . $file);
									$found = false; // init as false
									if (stripos($file, $searchterm) !== false){
										// File name contains the search term
										if ($searchtype == 0 || ($searchtype == 1 && $isFile) || ($searchtype == 2 && $isFolder)){
										$found = true;
										}
									} elseif ($isFolder) {
										$return = array_merge($return, searchFolder($folder. "/" . $file, $searchterm, $searchtype, $resultcount));
									} elseif($isFile && isset($_POST['filecontents'])) {
										$handle = fopen($folder . "/" . $file, 'r');
										while (($buffer = fgets($handle)) !== false) {
											if (strpos($buffer, $searchterm) !== false) {
												$found = true;
												break; // Once you find the string, you should break out the loop.
											}
										}
										fclose($handle);
									}
									if ($found){
										$return[] = array($file, $folder, $isFile);
										$resultcount--;
									}
								}
							}
							closeDir($verzeichnis);
						}
						return $return;
					}
					if (strlen($_POST['searchterm']) > 0){
						$messungStart = strtok(microtime(), " ") + strtok(" ");
						$searchResult = searchFolder(substr(CURRENT_FOLDER, 0, -1), $_POST['searchterm'], intval($_POST['searchtype']), intval($_POST['resultcount']));
						$messungEnde = strtok(microtime(), " ") + strtok(" ");
						echo "<ul>";
						foreach ($searchResult as &$result) {
							echo "<li>";
							if ($result[2]) {
								echo "<i class=\"icon page_white\"></i> ";
							} else {
								echo "<i class=\"icon folder\"></i> ";
							}
							echo substr($result[1], 2)."/<a href=\"$self_raw?dir=".rawurlencode2($result[1])."&amp;action=";
							if ($result[2]) {
								echo "file_edit";
							} else {
								echo "edit_folder";
							}
							echo "&amp;name=".rawurlencode2($result[0])."\">".$result[0]."</a></li>";
						}
						echo "</ul>";
						echo "<p>Treffer insgesamt: ".count($searchResult)." (Suchdauer: ". number_format($messungEnde - $messungStart, 6) ." Sekunden)</p>";
					} else {
						echo '<div class="message error">Bitte geben Sie einen Suchstring ein.</div>';
					}
					echo '<p class="buttons"><a href="' . $self . '&amp;action=search" title="Zurück" class="floatleft" ><i class="icon arrow_left" title="Zurück"></i> Zurück</a></p>';
				}elseif (isset ($_POST['MailSend'])) {
					echo "<h2>Datei &quot;" . sanitize_names($_POST['file']) . "&quot; versenden</h2>";
					//Erstmal testen ob die Datei noch vorhanden ist
					if (file_exists(CURRENT_FOLDER . $_POST['file'])) {
						//Prüfen ob Mime-Type Erkennung möglich ist
						if (function_exists("mime_content_type")) {
							if ($_POST["tomail"] == "" || $_POST["frommail"] == "" || $_POST["toname"] == "" || $_POST["fromname"] == "") {
								echo '<div class="message error">Es wurden nicht alle erforderlichen Felder ausgefüllt.</div><br />';
							} else {
								if (substr_count($_POST["tomail"], '\n') > 0 || substr_count($_POST["frommail"], '\n') > 0 || substr_count($_POST["fromname"], '\n') > 0 || substr_count($_POST["toname"], '\n') > 0 || substr_count($_POST["subject"], '\n') > 0) {
									echo '<div class="message error">Es wurden unsichere Eingabe in den einem oder mehreren gefunden. Das verwenden von Zeilenunbrüchen in diesen Feldern ist nicht gestattet.</div><br />';
								} else {
									if (!check_email_address($_POST["tomail"]) || !check_email_address($_POST["frommail"])) {
										echo '<div class="message error">Eine der E-Mail-Adressen ist nicht korrekt. Es darf maximal eine E-Mail-Adresse in jedes Feld.</div><br />';
									} else {
										$dateiname = substr(CURRENT_FOLDER, 2) . $_POST['file'];
										$id = md5(uniqid(time()));
										$dateiinhalt = @ fread(fopen($dateiname, "r"), filesize($dateiname));
										// Absender Name und E-Mail Adresse
										$kopf = "From: " . $_POST["fromname"] . " <" . $_POST["frommail"] . ">\n";
										$kopf .= "MIME-Version: 1.0\n";
										$kopf .= "Content-Type: multipart/mixed; boundary=$id\n\n";
										$kopf .= "This is a multi-part message in MIME format\n";
										$kopf .= "--$id\n";
										$kopf .= "Content-Type: text/plain\n";
										$kopf .= "Content-Transfer-Encoding: 8bit\n\n";
										$kopf .= "Hallo " . $_POST["toname"] . ",\n\n" . $_POST["fromname"] . " sendet ihnen hiermit die Datei \"" . $_POST['file'] . "\"";
										if ($_POST["message"] != "") {
											$kopf .= " mit folgender Nachricht:\n------------------------\n";
											$kopf .= "\n" . @ wordwrap($_POST["message"]) . "\n\n";
										} else {
											$kopf .= ".\n\n";
										}
										$kopf .= "------------------------\nGesendet mit phpFinder von " . $_SERVER['SERVER_NAME'];
										$kopf .= "\n(http://wfm.sebastian-fuss.de)";
										$kopf .= "\n--$id";
										$kopf .= "\nContent-Type: " . @ mime_content_type($dateiname) . "; name=" . $_POST['file'] . "\n";
										$kopf .= "Content-Transfer-Encoding: base64\n";
										$kopf .= "Content-Disposition: attachment; filename=" . $_POST['file'] . "\n\n";
										$kopf .= @ chunk_split(@ base64_encode($dateiinhalt));
										$kopf .= "\n--$id--";
										if (@ mail($_POST["tomail"], $_POST["subject"], "", $kopf)) {
											echo '<div class="message success">Die E-Mail wurde erfolgreich an ' . $_POST["tomail"] . ' versendet.</div><br />';
										} else {
											echo '<div class="message error">Beim Versenden der E-Mail ist ein Fehler aufgetreten.' . return_last_error() . '</div><br />';
										}
									}
								}
							}
						}
						else {
							echo '<div class="message error">Auf ihrem Server ist die Funktion des Mime-Type erkennens nicht vorhanden / aktiviert. Aus Sicherheitsgründen ist das Versenden von Dateien als E-Mail-Anhang daher nicht möglich.</div><br />';
						}
					}
					else {
						echo '<div class="message warning">Die Datei "' . sanitize_names($_POST['file']) . '" ist nicht mehr vorhanden.</div>';
					}
					echo '<p class="buttons"><a href="' . $self . '&amp;action=file_edit&amp;name=' . rawurlencode2($_POST['file']) . '" title="Zurück" class="floatleft" ><i class="icon arrow_left" title="Zurück"></i> Zurück</a></p>';
				} elseif (isset ($_POST['FolderCreate'])) {
					//Falls statt eines Ordnernamens weitere Unterordner oder ein abschließender Slash
					// eingegeben wurde, wird dieser hier entfernt
					$_POST['name'] = clear_path($_POST['name'], 1);
					echo "<h2>Ordner &quot;" . sanitize_names($_POST['name']) . "&quot; erstellen</h2>";
					if (file_exists(CURRENT_FOLDER . $_POST['name'])) {
						echo '<div class="message warning">Der Ordner "' . sanitize_names($_POST['name']) . '" existiert bereits.</div>';
					} else {
						@ mkdir(CURRENT_FOLDER . $_POST['name']);
						if (file_exists(CURRENT_FOLDER . $_POST['name'])) {
							echo '<div class="message success">Der Ordner "' . sanitize_names($_POST['name']) . '" wurde erfolgreich erstellt.</div>';
							echo '<p class="buttons"><a href="' . $self . '&amp;action=edit_folder&amp;name=' . rawurlencode2($_POST['name']) . '" ><i class="icon folder_edit"></i> Ordner bearbeiten</a> <a href="' . $self_raw . '?dir=' . rawurlencode2(CURRENT_FOLDER . $_POST['name']) . '" ><i class="icon folder_explore"></i> Ordner öffnen</a></p>';
						} else {
							echo '<div class="message error">Der Ordner "' . sanitize_names($_POST['name']) . '" konnte nicht erstellt.' . return_last_error() . '</div>';
						}
					}
				} elseif(isset($_POST['edit_image'])){
					function process_image($bild, $request){
						if ($request['edit_image'] == "bnw") {
							imagetruecolortopalette($bild, true, 2);
							$ind = imagecolorclosest($bild, 255, 255, 255);
							imagecolorset($bild, $ind, 255, 255, 255);
							$ind_s = imagecolorclosest($bild, 0, 0, 0);
							imagecolorset($bild, $ind_s, 0, 0, 0);
						} elseif ($request['edit_image'] == "imagethumbnail") {
							$q_x = imagesx($bild);
							$q_y = imagesy($bild);
							//Alle nicht numerischen Zeichen rausschmeißen
							$new_size = preg_replace('/[^0-9]/', '', $request['new_size']);
							if ($request['area'] == 0) {
								//Breite
								$z_y = $new_size;
								$ratio = $q_y / $z_y;
								$z_x = round($q_x / $ratio);
							} elseif ($request['area'] == 1) {
								//Höhe
								$z_x = $new_size;
								$ratio = $q_x / $z_x;
								$z_y = round($q_y / $ratio);
							} elseif ($request['area'] == 2) {
								//Prozent
								$ratio = round(100 / $new_size);
								$z_y = round($q_y / $ratio);
								$z_x = round($q_x / $ratio);
							}
							$ziel = imagecreatetruecolor($z_x, $z_y);
							imagecopyresampled($ziel, $bild, 0, 0, 0, 0, $z_x, $z_y, $q_x, $q_y);
							return $ziel;
						} elseif($request['edit_image'] == "greyscale") {
							$x = imagesx($bild);
							$y = imagesy($bild);
							for ($i = 0; $i < $y; $i++) {
								for ($j = 0; $j < $x; $j++) {
									$pos = imagecolorat($bild, $j, $i);
									$f = imagecolorsforindex($bild, $pos);
									$gst = $f["red"] * 0.15 + $f["green"] * 0.5 + $f["blue"] * 0.35;
									$farbe = imagecolorresolve($bild, $gst, $gst, $gst);
									imagesetpixel($bild, $j, $i, $farbe);
								}
							}
						} elseif($request['edit_image'] == "negate") {
							imagefilter($bild, IMG_FILTER_NEGATE);
						} elseif($request['edit_image'] == "image_brightness") {
							$brightnesslvl = preg_replace('/[^0-9]/', '', $request['brightnesslvl']);
							if ($brightnesslvl == "") {
								$brightnesslvl = 20;
							}
							imagefilter($bild, IMG_FILTER_BRIGHTNESS, intval($brightnesslvl));
						} elseif($request['edit_image'] == "image_contrast") {
							$contrastlvl = preg_replace('/[^0-9]/', '', $request['contrastlvl']);
							if ($contrastlvl == "") {
								$contrastlvl = 20;
							}
							imagefilter($bild, IMG_FILTER_CONTRAST, intval($contrastlvl));
						} elseif($request['edit_image'] == "edgedetect") {
							imagefilter($bild, IMG_FILTER_EDGEDETECT);
						} elseif($request['edit_image'] == "emboss") {
							imagefilter($bild, IMG_FILTER_EMBOSS);
						} elseif($request['edit_image'] == "blur") {
							imagefilter($bild, IMG_FILTER_GAUSSIAN_BLUR);
						} elseif($request['edit_image'] == "image_pixel") {
							if (isset ($request['pixelmode'])) {
								$advanced = true;
							} else {
								$advanced = false;
							}
							$pixelsize = preg_replace('/[^0-9]/', '', $request['pixelsize']);
							if ($pixelsize == "") {
								$pixelsize = 10;
							}
							imagefilter($bild, IMG_FILTER_PIXELATE, intval($pixelsize), $advanced);
						}
						return $bild;
					}
					@ini_set('memory_limit', '128M');
					@ini_set("max_execution_time", "360");
					echo "<h2>Bild &quot;" . sanitize_names($_POST['name']) . "&quot; verändern</h2>";
					$file_info = pathinfo(CURRENT_FOLDER . $_POST['name']);
					$ext = $file_info['extension'];
					if (file_exists(CURRENT_FOLDER . $_POST['name'])){
						$mime_type = @ dateityp($ext, CURRENT_FOLDER . $_POST['name']);
						if (stripos($mime_type, "image") !== false) { //Ist es ein Bild?
							if ($_POST['new_name'] == $_POST['name']) {
							//Der alte stimmt mit dem neuen Dateinamen überein
								echo '<div class="message information">Das ursprüngliche Bild wird ersetzt.</div><br /><br />';
							}
							switch ($_POST['edit_image']) {
								case 'bnw':
									$whatChanged = "Schwarz-Weiß-";
									break;
								case 'imagethumbnail':
									$whatChanged = "Miniatur-";
									break;
								case 'greyscale':
									$whatChanged = "Graustufen-";
									break;
								case 'image_negate':
									$whatChanged = "Negativ-";
									break;
								case 'image_brightness':
									$whatChanged = "aufgehellte ";
									break;
								case 'image_contrast':
									$whatChanged = "kontrastreichere ";
									break;
								case 'image_edgedetect':
									$whatChanged = "nachgezeichnete ";
									break;
								case 'image_emboss':
									$whatChanged = "gravierte ";
									break;
								case 'image_blur':
									$whatChanged = "verschwommene ";
									break;
								case 'image_pixel':
									$whatChanged = "verpixelte ";
									break;
								default:
									$whatChanged = "";
									break;
							}
							$bildtyp_supported = false;
							$gd = gd_info();
							$newFile = CURRENT_FOLDER . $_POST['new_name'];
							if (((isset($gd['JPEG Support']) && $gd['JPEG Support'] == true) || (isset($gd['JPG Support']) && $gd['JPG Support'] == true)) && (stripos($mime_type, "jpg") !== false || stripos($mime_type, "jpeg") !== false)) {
								$bildtyp_supported = true;
								$bild = imagecreatefromjpeg( CURRENT_FOLDER . $_POST['name']);
								if (file_exists($newFile)) {
									@ unlink($newFile);
								}
								$bild = process_image($bild, $_POST);
								imagejpeg($bild, CURRENT_FOLDER . $_POST['new_name']);
								imagedestroy($bild);
							} elseif (isset($gd['PNG Support']) && $gd['PNG Support'] == true && stripos($mime_type, "png") !== false) {
								$bildtyp_supported = true;
								$bild = imagecreatefrompng(CURRENT_FOLDER . $_POST['name']);
								if (file_exists($newFile)) {
									@ unlink($newFile);
								}
								$bild = process_image($bild, $_POST);
								imagepng($bild, CURRENT_FOLDER . $_POST['new_name']);
								imagedestroy($bild);
							} elseif (isset($gd['GIF Read Support']) && $gd['GIF Read Support'] == true && isset($gd['GIF Create Support']) && $gd['GIF Create Support'] == true && stripos($mime_type, "gif") !== false) {
								$bildtyp_supported = true;
								$bild = imagecreatefromgif(CURRENT_FOLDER . $_POST['name']);
								if (file_exists($newFile)) {
									@ unlink($newFile);
								}
								$bild = process_image($bild, $_POST);
								imagegif($bild, CURRENT_FOLDER . $_POST['new_name']);
								imagedestroy($bild);
							} elseif (isset($gd['WebP Support']) && $gd['WebP Support'] == true && stripos($mime_type, "webp") !== false) {
								$bildtyp_supported = true;
								$bild = imagecreatefromwebp(CURRENT_FOLDER . $_POST['name']);
								if (file_exists($newFile)) {
									@ unlink($newFile);
								}
								$bild = process_image($bild, $_POST);
								imagewebp($bild, CURRENT_FOLDER . $_POST['new_name']);
								imagedestroy($bild);
							} else {
								$bildtyp_supported = false;
							}
							if ($bildtyp_supported) {
								if (file_exists($newFile) && filesize($newFile) > 0) {
									echo '<div class="message success">Das '.$whatChanged.'Bild von "' . sanitize_names($_POST['name']) . '" wurde erstellt.</div>';
									echo '<p class="buttons"><a href="' . $self . '&amp;action=file_edit&amp;name=' . rawurlencode2($_POST['new_name']) . '" class="floatleft" ><i class="icon image_edit"></i> Neues Bild bearbeiten</a> ';
								} else {
									echo '<div class="message error">Das '.$whatChanged.'Bild von "' . sanitize_names($_POST['name']) . '" konnte nicht erstellt werden. '. return_last_error() .'</div>
									<p class="buttons">';
								}
							} else {
								echo '<div class="message error">Das Bildformat ' . $mime_type . ' des Bildes "' . sanitize_names($_POST['name']) . '" wird nicht unterstützt.</div>
								<p class="buttons">';
							}
						} else {
							echo '<div class="message error">Bei der Datei "' . sanitize_names($_POST['name']) . '" handelt es sich nicht um ein unterstütztes Bildformat (' . $mime_type . ').</div>
							<p class="buttons">';
						}
						echo '<a href="' . $self . '&amp;action=file_edit&amp;name=' . rawurlencode2($_POST['name']) . '" title="Zurück" class="floatleft" ><i class="icon arrow_left" title="Zurück"></i> Zurück</a></p>';
					} else {
						echo "<div class=\"message error\">Die Datei ".sanitize_names($_POST['name'])." ist nicht mehr vorhanden.</div>";
					}
				} elseif(isset($_POST['image_convert'])){
					echo "<h2>Bild &quot;" . sanitize_names($_POST['name']) . "&quot; konvertieren</h2>";
					$file_info = pathinfo(CURRENT_FOLDER . $_POST['name']);
					$ext = $file_info['extension'];
					if (file_exists(CURRENT_FOLDER . $_POST['name'])){
						$mime_type = @ dateityp($ext, CURRENT_FOLDER . $_POST['name']);
						if (stripos($mime_type, "image") !== false) {
							//Ist es ein Bild?							
							$bildtyp_supported = false;
							$gd = gd_info();
							$jpg_support = (isset($gd['JPEG Support']) && $gd['JPEG Support'] == true) || (isset($gd['JPG Support']) && $gd['JPG Support'] == true);
							$gif_support = isset($gd['GIF Read Support']) && $gd['GIF Read Support'] == true && isset($gd['GIF Create Support']) && $gd['GIF Create Support'] == true;
							$newFile = $file_info['filename'];
							
							if ($jpg_support && (stripos($mime_type, "jpg") !== false || stripos($mime_type, "jpeg") !== false)) {
								$bildtyp_supported = true;
								$bild = imagecreatefromjpeg( CURRENT_FOLDER . $_POST['name']);
							} elseif (isset($gd['PNG Support']) && $gd['PNG Support'] == true && stripos($mime_type, "png") !== false) {
								$bildtyp_supported = true;
								$bild = imagecreatefrompng(CURRENT_FOLDER . $_POST['name']);
							} elseif ($gif_support && stripos($mime_type, "gif") !== false) {
								$bildtyp_supported = true;
								$bild = imagecreatefromgif(CURRENT_FOLDER . $_POST['name']);
							} elseif (isset($gd['WebP Support']) && $gd['WebP Support'] == true && stripos($mime_type, "webp") !== false) {
								$bildtyp_supported = true;
								$bild = imagecreatefromwebp(CURRENT_FOLDER . $_POST['name']);
							} else {
								$bildtyp_supported = false;
							}
							if ($bildtyp_supported) {
								if ($_POST['format'] == "jpg" && $jpg_support){
									$newFile = $newFile.".jpg";
									imagejpeg($bild, CURRENT_FOLDER.$newFile);
								}else if ($_POST['format'] == "gif" && $gif_support){
									$newFile = $newFile.".gif";
									imagegif($bild, CURRENT_FOLDER.$newFile);
								}else if ($_POST['format'] == "png" && isset($gd['PNG Support']) && $gd['PNG Support'] == true){
									$newFile = $newFile.".png";
									imagepng($bild, CURRENT_FOLDER.$newFile);
								}else if ($_POST['format'] == "webp" && isset($gd['WebP Support']) && $gd['WebP Support'] == true){
									$newFile = $newFile.".webp";
									imagewebp($bild, CURRENT_FOLDER.$newFile);
								}
								imagedestroy($bild);
								if (file_exists($newFile) && filesize($newFile) > 0) {
									echo '<div class="message success">Das Bild "' . sanitize_names($_POST['name']) . '" wurde erfolgreich konvertiert.</div>';
									echo '<p class="buttons"><a href="' . $self . '&amp;action=file_edit&amp;name=' . rawurlencode2($newFile) . '" ><i class="icon image_edit"></i> Neues Bild bearbeiten</a> ';
								}else{
									echo '<div class="message error">Das Bild "' . sanitize_names($_POST['name']) . '" konnte nicht konvertiert werden. '. return_last_error() .'</div>
									<p class="buttons">';
								}
							} else {
								echo '<div class="message error">Das Bildformat ' . $mime_type . ' des Bildes "' . sanitize_names($_POST['name']) . '" wird nicht unterstützt.</div>
								<p class="buttons">';
							}
						} else {
							echo '<div class="message error">Bei der Datei "' . sanitize_names($_POST['name']) . '" handelt es sich nicht um ein unterstütztes Bildformat (' . $mime_type . ').</div>
							<p class="buttons">';
						}
						echo '<a href="' . $self . '&amp;action=file_edit&amp;name=' . rawurlencode2($_POST['name']) . '" title="Zurück" class="floatleft" ><i class="icon arrow_left" title="Zurück"></i> Zurück</a></p>';
					} else {
						echo "<div class=\"message error\">Die Datei ".sanitize_names($_POST['name'])." ist nicht mehr vorhanden.</div>";
					}
				} elseif (isset ($_POST['FTPPush'])) {
					@ ini_set("max_execution_time", "3600");
					echo "<h2>Datei &quot;" . sanitize_names($_POST['file']) . "&quot; senden</h2>";
					$ftp_server = $_POST['server'];
					$benutzername = $_POST['ftpusername'];
					$passwort = $_POST['ftppassword'];
					// Die Verbindung herstellen
					$messungStart = strtok(microtime(), " ") + strtok(" ");
					$connection_id = @ ftp_connect($ftp_server, $_POST['port']);
					if (!$connection_id) {
						$login_result = @ ftp_login($connection_id, $benutzername, $passwort);
						if ((!$connection_id) || (!$login_result)) {
							echo "<div class=\"message error\"><b>FTP-Verbindung nicht hergestellt!</b><br />Verbindung mit FTP-Server als Benutzer \"$benutzername\" nicht möglich! Überpüfen Sie den Nutzername und das Passwort sowie die URL." . return_last_error() . "</div>";
						} else {
							//FTP Verbindung erfolgreich hergestellt
							$zieldatei = $_POST['folder'] . $_POST['file'];
							$lokale_datei = CURRENT_FOLDER . $_POST['file'];
							//Wenn der Passive Modus verwendet werden soll
							if (isset ($_POST['passiv'])) {
								ftp_pasv($connection_id, true);
							}
							// Hochladen der datei, je nachdem welcher Modus gewählt wurde
							if ($_POST['modus'] == 0) {
								$upload = @ ftp_put($connection_id, $zieldatei, $lokale_datei, FTP_ASCII);
							} else {
								$upload = @ ftp_put($connection_id, $zieldatei, $lokale_datei, FTP_BINARY);
							}
							$messungEnde = strtok(microtime(), " ") + strtok(" ");
							
							// Upload-Status überprüfen
							if (!$upload) {
								echo "<div class=\"message error\">Verbindung mit FTP Server wurde erfolgreich hergestellt, jedoch tratt beim Upload der Datei ein Fehler auf." . return_last_error() . "</div>";
							} else {
								echo "<div class=\"message success\">Die Datei \"" . sanitize_names($_POST['file']) . "\" wurde erfolgreich auf den FTP-Server " . sanitize_names($_POST['server']) . " übertragen (Dauer: " . number_format($messungEnde - $messungStart, 6) . "Sekunden)</div>";
							}
							ftp_quit($connection_id);
						}
					} else {
						echo "<div class=\"message error\"><b>FTP-Verbindung nicht hergestellt!</b><br />Verbindung mit FTP-Server nicht möglich! Überprüfen Sie die URL sowie den Port." . return_last_error() . "</div>";
					}
				} elseif (isset ($_POST['rename'])) {
					if (file_exists(CURRENT_FOLDER . $_POST['old_name'])) {
						//Mal prüfen, ob die Quelle überhaupt noch da ist
						$is_folder = false;
						if (is_dir(CURRENT_FOLDER . $_POST['old_name'])) {
							$is_folder = true;
						}
						if ($is_folder) {
							$file_old = CURRENT_FOLDER . $_POST['old_name'];
							// boeck
							$file_new = CURRENT_FOLDER . $_POST['name'];
							// boeck
							echo "<h2>Ordner &quot;".sanitize_names($_POST['old_name'])."&quot; umbenennen</h2>";
							$_POST['name'] = clear_path($_POST['name'], 1);
							//Eventuelle andere Unterordner im Namen entfernen
							if ($_POST['name'] == $_POST['old_name']){
								echo '<div class="message error">Der eingegebene Ordnername "' . sanitize_names($_POST['old_name']) . '" ist identisch zum aktuellen Ordnernamen.</div>';
							} elseif (file_exists(CURRENT_FOLDER . $_POST['name'])) {
								//Wenn eine Datei mit dem Zielnamen bereits vorhanden ist
								echo '<div class="message error">Der Ordner "' . sanitize_names($_POST['old_name']) . '" konnte kann nicht in "' . sanitize_names($_POST['name']) . '" umbenannt werden, da ein Ordner mit diesem Namen bereits existiert.</div>';
							} else {
								if (@ rename($file_old, $file_new)) {
									echo '<div class="message success">Der Ordner "' . sanitize_names($_POST['old_name']) . '" konnte erfolgreich in "' . sanitize_names($_POST['name']) . '" umbenannt werden.</div>';
								} else {
									echo '<div class="message error">Der Ordner "' . sanitize_names($_POST['old_name']) . '" konnte nicht in "' . sanitize_names($_POST['name']) . '" umbenannt werden.' . return_last_error() . '</div>';
								}
							}
						} else {
							echo "<h2>Datei &quot;" . sanitize_names($_POST['old_name']) . "&quot; umbenennen</h2>";
							$file_old = CURRENT_FOLDER . $_POST['old_name'];
							$file_new = CURRENT_FOLDER . $_POST['name'];
							if ($_POST['name'] == $_POST['old_name']){
								echo '<div class="message error">Der eingegebene Dateiname "' . sanitize_names($_POST['old_name']) . '" ist identisch zum aktuellen Dateinamen.</div>';
							} elseif (file_exists(CURRENT_FOLDER . $_POST['name'])) {
								echo '<div class="message error">Die Datei "' . sanitize_names($_POST['old_name']) . '" konnte kann nicht in "' . sanitize_names($_POST['name']) . '" umbenannt werden, da eine Datei mit diesem Namen bereits existiert.</div>';
							} else {
								if (@ rename($file_old, $file_new)) {
									echo '<div class="message success">Die Datei "' . sanitize_names($_POST['old_name']) . '" konnte erfolgreich in "' . sanitize_names($_POST['name']) . '" umbenannt werden.</div>';
								} else {
									echo '<div class="message error">Die Datei "' . sanitize_names($_POST['old_name']) . '" konnte nicht in "' . sanitize_names($_POST['name']) . '" umbenannt werden.' . return_last_error() . '</div>';
								}
							}
						}
					} else {
						echo '<div class="message error">Umbennen nicht möglich, da die Quelldatei / der Quellordner nicht existiert.</div>';
					}
				} elseif (isset ($_POST['rotate'])) {
					echo "<h2>Bild &quot;" . sanitize_names($_POST['name']) . "&quot; drehen</h2>";
					if (!function_exists("imageRotate")) {
					function imageRotate($img, $rotation, $nix) {
						$width = imagesx($img);
						$height = imagesy($img);
						switch ($rotation) {
							case 270 :
							case 90 :
								$newimg = @ imagecreatetruecolor($height, $width);
								break;
							case 180 :
								$newimg = @ imagecreatetruecolor($width, $height);
								break;
							case 0 :
							case 360 :
								return $img;
								break;
						}
						if ($newimg) {
							for ($i = 0; $i < $width; $i++) {
								for ($j = 0; $j < $height; $j++) {
									$reference = imagecolorat($img, $i, $j);
									switch ($rotation) {
										case 270 :
											if (!@ imagesetpixel($newimg, ($height - 1) - $j, $i, $reference)) {
												return false;
											}
											break;
										case 180 :
											if (!@ imagesetpixel($newimg, $width - $i, ($height - 1) - $j, $reference)) {
												return false;
											}
											break;
										case 90 :
											if (!@ imagesetpixel($newimg, $j, $width - $i, $reference)) {
												return false;
											}
											break;
									}
								}
							}
							return $newimg;
						}
						return false;
						}
					}
					if (file_exists(CURRENT_FOLDER . $_POST['name'])) {
						$grad = 0;
						switch ($_POST['grad']) {
							case 90 :
								$grad = 90;
							break;
								case 270 :
								$grad = 270;
								break;
							case 180 :
								$grad = 180;
								break;
						}
						if ($grad != 0) {
							$bild_typ = exif_imagetype(CURRENT_FOLDER . $_POST['name']);
							if ($bild_typ == IMAGETYPE_GIF) {
								$grafik = @ imagecreatefromgif(CURRENT_FOLDER . $_POST['name']);
								$RotierteGrafik = imageRotate($grafik, $grad, 0);
								imageGif($RotierteGrafik, CURRENT_FOLDER . $_POST['name']);
							} elseif ($bild_typ == IMAGETYPE_JPEG) {
								$grafik = @ imageCreateFromJpeg(CURRENT_FOLDER . $_POST['name']);
								$RotierteGrafik = imageRotate($grafik, $grad, 0);
								imageJpeg($RotierteGrafik, CURRENT_FOLDER . $_POST['name']);
							} elseif ($bild_typ == IMAGETYPE_PNG) {
								$grafik = @ imageCreateFromPng(CURRENT_FOLDER . $_POST['name']);
								$RotierteGrafik = imageRotate($grafik, $grad, 0);
								imagePng($RotierteGrafik, CURRENT_FOLDER . $_POST['name']);
							} else {
								echo '<div class="message error">Der Bildtyp "' . $bild_typ . '" wird nicht unterstützt.</div>';
							}
							if (return_last_error() == "") {
								echo '<div class="message success">Das Bild "' . sanitize_names($_POST['name']) . '" wurde erfolgreich gedreht.<br />Eventuell zeigt ihr Browser das Bild nicht sofort korrekt an. Leeren Sie in diesem Fall ihren Browsercache.</div>
								<p class="buttons"><a href="' . $self . '&amp;action=file_edit&amp;name=' . rawurlencode2($_POST['name']) . '" ><i class="icon image_go"></i> Weiter</a></p>';
							} else {
								echo '<div class="message error">Beim Drehen des Bildes "' . sanitize_names($_POST['name']) . '" ist ein Fehler aufgetreten.' . return_last_error() . '</div>';
							}
						} else {
							echo '<div class="message warning">Es wurde ein ungültiger Wert für die Gradanzahl übergeben.</div>';
						}
					} else {
						echo '<div class="message error">Das Bild ist nicht (mehr) vorhanden.</div>';
					}
				} elseif (isset ($_POST['FileLoad'])) {
					@ ini_set("max_input_time", "3500");
					@ ini_set("max_execution_time", "3600");
					echo "<h2>Datei(en) hochladen</h2>";
					$ziel = substr(substr(CURRENT_FOLDER, 0, - 1), 2);
					if ($ziel == "") {
						$ziel = ".";
					}
					function upload($x, $ziel, $self) {
						@ move_uploaded_file($_FILES['thefile']['tmp_name'][$x], $ziel . "/" . $_FILES['thefile']['name'][$x]);
						#CHMOD Rechte setzen, da bei einigen die Datei nicht bearbeitet werden konnte
						@ chmod($ziel . "/" . $_FILES['thefile']['name'][$x], 0777);
						if (file_exists($ziel . "/" . $_FILES['thefile']['name'][$x]) && $_FILES['thefile']['error'][$x] == 0) {
							echo "<div class=\"message success\">Die Datei \"<a title=\"Datei bearbeiten\" href=\"" . $self . "&amp;action=file_edit&amp;name=" . rawurlencode2($_FILES['thefile']['name'][$x]) . "\" >" . sanitize_names($_FILES['thefile']['name'][$x]) . "</a>\" wurde erfolgreich in den Ordner \"" . dir_name(substr(CURRENT_FOLDER, 2)) . "\" hochgeladen.</div>";
						} else {
							switch ($_FILES['thefile']['error'][$x]) {
								case 1 :
									$errmsg = "die/eine Datei zu groß ist.";
									break;
								case 2 :
									$errmsg = "die/eine Datei zu groß ist.";
									break;
								case 3 :
									$errmsg = "der Uploadprozess unterbrochen wurde. Die Datei wurde nur partiell auf den Server übertragen.";
									break;
								case 4 :
									$errmsg = "keine Datei ausgewählt wurde.";
									break;
								case 6 :
									$errmsg = "kein Temporäres Verzeichnis auf dem Server vorhanden ist.";
									break;
								case 7 :
									$errmsg = "die Datei nicht auf dem Server gespeichert werden konnte.";
									break;
								case 8 :
									$errmsg = "eine PHP Erweiterung den Upload unterbrochen hat.";
									break;
								default :
								$errmsg = "ein unbekannter Fehler aufgetreten ist.";
							}
							echo '<div class="message error">Die Datei "' . sanitize_names($_FILES['thefile']['name'][$x]) . '" konnte nicht in den Ordner "' . dir_name(substr(CURRENT_FOLDER, 2)) . '" hochgeladen werden, da ' . $errmsg . '</div>';
						}
					}
					$anzahl = count($_FILES['thefile']['name']) - 1;
					for ($x = 0; $x <= $anzahl; $x++) {
						echo "<h3>Datei " . ($x + 1) . "</h3>";
						if ($_FILES['thefile']['name'][$x] != "") {
							//Wenn eine Datei mit diesem Namen bereits existiert, ...
							if (file_exists($ziel . "/" . $_FILES['thefile']['name'][$x])) {
								//Wird Sie gelöscht, falls dies aktiviert wurde
								if (isset ($_POST['auto_replace'])) {
									chmod($ziel . "/" . $_FILES['thefile']['name'][$x], "0777");
									unlink($ziel . "/" . $_FILES['thefile']['name'][$x]);
									echo '<div class="message information">Es war eine Datei mit dem Namen "' . sanitize_names($_FILES['thefile']['name'][$x]) . '" vorhanden. Sie wurde ersetzt.</div><br />';
								} else {
									//andernfalls wird die neue Datei umbenannt
									echo '<div class="message warning">Da bereits eine Datei mit dem Namen "' . sanitize_names($_FILES['thefile']['name'][$x]) . '" in diesem Ordner existiert, ';
									$last_dot = strrpos($_FILES['thefile']['name'][$x], '.');
									//Der Datei einen anderen Dateinamen geben, indem man den Files-String ändert
									$_FILES['thefile']['name'][$x] = substr_replace($_FILES['thefile']['name'][$x], "#", $last_dot, 1);
									$zahl = 2;
									$_FILES['thefile']['name'][$x] = str_replace('#', '(' . $zahl . ').', $_FILES['thefile']['name'][$x]);
									//und nun so lange $zahl erhöhen, bis keine Datei mit dem namen mehr da ist
									while (file_exists($ziel . "/" . $_FILES['thefile']['name'][$x])) {
										$zahl = $zahl + 1;
										$_FILES['thefile']['name'][$x] = str_replace('(' . ($zahl - 1) . ')', '(' . $zahl . ')', $_FILES['thefile']['name'][$x]);
									}
									echo 'wird die neue Datei in "<a href="' . $self . '&amp;action=rename&amp;name=' . rawurlencode2($_FILES['thefile']['name'][$x]) . '" title="Klicken Sie hier, wenn Sie die Datei gleich umbennen wollen">' . sanitize_names($_FILES['thefile']['name'][$x]) . '</a>" umbenannt.</div><br />';
								}
							}
							echo upload($x, $ziel, $self) . "\n";
							//Datei hochladen
						} else {
							echo "\n<div class=\"message warning\">Es wurde keine Datei ausgewählt.</div>";
						}
					}
				} elseif (isset ($_POST['FileCreate'])) {
					echo "<h2>Datei erstellen</h2>";
					if (isset ($_POST['no_ext'])) {
						switch ($_POST['wizard']) {
							case 1 :
							case 2 :
							case 3 :
								$ext = "demo.php";
								break;
							case 4 :
							case 5 :
								$ext = "demo.html";
								break;
							default :
								$ext = "demo.txt";
						}
						$dateiname = has_ext($_POST['file'], $ext);
						$dateiname = $dateiname[0];
					} else {
						$dateiname = $_POST['file'];
					}
					// Prüfen, ob die Datei bereits vorhanden ist
					if (file_exists(CURRENT_FOLDER . $dateiname)) {
						echo '<div class="message warning">Die Datei "' . sanitize_names($dateiname) . '" kann nicht im Ordner "' . dir_name(CURRENT_FOLDER) . '" erstellt werden, da eine Datei mit diesem Dateinamen bereits existiert.</div>';
					} else {
						$pos = stripos($dateiname, "/");
						if ($pos !== false) {
							$tempvar = explode("/", $dateiname);
							$dateiname = $tempvar[count($tempvar) - 1];
							echo '<div class="message information">Wenn Sie eine neue Datei in einem Unterordner erstellen wollen, wechseln Sie in diesen und klicken erneut auf "Neue Datei erstellen"!</div><br />';
						}
						$handler = @fOpen(CURRENT_FOLDER . $dateiname, "a+");
						// Datei öffnen, wenn nicht vorhanden dann wird die Datei erstellt.
						if ($handler !== false){
							switch ($_POST['wizard']) {
								//Wenn der New-File Wizard verwendet wurde wird hier der Dateiinhalt bestimmt
								case 1 :
									$text = "<?php\n// PHP Datei\n\n?";
									$text .= ">";
									break;
								case 2 :
									$text = "<?php\nheader('Location: " . $_POST['help_box'] . "');\n?";
									$text .= ">";
									break;
								case 3 :
									$text = "<?php\nphpinfo();\n?";
									$text .= ">";
									break;
								case 4 :
									$text = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n<html>\n <head>\n<meta http-equiv=\"content-type\" content=\"text/html; charset=windows-1250\">\n<meta name=\"generator\" content=\"phpFinder, https://github.com/Nolanus/phpFinder\">\n<title></title>\n</head>\n<body>\n\n</body>\n</html>";
									break;
								case 5 :
									$text = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n<html>\n <head>\n<meta http-equiv=\"content-type\" content=\"text/html; charset=windows-1250\">\n<meta name=\"generator\" content=\"phpFinder, https://github.com/Nolanus/phpFinder\">\n<meta http-equiv=\"refresh\" content=\"2; URL=" . $_POST['help_box'] . "\">\n<title></title>\n</head>\n<body>\n\n</body>\n</html>";
									break;
								default :
									$text = "";
							}
							fWrite($handler, $text);
							fClose($handler);
							if (file_exists(CURRENT_FOLDER . $dateiname)) {
								echo '<div class="message success">Die Datei "' . sanitize_names($dateiname) . '" wurde erfolgreich im Ordner "' . dir_name(CURRENT_FOLDER) . '" erstellt.</div>';
								echo "<p class=\"buttons\">";
								if ($_POST['wizard'] != "0") {
									echo "<a href=\"" . rawurlencode2(CURRENT_FOLDER . $dateiname) . "\" target=\"_blank\" ><i class=\"icon page_white_go\"></i> &quot;" . sanitize_names($dateiname) . "&quot; aufrufen</a> ";
								}
								echo "<a href=\"$self&amp;action=edit&amp;name=" . rawurlencode2($dateiname) . "\"><i class=\"icon page_white_edit\"></i> &quot;" . sanitize_names($dateiname) . "&quot; jetzt bearbeiten</a></p>";
							} else {
								echo '<div class="message error">Die Datei "' . sanitize_names($dateiname) . '" konnte nicht im Ordner "' . dir_name(CURRENT_FOLDER) . '" erstellt werden.' . return_last_error() . '</div>';
							}
						}
					}
				} elseif (isset ($_POST['Copy'])) {
					echo "<h2>Datei &quot;" . sanitize_names($_POST['old']) . "&quot; kopieren</h2>";
					$dateiname = has_ext($_POST['new'], $_POST['old']);
					$_POST['new'] = $dateiname[0];
					$new_complete_name = CURRENT_FOLDER . $_POST['new'];
					$tempvar = explode("/", $new_complete_name);
					unset ($tempvar[count($tempvar) - 1]);
					$zielordner = implode("/", $tempvar);
					if (file_exists($zielordner)) {
						$subfolder_exists = true;
					} else {
						$subfolder_exists = false;
					}
					if (is_writeable($zielordner)) {
						if (file_exists($new_complete_name)) {
							echo '<div class="message warning">Die Datei "' . sanitize_names($_POST['new']) . '" kann nicht im Ordner "' . dir_name($zielordner) . '" kopiert werden, da eine Datei mit diesem Dateinamen bereits existiert.</div>';
							echo '<p class="buttons"><a href="' . $ref . '" ><i class="icon arrow_left" class="floatleft"></i> Zurück</a></p>';
						} else {
							if ($subfolder_exists) {
								$file_old = CURRENT_FOLDER . $_POST['old'];
								$file_new = CURRENT_FOLDER . $_POST['new'];
								if (@ copy($file_old, $file_new)) {
									echo '<div class="message success">"' . sanitize_names($_POST['old']) . '" konnte erfolgreich von "<i>' . sanitize_names($file_old) . '</i>" nach "<i>' . sanitize_names($file_new) . '</i>" kopiert werden.</div>';
								} else {
									echo '<div class="message error">"' . sanitize_names($_POST['old']) . '" konnte nicht von "<i>' . sanitize_names($file_old) . '</i>" nach "<i>' . sanitize_names($file_new) . '</i>" kopiert werden.' . return_last_error() . '</div>';
								}
							} else {
								echo '<div class="message warning">Die Datei "' . sanitize_names($_POST['old']) . '" kann nicht erstellt werden, da der Ordner "' . dir_name(CURRENT_FOLDER) . sanitize_names($zielordner) . '" nicht existiert bzw. nicht schreibbar ist.</div>';
							}
						}
					} else {
						echo '<div class="message error">"' . sanitize_names($_POST['old']) . '" kann nicht nach "' . dir_name($zielordner) . '" werden, da der Ordner nicht schreibbar ist. Ändern Sie die CHMOD-Rechte dieses Ordners.</div>';
					}
				} elseif (isset ($_POST['Move'])) {
					echo "<h2>Datei &quot;" . sanitize_names($_POST['file']) . "&quot; verschieben</h2>";
					$moveable = true;
					if (file_exists(CURRENT_FOLDER . $_POST['folder'] . "/" . $_POST['file'])) {
						if (isset ($_POST['auto_replace'])) {
							chmod(CURRENT_FOLDER . $_POST['folder'] . "/" . $_POST['file'], "0777");
							unlink(CURRENT_FOLDER . $_POST['folder'] . "/" . $_POST['file']);
						} else {
							echo '<div class="message warning">Die Datei "' . sanitize_names($_POST['file']) . '" kann nicht in den Ordner "' . dir_name(CURRENT_FOLDER . $_POST['folder']) . '" verschoben werden, da in diesem eine Datei mit diesem Dateinamen bereits existiert.</div>';
							$moveable = false;
						}
					}
					if ($moveable) {
						@ copy(CURRENT_FOLDER . $_POST['file'], CURRENT_FOLDER . $_POST['folder'] . "/" . $_POST['file']);
						if (file_exists(CURRENT_FOLDER . $_POST['folder'] . "/" . $_POST['file'])) {
							@ unlink(CURRENT_FOLDER . $_POST['file']);
							if (!file_exists(CURRENT_FOLDER . $_POST['file'])) {
								echo '<div class="message success">Die Datei "' . sanitize_names($_POST['file']) . '" wurde erfolgreich nach "' . sanitize_names($_POST['folder']) . '" verschoben</div>';
							} else {
								echo '<div class="message error">Beim Verschieben der Datei "' . sanitize_names($_POST['file']) . '" nach "' . sanitize_names($_POST['folder']) . '" ist ein Fehler aufgetreten. Die neue Datei konnte angelegt, die Quelldatei jedoch nicht entfernt werden.' . return_last_error() . '</div>';
							}
						} else {
							echo '<div class="message error">Beim Verschieben der Datei "' . sanitize_names($_POST['file']) . '" nach "' . sanitize_names($_POST['folder']) . '" ist ein Fehler aufgetreten. Eventuell ist der Zielordner nicht schreibbar.' . return_last_error() . '</div>';
						}
					}
				} elseif (isset ($_POST['protect'])) {
					echo "<h2>Ordner \"" . dir_name($_POST["folder"]) . "\" schützen</h2>";
					if ($_POST['password1'] == $_POST['password2']) {
						//htaccess Datei-Inhalt zusammenstellen
						$file_contents = "# htaccess Verzeichnisschutz generiert von phpFinder\n";
						$file_contents .= "AuthName \"" . $_POST['area'] . "\"\n";
						$file_contents .= "AuthType Basic\n";
						$file_contents .= "AuthUserFile " . $_POST['path'] . "/.htpasswd\n";
						$file_contents .= "require valid-user\n";
						@ $handler = fOpen($_POST['path'] . "/.htaccess", "a+");
						@ fWrite($handler, $file_contents);
						@ fClose($handler);
						//htpasswd Dateiinhalt zusammenstellen
						$user_file_contents = $_POST['username'] . ":" . crypt($_POST['password1']);
						@ $handler = fOpen($_POST['path'] . "/.htpasswd", "a+");
						@ fWrite($handler, $user_file_contents);
						@ fClose($handler);
						if (file_exists($_POST['path'] . "/.htpasswd") && file_exists($_POST['path'] . "/.htaccess")) {
							echo "<div class=\"message success\">Der htaccess Verzeichnisschutz wurde erfolgreich angelegt.</div>";
						} else {
							echo "<div class=\"message error\">Beim erstellen des htaccess Verzeichnisschutz ist ein Fehler aufgetreten." . return_last_error() . "</div>";
						}
					} else {
						echo "<div class=\"message error\">Die eingegebenen Passwörter stimmen nicht überein.</div>";
					}
				} elseif (isset ($_POST['zip'])) {
					echo "<h2>Datei \"" . sanitize_names($_POST['new']) . "\" komprimieren</h2>";
					if (is_writeable(CURRENT_FOLDER)) {
						//Ist der Ordner schreibbar?
						$verfahren = $_POST['method'];
						if ($verfahren == "zip") {
							if (class_exists('ZipArchive')) {
								$zip = new ZipArchive();
								if (stripos($_POST['new'], ".zip") === false) {
									$_POST['new'] = $_POST['new'] . ".zip";
								}
								$filename = CURRENT_FOLDER . $_POST['new'];
								if ($zip->open($filename, ZIPARCHIVE :: CREATE) !== true) {
									echo '<div class="message error">Die ZIP-Datei "' . sanitize_names($_POST['new']) . '" konnte nicht erstellt werden.' . return_last_error() . '</div>';
								} else {
									$zip->addFile(substr(CURRENT_FOLDER, 2) . $_POST['file'], $_POST['file']);
									echo '<div class="message success">Die ZIP-Datei "<a href="' . $self . '&amp;action=file_edit&amp;name=' . rawurlencode2($_POST['new']) . '" title="Datei bearbeiten">' . sanitize_names($_POST['new']) . '</a>" wurde erfolgreich im Ordner "' . dir_name(substr(CURRENT_FOLDER, 2)) . '" erstellt. (Dateien in der ZIP-Datei: ' . $zip->numFiles . ')</div>';
									$zip->close();
								}
							} else {
								echo '<div class="message error">Sie können leider keine ZIP-Dateien erstellen, da keine ZIP-Extension für PHP installiert ist.</div>';
							}
						} elseif ($verfahren == "gzip") {
							if (function_exists("gzopen")) {
								if (!file_exists(CURRENT_FOLDER.$_POST['new'])){
									$handle = fopen(substr(CURRENT_FOLDER, 2) . $_POST['file'], "r");
									if (stripos($_POST['new'], ".gz") === FALSE) {
										$_POST['new'] = $_POST['new'] . ".gz";
									}
									// Datei zum Schreiben mit der maximalen Kompressionsstufe öffnen
									$zp = gzopen(substr(CURRENT_FOLDER, 2) . $_POST['new'], "w9");
									$contents = fread($handle, filesize(substr(CURRENT_FOLDER, 2) . $_POST['file']));
									if ($handle !== false && $zp !== false){
										while (!feof($handle)) {
											gzwrite($zp , fread ($handle, 8192));
										}
									}
									// Datei schließen
									fclose($handle);
									gzclose($zp);
									if (is_file(CURRENT_FOLDER . $_POST['new']) && filesize(CURRENT_FOLDER . $_POST['new']) > 0) {
										echo '<div class="message success">Die GZip-Datei "<a href="' . $self . '&amp;action=file_edit&amp;name=' . rawurlencode2($_POST['new']) . '" title="Datei bearbeiten">' . sanitize_names($_POST['new']) . '</a>" wurde erfolgreich im Ordner "' . dir_name(substr(CURRENT_FOLDER, 2)) . '" erstellt.</div>';
									} else {
										echo '<div class="message error">Beim Erstellen der GZIP-Datei ist ein Fehler aufgetreten.' . return_last_error() . '</div>';
									}
								} else {
									echo '<div class="message error">Es existiert bereits eine Datei mit diesem Dateinamen. Die Integration in eine bereits existierendes Archiv funktioniert lediglich mit ZIP-Dateien.</div>';
								}
							
							} else {
								echo '<div class="message error">Sie können leider keine GZip-Dateien erstellen, da keine GZip-Extension für PHP installiert ist.</div>';
							}
						} elseif ($verfahren == "bzip2") {
							if (function_exists("bzopen")) {
								if (!file_exists(CURRENT_FOLDER.$_POST['new'])){
									$handle = fopen(substr(CURRENT_FOLDER, 2) . $_POST['file'], "r");
									if (stripos($_POST['new'], ".bz2") === FALSE) {
										$_POST['new'] = $_POST['new'] . ".bz2";
									}
									// Datei zum Schreiben mit der maximalen Kompressionsstufe öffnen
									$zp = bzopen(substr(CURRENT_FOLDER, 2) . $_POST['new'], "w9");
									$contents = fread($handle, filesize(substr(CURRENT_FOLDER, 2) . $_POST['file']));
									if ($handle !== false && $zp !== false){
										while (!feof($handle)) {
											bzwrite($zp , fread ($handle, 8192));
										}
									}
									// Datei schließen
									fclose($handle);
									bzclose($zp);
									if (is_file(CURRENT_FOLDER . $_POST['new']) && filesize(CURRENT_FOLDER . $_POST['new']) > 0) {
										echo '<div class="message success">Die BZip2-Datei "<a href="' . $self . '&amp;action=file_edit&amp;name=' . rawurlencode2($_POST['new']) . '" title="Datei bearbeiten">' . sanitize_names($_POST['new']) . '</a>" wurde erfolgreich im Ordner "' . dir_name(substr(CURRENT_FOLDER, 2)) . '" erstellt.</div>';
									} else {
										echo '<div class="message error">Beim Erstellen der Bzip2-Datei ist ein Fehler aufgetreten.' . return_last_error() . '</div>';
									}
								} else {
									echo '<div class="message error">Es existiert bereits eine Datei mit diesem Dateinamen. Die Integration in eine bereits existierendes Archiv funktioniert lediglich mit ZIP-Dateien.</div>';
								}
							} else {
								echo '<div class="message error">Sie können leider keine Bzip2-Dateien erstellen, da keine GZip-Extension für PHP installiert ist.</div>';
							}
							
						} else {
							echo '<div class="message error">Fehler bei der Kompressionsverfahren-Auswahl.</div>';
						}
						echo '<br />
						<table align="center" width="400">
							<colgroup>
								<col width="34%" />
								<col width="33%" />
								<col width="33%" />
							</colgroup>
							<tr style="text-align:center;background-color:#e3f1fe;">
								<td></td>
								<td><b>Dateigröße</b></td>
								<td><b>Prozent</b></td>
							</tr>
							<tr style="text-align:center;">
								<td><b>Vorher</b></td>
								<td>' . size_unit(filesize(substr(CURRENT_FOLDER, 2) . $_POST['file'])) . '</td>
								<td>100%</td>
							</tr>
							<tr style="text-align:center;background-color:#e3f1fe;">
								<td><b>Nachher</b></td>
								<td>' . size_unit(filesize(CURRENT_FOLDER . $_POST['new'])) . '</td>
								<td>' . @round(filesize(CURRENT_FOLDER . $_POST['new']) / (filesize(CURRENT_FOLDER . $_POST['file']) / 100), 2) . '%</td>
							</tr>
						</table>';
					} else {
						echo '<div class="message error">Die komprimierte Datei "' . sanitize_names($_POST['new']) . '" konnte nicht erstellt werden, da der Ordner "' . dir_name(CURRENT_FOLDER) . '" nicht schreibbar ist!</div>';
					}
				}elseif(isset($_POST['unzip'])){
					echo "<h2>Datei \"" . sanitize_names($_POST['file']) . "\" entpacken</h2>";
					if (file_exists(CURRENT_FOLDER.$_POST['file']) && is_readable(CURRENT_FOLDER.$_POST['file'])){
						if (is_writeable(CURRENT_FOLDER)) {
							//Ist die Datei lesbar und der Ordner schreibbar?
							$file_info = pathinfo(CURRENT_FOLDER . $_POST['file']);
							$ext = $file_info['extension'];
							$mime_type = @dateityp($ext, CURRENT_FOLDER . $_POST['file']);
							if (isset($_POST['replaceExisting'])){
								$replace = true;
							}else{
								$replace = false;
							}
							if (isset($_POST['unzipInNewFolter'])){
							$fileParts = explode(".",$_POST['file']);
								unset($fileParts[count($fileParts)-1]);
								$destFolder = CURRENT_FOLDER.implode(".",$fileParts);
								@mkdir($destFolder);
							}else{
								$destFolder = CURRENT_FOLDER;
							}
							if ($_POST['method'] == "zip") {
								$zip = new ZipArchive;
								if ($zip->open(CURRENT_FOLDER. $_POST['file']) === TRUE) {
									$counter["all"] = 0;
									$counter["overwritten"] = 0;
									for($i = 0; $i < $zip->numFiles; $i++) {
										$counter["all"]++;
										$filename = $zip->getNameIndex($i);
										$fileinfo = pathinfo($filename);
										if (file_exists($destFolder.$filename)){
											$counter["overwritten"]++;
											if ($replace){
												unlink($destFolder.$filename);
												$zip->extractTo($destFolder, array($filename));
											}
										}else{
											$zip->extractTo($destFolder, array($filename));
										}
									}
									$zip->close();
									echo '<div class="message success">Aus der komprimierte Datei ' . sanitize_names($_POST['file']);
									if ($counter["all"] == 1) {
										echo "wurde 1 Datei";
									} else {
										echo "wurden ".$counter["all"]." Dateien";
									}
									echo ' erfolgreich  entpackt.';
									if ($counter["overwritten"] > 0) {
										echo "<br />";
										if ($replace) {
											echo "Überschriebene Dateien";
										} else {
											echo "Übersprungene/nicht entpackte Dateien wegen Namenskollisionen";
										}
										echo ": ".$counter["overwritten"];
									}
									if (isset($_POST['deleteZip'])) {
										if (@unlink(CURRENT_FOLDER . $_POST['file'])) {
											echo "<br />Die Archiv-Datei wurde anschließend gelöscht.";
										} else {
											echo "<br />Beim Löschen der Archiv-Datei ist jedoch ein Fehler aufgetreten.";
										}
									}
									echo '</div>';
								} else {
									echo '<div class="message error">Die komprimierte Datei "' . sanitize_names($_POST['file']) . '" konnte nicht entpackt werden! Eventuell ist es ein nicht unterstütztes Archiv-Format.</div>';
								}
							}elseif ($_POST['method'] == "gzip") {
								$source = gzopen(CURRENT_FOLDER . $_POST['file'], "r");
								$destFile = CURRENT_FOLDER."/".$file_info['filename'];
								if (file_exists($destFile) && $replace) {
									@unlink($destFile);
								}
								if (!file_exists($destFile)) {
									$dest = fopen($destFile, "a+");
									if ($source !== false && $dest !== false) {
										while (!feof($source)) {
											fwrite($dest , gzread ($source, 8192));
										}
									}
									@fclose($dest);
									@gzclose($source);
									if (file_exists($destFile) && filesize($destFile) > 0){
										echo '<div class="message success">Die komprimierte Datei ' . sanitize_names($_POST['file']).' wurde erfolgreich entpackt.';
										if (isset($_POST['deleteZip'])) {
											if (@unlink(CURRENT_FOLDER . $_POST['file'])) {
												echo "<br />Die Archiv-Datei wurde anschließend gelöscht.";
											} else {
												echo "<br />Beim Löschen der Archiv-Datei ist jedoch ein Fehler aufgetreten.";
											}
										}
										echo "</div>";
									} else {
										echo '<div class="message error">Beim Entpacken der komprimierten Datei ' . sanitize_names($_POST['file']) .' ist ein Fehler aufgetreten.</div>';
									}
								} else {
									echo '<div class="message error">Die Datei kann nicht entpackt werden, da eine Datei mit diesem Namen bereits existiert!</div>';
								}
							}elseif ($_POST['method'] == "bzip2") {
								$source = bzopen(CURRENT_FOLDER . $_POST['file'], "r");
								$destFile = CURRENT_FOLDER."/".$file_info['filename'];
								if (file_exists($destFile) && $replace){
									@unlink($destFile);
								}
								if (!file_exists($destFile)){
									$dest = fopen($destFile, "a+");
									if ($source !== false && $dest !== false){
										while (!feof($source)) {
											fwrite($dest , bzread ($source, 8192));
										}
									}
									@fclose($dest);
									@gzclose($source);
									if (file_exists($destFile) && filesize($destFile) > 0) {
										echo '<div class="message success">Die komprimierte Datei ' . sanitize_names($_POST['file']) .' wurde erfolgreich entpackt.';
										if (isset($_POST['deleteZip'])) {
											if (@unlink(CURRENT_FOLDER . $_POST['file'])) {
												echo "<br />Die Archiv-Datei wurde anschließend gelöscht.";
											} else {
												echo "<br />Beim Löschen der Archiv-Datei ist jedoch ein Fehler aufgetreten.";
											}
										}
										echo "</div>";
									} else {
										echo '<div class="message error">Beim Entpacken der komprimierten Datei ' . sanitize_names($_POST['file']) .' ist ein Fehler aufgetreten.</div>';
									}
								}
							} else {
								echo '<div class="message error">Die Datei kann nicht entpackt werden, da eine Datei mit diesem Namen bereits existiert!</div>';
							}
						} else {
							echo '<div class="message error">Die komprimierte Datei "' . sanitize_names($_POST['file']) . '" konnte nicht entpackt werden, da der Ordner "' . dir_name(CURRENT_FOLDER) . '" nicht schreibbar ist!</div>';
						}
					} else {
						echo '<div class="message error">Die komprimierte Datei "' . sanitize_names($_POST['file']) . '" konnte nicht entpackt werden, da sie nicht existiert oder lesbar ist!</div>';
					}
				} elseif (isset ($_POST['save_file'])) {
					if (is_it_me(CURRENT_FOLDER, $_POST['file'])) {
						echo "<div class=\"message error\">Diese Datei kann nicht bearbeitet werden, da Sie zu phpFinder gehört!</div>";
					} elseif (isset ($_POST['save_as'])) {
						$dateiname = has_ext($_POST['save_as_name'], $_POST['file']);
						$dateiname = $dateiname[0];
						$handler = fOpen(CURRENT_FOLDER . $dateiname, "a+");
						fClose($handler);
					} else {
						$dateiname = $_POST['file'];
					}
					if ($dateiname != "") {
						if (is_writable(CURRENT_FOLDER . $dateiname)) {
							$handle = fopen(CURRENT_FOLDER . $dateiname, "w");
							$inhalt = $_POST["content"];
							if (isset ($_POST['replace'])) {
								//Fehlerhafte Umlaute ersetzen und Umlaute durch richige HTML Codes ersetzen
								$wrong = array("Ã¼", "Ãœ", "Ã¶", "Ã–", "Ã¤", "Ã„", "ÃŸ");
								$umlaute = array("ü", "Ü", "ö", "Ö", "ä", "Ä", "ß");
								$umlauteHTML = array("&uuml;", "&Uuml;", "&ouml;", "&Ouml;", "&auml;", "&Auml;", "&szlig;");
								$inhalt = str_replace($umlaute, $umlauteHTML, str_replace($wrong, $umlaute, $inhalt));
							}
							fwrite($handle, $inhalt);
							echo '<div class="message success">Die Datei "' . sanitize_names(substr(CURRENT_FOLDER, 2) . $dateiname) . '" wurde erfolgreich bearbeitet.</div>';
							fclose($handle);
							echo "<p class=\"buttons\">
							<a href=\"" . $ref . "\" title=\"Klicken Sie hier, um zum Inhalt Bearbeiten Dialog zurückzukehren\" class=\"floatleft\"><i class=\"icon page_white_text \"></i> Inhalt weiter bearbeiten</a>
							<a href=\"" . $self . "&amp;action=file_edit&amp;name=".rawurlencode2($_POST['file'])."\" title=\"Klicken Sie hier, um zum allgemeinen Bearbeiten Dialog zurückzukehren\" class=\"floatleft\"><i class=\"icon page_white_edit \"></i> Datei bearbeiten Dialog</a>
							</p>";
						} else {
							echo '<div class="message error">Die Datei "' . sanitize_names(substr(CURRENT_FOLDER, 2) . $dateiname) . '" konnte nicht bearbeitet werden, da Sie nicht schreibbar ist.</div>
							<p class="buttons"><a href="' . $self . '&amp;action=edit&amp;name=' . rawurlencode2($dateiname) . '"  class="floatleft"><i class="icon page_white_edit"></i> Datei weiter bearbeiten</a></p>';
						}
					} else {
						echo "<div class=\"message error\">Keine Dateiname angegeben! Datei konnte nicht gespeichert werden.</div>";
					}
				} elseif (isset ($_POST['import'])) {
					@ ini_set("max_execution_time", "3600");
					echo "<h2>Datei importieren</h2>";
					$zeilen = explode("\n", $_POST['sourcefile']);
					foreach ($zeilen as & $sourcefile) {
						if (trim($sourcefile) != ""){
							if (!isset ($_POST['filename'])) {
								$_POST['filename'] = trim(clear_path($sourcefile, 1));
							}
							if (file_exists($_POST['zieldir'] . $_POST['filename'])) {
								if (isset ($_POST['auto_replace'])) {
									@unlink($_POST['zieldir'] . $_POST['filename']);
									echo '<div class="message information">Es war eine Datei mit dem Namen "' . sanitize_names($_POST['filename']) . '" vorhanden. Sie wurde ersetzt.</div><br />';
								} else {
									echo '<div class="message warning">Da bereits eine Datei mit dem Namen "' . sanitize_names($_POST['filename']) . '" in diesem Ordner "' . dir_name($_POST['zieldir']) . '" existiert, ';
									$last_dot = strrpos($_POST['filename'], '.');
									$_POST['filename'] = substr_replace($_POST['filename'], "#", $last_dot, 1);
									$zahl = 2;
									$_POST['filename'] = str_replace('#', '(' . $zahl . ').', $_POST['filename']);
									while (file_exists($_POST['zieldir'] . $_POST['filename'])) {
										$zahl = $zahl + 1;
										$_POST['filename'] = str_replace('(' . ($zahl - 1) . ')', '(' . $zahl . ')', $_POST['filename']);
									}
									echo 'wird die neue Datei in "<a href="' . $self . '&amp;action=rename&amp;name=' . rawurlencode2($_POST['filename']) . '" title="Klicken Sie hier, wenn Sie die Datei gleich umbennen wollen">' . sanitize_names($_POST['filename']) . '</a>" umbenannt.</div><br />';
								}
							}
							if (isset ($_POST['method'])) {
								if ($_POST['method'] == "curl") {
									$wie = "curl";
								} else {
									$wie = "copy";
								}
							} elseif (@ ini_get("allow_url_fopen")) {
								$wie = "copy";
							} elseif (@ function_exists("curl_init")) {
								$wie = "curl";
							}
							$messungStart = strtok(microtime(), " ") + strtok(" ");
							if ($wie == "copy") {
								@ copy($sourcefile, $_POST['zieldir'] . $_POST['filename']);
							} elseif ($wie == "curl") {
								$ch = curl_init(trim($sourcefile));
								$fp = @fopen($_POST['zieldir'] . $_POST['filename'], "w");
								if ($fp !== false && $ch !== false){
									@curl_setopt($ch, CURLOPT_FILE, $fp);
									@curl_setopt($ch, CURLOPT_HEADER, 0);
									@curl_exec($ch);
								}
								@curl_close($ch);
								@fclose($fp);
							} else {
								echo "<div class=\"message error\">Fehler beim Festlegen der Methode zum Importieren. Überprüfen Sie ob ihre Server den Import von externen Dateien unterstützt und versuchen Sie es erneut.</div>";
							}
							$messungEnde = strtok(microtime(), " ") + strtok(" ");
							if (file_exists($_POST['zieldir'] . $_POST['filename']) && @ filesize($_POST['zieldir'] . $_POST['filename']) > 0) {
								echo "<div class=\"message success\">Die Datei \"" . sanitize_names($_POST['filename']) . "\" wurde erfolgreich importiert. (Dauer: " . number_format($messungEnde - $messungStart, 6) . " Sekunden)</div>
								<p class=\"buttons\"><a href=\"$self&amp;action=file_edit&amp;name=" . rawurlencode2($_POST['filename']) . "\" ><i class=\"icon page_white_go\"></i> Datei bearbeiten</a></p>";
							} else {
								echo "<div class=\"message error\">Beim Importieren der Datei \"" . sanitize_names($_POST['filename']) . "\" ist ein Fehler aufgetreten.<br />Prüfen Sie ob die Datei vorhanden und erreichbar ist und ob Sie die nötigen Berechtigungen besitzten um diese aufzurufen." . return_last_error() . "</div>";
							}
							echo "<br style=\"clear:both;\" /><br />\n";
							unset ($_POST['filename']);
						}
					}
				} elseif (isset ($_POST['chmod'])) {
					if (chmod(CURRENT_FOLDER . $_POST['file'], $_POST['rechte'])) {
						echo '<div class="message success">"' . sanitize_names($_POST['file']) . '" konnten erfolgreich die Rechte "' . sanitize_names($_POST['rechte']) . '" zugewiesen werden.</div>';
					} else {
						echo '<div class="message error">"' . sanitize_names($_POST['file']) . '" konnten nicht die Rechte "' . sanitize_names($_POST['rechte']) . '" zugewiesen werden.</div>';
					}
				} else {
					echo "<div class=\"message information\">Es konnte kein abgesendetes Formular gefunden werden. Nutzen Sie den Zurück-Button ihres Browsers um das Formular erneut abzusenden, falls Sie die Aktion erneut ausführen möchten.</div>";
				}
			} else {
				//Ende der $_GET['action'] == "post"
				echo "<div class=\"message warning\"><a title=\"Bug/Fehler melden\" target=\"_blank\" href=\"https://github.com/Nolanus/phpFinder/issues/new\"><i class=\"icon bug_error\" style=\"float:right;\" title=\"Bug/Fehler melden\"></i></a> Die gewünschte Aktion \"" . sanitize_names($_GET['action']) . "\" konnte leider nicht gefunden werden.<br />Melden Sie sich das Problem bitte an den Entwickler, falls es dauerhaft auftritt.</div>";
			}
		} elseif (isset ($_GET['image']) && isset ($_GET['state'])) {
			//Bild von pixlr importieren
			echo "<h2>Bild importieren</h2>";
			if (@ini_get("allow_url_fopen") != 1 || @function_exists("curl_init") != true) {
				echo "<div class=\"message error\">Da das Aufrufen von Dateien auf anderen Servern über PHP nicht erlaubt ist, ist es leider nicht möglich das Bild zu importieren!</div>";
			} else{
				echo "<p>Sie haben mit <a href=\"http://www.pixlr.com\" target=\"_blank\" title=\"www.pixlr.com\">Pixlr</a> ein Bild bearbeitet. Hier haben Sie nun die Möglichkeit dieses wieder auf ihren Server zu laden.</p>";
				$zieldir = explode("?dir=", $ref);
				if (defined (CURRENT_FOLDER)) {
					$zieldir = CURRENT_FOLDER;
				} else {
					$zieldir = "./";
				}
				echo "<form action=\"$self_raw?dir=" . rawurlencode2($zieldir) . "&amp;action=post\" method=\"post\" name=\"import\" >
					<table border=\"0\" align=\"center\" class=\"property_table\" >
						<tr>
							<td colspan=\"2\" align=\"center\"><img alt=\"\" src=\"" . $_GET['image'] . "\" title=\"" . sanitize_names($_GET['title'] . "." . $_GET['type']) . "\" class=\"restrainImageSize\" /></td>
						</tr>
						<tr class=\"bgcolor\">
							<td><b>Dateiname</b></td><td>" . sanitize_names($_GET['title'] . "." . $_GET['type']) . "</td>
						</tr>
						<tr>
							<td><b>Zielverzeichnis</b></td><td>" . dir_name($zieldir) . "</td>
						</tr>
					</table>\n
					<label for=\"auto_replace\">Automatisch ersetzen</label>
					<input type=\"checkbox\" checked=\"checked\" name=\"auto_replace\" id=\"auto_replace\" />
					<input type=\"hidden\" name=\"sourcefile\" title=\"sourcefile\" readonly=\"readonly\" value=\"" . $_GET['image'] . "\" />
					<input type=\"hidden\" name=\"filename\" title=\"filename\" readonly=\"readonly\" value=\"" . $_GET['title'] . "." . $_GET['type'] . "\" />
					<input type=\"hidden\" name=\"zieldir\" title=\"zieldir\" readonly=\"readonly\" value=\"" . $zieldir . "\" />
					
					<button type=\"submit\" name=\"import\" title=\"Klicken Sie hier, um das Bild jetzt zu importieren.\" onclick=\"javascript:go();\" >
						<i class=\"icon page_white_go\" id=\"loadimg\" ></i>
						Bild importieren
					</button>
				</form>";
			}
		} else {
			//Falls keine Aktion in GET_['action'] übergeben wurde
			echo '<p class="textcenter"><i class="icon logo"></i></p>';
			if ($AUTO_VERSION_CHECK) {
				echo "<p class=\"textcenter\"><a href=\"$self&amp;action=about&amp;versioncheck\" title=\"Nach Updates für phpFinder suchen\" ><img src=\"http://versioncheck.sebastian-fuss.de/image.php?w=0&amp;v=$VERSION&amp;q=" . round(time() / (60 * 60), 0) . "\" alt=\"\" /></a></p>";
			} else {
				echo "<p class=\"textcenter\">Aktivieren Sie den automatischen Versionscheck um schnellstmöglich über Updates informiert zu werden!</p>";
			}
		}
		echo '<br /><br />';
		?>
		</div>
	</div>
	<div id="leftArea">
		<div class="wrap">
		<?php
		/* ========================================================================== */
		/* ==============Ausgabe des Ordnerbaums links ============================ */
		/* ========================================================================== */
		echo "<table width=\"200\" border=\"0\" >
		<colgroup>
			<col width=\"20\" />
			<col width=\"180\" />
		</colgroup>";
		if (CURRENT_FOLDER == "" || CURRENT_FOLDER == "./") {
			$aufwaerts = "<tr title=\"Sie befinden sich auf der höchsten Ebene\"><td><i class=\"icon folder_user\"></i></td><td><i>ROOT</i></td></tr>";
		} else {
			$aufwaerts = "<tr onclick=\"javascript:document.location.href='" . $self_raw . "?dir=" . rawurlencode2(cutLastFolder(CURRENT_FOLDER)) . "'\" ><td><a href=\"$self_raw?dir=" . rawurlencode2(cutLastFolder(CURRENT_FOLDER)) . "\"><i class=\"icon arrow_turn_left\" title=\"Aufwärts\"></i></a></td><td><a href=\"$self_raw?dir=" . rawurlencode2(cutLastFolder(CURRENT_FOLDER)) . "\" class=\"editlink\">..</a></td></tr>\n";
		}
		if (file_exists(CURRENT_FOLDER)) {
			$verzeichnis = openDir(CURRENT_FOLDER);
			$ordner = array();
			$dateien = array();
			$unknowns = array();
			
			while ($file = readDir($verzeichnis)) {
				if ($file == "..") {
					//Ist es der Ordner der eine Ebene nach oben führt?
					//Falls ja: Spezieller Link ist bereits standardmäßig erstellt und wird immer oben ausgegeben
				} else if ($file == ".") {
					//Ist es der . Ordner?
					//Nix machen...
				} elseif (is_dir(CURRENT_FOLDER . $file)) {
					$currentFolder = "<td><a href=\"$self&amp;action=edit_folder&amp;name=" . rawurlencode2($file) . "\"><i class=\"icon ";
					if (!is_readable(CURRENT_FOLDER . $file)) {
						// Wenn der Ordner nicht lesbar ist, gesonderten Tag hinzufügen
						$currentFolder .= "folder_error\" title=\"Unlesbarer Ordner\"></i></a></td><td><a href=\"#\" title=\"Der Ordner &quot;" . sanitize_names($file) . "&quot; ist nicht lesbar und kann daher nicht geöffnet werden\"";
					} else {
						$currentFolder .= "folder\" title=\"Den Ordner &quot;" . sanitize_names($file) . "&quot; bearbeiten\" ></i></a></td><td onclick=\"javascript:document.location.href='$self_raw?dir=" . rawurlencode2(CURRENT_FOLDER . $file) . "'\" ><a href=\"$self_raw?dir=" . rawurlencode2(CURRENT_FOLDER . $file) . "/\" title=\"Den Ordner &quot;" . sanitize_names($file) . "&quot; öffnen\"";
					}
					$currentFolder .= " class=\"editlink\" >" . sanitize_names($file) . "</a></td>";
					$ordner[strtolower($file)] = $currentFolder;
				} else if (is_file(CURRENT_FOLDER . $file)) {
					if (is_readable(CURRENT_FOLDER . $file)) {
						$file_info = pathinfo(CURRENT_FOLDER . $file);
						$ext = isset($file_info['extension']) ? $file_info['extension'] : "";
						$file_mime = @ dateityp($ext, CURRENT_FOLDER . $file);
						if (stripos($file_mime, "image") !== false) {
							$currentFileClass = "image";
							$currentFileTitle = "Bild-Datei";
						} else if (stripos($file_mime, "video") !== false) {
							$currentFileClass = "film";
							$currentFileTitle = "Video-Datei";
						} else if (stripos($file_mime, "text") !== false) {
							$currentFileClass = "page_white_text";
							$currentFileTitle = "Text-Datei";
						} else if (stripos($file_mime, "excel") !== false) {
							$currentFileClass = "page_white_excel";
							$currentFileTitle = "Microsoft Office Excel-Datei";
						} else if (stripos($file_mime, "powerpoint") !== false) {
							$currentFileClass = "page_white_powerpoint";
							$currentFileTitle = "Microsoft Office Power Point-Datei";
						} else if (stripos($file_mime, "word") !== false) {
							$currentFileClass = "page_white_word";
							$currentFileTitle = "Microsoft Office Word-Datei";
						} else if (stripos($file_mime, "photoshop") !== false) {
							$currentFileClass = "image";
							$currentFileTitle = "Adobe Photoshop-Datei";
						} else if (stripos($file_mime, "executable") !== false) {
							$currentFileClass = "application_xp_terminal";
							$currentFileTitle = "Ausführbare Datei";
						} else if (stripos($file_mime, "pdf") !== false) {
							$currentFileClass = "page_white_acrobat";
							$currentFileTitle = "Adobe PDF-Datei";
						} else if (stripos($file_mime, "audio") !== false) {
							$currentFileClass = "music";
							$currentFileTitle = "Audio-Datei";
						} else if (stripos($file_mime, "zip") !== false || stripos($file_mime, "tar") !== false || stripos($file_mime, "rar") !== false || stripos($file_mime, "compr") !== false || stripos($file_mime, "ARJ") !== false) {
							$currentFileClass = "page_white_compressed";
							$currentFileTitle = "Komprimierte Datei";
						} else {
							$currentFileClass = "page_white";
							$currentFileTitle = "'$file_mime'-Datei";
						}
					} else {
						//Wenn eine Datei nicht lesbar ist
						$currentFileClass = "page_white_error";
						$currentFileTitle = "Datei";
					}
					if (is_it_me(CURRENT_FOLDER, $file)) {
						if (LIST_FINDER_FILES) {
							$dateien[strtolower($file)] = "<td><a href=\"" . htmlspecialchars(substr(CURRENT_FOLDER, 2) . rawurlencode2(basename($_SERVER['PHP_SELF']))) . "\" target=\"_blank\" class=\"icon file page_white_gear\" title=\"Ein neues phpFinder Fenster öffnen\"></a></td><td><a title=\"Die Datei &quot;" . sanitize_names($file) . "&quot; kann nicht bearbeitet werden, da Sie zu phpFinder gehört\" href=\"" . $self . "&amp;action=editwfmfile\">" . sanitize_names($file) . "</a></td>";
						}
					} else {
						$dateien[strtolower($file)] = "<td><a href=\"" . htmlspecialchars(substr(CURRENT_FOLDER, 2) . rawurlencode2($file)) . "\" target=\"_blank\" class=\"icon $currentFileClass file\" title=\"$currentFileTitle in einem neuen Fenster öffnen\"></a></td><td onclick=\"javascript:document.location.href='" . $self . "&amp;action=file_edit&amp;name=" . rawurlencode2($file) . "'\"><a href=\"" . $self . "&amp;action=file_edit&amp;name=" . rawurlencode2($file) . "\" title=\"Die Datei &quot;" . sanitize_names($file) . "&quot; bearbeiten\" class=\"editlink\" >" . sanitize_names($file) . "</a></td>";
					}
				} else {
					//Falls es weder Ordner noch Datei ist, wird es mit Fragezeichen ausgegeben
					$unknowns[strtolower($file)] = "<td><i class=\"icon error\" ></i></td><td>" . sanitize_names($file) . "</td>";
				}
			}
			closeDir($verzeichnis);
			if (count($dateien) == 0 && count($ordner) == 0 && count($unknowns) == 0) {
				echo $aufwaerts . '<tr>
				<td colspan="2"><i title="In diesem Ordner befinden sich keine weiteren Dateien oder Ordner">Der Ordner ist leer</i></td>
				</tr>';
			} else {
				if ($ffcountpos == 1) {
					$ffcountpos_align = "left";
				} elseif ($ffcountpos == 2) {
					$ffcountpos_align = "center";
				} else {
					$ffcountpos_align = "right";
				}
				$filefolder_content = "<tr><td colspan=\"2\" style=\"text-align:" . $ffcountpos_align . ";\" ><small><i>" . count($ordner) . " Ordner und " . count($dateien) . " Dateien</i></small></td></tr>";
				if ($ffcount == 1) {
					echo $filefolder_content;
				}
				echo $aufwaerts;
				if ($ffcount == 2) {
					echo $filefolder_content;
				}
				// Create one files'n'folders array
				ksort($ordner);
				ksort($dateien);
				ksort($unknowns);
				$fnf = array_merge($ordner, $dateien, $unknowns);
				foreach ($fnf as $val) {
					echo "<tr>" . $val . "</tr>\n";
				}
				if ($ffcount != 1 && $ffcount != 2) {
					echo $filefolder_content;
				}
			}
			echo "</table>";
		} else {
			// Falls der Ordner nicht (mehr) existiert, den Aufwärts Link anzeigen und eine Fehlermeldung
			echo $aufwaerts . "</table>
			<div class=\"message error\">Das Verzeichnis " . sanitize_names(CURRENT_FOLDER) . " ist nicht (mehr) vorhanden.</div>";
		}
		?>
		</div>
	</div>
<?php
} else {
	//Ende Sesson
	echo '
	<h1>Login</h1>
	<p>Sie müssen sich einloggen, um phpFinder nutzen zu können.</p>
	</div>
	</div>
	<div id="mainArea">
	<div class="wrap">';
	if (isset($logedout) && $logedout) {
		//Falls man ausgeloggt wurde, wird nun hier eine Erfolgsmeldung angezeigt
		echo '<div class="message success">Sie wurden erfolgreich ausgeloggt.</div><br />';
	}
	if (isset($_POST['Login'])) {
		echo '<br /><div class="message error">Die eingegebenen Login-Daten sind nicht korrekt!</div><br />';
	}
	if (isset($_GET['action']) && $_GET['action'] == "logout") {
		unset($_GET['action']);
	}
	echo '<div class="formular">
	<form name="login" action="'.(str_replace("&", "&amp;", $connectionType . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . http_build_query($_GET))).'" method="post">
	
		<label for="user">Nutzer:
			<span class="small">Ihr Benutzernamen</span>
		</label>
		<input type="text" id="user" name="user" value="" title="Geben Sie hier ihren Benutzernamen ein" />
		
		<label for="passwort">Passwort:
			<span class="small">Ihr Passwort</span>
		</label>
		<input type="password" id="passwort" name="passwort" value="" title="Geben Sie hier ihr geheimes Passwort ein" />
		<button type="submit" id="submit" name="Login" title="Klicken Sie hier, um sich einzuloggen">
			<i class="icon key_go"></i>
			Login
		</button>
	</form>
	</div>
	</div>
	</div>
	<div id="leftArea">
	<div class="wrap">
		<!--- Files and folders will be listed here after login -->
	</div>
	</div>';
}
echo '
<div id="footerArea">
	<div class="wrap">
		<p class="textcenter" style="font-size:110%;">
		<a ';
		if (isset($self)) {
		echo "href=\"$self&amp;action=about\"";
		} else {
		echo "href=\"https://github.com/Nolanus/phpFinder\" target=\"_blank\"";
		}
		echo ' title="phpFinder" ><i class="icon footerlogo"></i></a>
		</p>
	</div>
</div>';


//Werbecodes blockieren, aber nur wenn eingeloggt.
if ($BLOCK_ADS && $_SESSION['passwort'] == $Zugangspasswort && $_SESSION['user'] == $Benutzername) {
echo "<!-- \n </body> \n --> </body> <!-- \n </body> \n -->";
} else {
echo "</body>";
}
?>
</html>