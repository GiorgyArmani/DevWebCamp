<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo;?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div  class="packs__grid">

        <div <?php aos_animacion();?> class="pack">
           <h3 class="pack__nombre">Pase Gratis</h3>
           <ul class="pack__lista">
               <li class="pack__elemento">Acceso Virtual a DevWebCamp</li>
           </ul>
           <p class="pack__precio">$0</p>
           
           <form method="POST" action="/finalizar-registro/gratis">
                <input type="submit" class="packs__submit" value="Inscripcion Gratis"/>

           </form>

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

           <div id="smart-button-container">
                <div style="text-align: center;">
                <div id="paypal-button-container"></div>
                </div>
            </div>

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
           <div id="smart-button-container">
                <div style="text-align: center;">
                <div id="paypal-button-container--virtual"></div>
                </div>
            </div>
        </div>
    </div>   
</main>

<script src="https://www.paypal.com/sdk/js?client-id=AXN50xZmgF8ULbJ-rvHFSldesBEBNrxZY1EEP4l75ALah-cHvSgySUqoRGTZkrZguEia8qwlKcUNRDza&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
 
<script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },
 
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":199}}]
          });
        },
 
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
             const datos = new FormData();
             datos.append('paquete_id', orderData.purchase_units[0].description);
             datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

             fetch('/finalizar-registro/pagar', {
                method: 'POST',
                body: datos
              })
             .then(respuesta => respuesta.json())
             .then(resultado =>{
                if(resultado.resultado){
                  actions.redirect('http://localhost:3000/finalizar-registro/conferencias')
                }
             })
          });
        },
 
        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');

      //pase virtual 
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },
 
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"2","amount":{"currency_code":"USD","value":50}}]
          });
        },
 
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
             const datos = new FormData();
             datos.append('paquete_id', orderData.purchase_units[0].description);
             datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

             fetch('/finalizar-registro/pagar', {
                method: 'POST',
                body: datos
              })
             .then(respuesta => respuesta.json())
             .then(resultado =>{
                if(resultado.resultado){
                  actions.redirect('http://localhost:3000/finalizar-registro/conferencias')
                }
             })
          });
        },
 
        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container--virtual');
    }
 
  initPayPalButton();
</script>