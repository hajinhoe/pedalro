<?php
require 'src/Sunra/PhpSimple/HtmlDomParser.php';
use Sunra\PhpSimple\HtmlDomParser;

$dom = HtmlDomParser::file_get_html( 'http://www.pedalro.kr/station/station.do?method=stationState&menuIdx=st_01' );
$elems = $dom->find('td.style1');

if ($_GET['station'] == "all") {
    foreach ($elems as $key => $value) {
        if ($key > 8) {
            if (($key + 1) % 3 == 0) {
                $k = $key + 1;
                $j = $key + 2;
                $first = strpos($elems[$key],";\">") + 3;
                $length = strrpos($elems[$key],'a') - strpos($elems[$key],">");
                $name = substr($elems[$key], $first, $length);
                print "<p class='name'>&#x1F6B4; $name</p><p class='available'>전체 : $elems[$k] 대여가능 : $elems[$j]</p>";
            }
        }
    }
} else {
    foreach ($elems as $key => $value) {
        if(strpos($value, $_GET['station'])) {
            $k = $key + 1;
            $j = $key + 2;
            $first = strpos($elems[$key],";\">") + 3;
            $length = strrpos($elems[$key],'a') - strpos($elems[$key],">");
            $name = substr($elems[$key], $first, $length);
            print "<p class='name'>&#x1F6B4; $name</p><p class='available'>전체 : $elems[$k] 대여가능 : $elems[$j]</p>";
        }
    }
}

?>