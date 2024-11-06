<main class="agenda">
    <h2 class="agenda__heading">Workshops & Conferencias</h2>
    <p class="agenda__descripcion">Talleres y Conferencias dictados por expertos en desarrollo web</p>

    <div class="eventos">
        <h3 class="eventos__heading">&lt;Conferencias /></h3>
        <p class="eventos__fecha">Sabado 5 de Octubre</p>

            <div class="eventos__listado slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach($eventos['conferencias_s'] as $evento ) {?>
                        <?php require __DIR__ . '../../templates/evento.php';?>
                    <?php  }  ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        <p class="eventos__fecha">Domingo 6 de Octubre</p>
            <div class="eventos__listado slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach($eventos['conferencias_d'] as $evento ) {?>
                        <?php require __DIR__ . '../../templates/evento.php';?>
                    <?php  }  ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
    </div>
    <!-- modificamos el bloque principal --workshops -->
    <div class="eventos eventos--workshops">
        <h3 class="eventos__heading">&lt;Workshops /></h3>
        <p class="eventos__fecha">Sabado 5 de Octubre</p>
            <div class="eventos__listado slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach($eventos['workshops_s'] as $evento ) {?>
                        <?php require __DIR__ . '../../templates/evento.php';?>
                    <?php  }  ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        <p class="eventos__fecha">Domingo 6 de Octubre</p>
            <div class="eventos__listado slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach($eventos['workshops_d'] as $evento ) {?>
                        <?php require __DIR__ . '../../templates/evento.php';?>
                    <?php  }  ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

    </div>



</main>
    