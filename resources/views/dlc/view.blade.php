@extends('layouts.frontend')
@section('content')


{{--    <div class="col-md-12 col-lg-8 main-content">--}}

{{--        <div class="post-meta">--}}
{{--            <span class="author mr-2"><img src="{{asset('/images/person_1.jpg')}}" alt="User" class="mr-2"> User</span>&bullet;--}}
{{--            <span class="mr-2">{{$post->created_at}}</span> &bullet;--}}
{{--            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>--}}
{{--            @if(Auth::check())--}}
{{--                <div class="text-left ml-auto mt-3">--}}
{{--                    <a class="btn btn-primary" href="{{route('post.index')}}">Back to Dashboard</a>--}}
{{--                    <form class="mt-2 my-sm-0" method="post" onsubmit="return confirm('Sure ?')"--}}
{{--                          action="{{route('post.destroy', $post->id)}}" style="display: inline-block">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" name="_method" value="DELETE"/>--}}
{{--                        <input class="btn btn-secondary" type="submit" value="Delete"/>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <h2 class="mb-4">{{$post->title}}</h2>--}}
{{--        @foreach($post->categories as $cate)--}}
{{--            <a class="category mb-5" href="{{asset('/post_by_category/'.$cate->id)}}">--}}
{{--                <i class="fas fa-rainbow"></i> {{$cate->name}}--}}
{{--            </a>--}}
{{--        @endforeach--}}
{{--        <img src="{{asset($post->cover)}}" alt="Image" class="img-fluid mb-5">--}}
{{--        <div class="post-content-body">--}}
{{--            {!!$post->content!!}--}}
{{--        </div>--}}





{{--    </div>--}}
@endsection
@section('comment')
{{--    <div class="pt-5">--}}
{{--        <p>--}}
{{--            Categories:--}}
{{--            @foreach($post->categories as $cate)--}}
{{--                <a href="{{asset('/post_by_category/'.$cate->id)}}">--}}
{{--                    <i class="fas fa-rainbow"></i> {{$cate->name}}--}}
{{--                </a>@if(!$loop->last),@endif--}}
{{--            @endforeach--}}
{{--            &nbsp;--}}
{{--            Tags:--}}
{{--            @foreach($post->tags as $tag)--}}
{{--                <a href="{{asset('/post_by_tag/'.$tag->id)}}">--}}
{{--                    <i class="fas fa-tag"></i> {{$tag->name}}--}}
{{--                </a>@if(!$loop->last),@endif--}}
{{--            @endforeach--}}
{{--        </p>--}}
{{--    </div>--}}
@endsection
