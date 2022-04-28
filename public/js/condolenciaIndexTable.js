document.addEventListener("DOMContentLoaded", () => {
    let filtro = document.querySelector("#btnBuscar");
    loadWithCheckbox(document.querySelector("#filtroStatus").value, 1);

    let showAllCheckbox = document.querySelector("#defaultCheck1");

    showAllCheckbox.addEventListener("change", () => {
        if (showAllCheckbox.checked) {
            loadWithCheckbox(
                document.querySelector("#filtroStatus").value,
                1
            );
        } else {
            loadWithCheckbox(
                document.querySelector("#filtroStatus").value,
                0
            );
        }
    });

    filtro.addEventListener("click", () => {
        if (showAllCheckbox.checked) {
            loadWithCheckbox(
                document.querySelector("#filtroStatus").value,
                1
            );
        } else {
            loadWithCheckbox(
                document.querySelector("#filtroStatus").value,
                0
            );
        }
    });

});

function loadWithCheckbox(filtro, activo) {
    axios
        .get("api/condolenciaindex/" + filtro + "/" + activo)
        .then((response) => loadTable(response));
}

function loadTable(response) {
    document.querySelector("#tableBody").innerHTML = "";
    let tabla = document.querySelector("#tableBody");
    let data = response.data;
    data.data.forEach((e) => {
        let check = e.verificado == 1 ? "checked" : "";
        let verificado = `<td>
                            <div class="form-check">
                                    <input class="form-check-input" style="visibility: visible; opacity: 1" id="id${e.id}" type="checkbox" value="${e.id}" ${check}>

                            </div>
                        </td>`;
        let idifunto = `<td><a class="btn btn-warning" href="https://www.mausoleosantaclara.com.mx/Informacion/Nicho/${e.difunto.forEach((difunto)=>{console.log(difunto.idNicho); let nicho =difunto.idNicho})}" target="_blank">${e.idifunto}</a></td>`;
        let mensaje = `<td><small>${e.mensaje}</small></td>`;
        let nombre = `<td><small>${e.nombre}</small></td>`;
        let email =
            e.email != null
                ? `<td><a class="btn btn-primary" href="mailto:${e.email}?Subject=Mausoleo%20Santa%20Clara">${e.email}</a></td>`
                : `<td><small>No hay registro</small></td>`;
        let emailn =
            e.email != null
                ? `<td><a class="btn btn-primary" href="mailto:${e.emailn}?Subject=Mausoleo%20Santa%20Clara">${e.emailn}</a></td>`
                : `<td><small>No hay registro</small></td>`;
        let fechaRegistro = `<td>
                                    <small>${e.created_at}</small>
                                </td>`;
        let acciones = e.activo == 1 ? `<td class="td-actions"  >



                                <label class="btn btn-sm btn-danger" rel="tooltip" title="Borrar" id="delete${e.id}">
                                    <i class="fa fa-trash"></i>
                                </label>

                            </td>` : `<td class="td-actions"  >



                            <label class="btn btn-sm btn-warning" rel="tooltip" title="Borrar" id="delete${e.id}">
                                Restaurar
                            </label>

                        </td>`;

        let tableRow = document.createElement("tr");
        tableRow.innerHTML =
            "<tr>" +
            verificado +
            idifunto +
            mensaje +
            nombre +
            email +
            emailn +
            acciones +
            fechaRegistro +
            "</tr>";
        tabla.appendChild(tableRow);
        document.querySelector("#id" + e.id).addEventListener("click", () => {
            axios.get("/api/condolenciachecked/" + e.id);
        });
        document
            .querySelector("#delete" + e.id)
            .addEventListener("click", () => {
                axios.get("/api/condolenciaactivo/" + e.id);
                tabla.removeChild(tableRow);
            });
    });
}

