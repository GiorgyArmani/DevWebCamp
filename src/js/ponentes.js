(function() {
    const ponentesInput = document.querySelector('#ponentes');

    if(ponentesInput){
        let ponentes = [];
        let ponentesFiltrados = [];

        const listadoPonentes = document.querySelector('#listado-ponentes');
        const ponenteHidden = document.querySelector('[name="ponente_id"]');

        obtenerPonentes();
        ponentesInput.addEventListener('input', buscarPonentes);
        
        if(ponenteHidden.value){
            (async() => {
                const ponente = await obtenerPonente(ponenteHidden.value)
                //distructuring
                const { nombre, apellido } = ponente;
                console.log(ponente);
                //insertat en el html
                const ponenteDOM = document.createElement('LI');
                ponenteDOM.classList.add('listado-ponentes__ponente', 'listado-ponentes__ponente--seleccionado');
                ponenteDOM.textContent = `${nombre} ${apellido}`;

                listadoPonentes.appendChild(ponenteDOM);
            })()
        }
        async function obtenerPonentes() {
            const url = `${location.origin}/api/ponentes`;
        
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            formatearPonentes(resultado);

        }
        async function obtenerPonente(id) {
            const url = `${location.origin}/api/ponente?id=${id}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            return resultado;
        }

        function formatearPonentes(arrayPonentes = []) {
            ponentes = arrayPonentes.map(ponente => {
                return {
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                    
                }
            })

        }

        function buscarPonentes(e) {
            const busqueda = e.target.value;
            //empieza a consultar la bd despues de 3 caracteres 
            if (busqueda.length > 3) {
                //expresion regular busca un patron en un valor
                const expresion = new RegExp(busqueda, "i");
                ponentesFiltrados = ponentes.filter(ponente => {
                    if(ponente.nombre.toLowerCase().search(expresion) !== -1) {
                        return ponente;
                    }
                 })
            }else{
                ponentesFiltrados = [];
            }
            mostrarPonentes();
        }
        
        function mostrarPonentes() {
            //limpia el html
           while(listadoPonentes.firstChild){
             listadoPonentes.removeChild(listadoPonentes.firstChild);
           }
           if(ponentesFiltrados.length > 0 ){
             ponentesFiltrados.forEach(ponente => {
                const ponenteHTML = document.createElement('LI');
                ponenteHTML.classList.add('listado-ponentes__ponente');
                ponenteHTML.textContent = ponente.nombre;
                ponenteHTML.dataset.ponenteId = ponente.id;
                ponenteHTML.onclick = seleccionarPonente
                //agregar al DOM
                listadoPonentes.appendChild(ponenteHTML);
            })
           }else{
                const noResultados = document.createElement('P');
                noResultados.classList.add('listado-ponentes__no-resultado');
                noResultados.textContent = 'No hay resultados para tu busqueda!';
                listadoPonentes.appendChild(noResultados);
           }
        }

        function seleccionarPonente(e){
            const ponente = e.target;

            //remover la clase previa
            const ponenteAnterior = document.querySelector('.listado-ponentes__ponente--seleccionado');
            if(ponenteAnterior) {
                ponenteAnterior.classList.remove('listado-ponentes__ponente--seleccionado');
            }
            
            ponente.classList.add('listado-ponentes__ponente--seleccionado')

            ponenteHidden.value = ponente.dataset.ponenteId;

        }
    }


})();