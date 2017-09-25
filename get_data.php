<?php //이 파일은 station 데이터를 읽어서 객체로 만든 후 JSON으로 자바스크립트에 넘겨준다.
class Station {
    public $position = array(); //x
    public $name;
    public $total;
    public $available;

    public function __construct($position, $name, $total, $available)
    {
        $this -> position = $position;
        $this -> name = $name;
        $this -> total = $total;
        $this -> available = $available;
    }
}

$stations = array();

require 'src/Sunra/PhpSimple/HtmlDomParser.php';
use Sunra\PhpSimple\HtmlDomParser;

$dom = HtmlDomParser::file_get_html( 'http://www.pedalro.kr/station/station.do?method=stationState&menuIdx=st_01' );
$elems = $dom->find('td.style1');

foreach ($elems as $key => $value) {
    if ($key > 8) {
        if (($key + 1) % 3 == 0) {

            $k = $key + 1; //전체수
            $j = $key + 2; //가능수

            $first = strpos($elems[$key],";\">") + 3;
            $length = strrpos($elems[$key],'a') - strpos($elems[$key],">");
            $name = substr($elems[$key], $first, $length);

            //경도, 위도를 x&y꼴로 받아옵니다.
            $positions = substr($elems[$key],strpos($elems[$key],'37.'),-(strlen($elems[$key])-$first + 5));

            while(!(is_numeric(substr($positions, 3,1)))) {
                $positions = substr($positions, strpos($positions,'37.', 3),strlen($positions));
            }
            $name = preg_replace("/\s+/", "", $name);
            $name = preg_replace("/<\/a><\/td>/", "", $name);
            $position = explode('&',$positions);
            $total = preg_replace("/\s+/", "", $elems[$k]);
            $total = preg_replace("/<\/td>/", "", $total);
            $available = preg_replace("/\s+/", "", $elems[$j]);
            $available = preg_replace("/<\/td>/", "", $available);
            $total = strip_tags($total);
            $available = strip_tags($available);
            array_push($stations, new Station($position, $name, $total, $available));
        }
    }
}

$staInfo = json_encode($stations);
echo $staInfo;
?>