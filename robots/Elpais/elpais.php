<?
class Elpais extends Robot{


    function homepage(){  
        $url = "http://www.elpais.com";
        require dirname(__FILE__)."/elpais-scraper.php";
    }

    function cultura(){  
        $url = "http://cultura.elpais.com";
        require dirname(__FILE__)."/elpais-scraper.php";
    }
    function economia(){  
        $url = "http://economia.elpais.com";
        require dirname(__FILE__)."/elpais-scraper.php";
    }
}