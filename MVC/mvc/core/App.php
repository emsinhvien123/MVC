<?php
    class App{

        // http://localhost/MVC/home/sayhi/1/2/3
        protected $controler="Home";
        protected $action="Sayhi";
        protected $params=[];

        function __construct()
        {
            //Array ( [0] => home [1] => sayhi [2] => 1 [3] => 2 [4] => 3 )

            $arr = $this->Urlprocess();

            //xu ly controler
            if(file_exists("./mvc/controlers/".$arr[0].".php")){
                $this->controler = $arr[0];
                unset($arr[0]);
            }
            require_once("./mvc/controlers/".$this->controler.".php");
            $this->controler = new $this->controler;
            //xu ly action
            if(isset($arr[1])){
                if(method_exists($this->controler,$arr[1])){
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            
            // xu ly params
            $this->params = $arr?array_values($arr):[];

            call_user_func_array([new $this->controler,$this->action],$this->params);
        }

        

        

        function Urlprocess(){
            if(isset($_GET["url"])){
                return explode("/",filter_var(trim($_GET["url"],"/")));
            }
        }
    }
?>