@extends('layouts.app')

@section('content')
    <div class="text-center mb-4 mt-2">
        <div class="col">
            <h2>Tag Management</h2>
        </div>
    </div>
    <div class="row">
        @foreach($lsTag as $i => $tag)
            <div class="d-none needToRemove">
                {{$commentCount = 0}}
                @foreach($tag->posts as $countEach)
                    {{$commentCount = $commentCount + count($countEach->comment)}}
                @endforeach
            </div>
            <div class="col-12 col-sm-6 col-lg-4
                @if(($i+1)%3 === 1)
                    ml-auto
                @elseif(($i+1)%3 === 2)
                    mr-auto
                @endif
                "
                style="padding-top: 10px; padding-bottom: 10px">
                <div class="card border-dark">
                    <div class="card-header bg-dark text-light">
                        <a href="{{route('tag.show', $tag->id)}}">
                            {{$i+1}}/ {{$tag->name}}
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Post Count: {{count($tag->posts)}}</p>
                        <p class="card-text">
                            Comment Count: {{$commentCount}}
                        </p>
                    </div>
                    <div class="card-footer row mx-0  bg-dark text-light">
                        <div class="mx-auto ml-sm-auto mr-sm-0">
                            <a class="btn-dark btn" href="{{route('tag.edit', $tag->id)}}">Update</a>
                            <form method="post" onsubmit="return confirm('Sure ?')"
                                  action="{{route('tag.destroy', $tag->id)}}" style="display: inline">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE"/>
                                <input class="btn-danger btn" type="submit" value="Delete"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @foreach(['success', 'danger'] as $msg)
        @if(session($msg))
            <div class="text-center table-alert alert alert-{{$msg}}">
                {{session($msg)}}
            </div>
        @endif
    @endforeach
    <div class="mt-4 text-center">
        <div>
            <a class="btn btn-outline-dark my-auto" href="{{route('tag.create')}}">Create New</a>
        </div>
    </div>
@endsection

