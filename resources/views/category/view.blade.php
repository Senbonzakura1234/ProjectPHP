@extends('layouts.app2')

@section('content')
        <div class="card ml-auto mr-auto mt-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Name: &nbsp;{{$cate -> name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div>
                    <a style="float: left; margin-right: 10px" href="{{route('category.edit', $cate->id)}}" class="card-link">Edit</a>
                    <form method="post" onsubmit="return confirm('Sure ?')"
                          action="{{route('category.destroy', $cate->id)}}"
                          style="float: left; margin-right: 10px">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE"/>
                        <input class="delete-btn" type="submit" value="Delete"/>
                    </form>
                    <a style="float: left; margin-right: 10px" href="{{route('category.index')}}" class="card-link">Back</a>
                </div>
            </div>
        </div>
@endsection
