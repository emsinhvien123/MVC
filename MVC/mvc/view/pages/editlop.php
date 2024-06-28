<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $data = json_decode($data["lop"], true);
  foreach ($data as $row) {
    $malop = $row["MaLop"];
    $tenlop = $row["TenLop"];
    $tennganh = $row["TenNganh"];
    $hedaotao = $row["HeDaoTao"];
    $namnhaphoc = $row["NamNhapHoc"];
  }
  ?>
  <h2>Edit Lớp</h2>
  <form action="http://localhost/MVC/QLLopHoc/EditLop" method="POST" id="editLopForm">
    <input type="hidden" name="_method" value="PUT">
    <div class="mb-3">
      <label>Mã Lớp</label>
      <input id="malop" type="text" name="malop" class="form-control" value="<?php echo $malop ?>" placeholder="Mã lớp" readonly>
    </div>
    <div class="mb-3">
      <label>Tên Lớp</label>
      <input id="tenlop" type="text" name="tenlop" class="form-control" value="<?php echo $tenlop ?>" placeholder="Tên lớp">
    </div>
    <div class="mb-3">
      <label>Tên Ngành</label>
      <!-- <input type="text" name="tennganh" class="form-control"  placeholder="Tên ngành"> -->
      <select id="tennganh" name="tennganh" class="form-control" required>
        <option value="Cong Nghe Thong Tin" <?php if (isset($tennganh) && $tennganh == 'Cong Nghe Thong Tin') echo 'selected'; ?>>Công Nghệ Thông Tin</option>
        <option value="Ke Toan" <?php if (isset($tennganh) && $tennganh == 'Ke Toan') echo 'selected'; ?>>Kế Toán</option>
        <option value="Quan Tri Kinh Doanh" <?php if (isset($tennganh) && $tennganh == 'Quan Tri Kinh Doanh') echo 'selected'; ?>>Quản Trị Kinh Doanh</option>
        <!-- Thêm các option khác tùy theo nhu cầu -->
      </select>
    </div>
    <div class="mb-3">
      <label>Hệ Đào Tạo</label>
      <select id="hedaotao" name="hedaotao" class="form-control" required>
        <option value="Dai Hoc" <?php if (isset($hedaotao) && $hedaotao == 'Dai Hoc') echo 'selected'; ?>>Đại Học</option>
        <option value="Cao Dang" <?php if (isset($hedaotao) && $hedaotao == 'Cao Dang') echo 'selected'; ?>>Cao Đẳng</option>
        <option value="Trung Cap" <?php if (isset($hedaotao) && $hedaotao == 'Trung Cap') echo 'selected'; ?>>Trung Cấp</option>
        <!-- Thêm các option khác tùy theo nhu cầu -->
      </select>
    </div>

    <div class="mb-3">
      <label>Năm Nhập Học</label>
      <input id="namnhaphoc" type="text" name="namnhaphoc" class="form-control" value="<?php echo $namnhaphoc ?>" placeholder="Năm nhập học">
    </div>
    <button name="btnsubmit" class="btn btn-primary" onclick="submitForm()">Edit</button>
  </form>

  <script>
    function submitForm() {
      const form = document.getElementById('editLopForm');
      const formData = new FormData(form);
      const data = {};
      formData.forEach((value, key) => {
        data[key] = value;
      });

      fetch('http://localhost/MVC/QLLopHoc/EditLop', {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(data => {
          if (data.result) {
            alert('Chỉnh sửa thành công');
            window.location.href = 'http://localhost/MVC/QLLopHoc/Show';
          } else {
            alert('Chỉnh sửa không thành công: ' + data.message);
          }
        })
        .catch(error => console.error('Error:', error));
    }
  </script>



</body>

</html>

<!-- <script>
  function submitForm() {

    // Gửi dữ liệu bằng AJAX
    $.ajax({
      url: "http://localhost/MVC/QLLopHoc/EditLop",
      method: "PUT",
      data: {
        action: "update",
        $malop: $data['ma$malop'],
        $tenlop: $_POST['tenlop$tenlop'],
        $tennganh: $_POST['tennganh'],
        $hedaotao: $_POST['hedaotao'],
        $namnhaphoc: $_POST['namnhaphoc'],
        
      },
      success: function(response) {
        // Xử lý phản hồi từ tệp PHP (nếu cần)
        alert(response);
      },
      error: function(xhr, status, error) {
        // Xử lý lỗi (nếu có)
        alert("Có lỗi xảy ra: " + error);
      }
    });
  }
</script> -->

<!-- <script>
  document.getElementById("editLopForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Ngăn chặn hành vi mặc định của form

    // Lấy giá trị từ các input
    var malop = document.getElementById("malop").value;
    var tenlop = document.getElementById("tenlop").value;
    var tennganh = document.getElementById("tennganh").value;
    var hedaotao = document.getElementById("hedaotao").value;
    var namnhaphoc = document.getElementById("namnhaphoc").value;

    // Tạo đối tượng JSON chứa dữ liệu
    var jsonData = {
      "malop": malop,
      "tenlop": tenlop,
      "tennganh": tennganh,
      "hedaotao": hedaotao,
      "namnhaphoc": namnhaphoc
    };

    // Thêm trường ẩn vào form để gửi phương thức PUT
    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "_method");
    hiddenField.setAttribute("value", "PUT");
    document.getElementById("editLopForm").appendChild(hiddenField);

    // Gửi dữ liệu đến server bằng XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open("PUT", "http://localhost/MVC/QLLopHoc/EditLop");

    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onload = function() {
      var response = JSON.parse(xhr.responseText);
      if (response.result) {
        // document.getElementById("resultMessage").innerHTML = "<h2>Đăng kí thành công</h2>";
        window.location.href = "http://localhost/MVC/QLLopHoc";
      } else {
        document.getElementById("resultMessage").innerHTML = "<h2>Sửa thất bại</h2>";
      }
    };
    xhr.send(JSON.stringify(jsonData));

    // Loại bỏ trường ẩn sau khi gửi yêu cầu
    document.getElementById("editLopForm").removeChild(hiddenField);
  });
</script> -->