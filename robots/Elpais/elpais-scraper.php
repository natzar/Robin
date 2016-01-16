<?
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
echo $content;
echo PHP_EOL.PHP_EOL;

}