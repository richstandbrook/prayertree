@extends('layouts.app')

@section('content')
<div class="image-background image-background--home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <h1 class="panel-heading homepage__primary-title">Welcome to Prayer Tree</h1>

                    <div class="panel-body">
                        <h2 class="homepage__secondary-title">Your prayer tree's<h2>
                            <prayer-groups></prayer-groups>
                        <div class="homepage__join-tree-container">
                            <button class="button-primary button-primary--large">Join Existing Prayer Tree</button>
                        </div>
                        <div class="homepage__new-tree-container">
                            <button class="button-primary button-primary--large"><a href="prayertrees/create">Create New Prayer Tree</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
