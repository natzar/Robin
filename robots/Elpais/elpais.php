<?
class Elpais extends Robot{


    function cultura(){
       /*
 $keyword = $this->args[3];
        if (!isset($keyword)){
            echo '[!] Error Keyword for search missing';
            die();
        }
*/
        include dirname(__FILE__)."elpais-scraper.php";
    }

}