window.addEventListener("load", function () {

    const boton = this.document.getElementById("boton");
    const conectar =this.document.getElementById("conectar");
    boton.onclick = function (ev) {
        ev.preventDefault();
        var user = this.form.origen.value;
        var des = this.form.destino.value;
        var men = this.form.mensaje.value;
        var parametro="origen="+user+"&destino="+des+"&mensaje="+men;
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange=function(){
            if (this.status == 200 && this.readyState == 4){
                console.log(this.responseText);
            }
        }
        ajax.open("post","./php/index.php?accion=nuevo");
        ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax.send(encodeURI(parametro));
    }

    conectar.onclick=function(ev){
        ev.preventDefault();
        var user = this.form.origen.value;
        var des = this.form.destino.value;
        var contenedor = document.getElementById("contenedor");
        var ultimo= contenedor.getAttribute("data");
        var ajax = new XMLHttpRequest();
        var parametro="origen="+user+"&destino="+des+"&ultimo="+ultimo;
        ajax.onreadystatechange=function(){
            if (this.status == 200 && this.readyState == 4){
                console.log(this.responseText);
            }
        }
        ajax.open("post","./php/index.php?accion=recuperar");
        ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax.send(encodeURI(parametro)); 
    }



})