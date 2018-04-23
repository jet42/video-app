@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Upload Video</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/videos" method="post" enctype="multipart/form-data">
                            <label>Choose File (only .mp4 accepted):
                                <input type="file" name="file" class="form-control" accept=".mp4" value="{{old('file')}}">
                            </label>
                            <br>
                            <label>Title:
                            <input type="text" name="title" placeholder="Title" class="form-control" required value="{{old('title')}}">
                            </label>
                            <br>
                            {{csrf_field()}}
                            <input type="submit" class="form-control">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection