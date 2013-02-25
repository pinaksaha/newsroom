<?php
	$verge = simplexml_load_file('http://www.theverge.com/rss/index.xml');
    $newsArray;
    
    $dir = './news/'.date("m_d_Y").'/';
    if(!is_dir($dir))
    {
    	mkdir($dir,0777);
    }
    
    $fileName = $dir. date("H_i_s").".json";
    
    echo $fileName;
    
    $handel = fopen($fileName, 'x+');
    
    class Article
    {
	    public $__title;
	    public $__content;
	    public $__author;
	    function __construct($title,$content,$author)
	    
	    {
		    $this->__title = $title;
		    $this->__content = $content;
		    $this->__author = $author;
	    }
    }
    
    
    $img = $json;
	$json = json_encode($verge);
	
	$json = json_decode($json,true);
	
	$count = count($json);
	
	
	for($i= 0; $i < $count; $i++)
	{
		
		
		$author="";
		
		for($j=0;$j<count($json[entry][$i][author]);$j++)
		{
		 $author = $author ." " .$json[entry][$i][author][$j][name];
		 print($author);
		}
		
		$news = new Article($json[entry][$i][title],$json[entry][$i][content],$author);
		//$news = serialize($news);
		$newsArray[] = clone $news;
		
		$author = "";
	}
	$newsArray = serialize($newsArray);
	fwrite($handel,$newsArray);
	fclose($handel);
	var_dump($currentNews);
?>