<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>ADD</h2>
  <form id="addLopForm" action="http://localhost/MVC/QLLopHoc/CreatLop" method="POST">
    <div class="mb-3">
      <label>Mã Lớp</label>
      <input id="malop" type="text" name="malop" class="form-control" placeholder="Mã lớp">
      <div id="messagaUn"></div>
    </div>
    <div class="mb-3">
      <label>Tên Lớp</label>
      <input id="tenlop" type="text" name="tenlop" class="form-control" placeholder="Tên lớp">
    </div>
    <div class="mb-3">
      <label>Tên Ngành</label>
      <select id="tennganh" name="tennganh" class="form-control" required>
        <option value=""></option>
        <option value="Cong Nghe Thong Tin">Công Nghệ Thông Tin</option>
        <option value="Ke Toan">Kế Toán</option>
        <option value="Quan Tri Kinh Doanh">Quản Trị Kinh Doanh</option>
        <!-- Thêm các option khác tùy theo nhu cầu -->
      </select>
    </div>
    <div class="mb-3">
      <label>Hệ Đào Tạo</label>
      <select id="hedaotao" name="hedaotao" class="form-control" required>
        <option value=""></option>
        <option value="Dai Hoc">Đại Học</option>
        <option value="Cao Dang">Cao Đẳng</option>
        <option value="Trung Cap">Trung Cấp</option>
        <!-- Thêm các option khác tùy theo nhu cầu -->
      </select>
    </div>
    <div class="mb-3">
      <label>Năm Nhập Học</label>
      <input id="namnhaphoc" type="text" name="namnhaphoc" class="form-control" placeholder="Năm">
    </div>
    <!-- <button class="btn-submit" name = "btnsubmit" onclick="submitForm()">Create</button> -->
    <button name = "btnsubmit" class="btn btn-primary" onclick="submitForm()">Create</button>
  </form>


  <div id="resultMessage" style="display: none;">
    <h2>Thêm thành công</h2>
  </div>

</body>

</html>



<script>
  function submitForm() {
    $.ajax({
      url: "http://localhost/MVC/QLLopHoc/CreatLop", // Thay thế "process.php" bằng đường dẫn đến tệp PHP bạn muốn thực thi
      method: "POST",
      data: {
        action: "create",
        $malop: $_POST['malop'],
        $tenlop: $_POST['tenlop'],
        $tennganh: $_POST['tennganh'],
        $hedaotao: $_POST['hedaotao'],
        $namnhaphoc: $_POST['namnhaphoc'],
        

      }, // Gửi dữ liệu cần thiết nếu có
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
</script>