HTMLTableElement.prototype.activadaEdiccion = true;

//metodo que convierte la tabla en editar

HTMLTableElement.prototype.editable=function(){
    var tabla = this;
    var thead = tabla.querySelector("thead");
    thead.addEventListener("dblclick", function(){
        if (!tabla.activadaEdiccion){
            tabla.editar();

        }else{
            tabla.desEditar();
        }
        tabla.activadaEdiccion=!tabla.activadaEdiccion;
    })
}

HTMLTableElement.prototype.editar=function(){
    var tabla = this;
    var tHead = tabla.querySelector("thead");
    var tBody = tabla.querySelector("tbody");
    var th=document.createElement("th");
    th.setAttribute("rowspan", tHead.rows.length);
    th.className="AutomaticCreateByEditTable";
    th.innerHTML="Ediccion";
    tHead.rows[0].appendChild(th);
    for (let i=0; i<tBody.rows.length; i++){
        let celda = document.createElement("td");


        let borrar=document.createElement("span");
        borrar.innerHTML='BORRAR   ';
        borrar.onclick= async function(){
            const respuestaConfirmacion = await Swal.fire({
                title: "Confirmación",
                text: "¿Eliminar el usuario? esto no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#3085d6',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
            });
            if (respuestaConfirmacion.value) {
                const url = 'http://localhost/concurso/helper/usuarioApi.php';
                
                try{
                    var id=documen;
                    var respuesta = await fetch("http://localhost/concurso/helper/usuarioApi.php?id="+id,{
                        method: 'DELETE',
                        mode: 'cors',
                        cache: 'no-cache',
                    });
                    console.log(e);
                } catch(err){
                    console.log("Ocurrio un error: "+err);
                }

              /*  const respuestaRaw = await fetch(url, {
                    method: "DELETE",
                    
                });
                const respuesta = await respuestaRaw.json();*/
                if (respuesta) {
                    Swal.fire({
                        icon: "success",
                        text: "Usuario eliminado",
                        timer: 700, // <- Ocultar dentro de 0.7 segundos
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        text: "El servidor no respondió con una respuesta exitosa",
                    });
                }
                // De cualquier modo, volver a obtener los productos para refrescar la tabla
                //obtenerProductos();
            this.parentElement.parentElement.eliminar();

            }
        }
        let editar=document.createElement("span");
        editar.innerHTML='EDITAR';
        editar.onclick= function(){
            this.parentElement.parentElement.editar();
        }
        let subir=document.createElement("span");
        subir.innerHTML='<i class="fa-solid fa-caret-up fa-xl"></i>&nbsp;&nbsp;&nbsp;&nbsp';
        subir.onclick= function(){
            this.parentElement.parentElement.subir();
        }
        let bajar=document.createElement("span");
        bajar.innerHTML='<i class="fa-solid fa-caret-down fa-xl"></i>';
        bajar.onclick= function(){
            this.parentElement.parentElement.bajar();
        }

        celda.appendChild(borrar);
        celda.appendChild(editar);
        celda.appendChild(subir);
        celda.appendChild(bajar);
        th.className="AutomaticCreateByEditTable";
        tBody.rows[i].appendChild(celda);
    }
}
HTMLTableElement.prototype.desEditar=function(){
    var tabla = this;
    var tdsMios= this.getElementsByClassName("AutomaticCreateByEditTable");
    var tamano= tdsMios.length;
    for (let i=0; i<tamano; i++){
        tdsMios[0].parentElement.removeChild(tdsMios[0]);
    }
}

HTMLTableRowElement.prototype.subir=function(){
    var anterior=this.previousElementSibling;
    if(anterior!==null){
        this.parentElement.insertBefore(this,anterior);
    }
}
HTMLTableRowElement.prototype.bajar=function(){
    var siguiente=this.nextElementSibling;
    if(siguiente!==null){
        this.parentElement.insertBefore(siguiente,this);
    }
}

HTMLTableRowElement.prototype.eliminar=function(){
    this.parentElement.removeChild(this);
}
HTMLTableRowElement.prototype.editar=function(){
    var celda= this.cells;
    var tamano= celda.length;
    for (let i=0; i<tamano; i++){
        if (celda[i].className!=="AutomaticCreateByEditTable"){
            celda[i].editar();
        }
    }
}

HTMLTableCellElement.prototype.editar=function(){
    if(this.estaEditada===undefined || this.estaEditada===false){
        var txtValor = document.createElement("input");
        txtValor.type="text";
        txtValor.value=this.innerHTML;
       
        txtValor.addEventListener("keypress", function (ev){
            var celda = this.parentElement;
            if (ev.key==="Enter"){
                celda.estaEditada=false;
                celda.innerHTML=this.value;
            }
        })
        this.innerHTML="";
        this.estaEditada=true;
        this.appendChild(txtValor);
    }
}

window.addEventListener("load", function(){
    var tablas = this.document.querySelectorAll("table.editable");
    for (let i=0; i<tablas.length; i++)
    tablas[i].editable();
})