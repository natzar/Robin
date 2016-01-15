<?

class EbayCrawler extends PHPCrawler 
{

  function handleDocumentInfo($DocInfo) 
  {
      
    $link = mysql_connect("db..io", "username","pass");
	mysql_select_db("x", $link);
	mysql_query("SET NAMES utf-8",$link);
	
     echo "Page requested: ".$DocInfo->url." (".$DocInfo->http_status_code.")<br>"; 
     if ($DocInfo->http_status_code =='200' and $DocInfo->received and  $DocInfo->content_type =='text/html' and isset($DocInfo->content)){
			$html = $DocInfo->content;
			$host = $DocInfo->host;   
			$urlPosted = $DocInfo->url;
			$htmldom= new simple_html_dom();
			$htmldom->load($html);
			$data = array();
			$images= $htmldom->find('img[itemprop=image]');
			echo '<hr>'.		count($images).'<hr>';
			$i = 0;
			foreach ($images as $raw_links) {
				echo $raw_links->alt."','1','".$raw_links->src."\n";
				$filename = '_e__'.$i.'.jpg' ;
				copy(str_replace("l225 ","l900",$raw_links->src),'../iguana.io/data/img/'.$filename);
				mysql_query("INSERT INTO items (usersId,categorysId,item_date,title,state,img1) VALUES ('".rand(36,234)."','2',NOW(),'".utf8_encode($raw_links->alt)."','1','".$filename."')",$link);
			$i++; 
		}
		
		
		

		





		
			echo json_encode($data);
			//$writer->writeRow(json_encode($data));
unset($data);

unset($htmldom);
	}
  }
  } 

       	
