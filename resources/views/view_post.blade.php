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
			@if(Auth::check())
				<form class="row" action="{{asset('post_comment/'.$post->id)}}" id="comment-form" method="post">
					@csrf
					<div class="form-group col-12">
						<h3 class="mb-0">Leave a comment</h3>
					</div>
					<div class="form-group col-12">
						<label class="mb-0" for="content">Comment *</label>
						<textarea  id="content" name="content" class="form-control" required></textarea>
					</div>
					<div class="form-group col-12 text-right">
						<input style="width: 20%; min-width: 150px" type="submit" value="Comment"
							   class="btn btn-primary" id="submit_comment">
					</div>
				</form>
			@endif
		</div>
        <h3 class="mb-5">
            Comments
            (<span class="comment-list-count">{{count($post->comment->where('status', 1))}}</span>)
        </h3>
        <ul class="comment-list" style="display: inline-block; width: 100%">
            @foreach($listComment as $comment)
                <li class="comment" id="comment{{$comment->id}}">
                    <div class="vcard">
                        <img src="{{asset('/images/avatar.png')}}" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                        <h3>{{$comment->user->name}}</h3>
                        <div class="meta">{{date('M d Y - H:i:s', strtotime($comment->created_at))}}</div>
                        <div class="comment-body-content">
                            <p>{!!$comment->content!!}</p>
                        </div>
						@if(Auth::check() && Auth::user()->id === $comment->user->id)
							<div class="comment-body-content text-right">
								<p>
									<button type="button" class="btn btn-danger" data-toggle="modal"
											data-target="#exampleModal" data-whatever="{{$comment->id}}">
										Delete
									</button>
								</p>
							</div>
						@endif
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="mt-2 text-center">
            {{$listComment->links()}}
        </div>
        <div class="mt-2 text-center">
			@if(!Auth::check())
				<a href="#" class="btn mx-auto btn-primary w-50">Login to Comment</a>
			@endif
        </div>
        <!-- END comment-list -->
    </div>


@endsection
@section('modal')


	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this comment</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body d-none">
					<form>
						<input type="hidden" id="comment_id" name="comment_id">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" id="confirm-delete" class="btn btn-danger">Delete</button>
				</div>
			</div>
		</div>
	</div>





	<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript">
        let comment_count =  "{{count($post->comment->where('status', 1))}}",
            comment_count_int =  parseInt(comment_count);
		@if(Auth::check())
            $('#exampleModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget); // Button that triggered the modal
                let recipient = button.data('whatever'); // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library
				// or other methods instead.
                let modal = $(this);
                modal.find('.modal-body #comment_id').val(recipient)
            });
            $('#confirm-delete').click(function (e) {
                e.preventDefault();
                let comment_id = $("#comment_id").val(),
                    _token = $("input[name='_token']").val();
                @if(Auth::check())
					$.ajax({
						type: 'POST',
						url: "{{asset('/delete_comment_ajax')}}",
						data: {comment_id: comment_id, _token: _token},
						success: function (data) {
                            comment_count_int--;
                            $(".comment-list-count").text(comment_count_int.toString());
                            $(".comment-list-count-top").text(comment_count_int.toString());
							$("#comment" + comment_id).remove();
							$('.modal').modal('toggle');
						},
					});
				@endif
            });
			let editor = CKEDITOR.replace( 'content');
			CKEDITOR.config.skin = 'minimalist';
			CKEDITOR.config.extraPlugins = 'autogrow';
			CKEDITOR.config.height = 70;
			CKEDITOR.config.contentsCss = '{{asset("/css/ckeditor.css")}}';
			CKEDITOR.config.resize_enabled = false;
		@endif


        $("#submit_comment").click(function (e) {
            e.preventDefault();
            let content = editor.getData(),
                _token  = $("input[name = _token]").val(),
                avatar_link  = "{{asset('/images/avatar.png')}}";
				$.ajax({
					type: 'POST',
					url : "{{asset('/post_comment_ajax/')}}/" + "{{$post->id}}",
					data: {content:content, _token:_token},
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
							"       <h3>" + "@if(Auth::check()){{ Auth::user()->name  }}@endif" +"</h3>\n" +
							"       <div class=\"meta\">"+ data.created_at +"</div>\n" +
							"       <div class=\"comment-body-content\"><p>" + content +"</p></div>\n" +
							"   </div>\n" +
							"</li>"
						).hide();


						$(".comment-list").prepend(
							comment_with_notify_append
						);
						$(".comment-list-count").text(comment_count_int.toString());
						$(".comment-list-count-top").text(comment_count_int.toString());
						comment_with_notify_append.fadeIn(1500);


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
