document.addEventListener("DOMContentLoaded", () => {
    let btn = document.querySelector("#agregarBTN");
    let input_name = document.querySelector("#input-name");
    let input_paterno = document.querySelector("#input-paterno");
    let input_materno = document.querySelector("#input-materno");
    let fecha_nacimiento = document.querySelector("#fecha_nacimiento");
    let input_fechad = document.querySelector("#input-fechad");
    let input_mensaje = document.querySelector("#input-mensaje");
    btn.addEventListener("click", (e) => {
        e.preventDefault();

        axios
            .post("/api/beneficiariosstore", {
                idNicho: 1,
                nombre:
                    input_name.value +
                    " " +
                    input_paterno.value +
                    " " +
                    input_materno.value,
                fechaNacimiento: fecha_nacimiento.value,
                fechaDefuncion: input_fechad.value,
                mensaje: input_mensaje.value,
            })
            .then(() => {
                alert("Registro realizado correctamente");
            })
            .catch(() => {
                alert("Ha ocurrido un error, por favor revisa la informacion");
            });
    });
});
