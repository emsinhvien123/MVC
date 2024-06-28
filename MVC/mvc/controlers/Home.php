<?php
class Home extends Controller{
    public $QLLopModel;
    public function __construct()
    {
        $this->QLLopModel = $this->model("QLLopModel");
    }

    public function SayHi(){  
        $lop = $this->QLLopModel->SelectLop();          
        $this->view("master1",["page"=>"qllop",
                    "lop"=>$lop]);
        
    }

   
}
?>