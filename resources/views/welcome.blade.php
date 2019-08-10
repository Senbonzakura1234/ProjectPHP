@extends('layouts.frontend')
@section('banner')
    <section class="site-section pt-5 pb-5">
        <div>
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-touch="true"
                     data-pause="hover">
                    <ol class="carousel-indicators">
                        @foreach($lsPopular as $carousel)
                            <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}"
                                class="{{ $loop->first ? 'active' : '' }}">
                            </li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($lsPopular as $carousel)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-interval="3000">
                                <div class="carousel-home-span" id="carousel-home-bg-1"
                                     style="background-image: url('{{asset($carousel->cover)}}')">
                                </div>
                                {{--<img src="images/img_1.jpg" class="d-block " alt="...">--}}
                                <div class="carousel-caption">
                                    @foreach($carousel->categories as $cate)
                                        @if($loop->first)
                                            <a href="{{asset('/post_by_category/'.$cate->id)}}" class="category mb-2">
                                                <i class="fas fa-rainbow"></i> {{$cate->name}}
                                            </a>
                                        @endif
                                    @endforeach
                                    <span class="ml-2 mb-2"> {{date('M d Y', strtotime($carousel->created_at))}} &bullet;
                                    <span class="fa fa-comments"></span>
                                        {{count($carousel->comment->where('status', 1))}}
                                    </span>
                                    <a class="carousel-post-link" href="{{asset('/view_post/'.$carousel->id)}}">
                                        @if(strlen($carousel->title) <= 50)
                                            <h5>{{$carousel->title}}</h5>
                                        @else
                                            <h5>{{substr($carousel->title, 0, 46)}} ...</h5>
                                        @endif
                                    </a>
                                    <p class="d-none d-md-block">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta
                                        eaque ipsa laudantium!
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-fix carousel-control-prev" href="#carouselExampleCaptions" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-fix carousel-control-next" href="#carouselExampleCaptions" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content-title')
    <a style="opacity: 0 !important;" id="page-target"></a>
    <div class="row">
        <div class="col-lg-6">
            <h2 class="mb-4">Latest Posts <i class="far fa-clock"></i></h2>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-md-12 col-lg-8 main-content">
        <div class="row">
            @foreach($lsPost as $post)
                <div class="col-md-6">
                    <a href="{{asset('/view_post/'.$post->id)}}" class="blog-entry element-animate">
                        <img src="{{$post->cover}}" alt="Image placeholder">
                        <div class="blog-content-body">
                            <div class="post-meta">
                                <span class="author mr-2"><img src="{{asset('/images/person_1.jpg')}}"
                                   alt="User"> User</span>
                                <span class="mr-2">{{date('d/m/y', strtotime($post->created_at))}}</span>
                                <span class="ml-2"><span class="fa fa-comments"></span>
                                {{count($post->comment->where('status', 1))}}</span>
                            </div>
                            @if(strlen($post->title) <= 45)
                                <h2>{{$post->title}}</h2>
                            @else
                                <h2>{{substr($post->title, 0, 41)}} ...</h2>
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                {{$lsPost->links()}}
            </div>
        </div>
    </div>
@endsection
