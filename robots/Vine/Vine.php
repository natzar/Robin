<?
class Vine extends Robot{


    function searchanddownload(){
        $keyword = $this->args[3];
        if (!isset($keyword)){
            echo '[!] Error Keyword for search missing';
            die();
        }
        include dirname(__FILE__)."/Vine-scraper.php";
    }

}