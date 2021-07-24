@extends('layouts.app')

@section('content')
    <div class="container">
        @include('blog.includes.result_message')
        <form method="POST" action="{{route('blog.admin.posts.update', $item->id)}}">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.posts.includes.post_edit_main_column')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.posts.includes.post_edit_add_column')
                </div>
            </div>
        </form>
        <br>
        <form method="POST" action="{{route('blog.admin.posts.destroy', $item->id)}}">
            @method('DELETE')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body ml-auto">
                            <button class="btn btn-link" type="submit">Удалить</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
    </div>



@endsection
