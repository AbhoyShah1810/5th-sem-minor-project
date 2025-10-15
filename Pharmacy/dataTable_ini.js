	$(document).ready(function() {
    $('#view').DataTable( {

        "bDestroy": true,
       
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'excel', 'print'
        ]
    });
});