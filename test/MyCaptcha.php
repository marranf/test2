<?php
    namespace test;
    
    class MyCaptcha 
    {
        private static $m_code="";
        
        public function __construct()
        {   
                     
        }
        private static function image()
        {
            $im = imagecreate(80,31) or die ("Error creating image"); ; 
            imageColorAllocate($im,246,246,246); 
            $textcolor = imageColorAllocate($im,0,0,255); 
            $line = imageColorAllocate($im,255,0,0);
            imagestring($im,20,20,10,self::$m_code,$textcolor); 
            $line = imageColorAllocate($im,255,0,0);
            imageline($im,20,0,80,31,$line); 
            imageline($im,0,10,50,0,$line); 
            imageline($im,90,5,40,31,$line); 
            imageline($im,0,31,70,0,$line); 

         //   header("Content-Type: image/jpeg");
            imagejpeg($im,self::$m_code.'.jpeg');
           // imagejpeg($im);
        }
        public static function get()
        {
            self::$m_code=self::generate_code();
            self::image();
            return self::$m_code;
           
        }
        public function generate_code()
        {
            $alpha = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM"; 
            for($i=0;$i<4;$i++) 
            $code.= $alpha[rand(0,strlen($alpha)-1)];
            return $code;
        }
    }
?>
