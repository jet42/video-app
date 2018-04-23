@extends('layouts.app')

@section('content')

    @if (session('msg'))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            </div>
        </div>
    @endif

    <video-list></video-list>
@endsection