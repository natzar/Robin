<?

class EbayCrawler extends PHPCrawler 
{

  function handleDocumentInfo($DocInfo) 
  {
      
   
     echo "Page requested: ".$DocInfo->url." (".$DocInfo->http_status_code.")".PHP_EOL; 
     if ($DocInfo->http_status_code =='200' and $DocInfo->received and  $DocInfo->content_type =='text/html' and isset($DocInfo->content)){
			$html = $DocInfo->content;
			$host = $DocInfo->host;   
			$urlPosted = $DocInfo->url;
			$htmldom= new simple_html_dom();
			$htmldom->load($html);
			$data = array();
			$images= $htmldom->find('ul#ListViewInner li img');
			echo 'Total images'.		count($images).''.PHP_EOL;
			$i = 0;
			foreach ($images as $raw_links) {
				echo $raw_links->alt."','1','".$raw_links->src."\n";
				$filename = '_e__'.$i.'.jpg' ;
				copy(str_replace("l225 ","l900",$raw_links->src),'downloads/'.$filename);				
			$i++; 
		}
		
		
		

		





		
			echo json_encode($data).PHP_EOL;
			//$writer->writeRow(json_encode($data));
unset($data);

unset($htmldom);
	}
  }
  } 

       	
