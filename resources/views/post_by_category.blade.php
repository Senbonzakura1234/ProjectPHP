@extends('layouts.frontend')
@section('content-title')
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="mb-4">
                <i class="fas fa-th-large"></i>
                Category: {{$cate->name}} ({{count($cate->posts)}})
            </h2>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-md-12 col-lg-8 main-content">
        <div class="row mb-5 mt-5">

            <div class="col-md-12">
                @foreach($lsPostCate as $post)
                    <div class="post-entry-horzontal">
                        <a href="{{asset('/view_post/'.$post->id)}}">
                            <div class="image element-animate"
                                 style="background-image: url({{asset($post->cover)}});"></div>
                            <span class="text">
                                <div class="post-meta">
                                    <span class="author mr-2">
                                        <img src="{{asset('/images/person_1.jpg')}}" alt="User">
                                        User
                                    </span>
                                    <span class="mr-2">{{date('M d Y', strtotime($post->created_at))}} </span>
                                    @foreach($post->tags as $tag)
                                        @if($loop->first)
                                            <span class="mr-2">
                                                <i class="fas fa-tag"></i> {{$tag->name}}
                                            </span>
                                        @endif
                                    @endforeach
                                    <span class="ml-2"><span class="fa fa-comments"></span> {{count($post->comment->where('status', 1))}}</span>
                                </div>
                                <h2>{{$post->title}}</h2>
                            </span>
                        </a>
                    </div>
                    <!-- END post -->
                @endforeach
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                {{$lsPostCate->links()}}
            </div>
        </div>
    </div>
@endsection

