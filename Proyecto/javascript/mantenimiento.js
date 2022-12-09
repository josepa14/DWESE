window.addEventListener("load", async function () {
   var editUser;
    var tabla = this.document.getElementById("editable2");
    fetch('Vistas/Administracion/tablaUser.php').then(respuesta=>respuesta.text()).
        then(contenido=>{
            tabla.innerHTML=contenido;
            var btnEdits=document.querySelectorAll(".editUser");
            for (let i=0;i<btnEdits.length;i++){
                btnEdits[i].onclick=function() {
                  editarUsuario(this.value);
                }
            }
            this.document.querySelector(".borrarUser").onclick=function() {
                borrarUsuario(this.value);
          }
        })
    // await  $(tabla).load('Vistas/Administracion/tablaUser.php',function(){
    //     $(".editUser").click(function() {
    //       editarUsuario(this.value);
    //     });
    //     $(".borrarUser").click(function() {
    //         borrarUsuario(this.value);
    //       });
      
//     });


    //para divs desplegables
    $(document).ready(function(){
        var estado = false;
    
        $('#btn-toggle').on('click',function(){
            $('.seccionToggle').slideToggle();
    
            if (estado == true) {
                $(this).text("Administrar usuarios");
                $('body').css({
                    "overflow": "auto"
                });
                estado = false;
            } else {
                $(this).text("Cerrar seccion usuarios");
                $('body').css({
                    "overflow": "hidden"
                });
                estado = true;
            }
        });
    });

   
    //agregar un usuario
    var id = this.document.getElementById("id");
    var nombre = this.document.getElementById("nombre");
    var login= this.document.getElementById("login");
    var password= this.document.getElementById("password");
    var correo= this.document.getElementById("correo");
    var localizacion= this.document.getElementById("localizacion");
    var imagen= this.document.getElementById("imagen");
    var rol= this.document.getElementById("rol");
    var guardar = this.document.getElementById("guardar");
    

    //necesito ayuda de silverio para coger los datos de la API Y NO DEL CONTROLADOR
     obtenerlistadoUsuarios();

    function obtenerlistadoUsuarios(){
        var http = new XMLHttpRequest();
        const url ="BD/api/adminUser/cargarUser.php"

        http.addEventListener("readystatechange",function(){
            if (this.readyState == 4 && this.status == 200) {
                var array = JSON.parse(this.responseText); //tengo los datos
                //vamos a pintar
                // console.log(array[0].id);
                // var tBody = document.getElementById("tbody");
                // var tr = document.createElement("tr");
                // var td = document.createElement("td");
                // td[1]= array[0].name;
                // tr.appendChild(td);
                // tBody.appendChild(tr);
            
            }else{
             //   console.log("hola");
            }
        });
        http.open("GET",url)
        http.send();
    }

    guardar.onclick= async () =>{
        const datos ={
            nombre: nombre.value,
            login: login.value,
            password: password.value,
            correo: correo.value,
            localizacion: localizacion.value,
            imagen: imagen.value,
            rol: rol.value
        };
        console.log(datos);
        datosJson = JSON.stringify(datos);
        try{
            const respuestaRaw = await fetch("BD/api/adminUser/guardarUser.php",{
                method: "POST",
                body:datosJson
            });
            console.log("hasta aqui llego");
              //aqui estamos mandando el json al servidor y ahora en un rato nos devolvera una respuesta
            const respuesta = respuestaRaw.json();
            if (respuesta) {
                // Y si llegamos hasta aquí, todo ha ido bien
                $(tabla).load('Vistas/Administracion/tablaUser.php');
                this.alert("USUARIO AGREGADO");
                
            }
      
       

        }catch(e){ 
            console.log("el error es "+e);
        }
    }


    //aqui utilizo ajax para mandar datos en vez de FETCH
    // function agregardatos(){

    //     const datos ={
    //         nombre: nombre.value,
    //         login: login.value,
    //         password: password.value,
    //         correo: correo.value,
    //         localizacion: localizacion.value,
    //         imagen: imagen.value,
    //         rol: rol.value
    //     };
    //     datosJson = JSON.stringify(datos);

    //     $.ajax({
    //         type:"POST",
    //         url:"Vistas/Administracion/adminUser/guardarUser.php",
    //         data: datosJson,
    //         success:function(r){
    //             if(r==1){
    //                alert("agregado con exito")
    //             }else{
    //                alert("fallo"); 
    //             }
    //         }
    //     });
    // }
    async function borrarUsuario(id){
    
        try{
            const respuestaRaw = await fetch("BD/api/adminUser/borrarUser.php?id="+id,{
                method: "GET",
            });
            console.log("Voy a borrar "+id);
              
            const respuesta = respuestaRaw.json();
            if (respuesta) {
                // Y si llegamos hasta aquí, todo ha ido bien
                $(tabla).load('Vistas/Administracion/tablaUser.php');
                this.alert("USUARIO BORRADO");
                
            }
      
       

        }catch(e){ 
            console.log("el error es "+e);
        }
    }
     function editarUsuario(ev){
        alert(ev);
        var div=document.createElement("div");
        var h1 = document.createElement("h1");
        var valor = ev;
        h1.innerHTML="Formulario de ediccion";
        div.appendChild(h1);
        var p = document.createElement("p");
        p.innerHTML="vas a modificar el elemento "+valor;
        div.appendChild(p);
        modal(div,"mensaje");
    };
    function modal(div) {
        var modal = this.document.createElement("div");
        modal.style.position = "fixed";
        modal.style.background = "#020202";
        modal.style.opacity = 0.5;
        modal.style.top = 0;
        modal.style.left = 0;
        modal.style.width = "100%";
        modal.style.height = "100%";
        modal.style.zIndex = 100;
        document.body.appendChild(modal,titulo);
    
        var caja = document.createElement("div");
        var left = parseInt((window.innerWidth - 400) / 2) + "px";
        var top = parseInt((window.innerHeight - 300) / 2) + "px";
    
        caja.style.position = "fixed";
        caja.style.background = "#FFFFFF";
        caja.style.top = top;
        caja.style.left = left;
        caja.style.width = "600px";
        caja.style.height = "400px";
        caja.style.zIndex = 101;
        document.body.appendChild(caja);
    
        var titulo = document.createElement("div");
        titulo.style.position = "relative";
        titulo.style.background = "#BBBBBB";
        titulo.style.height = "30px";
        titulo.style.width = "100%";
        titulo.innerHTML=titulo;
        caja.appendChild(titulo);
    
        var cerrar = document.createElement("span");
        cerrar.innerHTML="X";
        cerrar.style.position="absolute";
        cerrar.style.width="20px";
        cerrar.style.top=0;
        cerrar.style.right=0;
        caja.style.overflow="hidden";
        cerrar.onclick=function(){
            var caja =this.parentElement.parentElement;
            caja.parentElement.removeChild(caja);
            modal.parentElement.removeChild(modal);
        }
        titulo.appendChild(cerrar);
    
        var contenido = document.createElement("div");
        contenido.style.top="31px";
        contenido.style.position="absolute";
        contenido.style.height="370px";
        contenido.style.width="100%";
        contenido.style.overflowY="scroll";
        caja.appendChild(contenido);
        contenido.appendChild(div)
    }
});
