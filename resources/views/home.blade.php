@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 class="panel-heading">Welcome to Prayer Tree</h1>

                <div class="panel-body">
                    <h2>You currently aren't a part of any tree's<h2>
                    <div class="homepage__join-tree-container">
                        <button class="button-primary">Join Prayer Tree</button>
                    </div>
                    <div class="homepage__new-tree-container">
                        <button class="button-primary">Create New Prayer Tree</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
