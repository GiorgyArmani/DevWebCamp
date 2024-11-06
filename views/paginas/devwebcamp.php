<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia más importante de Latinoamérica</p>

    <div class="devwebcamp__grid">
        <div <?php aos_animacion();?> class="devwebcamp__imagen">
            <picture>
             <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
             <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
             <img loading="lazy" width="260" height="300" src="build/img/sobre_devwebcamp.jpg" alt="imagen devwebcamp">
            </picture>
        </div>
    
        <div <?php aos_animacion();?> class="devwebcamp__contenido">
        <p class="devwebcamp__texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Commodi veritatis, minima perferendis quo dignissimos 
            itaque asperiores ut assumenda maxime enim sit similique
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Commodi veritatis, minima perferendis quo dignissimos 
            itaque asperiores ut assumenda maxime enim sit similique
            </p>
        <p class="devwebcamp__texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Commodi veritatis.Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Commodi veritatis, minima perferendis quo dignissimos 
            itaque asperiores ut assumenda maxime enim sit similique
            </p>

        </div>
    </div>   
</main>