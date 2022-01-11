document.addEventListener("DOMContentLoaded", () => {
    let showAllCheckbox = document.querySelector("#defaultCheck1");
    showAllCheckbox.addEventListener("change", () => {
        if (showAllCheckbox.checked) {
            axios.get("/api/userindex/todos").then((response) => {
                loadTable(response);
            });
        } else {
            axios.get("/api/userindex/activo").then((response) => {
                loadTable(response);
            });
        }
    });
    axios.get("/api/userindex/activo").then((response) => {
        loadTable(response);
    });
});

function loadTable(response) {
    let tabla = document.querySelector("#tableBody");
    tabla.innerHTML = "";
    let data = response.data;
    data.data.forEach((e) => {
        let userName = `<td>${e.username}</td>`;
        let userNombre = `<td>${e.name}</td>`;
        let userApPaterno = `<td>${e.ap_paterno}</td>`;
        let userApMaterno = `<td>${e.ap_materno}</td>`;
        let userRol = `<td>${e.id_rol.nombre}</td>`;
        let userEmail =
            e.email != null
                ? `<td>${e.email}</td>`
                : `<td>No cuenta con email</td>`;
        let userCreado = `<td>${e.created_at}</td>`;
        let userEdit = `<td class="d-flex justify-content-end">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        
                                <label class="btn btn-sm btn-secondary" title="Editar usuario">
                                <a href="#" type="radio" name="options" > <i class="fa fa-edit"></i> </a>
                                </label>
                                <label class="btn btn-sm btn-danger"  title="Borrar usuario" id="delete${e.id}">
                                    <i class="fa fa-trash"></i>
                                </label>
                            </div>
                        </td>`;

        let tableRow = document.createElement("tr");
        tableRow.innerHTML =
            "<tr>" +
            userName +
            userNombre +
            userApPaterno +
            userApMaterno +
            userRol +
            userEmail +
            userCreado +
            userEdit +
            "</tr>";
        tabla.appendChild(tableRow);
        document
            .querySelector("#delete" + e.id)
            .addEventListener("click", () => {
                axios.get("/api/userdelete/" + e.id);
                tabla.removeChild(tableRow);
            });
    });
}
