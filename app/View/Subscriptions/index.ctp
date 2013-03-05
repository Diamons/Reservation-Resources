<style type="text/css">
h2{
	text-align: center; 
	font-size: 48px; 
	line-height: 64px; 
	text-transform: none; 
	color: #666; 
	font-weight: 400;
	margin-top: 10px;
}

ul{
	margin-top: 10px;
	font-size: 18px;
	line-height: 28px;
	color: #111;
	display: list-style;
	margin-left: 120px;
}

ul, li{
	
	text-align: left;
	list-style: disc;
}

#sb-player.html{
	box-shadow: 0 0 10px #888;
	text-align: center;
	background: url('http://reservationresources.com/img/snow.png');
}

.container_middle{
	padding: 10px;
	text-align: left;
	width: 90%;
	display: inline-block;
}

#sb-player > div{
	height: auto !important;
}

#subscribe_area{
	background: #079DC8;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(7, 157, 200, 1)), color-stop(100%,rgba(0, 118, 191, 1)));
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#079dc8', endColorstr='#0076bf',GradientType=0 );
-moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888;
padding: 10px;
margin-top: 20px;
}

#subscribe_area input[type="text"]{
	padding: 8px;
	border: 1px solid #ECECEC;
	color: #888;
	border-radius: 3px;
	width: 95%;
	display: inline-block;
	margin: auto;
	background: #FFF;
}

#subscribe_area label{
	text-align: left;
	text-transform: uppercase;
	font-family: "Open Sans", "Arial", sans-serif;
	font-weight: 700;
	letter-spacing: 2px;
	margin-left: 18px;
	margin-bottom: 15px;
	font-size: 18px;
	color: #eeeeee;
	margin-top: 10px;
}

#subscribe_area div.submit{
	margin: 0;
	float: right;
	
}

#subscribe_area div.submit input{
	background: #88BE3E;
	color: #FFF;
	border: none;
	margin-top: 10px;
	padding: 10px 35px;
	border-radius: 10px;
	font-weight: 700;
	letter-spacing: 1px;
	text-transform: uppercase;
}

#subscribe_area div.submit input:hover{
	cursor: pointer;
	background: #8BC33E;
}
</style>
<div id="subscribeAjaxContent">
	<h2><b>Subscribe</b> to our Newsletter</h2>
	<img id="logo2" style="margin-top: 10px;" src="https://twimg0-a.akamaihd.net/profile_images/2406779683/hzd3ynvn1s7uzkay27uo.png" />
	<div class="container_middle">
		Subscribe to our monthly newsletter to receive exclusive deals and updates from Reservation Resources!
	<ul>
		<li>Get accessive to exclusive deals and promotions!</li>
		<li>Featured destinations and top travel spots!</li>
		<li>Beautiful and affordable places to stay!</li>
	</ul>
	</div>
	<div class="clearfix" id="subscribe_area">
		<?php 
echo $this->Form->create('Subscription', array('Subscription'));
echo $this->Form->input('Subscription.name');
echo $this->Form->input('Subscription.email', array('error' => false)); ?>
<div style="font-size: 16px; margin-top: 5px; color: #FFF;">*Your e-mail address will not be shared.</div>
<?php
echo $this->Form->submit('Subscribe', array('id' => 'SubscribeEmail')); 
?>
	</div>
</div>
