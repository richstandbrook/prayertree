@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">My Prayer Trees</div>
                    <div class="panel-body">
                        <ul>
                        @foreach($prayerTrees as $prayerTree)
                            <li><a href="/prayertrees/{{ $prayerTree->pin }}">{{ $prayerTree->name }}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
