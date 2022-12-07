window.addEventListener("load", function () {
    var tabla = this.document.getElementById("editable");
    var edicion = this.document.getElementById("ediccion");
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

    guardar.onclick= async () =>{
        // var datos = new FormData();
        // datos.append(" nombre", nombre.value);
        // datos.append("login: ",login.value);
        // datos.append(" password", password.value);
        // datos.append("correo", correo.value);
        // datos.append("localizacion", localizacion.value);
        // datos.append("imagen", imagen.value);
        // datos.append("rol",rol.value);
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
            const respuestaRaw = await fetch("Vistas/Administracion/adminUser/guardarUser.php",{
                method: "POST",
                body:datosJson
            });
            console.log("hasta aqui llego");
              //aqui estamos mandando el json al servidor y ahora en un rato nos devolvera una respuesta
            const respuesta = respuestaRaw.json();
            if (respuesta) {
    
                // Y si llegamos hasta aquí, todo ha ido bien
                this.alert("USUARIO AGREGADO");
            }
      
       

        }catch(e){ 
            console.log("el error es "+e);
        }
    }



    edicion.ondblclick = function () {
        var tBody = tabla.querySelector("tbody");
        for (let i = 0; i < tBody.rows.length; i++) {
            let celda = document.createElement("td");

            let borrar = document.createElement("span");
            borrar.innerHTML = 'BORRAR   ';

            let editar = document.createElement("span");
            editar.innerHTML = 'EDITAR';

            celda.appendChild(borrar);
            celda.appendChild(editar);

            tBody.rows[i].appendChild(celda);
        }
    }
})