window.addEventListener("load", function () {
    formulario = this.document.getElementById("datos");

    formulario.onsubmit = function (ev) {
        ev.preventDefault();
        if (formulario.nombre.value !== "" || formulario.files.length > 0) {
            datos = new FormData();
            datos.append("nombre", formulario.nombre.value);
            datos.append("fichero", formulario.fichero.files[0]); // files debe llevar el 0

            fetch("php/ficha.php", {
                method: "POST",
                body: datos
            }).then(async(obj) => {
                var respuesta={};
                if (obj.ok) {
                   
                    respuesta.funciona = true;
                    respuesta.datos = await obj.json();
                    console.log("todo bien rey");

                } else {
                    respuesta.funciona=false;
                    respuesta.mensaje="ERROR "+respuesta.status;
                }
                return respuesta;
              
            })
                //hacer el return respuesta hace que devuelva el objeto y con el siguiente then simplemente le hemos puesto otro nombre pero automaticamente coge ese objeto
                .then(json => {
                    if(json.funciona){
                    alert(json.datos.nombre + " ha venviado el fichero " + json.datos.fichero);
                    }else{
                        alert("error en la comunicacion");
                    }
            })
        }
    }


})

