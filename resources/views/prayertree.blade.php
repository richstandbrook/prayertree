@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="panel-heading prayertree__primary-title">
                <span class='prayertree-name'>
                    <?php echo( $prayertree_id ); ?>
                </span> 
		    </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
	        <div id='data-container'></div>
        </div>
    </div>
    <div class="tables-container panel">
        <div class="row tables">
            <div class='request-container prayertree-table'><div id='request-table'></div></div>
            <div class='contact-container prayertree-table'><div id='contact-table'></div></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$.getJSON( '/prayertrees', function(data){
    console.log( data );
    for( var i=0; i<data.length; i++ ){
        console.log( data[i].pin  );
        console.log( '<?php echo( $prayertree_id ); ?>'  );
        if( data[i].pin == '<?php echo( $prayertree_id ); ?>' ){
            $('.prayertree-name').text( data[i].name );
            break;
        }
    }
});

drawTables('<?php echo( $prayertree_id ); ?>' );
</script>
@endsection
