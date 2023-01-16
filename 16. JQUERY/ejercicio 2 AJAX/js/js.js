$(function () {
    $("input:button").click(function (ev) {
        ev.preventDefault();
        var param = document.getElementById("param").value //otra forma input[name=pais] coge el input que tenga como name "pais" en jquery
        var ul = $("ul");
        ul.empty();
        var lista=[];
        console.log(param)
        $.getJSON("https://restcountries.com/v3.1/name/" + param, {
            method: "GET",
            datatype: "json"
        })
        .done(function (data) {
           $.each(data,function(i,v){
            $("<li>").text(v.translations.spa.common).appendTo(ul)
            lista.push(v.translations.spa.common)
           })
           $("h1").text("LISTA ORDENADA")
           lista.sort(function(a,b){return a.localeCompare(b)})//AQUI TENGO LA LISTA ORDENADA YA
           $.getScript("js/ordenaLista.js").done(function(){
            ordenaPaises()})
        }).fail(function () {
            alert("FALLO")
        })






    })
})


