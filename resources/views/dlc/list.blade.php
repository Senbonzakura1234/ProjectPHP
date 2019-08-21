@extends('layouts.app2')

@section('content')
    <div class="text-center mb-3 mt-2">
        <div class="col">
            <h2>DLC Management</h2>
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
        @if(count($ls_dlc) !== 0)
            @foreach($ls_dlc as $i => $dlc)
                <div class="col-12 col-sm-6 col-lg-4 message-item">
                    <div class="card" style="border-radius: 10px">
                        <a href="{{asset('/view_dlc/'.$dlc->id)}}" class="card-header" style="padding: 0;
                            height: 180px; background: url('{{asset($dlc->cover)}}') no-repeat center;
                            background-size: auto 250px; border-radius: 10px 10px 0 0">
                        </a>
                        <div class="card-body">
                            <a class="card-title" href="{{asset('/view_dlc/'.$dlc->id)}}">
                                @if(strlen($dlc->title) <= 25)
                                    <h5>{{$dlc->title}}</h5>
                                @else
                                    <h5>{{substr($dlc->title, 0, 25)}} ...</h5>
                                @endif
                            </a>
                            <p class="card-text">
                                <small class="text-muted">{{$dlc->post->title}}</small>
                            </p>
                        </div>
                        <div class="card-body text-right">
                            <a href="{{route('dlc.edit', $dlc->id)}}" class="btn btn-dark">Update</a>
                            <form method="post" onsubmit="return confirm('Sure ?')"
                                  action="{{route('dlc.destroy', $dlc->id)}}" style="display: inline">
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
                There are currently no DLC to view
            </h3>
        @endif
    </div>
    <div class="mt-5 mb-2 row">
        <div class="mx-auto">
            {{$ls_dlc->links()}}
        </div>
    </div>
    <div class="mt-2 row">
        <div class="mx-auto">
            <a class="btn btn-dark my-auto" href="{{route('dlc.create')}}">Create New</a>
        </div>
    </div>
@endsection

