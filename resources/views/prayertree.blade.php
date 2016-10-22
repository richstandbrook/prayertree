@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="panel-heading">
			    Edit PrayerTree: <?php echo( $prayertree_id ); ?> 
		    </h1>
        </div>
    </div>
    <div class="row">
        <div class="panel col-md-12">
	        <div id='prayer-request-table'></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
drawPrayerRequestTable( 'prayer-request-table', '<?php echo( $prayertree_id ); ?>' );

</script>
@endsection
