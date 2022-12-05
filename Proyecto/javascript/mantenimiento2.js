window.addEventListener("load", function () {
    var tabla = this.document.getElementById("editable");
    var edicion = this.document.getElementById("ediccion");
    edicion.ondblclick = function () {
        var tBody = tabla.querySelector("tbody");
        for (let i = 0; i < tBody.rows.length; i++) {
            let celda = document.createElement("td");

            let borrar = document.createElement("span");
            borrar.innerHTML = 'BORRAR   ';

            let editar = document.createElement("span");
            editar.innerHTML = 'EDITAR';

            celda.appendChild(borrar);
            celda.appendChild(editar);

            tBody.rows[i].appendChild(celda);
        }
    }
})