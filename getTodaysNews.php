<?php 
	
	function getNews()
	{
		$dir = '../news/';
		
		if(is_dir($dir))
		{	
			$files = scandir($dir,1);
		}
		
		//print($files[0]);
	
		$todayDir = $files[0];
		$dir = $dir.$files[0];
		//echo($dir);
		
		$filesDir = scandir($dir,1);
		$content;
		$num = count($filesDir)-2;
		
		for($i=0;$i<$num;$i++)
		{
			$newsFile = $dir."/" . $filesDir[$i];
			//print($newsFile);
			$handel = fopen($newsFile, "r");
			$content = fread($handel, filesize($newsFile));
			$content = unserialize($content);
			fclose($handel);
		}
		
		return $content;
	}	
	
	
?>