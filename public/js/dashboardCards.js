document.addEventListener("DOMContentLoaded", () => {
    numExport = new numExport();
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

class numExport {
    constructor() {}
    setNichos(nichos) {
        this.nichos = nichos;
    }
    getNichos() {
        return this.nichos;
    }
    setHuespedes(huespedes) {
        this.huespedes = huespedes;
    }
    getHuespedes() {
        return this.huespedes;
    }
    setContacto(contacto) {
        this.contacto = contacto;
    }
    getContacto() {
        return this.contacto;
    }
}
