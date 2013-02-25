<?php
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
	    //$content[1] = strip_tags($content[1],"");
	    return $content;
    }
    
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

	
?>