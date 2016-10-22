@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <h1 class="panel-heading">
			Edit PrayerTree: <?php echo( $prayertree_id ); ?> 
		</h1>
        </div>
	<div class="panel col-md-12">
		<div id='prayer-request-table'></div>
	</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
console.log( drawPrayerRequestTable );
drawPrayerRequestTable( 'prayer-request-table' );
</script>
@endsection
