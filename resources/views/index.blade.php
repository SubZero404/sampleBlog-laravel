@extends('master')
@section('title') Sample Blog @endsection
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card w-100 my-3 shadow-lg sticky-top">
                    <div class="card-body d-flex flex-row justify-content-between align-items-center">
                        <div>
                            <h1 class="fs-5 fw-bold text-primary">Sample Blog</h1>
                            <h2 class="fs-6 fst-italic">Hello ... What's on your mine?</h2>
                        </div>
                        <a href="{{ route('index.create') }}" class="btn btn-outline-primary fw-bold">NEW</a>
                    </div>
                </div>
                @if(session('status'))
                    <div class="card mb-3 status-div">
                        <div class="card-body d-flex flex-row justify-content-between align-items-center">
                            <h5 class="fs-6 text-danger fst-italic mt-2 text-center">{{ session('status') }}</h5>
                            <button id="status-btn" class="btn btn-outline-danger btn-sm">OK</button>
                        </div>
                    </div>
                @endif

                @if(!empty($posts))
                    @foreach($posts as $post)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="fw-bold fs-6 mt-2 text-primary"><span class="text-black">Title :</span> {{$post->title}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="p-2 pb-0 m-1 mb-3 border border-1">
                                    <h4 class="fs-6 fst-italic text-black-50 ms-3">description</h4>
                                    <p class="text-black-50">{{ Str::words($post->description,25) }}</p>
                                </div>
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="">{{ $post->created_at->format('j F Y | n:i A') }}</div>
                                    <div class="">
                                        <a href="{{ route('post.show',$post->id) }}" class="btn btn-outline-primary btn-sm me-2">READ</a>
                                        <a href="{{ route('post.edit',$post->id) }}" class="btn btn-outline-success btn-sm me-2">EDIT</a>

                                        <form action="{{ route('post.destroy',$post->id) }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm me-2">DELETE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <script>
        document.getElementById('status-btn').addEventListener('click',function (){
            document.querySelector('.status-div').classList.add('d-none')
        })
    </script>

@endsection
