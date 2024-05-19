import {peticionAsincrona} from '../ajax.js';

window.onload = main;

function main()
{
    eventos();
}

function eventos(){
    document.getElementById('selectReportes').addEventListener('change' , function(e){

        switch(e.target.value){
            case '1':
                document.getElementById('titleTipoReporte').textContent = 'Reporte de gráfico circular';
               graficaCircular();
                break;
            case '2':
                document.getElementById('titleTipoReporte').textContent = 'Reporte de gráfico de barras';
                graficaBarras();
                break;
            case '3':
                document.getElementById('titleTipoReporte').textContent = 'Reporte de indicadores rondines por mes';
                indicadorRondines();
                break;
        }
    })
}

function graficaCircular()
{

     // Load the Visualization API and the corechart package.
     google.charts.load('current', {'packages':['corechart']});

     // Set a callback to run when the Google Visualization API is loaded.
     google.charts.setOnLoadCallback(drawChart);
}

function drawChart()
  {

    let peticion = peticionAsincrona('/reportes/graficaCircular' , 'POST');

    peticion.then(function(result)
    {
        let array = [];
        result.data.forEach(element => {
            array.push([element.nombreCompleto , Number(element.Promedio)]);
        });

         // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows(array);

        // Set chart options
        var options = {'title':'Promedio de rondines por vigilante',
                    'width':'100%',
                    'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);


    }).catch(function(error){
        //console.log(error);
    });
}


function graficaBarras(){
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);
}

function drawStuff()
{
    let peticion = peticionAsincrona('/reportes/graficaBarras' , 'POST');
    let array = [];
    array.push(['Planteles', 'Rondines']);

    peticion.then(function(result){
        result.data.forEach(element => {
            array.push([element.nombre , Number(element.veces)]);
        });

        var data = new google.visualization.arrayToDataTable(array);

        var options = {
            title: 'Rondines por plantel',
            width: 900,
            height: 500,
            legend: { position: 'none' },
            chart: { title: 'Rondines por plantel',
                    subtitle: 'Cantidad de veces que se vigila en un plantel' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
            x: {
                0: { side: 'top', label: 'Veces'} // Top x-axis.
            }
            },
            bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);


    }).catch(function(error){

    })

}

function indicadorRondines(){
    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawIndicador);

}



function drawIndicador()
{
    let peticion = peticionAsincrona('/reportes/indicador' , 'POST');


    peticion.then(function(result)
    {
        let array = [];
        array.push(['Label', 'Value']);

        result.data.forEach(element => {
            array.push([element.nombre , Number(element.veces)]);
        });

        var data = google.visualization.arrayToDataTable(array);

          var options = {
            width: 1000, height: 200,
            redFrom: 0, redTo: 40,
            yellowFrom:41, yellowTo: 75,
            greenFrom: 76,greenTo: 100,
            minorTicks: 2
          };

          var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

          chart.draw(data, options);

    }).catch(function(error){

    });

  }
