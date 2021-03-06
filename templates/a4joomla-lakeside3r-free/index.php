﻿<?php // no direct access 
defined( '_JEXEC' ) or die( 'Restricted access' ); 
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$showLeftColumn = (bool) $this->countModules('position-7');
$showRightColumn = (bool) $this->countModules('position-6');
$showRightColumn &= $app->input->getCmd('layout', '') != 'edit' ;

$logoText	= $this->params->get("logoText","LAKESIDE3R");
$logoFontsize	= $this->params->get("logoFontsize", "36");
$slogan	= $this->params->get("slogan","Joomla template from a4joomla.com");

$twitterurl = $this->params->get("twitterUrl");
$facebookurl = $this->params->get("facebookUrl");
$feedurl = $this->params->get("feedUrl");
$googleurl = $this->params->get("googleUrl");
$youtubeurl = $this->params->get("youtubeUrl");

$rightColumnWidth	= $this->params->get("rightColumnWidth", "3");
$leftColumnWidth	= $this->params->get("leftColumnWidth", "3");
$logoWidth	= $this->params->get("logoWidth", "5");
$logoTextPosition	= $this->params->get("logoTextPosition", "20");
$sloganPosition	= $this->params->get("sloganPosition", "-5");
$searchPosition	= $this->params->get("searchPosition", "35");
$topmenuPosition = $this->params->get("topmenuPosition", "15");
$slideshowPosition = $this->params->get("slideshowPosition", "0");
$sociWidth = 9 - $logoWidth;
$headerrightWidth = 12 - $logoWidth;

if ($showLeftColumn && $showRightColumn) {
   $contentWidth = 12 - $leftColumnWidth - $rightColumnWidth;
} elseif (!$showLeftColumn && $showRightColumn) {
   $contentWidth = 12 - $rightColumnWidth;
} elseif ($showLeftColumn && !$showRightColumn) {
   $contentWidth = 12 - $leftColumnWidth;
} else {
   $contentWidth = 12 ;
}

// Add JavaScript Frameworks
//JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet(JURI::base().'templates/'.$this->template.'/css/template.css', $type = 'text/css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);  
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
	
<meta name="keywords" content="мед недорого, акація, липа, соняшник, квітковий, мед, купить мед, украина мед, мед оптом, продам мед, полезно мед, мед пчелы, мед фото, домашний мед">
<meta name="description" content="Натуральний бджолиний мед недорого:  акація, липа, соняшник та квітковий.">
	<jdoc:include type="head" />

	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/icomoon2.css" type="text/css" />

<style type="text/css">
 #logo h2 {
    font-size:<?php echo $logoFontsize; ?>px;
	margin-top:<?php echo $logoTextPosition; ?>px;
 }
 #logo h3 {
	margin-top:<?php echo $sloganPosition; ?>px;
 }
 #hsocial {
	margin-top:<?php echo $searchPosition; ?>px;
 } 
 #header {
	padding-bottom:<?php echo $topmenuPosition; ?>px;
 } 
 #slideshow-mod {
  padding-top:<?php echo $slideshowPosition; ?>px;
 } 
</style>

<!--[if lt IE 9]>
	<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
<![endif]-->
<!--[if lte IE 7]>
	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/lte-ie7.js"></script>
<![endif]-->


</head>
<body>




	<div id="header" class="container">

		<div class="row">
			<div id="logo" class="span<?php echo $logoWidth; ?>">
					<h2><a href="<?php echo JURI::base(); ?>" title="<?php echo htmlspecialchars($logoText); ?>"><?php echo htmlspecialchars($logoText); ?></a></h2>
					<h3><?php echo htmlspecialchars($slogan); ?></h3> 
			</div>
			<div id="headerright" class="span<?php echo $headerrightWidth; ?>">
				<div id="hsocial" class="row">
                                       
					<?php if($this->countModules('position-0')) : ?>
						<div id="search" class="span3 pull-right clearfix">
                                                       <jdoc:include type="modules" name="position-kontakt" style="xhtml" />  
							<jdoc:include type="modules" name="position-0" style="xhtml" />  
						</div>
					<?php endif; ?>
					<div id="soci" class="span<?php echo $sociWidth; ?> pull-right">
					<?php if($youtubeurl) : ?>
						<a target="_blank" class="myyoutube pull-right" href="<?php echo $youtubeurl; ?>" title="Youtube"><i class="icon2-youtube"></i></a>
					<?php endif; ?>
					<?php if($feedurl) : ?>
						<a target="_blank" class="myfeed pull-right" href="<?php echo $feedurl; ?>" title="Feed"><i class="icon2-feed-2"></i></a>
					<?php endif; ?>
					<?php if($twitterurl) : ?>
						<a target="_blank" class="mytwitter pull-right" href="<?php echo $twitterurl; ?>" title="Twitter"><i class="icon2-twitter-2"></i></a>
					<?php endif; ?>
					<?php if($googleurl) : ?>
						<a target="_blank" class="mygoogle pull-right" href="<?php echo $googleurl; ?>" title="Google"><i class="icon2-google-plus-3"></i></a>
					<?php endif; ?>
					<?php if($facebookurl) : ?>
						<a target="_blank" class="myfacebook pull-right" href="<?php echo $facebookurl; ?>" title="Facebook"><i class="icon2-facebook-2"></i></a>
					<?php endif; ?>
					</div>
				</div>	
			</div>
		</div>
	</div>

<?php if($this->countModules('position-1')) : ?>
		<div id="topmenu" class="container navbar navbar-inverse">
				<div class="navbar-inner">
						<span class="brand hidden-tablet hidden-desktop">MENU</span>
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-downarrow"></span>
						</a>
						<div class="nav-collapse collapse">
							<jdoc:include type="modules" name="position-1" style="none" />
						</div>
				</div>
		</div> 
<?php endif; ?>	
	
    
  


        <?php if($this->countModules('banner-top')) : ?>
	<div id="slideshow-mod" class="container">
		<div id="slsh" class="row-fluid">
		<jdoc:include type="modules" name="banner-top" style="html5" />  
		</div>
	</div>
<?php endif; ?>
<?php if($this->countModules('slideshow')) : ?>
	<div id="slideshow-mod" class="container">
		<div id="slsh" class="row-fluid">
		<jdoc:include type="modules" name="slideshow" style="html5" />  
		</div>
	</div>
<?php endif; ?>


	<div id="wrap" class="container">




        <?php if($this->countModules('position-2')) : ?>
			<div id="pathway">
				<jdoc:include type="modules" name="position-2" />
			</div>
		<?php endif; ?> 
		<div id="cbody" class="row-fluid">
			<?php if($showLeftColumn) : ?>
				<div id="sidebar" class="span<?php echo $leftColumnWidth; ?>">     
					<jdoc:include type="modules" name="position-7" style="xhtml" />  
                    
				</div>


			<?php endif; ?>
			<div id="content60" class="span<?php echo $contentWidth; ?>">    
				<div id="content">
					<jdoc:include type="message" />
					<?php require_once(dirname(__FILE__) .'/css/system.php'); ?>
					<jdoc:include type="component" /> 
                    
				</div> 
			</div>
			<?php if($showRightColumn) : ?>
				<div id="sidebar-2" class="span<?php echo $rightColumnWidth; ?>">     
					<jdoc:include type="modules" name="position-6" style="xhtml" />     
				</div>
			<?php endif; ?>
		</div>
  
<!--end of wrap-->
	</div>


<div id="footerwrap"> 
	<div id="footer" class="container">  
		<?php if($this->countModules('position-14')) : ?>	
			<jdoc:include type="modules" name="position-14" style="xhtml" />    
		<?php endif; ?>
	</div>
	<div id="a4j" class="container">© Натуральний бджолиний мед 2014 </div>
    
<!-- Start SiteHeart code -->
<script>
(function(){
var widget_id = 686085;
_shcp =[{widget_id : widget_id}];
var lang =(navigator.language || navigator.systemLanguage 
|| navigator.userLanguage ||"en")
.substr(0,2).toLowerCase();
var url ="widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
var hcc = document.createElement("script");
hcc.type ="text/javascript";
hcc.async =true;
hcc.src =("https:"== document.location.protocol ?"https":"http")
+"://"+ url;
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();
</script>
<!-- End SiteHeart code -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47804164-2', 'honey.ck.ua');
  ga('send', 'pageview');

</script>
</div>

</body>
</html>	