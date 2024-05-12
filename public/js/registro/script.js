import {mensajeAlert} from '../auxiliares.js';
import {peticionAsincrona} from '../ajax.js';

window.onload = main;


function main()
{
    eventos();
}


/**
 * Activamos todos los eventos dentro de esta pagina
 */
function eventos()
{
    document.getElementById('btnRegistrar').addEventListener('click' , registrarRonda);
}




function registrarRonda(){
    let numEmpleado = document.getElementById('numEmpleado').value;

    if(numEmpleado === '')
    {
        mensajeAlert('Error' , 'Debe ingresar un número de empleado' , 'error');
    }else{

        const data = {
            numEmpleado: numEmpleado
        }

        let respuesta = peticionAsincrona('/registrarRonda' , 'POST' , data);

        respuesta.then(function(response){
            mensajeAlert('Buen trabajo!' , response , 'success');
            document.getElementById('numEmpleado').value = '';
        }).catch(function(error){
            if( typeof error.responseJSON !== 'undefined')
            {
                mensajeAlert('Error' , error.responseJSON.message , 'error');
            }else{
                mensajeAlert('Error' , error.responseText , 'error');
            }
        })
    }
}
