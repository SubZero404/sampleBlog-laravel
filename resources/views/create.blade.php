@extends('master')
@section('title') Create Post @endsection

@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card w-100 mt-3 shadow-lg">
                    <div class="card-body d-flex flex-row justify-content-between align-items-center">
                        <div>
                            <h1 class="fs-5 fw-bold text-primary">Create Post</h1>
                            <h2 class="fs-6">Hello ... What's on your mine?</h2>
                        </div>
                        <a href="{{ route('index.post') }}" class="btn btn-outline-primary fw-bold">Back</a>
                    </div>
                </div>
                <form method="post" action="{{route('post.add')}}">
                    <div class="card w-100 mt-3 shadow-lg">
                        @csrf
                        <div class="card-header d-flex flex-row justify-content-between align-items-center">
                            <h3 class="fs-6 text-primary mt-2">New Post</h3>
                            <button type="submit" class="btn btn-outline-primary btn-sm fw-bold">Post</button>
                        </div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title" id="title" placeholder="post title">
                                <label for="title">Post title</label>
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" name="description" id="description" style="height: 150px;" placeholder="post description"></textarea>
                                <label for="description">Post description</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
