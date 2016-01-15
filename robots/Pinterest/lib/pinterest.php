<?

	set_time_limit(0);
	ini_set('display_errors', '1');

	#Include libraries
	
	include_once dirname(__FILE__)."/../../vendor/simplehtmldom-1.5/simple_html_dom.php";
	include_once dirname(__FILE__)."/../../vendor/uagent.php";
	include_once dirname(__FILE__)."/../../vendor/PHPCrawl_081/classes/phpcrawler.class.php";
	include_once dirname(__FILE__)."/pinterestClass.php";

	//$writer = new Writer('pinterest.csv');	
	$i = 0;
	$LIMIT_I = 5000;
	echo '<hr> Empieza crawler:<br>';
	$crawler = new PinterestCrawler(); 
	$crawler->obeyRobotsTxt(true);
	$crawler->addContentTypeReceiveRule("#text/html#");
	$crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png|js|rss|xml|atom|feed)$# i");
    $crawler->setPageLimit(4); // Set page-limit to 50 for testing 
    echo 'HELLO: '.count($URLS).'<hr>';
    $URLS = array(   	array('','',$keyword)	);     	
		
	while (isset($URLS[$i]) and $i < $LIMIT_I):		
		$row = $URLS[$i];
		
		$row[2] = "http://www.pinterest.com/search/?q=".$row[2];
		$crawler->setURL($row[2]);
		$UAGENT = new UAgent();
		$crawler->setUserAgentString ($UAGENT->random_uagent()); 	
		$crawler->go(); 
	
		# REPORTING
		$report = $crawler->getProcessReport(); 

		if (PHP_SAPI == "cli") $lb = "\n"; 
		else $lb = "<br />"; 
   
		echo $lb."I: ".$i." "; 
		echo "Links followed: ".$report->links_followed." "; 
		echo "Documents received: ".$report->files_received." "; 
		//echo "Bytes received: ".$report->bytes_received." bytes".$lb; 
		echo "Process runtime: ".$report->process_runtime." sec".$lb; 
		echo $lb;
		flush();
		unset($report);
		//sleep(rand(1,3));
		$i++;
	endwhile;

	
	
	
		
	
	
	
