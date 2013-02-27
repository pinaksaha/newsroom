<?php
	error_reporting(0);
    class Article
    {
	    public $__title;
	    public $__content;
	    public $__imgUrl;
	    function __construct($title,$content,$imgUrl)
	    
	    {
		    $this->__title = $title;
		    $this->__content = $content;
		    $this->__imgUrl = $imgUrl;
	    }
    }
    
    function sanitize($content)
    {
	    $content = explode("src=", $content);
	    $content = explode('width="630" />',$content[1]);
	    $content[1] = strip_tags($content[1],"<a>");
	    return $content;
    }
   
   	print "Getting Verge data. \n";
	$verge = simplexml_load_file('http://www.theverge.com/rss/index.xml');
    $newsArray;

    
    print "Creating Storage Area. \n";
    
    $dir = './news/'.date("m_d_Y").'/';
    if(!is_dir($dir))
    {
    	mkdir($dir,0777);
    }
    
    print "Creating file. \n";
    
    $fileName = $dir. date("H_i_s").".json";
    
    //echo $fileName;
    
    $handel = fopen($fileName, 'x+');
    
    print "Storing data to file. \n";
    
    $img = $json;
	$json = json_encode($verge);
	
	$json = json_decode($json,true);
	
	$count = count($json);
	
	
	for($i= 0; $i < $count; $i++)
	{
		
		$bodyContent = $json[entry][$i][content];
		$bodyContent = sanitize($bodyContent);
		$news = new Article($json[entry][$i][title],$bodyContent[1],$bodyContent[0]);
		$newsArray[] = clone $news;
	}
	
	$newsArray = json_encode($newsArray);
	$newsArray = json_decode($newsArray);
	$newsArray = serialize($newsArray);
	fwrite($handel,$newsArray);
	fclose($handel);
	
	print "done!!! \n";
	
?>