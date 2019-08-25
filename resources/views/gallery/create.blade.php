@extends('layouts.app2')

@section('content')
	<div class="row">
		<form class="col-12 my-auto" enctype="multipart/form-data" method="post"
			  action="{{route('gallery.store')}}"  style="border-radius: 15px" id="upload-image-form">
			@method('POST')
			@csrf
			<div class="form-group text-center mb-3">
				<h2>Upload Galleries</h2>
			</div>
			<div class="form-row">
				<div class="col-12 text-right">
					<button class="btn-dark btn ml-auto" type="submit">
						<i class="fas fa-upload"></i> Upload Images
					</button>
				</div>
				<div class="form-group col-12">
					<label for="galleryType">Gallery Type</label>
					<select class="form-control select-form" id="galleryType"
							name="type" required>
						<option></option>
						<option value="1">Game</option>
						<option value="2">DLC</option>
					</select>
				</div>
			</div>
			<div class="form-row" id="formShow" style="display: none">
				<div id="form-game-show" class="form-group col-12" style="display: none">
					<label class="mt-2" for="listGame">Game</label>
					<select class="form-control select-form"  id="listGame"
							data-live-search="true" name="post">
						<option></option>
						@foreach($lsPost as $i => $post)
							<option value="{{$post->id}}">{{$post->title}}</option>
						@endforeach
					</select>
				</div>
				<div id="form-dlc-show" class="form-group col-12" style="display: none">
					<label class="mt-2" for="listDLC">DLC</label>
					<select class="form-control select-form"  id="listDLC"
							data-live-search="true" name="dlc">
						<option></option>
						@foreach($lsDlc as $i => $dlc)
							<option value="{{$dlc->id}}">{{$dlc->title}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-12">
					<div class="custom-file">
						<label class="custom-file-label" for="gallery-photo-add">Upload</label>
						<input type="file" class="custom-file-input"  multiple name="gallery[]" id="gallery-photo-add"
						required>
					</div>
				</div>
				<div class="form-group col-12 gallery">
				</div>
			</div>
		</form>

	</div>
	<script type="text/javascript">
        $(function() {
            $(function() {
                $('#galleryType').change(function(){
					if($('#galleryType').val() == 2){
						$('#form-game-show').hide();
						$('#form-game-show').find("option:selected").removeAttr("selected");
						$('#form-dlc-show').show();
						$('#formShow').show();
					}else if($('#galleryType').val() == 1){
						$('#form-dlc-show').hide();
						$('#form-dlc-show').find("option:selected").removeAttr("selected");
						$('#form-game-show').show();
						$('#formShow').show();
					}else if($('#galleryType').val() == 0){
						$('#form-dlc-show').hide();
						$('#form-dlc-show').find("option:selected").removeAttr("selected");
						$('#form-game-show').hide();
						$('#form-game-show').find("option:selected").removeAttr("selected");
						$('#formShow').hide();
					}
                });
            });




            // Multiple images preview in browser
            let imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    let filesAmount = input.files.length;

                    for (let i = 0; i < filesAmount; i++) {
                        let reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        };

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery-photo-add').on('change', function() {
                $(".gallery").empty();
                imagesPreview(this, 'div.gallery');
            });
        });
	</script>
	<style type="text/css">
		.gallery img{
			max-width: 50% !important;
			padding: 1em;
			border-radius: 10px;
		}
		@media (max-width: 767px) {
			.gallery img{
				max-width: 100% !important;
			}
		}
	</style>
@endsection
