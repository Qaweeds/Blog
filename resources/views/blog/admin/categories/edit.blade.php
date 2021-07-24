@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('blog.admin.categories.update', $item->id)}}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="container">

            @include('blog.includes.result_message')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.categories.includes.item_edit_main_column')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.categories.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection
