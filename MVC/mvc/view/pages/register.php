
<h2>Register</h2>
<form id="registerForm" action="http://localhost/MVC/Register/KhachHangDangKi" method="POST">
  <div class="mb-3">
    <label>Username</label>
    <input id="username" type="text" name="username" class="form-control" placeholder="Username">
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input id="password" type="password" name="password" class="form-control" placeholder="Password">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input id="email" type="text" name="email" class="form-control" placeholder="Email">
  </div>
  <div class="mb-3">
    <label>Họ tên</label>
    <input id="hoten" type="text" name="hoten" class="form-control" placeholder="Ho ten">
  </div>
  <div class="mb-3">
    <label>Địa chỉ</label>
    <input id="diachi" type="text" name="diachi" class="form-control" placeholder="Dia chi">
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
  <!-- <button type="button" id="btnRegister" name="btnRegister" class="btn btn-primary">Register</button> -->
</form>

<div id="resultMessage"></div>


<?php
  if(isset($data["result"])){
    if($data["result"]==true){?>
      <h2>Đăng kí thành công</h2>
    <?php }else{ ?>
      <h2>Đăng kí thất bại</h2>
    <?php }

    }
  
?>
<script>
document.getElementById("registerForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Ngăn chặn hành vi mặc định của form

  // Lấy giá trị từ các input
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var email = document.getElementById("email").value;
  var hoten = document.getElementById("hoten").value;
  var diachi = document.getElementById("diachi").value;

  // Tạo đối tượng JSON chứa dữ liệu
  var jsonData = {
    "username": username,
    "password": password,
    "email": email,
    "hoten": hoten,
    "diachi": diachi
  };

  // Gửi dữ liệu đến server bằng XMLHttpRequest
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/MVC/Register/KhachHangDangKi");
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onload = function() {
    var response = JSON.parse(xhr.responseText);
    if (response.result) {
      document.getElementById("resultMessage").innerHTML = "<h2>Đăng kí thành công</h2>";
    } else {
      document.getElementById("resultMessage").innerHTML = "<h2>Đăng kí thất bại</h2>";
    }
  };
  xhr.send(JSON.stringify(jsonData));
});

</script>
