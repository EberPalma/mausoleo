document.addEventListener("DOMContentLoaded", () => {
    axios.get("/api/contactoindexdashboard").then((response) => {
        let tabla = document.querySelector("#tableBody");
        let data = response.data;
        data.data.forEach((e) => {
            let check = e.atendido == 1 ? "checked" : "";
            let atendido = `<td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" id="id${e.id}" type="checkbox" value="" ${check}>
                                        <span class="form-check-sign"></span>
                                    </label>
                                </div>
                            </td>`;
            let mensaje = `<td>${e.mensaje}</td>`;
            let acciones = `<td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" rel="tooltip" id="delete${e.id}" title="Remove" class="btn btn-danger btn-simple btn-link">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>`;

            let tableRow = document.createElement("tr");
            tableRow.innerHTML =
                "<tr>" + atendido + mensaje + acciones + "</tr>";
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
});
