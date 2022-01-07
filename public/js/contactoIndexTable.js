document.addEventListener("DOMContentLoaded", () => {
    let filtro = document.querySelector("#btnBuscar");
    getContactoInfo(document.querySelector("#filtroStatus").value);
    filtro.addEventListener("click", () => {
        clearTable();
        getContactoInfo(document.querySelector("#filtroStatus").value);
    });
});

function clearTable() {
    document.querySelector("#tableBody").innerHTML = "";
}

function getContactoInfo(tipo) {
    axios.get("/api/contactoindex/" + tipo).then((response) => {
        let tabla = document.querySelector("#tableBody").innerHTML;
        let data = response.data;
        data.data.forEach((e) => {
            let atendido = `<td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="">
                                        <span class="form-check-sign"></span>
                                    </label>
                                </div>
                            </td>`;
            let mensaje = `<td style="width:250px"><small>${e.mensaje}</small></td>`;
            let asunto = `<td><small>${e.asunto}</small></td>`;
            let nombre = `<td><small>${e.nombre}</small></td>`;
            let telefono = `<td><small>${e.telefono}</small></td>`;
            let email =
                e.email != null
                    ? `<td><small>${e.email}</small></td>`
                    : `<td><small>No hay registro</small></td>`;
            let fechaRegistro = `<td>
                                    <small>${e.created_at}</small>
                                </td>`;
            let acciones = `<td class="td-actions text-right" class="d-flex align-items-center; width:100px;">
                                <button type="button" rel="tooltip" title="Mandar mensaje" class="btn btn-success">
                                    <i class="fa fa-whatsapp"></i>
                                </button>
                            </td>`;

            let tableRow =
                "<tr>" +
                atendido +
                mensaje +
                asunto +
                nombre +
                telefono +
                email +
                fechaRegistro +
                acciones +
                "</tr>";
            tabla = tabla + tableRow;
            document.querySelector("#tableBody").innerHTML = tabla;
        });
    });
}
