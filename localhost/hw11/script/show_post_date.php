<?php
function showPostDate(string $date) {
    date_default_timezone_set("Europe/Moscow");
    $raznost = floor((time() - strtotime($date)));
    $month = ['NoMonth', 'янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек'][(int)date('m', strtotime($date))];

    if (((int)date("Y", time()) - (int)date("Y", strtotime($date)))) {
        $date = date('d', strtotime($date)) . " $month " . date('Y', strtotime($date));
    } else {
        switch($raznost) {
            case $raznost < 60                 : $date = floor($raznost) . ' сек назад'; break;
            case $raznost < (60 * 60)          : $date = floor($raznost / 60) . ' мин назад'; break; 
            case $raznost < (60 * 60 * 24)     : $date = floor($raznost / (60 * 60)) . ' ч назад'; break; 
            case $raznost < (60 * 60 * 24 * 7) : $date = floor($raznost / (60 * 60 * 24)) . ' д назад'; break; 
            default                            : $date =  date('d', strtotime($date)) . " $month";
                                        
        }
    }
    return $date; 
}
?>