

const btn = document.querySelector('#send');

btn.addEventListener('clic', function (e) {
  send();
});

function send() {
	let msj = document.getElementById("mensaje").value;
	let idU = document.getElementById("idUser").value;
	let idDen = document.getElementById("idDenuncia").value;
		$.ajax({
            method: "POST",
            url: "saveCom.php",
            data: {'mensaje': 'Hola'},
            }).done(function(data) {
      				console.log(data);
	    }).fail(function( jqXHR, textStatus ) {
	      debugger
	      alert( "Hubo un error: " + textStatus );
	    });
	            /*$.ajax({
			    type: "POST",
			    url: "saveCom.php",
			    data: {mensaje: msj},
			    success: function(data){
			        alert(data.message);
			        //$('#mensaje').val("");
			    }
			})*/

	/*$.ajax({
    type: "POST",
    url: "savedata.php",
    data: {},
    cache: false,
    contentType: false,
    processData: false,
    success:  function(data){
        //alert("---"+data);
        alert("Settings has been updated successfully.");
        window.location.reload(true);
    }
});*/
		
		//window.location.href = "saveCom.php";
}