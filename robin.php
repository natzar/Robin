<?
set_time_limit(0);
echo PHP_EOL;
echo '============================================================'.PHP_EOL;
echo 'ROBIN            '.PHP_EOL;
echo 'Crawling & Scraping Toolkit   '.PHP_EOL;  
echo '@author: betolopezayesa@gmail.com / @betoayesa'.PHP_EOL;
echo '@version: 1.0 15/1/2016'.PHP_EOL;
echo 'The MIT License (MIT)'.PHP_EOL;
echo 'Contribute https://github.com/natzar/robin'.PHP_EOL;
echo 'Copyright (c) 2016 Humberto López (betolopezayesa@gmail.com)'.PHP_EOL.PHP_EOL;
echo '============================================================'.PHP_EOL;
echo 'THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.'.PHP_EOL;
echo PHP_EOL.PHP_EOL;


include_once "vendor/uagent.php";
include_once "vendor/PHPCrawl_081/classes/phpcrawler.class.php";
include_once "vendor/simplehtmldom-1.5/simple_html_dom.php";
include_once "robots/Robot.php";

// Load all Robots classes
$dir = opendir(dirname(__FILE__)."/robots");
$robotsList = array();
while ($current = readdir($dir)){
    if( $current != "." && $current != "..") {
        if (is_dir(dirname(__FILE__)."/robots/".$current)){
            if (file_exists(dirname(__FILE__)."/robots/".$current."/".$current.".php")){
                $robotsList[] = $current;
                include_once dirname(__FILE__)."/robots/".$current."/".$current.".php";
            }else{
                echo $current.' not installed properly'.PHP_EOL;
            }
        }
    }
}
echo "Installed Robots: ".implode(",",$robotsList).PHP_EOL;


if (!class_exists($argv[1])){
    echo 'There is no Robot for '.$argv[1].' at /robots/'.PHP_EOL;
    echo 'Contribute!';
    die();
}

$robot = new $argv[1]($argv);

if (!isset($argv[2]) or !fe( $robot->$argv[2])){
    echo 'The Robot '.$argv[1].' doesn\'t recognize the command '.$argv[2].PHP_EOL;
    echo 'Available commands:'.PHP_EOL;
    echo '------------------------------'.PHP_EOL;
    $metodos_clase = get_class_methods($robot);

    foreach ($metodos_clase as $nombre_metodo) {
        if ($nombre_metodo != "__construct")
        echo "[+] $nombre_metodo".PHP_EOL;
    }
  echo '------------------------------'.PHP_EOL;
  die();
}


// Run it
$robot-> $argv[2]();


echo '============================================================'.PHP_EOL;

