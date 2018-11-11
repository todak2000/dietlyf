<?php ob_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
		<!-- Change paths to match your server's -->
		<LINK rel="stylesheet" href="themes/simple_blue/style.css" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
		<script type="text/javascript" src="script.js"></script>
		<title>DiabCare Chat</title>
		<style>
			#wcchat .right_col {
				padding-bottom: 50px;
				padding-right: 30px;
				margin-right: 30px;
				margin-left: 5px;
				width:15%!important;
				vertical-align: top;
				padding: 5px;
				color: #fff;
    			background-color: #232323;
				overflow: auto;
				border-radius: 0 10px 10px 0;
				background-image: url('images/bgrcol.jpg');
				background-repeat: repeat-x;
				float: right;
			}
			#wc_topic_box{
				display:none;
			}
			#wcchat .themes {
				padding-top: 20px;
				padding-bottom: 10px;
				text-align: center;
				display: none;
			}
			#wcchat {
				font-family: KoHo;
				font-size: 14px;
				background: -webkit-linear-gradient( #1C304E, #365899, #1C304E);
				color: black;
				width:100%;
				height:80vh;
			}
			#wcchat .left_col {
				margin-bottom: 50px;
				margin-left: 50px;
				vertical-align: top;
				overflow: hidden;
				border-radius: 10px 0px 0px 10px;
				color:#fff;
				background-color:#52555af5!important;
			}
		</style>
	</head>
	<body>
		<h1 style="text-align: center; font-weight: normal">DiabCare Chat Forum</h1>
		<?php

			include 'wcchat.class.php';    # Change this to match your server's path to "wcchat.class.php"
			$chat = new WcChat();
                  echo $chat->printIndex('EMBED');
		?>	
	</body>
</html>
<?php ob_end_flush(); ?>