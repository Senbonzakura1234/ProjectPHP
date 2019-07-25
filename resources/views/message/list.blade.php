@extends('layouts.app')

@section('content')
    <div class="text-center mb-3 mt-2">
        <div class="col">
            <h2>Member Message</h2>
        </div>
    </div>
    <div class="row">
        @if(count($lsMessage) !== 0)
            @foreach($lsMessage as $i => $message)
            <div class="col-12 message-item">
                <div class="card">
                    <div class="card-header">
                        @if(strlen($message->name) <= 20)
                            From {{$message->name}}
                        @else
                            From {{substr($message->name, 0, 20)}} ...
                        @endif
                    </div>
                    <div class="card-body">
                        <p class="card-text">Phone: {{$message->phone}}</p>
                        <p class="card-text">Email: {{$message->email}}</p>
                        @if(strlen($message->content) <= 150)
                            <p class="card-text">Message: {{$message->content}}</p>
                        @else
                            <p class="card-text">Message: {{substr($message->content, 0, 150)}} ...</p>
                        @endif
                    </div>
                    <div class="card-footer row mx-0">
                        <div class="mx-auto ml-sm-0 mr-sm-auto">
                            <small>Date: {{$message->created_at}}</small>
                        </div>
                        <div class="mx-auto ml-sm-auto mr-sm-0">
                            <a href="{{route('message.show', $message->id)}}" class="btn btn-secondary">Read Full</a>
                            <form method="post" onsubmit="return confirm('Sure ?')"
                                  action="{{route('message.destroy', $message->id)}}"
                                  style="display: inline">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE"/>
                                <input class="btn btn-danger" type="submit" value="Delete"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <h3 class="mx-auto mt-5" style="opacity: 0.5; text-align: center; display: block">
                There are currently no Message to read
            </h3>
        @endif
    </div>
    @foreach(['success', 'danger'] as $msg)
        @if(session($msg))
            <div class="text-center table-alert alert alert-{{$msg}}">
                {{session($msg)}}
            </div>
        @endif
    @endforeach
@endsection

