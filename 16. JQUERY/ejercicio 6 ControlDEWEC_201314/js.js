
$(function () {

    $("img[id^=imagen_]").draggable(
        {
        helper:"clone",
        revert:"true",
        start:function(ev,ui){
            ui.helper.attr("data-mensaje",ui.helper.prevObject.attr("id").split("_")[1])
        }
    
        }

    )
        $("#carrito").droppable({
            drop: function (ev,ui) {
                console.log(ui.helper.attr("data-mensaje"))
                comprar(ui.helper.attr("data-mensaje"))()
              //comprar(ui.draggable.attr("id").split("_")[1])();
            
                $(this)
                    .addClass("ui-state-highlight")
                    .find("h2")
                    .html("Dropped!");
            },
            over:function(ev,ui){
                $(this).css({border:"1px solid red"})
            },
            out:function(ev,ui){
                $(this).css({border:"none"})
            }
            
        })


    $("a[id^=comprar_]").click(function (ev) {
        ev.preventDefault()
        comprar(this.id.split("_")[1])();
    })


    $("[id^=detalles_]").click(function (ev) {
        ev.preventDefault()
        var code = this.id.split("_")[1]
        $.ajax({
            url: "ajax.php?accion=detalle&id=" + code,
            dataType: "json"
        }).done(function (data) {
            console.log(data)
            //crearPlantilla(data)
            var plantilla = `
            <div class="producto_detalle" id="producto_1">
                <div class="info">
                    <div class="titulo_precio">Precio:</div>
                    <div class="precio"></div>
                     <p class="descripcion"></p>
                     <a href="#">Comprar</a>
                    
                </div>
            <div class="foto"><img src="index_files/01coc.jpg"></div>
            </div>`
            var jqPlantilla = $(plantilla);
            jqPlantilla.find(".precio").text(data.precio)//dentro del text la variable;
            jqPlantilla.find(".descripcion").text(data.descripcion);
            jqPlantilla.find("a").click(comprar(data.id));
            jqPlantilla.find("img").attr("src", "index_files/" +
                ((data.id < 10) ? "0" + data.id : data.id) + "coc.jpg")
            jqPlantilla.dialog({ modal: true, title: data.nombre, width: "800px" })
        })



        


        



    })
    function comprar(id) {//mirar por que hay que poner return function
        return function () {
            $.ajax({
                url: "ajax.php?accion=comprar&id=" + id
            }).done(function (respuesta) {
                if (respuesta === "ok") {
                    actualizarCarrito()
                }
            })
        }
    }
    function actualizarCarrito() {
        $.ajax({
            method: "get",
            url: "ajax.php?accion=ver_carrito",
            dataType: "json"
        }).done(function (data) {
            var total = data.total
            $("#total_carrito").text(total)
        })
    }
})

