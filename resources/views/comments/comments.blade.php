@extends('comments.app')
@section('content')
    <div class="row">
        <div class="col-12">

            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Header -->
                    <div class="mb-3">
                        <div class="row align-items-center">
                            <div class="col ml-n2">
                                <!-- Title -->
                                <h4 class="mb-1">
                                    {{$parent->user->name}}
                                </h4>
                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <span class="fe fe-clock"></span> <time>{{$parent->created_at}}</time>
                                </p>

                            </div>
                            <div class="col-auto">
                                <a href="{{route('comments')}}" class="btn btn-primary">Назад</a>
                            </div>
                        </div> <!-- / .row -->
                    </div>

                    <!-- Text -->
                    <p class="mb-3">
                        {{$parent->text}}
                    </p>

                @if($parent->image)
                    <!-- Image -->
                        <p class="text-center mb-3">
                            <img src="/{{$parent->image}}" alt="..." class="img-fluid rounded">
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
                                <a href="#!" class="btn btn-sm btn-white">
                                    Add Reaction
                                </a>

                            </div>
                        </div> <!-- / .row -->
                    </div>

                    <!-- Divider -->
                    <hr>

                    <!-- Comments -->
                    <div class="comment mb-3">
                        @foreach($comments as $comment)

                                    <div class="row">
                                        <div class="col">

                                            <!-- Title -->
                                            <h5 class="comment-title">
                                                {{$comment->user->name}}
                                            </h5>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Time -->
                                            <time class="comment-time">
                                                {{$comment->created_at}}
                                            </time>

                                        </div>
                                    </div> <!-- / .row -->
                                    <!-- Text -->
                                    <p class="comment-text">
                                        {{$comment->text}}
                                    </p>

                                @if($comment->image)
                                    <!-- Image -->
                                        <p class="text-center mb-3">
                                            <img src="/{{$comment->image}}" alt="..." class="img-fluid rounded">
                                        </p>
                                    @endif
                            <hr>
                            @endforeach
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <form action="{{ route('comments.store') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            @csrf
                        <input name="parent_id" hidden value="{{$parent->id}}">
                        <div class="col ml-n2">
                            <!-- Input -->
                            <div class="mt-1">
                                <label class="sr-only">Ваш коммент</label>
                                <textarea class="form-control form-control-flush" name="text"  rows="3" placeholder="Вопрос" maxlength="1000"></textarea>
                            </div>
                            <div class="mt-1">
                                <label class="sr-only">Изображение...</label>
                                <input type="file" class="form-control form-control-flush" name="image" placeholder="Изображение" accept=".jpg, .jpeg, .png, .jpg">
                            </div>
                        </div>
                        <div class="col-auto align-self-end">
                            <!-- Icons -->
                                <button type="submit" class="text-reset">
                                    <i class="fe fe-send"></i>
                                </button>
                        </div>
                        </form>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div>
    </div>
@endsection
