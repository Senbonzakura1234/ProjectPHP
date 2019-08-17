@extends('layouts.app2')

@section('content')
        <div class="row">
            <div class="col-lg-4"></div>
            <form class="col-lg-4 my-auto" method="post" action="{{route('tag.update', $tag->id)}}"
                  style="border-radius: 15px">
                @csrf
                @method('PUT')
                <div class="form-group text-center mb-3">
                    <h2>Update</h2>
                </div>

                <div class="form-group">
                    <label for="tagname">Tag Name</label>
                    <input type="text" id="tagname" name="name" value="{{$tag->name}}"
                           class="form-control" placeholder="Tag"/>
                </div>
                @if(count($errors)>0)
                    <div class="alert alert-danger form-group">
                        @foreach($errors->all() as $er)
                            {{$er}}
                        @endforeach
                    </div>
                @endif
                <div class="form-group text-center">
                    <input id="form-submit" class="btn btn-primary" type="submit" value="Update" style="width: 100%">
                    <div>
                        <p>Return to <a href="{{route('tag.index')}}">dashboard</a></p>
                    </div>
                </div>
            </form>
            <div class="col-lg-4"></div>
        </div>
@endsection
