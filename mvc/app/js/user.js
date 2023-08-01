



$(document).ready(function () {
    // alert("nitido");
  //  document.getElementById('show').innerHTML;
    
    let ntbEditar = $('#btnEditar');

    ntbEditar.on('click', function () {
        // console.log("esta llegando");
        $.ajax({
            url: '?:user/getIndex',     // The URL to which the request will be sent
            type: 'GET',               // The HTTP method (GET, POST, PUT, DELETE, etc.)
           // data: { key: 'value' },    // The data to send with the request (optional)
            // dataType: 'json',          // The expected data type of the response (optional)
            success: function(data) {
              // Code to execute when the request is successful
              console.log('Response:', data);
            },
            error: function(xhr, status, error) {
              // Code to execute when the request encounters an error
              console.error('Error:', status, error);
            }
          });
          
    });

});





