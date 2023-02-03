$(function () {
    var diasfestivos=["27/02/2023","28/02/2023","01/03/2023"];
    $.datepicker.setDefaults()
    $('#entrada').datepicker({
        dateFormat: "dd/mm/yy",
        minDate: "+1D",
        maxDate: "+3M +1D",
        firstDay:1,
        onSelect: function (text, obj) {
        
         //   var desde = new Date(obj.currentYear, obj.currentMonth, obj.currentDay + 1);
            $('#salida').val("").datepicker("destroy").datepicker({
                dateFormat: "dd/mm/yy",
                firstDay:1,
                minDate: new Date(obj.currentYear, obj.currentMonth, obj.currentDay+1),
                maxDate: new Date(obj.currentYear, obj.currentMonth, obj.currentDay+23),
                beforeShowDay://$.datepicker.noWeekends
                function(fecha){
                    var respuesta= [true,"",""];
                    var dia= fecha.getDate();
                    var mes= fecha.getMonth()+1;
                    var anno = fecha.getFullYear();

                    var cadenaFecha=((dia<10)?"0"+dia:dia)+"/"+((mes<10)?"0"+mes:mes)+"/"+anno
                    if(fecha.getDay()%6==0 || diasfestivos.indexOf(cadenaFecha)>-1){
                        respuesta=[false,"",""]
                    }
                    return respuesta;
                } 
        });
        }
    });


})