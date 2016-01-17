<?
class OutputRobot
{
    private $vars;
    private static $instance;
 
    private function __construct()
    {
        $this->vars = array();
    }
 
 
    public function set($name, $value,$autoJsonFile = true)
    {
        if(!isset($this->vars[$name]))
        {
            $this->vars[$name] = $value;
        }
        if ($name == 'output' and $autoJsonFile){
            $this->jsonFile();
        }
    }
 
    public function get($name)
    {
        if(isset($this->vars[$name]))
        {
            return $this->vars[$name];
        }
    }
 
    public static function singleton()
    {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }
 
        return self::$instance;
    }
    public function print_vars(){
        return $this->vars;
    }

    private function jsonFile(){           // JSON RESULTS in file

        $d = Date("d-m-h-i-s");
        $file = fopen(dirname(__FILE__)."/../downloads/".$this->get('name')."-".$this->get('job')."-".$d.".json","w");

        fwrite($file,json_encode($this->get('output'))); 
        fclose($file);
        echo "[Completed] Results saved at /downloads/".$this->get('name')."-".$this->get('job')."-".$d.".json".PHP_EOL;
    }
}
