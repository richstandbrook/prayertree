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
        for( var a in res ){
            var row = res[a];
            //TODO Prepdata.
        }
        return res;
    }
    
    var requestUrl = apipath + 'prayer_requests/' + prayertree_id;
    var contactUrl =  '/prayertrees/' + prayertree_id +'/contacts/';

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

    //Insert data into editor when clicking upon a row.
    $( '#contact-table' ).on('click-row.bs.table', function (row, $element, field) {
        console.log( "clicked" );
        drawContactEditor($element, 'data-container');
    });

    $( '.tables .bootstrap-table .fixed-table-toolbar' ).prepend( 
        "<div class='btn btn-group pull-left columns'> <button class='requests btn btn-large' >" +
        " Requests </button> <button class='contacts btn btn-large' >" +
        " Contacts </button> </div>"
    ); 

    //Add +/- request buttons
    $('.request-container .bootstrap-table .fixed-table-toolbar').append( 
      "<div class='btn-group pull-right table-custom-toolbar columns'>" + 
      "<button class='btn highlight delete-request' type='button'>" +
      "<span class='glyphicon glyphicon-trash'/></button>" +
      "<button class='btn blue new-request' type='button'>" +
      "<span class='glyphicon glyphicon-plus'/></button>" +
      "</div>"
    );

    //Add +/- contact buttons
    $('.contact-container .bootstrap-table .fixed-table-toolbar').append( 
      "<div class='btn-group pull-right table-custom-toolbar columns'>" + 
      "<button class='btn highlight delete-contact' type='button'>" +
      "<span class='glyphicon glyphicon-trash'/></button>" +
      "<button class='btn blue new-contact' type='button'>" +
      "<span class='glyphicon glyphicon-plus'/></button>" +
      "</div>"
    );

    $('.table-custom-toolbar .new-contact').click( function(){
        drawContactEditor(undefined, 'data-container');
    });

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

function drawContactEditor(contact, container_id){

    //Initialise form to empty if no contact specified.
    if( contact == null ){
        contact = {
            'type':'email',
            'name':'',
            'value':''
        }
    }

    var html = "<div class='contacteditor panel col-md-8 col-md-offset-2'>";

    html += "<form class='contacteditor__form'>";
    
    html += "<div class='form-group col-xs-12 col-sm-6 col-md-6'>";

    html += "<div class='input-group row'>" + 
            "<label for='type' class='type col-xs-12 col-md-6 col-lg-5'>Type: " + 
            "</label><select class='form-control type col-xs-12 col-md-6 col-lg-7' " +
            "name='type' value='" + contact.type + "' id='type' required oninput='updateType();'>"+
            "<option value='email' selected>Email</option>" +
            "<option value='mobile'>Mobile</option>" +
            "</select></div>";

    html += "<div class='input-group row'>" + 
            "<label class='name form-control  col-xs-12 col-md-6 col-lg-5'>Name: " + 
            "</label><input type='text' class='username col-xs-12 col-md-6 col-lg-7' " +
            "name='name' value='" + contact.name + "' id='name' required /></div>";

    html += "<div class='input-group row'>" +
            "<label class='email form-control col-xs-12 col-md-6 col-lg-5'><span class='type-word'>"+
            "Email:</span></label>" + 
            "<input id='value' type='text' class='value col-xs-12 col-md-6 col-lg-7' " +
            "oninput='checkEqual(\"value\", \"value2\")' name='value' value='" + 
            contact.value + "' required/></div>";

    html += "<div class='input-group row'>" + 
            "<label class='email2 form-control  col-xs-12 col-md-6 col-lg-5'>" + 
            "Retype <span class='type-word'>Email</span>:</label>" + 
            "<input  id='value2' type='text' oninput='checkEqual(\"value\", \"value2\")' " +
            "class='value2 col-xs-12 col-md-6 col-lg-7' value='" + 
            contact.value + "' autocomplete='off' required /></div></div>";

    html += "<button type='submit' class='col-xs-12 col-sm-6 btn btn-large " +
            "submit-form'>Submit</button>";

    html += "</form>";

    html += "</div>";

    $('#'+container_id).html( html );

    $('.contacteditor__form .type').val(contact.type);
    if( $('.contacteditor__form .type').val() == 'mobile' ) updateType();

    

    //FORM SUBMISSION
    $('.contacteditor__form').click(function(evt){
        /*
        evt.preventDefault();

        //Assemble complete json object.
        var data = {};
        var form = $('.user-editor');
        var formArray = form.serializeArray();

        for( var z in formArray ){
            var element = formArray[z];
            data[element.name] = element.value;
        }

        $.extend( data, extractAccess() );
        $.extend( data, extractData() );

        //Post json to server.
        $.ajax({
            url: root + '/en/users/update_user/' + data.original_username,
            type: 'post',
            success: function (data) {
                alert(data);
                drawUserEditor("");
                $('#user-table table').bootstrapTable('refresh');
            },
            error: function (data) {
                alert( i18n.gettext("There has been a server error. " + 
                                    "Please contact administrator and try again later.") );
                $('.user-editor .submit-form').text( buttonText );
                $('#user-table table').bootstrapTable('refresh');
            },
            contentType: 'application/json;charset=UTF-8',
            data: JSON.stringify(data, null, '\t')
        });*/
        
    });

}

function updateType(){
    $('.type-word').text( $('.contacteditor__form .type').val().replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}));
}

function checkEqual( id1, id2 ) {

    var email1 = document.getElementById(id1);
    var email2 = document.getElementById(id2);
    console.log( email1 == email2 );
    if ( email2.value != email1.value ) {
        email2.setCustomValidity( 'Fields must be Matching.' );
        return false;
    } else {
        //Input is valid -- reset the error message
        email2.setCustomValidity('');
        return true;
    }
}

