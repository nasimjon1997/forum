@extends('comments.app')
@section('content')
    <div class="row">
        <div class="col-12">

            @foreach($comments as $comment)
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Header -->
                    <div class="mb-3">
                        <div class="row align-items-center">
                            <div class="col ml-n2">

                                <!-- Title -->
                                <h4 class="mb-1">
                                    {{$comment->user->name}}
                                </h4>
                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <span class="fe fe-clock"></span> <time >{{$comment->created_at}}</time>
                                </p>

                            </div>
                            <div class="col-auto">
                                <a href="{{route('comments.list',$comment->id)}}" class="btn btn-primary">Ответы</a>
                            </div>
                        </div> <!-- / .row -->
                    </div>

                    <!-- Text -->
                    <p class="mb-3">
                      {{$comment->text}}
                    </p>

                    @if($comment->image)
                    <!-- Image -->
                    <p class="text-center mb-3">
                        <img src="{{$comment->image}}" alt="..." class="img-fluid rounded">
                    </p>
                        @endif
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">

                                <!-- Buttons -->
                                <a href="#!" class="btn btn-sm btn-white">
                                    😬 1
                                </a>
                                <a href="#!" class="btn btn-sm btn-white">
                                    👍 2
                                </a>
                            </div>
                        </div> <!-- / .row -->
                    </div>

                    <!-- Divider -->
                    <hr>
                </div>
            </div>
                @endforeach
        </div>
    </div>
@endsection