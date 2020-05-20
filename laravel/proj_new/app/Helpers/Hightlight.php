<?php


namespace App\Helpers;


class Hightlight
{
    public static function show($input, $paramSearch, $field)
    {
        if ($paramSearch['value'] == '') {
            return '123' . $input;
        }
        if ($paramSearch['field'] == $field || $paramSearch['field'] == 'all'){
            return preg_replace("/".preg_quote($paramSearch['value'],"/")."/","<span class='highlight'>$0</span>",$input);
        }
        echo '<pre>';
        print_r($paramSearch);
        echo '</pre>';
return $input;
}
}
