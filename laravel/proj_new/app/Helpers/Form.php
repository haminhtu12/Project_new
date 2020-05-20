<?php
namespace App\Helpers;
use Config;

class Form
{
    public static function show($elements)
    {
        $xhtml = '';

       foreach ($elements as $element){
        $xhtml.= self::formgroup($element);
}
return $xhtml;

    }
 public  static function  formgroup($elements ,$params =null){
        $type = isset($elements['type']) ? $elements['type'] : 'input';
     $xhtml = '';

     switch ($type) {
         case 'input' :
             $xhtml.= sprintf("
                                           <div class=\"form-group\">
                                           %s
                                             <div class=\"col-md-6 col-sm-6 col-xs-12\">
                                       %s
                                            </div>
                                         </div>",$elements['label'],$elements['element']);

             break;
         case 'btn-submit' :
             $xhtml.= sprintf("
                                           <div class=\"In_solid\"></div>
                                             <div class=\"form-group\">
                                             <div class=\"col - md - 6 col - sm - 6 col - xs - 12 col-md-offset-3\">
                                             %s
                                             </div>

                                            </div>
                                         </div>",$elements['element']);

     }
        return $xhtml;
 }
}
