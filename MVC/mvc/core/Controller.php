<?php
class Controller{
    public function Model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function View($view,$data=[]){
        require_once "./mvc/view/".$view.".php";
        
    }

}
?>