window.addEventListener("load", async function () {
    var editUser;
    var tabla = this.document.getElementById("editable2");
    fetch('Vistas/Administracion/tablaUser.php').then(respuesta => respuesta.text()).
        then(contenido => {
            tabla.innerHTML = contenido;
            var btnEdits = document.querySelectorAll(".editUser");
            for (let i = 0; i < btnEdits.length; i++) {
                btnEdits[i].onclick = function () {
                    editarUsuario(this.value);
                }
            }
            var btnBorrar = document.querySelectorAll(".borrarUser");
            for (let i = 0; i < btnBorrar.length; i++) {
                btnBorrar[i].onclick = function () {
                    console.log(this.value);
                    borrarUsuario(this.value, this.parentNode.parentNode);
                }
            }


        })
    //para el desplegable
    $(document).ready(function () {
        let estado = false;

        $('#c-btn-toggle').on('click', function () {
            $('.c-seccionToggle').slideToggle();

            if (estado == true) {
                $(this).text("Administrar usuarios");
                $('body').css({
                    "overflow": "auto"
                });
                estado = false;
            } else {
                $(this).text("Cerrar seccion usuarios");
                estado = true;
            }
        });
    });
    $(document).ready(function () {
        let estado = false;

        $('#c-btn-toggle2').on('click', function () {
            $('.c-seccionToggle').slideToggle();

            if (estado == true) {
                $(this).text("Administrar Concursos");
                $('body').css({
                    "overflow": "auto"
                });
                estado = false;
            } else {
                $(this).text("Cerrar Concuros");
                estado = true;
            }
        });
    });


    //agregar un usuario
    var id = this.document.getElementById("id");
    var nombre = this.document.getElementById("nombre");
    var login = this.document.getElementById("login");
    var password = this.document.getElementById("password");
    var correo = this.document.getElementById("correo");
    var localizacion = this.document.getElementById("localizacion");
    var imagen = this.document.getElementById("imagen");
    var rol = this.document.getElementById("rol");
    var guardar = this.document.getElementById("guardar");



    function obtenerDatos(url) {
        var http = new XMLHttpRequest();
        // url = "BD/api/adminUser/cargarUser.php"
        console.log("aqui llego");


        http.open("GET", url, false)
        http.send();

        if (http.status == 200) {
            var array = JSON.parse(http.responseText); //tengo los datos
            return array;
        }

    }

    guardar.onclick = async () => {
        const datos = {
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
        try {
            const respuestaRaw = await fetch("BD/api/adminUser/guardarUser.php", {
                method: "POST",
                body: datosJson
            });
            console.log("hasta aqui llego");
            //aqui estamos mandando el json al servidor y ahora en un rato nos devolvera una respuesta
            const respuesta = respuestaRaw.json();
            if (respuesta) {
                // Y si llegamos hasta aquí, todo ha ido bien
                $(tabla).load('Vistas/Administracion/tablaUser.php');
                this.alert("USUARIO AGREGADO");

            }



        } catch (e) {
            console.log("el error es " + e);
        }
    }
    async function borrarUsuario(id, fila) {
        console.log(this);
        try {
            const respuestaRaw = await fetch("BD/api/adminUser/borrarUser.php?id=" + id, {
                method: "GET",
            });
            console.log("Voy a borrar " + id);


            if (respuestaRaw) {
                // Y si llegamos hasta aquí, todo ha ido bien
                console.log(fila);
                fila.parentElement.removeChild(fila);
                //  this.alert("USUARIO BORRADO");

            }



        } catch (e) {
            console.log("el error es " + e);
        }
    }

    function editarUsuario(id) {
        url = "bd/api/adminUser/getUser.php?idParticipante=" + id;
        console.log(url);
        let datos = obtenerDatos(url);
        var div = document.createElement("div");
        var h1 = document.createElement("h1");
        h1.innerHTML = "Formulario de ediccion";
        div.appendChild(h1);


        var form = document.createElement("form");

        //formulario

        //id 
        {
        var inputId = document.createElement("input");
        var labelId = document.createElement("label");
        var inputIdV= document.createElement("input");
        inputIdV.value= datos.id;
        labelId.innerHTML = "Identificador:";
        var pId = document.createElement("p");
        inputIdV.disabled=true;
        inputId.style.display = "none";
        inputId.value = datos.id;
        inputId.className="idE";
        inputId.name="idE";
        pId.appendChild(labelId);
        pId.appendChild(inputIdV);
        pId.appendChild(inputId);
        form.appendChild(pId);
        }

        //name

       { var inputName = document.createElement("input");
        var labelName = document.createElement("label");
        var pName = document.createElement("p");
        labelName.innerHTML = "nombre:";
        inputName.value = datos.name;
        inputName.name = "nombreE";
        inputName.className="nombreE";
        pName.appendChild(labelName);
        pName.appendChild(inputName);
        form.appendChild(pName);}
        //login
        
        {var inputLogin = document.createElement("input");
        var labelLogin = document.createElement("label");
        var pLogin = document.createElement("p");
        labelLogin.innerHTML = "Login:";
        inputLogin.value = datos.login;
        inputLogin.name = "loginE";
        inputLogin.className="loginE";
        pLogin.appendChild(labelLogin);
        pLogin.appendChild(inputLogin);
        form.appendChild(pLogin);}
        //pass
        {   var iPass = document.createElement("input");
        var lPass = document.createElement("label");
        var pPass = document.createElement("p");
        lPass.innerHTML = "Pass:";
        iPass.value = datos.pass;
        iPass.name="passE";
        iPass.className="passE";
        iPass.type = "password";
        pPass.appendChild(lPass);
        pPass.appendChild(iPass);
        form.appendChild(pPass);}
        //correo
      {  var iCorreo = document.createElement("input");
        var lCorreo = document.createElement("label");
        var pCorreo = document.createElement("p");
        lCorreo.innerHTML = "Correo:";
        iCorreo.name="correoE";
        iCorreo.className="correoE";
        iCorreo.value = datos.correo;
        pCorreo.appendChild(lCorreo);
        pCorreo.appendChild(iCorreo);
        form.appendChild(pCorreo);}
    //locali
         {var il = document.createElement("input");
         var ll = document.createElement("label");
         var pl = document.createElement("p");
         ll.innerHTML = "ubicacion:";
         il.value = datos.localizacion;
         il.name="localizacionE";
         il.className="localizacionE";
         pl.appendChild(ll);
         pl.appendChild(il);
         form.appendChild(pl);}
         //imagen
        { var ii = document.createElement("input");
         var li = document.createElement("label");
         var pi = document.createElement("p");
         li.innerHTML = "Imagen:";
         ii.value = datos.imagen;
         ii.name="imagenE";
         ii.className="imagenE";
         pi.appendChild(li);
         pi.appendChild(ii);
         form.appendChild(pi);}
         //rol
         {var ir = document.createElement("input");
         var lr = document.createElement("label");
         var pr = document.createElement("p");
         lr.innerHTML = "Rol:";
         ir.className="rolE";
         ir.name="rolE";
         ir.value = datos.rol;
         pr.appendChild(lr);
         pr.appendChild(ir);
         form.appendChild(pr);}

        //boton
        var bton = document.createElement("input");
        var pb = document.createElement("p");
        bton.type="button";
         bton.value = "Actualizar";
         bton.className="enviar";
         bton.id = datos.id;
         pb.appendChild=bton;
         form.appendChild(bton);

        div.appendChild(form);
        bton.onclick=async function(){
            //valida
            var datos2 = new FormData(this.form);
            console.log(datos2);
           await fetch("BD/api/adminUser/updateUser.php",{method:"POST",body:datos2});
            var caja = this.parentElement.parentElement.parentElement.parentElement;
            debugger;
            caja.parentElement.removeChild(caja);
            borrarElemento(document.getElementById("modal"));
           
           
        }
      
        modal(div);
    };

    function borrarElemento(objeto){
        objeto.parentNode.removeChild(objeto);
    }
     function modal(div) {
        //modal gris
        var modal = this.document.createElement("div");
        modal.id="modal";
        modal.style.position = "fixed";
        modal.style.background = "#020202";
        modal.style.opacity = 0.5;
        modal.style.top = 0;
        modal.style.left = 0;
        modal.style.width = "100%";
        modal.style.height = "100%";
        modal.style.zIndex = 100;
        document.body.appendChild(modal);
    
        
        //modal caja
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
        //modal cabecera de la caja
        var cabecera = document.createElement("div");
        cabecera.style.position = "relative";
        cabecera.style.background = "#BBBBBB";
        cabecera.style.height = "30px";
        cabecera.style.width = "100%";
        caja.appendChild(cabecera);


        var titulo = document.createElement("span");
        titulo.innerHTML = "titulo";
        titulo.style.position = "absolute";
        titulo.style.top = "5px";
        titulo.style.left = "10px";
        titulo.style.width = "20px";
        cabecera.appendChild(titulo);

        var cerrar = document.createElement("span");
        cerrar.innerHTML = "X";
        cerrar.style.position = "absolute";
        cerrar.style.width = "20px";
        cerrar.style.top = "5px";
        cerrar.style.right = "10px";
        caja.style.overflow = "hidden";
       
        cerrar.onclick = function () {
            var caja = this.parentElement.parentElement;
            caja.parentElement.removeChild(caja);
            modal.parentElement.removeChild(modal);
            
        }
        cabecera.appendChild(cerrar);
        //modal contenido de la caja
        var contenido = document.createElement("div");
        contenido.style.top = "31px";
        contenido.style.position = "absolute";
        contenido.style.height = "370px";
        contenido.style.width = "100%";
        contenido.style.overflowY = "scroll";
        caja.appendChild(contenido);
        contenido.appendChild(div)
    }
});
