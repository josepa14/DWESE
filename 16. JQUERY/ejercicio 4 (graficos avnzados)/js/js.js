$(function () {
    var provincias = $("#provincias");
    var municipios = $("#municipios");
    var btnAnadir = $("#btnAnadir")
    var annadidos = $("#annadidos")
    var graf = $("#grafTemperaturas").get();
    $.ajax({
        method: "get",
        url: "https://www.el-tiempo.net/api/json/v2/provincias",
        dataType: "json"
    }).done(function (data) {

        $.each(data.provincias, function (i, v) {

            $("<option>")
                .val(v.CODPROV)
                .text(v.NOMBRE_PROVINCIA)
                .appendTo(provincias)

        })
        provincias.change(function () {
            municipios.empty()
            $.ajax({
                method: "get",
                url: "https://www.el-tiempo.net/api/json/v2/provincias/" + $(this).val() + "/municipios",
                dataType: "json",
            }).done(function (data) {

                $.each(data.municipios, function (i, v) {
                    $("<option>")
                        .val(v.CODIGOINE.substr(0, 5))
                        .text(v.NOMBRE)
                        .appendTo(municipios)
                })
            })

        })


    })
    btnAnadir.click(function (ev) {
        ev.preventDefault();
        var localidad = municipios.find(":selected").text()
        var provincias2 = provincias.find(":selected").text();
        if (localidad !== "") {
            var codLocalidad = municipios.val();
            var codProvincia = provincias.val();
            var label = localidad + "(" + provincias2 + ")"
            $.ajax({
                method: "get",
                url: "https://www.el-tiempo.net/api/json/v2/provincias/"
                    + codProvincia +
                    "/municipios/" + codLocalidad,
                dataType: "json",
            }).done(function (data) {
                 pintar(data.pronostico.hoy.temperatura,label,graf)
            })
            $("<div>").text(label).appendTo(annadidos)
        }
        function pintar(datos,etiqueta,canvas){
            if(canvas.graf === undefined){
                let datasets = {
                    label:etiqueta,
                    data:datos
                }
                let data={
                    labels:[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15],
                    datasets:[]
                }
                data.datasets.push(datasets);
                canvas.graf === new Chart(canvas,{
                    type:'line',
                    data:data
                });  
            } else{
                let datasets={
                    label:etiqueta,
                    data:datos
                }
                //añadir los datos
                canvas.graf.data.datasets.push(datasets)
                canvas.graf.update()

            }
            
        }
    })

})

