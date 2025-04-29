<h1>YYEYES! PHP</h1>
<?php
    echo 'Разрабатываю перевод даты' . "<br>";

    $date = '2025-03-23 12:39:50';
    
    date_default_timezone_set("Europe/Moscow");
    // echo date("d.m.Y H:i:s T", time()) . "<br>";
    
    $raznost = floor((time() - strtotime($date)));
    echo 'Now = ' . date("d.m.Y H:i:s", time()) . ' ' . date("d.m.Y H:i:s", strtotime($date)) . ' ' . "Raznost = $raznost" . "<br>";
    echo 'Now = ' . time() . ' ' . strtotime($date) . ' ' . "Raznost = $raznost" . "<br>";
    // echo time() . ' ' . strtotime
    
    $month = ['янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек'][(int)date('m', strtotime($date))];
    echo ">>>> $month <<<<<";
    if (((int)date("Y", time()) - (int)date("Y", strtotime($date)))) {
        echo date('d', strtotime($date)) . " $month " . date('Y', strtotime($date));;
    } else {
        switch($raznost) {
            case $raznost < 60                 : echo floor($raznost) . ' сек назад'; break;
            case $raznost < (60 * 60)          : echo floor($raznost / 60) . ' мин назад'; break; 
            case $raznost < (60 * 60 * 24)     : echo floor($raznost / (60 * 60)) . ' ч назад'; break; 
            case $raznost < (60 * 60 * 24 * 7) : echo floor($raznost / (60 * 60 * 24)) . ' д назад'; break; 
            default                            : echo date('d', strtotime($date)) . " $month";
                                        
        }
    }
?>
