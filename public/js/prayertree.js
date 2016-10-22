var apipath = "/mock-api/";

function drawPrayerRequestTable( container_id, prayertree_id ){
    //Define the table structure
    var columns = [{
            'field': 'state',
            'checkbox': true,
            'align': 'center',
            'valign': 'middle'
        },{
            'field': "status",
            'title': "State",
            'align': "left",
            'class': "header",
            'sortable': true,
            'width': "10%"
        },{
            'field': "contact_name",
            'title': "From",
            'align': "left",
            'class': "header",
            'sortable': true,
            'width': "15%"
        },{
            'field': "time_received",
            'title': "Time",
            'align': "left",
            'class': "header",
            'sortable': true,
            'width': "15%"
        },{
            'field': "text",
            'title': "Message",
            'align': "left",
            'class': "header",
            'sortable': false,
            'width': "60%"
        }         
    ];

    //A function that prepares the data for displaying in the table.
    function prepData(res){
        console.log(res);
        for( var a in res.requests ){
            var row = res.requests[a];

            row.time_received = new Date(row.time_received).toLocaleString(); 
        }
        return res.requests;
    }
    
    var tmp = apipath + 'prayer_requests/' + prayertree_id;
    console.log( "tmp: " + tmp );

    //Creat the bootstrap table.
    table = $('#'+container_id).bootstrapTable({
        columns: columns,
        classes: 'table table-hover',
        pagination: true,
        pageSize: 20,
        search: true,
        url: tmp,
        responseHandler: prepData,
        showRefresh: true
    });
}
