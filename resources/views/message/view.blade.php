@extends('layouts.app')

@section('content')
    <div class="text-center mb-3 mt-2">
        <div class="col">
            <h2>Member Message</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 message-item">
            <div class="card">
                <div class="card-header">
                    From {{$message->name}}
                </div>
                <div class="card-body">
                    <p class="card-title">Phone: {{$message->phone}}</p>
                    <p class="card-title">Email: {{$message->email}}</p>
                    <small>Date: {{$message->created_at}}</small>
                </div>
                <div class="card-body">
                    <p class="card-text">Message: {{$message->content}}</p>
                </div>
                <div class="card-footer text-right">
                    <form method="post" onsubmit="return confirm('Sure ?')"
                          action="{{route('message.destroy', $message->id)}}"
                          style="width: 100%; display: block">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE"/>
                        <input style="width: 100%" class="btn btn-danger" type="submit" value="Delete"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

