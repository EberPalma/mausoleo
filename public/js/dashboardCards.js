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
        console.log(response.data);
    });
    axios.get("/api/informesdashboard").then((response) => {
        document.querySelector("#countInformes").value =
            response.data;
        console.log(response.data);
    });
    axios.get("/api/quejasdashboard").then((response) => {
        document.querySelector("#countQuejas").value =
            response.data;
        console.log(response.data);
    });
    axios.get("/api/otrosdashboard").then((response) => {
        document.querySelector("#countOtros").value =
            response.data;
        console.log(response.data);
    });
});
