document.addEventListener("DOMContentLoaded", () => {
    let btn = document.querySelector("#agregarBTN");
    let input_coordenada = document.querySelector("#input-coordenada");
    let input_name = document.querySelector("#input-name");
    let input_paterno = document.querySelector("#input-paterno");
    let input_materno = document.querySelector("#input-materno");
    let fecha_nacimiento = document.querySelector("#inputconcatna");
    let input_fechad = document.querySelector("#inputconcatd");
    let input_mensaje = document.querySelector("#input-mensaje");
    btn.addEventListener("click", (e) => {
        e.preventDefault();

        axios
            .post("/api/beneficiariosstore", {
                idNicho: input_coordenada.value,
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
