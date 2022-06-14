<?php
    class Formate{
        public function Date($date){
            return date('F j, Y,g:i a',strtotime($date));
        }

        public function read($read,$limite = 100){
            $text = $read." ";
            $text = substr($text,0,$limite);
            $text = substr($text,0,strrpos($text,' '));
            $text = $text."...";
            return $text;
        }

        public function validation($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;

        }
    }
?>