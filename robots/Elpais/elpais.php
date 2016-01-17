<?
class Elpais extends Robot{


    function homepage(){  
        $url = "http://www.elpais.com";
        include dirname(__FILE__)."/elpais-scraper.php";
    }

    function cultura(){  
        $url = "http://cultura.elpais.com";
        include dirname(__FILE__)."/elpais-scraper.php";
    }
    function economia(){  
        $url = "http://economia.elpais.com";
        include dirname(__FILE__)."/elpais-scraper.php";
    }
}