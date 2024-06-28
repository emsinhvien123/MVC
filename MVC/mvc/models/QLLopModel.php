<?php
class QLLopModel extends DB
{
    public function SelectLop()
    {
        $sql = "SELECT * FROM tbllop";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
        // return $mang;
    }

    public function GetData($id)
    {
        $sql = "SELECT * FROM tbllop WHERE MaLop = '$id'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function checkerMaLop($un)
    {
        $qr =  "SELECT MaLop FROM tbllop WHERE MaLop='$un'";
        $row = mysqli_query($this->con, $qr);
        $kq = false;
        if (mysqli_num_rows($row) > 0) {
            $kq = true;
        }
        return json_encode($kq);
    }

    public function CreatLop($malop, $tenlop, $tennganh, $hedaotao, $namnhaphoc)
    {
        $sql = "INSERT INTO tbllop VALUES('$malop','$tenlop','$tennganh','$hedaotao','$namnhaphoc')";

        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        }

        return json_encode($result);
        
    }

    public function EditLop($malop, $tenlop, $tennganh, $hedaotao, $namnhaphoc)
    {
        $sql = "UPDATE tbllop SET TenLop='$tenlop', TenNganh='$tennganh', HeDaoTao='$hedaotao', NamNhapHoc='$namnhaphoc' WHERE MaLop='$malop'";
        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function DeleteLop($malop)
    {
        $sql = "DELETE FROM tbllop WHERE MaLop='$malop'";
        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }
}
