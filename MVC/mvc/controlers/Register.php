
<?php
class Register extends Controller {
    public $Usermodel;

    public function __construct() {
        $this->Usermodel = $this->model("UserModel");
    }
    public function SayHi(){
        $this->view("master1",["page"=>"register"]);
    }

    // POST method to create a new user
    public function KhachHangDangKi() {
        // Read input data from JSON payload
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data, true);

        // Validate input data
        if (!isset($data["username"]) || !isset($data["password"]) || !isset($data["email"]) || !isset($data["hoten"]) || !isset($data["diachi"])) {
            http_response_code(400); // Bad request
            echo json_encode(array("result" => false, "message" => "Missing required data."));
            return;
        }

        // Extract input data
        $username = $data["username"];
        $password = $data["password"];
        $email = $data["email"];
        $hoten = $data["hoten"];
        $diachi = $data["diachi"];

        // Hash password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user into database
        $result = $this->Usermodel->InsertNewUser($username, $password_hash, $email, $hoten, $diachi);
        

        // Check if insertion was successful
        if ($result) {
            http_response_code(201); // Created
            echo json_encode(array("result" => true, "message" => "User created successfully."));
            header("Location: /home");
        } else {
            http_response_code(500); // Internal server error
            echo json_encode(array("result" => false, "message" => "Failed to create user."));
        }
    }
   
}
?>