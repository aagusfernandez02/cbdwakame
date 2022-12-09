<?php

function component($productName, $productDescription, $productPrice, $productImg, $productInfo, $productId){
    $id = str_replace(' ', '', trim($productName));
    $element = '
        <form method="post" action="index.php" class="card card-producto">
            <a href="#modal-'.$id.'" data-bs-toggle="modal"><img
                    src="'.$productImg.'"
                    class="img-producto card-img-top" alt="imagen-'.$productName.'"></a>
            <div class="card-body">
                <h5 class="card-title">'.$productName.'</h5>
                <p class="card-text">'.$productDescription.'</p>
                <p>$'.$productPrice.'</p>
                <button type="submit" name="add" class="add-to-chart-btn"><i class="fa-solid fa-circle-plus"></i></button>
                <input type="hidden" name="product_id" value="'.$productId.'">
            </div>
        </form>
        <!-- MODAL -->
        <div class="modal fade" id="modal-'.$id.'" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">'.$productName.'</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>'.$productInfo.'</p>
                    </div>
                </div>
            </div>
        </div>
    ';
    echo $element;
}

?>