@extends('layouts.app')

@section('content')

    @push("_js")
        <script src="/js/slug.js"></script>
    @endpush

    <div class="container my-5">


        <form method="POST">

            @csrf

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" value="{{$workspace->name}}" name="name" class="form-control @error('name') is-invalid @enderror" >
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" value="{{$workspace->slug}}" name="slug" id="slug-input" class="form-control @error('slug') is-invalid @enderror" >
                @error('slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <strong id="slugExists"></strong>
            </div>


            <input type="submit" value="Save" class="btn btn-primary">
        </form>

    </div>


@endsection
