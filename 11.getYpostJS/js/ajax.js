window.addEventListener("load", function () {
    var continente = document.getElementById("continente");
    var ajax = new XMLHttpRequest();
    var selectPaises = this.document.getElementById("paises");





    function cargarpaises(continente, callback) {

        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var paises = JSON.parse(this.responseText);
                callback(paises);

            }
        }
        ajax.open("GET", "https://restcountries.com/v3.1/region/" + continente);
        ajax.send();
    }

    continente.onclick = function (ev) {
        cargarpaises(ev.target.value, rellenarPaisSeleccionado)
    }

    function rellenarPaisSeleccionado(paises) {
        paises.sort(function (a, b) {
            return a.translations.spa.common.localeCompare(b.translations.spa.common)
        });
        selectPaises.innerHTML = "";
        var tamano = paises.length;
        for (let i = 0; i < tamano; i++) {
            var option = document.createElement("option");
            option.value = paises[i].cca3;
            option.innerHTML = paises[i].translations.spa.common;
            selectPaises.appendChild(option);
        }
    }



    selectPaises.onclick = function (ev) {
        if (this.options.length > 0) {
            cargarpais(ev.target.value, rellenarInfoPais);
        }
    }

    function rellenarInfoPais(pais) {
        var div=document.createElement("div");
       // var wPantalla = window.screen.availWidth;
       // var hPantalla = window.screen.availHeight;
       // var posicion = "width=400px,height=250px,left=" + parseInt((wPantalla - 400) / 2) + "px,top=" + parseInt((hPantalla - 250) / 2) + "px";
       // var ventana = window.open("", "jsep", posicion);
       // ventana.document.body.innerHTML = "";
        var h1 = document.createElement("h1");
        var idiomas = [];
        h1.innerHTML = pais.translations.spa.common;
        div.appendChild(h1);
        for (prop in pais.languages) {
            idiomas.push(pais.languages[prop])
        }
        var pIdiomas = document.createElement("p");
        pIdiomas.innerHTML = "los idiomas hablados son: " + idiomas.join(", ");
       div.appendChild(pIdiomas);

        modal(div,"mensaje");
    }



    function cargarpais(pais, callback) {
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var pais = JSON.parse(this.responseText)[0];
                console.log(pais);
                console.log("aa");
                callback(pais);

            }
        }
        ajax.open("GET", "https://restcountries.com/v3.1/alpha/" + pais);
        ajax.send();
    }


})
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