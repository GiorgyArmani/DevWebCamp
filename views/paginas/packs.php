<main class="packs">
    <h2 class="packs__heading"><?php echo $titulo; ?></h2>
    <p class="packs__descripcion">Compara nuestros packs de DevWebCamp</p>

    <div  class="packs__grid">

        <div <?php aos_animacion();?> class="pack">
           <h3 class="pack__nombre">Pase Gratis</h3>
           <ul class="pack__lista">
               <li class="pack__elemento">Acceso Virtual a DevWebCamp</li>
           </ul>
           <p class="pack__precio">$0</p>
        </div>

        <div <?php aos_animacion();?> class="pack">
           <h3 class="pack__nombre">Pase Presencial</h3>
           <ul class="pack__lista">
               <li class="pack__elemento">Acceso Presencial a DevWebCamp</li>
               <li class="pack__elemento">Pase por 2 dias</li>
               <li class="pack__elemento">Acceso Talleres y Conferencias</li>
               <li class="pack__elemento">Acceso a las grabaciones</li>
               <li class="pack__elemento">Remera del Evento</li>
               <li class="pack__elemento">Comida y Bebida</li>
           </ul>
           <p class="pack__precio">$199</p>
        </div>

        <div <?php aos_animacion();?> class="pack">
           <h3 class="pack__nombre">Pase Virtual</h3>
           <ul class="pack__lista">
               <li class="pack__elemento">Acceso Virtual a DevWebCamp</li>
               <li class="pack__elemento">Pase por 2 dias</li>
               <li class="pack__elemento">Acceso Talleres y Conferencias</li>
               <li class="pack__elemento">Acceso a las grabaciones</li>
           </ul>
           <p class="pack__precio">$50</p>
        </div>
    </div>   
</main>