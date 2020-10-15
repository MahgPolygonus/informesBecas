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
        url: '/ReporteSemanal',
        headers: {'Content-type': 'application/json'}
    });
    
    });

function InfoSemanal(json)
{
    alert(json.length);
    if (json.length<7) {
        
    } else {
        
    }
    var Datos=[];
    
  
    var ctx = document.getElementById('ReporteSemanal').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',
    
        // The data for our dataset
        data: {
            labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
            datasets: [{
                label: 'Usuarios Registrados',
                borderColor: '#2A3F54',
                data: [12, 19, 3, 5, 2, 3]  
            },]
        },
    
        // Configuration options go here
        options: {}
    });    
}