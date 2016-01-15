<?
include_once "../lib/vendor/simplehtmldom-1.5/simple_html_dom.php"; 

set_time_limit(0);
$server = "127.0.0.1";
$user_sql = "root";
$pass_sql = "";
$bd = "crazywriter";
$link = mysql_connect($server, $user_sql);
if (!mysql_select_db($bd)){
die("error mysql");
}

$html = str_get_html(file_get_contents("http://cultura.elpais.com"));

$content = $html->find('.columnas_principal_y_secundaria',0);
$links = $content->find('a');
foreach($links as $l):
    
    if ($l->href != "" and strstr($l->href,"http://elpais.com/")){
    echo $l->href.PHP_EOL;
    $inside = str_get_html(file_get_contents($l->href));
    
    $content = strip_tags($inside->find('h1',0)->plaintext).PHP_EOL;
    $content .= strip_tags($inside->find('h2',0)->plaintext).PHP_EOL; 
    $content .= strip_tags($inside->find('#cuerpo_noticia',0)->plaintext);
    memoriza($content);
    flush();
    sleep(rand(1,6));
    }
endforeach;





function memoriza($content){
global $link;
$content = html_entity_decode($content);
$content = str_replace("   ","",$content);
$content = str_replace("\n",". ",$content);
$aux = explode(". ",$content);
echo PHP_EOL;

echo substr($content,0,160)."... - Numero de líneas: ".count($aux);
foreach($aux as $frase){
if ($frase != "")
$y = mysql_query("INSERT INTO memoria (fuente,frase) VALUES ('elpais','".utf8_decode($frase)."')",$link);

}

}