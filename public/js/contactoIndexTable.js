document.addEventListener("DOMContentLoaded", () => {
    let filtro = document.querySelector("#btnBuscar");
    loadWithCheckbox(document.querySelector("#filtroStatus").value, "activo");

    let showAllCheckbox = document.querySelector("#defaultCheck1");

    showAllCheckbox.addEventListener("change", () => {
        if (showAllCheckbox.checked) {
            loadWithCheckbox(
                document.querySelector("#filtroStatus").value,
                "todos"
            );
        } else {
            loadWithCheckbox(
                document.querySelector("#filtroStatus").value,
                "activo"
            );
        }
    });

    filtro.addEventListener("click", () => {
        if (showAllCheckbox.checked) {
            loadWithCheckbox(
                document.querySelector("#filtroStatus").value,
                "todos"
            );
        } else {
            loadWithCheckbox(
                document.querySelector("#filtroStatus").value,
                "activo"
            );
        }
    });
});

function loadWithCheckbox(filtro, activo) {
    axios
        .get("api/contactoindex/" + filtro + "/" + activo)
        .then((response) => loadTable(response));
}

function loadTable(response) {
    document.querySelector("#tableBody").innerHTML = "";
    let tabla = document.querySelector("#tableBody");
    let data = response.data;
    data.data.forEach((e) => {
        let check = e.atendido == 1 ? "checked" : "";
        let atendido = `<td>
                            <div class="form-check">
                                    <input class="form-check-input" style="visibility: visible; opacity: 1" id="id${e.id}" type="checkbox" value="${e.id}" ${check}>

                            </div>
                        </td>`;
        let mensaje = `<td><small>${e.mensaje}</small></td>`;
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
        let acciones = `<td class="td-actions"  >
            
                                <a href="https://api.whatsapp.com/send?phone=https://api.whatsapp.com/send?phone=521${e.telefono}" target="_blank" title="Mandar mensaje" class="btn btn-sm btn-success">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                                <a href="mailto:${e.email}?Subject=Mausoleo%20Santa%20Clara"  target="_blank" rel="tooltip" title="Mandar email" class="btn btn-sm btn-info">
                                    <i class="fa fa-envelope"></i>
                                </a><br>
                                <label class="btn btn-sm btn-danger" rel="tooltip" title="Borrar" id="delete${e.id}">
                                    <i class="fa fa-trash"></i>
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
        document.querySelector("#id" + e.id).addEventListener("click", () => {
            axios.get("/api/contactochecked/" + e.id);
        });
        document
            .querySelector("#delete" + e.id)
            .addEventListener("click", () => {
                axios.get("/api/contactoactivo/" + e.id);
                tabla.removeChild(tableRow);
            });
    });
}
