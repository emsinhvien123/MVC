<?php
class QLLopHoc extends Controller
{
    public $QLLopModel;
    public function __construct()
    {
        // session_start();
        $this->QLLopModel = $this->model("QLLopModel");
    }

    public function SayHi()
    {
        $lop = $this->QLLopModel->SelectLop();
        $this->view("master1", [
            "page" => "qllop"
        ]);
    }
    public function Search()
    {
        // $lop = $this->QLLopModel->SelectLop();
        // $this->Read();
        $this->view("master1", [
            "page" => "search"
        ]);
    }
    public function FormEditLop($idlop)
    {
        $lop = $this->QLLopModel->GetData($idlop);
        $this->view("master1", [
            "page" => "editlop",
            "lop" => $lop
        ]);
        echo $lop;
    }

    public function FormCreat()
    {
        $this->view("master1", [
            "page" => "creatlop",
        ]);
    }

    public function CreatLop()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" || isset($_POST['btnsubmit'])) {
            // Read input data from JSON payload
            // $json_data = file_get_contents('php://input');
            // $data = json_decode($json_data, true);
            $malop = $_POST["malop"];
            $tenlop = $_POST["tenlop"];
            $tennganh = $_POST["tennganh"];
            $hedaotao = $_POST["hedaotao"];
            $namnhaphoc = $_POST["namnhaphoc"];

            // Validate input data
            if (empty($malop) || empty($tenlop) || empty($tennganh) || empty($hedaotao) || empty($namnhaphoc)) {
                http_response_code(400); // Bad request
                echo json_encode(array("result" => false, "message" => "Missing or empty required data."));
                return;
            }


            // Extract input data


            $check = $this->QLLopModel->checkerMaLop($malop);
            if ($check) {
                // Insert new user into database
                $result = $this->QLLopModel->CreatLop($malop, $tenlop, $tennganh, $hedaotao, $namnhaphoc);
                // Check if insertion was successful
                if ($result) {
                    http_response_code(200); // Created
                    echo json_encode(array("result" => true, "message" => "User created successfully."));
                    $lop = $this->QLLopModel->SelectLop();
                    // Chuyển hướng người dùng trở lại trang chủ
                    echo "<script>window.location.href = 'http://localhost/MVC/QLLopHoc/Show';
                    alert('Thêm thành công');
                    </script>";
                } else {
                    http_response_code(500); // Internal server error
                    echo json_encode(array("result" => false, "message" => "Failed to create user."));
                }
            } else {
                http_response_code(500); // Internal server error
                echo json_encode(array("result" => false, "message" => "Failed to create user."));
            }
        }
    }

    public function EditLop()
    {
        if ($_SERVER["REQUEST_METHOD"] === "PUT") {
            // Đọc dữ liệu từ body của request
            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data, true);

            // Kiểm tra xem dữ liệu đã được đọc thành công chưa
            if (!$data) {
                http_response_code(400); // Bad request
                echo json_encode(array("result" => false, "message" => "Invalid input data."));
                return;
            }

            // Trích xuất dữ liệu từ dữ liệu đầu vào
            $malop = $data["malop"];
            $tenlop = $data["tenlop"];
            $tennganh = $data["tennganh"];
            $hedaotao = $data["hedaotao"];
            $namnhaphoc = $data["namnhaphoc"];

            // Gọi phương thức trong model để chỉnh sửa thông tin lớp
            $result = $this->QLLopModel->EditLop($malop, $tenlop, $tennganh, $hedaotao, $namnhaphoc);

            // Kiểm tra kết quả từ phương thức model
            if ($result) {
                http_response_code(200); // OK
                echo json_encode(array("result" => true, "message" => "Class updated successfully."));
            } else {
                http_response_code(500); // Internal server error
                echo json_encode(array("result" => false, "message" => "Failed to update class."));
            }
        } else {
            http_response_code(405); // Method not allowed
            echo json_encode(array("result" => false, "message" => "Method not allowed."));
        }
    }



    public function DeleteLop($malop)
    {
        if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
            $delete = $this->QLLopModel->DeleteLop($malop);
            if ($delete) {
                http_response_code(200); // OK
                echo json_encode(array("result" => true, "message" => "Class deleted successfully."));
            } else {
                http_response_code(500); // Internal server error
                echo json_encode(array("result" => false, "message" => "Failed to delete class."));
            }
        } else {
            http_response_code(405); // Method not allowed
            echo json_encode(array("result" => false, "message" => "Method not allowed."));
        }

        // $this->view("deleteApi",["malop"=>$malop]);
    }


    public function Show($malop = null)
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {

            if ($malop == null) {
                $result = $this->QLLopModel->SelectLop();
                if ($result) {
                    http_response_code(200);
                    // echo $result;
                    $_SESSION["Show"] = json_decode($result, true);
                echo "<script>window.location.href = 'http://localhost/MVC/QLLopHoc';</script>";
                } else {
                    http_response_code(500);
                    echo json_encode(array("result" => false, "erro" => "GetData unccessfully."));
                }
            } else {
                $result = $this->QLLopModel->GetData($malop);
                if ($result) {
                    http_response_code(200);
                    // echo $result;
                    // echo json_encode(array("result" => true, "message" => "GetData successfully."));
                    $_SESSION["Show"] = json_decode($result, true);
                echo "<script>window.location.href = 'http://localhost/MVC/QLLopHoc/';</script>";
                } else {
                    http_response_code(500);
                    echo json_encode(array("result" => false, "erro" => "GetData unccessfully."));
                }
            }
        } else {
            http_response_code(405); // Method not allowed
            echo json_encode(array("result" => false, "message" => "Method not allowed."));
        }
    }

    public function Read($malop=null)
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            // Trích xuất dữ liệu từ query parameter 'search'
            $malop = $_GET['search'];
            $searchTerm = isset($malop) ? $malop : null;


            if ($searchTerm) {
                // Gọi phương thức SearchLop của model để tìm kiếm lớp học
                $result = $this->QLLopModel->GetData($searchTerm);
            } else {
                // Nếu không có dữ liệu tìm kiếm, lấy tất cả các lớp học
                $result = $this->QLLopModel->SelectLop();
            }

            if ($result) {
                echo $result;
                $_SESSION["Read"] = json_decode($result, true);
                echo "<script>window.location.href = 'http://localhost/MVC/QLLopHoc/Search';</script>";
            } else {
                http_response_code(500);
                echo json_encode(array("result" => false, "message" => "GetData unsuccessfully."));
            }
        } else {
            http_response_code(405); // Method not allowed
            echo json_encode(array("result" => false, "message" => "Method not allowed."));
        }
    }
}
