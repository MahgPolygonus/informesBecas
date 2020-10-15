$( document ).ready(function() {
    $.ajax({
        contentType: 'application/json',
        dataType: 'json',
        success: function(data){
            var json = JSON.parse(JSON.stringify(data));
            InfoSemanal(json);
        },
        error: function(){
            alert("Algo Salio mal por favor intenta más tarde");
        },
        processData: true,
        type: 'GET',
        url: 'api/ReporteSemanal',
        headers: {'Content-type': 'application/json'}
    });
    InfoComunas("");
    });

function InfoSemanal(json)
{
 
    var Datos=[];
    var Dias=[];
    for (var i=0; i<json.length; i++) {
        var Fecha=new Date(json[i].Fecha);
        Fecha.setDate(Fecha.getDate()+1);
        var weekday = new Array(7);
        weekday[0] = "Domingo";
        weekday[1] = "Lunes";
        weekday[2] = "Martes";
        weekday[3] = "Miercoles";
        weekday[4] = "Jueves";
        weekday[5] = "Viernes";
        weekday[6] = "Sabado";

        var n = weekday[Fecha.getDay()];
        Dias.push(n);
        Datos.push(json[i].cuantos)
    }
    var ctx = document.getElementById('ReporteSemanal').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',
    
        // The data for our dataset
        data: {
            labels:Dias,
            datasets: [{
                label: 'Usuarios Registrados',
                borderColor: '#2A3F54',
                data: Datos  
            },]
        },
    
        // Configuration options go here
        options: {}
    });    
}


function InfoComunas(json)
{
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['','','','','',''],
            datasets: [{
                label: '# De inscritos esta semana',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
	
}