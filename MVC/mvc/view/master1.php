<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="/MVC/public/css/master1.css">
    <link rel="stylesheet" href="/MVC/public/css/listMenu.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container" style="max-width: 100%; padding: 0;">

       
        <div id="wrap-content">
            <div class="right-col-content">
                <?php require_once "./mvc/view/pages/". $data["page"].".php";?>
            </div>
            <div class="left-col-menu">
                <?php require_once "./mvc/view/blocks/listMenu.php"; ?>
            </div>
            <div class="clear"></div>
        </div>
        <div id="wrap-footer"></div>
        
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./public/js/main.js"></script> -->
</body>
</html>
