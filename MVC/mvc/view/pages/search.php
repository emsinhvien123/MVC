<!DOCTYPE html>
<html lang="en">
<? 
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp</title>
    <style>
        /* Định dạng cho bảng */
        .table-container {
            height: 60%;
            /* Chiều cao của bảng */
            overflow-y: auto;
            /* Tạo thanh cuộn dọc khi nội dung quá dài */
        }

        table {
            width: 100%;
            /* Độ rộng của bảng */
        }

        /* Định dạng cho ô */
        th,
        td {
            border: 1px solid black;
            /* Đường viền đen cho các ô */
            padding: 8px;
            /* Khoảng cách giữa nội dung và đường viền */
            text-align: left;
            /* Căn chỉnh nội dung sang trái */
        }

        .btn {
            padding: 0 16px;
            border: 1px solid black;
        }

        .wrap-search {
            margin-top: 8px;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <h1>Danh sách lớp</h1>
    <form action="http://localhost/MVC/QLLopHoc/Read/" method="GET" id="searchLopFrm">
        <div class="wrap-search">
            <input id="search" type="text" name="search" placeholder="Search mã lớp">
            <button type="submit" onclick="ReadData()" name="btn-search" class="btn search-btn">Search</button>

        </div>
    </form>



    <div class="table-container" id="table-container">
        <table>
            <tr>
                <th>Mã Lớp</th>
                <th>Tên Lớp</th>
                <th>Tên Ngành</th>
                <th>Hệ Đào Tạo</th>
                <th>Năm Nhập Học</th>
                <th><?php echo "<a href='./QLLopHoc/FormCreat'>Add</a>"; ?></th>
            </tr>

            <?php
            // Chuyển đổi chuỗi JSON thành mảng PHP
            // $data = json_decode($data["lop"], true);
            $dulieus = $_SESSION['Read'];

            foreach ($dulieus as $dulieu) {
                echo "<tr>";
                echo "<td>" . $dulieu['MaLop'] . "</td>";
                echo "<td>" . $dulieu['TenLop'] . "</td>";
                echo "<td>" . $dulieu['TenNganh'] . "</td>";
                echo "<td>" . $dulieu['HeDaoTao'] . "</td>";
                echo "<td>" . $dulieu['NamNhapHoc'] . "</td>";
                echo "<td>";
                // Tạo liên kết "Edit" với phương thức PATCH
                echo "<a href='http://localhost/MVC/QLLopHoc/FormEditLop/" . $dulieu['MaLop'] . "'>Edit</a>";
                echo " | ";
                // Tạo liên kết "Delete" với phương thức DELETE
                echo "<a href='#' onclick='deleteLop(\"" . $dulieu['MaLop'] . "\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }

            ?>


        </table>
    </div>

    <script>
        function deleteLop(maLop) {
            if (confirm('Bạn có chắc chắn muốn xóa lớp này?')) {
                const url = `http://localhost/MVC/QLLopHoc/DeleteLop/${maLop}`;

                fetch(url, {
                        method: 'DELETE',
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.result) {
                            alert('Xóa thành công');
                            window.location.reload();
                        } else {
                            alert('Xóa không thành công: ' + data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>


    <script>
        function ReadData() {
            const maLop = document.getElementById('search').value;
            const url = `http://localhost/MVC/QLLopHoc/Read/${maLop}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.result) {
                        
                        alert('Tìm kiếm thành công');
                    } else {
                        alert('Tìm kiếm không thành công: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        
    </script>


</body>

</html>

