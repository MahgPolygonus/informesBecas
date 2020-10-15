function GetIes()
{
    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify(UserObj),
        dataType: 'json',
        success: function(data){
            var json = JSON.parse(JSON.stringify(data));
            setCookie('sapus',User,8);
            setCookie('sapis',json[0].Id,8);
            window.location="/Perfil"
        },
        error: function(){
            alert("Algo Salio mal por favor intenta más tarde");
        },
        processData: true,
        type: 'PUT',
        url: '/Login2',
        headers: {'Content-type': 'application/json'}
    });
    
}