<?php

namespace App\Livewire\Bitacora;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\RegistrosRondines;
use Maatwebsite\Excel\Facades\Excel;
use App\services\planteles\PlantelesService;
use App\services\vigilantes\VigilantesService;
use App\services\registrarRondas\RegistrarRondaService;

class Registros extends Component
{
    use WithPagination;
    public $planteles = [];
    public $vigilantes = [];
    public $plantel = '';
    public $vigilante = '';
    public $fechaInicio = '';
    public $fechaFinal  = '';
    private $vigilanteServicio;
    private $plantelesServicio;
    private $rondaServicio;


    /*
        UTILIZAMOS BOOT PARA QUE MI INSTANCIA DE MI SERVICIO PERSISTA EN CADA SOLICITUD A MI COMPONENTE
     */
    public function boot(RegistrarRondaService $rondaServicio){
        $this->rondaServicio = $rondaServicio;

    }

    /*
        INICIALIZAMOS NUESTROS ATRIBUTOS QUE USAMOS EN LOS SELECT'S
    */
    public function mount(VigilantesService $vigilanteServicio , PlantelesService $plantelesServicio  )
    {
        $this->vigilanteServicio = $vigilanteServicio;
        $this->plantelesServicio = $plantelesServicio;

        $this->planteles = $this->plantelesServicio->getNames();
        $this->vigilantes = $this->vigilanteServicio->getNames();

    }

    /*
        RENDERIZAMOS NUESTRO COMPONENTE ENVIANDOLE LAS RONDAS
    */
    public function render()
    {

        $rondas = $this->rondaServicio->getRondasVigilantes( $this->plantel , $this->vigilante , $this->fechaInicio , $this->fechaFinal  )->paginate(10);

        return view('livewire.bitacora.registros' ,
        ['rondas' => $rondas , 'planteles' => $this->planteles , 'vigilantes' => $this->vigilantes] );
    }


    /*
        CADA VEZ QUE SE PRESIONA SOBRE EL BOTON DEL EXCEL SE MANDA A LLAMAR A ESTE METODO EL CUAL RETORNA UNA INSTANCIA
        DE LA CLASE EXCEL. DENTRO LLAMAMOS A NUESTRO SERVICIO DE RONDAS VIGILANTES PARA PODER UTILIZAR LA QUERY DEPENDIENDO
        DE LOS FILTROS. POR MEDIO DE UN ENCADENAMIENTO DE METODOS, USAMOS GET PARA OBTENER TODOS LOS REGISTROS DE ESA QUERY
    */
    public function exportDataExcel(){

        $rondas = $this->rondaServicio->getRondasVigilantes( $this->plantel , $this->vigilante , $this->fechaInicio , $this->fechaFinal  )->get();
        return Excel::download(new RegistrosRondines($rondas), 'registrosRondines.xlsx');
    }

    /*
        CADA VEZ QUE SUCEDE UN EVENTO CHANGE DENTRO DEL SELECT PLANTELES, SE MANDA A LLAMAR ESTA FUNCIÓN LA CUAL RESETEA EL PAGINADOR
        Y RENDERIZA NUEVAMENTE EL COMPONENTE
    */
    public function obtenerPlantel()
    {
        $this->resetPage();
        $this->render();
    }


    /*
        CADA VEZ QUE SUCEDE UN EVENTO CHANGE DENTRO DEL SELECT DE VIGILANTES, SE MANDA A LLAMAR ESTA FUNCIÓN LA CUAL RESETEA EL PAGINADOR
        Y RENDERIZA NUEVAMENTE EL COMPONENTE
    */
    public function obtenerVigilante()
    {
        $this->resetPage();
        $this->render();
    }


    //EN ESTE CASO, CADA VEZ QUE SUCEDE UN CAMBIO CON LAS FECHAS, SE MANDA A LLAMAR ESTE METODO
    public function obtenerFechas()
    {
        $this->resetPage();
        $this->render();
    }



    //REFRESCAMOS LA PAGINA
    public function refresh(){
        $this->plantel = '';
        $this->vigilante = '';
        $this->fechaInicio = '';
        $this->fechaFinal = '';

        $this->render();
    }

}

