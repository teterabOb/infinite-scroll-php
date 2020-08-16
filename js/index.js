
//Verifica si usuario utiliza scroll
window.onscroll = () => {
    if(document.body.scrollTop > 50 || document.documentElement.scrollTop > 50){
        //Si el usuario scrollea, ejecuta la funcion CargarPost con parámetro 1
        cargarPost(1);
}};

//Variable que indica desde que ID inicia el resultado de la query
let offset=0;
//Variable que captura el div con ID <contenido> en el index
let div = document.getElementById('contenido');

//Función que carga los post desde la BDD
//Recibe el parámetro <offset> y <num> que filtran los datos a obtener desde la BDD
function cargarPost(num){
    
    //Url que obtendrá los datos desde la clase api.php
    let urlApi = `http://localhost/prueba_php/php/api.php?offset=${offset}&limit=${num}`;
    //Utilizamos axios para obtener los datos en formato JSON
    axios({
            method:'get',
            url:urlApi,
            responseType:'json'
    
    })
    .then((response)=> {
        console.log(response)
        //Variable local, contiene todos los POSTS desde la BDD según parámetros
        let totalPublicaciones = response.data.publicaciones.length;
        //Ciclo para recorrer los post y mostrarlos en el front-end
        for(let i = 0; i < totalPublicaciones; i++){
            offset++;
            let item = response.data.publicaciones[i];
            let html = `
                <div class="listado-publicaciones">
                    <p>
                         <h1>Post N° ${item.id}</h1>
                    </p>
                    <p>
                        ${item.comentario}
                    </p>
                    <p>
                        <b> Fecha Publicación:${item.fecha}</b>
                    </p>
                    
                </div>`;
                div.innerHTML += html;
        }
    })
    .catch((error) => console.log(error));
}


//Carga Inicial de 3 publicaciones al iniciar la app
cargarPost(3)