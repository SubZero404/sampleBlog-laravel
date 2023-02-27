@extends('master')
@section('title') Post Detail @endsection
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card w-100 my-3 shadow-lg sticky-top">
                    <div class="card-body d-flex flex-row justify-content-between align-items-center">
                        <div>
                            <h1 class="fs-5 fw-bold text-primary">Sample Blog</h1>
                            <h2 class="fs-6 fst-italic">Post Detail</h2>
                        </div>
                        <a href="{{ route('index.post') }}" class="btn btn-outline-primary fw-bold">BACK</a>
                    </div>
                </div>
                @if(session('status'))
                    <div class="card mb-3 status-div">
                        <div class="card-body d-flex flex-row justify-content-between align-items-center">
                            <h5 class="fs-6 text-danger fst-italic mt-2">{{ session('status') }}</h5>
                            <button id="status-btn" class="btn btn-outline-danger btn-sm">OK</button>
                        </div>
                    </div>
                @endif
                @if(!empty($post))
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="fw-bold fs-6 mt-2 text-primary"><span class="text-black">Title :</span> {{$post->title}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <div>{{ $post->created_at->format('j F Y | n:i A') }}</div>
                                <div>
                                    <a href="{{ route('post.edit',$post->id) }}" class="btn btn-outline-success btn-sm me-2">EDIT</a>

                                    <form action="{{ route('post.destroy',$post->id) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm me-2">DELETE</button>
                                    </form>
                                </div>
                            </div>
                            <div class="p-2 pb-0 m-1 mb-3 border border-1">
                                <h4 class="fs-6 fst-italic text-black-50 ms-3">description</h4>
                                <p class="text-black">{{$post->description}}</p>
                            </div>
                        </div>
                    </div>
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
