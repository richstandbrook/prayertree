@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new Prayer Request on {{ $prayertree_pin }}</div>
                    <div class="panel-body">
                        <form action="/prayertrees/{{ $prayertree_pin }}/requests" method="post">
                            <div class="form-group">
                                <textarea name="text" class="form-control"></textarea>
                            </div>
                            <input type="submit" value="Create" class="btn btn-primary pull-right">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
