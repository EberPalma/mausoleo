document.addEventListener("DOMContentLoaded", () => {
    axios
        .get("/api/userindex", {
            idSession: localStorage.mausoleoSessionId_session,
        })
        .then((response) => {
            let tabla = document.querySelector("#tableBody").innerHTML;
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
                                        <label class="btn btn-sm btn-danger"  title="Borrar usuario">
                                        <a href="{{ url('api/userdelete/${e.id}') }}" type="radio" name="options"> <i class="fa fa-trash"></i></a>
                                        </label>
                                    </div>
                                </td>`;
                let tableRow =
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
                tabla = tabla + tableRow;
                document.querySelector("#tableBody").innerHTML = tabla;
            });
        });
});
