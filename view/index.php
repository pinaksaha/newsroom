<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>News Room</title>
<link rel="stylesheet" type="text/css" href="./bootstrap/css/normalize.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/css/style.css">
<script type="text/javascript" src="./bootstrap/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="./bootstrap/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="./bootstrap/js/tick.js"></script>

</head>

<body>

	<?php 
		include("../getTodaysNews.php");
		$content = getNews();
		$content = json_encode($content);
		$content = json_decode($content);
	?>

	<div class="row">
			<?php 
				print "<ul id ='ticker'>";
				for($i =0; $i < count($content); $i++)
				{
					print "<li>";
					print "<a href='#$i' role='button' class='btn' data-toggle='modal'>".$content[$i]->__title."</a>";
					print "</li>";
				}
				print "</ul>";
			?>
	</div>
	<?php 
		
		for($i=0;$i<count($content);$i++)
		{
			print "<div id='$i' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
				print "<div class='modal-header'>";
					print "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>";
					print " <h3 id='$i'>". $content[$i]->__title."</h3>";
				print "</div>";
			
				print "<div class='modal-body'>";
				print "<img src=".$content[$i]->__imgUrl."/>";
				print "<p>".$content[$i]->__content."</p>";
				print "</div>";
				
				print "<div class='modal-footer'>";
					print "<button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>";
				print "</div>";
			print "</div>";						
		}
		
	?>
	

</body>
</html>
