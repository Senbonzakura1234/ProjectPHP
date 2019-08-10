@extends('layouts.app')

@section('content')
    <div class="row py-3">
        <div class="mx-auto">
            <h2>Main Dashboard</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 p-2 col-sm-6">
            <div class="card">
                <div class="card-header"><a href="{{route('category.index')}}"><i class="fas fa-tags"></i> Category</a>
                </div>
                <div class="card-body">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s
                </div>
            </div>
        </div>
        <div class="col-12 p-2 col-sm-6">
            <div class="card">
                <div class="card-header"><a href="{{route('tag.index')}}"><i class="fas fa-tags"></i> Tag</a></div>
                <div class="card-body">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s
                </div>
            </div>
        </div>
        <div class="col-12 p-2 col-sm-6">
            <div class="card">
                <div class="card-header"><a href="{{route('post.index')}}"><i class="far fa-clipboard"></i> Post</a>
                </div>
                <div class="card-body">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s
                </div>
            </div>
        </div>
        <div class="col-12 p-2 col-sm-6">
            <div class="card">
                <div class="card-header"><a href="{{asset('/admin/comment')}}">
                    <i class="fas fa-comments"></i> Comment</a>
                </div>
                <div class="card-body">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s
                </div>
            </div>
        </div>
        <div class="col-12 p-2 col-sm-6">
            <div class="card">
                <div class="card-header"><a href="{{asset('/admin/dlc')}}">
                    <i class="fas fa-comments"></i> DLC</a>
                </div>
                <div class="card-body">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s
                </div>
            </div>
        </div>
    </div>
@endsection
