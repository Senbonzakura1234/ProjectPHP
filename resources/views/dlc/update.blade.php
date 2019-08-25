@extends('layouts.app2')

@section('content')
    <div class="row">
        <form class="col-12 my-auto" enctype="multipart/form-data" method="post"
              action="{{route('dlc.update', $dlc->id)}}"
              style="border-radius: 15px" >
			@method('PUT')
            @csrf
            <div class="form-group text-center mb-3">
                <h2>Update</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-lg-8">
                    <label for="dlcname">DLC Name</label>
                    <input type="text" id="dlcname" name="title"
                           class="form-control" value="{{$dlc->title}}" placeholder="dlc"/>
					<label class="mt-2" for="exampleFormControlSelect2">Game</label>
					<select class="form-control select-form"  id="exampleFormControlSelect2"
							data-live-search="true" name="post">
						@foreach($lsPost as $i => $post)
							<option value="{{$post->id}}"
							{{($post->id == $dlc->post_id)  ? 'selected' : ''}}
							>{{$post->title}}</option>
						@endforeach
					</select>

{{--                    <label class="mt-2" for="exampleFormControlSelect2">Tag</label>--}}
{{--                    <select multiple class="form-control select-form" id="exampleFormControlSelect2" name="tag[]">--}}
{{--                        @foreach($lsTag as $i => $tag)--}}
{{--                            <option value="{{$tag->id}}"--}}
{{--                                {{in_array($tag->id, $lsSelectedTagID) ? 'selected' : ''}}--}}
{{--                            >{{$tag->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
                </div>
                <div class="form-group col-12 ml-auto col-lg-3">
                    <div>
                        <label>DLC Cover</label>
                        <input type="file" class="custom-file-input d-none" id="validatedCustomFile"
                               name="cover" onchange="readURL(this);">
                        <label class="d-flex mx-auto my-auto hover-image-upload-relative" for="validatedCustomFile"
                               style="max-width: 100%; border-radius: 10px">
                            <img class="mx-auto" id="blah" src="{{asset($dlc->cover)}}"
                                 alt="placeHolder" style="max-width: 100%; border-radius: 10px">
                            <div class="hover-image-upload row m-0">
                                <i class="fas fa-edit my-auto mx-auto d-flex"></i>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
			<div class="form-row">
				<div class="form-group col-12">
					<label>Select platform compatible</label>
				</div>
				<div class="form-group col-12 col-lg-4">
					<label for="exampleFormControlSelectWindows">Windows</label>
					<select class="form-control select-form" id="exampleFormControlSelectWindows"
							name="windows" required>
						<option></option>
						<option value="1" {{$dlc->windows != 0? 'selected':''}}>Available</option>
						<option value="0" {{$dlc->windows != 1? 'selected':''}}>Not Available</option>
					</select>
				</div>
				<div class="form-group col-12 col-lg-4">
					<label for="exampleFormControlSelectXbox">Xbox</label>
					<select class="form-control select-form" id="exampleFormControlSelectXbox"
							name="xbox" required>
						<option></option>
						<option value="1" {{$dlc->xbox != 0? 'selected':''}}>Available</option>
						<option value="0" {{$dlc->xbox != 1? 'selected':''}}>Not Available</option>
					</select>
				</div>
				<div class="form-group col-12 col-lg-4">
					<label for="exampleFormControlSelectPlaystation">Playstation</label>
					<select class="form-control select-form" id="exampleFormControlSelectPlaystation"
							name="playstation" required>
						<option></option>
						<option value="1" {{$dlc->playstation != 0? 'selected':''}}>Available</option>
						<option value="0" {{$dlc->playstation != 1? 'selected':''}}>Not Available</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-12 col-md-6">
					<label for="price">Price</label>
					<input name="price" class="form-control" value="{{$dlc->price}}"
						   id="price" type="number" step="any" min="0"/>
				</div>
				<div class="form-group col-12 col-md-6">
					<label for="discount">Discount</label>
					<input name="discount" value="{{$dlc->discount}}" id="discount" class="form-control"
						   type="number" step="any" min="0" max="100"/>
				</div>
			</div>

            <div class="form-group">
                <label for="editor">Content</label>
                <textarea class="form-control" name="content" id="editor">
                    {!! $dlc->content !!}
                </textarea>
            </div>

            <div class="form-group text-center">
                <input id="form-submit" class="btn btn-dark" type="submit" value="Update" style="width: 100%">
                <div>
                    <p>Return to <a href="{{route('dlc.index')}}">dashboard</a></p>
                </div>
            </div>
        </form>
    </div>
    <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        let options = {
            filebrowserImageBrowseUrl: "{{asset('/laravel-filemanager?type=Images')}}",
            filebrowserImageUploadUrl: "{{asset('/laravel-filemanager/upload?type=Images')}}&_token=" + "{{csrf_token()}}",
            filebrowserBrowseUrl: "{{asset('/laravel-filemanager?type=Files')}}",
            filebrowserUploadUrl: "{{asset('/laravel-filemanager/upload?type=Files')}}&_token=" + "{{csrf_token()}}"
        };
        let newWindowWidth = $(window).width(),
            newWindowHeight= $(window).height(),
            newMinHeight1 = newWindowHeight - 582,
            newMinHeight2 = newWindowHeight - 512,
            newMinHeight3 = newWindowHeight - 452;
        CKEDITOR.replace( 'content', options );
        CKEDITOR.config.extraPlugins = 'autogrow';
        CKEDITOR.config.autoGrow_maxHeight = 1000;
        if (newWindowWidth < 400) {
            CKEDITOR.config.height= newMinHeight1;
            CKEDITOR.config.autoGrow_minHeight = newMinHeight1;
        }else if(newWindowWidth < 767 && newWindowWidth >= 400){
            CKEDITOR.config.height= newMinHeight2;
            CKEDITOR.config.autoGrow_minHeight = newMinHeight2;
        }else{
            CKEDITOR.config.height= newMinHeight3;
            CKEDITOR.config.autoGrow_minHeight = newMinHeight3;
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
