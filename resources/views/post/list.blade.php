@extends('layouts.app')

@section('content')
    <div class="text-center mb-3 mt-2">
        <div class="col">
            <h2>Post Management</h2>
        </div>
    </div>
    @foreach(['success', 'danger'] as $msg)
        @if(session($msg))
            <div class="text-center mb-3 row alert alert-{{$msg}}">
                {{session($msg)}}
            </div>
        @endif
    @endforeach
    <div class="row">
        @if(count($lsPost) !== 0)
            @foreach($lsPost as $i => $post)
                <div class="col-12 col-sm-6 col-lg-4 message-item">
                    <div class="card" style="border-radius: 10px">
                        <a href="{{route('post.show', $post->id)}}" class="card-header" style="padding: 0;
                            height: 180px; background: url('{{asset($post->cover)}}') no-repeat center;
                            background-size: auto 250px; border-radius: 10px 10px 0 0">
                        </a>
                        <div class="card-body">
                            <a class="card-title" href="{{route('post.show', $post->id)}}">
                                @if(strlen($post->title) <= 25)
                                    <h5>{{$post->title}}</h5>
                                @else
                                    <h5>{{substr($post->title, 0, 25)}} ...</h5>
                                @endif
                            </a>
                            <p class="card-text">
                                <small class="text-muted">{{$post->created_at}}</small>
                            </p>
                        </div>
                        <div class="card-body text-right">
                            <a href="{{route('post.edit', $post->id)}}" class="btn btn-dark">Update</a>
                            <form method="post" onsubmit="return confirm('Sure ?')"
                                  action="{{route('post.destroy', $post->id)}}" style="display: inline">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE"/>
                                <input class="btn btn-danger" type="submit" value="Delete"/>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h3 class="mx-auto mt-5" style="opacity: 0.5; text-align: center; display: block">
                There are currently no Post to read
            </h3>
        @endif
    </div>
    <div class="mt-5 mb-2 row">
        <div class="mx-auto">
            {{$lsPost->links()}}
        </div>
    </div>
    <div class="mt-2 row">
        <div class="mx-auto">
            <a class="btn btn-dark my-auto" href="{{route('post.create')}}">Create New</a>
        </div>
    </div>
@endsection

