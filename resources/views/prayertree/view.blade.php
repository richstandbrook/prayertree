@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $prayerTree->name }} ({{ $prayerTree->pin }})
                        <a href="/prayertrees/{{$prayerTree->pin}}/requests/create" class="btn btn-primary btn-sm pull-right">Add Prayer Request</a>
                    </div>

                    <div class="panel-body">
                        <ul>
                        @foreach($prayerRequests as $prayerRequest)
                            <li class="@if($prayerRequest->approved) bg-success @endif">
                                {{$prayerRequest->text}}

                                @if($prayerRequest->contact)
                                <p>
                                    <strong>
                                        {{$prayerRequest->contact['name']}}
                                        &mdash;
                                        {{$prayerRequest->contact['value']}}
                                    </strong>
                                </p>
                                @endif

                                @if(!$prayerRequest->approved)
                                <form action="/prayerrequests/{{$prayerRequest->id}}" method="post">
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="approve" value="true">
                                    <input type="submit" value="Approve and send" class="btn btn-success">
                                </form>
                                @endif
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
