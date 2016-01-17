<?
set_time_limit(0);
date_default_timezone_set('Europe/Madrid'); 
system("clear");
/*

    ~ Robin ~
    A command line wrapper for different Crawlers and Scrapers


*/
echo PHP_EOL;
echo '==---------------------------------------------------------------=='.PHP_EOL;
echo '~ ROBIN ~            '.PHP_EOL;
echo 'Crawling & Scraping Php Toolkit   '.PHP_EOL; 
echo 'THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND'.PHP_EOL; 
echo '@author: betolopezayesa@gmail.com / @betoayesa'.PHP_EOL;
echo '@version: alpha 15/1/2016'.PHP_EOL;
echo '@Fork it: https://github.com/natzar/robin'.PHP_EOL;
echo '@license: MIT License (MIT) '.PHP_EOL;
echo '[i] Usage: php robin.php <Robot> <command> <keyword|arguments|parameters>'.PHP_EOL;

include_once "vendor/uagent.php";
include_once "vendor/PHPCrawl_081/classes/phpcrawler.class.php";
include_once "vendor/simplehtmldom-1.5/simple_html_dom.php";
include_once "robots/OutputRobot.php";
include_once "robots/Robot.php";

// Load all Robots classes
$dir = opendir(dirname(__FILE__)."/robots");
$robotsList = array();
$errors = array();
while ($current = readdir($dir)){
    if( $current != "." && $current != "..") {
        if (is_dir(dirname(__FILE__)."/robots/".$current)){
            if (file_exists(dirname(__FILE__)."/robots/".$current."/".$current.".php")){
                $robotsList[] = $current;
                include_once dirname(__FILE__)."/robots/".$current."/".$current.".php";
            }else{
                $errors[] = $current;
            }
        }
    } 
}
echo '==---------------------------------------------------------------=='.PHP_EOL;
echo "[i] Installed Robots: ".PHP_EOL."    [+] ".implode(PHP_EOL."    [+] ",$robotsList).".".PHP_EOL;
if (count($errors) > 0) echo "[i] Errors found: ".implode(", ",$errors).".".PHP_EOL;
echo '==---------------------------------------------------------------=='.PHP_EOL;

if (!isset($argv[1]) or !class_exists($argv[1]))    die('[i] Type just php robin.php <Robot> for available commands'.PHP_EOL);

$robot = new $argv[1]($argv);

if (!isset($argv[2]) or !is_callable(array($argv[1],$argv[2]))){      
    echo 'Available commands:'.PHP_EOL;   
    $metodos_clase = get_class_methods($robot);
    foreach ($metodos_clase as $nombre_metodo) {
        if ($nombre_metodo != "__construct")
        echo "[+] $nombre_metodo - Run 'php robin.php $argv[1] $nombre_metodo'".PHP_EOL;
    }
    echo '==---------------------------------------------------------------=='.PHP_EOL;
    die();
}

// Everything loaded, Method found in Robot, Run it
$robot-> $argv[2]();


echo '==---------------------------------------------------------------=='.PHP_EOL;

