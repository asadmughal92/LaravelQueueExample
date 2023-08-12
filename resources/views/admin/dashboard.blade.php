@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product Count</h5>
                        <p class="card-text">{{ $productCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Post Count</h5>
                        <p class="card-text">{{ $postCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Failed Job Count</h5>
                        <p class="card-text">{{ $jobCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
