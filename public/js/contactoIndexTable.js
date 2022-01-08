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
        let tabla = document.querySelector("#tableBody");
        let data = response.data;
        data.data.forEach((e) => {
            let check = e.atendido == 1 ? "checked" : "";
            let atendido = `<td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" id="id${e.id}" type="checkbox" value="${e.id}" ${check}>
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
                                <label class="btn btn-sm btn-danger" id="delete${e.id}">
                                    <i class="fa fa-trash"></i> Borrar
                                </label>
                            </td>`;

            let tableRow = document.createElement("tr");
            tableRow.innerHTML =
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
            tabla.appendChild(tableRow);
            document
                .querySelector("#id" + e.id)
                .addEventListener("click", () => {
                    axios.get("/api/contactochecked/" + e.id);
                });
            document
                .querySelector("#delete" + e.id)
                .addEventListener("click", () => {
                    axios.get("/api/contactoactivo/" + e.id);
                    tabla.removeChild(tableRow);
                });
        });
    });
}
