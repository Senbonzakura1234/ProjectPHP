@extends('layouts.app')

@section('content')
    <div class="row">
        <form class="col-12 my-auto" enctype="multipart/form-data" method="post"
              action="{{route('post.store')}}"
              style="border-radius: 15px" >
			@method('POST')
            @csrf
            <div class="form-group text-center mb-3">
                <h2>Create New Game</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-lg-8">
                    <label for="postname">Game Name</label>
                    <input type="text" id="postname" name="title"
                           class="form-control" placeholder="Post"/>

                    <label class="mt-2" for="exampleFormControlSelect2">Category</label>
                    <select multiple class="form-control select-form" id="exampleFormControlSelect2" name="category[]">
                        @foreach($lsCate as $i => $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>

                    <label class="mt-2" for="exampleFormControlSelect2">Brand</label>
                    <select multiple class="form-control select-form" id="exampleFormControlSelect2" name="tag[]">
                        @foreach($lsTag as $i => $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 ml-auto col-lg-3">
                    <div>
                        <label>Post Cover</label>
                        <input type="file" class="custom-file-input d-none" id="validatedCustomFile"
                               name="cover" onchange="readURL(this);">
                        <label class="d-flex mx-auto my-auto hover-image-upload-relative" for="validatedCustomFile"
                               style="max-width: 100%; border-radius: 10px">
                            <img class="mx-auto" id="blah" src="https://via.placeholder.com/800x534?text=No+Image"
                                 alt="placeHolder" style="max-width: 100%; border-radius: 10px">
                            <div class="hover-image-upload row m-0">
                                <i class="fas fa-plus-circle my-auto mx-auto d-flex"></i>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

			<div class="form-row">
				<div class="form-group col-12 col-md-6">
					<label for="price">Price</label>
					<input class="form-control" name="price" id="price" type="number" step="any" min="0"/>
				</div>
				<div class="form-group col-12 col-md-6">
					<label for="discount">Discount</label>
					<input class="form-control" name="discount"
						   id="discount" type="number" step="any" min="0" max="100"/>
				</div>
			</div>

            <div class="form-group">
                <label for="editor">Content</label>
                <textarea class="form-control" name="content" id="editor">
                </textarea>
            </div>

            <div class="form-group text-center">
                <input id="form-submit" class="btn btn-dark" type="submit" value="Create" style="width: 100%">
                <div>
                    <p>Return to <a href="{{route('post.index')}}">dashboard</a></p>
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
                    $('#blah').attr('src', e.target.result);
                    $('.hover-image-upload').find('.fa-plus-circle').removeClass('.fa-plus-circle').addClass('fa-edit')
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
