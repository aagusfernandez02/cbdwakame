<?php 
session_start();

require_once('php/CrateDB.php');
require_once('php/component.php');

// Create instance of CreateDB class
$database = new CreateDB();

if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'],"product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            // product_id en array
            $_SESSION['info_carrito'] = "ITEM_YA_EN_CARRITO";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                "product_id"=>$_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
        }

    } else {
        $item_array = array(
            "product_id"=>$_POST['product_id']
        );
        $_SESSION['cart'][0] = $item_array;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBDWakaMe</title>

    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/styles.css">
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/8d1cfe94fb.js" crossorigin="anonymous"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- TOASTS -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
</head>

<body>
    <header>
        <a href="#"><img src="img\logo.jpg" alt="Logo CBDWakaMe"></a>
        <a href="#"><i class="fa-solid fa-cart-shopping"></i> 
            <span id="cantidad_carrito">&nbsp;
                <?php
                    if( isset($_SESSION['cart']) ){
                        $count = count($_SESSION['cart']);
                        echo $count;
                    } else {
                        echo "0";
                    }
                ?>
            </span>
        </a>
    </header>
    <main>
        <div class="container_presentation">
            <h1>CBD WakaMe</h1>
            <h2>Productos naturales</h2>
        </div>

        <h2 class="heading">Nuestros productos</h2>
        <div class="productos">
            <?php 
                $result = $database->getData();
                while($row = mysqli_fetch_assoc($result)){
                    component($row['name'],$row['description'],$row['price'],$row['img'],$row['info'],$row['id']);
                }
            ?>
        </div>
        <footer>
            <div>
                <p>© Derechos reservados CBDWakaMe 2023</p>
            </div>
            <div class="footer-redes">
                <a href="https://www.instagram.com/cbdwakame/" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://wa.link/7semoj" target="_blank" title="Whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </footer>
    </main>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- TOASTS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <?php
    if (isset($_SESSION['info_carrito']) && $_SESSION['info_carrito'] == "ITEM_YA_EN_CARRITO") {
        $_SESSION['info_carrito'] = null;
        echo "
        <script>
            toastr.options = {'positionClass': 'toast-bottom-left',}
            toastr.error('Producto ya agregado al carrito','ERROR')
        </script>";
    }
    ?>
    </body>


</html>