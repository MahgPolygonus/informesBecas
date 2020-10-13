$( document ).ready(function() {
CustomCss();

});


function CustomCss()
{
    $(".buttons-copy").html('Copiar').css({"background-color":"#00adff","color":"white"});
	$(".buttons-csv").css({"background-color":"#6fd42a","color":"white"});
	$(".buttons-pdf").css({"background-color":"#ff3838","color":"white"});
	$(".buttons-print").html('Imprimir').css({"background-color":"gray","color":"white"});
	$(".buttons-excel").css({"background-color":"#389638","color":"white"});
	$(".btn-group").css({"margin-bottom":"10px"});
	// var text=$(".dataTables_length").html();
	// $(".dataTables_length").html(text.replace("Show ", "Mostrar ").replace("entries", "filas"));
	// $(".dataTables_filter").html("");
	// var text2=$(".dataTables_info").html();
	// $(".dataTables_info").html(text2.replace("Showing ","Mostrando desde ").replace("to ","hasta ").replace(" of"," de").replace("entries","filas"));
}

function CargarDatos()
{
      var IdPaises=$( "#Paises" ).val();
      $.ajax({url: "/Departamentos/"+IdPaises,dataType: "json", success: function(result)
      {
      let dropdown = $('#Departamentos');
      dropdown.empty();
      dropdown.append('<option selected="true" disabled> Seleccionar</option>');
      dropdown.prop('selectedIndex', 0);
      $.each(result, function(idx, el) {
        dropdown.append($('<option value="'+el.Id+'">'+el.Nombre+'</option>'));});       
      }});
}