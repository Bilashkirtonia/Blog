<?php 
    class Database{
        public $host = DB_HOST;
        public $user = USER;
        public $pass = PASS;
        public $dbname = DB_NAME;

        public $link;
        public $error;

        public function __construct(){
            $this->ConnectDB();
        }
        private function ConnectDB(){
            $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
            if(!$this->link){
                $this->erroe = "Connection Faild".$this->link->connect_error;
                return false;
            }
        }

        public function select($query){
           $result = $this->link->query($query) or die($this->link->error.__LINE__);
           if($result->num_rows > 0){
               return $result;
           }else{
               return false;
           }
        }

        public function insert($query){
            $insert_result = $this->link->query($query) or die($this->link->error.__LINE__);
            if($insert_result){
                return  $insert_result;
            }else{
                return false;
            }
         }

         public function update($query){
            $update_result = $this->link->query($query) or die($this->link->error.__LINE__);
            if($update_result){
                return $update_result;
            }else{
                return false;
            }
         }

         public function delete($query){
            $delete_result = $this->link->query($query) or die($this->link->error.__LINE__);
            if($delete_result){
                return  $delete_result;
            }else{
                return false;
            }
         }











































    }














?>