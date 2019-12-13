<?php
class Common extends CI_Controller 
  {
        // Truncates string without cutting off words
        public function truncate($string,$length=100,$append="&hellip;") 
        {
                $string = trim($string);
                
                if(strlen($string) > $length) {
                        $string = wordwrap($string, $length);
                        $string = explode("\n", $string, 2);
                        $string = $string[0] . $append;
                }
                
                return $string;
        }
  } 