@extends('layouts.app')

@section('content')
    <div class="container">
        @include('blog.includes.result_message')
        <form method="POST" action="{{route('blog.admin.posts.store')}}">
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
    </div>



@endsection
