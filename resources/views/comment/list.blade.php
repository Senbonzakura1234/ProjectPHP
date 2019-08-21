@extends('layouts.app2')

@section('content')
    <div class="text-center my-5">
        <div class="col">
            <h2>Comment Management</h2>
        </div>
    </div>
    <div class="row mt-5">
        @foreach($lsComment as $comment)
            <div class="mb-4 col-12 ">
                <div class="card @if($comment->status === 1) text-white bg-success @else bg-light @endif"
                     id="comment{{$comment->id}}"
                     style="border-radius: 10px">
                    <div class="card-header">
                        Comment ID: {{$comment->id}} &bull; {{$comment->name}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{!!$comment->content!!}</p>
                    </div>
                    <div class="card-footer">
                        <small class="card-subtitle mb-2">
                            <span class="d-inline-block">
                                {{date('M d Y - H:i:s', strtotime($comment->created_at))}} &bull;
                            </span>
                            <span class="status d-inline-block">
                                @if($comment->status === 1)
                                    Status: Show
                                @else
                                    Status: Hide
                                @endif
                            </span>
{{--                            &bull;--}}
{{--                            <span class="d-inline-block">Post id: {{$comment->post->id}} &bull;</span>--}}
{{--                            <span class="d-inline-block">--}}
{{--								{{asset('/admin/commentByProperties/post/'.$comment->post->id)}}--}}
{{--                                <a href="#">--}}
{{--                                    Same Game--}}
{{--                                </a>--}}
{{--                            </span>--}}
                            &bull;
                            <span class="d-inline-block">Comment in: &nbsp;
								@if($comment->post_id != null)
									{{asset('/view_post/'.$comment->post->id)}}
									<a href="" class="card-link">
										{{substr($comment->post->title, 0, 15)}} ...
									</a>
								@else

								@endif
                            </span>
                        </small>
                        <button class="@if($comment->status === 1) btn btn-danger @else btn btn-primary @endif
                            mt-4 mt-md-3 mt-lg-0 float-right" data-toggle="modal"
                                data-target="#exampleModal" data-whatever="{{$comment->id}}">
                            Change Status
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-5 row">
        <div class="mx-auto">
            {{$lsComment->links()}}
        </div>
    </div>
    <div class="row" style="display: none" id="countPageAlert">
        <div class="alert alert-danger text-center mx-auto">
            Please type valid page number
        </div>
    </div>
    <div class="row">
        <small class="text-muted ml-auto">
            Current page : {{$lsComment->currentPage()}} / {{$countPage}}
        </small>
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <input type="hidden" name="comment_id" id="comment_id"/>
                        <div class="form-group">
                            <label for="comment_status">Status: </label>
                            <select class="form-control select-form"
                                    id="comment_status" name="comment_status">
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="button" id="btn-change-status" class="btn btn-danger">Confirm Change</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget); // Button that triggered the modal
            let comment_id = button.data('whatever'); // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            let modal = $(this);
            modal.find('.modal-title').text('Comment No.' + comment_id);
            modal.find('.modal-body #comment_id').val(comment_id);
        });
        $('#btn-change-status').click(function (e) {
            e.preventDefault();
            let comment_id = $("#comment_id").val(),
                _token = $("input[name='_token']").val(),
                comment_status = $("#comment_status").val();
            $.ajax({
                type: 'POST',
                url: "{{asset('/admin/change_comment_status_ajax')}}",
                data: {comment_id: comment_id, comment_status: comment_status, _token: _token},
                success: function (data) {
                    if (comment_status == 1) {
                        $('#comment' + comment_id).addClass("text-white").addClass("bg-success").removeClass("bg-light");
                        $('#comment' + comment_id).find(".status").text("Status: Show");
                        $('#comment' + comment_id).find(".btn").addClass("btn-danger").removeClass("btn-primary");
                    } else if (comment_status == 0) {
                        $('#comment' + comment_id).addClass("bg-light").removeClass("text-white").removeClass("bg-success");
                        $('#comment' + comment_id).find(".status").text("Status: Hide");
                        $('#comment' + comment_id).find(".btn").addClass("btn-primary").removeClass("btn-danger");
                    }
                    $('.modal').modal('toggle');
                },
            })
        });
        $(document).ready(function () {
            let appendToLink = "<li class=\"page-item\">\n" +
                "   <div>\n" +
                "       <form id=\"goToForm\">\n" +
                "           <div class=\"form-group row\">\n" +
                "               <label class=\"d-none\" for=\"page\">Page</label>\n" +
                "               <div class=\"col\">\n" +
                "                   <input class=\"form-control mx-auto text-center\" id=\"page\" name=\"page\"\n" +
                "                   value=\"{{$lsComment->currentPage()}}\" type=\"number\" style=\"width: 50px\"/>\n" +
                "               </div>\n" +
                "           </div>\n" +
                "       </form>\n" +
                "   </div>\n" +
                "   <div>\n" +
                "       <button class=\"btn-primary btn\" id=\"goToPage\">\n" +
                "           Go to Page\n" +
                "       </button>\n" +
                "   </div>\n" +
                "</li>"
            ;
            $(".pagination li:first-child").css("margin-right", "5px").find(".page-link").text("« Prev");
            $(".pagination li:last-child").css("margin-left", "5px").before(appendToLink);
            $("#goToForm").submit(function (e) {
                e.preventDefault(e);
                let pageToGo1 = $("#page").val(),
                    maxPage = parseInt('{{$countPage}}'),
                    link = '{{asset("/admin/comment?page=")}}' + pageToGo1;
                if (pageToGo1 > maxPage || pageToGo1 < 1) {
                    $("#countPageAlert").slideDown();
                } else {
                    window.location.href = link;
                    return false;
                }
            });
            $('#goToPage').click(function () {
                let pageToGo2 = $("#page").val(),
                    maxPage2 = parseInt('{{$countPage}}'),
                    link2 = '{{asset("/admin/comment?page=")}}' + pageToGo2;
                if (pageToGo2 > maxPage2 || pageToGo2 < 1) {
                    $("#countPageAlert").slideDown();
                } else {
                    window.location.href = link2;
                    return false;
                }
            });
        });
    </script>
@endsection
