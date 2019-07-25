@extends('layouts.frontend')
@section('content-title')
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Contact Me <i class="fas fa-mail-bulk"></i></h1>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-md-12 col-lg-8 main-content">
        <form action="{{route('saveMessage')}}" method="post">
            @csrf
            <div class="row">
                @if(count($errors)>0)
                    <div class="col-md-12 form-group">
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $er)
                                {{$er}}<br>
                            @endforeach
                        </div>
                    </div>
                @else
                    @foreach(['primary', 'danger'] as $msg)
                        @if(session($msg))
                            <div class="col-md-12 form-group">
                                <div class="alert alert-{{$msg}}">
                                    {{session($msg)}}
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control ">
                </div>
                <div class="col-md-12 form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control ">
                </div>
                <div class="col-md-12 form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control ">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="message">Write Message</label>
                    <textarea name="content" id="content" class="form-control " cols="30" rows="8">
                    </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <input type="submit" value="Send Message" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection



