@extends('layouts.frontend')
@section('content-title')
	<div class="row mb-4">
		<div class="col-md-6">
			<h2 class="mb-4"><i class="fas fa-user-edit"></i> Edit Profile</h2>
		</div>
	</div>
@endsection
@section('content')
	<div class="col-md-12 col-lg-8 main-content">
		<form class="row about-content needs-validation" enctype="multipart/form-data" method="post"
			  action="{{asset('/save_profile')}}" novalidate>
			@csrf
			<div class="col-md-12 text-center text-lg-left about-cover" id="target-cover"
				style="background: url('{{Auth::user()->cover != null ?
						asset(Auth::user()->cover) :
						'https://via.placeholder.com/1500x800/62b1f6/FFFFFF?text=%20'}}')">
				<label for="cover" class="btn btn-dark btn-sm change-cover-btn" style="cursor: pointer">
					Change Cover
				</label>
				<input type="file" class="custom-file-input d-none" id="cover" name="cover" onchange="readURL2(this);">

				<div class="about-avatar d-block d-lg-inline-block">
					<label for="avatar">
						<img id="target-avatar" style="background: #fff; cursor: pointer"
						src="{{Auth::user()->avatar != null ? asset(Auth::user()->avatar) :
						'https://via.placeholder.com/400/FFFFFF/62b1f6?text=Choose Avatar'}}"
							 alt="Avatar" class="img-fluid">
					</label>
					<input type="file" class="custom-file-input d-none"
						id="avatar" name="avatar" onchange="readURL(this);">
					<div class="about-name d-block d-lg-inline-block">
						<h2 class="mb-0">
							@if(strlen(Auth::user()->name) > 15)
								{{substr(Auth::user()->name, 0, 15)}} ...
							@else
								{{Auth::user()->name}}
							@endif
						</h2>
					</div>
				</div>
			</div>
			<div class="col-md-12 edit-main">
				<div class="form-row mx-0">
					<div class="col-md-3 form-group">
						<label for="firstName">First Name</label>
						<input type="text" class="form-control" id="firstName" name="firstName"
							value="{{Auth::user()->firstName != null ? Auth::user()->firstName : ""}}">
					</div>
					<div class="col-md-3 form-group">
						<label for="lastName">Last Name</label>
						<input type="text" class="form-control" id="lastName" name="lastName"
							   value="{{Auth::user()->lastName != null ? Auth::user()->lastName : ""}}">
					</div>
					<div class="col-md-6 form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email"
							   value="{{Auth::user()->email != null? Auth::user()->email : ""}}" required>
						<div class="valid-feedback">
							Looks good!
						</div>
						<div class="invalid-feedback">
							Please provide an email.
						</div>
					</div>
					<div class="col-md-5 form-group select-wrapper">
						<label for="exampleFormControlSelect2">Country</label>
						<select class="selectpicker form-control select-form" id="exampleFormControlSelect2"
								data-live-search="true" name="country">
							<option value=" ">__________________________</option>
							@foreach($lsCountries as $i => $country)
								@if(Auth::user()->country_id != null)
									<option value="{{$country->id}}" {{Auth::user()->country_id == $country->id?
										'selected':''}}>
										{{$country->nicename}} - {{$country->iso}}
									</option>
								@else
									<option value="{{$country->id}}">
										{{$country->nicename}} - {{$country->iso}}
									</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="col-md-3 form-group">
						<label for="phoneCode">Ph.Code</label>
						<input type="text" class="form-control text-right border-primary bg-white"
							   id="phoneCode" readonly style="cursor: not-allowed"
							   value="{{Auth::user()->country_id != null?
							   "+".Auth::user()->country->phonecode : null}}">
					</div>
					<div class="col-md-4 form-group">
						<label for="validationCustom06">Phone Number</label>
						<input type="number" class="form-control" id="validationCustom06"
							   value="{{Auth::user()->phone}}" step="1" minlength="5" name="phone">
						<div class="valid-feedback">
							Looks good!
						</div>
						<div class="invalid-feedback">
							Please provide a phone number.
						</div>
					</div>
				</div>
				<div class="form-row mx-0">
					<div class="col-md-12 form-group">
						<label for="desc">Description <small> (max 700 char)</small>:</label>
						<textarea class="form-control" id="desc" name="desc" maxlength="700"
							style="min-height: 160px"
							>@if(Auth::user()->desc != null){!!Auth::user()->desc!!}@endif
						</textarea>
					</div>
				</div>
				<div class="form-row mx-0">
					<div class="col-md-12 form-group text-right">
						<input class="btn-success btn" type="submit" value="Save Changes">
					</div>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
        $('#exampleFormControlSelect2').on('change', function (e) {
            let country_selected_id = $(this).find("option:selected").val();
            $.ajax({
                type: 'GET',
                url: "{{asset('/get_country_selected_phone_code')}}",
                data: {country_selected_id: country_selected_id},
                success: function (data) {
                    $("#phoneCode").val("+" + data.country_selected_phone_code);
                }
            });
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#target-avatar').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL2(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#target-cover').css('background', 'url(\"' + e.target.result + '\")');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                let forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                let validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
	</script>
@endsection


