@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-lg-4"></div>
            <form class="col-lg-4 my-auto" method="post" action="{{route('category.store')}}"
                  style="border-radius: 15px">
                @csrf
                <div class="form-group text-center mb-3">
                    <h2>Create New</h2>
                </div>

                <div class="form-group">
                    <label for="catename">Category Name</label>
                    <input type="text" id="catename" name="name"
                           class="form-control" placeholder="Category"/>
                </div>
                @if(count($errors)>0)
                    <div class="alert alert-danger form-group">
                        @foreach($errors->all() as $er)
                            {{$er}}
                        @endforeach
                    </div>
                @endif
                <div class="form-group text-center">
                    <input id="form-submit" class="btn btn-dark" type="submit" value="Create" style="width: 100%">
                    <div>
                       <p>Return to <a href="{{route('category.index')}}">dashboard</a></p>
                    </div>
                </div>
            </form>
            <div class="col-lg-4"></div>
        </div>
@endsection
