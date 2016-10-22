@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new Prayer Tree</div>
                    <div class="panel-body">
                        <form action="/prayertrees" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" name="name" placeholder="Prayer Tree Name">
                            </div>
                            <input type="submit" value="Create" class="btn btn-primary pull-right">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
