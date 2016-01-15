<?

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

include "vendor/autoload.php";

include "lib/Pinterest/Pinterest.php";
/*

  $dir = opendir(dirname(__FILE__)."/lib");
    $files = array();
    while ($current = readdir($dir)){
        if( $current != "." && $current != "..") {
        

               if(eregi(".*\.txt", $path.$current) and $activado){
                
                echo $current.PHP_EOL;
                memoriza("./corpus/".$current);
            }
            
        }
    }
*/




print_r($argv);
if (!class_exists($argv[1])){

    echo 'There is no Robot for '.$argv[1].' at /lib/'.PHP_EOL;
    echo 'Contribute!';
    die();
}

$robot = new $argv[1]($argv);
if (!isset($argv[2]) or !is_callable( $robot->$argv[2]())){

    echo 'The Robot '.$argv[1].' doesn\'t recognize the command '.$argv[2].PHP_EOL;
    echo 'Available commands:'.PHP_EOL;
    echo '------------------------------'.PHP_EOL;
    $metodos_clase = get_class_methods($robot);

    foreach ($metodos_clase as $nombre_metodo) {
        if ($nombre_metodo != "__construct")
        echo "[+] $nombre_metodo".PHP_EOL;
    }
  echo '------------------------------'.PHP_EOL;
}

$robot->$argv[2]($argv);
//
echo '============================================================'.PHP_EOL;

