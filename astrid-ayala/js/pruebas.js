let arrayEstudiantes = [
    {carnet: 20235886, nombre: "Alejandro", apellido: "Tobar", nota1: 8, nota2: 8.5, nota3: 8},
    {carnet: 20235886, nombre: "Nahomi", apellido: "Serrano", nota1: 9, nota2: 9.2, nota3: 10},
    {carnet: 20235886, nombre: "Diego", apellido: "Morales", nota1: 8.5, nota2: 9.5, nota3: 9.7}
]
function promedioCalificaciones(){
    let sumarNotas = 0
    let totalNotas = 0

    for(const estudiante of arrayEstudiantes){
        sumarNotas += estudiante.nota1 + estudiante.nota2 + estudiante.nota3
        totalNotas += 3
    }
    return sumarNotas/totalNotas
}
function graficoProgreso(){
    let circularProgress = document.querySelector("#grafico-progreso"),
        progressValue = document.querySelector("#valor-progreso");

    let progressStartValue = 0,
        progressEndValue = 58.6,
        speed = 7;

    let progress = setInterval(() => {
        progressStartValue += 0.5

        progressValue.textContent = `${progressStartValue.toFixed(1)}%`
        circularProgress.style.background = `conic-gradient(var(--celeste-2) ${progressStartValue * 3.6}deg, var(--grisNuevo) 0deg)`

        if (progressStartValue >= progressEndValue){
            clearInterval(progress);
            progressValue.textContent = `${progressEndValue.toFixed(1)}%`
        }

        console.log(progressStartValue);
    }, speed);
}
function graficoCalificaciones(){
    let circularCalification = document.querySelector("#grafico-calificacion"),
    calificationValue = document.querySelector("#valor-calificacion");

    let calificationStartValue = 0,
        calificationEndValue = promedioCalificaciones(),
        maxCalificationValue = 10,
        speed = 15;

    let progress = setInterval(() => {
        calificationStartValue += 0.1

    calificationValue.textContent = `${calificationStartValue.toFixed(1)}`
    circularCalification.style.background = `conic-gradient(var(--azul-3) ${(calificationStartValue / maxCalificationValue) * 360}deg, var(--grisNuevo) 0deg)`

    if (calificationStartValue >= calificationEndValue){
        clearInterval(progress);
        calificationValue.textContent = `${calificationEndValue.toFixed(1)}`
    }
        console.log(calificationStartValue);
    }, speed);
}
function viewEstudiantes() {
    let containerEstudiantes = document.getElementById('containerEstudiantes')
    // Validar si existen los estudiantes registrados
    let totalEstudiantes = arrayEstudiantes.length;
    if (totalEstudiantes > 0) {
        let table = "<table class='table table-light table-striped'>"
        table += "<thead>";
        table += "<tr>";
        table += "<th scope='col'>Carnet</th>";
        table += "<th scope='col' style='width: 20%;'>Nombre Completo </th>";
        table += "<th scope='col'>Tarea 2</th>";
        table += "<th scope='col'>Parcial de mitad de Ciclo</th>";
        table += "<th scope='col'>Parcial Final</th>";
        table += "</tr>";
        table += "</thead>";
        table += "<tbody>";

        let i = 0;

        // Utilizar un bucle for para recorrer el arreglo de estudiantes
        for (const estudiante of arrayEstudiantes) {
            i++;
            // Desestructuración
            let { carnet, nombre, apellido, nota1, nota2, nota3 } = estudiante;

            table += `<tr>`;
            table += `<td>${carnet}</td>`;
            table += `<td>${nombre} ${apellido}</td>`;
            table += `<td>${nota1}</td>`;
            table += `<td>${nota2}</td>`;
            table += `<td>${nota3}</td>`;
            table += `</tr>`;
        }
        table += "</tbody>";
        table += "</table>";
        containerEstudiantes.innerHTML = table;
    } else {
        alert("No se han registrado estudiantes");
    }
}
window.onload = function(){
    graficoProgreso();
    graficoCalificaciones;
    viewEstudiantes();
}