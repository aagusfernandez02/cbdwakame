<?php

function component(){
    $element = '
        <div class="card card-producto">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal1"><img
                        src="https://cdn-dfeme.nitrocdn.com/bJeLrQSTbyxXRHvCQMaKSWhmlwbCZlzo/assets/static/optimized/rev-3138444/wp-content/uploads/2021/09/CBD_Full_spectrum_8_Ecoo.jpg"
                        class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title">Aceite CBD x18ml</h5>
                    <p class="card-text">Aceite 100% CBD de aplicación oral. Ideal para mejorar el descanso y para
                        dolores articulares.</p>
                    <p>$1500</p>
                    <a href="#" class="add-to-chart-btn"><i class="fa-solid fa-circle-plus"></i></a>
                </div>
            </div>
            <!-- MODAL -->
            <div class="modal fade" id="modal1" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Aceite CBD x18ml</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Aceite importado, compuesto por ratio 1 a 1 de CBD y 25% CBD (máxima concentración).
                            </p>
                            <p>
                                Para su uso debe colocarse la dosis personal debajo de la lengua, dejarlo que permanezca
                                allí durante 30-60seg y luego tragar lo que quede.
                            </p>
                            <p>
                                Es recomendable no beber, comer o fumar aproximadamente 5 minutos antes y después de
                                usarlo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    ';
    echo $element;
}

?>