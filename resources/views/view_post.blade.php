@extends('layouts.frontend')
@section('content')


	<div class="col-md-12 col-lg-8 main-content">
		<h2 class="mb-0">{{$post->title}}</h2>
		<div class="post-meta">
			<strong>
				Statistic:
			</strong>
			<small class="ml-2">
				<i class="fab fa-windows @if($post->windows == 1) text-compartible @endif"></i>
				<i class="fab fa-xbox @if($post->xbox == 1) text-compartible @endif"></i>
				<i class="fab fa-playstation
											@if($post->playstation == 1) text-compartible @endif">
				</i>
			</small> &bullet;
			<small class="ml-2">
                <span class="fa fa-comments"></span>
                <span class="comment-list-count-top">{{count($post->comment->where('status', 1))}}</span>
            </small> &bullet;
			<small>
				@if($lsRatingScore > 0)
					<i class="fas fa-star @if($lsRatingScore <= 1) text-danger
						@elseif($lsRatingScore >1 && $lsRatingScore <= 2) text-warning
						@elseif($lsRatingScore >2 && $lsRatingScore <= 3) text-secondary
						@elseif($lsRatingScore >3 && $lsRatingScore <= 4) text-success @else text-primary @endif">
					</i>
					<span>{{number_format($lsRatingScore, 1, '.', ',')}}</span>
				@else
					<i class="far fa-star text-secondary"></i>
					<span>{{number_format($lsRatingScore, 1, '.', ',')}}</span>
				@endif
			</small> &bullet;
			<small>
				@foreach($post->tags->take(1) as $tag)
					<a href="{{asset('/post_by_tag/'.$tag->id)}}">
						{{$tag->name}}
					</a>@if(!$loop->last), @endif
				@endforeach
			</small>
		</div>




		<div class="row mx-0 mb-3 mb-lg-0 position-modify-on-page">
			<div class="mb-2">
				@foreach($post->categories as $cate)
					<a class="category" href="{{asset('/post_by_category/'.$cate->id)}}">
						<i class="fas fa-rainbow"></i> {{$cate->name}}
					</a>
				@endforeach
			</div>

			<div class="follow-btn text-secondary mb-2 ml-sm-auto mr-2 px-2">
				Follow <i class="fas fa-rss"></i>
			</div>


			@if(Auth::check())								
				@if(in_array($post->id, $gamedamua))
					<button class="btn btn-sm btn-info add-to-cart-btn position-modify">
						<i class="fas fa-check"></i>
						<span class="add-to-cart-btn-text">Da mua</span>
						<i class="fas fa-sync-alt fast-spin"></i>
					</button>
				@else
				<a href="{{asset('/add_to_cart/'.$post->id)}}" class="position-modify">
						<button class="btn btn-sm btn-primary add-to-cart-btn">
							<i class="fas fa-cart-plus"></i>
							<span class="add-to-cart-btn-text">Add to cart</span>
							<i class="fas fa-sync-alt fast-spin"></i>
						</button>
					</a>
				@endif									
			@endif


		</div>


		<img src="{{asset($post->cover)}}" alt="Image" class="img-fluid mt-3 mt-sm-0 mb-5">
		<div class="post-content-body">
			{!!$post->content!!}
		</div>


	</div>
@endsection
@section('comment')
	<div class="my-3 row galleries">
		<div class="col-12">
			<h4>Game galleries</h4>
		</div>
		<div class="col-12">
			<div id="galleriesCarousel" class="carousel slide" data-ride="carousel" data-interval="4000"
			 data-pause="hover">
			<ol class="carousel-indicators">
				@foreach($lsGallery as $gallery)
					<li data-target="#galleriesCarousel" data-slide-to="{{ $loop->index }}"
						class="{{ $loop->first ? 'active' : '' }}"></li>
				@endforeach
			</ol>
			<div class="carousel-inner">
				@foreach($lsGallery as $gallery)
					<div class="carousel-item {{ $loop->first ? 'active' : '' }} galleryItem">
						<img src="{{asset($gallery->link)}}" class="d-block w-100" alt="...">
					</div>
				@endforeach
			</div>
			<a class="carousel-control-prev" href="#galleriesCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#galleriesCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		</div>
	</div>
	<div class="row my-2">
		<div class="col-12">
			<h4>Relate content</h4>
		</div>
		@foreach($post->dlc->take(3) as $dlc)
			<div class="col-12" style="padding: 15px">
				<div class="card" style=" width: 100%">
					<div class="row no-gutters">
						<div class="col-12 col-md-3">
							<a href="{{asset('/view_dlc/'.$dlc->id)}}" class="d-block" style="padding: 0;
								background:
								url('{{asset($dlc->cover)}}')
								no-repeat center; background-size: cover !important; min-height: 150px;
								height: 100%; border-radius: 0.25rem 0 0 0.25rem; width: 100%">
							</a>
						</div>
						<div class="col-12 col-md-9" style="padding-bottom: 80px; position: relative">
							<div class="card-body pb-md-0">
								<h5 class="card-title">
									<a href="{{asset('/view_dlc/'.$dlc->id)}}">
										{{$dlc->title}}
									</a>
								</h5>
								<p class="card-text">
									Price:
									@if($dlc->discount > 0 && $dlc->discount < 100 && $dlc->price > 0)
										<small>
												<span style="text-decoration: line-through;">
													{{$dlc->price}} €
												</span>
										</small>
										&nbsp;
										<strong>
												<span style="font-size: 100%" class="badge badge-success">
													-{{$dlc->discount}}%
												</span>
										</strong>
										{{$dlc->price * (1 - $dlc->discount/100)}} €
									@elseif($dlc->price == 0 || $dlc->discount == 100)
										<strong>
											<span class="badge badge-success" style="font-size: 100%">FREE</span>
										</strong>
									@else
										<small>
											{{$dlc->price}} €
										</small>
									@endif
									<span class="follow-btn text-secondary mb-2 ml-sm-auto mr-2 px-2">
											Follow <i class="fas fa-rss"></i>
										</span>
									&bull;
									<small>
										<i class="fab fa-windows @if($dlc->windows == 1) text-compartible @endif"></i>
										<i class="fab fa-xbox @if($dlc->xbox == 1) text-compartible @endif"></i>
										<i class="fab fa-playstation
												@if($dlc->playstation == 1) text-compartible @endif">
										</i>
									</small>
								</p>
							</div>
							<button class="btn btn-sm btn-primary add-to-cart-btn position-modify">
								<i class="fas fa-cart-plus"></i>
								<span class="add-to-cart-btn-text">Add to cart</span>
								<i class="fas fa-sync-alt fast-spin"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		<div class="col-12 text-center">
			<a style="font-size: 15px; border-radius: 40px; width: 30%; min-width: 100px"
			   href="{{asset('/dlc_list/'.$post->id)}}" class="btn btn-primary d-inline-block mb-2">
				<i class="fas fa-th-list"></i> View more
			</a>
		</div>
	</div>


	<div class="pt-5">
		<p>&nbsp;
			Tags:
			@foreach($post->tags as $tag)
				<a href="{{asset('/post_by_tag/'.$tag->id)}}">
					<i class="fas fa-tag"></i> {{$tag->name}}
				</a>@if(!$loop->last), @endif
			@endforeach
		</p>
	</div>
	<a id="comment-target" style="opacity: 0 !important;"></a>
	<div class="pt-5">
		<div class="comment-form-wrap">
			<form class="row @if(Auth::check() && $lsUserRatingCount < 1) d-flex @else d-none @endif"
				  action="{{asset('post_comment/'.$post->id)}}" id="comment-form" method="post">
				@method('POST')
				@csrf
				<div class="form-group col-12">
					<h3 class="mb-0">Write a review</h3>
				</div>
				<div class="form-group col-12">
					<label class="mb-0" for="rating">Rating *</label>
					<input type="hidden" value="0" min="1" max="5" step="1" id="rating-input" name="rating" required>
					<div class="rating">
						<a id="rating-1" class="btn rating-color"><i id="icon-rating-1" class="far fa-star"></i></a>
						<a id="rating-2" class="btn rating-color"><i id="icon-rating-2" class="far fa-star"></i></a>
						<a id="rating-3" class="btn rating-color"><i id="icon-rating-3" class="far fa-star"></i></a>
						<a id="rating-4" class="btn rating-color"><i id="icon-rating-4" class="far fa-star"></i></a>
						<a id="rating-5" class="btn rating-color"><i id="icon-rating-5" class="far fa-star"></i></a>
					</div>
				</div>
				<div class="form-group col-12">
					<label class="mb-0" for="content">Review *</label>
					<textarea id="content" name="content" class="form-control" required></textarea>
				</div>
				<div class="form-group col-12 text-right">
					<input style="width: 20%; min-width: 150px" type="submit" value="Comment"
						   class="btn btn-primary" id="submit_comment">
				</div>
			</form>

		</div>
		<h3 class="mb-3">
			Rating
			@if($lsRatingScore > 0)
				<span>{{number_format($lsRatingScore, 1, '.', ',')}}</span>
				<i class="fas fa-star @if($lsRatingScore <= 1) text-danger
					@elseif($lsRatingScore >1 && $lsRatingScore <= 2) text-warning
					@elseif($lsRatingScore >2 && $lsRatingScore <= 3) text-secondary
					@elseif($lsRatingScore >3 && $lsRatingScore <= 4) text-success @else text-primary @endif">
				</i>
			@else
				<span>{{number_format($lsRatingScore, 1, '.', ',')}}</span>
				<i class="far fa-star text-secondary"></i>
			@endif
		</h3>
		<div class="rating-list" style="display: inline-block; width: 100%">
			<label>
				5 <i class="far fa-star text-primary"></i>
				<small>{{$lsRatingTotal*$lsRating5Score/100}} Votes</small>
			</label>
			<div class="progress">
				<div class="progress-bar bg-primary" role="progressbar"
					 style="width: {{($lsRating5Score < 0.5)? 0.5:$lsRating5Score}}%"
					 aria-valuenow="{{($lsRating5Score < 0.5)? 0.5:$lsRating5Score}}"
					 aria-valuemin="0" aria-valuemax="100">
				</div>
			</div>
			<label>
				4 <i class="far fa-star text-success"></i>
				<small>{{$lsRatingTotal*$lsRating4Score/100}} Votes</small>
			</label>
			<div class="progress">
				<div class="progress-bar bg-success" role="progressbar"
					 style="width: {{($lsRating4Score < 0.5)? 0.5:$lsRating4Score}}%"
					 aria-valuenow="{{($lsRating4Score < 0.5)? 0.5:$lsRating4Score}}"
					 aria-valuemin="0" aria-valuemax="100">
				</div>
			</div>
			<label>
				3 <i class="far fa-star text-secondary"></i>
				<small>{{$lsRatingTotal*$lsRating3Score/100}} Votes</small>
			</label>
			<div class="progress">
				<div class="progress-bar bg-secondary" role="progressbar"
					 style="width: {{($lsRating3Score < 0.5)? 0.5:$lsRating3Score}}%"
					 aria-valuenow="{{($lsRating3Score < 0.5)? 0.5:$lsRating3Score}}"
					 aria-valuemin="0" aria-valuemax="100">
				</div>
			</div>
			<label>
				2 <i class="far fa-star text-warning"></i>
				<small>{{$lsRatingTotal*$lsRating2Score/100}} Votes</small>
			</label>
			<div class="progress">
				<div class="progress-bar bg-warning" role="progressbar"
					 style="width: {{($lsRating2Score < 0.5)? 0.5:$lsRating2Score}}%"
					 aria-valuenow="{{($lsRating2Score < 0.5)? 0.5:$lsRating2Score}}"
					 aria-valuemin="0" aria-valuemax="100">
				</div>
			</div>
			<label>
				1 <i class="far fa-star text-danger"></i>
				<small>{{$lsRatingTotal*$lsRating1Score/100}} Votes</small>
			</label>
			<div class="progress">
				<div class="progress-bar bg-danger" role="progressbar"
					 style="width: {{($lsRating1Score < 0.5)? 0.5:$lsRating1Score}}%"
					 aria-valuenow="{{($lsRating1Score < 0.5)? 0.5:$lsRating1Score}}"
					 aria-valuemin="0" aria-valuemax="100">
				</div>
			</div>
		</div>
		<h3 class="my-5">
			Reviews
			(<span class="comment-list-count">{{count($post->comment->where('status', 1))}}</span>)
		</h3>
		<ul class="comment-list" style="display: inline-block; width: 100%">
			@foreach($listComment as $comment)
				<li class="comment" id="comment{{$comment->id}}">
					<div class="vcard">
						<img src="{{
							$comment->user->avatar != null? asset($comment->user->avatar) :
							'https://res.cloudinary.com/senbonzakura/image/upload/v1566237952/default_re2ods.png'
							}}" alt="Image placeholder">
					</div>
					<div class="comment-body pb-4 pb-md-0">
						<h3>{{$comment->user->name}}</h3>
						<div class="meta">{{date('M d Y - H:i:s', strtotime($comment->created_at))}}</div>
						<div class="comment-body-content">
							<p>{!!$comment->content!!}</p>
						</div>
						<div class="comment-body-content">
							<a class="@if($comment->rating==1) text-danger @elseif($comment->rating==2) text-warning
								@elseif($comment->rating==3) text-secondary @elseif($comment->rating==4) text-success
								@else text-primary @endif">
								<i id="icon-rated-1" class="@if($comment->rating > 0) fas @else far @endif fa-star"></i>
							</a>
							<a class="@if($comment->rating==1) text-danger @elseif($comment->rating==2) text-warning
								@elseif($comment->rating==3) text-secondary @elseif($comment->rating==4) text-success
								@else text-primary @endif">
								<i id="icon-rated-2" class="@if($comment->rating > 1) fas @else far @endif fa-star"></i>
							</a>
							<a class="@if($comment->rating==1) text-danger @elseif($comment->rating==2) text-warning
								@elseif($comment->rating==3) text-secondary @elseif($comment->rating==4) text-success
								@else text-primary @endif">
								<i id="icon-rated-3" class="@if($comment->rating > 2) fas @else far @endif fa-star"></i>
							</a>
							<a class="@if($comment->rating==1) text-danger @elseif($comment->rating==2) text-warning
								@elseif($comment->rating==3) text-secondary @elseif($comment->rating==4) text-success
								@else text-primary @endif">
								<i id="icon-rated-4" class="@if($comment->rating > 3) fas @else far @endif fa-star"></i>
							</a>
							<a class="@if($comment->rating==1) text-danger @elseif($comment->rating==2) text-warning
								@elseif($comment->rating==3) text-secondary @elseif($comment->rating==4) text-success
								@else text-primary @endif">
								<i id="icon-rated-5" class="@if($comment->rating > 4) fas @else far @endif fa-star"></i>
							</a>
						</div>
					</div>
					@if(Auth::check() && Auth::user()->id === $comment->user->id)
						<div class="text-center text-md-right">
							<p>
								<button type="button" class="btn btn-info" data-toggle="modal"
										data-target="#exampleModal" data-whatever="{{$comment->id}}">
									Change Your Review
								</button>
							</p>
						</div>
					@endif
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


	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Changing your review</h5>
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
					<button type="button" id="confirm-delete" class="btn btn-info">Confirm Change</button>
				</div>
			</div>
		</div>
	</div>





	<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript">
        let comment_count = "{{count($post->comment->where('status', 1))}}",
            comment_count_int = parseInt(comment_count);

        $(document).ready(function () {
            $("#rating-1").click(function () {
				$(".rating-color").removeClass("text-primary").removeClass("text-success")
					.removeClass("text-secondary").removeClass("text-warning").addClass("text-danger");

                $("#icon-rating-1").removeClass("far").addClass("fas");
                $("#icon-rating-2").removeClass("fas").addClass("far");
                $("#icon-rating-3").removeClass("fas").addClass("far");
                $("#icon-rating-4").removeClass("fas").addClass("far");
                $("#icon-rating-5").removeClass("fas").addClass("far");
                $("#rating-input").val(1);
            });
            $("#rating-2").click(function () {
                $(".rating-color").removeClass("text-primary").removeClass("text-success")
                    .removeClass("text-secondary").removeClass("text-danger").addClass("text-warning");

                $("#icon-rating-1").removeClass("far").addClass("fas");
                $("#icon-rating-2").removeClass("far").addClass("fas");
                $("#icon-rating-3").removeClass("fas").addClass("far");
                $("#icon-rating-4").removeClass("fas").addClass("far");
                $("#icon-rating-5").removeClass("fas").addClass("far");
                $("#rating-input").val(2);
            });
            $("#rating-3").click(function () {
                $(".rating-color").removeClass("text-primary").removeClass("text-success")
                    .removeClass("text-danger").removeClass("text-warning").addClass("text-secondary");

                $("#icon-rating-1").removeClass("far").addClass("fas");
                $("#icon-rating-2").removeClass("far").addClass("fas");
                $("#icon-rating-3").removeClass("far").addClass("fas");
                $("#icon-rating-4").removeClass("fas").addClass("far");
                $("#icon-rating-5").removeClass("fas").addClass("far");
                $("#rating-input").val(3);
            });
            $("#rating-4").click(function () {
                $(".rating-color").removeClass("text-primary").removeClass("text-danger")
                    .removeClass("text-secondary").removeClass("text-warning").addClass("text-success");

                $("#icon-rating-1").removeClass("far").addClass("fas");
                $("#icon-rating-2").removeClass("far").addClass("fas");
                $("#icon-rating-3").removeClass("far").addClass("fas");
                $("#icon-rating-4").removeClass("far").addClass("fas");
                $("#icon-rating-5").removeClass("fas").addClass("far");
                $("#rating-input").val(4);
            });
            $("#rating-5").click(function () {
                $(".rating-color").removeClass("text-danger").removeClass("text-success")
                    .removeClass("text-secondary").removeClass("text-warning").addClass("text-primary");

                $("#icon-rating-1").removeClass("far").addClass("fas");
                $("#icon-rating-2").removeClass("far").addClass("fas");
                $("#icon-rating-3").removeClass("far").addClass("fas");
                $("#icon-rating-4").removeClass("far").addClass("fas");
                $("#icon-rating-5").removeClass("far").addClass("fas");
                $("#rating-input").val(5);
            });
        });


        $("#submit_comment").click(function (e) {
            e.preventDefault();
            let content = editor.getData(),
                rating = $("input[name = rating]").val(),
                _token = $("input[name = _token]").val(),
                avatar_link = "{{asset('/images/avatar.png')}}";
               if(content != '' && rating != 0){
                   $.ajax({
                       type: "POST",
                       url: "{{asset('/post_comment_ajax/')}}/" + "{{$post->id}}",
                       data: {content: content, _token: _token, rating: rating},
                       success: function (data) {
                           comment_count_int++;
                           CKEDITOR.instances.content.setData('');
                           $("#icon-rating-1").removeClass("fas").addClass("far");
                           $("#icon-rating-2").removeClass("fas").addClass("far");
                           $("#icon-rating-3").removeClass("fas").addClass("far");
                           $("#icon-rating-4").removeClass("fas").addClass("far");
                           $("#icon-rating-5").removeClass("fas").addClass("far");
                           $("#rating-input").val(0);
                           $("#comment-form").removeClass("d-flex").addClass("d-none");
                           let notify_id = "notify_comment" + comment_count_int.toString();
                           let comment_with_notify_append = $(
                               "<li class=\"alert alert-primary text-left text-sm-center p-2\" id=\"" + notify_id + "\">" +
                               "   <i class=\"fas fa-check-circle\"></i> Comment Post Successful" +
                               "</li>" +
                               "<li class=\"comment\"  id=\"comment" + data.comment_id + "\">" +
                               "   <div class=\"vcard\">" +
                               "       <img src=\" " + avatar_link + " \" alt=\"Image placeholder\">" +
                               "   </div>" +
                               "   <div class=\"comment-body\">" +
                               "       <h3>" + "@if(Auth::check()){{ Auth::user()->name}}@endif" + "</h3>" +
                               "       <div class=\"meta\">" + data.created_at + "</div>" +
                               "       <div class=\"comment-body-content\"><p>" + content + "</p></div>" +
                               "		<div class=\"comment-body-content\">" +
                               "			<a class=\"  " +

                               (rating == 1? "text-danger":rating == 2?
                                   "text-warning":rating == 3? "text-secondary":rating == 4? "text-success":"text-primary") +

                               "\"  >" +
                               "				<i id=\"icon-rated-1\" class=\" " +
                               (rating > 0? "fas" : "far" ) +
                               " 				fa-star\"></i>" +
                               "			</a>" +
                               "			<a class=\"  " +

                               (rating == 1? "text-danger":rating == 2?
                                   "text-warning":rating == 3? "text-secondary":rating == 4? "text-success":"text-primary") +

                               "\"  >" +
                               "				<i id=\"icon-rated-2\" class=\" " +
                               (rating > 1? "fas" : "far" ) +
                               " 				fa-star\"></i>" +
                               " 			</a>" +
                               "			<a class=\"  " +

                               (rating == 1? "text-danger":rating == 2?
                                   "text-warning":rating == 3? "text-secondary":rating == 4? "text-success":"text-primary") +

                               "\"  >" +
                               "				<i id=\"icon-rated-3\" class=\" " +
                               (rating > 2? "fas" : "far" ) +
                               " 				fa-star\"></i>" +
                               " 			</a>" +
                               "			<a class=\"  " +

                               (rating == 1? "text-danger":rating == 2?
                                   "text-warning":rating == 3? "text-secondary":rating == 4? "text-success":"text-primary") +

                               "\"  >" +
                               "				<i id=\"icon-rated-4\" class=\" " +
                               (rating > 3? "fas" : "far" ) +
                               " 				fa-star\"></i>" +
                               " 			</a>" +
                               "			<a class=\"  " +

                               (rating == 1? "text-danger":rating == 2?
                                   "text-warning":rating == 3? "text-secondary":rating == 4? "text-success":"text-primary") +

                               "\"  >" +
                               "				<i id=\"icon-rated-5\" class=\" " +
                               (rating > 4? "fas" : "far" ) +
                               " 				fa-star\"></i>" +
                               " 			</a>" +
                               "		</div>" +
                               "		<div class=\"comment-body-content text-right\">" +
                               "			<p>" +
                               "				<button type=\"button\" class=\"btn btn-secondary\" data-toggle=\"modal\"" +
                               "					data-target=\"#exampleModal\" data-whatever=\"" + data.comment_id + "\">" +
                               "					Change Your Review" +
                               "				</button>" +
                               "			</p>" +
                               "		</div>" +
                               "   </div>" +
                               "</li>"
                           ).hide();


                           $(".comment-list").prepend(
                               comment_with_notify_append
                           );
                           $(".comment-list-count").text(comment_count_int.toString());
                           $(".comment-list-count-top").text(comment_count_int.toString());
                           comment_with_notify_append.fadeIn(1500);


                           setTimeout(
                               function () {
                                   $("#" + notify_id + "").fadeOut();
                                   setTimeout(
                                       function () {
                                           $("#" + notify_id + "").remove();
                                       }, 1000);
                               }, 5000);
                       }
                   })
			   }

        });
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
                    $("#comment-form").removeClass("d-none").addClass("d-flex");
                    CKEDITOR.instances.content.setData(data.comment_content);

                    $("#rating-input").val(data.comment_rating);
                    if (data.comment_rating > 0) {
                        $("#icon-rating-1").removeClass("far").addClass("fas");
                    } else {
                        $("#icon-rating-1").removeClass("fas").addClass("far");
                    }

                    if (data.comment_rating > 1) {
                        $("#icon-rating-2").removeClass("far").addClass("fas");
                    } else {
                        $("#icon-rating-2").removeClass("fas").addClass("far");
                    }

                    if (data.comment_rating > 2) {
                        $("#icon-rating-3").removeClass("far").addClass("fas");
                    } else {
                        $("#icon-rating-3").removeClass("fas").addClass("far");
                    }

                    if (data.comment_rating > 3) {
                        $("#icon-rating-4").removeClass("far").addClass("fas");
                    } else {
                        $("#icon-rating-4").removeClass("fas").addClass("far");
                    }

                    if (data.comment_rating > 4) {
                        $("#icon-rating-5").removeClass("far").addClass("fas");
                    } else {
                        $("#icon-rating-5").removeClass("fas").addClass("far");
                    }

                    $('.modal').modal('toggle');
                },
            });
			@endif
        });
        let editor = CKEDITOR.replace('content');
        CKEDITOR.config.skin = 'minimalist';
        CKEDITOR.config.extraPlugins = 'autogrow';
        CKEDITOR.config.height = 70;
        CKEDITOR.config.contentsCss = '{{asset("/css/ckeditor.css")}}';
        CKEDITOR.config.resize_enabled = false;
		@endif
	</script>
	<style type="text/css">
		.cke_top, .cke_bottom {
			display: none !important;
		}

		.cke_chrome {
			border-top: transparent !important;
		}
	</style>
@endsection
