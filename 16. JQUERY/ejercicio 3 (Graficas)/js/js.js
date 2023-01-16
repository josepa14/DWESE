$(function () {

    const ctx = document.getElementById('myChart');
    const ctx2 = document.getElementById('myChart2');
    $.getJSON("https://www.el-tiempo.net/api/json/v2/provincias/23/municipios", function (datos) {
        var temp = datos.municipios
        $.each(temp, function (i, v) {
            var codigoP = v.CODIGOINE;
            $("<option>").text(v.NOMBRE).val(codigoP.slice(0,5)).appendTo("#municipios")
            $("<option>").text(v.NOMBRE).val(codigoP.slice(0,5)).appendTo("#municipiosB")
        })    
    }
    )
    $('select[name=municipios]').change(function(data){
        $.getJSON("https://www.el-tiempo.net/api/json/v2/provincias/23/municipios/" + $(this).val(),function(data){
            console.log(data.pronostico.hoy.temperatura)
            var temps= data.pronostico.hoy.temperatura;
            var array = [];
            var labels = [];
            $.each(temps,function(i,v){
                array.push(v)
                labels.push(i)
            })
            console.log(array)

        mostrargrafica(array,labels,ctx)
        }
        )
    })
    $('select[name=municipiosB]').change(function(data){
        $.getJSON("https://www.el-tiempo.net/api/json/v2/provincias/23/municipios/" + $(this).val(),function(data){
            console.log(data.pronostico.hoy.temperatura)
            var temps= data.pronostico.hoy.temperatura;
            var array = [];
            var labels = [];
            $.each(temps,function(i,v){
                array.push(v)
                labels.push(i)
            })
            console.log(array)

        mostrargrafica(array,labels,ctx2)
        }
        )
    })

    //grafica ejemplo
function mostrargrafica(datos,labels,cnt){
  
    if(cnt.grafico===undefined){
        cnt.grafico = new Chart(cnt, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Votes',
                data: datos,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    })
    }
    else{
        cnt.grafico.data.datasets[0].data=datos;
        cnt.grafico.update();
    }
   
    // if (myChart ) {
    //     myChart.destroy();
    // }
    
}
    
}

)
