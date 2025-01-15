<?php

//$plainchara =//        $a='0';$b='1';$c='2';$d='3';$e='0';$f='0';$g='0';$h='0';$i='0';$j='0';$k='0';$l='0';$m='0';$n='0';$o='0';$p='0';$q='0';$r='0';$s='0';$t='0';$u='0';$v='0';$w='0';$x='0';$y='0';$z='0';
//$palintext= ;
// $sets[] = {'a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z'};
$sets = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
//$sets[] = 'abcdefghjkmnpqrstuvwxyz';
$letters = "faruq";
$chara = str_split($letters);
$carlenght=strlen($letters);
//print_r("String splited".$chara);
//print_r("car lenght".$carlenght);

for($x=0;$x<=$carlenght;$x++){
$output=array_search($chara[$x], $sets)+3;
//print_r($output);
//print_r($set[$output]);
echo $sets[$output];
    
}
//print_r(array_search($chara[$x], $sets, true)+3);


//echo ;
