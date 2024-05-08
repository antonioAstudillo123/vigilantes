import {mensajeAlert} from '../auxiliares.js';
import {peticionAsincrona} from '../ajax.js';

window.onload = main;


function main()
{
    eventos();
}

function eventos()
{
    document.getElementById('btnRegistrar').addEventListener('click' , registrarVigilante);
}


function registrarVigilante()
{
    let nombreVigilante = document.getElementById('nombreVigilante').value;
    let numEmpleado = document.getElementById('numEmpleado').value;
    let plantel = document.getElementById('plantel').value;


    if(nombreVigilante === '')
    {
        mensajeAlert('Error' , 'Debe ingresar el nombre del vigilante' , 'error');
    }else if(numEmpleado === ''){
        mensajeAlert('Error' , 'Debe ingresar el número del empleado' , 'error');
    }else if(plantel === ''){
        mensajeAlert('Error' , 'Debe seleccionar un plantel' , 'error');
    }else{
        const data = {
            numEmpleado:numEmpleado,
            nombreVigilante:nombreVigilante,
            plantel:plantel
        }
        let peticion = peticionAsincrona('/registrarVigilante' , 'POST' , data);

        peticion.then(function(result){
            document.getElementById('nombreVigilante').value = '';
            document.getElementById('numEmpleado').value = '';
            document.getElementById('plantel').value = '';
            mensajeAlert('Buen trabajo!' , result , 'success');
        }).catch(function(error){
            mensajeAlert('Error' , error.responseText , 'error');
        });
    }
}
