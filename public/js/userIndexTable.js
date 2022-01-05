document.addEventListener("DOMContentLoaded", () => {
    axios
        .get("/api/userindex", {
            idSession: localStorage.mausoleoSessionId_session,
        })
        .then((response) => {
            let tabla = document.querySelector("#tableBody").innerHTML;
            let data = response.data;
            data.data.forEach((e) => {
                let userName = `<td>${e.nombre} ${e.ap_paterno} ${e.ap_materno}</td>`;
                let userEmail =
                    e.email != null
                        ? `<td>${e.email}</td>`
                        : `<td>No cuenta con email</td>`;
                let userCreado = `<td>${e.fecha_creado}</td>`;
                let userEdit = `<td class="d-flex justify-content-end"><a href="#"><i class="fa fa-edit"></i></a></td></tr>`;
                let tableRow =
                    "<tr>" + userName + userEmail + userCreado + userEdit;
                tabla = tabla + tableRow;
                document.querySelector("#tableBody").innerHTML = tabla;
            });
        });
});
