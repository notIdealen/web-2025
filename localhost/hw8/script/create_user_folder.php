<?php
const TRANSLETER_RUS_TO_EN = ['а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'j', 'з'=>'z', 'и'=>'i', 'й'=>'y', 'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'u', 'ф'=>'f', 'х'=>'h', 'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sch', 'ъ'=>'?', 'ы'=>'i', 'ь'=>'?', 'э'=>'e', 'ю'=>'yu', 'я'=>'ya', '_'=>'_'];

function createUserFolder(int $user_id, string $name, string $lastname) : string {
    $folderName = $user_id .  '_' . mb_strtolower($name) . '_' . mb_strtolower($lastname);
    $ar = str_split($folderName);
    // $nar = [];
    $folderName = '';
    $i= true;
    foreach($ar as $k => $v) {
        if (ord($v) > 122 && $i) {
            $i = false;
            $a = $ar[$k] . $ar[$k+1];
            // array_push($nar, TRANSLETER_RUS_TO_EN[$a]); 
            $folderName = $folderName . $a;
        } else {
            $i = true;
            if (ord($v) <= 122) {
                array_push($nar, $v);
                $folderName = $folderName . $v;
            }
        }
    }
    // $folderName = implode('', $nar);
    return $folderName;
}
?>