const cedula = document.querySelector("#cedula")
const nombre = document.querySelector("#nombre")
const fecha_nacimiento = document.querySelector("#fecha_nacimiento")
const direccion = document.querySelector("#direccion")
const telefono = document.querySelector("#telefono")
const sueldo = document.querySelector("#sueldo")
// const calcular = document.querySelector("#calcular")

const resultado = document.querySelector("#resultado")
 
// calcular.addEventListener("click", (event) =>{
//     // console.log(typeof fecha_nacimiento.value)
//     let age = calcularEdad(fecha_nacimiento.value)
//     let dctPension = calcularDctPesion(sueldo.value)
//     let dctSalud = calcularDctSalud(sueldo.value)
//     let dctSolidaridad = calcularDctSolidaridad(sueldo.value)


//     let parrafoAge = document.createElement("p")
//     parrafoAge.textContent = `Edad: ${age}`

//     let parrafoDctPension = document.createElement("p")
//     parrafoDctPension.textContent = `Su descuento por pension es de: $${dctPension}`

//     let parrafoDctSalud = document.createElement("p")
//     parrafoDctSalud.textContent = `Su descuento por salud es de: $${dctSalud}`

//     let parrafoDctSolidaridad = document.createElement("p")
//     parrafoDctSolidaridad.textContent = `Su descuento por solidaridad es de: $${dctSolidaridad}`

//     resultado.append(parrafoAge)
//     resultado.append(parrafoDctPension)
//     resultado.append(parrafoDctSalud)
//     resultado.append(parrafoDctSolidaridad)
// })

function calcularEdad(fecha){
    let nacimiento = new Date(fecha)

    let year = nacimiento.getFullYear()
    let month = nacimiento.getMonth()
    let day = nacimiento.getDay()
    let fecha_actual = new Date(Date.now())
    if(year > 2024){
        alert("Ingresó una fecha de nacimiento invalida!")
    }
    let age =  fecha_actual.getFullYear() - year

    if( fecha_actual.getMonth() - month < 0){
        age--
    }

    if(fecha_actual.getDay - day < 0){
        age--
    }

    return age
}

function calcularDctPesion(sueldo){
    return sueldo * 0.04
}
function calcularDctSalud(sueldo){
    return sueldo * 0.04
}
function calcularDctSolidaridad(sueldo){
    return sueldo * 0.01
}

function agregarProfesor(){
   var ced=document.form-teacher.cedula.value;
   var nom=document.form-teacher.nombre.value;
   var fec=document.form-teacher.fecha_nacimiento.value;
   var dir=document.form-teacher.direccion.value;
  
   
   if (ced=="" || nom=="" || fec=="" || dir==""){
     alert("Por favor ingrese todos los campos");
     return false;
   }    
   else{
     document.form-teacher.submit();
   }
}   
