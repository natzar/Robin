<?

	set_time_limit(0);
	ini_set('display_errors', '1');

	#Include libraries
	include "lib/vendor/easy-csv-master/lib/EasyCSV/AbstractBase.php";
	include "lib/vendor/easy-csv-master/lib/EasyCSV/Reader.php";
	include "lib/vendor/easy-csv-master/lib/EasyCSV/Writer.php";
	include_once "lib/vendor/simplehtmldom-1.5/simple_html_dom.php";
	include "lib/scraper-class/uagent.php";
	include "lib/vendor/PHPCrawl_081/classes/phpcrawler.class.php";
	include "lib/ebay.php";
	
	$i = 0;
	$LIMIT_I = 5000;
	echo '<hr> Empieza crawler:<br>';
	$crawler = new EbayCrawler(); 
	$crawler->obeyRobotsTxt(true);
	$crawler->addContentTypeReceiveRule("#text/html#");
	$crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png|js|rss|xml|atom|feed)$# i");
	$crawler->setPageLimit(4); // Set page-limit to 50 for testing 	    
    $URLS = array(
	     array('','','libros'),
	);     	

	while (isset($URLS[$i]) and $i < $LIMIT_I):		
		$row = $URLS[$i];
		
		$row[2] = "http://www.ebay.es/sch/i.html?_sacat=0&_nkw=".$row[2];
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
		echo "Process runtime: ".$report->process_runtime." sec".$lb; 
		echo $lb;
		flush();
		unset($report);
		//sleep(rand(1,3));
		$i++;
		
	endwhile;

	
	
	
		
	
	
	
