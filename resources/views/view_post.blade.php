@extends('layouts.frontend')
@section('content')


    <div class="col-md-12 col-lg-8 main-content">

        <div class="post-meta">
            <span class="author mr-2"><img src="{{asset('/images/person_1.jpg')}}" alt="User" class="mr-2">
                User
            </span>&bullet;
            <span class="mr-2">{{$post->created_at}}</span> &bullet;
            <span class="ml-2">
                <span class="fa fa-comments"></span>
                <span class="comment-list-count-top">{{count($post->comment->where('status', 1))}}</span>
            </span>
        </div>
        <h2 class="mb-4">{{$post->title}}</h2>
        @foreach($post->categories as $cate)
            <a class="category mb-sm-5" href="{{asset('/post_by_category/'.$cate->id)}}">
                <i class="fas fa-rainbow"></i> {{$cate->name}}
            </a>
        @endforeach
        <img src="{{asset($post->cover)}}" alt="Image" class="img-fluid mt-3 mt-sm-0 mb-5">
        <div class="post-content-body">
            {!!$post->content!!}
        </div>






    </div>
@endsection
@section('comment')
    <div class="pt-5">
        <p>
            Categories:
            @foreach($post->categories as $cate)
                <a href="{{asset('/post_by_category/'.$cate->id)}}">
                    <i class="fas fa-rainbow"></i> {{$cate->name}}
                </a>@if(!$loop->last),@endif
            @endforeach
        &nbsp;
            Tags:
            @foreach($post->tags as $tag)
                <a href="{{asset('/post_by_tag/'.$tag->id)}}">
                    <i class="fas fa-tag"></i> {{$tag->name}}
                </a>@if(!$loop->last),@endif
            @endforeach
        </p>
    </div>
    <a id="comment-target" style="opacity: 0 !important;"></a>
    <div class="pt-5">
        <div class="comment-form-wrap">
            <form class="row" action="{{asset('post_comment/'.$post->id)}}" id="comment-form" method="post">
                @csrf
                <div class="form-group col-12">
                    <h3 class="mb-0">Leave a comment</h3>
                </div>
                <div class="form-group  col-12 col-sm-6">
                    <label class="mb-0" for="name">Name *</label>
                    <input type="text" class="form-control form-input" id="name" name="name">
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label class="mb-0" for="email">Email *</label>
                    <input type="email" class="form-control form-input" id="email" name="email">
                </div>
                <div class="form-group col-12">
                    <label class="mb-0" for="content">Comment *</label>
                    <textarea  id="content" name="content" class="form-control"></textarea>
                </div>
                <div class="form-group col-12 text-right">
                    <input style="width: 20%; min-width: 150px" type="submit" value="Comment"
                           class="btn btn-primary" id="submit_comment">
                </div>
            </form>
        </div>
        <h3 class="mb-5">
            Comments
            (<span class="comment-list-count">{{count($post->comment->where('status', 1))}}</span>)
        </h3>
        <ul class="comment-list" style="display: inline-block">
            @foreach($listComment as $comment)
                <li class="comment">
                    <div class="vcard">
                        <img src="{{asset('/images/avatar.png')}}" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                        <h3>{{$comment->name}}</h3>
                        <div class="meta">{{date('M d Y - H:i:s', strtotime($comment->created_at))}}</div>
                        <div class="comment-body-content">
                            <p>{!!$comment->content!!}</p>
                        </div>

                        <p><a href="#" class="reply rounded">Reply</a></p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="mt-2 text-center">
            {{$listComment->links()}}
        </div>
        <!-- END comment-list -->
    </div>
    <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        let editor = CKEDITOR.replace( 'content');
        CKEDITOR.config.skin = 'minimalist';
        CKEDITOR.config.extraPlugins = 'autogrow';
        CKEDITOR.config.height = 70;
        CKEDITOR.config.contentsCss = '{{asset("/css/ckeditor.css")}}';
        CKEDITOR.config.resize_enabled = false;
        let comment_count =  "{{count($post->comment->where('status', 1))}}",
            comment_count_int =  parseInt(comment_count);
        $("#submit_comment").click(function (e) {
            e.preventDefault();
            let name    = $("input[name = name]").val(),
                content = editor.getData(),
                email   = $("input[name = email]").val(),
                _token  = $("input[name = _token]").val(),
                avatar_link  = "{{asset('/images/avatar.png')}}";
            $.ajax({
                type: 'POST',
                url : "{{asset('/post_comment_ajax/')}}/" + "{{$post->id}}",
                data: {name:name, content:content, email:email, _token:_token},
                success:function (data) {
                    comment_count_int++;
                    let notify_id = "notify_comment" + comment_count_int.toString();
                    let comment_with_notify_append = $(
                        "<li class=\"alert alert-primary text-left text-sm-center p-2\" id=\""+ notify_id +"\">\n" +
                        "   <i class=\"fas fa-check-circle\"></i> Comment Post Successful\n" +
                        "</li>" +
                        "<li class=\"comment\">\n" +
                        "   <div class=\"vcard\">\n" +
                        "       <img src=\" "+ avatar_link +" \" alt=\"Image placeholder\">\n" +
                        "   </div>\n" +
                        "   <div class=\"comment-body\">\n" +
                        "       <h3>" + name +"</h3>\n" +
                        "       <div class=\"meta\">"+ data.created_at +"</div>\n" +
                        "       <div class=\"comment-body-content\"><p>" + content +"</p></div>\n" +
                        "        <p><a href=\"#\" class=\"reply rounded\">Reply</a></p>\n" +
                        "   </div>\n" +
                        "</li>"
                    ).hide();


                    $(".comment-list").prepend(
                        comment_with_notify_append
                    );
                    $(".comment-list-count").text(comment_count_int.toString());
                    $(".comment-list-count-top").text(comment_count_int.toString());
                    comment_with_notify_append.fadeIn(1500)


                    setTimeout(
                    function()
                    {
                        $("#"+notify_id+"").fadeOut();
                        setTimeout(
                            function()
                            {
                                $("#"+notify_id+"").remove();
                            }, 1000);
                    }, 5000);
                }
            })
        });
    </script>
    <style type="text/css">
        .cke_top, .cke_bottom
        {
            display: none !important;
        }
        .cke_chrome{
            border-top: transparent !important;
        }
    </style>

@endsection
