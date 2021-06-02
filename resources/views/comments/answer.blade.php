@extends('comments.app')
@section('content')
    <div class="row">
        <div class="col-12">

            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('answer.store') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            @csrf
                            <div class="col ml-n2">
                                <!-- Input -->
                                <div class="mt-1">
                                    <label class="sr-only">Вопрос...</label>
                                    <textarea class="form-control form-control-flush" name="text"  rows="3" placeholder="Вопрос"></textarea>
                                </div>
                                <div class="mt-1">
                                    <label class="sr-only">Изображение...</label>
                                    <input type="file" class="form-control form-control-flush" name="image" placeholder="Изображение">
                                </div>

                            </div>
                            <div class="col-auto align-self-end">
                                <!-- Icons -->
                                <button type="submit" class="text-reset btn-primary">
                                    Сохронить
                                </button>
                            </div>
                        </form>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div>
    </div>
@endsection
