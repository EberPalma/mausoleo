document.addEventListener("DOMContentLoaded", () => {
    axios.get("/api/nichosdashboard").then((response) => {
        document.querySelector("#countNichos").innerHTML =
            response.data + " Nichos";
    });
    axios.get("/api/huespedesdashboard").then((response) => {
        document.querySelector("#countHuespedes").innerHTML =
            response.data + " Huespedes";
    });
    axios.get("/api/contactodashboard").then((response) => {
        document.querySelector("#countContacto").innerHTML =
            response.data + " Formularios";
    });
});
