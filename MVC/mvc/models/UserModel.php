<?php
    class UserModel extends DB{
        public function InsertNewUser($username,$password,$email,$hoten,$diachi){
            $sql = "INSERT INTO tbltaikhoan VALUES(null,'$username','$password','$email','$hoten','$diachi')";
            
            $result = false;
            if(mysqli_query($this->con,$sql)){
                $result = true;
            }
            
            return json_encode($result);
        }
    }
?>