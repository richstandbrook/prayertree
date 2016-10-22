var apipath = "/mock-api/";

function drawTables( prayertree_id ){

    //Define the table structure
    var requestColumns = [{
            'field': 'state',
            'checkbox': true,
            'align': 'center',
            'valign': 'middle'
        },{
            'field': "status",
            'title': "State",
            'align': "left",
            'class': "header clickable",
            'sortable': true,
            'width': "10%"
        },{
            'field': "contact_name",
            'title': "From",
            'align': "left",
            'class': "header clickable",
            'sortable': true,
            'width': "15%"
        },{
            'field': "time_received",
            'title': "Time",
            'align': "left",
            'class': "header clickable",
            'sortable': true,
            'width': "15%"
        },{
            'field': "text",
            'title': "Message",
            'align': "left",
            'class': "header clickable",
            'sortable': false,
            'width': "60%"
        }         
    ];

    //Define the table structure
    var contactColumns = [{
            'field': 'state',
            'checkbox': true,
            'align': 'center',
            'valign': 'middle'
        },{
            'field': "type",
            'title': "Type",
            'align': "left",
            'class': "header",
            'sortable': true,
            'width': "20%"
        },{
            'field': "name",
            'title': "Name",
            'align': "left",
            'class': "header",
            'sortable': true,
            'width': "30%"
        },{
            'field': "value",
            'title': "Contact",
            'align': "left",
            'class': "header",
            'sortable': true,
            'width': "50%"
        }        
    ];

    //A function that prepares the data for displaying in the table.
    function requestPrep(res){
        console.log(res);
        for( var a in res.requests ){
            var row = res.requests[a];

            row.time_received = new Date(row.time_received).toLocaleString(); 
        }
        return res.requests;
    }

    //A function that prepares the data for displaying in the table.
    function contactPrep(res){
        console.log(res);
        for( var a in res.contacts ){
            var row = res.contacts[a];
            //TODO Prepdata.
        }
        return res.contacts;
    }
    
    var requestUrl = apipath + 'prayer_requests/' + prayertree_id;
    var contactUrl = apipath + 'contacts/' + prayertree_id;

    //Creat the bootstrap table.
    table = $('#request-table').bootstrapTable({
        columns: requestColumns,
        classes: 'table table-hover',
        pagination: true,
        pageSize: 20,
        search: true,
        url: requestUrl,
        responseHandler: requestPrep,
        showRefresh: true
    });

    //Create the bootstrap table.
    table = $('#contact-table').bootstrapTable({
        columns: contactColumns,
        classes: 'table table-hover',
        pagination: true,
        pageSize: 20,
        search: true,
        url: contactUrl,
        responseHandler: contactPrep,
        showRefresh: true
    });

    //Insert data into editor when clicking upon a row.
    $( '#request-table' ).on('click-row.bs.table', function (row, $element, field) {
        console.log( "clicked" );
        drawPrayerRequest($element, 'data-container');
    });

    /*Insert data into editor when clicking upon a row.
    $( '#contact-table' ).on('click-row.bs.table', function (row, $element, field) {
        console.log( "clicked" );
        drawContact($element, 'request-container');
    });*/

    $( '.tables .bootstrap-table .fixed-table-toolbar' ).prepend( 
        "<div class='btn btn-group pull-left columns'> <button class='requests btn btn-large' >" +
        " Requests </button> <button class='contacts btn btn-large' >" +
        " Contacts </button> </div>"
    ); 

    //Add extra toolbar buttons
    $('.tables .bootstrap-table .fixed-table-toolbar').append( 
        "<div class='btn-group pull-right table-custom-toolbar columns'>" + 
        "<button class='btn highlight delete-users' type='button'>" +
        "<span class='glyphicon glyphicon-trash'/></button>" +
        "<button class='btn blue new-user' type='button'>" +
        "<span class='glyphicon glyphicon-plus'/></button>" +
        "</div>"
    );

    $('.fixed-table-toolbar .requests').click( function(){

        $('.contact-container').hide();
        $('.request-container').show();
        $('.fixed-table-toolbar .contacts').toggleClass('active');
        $('.fixed-table-toolbar .requests').toggleClass('active');

    });

    $('.fixed-table-toolbar .contacts').click( function(){

        $('.request-container').hide();
        $('.contact-container').show();
        $('.fixed-table-toolbar .contacts').toggleClass('active');
        $('.fixed-table-toolbar .requests').toggleClass('active');

    });

    $('.contact-container').hide();
    $('.fixed-table-toolbar .requests').addClass('active');

}

function drawPrayerRequest(request, container_id){

    var html = "<div class='request col-md-8 col-md-offset-2'>";

    html += "<div class='request__top'>";
    
    html += "<div class='request__from'><b>From: </b>" + 
            request.contact_name + "</div>" ;

    html += "<div class='request__when pull-right'>" + 
            request.time_received + "</div>" ;

    html += "</div>";

    html += "<div class='request__main'>" + request.text + "</div>";

    html += "<div class='request__bottom'>";

    html += "<div class='btn-group pull-right'>";

    html += "<button class='btn btn-large btn-success'> Approve </button>";

    html += "<button class='btn btn-large btn-danger'> Remove </button>";

    html += "</div>";

    html += "</div>";

    html += "</div>";

    $('#'+container_id).html( html );

}

function drawContactEditor(contact_id){

    

}

