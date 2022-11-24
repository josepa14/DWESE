window.addEventListener("load", function () {

    var continente = document.getElementById("continente");
    continente.onclick = function (ev) {
        var vcontinente = ev.target.value;
        fetch("https://restcountries.com/v3.1/region/" + vcontinente)
            .then(repuesta=>console.log(repuesta.json()));


    }



})