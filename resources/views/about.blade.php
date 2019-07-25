@extends('layouts.frontend')
@section('content')
    <div class="col-md-12 col-lg-8 main-content">

        <div class="row about-content">
            <div class="col-md-12 text-center text-lg-left about-cover"
                style="background: url('{{asset('/images/img_6.jpg')}}')">
                <div class="about-avatar d-block d-lg-inline-block">
                    <img src="{{asset('/images/person_1.jpg')}}"
                         alt="Image Placeholder" class="img-fluid">
                    <div class="about-name d-block d-lg-inline-block">
                        <h2 class="mb-0">
                            Senbonzakura
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12 about-main">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum minima eveniet recusandae suscipit
                    eum laboriosam fugit amet deleniti iste et. Ad dolores, necessitatibus non saepe tenetur impedit
                    commodi quibusdam natus repellat, exercitationem accusantium perferendis officiis. Laboriosam
                    impedit quia minus pariatur!</p>
                <p>Dignissimos iste consectetur, nemo magnam nulla suscipit eius quibusdam, quo aperiam quia quae est
                    explicabo nostrum ab aliquid vitae obcaecati tenetur beatae animi fugiat officia id ipsam sint?
                    Obcaecati ea nisi fugit assumenda error totam molestiae saepe fugiat officiis quam?</p>
                <p>Culpa porro quod doloribus dolore sint. Distinctio facilis ullam voluptas nemo voluptatum saepe
                    repudiandae adipisci officiis, explicabo eaque itaque sed necessitatibus, fuga, ea eius et aliquam
                    dignissimos repellendus impedit pariatur voluptates. Dicta perferendis assumenda, nihil placeat,
                    illum quibusdam. Vel, incidunt?</p>
                <p>Dolorum blanditiis illum quo quaerat, possimus praesentium perferendis! Quod autem optio nobis,
                    placeat officiis dolorem praesentium odit. Vel, cum, a. Adipisci eligendi eaque laudantium dicta
                    tenetur quod, pariatur sunt sed natus officia fuga accusamus reprehenderit ratione, provident
                    possimus ut voluptatum.</p>
            </div>
        </div>
        <div class="row mb-5 mt-5">
            <div class="col-md-12 mb-5">
                <h2><i class="fas fa-user-clock"></i> My Latest Posts</h2>
            </div>
            <div class="col-md-12">
                @foreach($lsPost as $post)
                    <div class="post-entry-horzontal">
                        <a href="{{asset('/view_post/'.$post->id)}}">
                            <div class="image" style="background-image: url({{asset($post->cover)}});"></div>
                            <span class="text">
                                <div class="post-meta">
                                    <span class="author mr-2"><img src=" {{asset('/images/person_1.jpg')}}"
                                        alt="User"> {{$post->User->name}}</span>&bullet;
                                    <span class="mr-2">{{date('M d Y', strtotime($post->created_at))}} </span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> {{count($post->comment->where('status', 1))}}</span>
                                </div>
                                <h2>{{$post->title}}</h2>
                            </span>
                        </a>
                    </div>
                    <!-- END post -->
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <a style="width: 50%; font-size: 20px; border-radius: 40px"
                   href="{{asset('/post_list')}}" class="btn btn-primary">
                    <i class="fas fa-th-list"></i> View more post
                </a>
            </div>
        </div>
    </div>
@endsection

