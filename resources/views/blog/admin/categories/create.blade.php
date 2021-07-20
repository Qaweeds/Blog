@extends('layouts.app')
@section('content')

    <form method="POST" action="{{route('blog.admin.categories.store')}}">
        @csrf
        <div class="container">
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" typeof="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{$errors->first()}}
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" typeof="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{session()->get('success')}}
                        </div>
                    </div>
                </div>
            @endif
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
