@extends('layouts.frontend')
@section('content-title')
	<div class="row mb-4">
		<div class="col-md-6">
			<h2 class="mb-4"><i class="fas fa-cash-register"></i> Checkout</h2>
		</div>
	</div>
@endsection
@section('content')
	<div class="col-md-12 col-lg-8 main-content">
		<form class="needs-validation my-4" novalidate>
			<h4>Payment Method</h4>
			<div class="form-row">
				<div class="col-md-6 mb-3 form-group select-wrapper">
					<label for="exampleFormControlSelect1">Please select a payment method</label>
					<select class="selectpicker form-control select-form" id="exampleFormControlSelect1" required>
						<option value="">____________________________</option>
						<option value="1">MasterCard</option>
						<option value="2">Visa</option>
						<option value="3">American Express</option>
						<option value="4">Discover Network</option>
					</select>
				</div>
				<div class="col-md-6 mb-3 payment-method form-group text-center">
					<a href="https://www.paypal.com/webapps/mpp/paypal-popup">
						<img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_SbyPP_mc_vs_dc_ae.jpg"
							 alt="PayPal Acceptance Mark" style="max-width: 100%">
					</a>
				</div>
				<div class="col-md-4 mb-3 form-group">
					<label for="validationCardNumber">Card number</label>
					<input type="number" class="form-control" id="validationCardNumber"
						   placeholder="Card Number" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a Card number.
					</div>
				</div>
				<div class="col-md-3 mb-3 form-group select-wrapper">
					<label for="formControlExpireMonth">Expire Month</label>
					<select class="selectpicker form-control select-form" id="formControlExpireMonth" required>
						<option value="">_______</option>
						@for($j = 1; $j < 13; $j++)
							<option value="{{$j}}">{{$j<10? "0".$j:$j}}</option>
						@endfor
					</select>
				</div>
				<div class="col-md-3 mb-3 form-group select-wrapper">
					<label for="formControlExpireYear">Expire Year</label>
					<select class="selectpicker form-control select-form" id="formControlExpireYear" required>
						<option value="">_______</option>
						@for($k = now()->format('y'); $k < 45; $k++)
							<option value="20{{$k}}">20{{$k}}</option>
						@endfor
					</select>
				</div>
				<div class="col-md-2 mb-3 form-group">
					<label for="formControlSecret">Secret</label>
					<input type="number" class="form-control" id="formControlSecret"
						   placeholder="Secret" step="1" min="100" max="999" maxlength="3" minlength="3" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide Secret number.
					</div>
				</div>
			</div>
			<h4>Billing Information</h4>
			<div class="form-row">
				<div class="col-md-4 mb-3 form-group">
					<label for="validationCustom01">First name</label>
					<input type="text" class="form-control" id="validationCustom01" placeholder="First name"
						   value="Mark" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide your First name.
					</div>
				</div>
				<div class="col-md-4 mb-3 form-group">
					<label for="validationCustom02">Last name</label>
					<input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto"
						   required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide your Last name.
					</div>
				</div>
				<div class="col-md-4 mb-3 form-group">
					<label for="validationCustomEmail">Email</label>
					<input type="email" class="form-control" id="validationCustomEmail" placeholder="Email" value="Otto"
						   required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide your Email.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-3 form-group">
					<label for="validationCustom03">City</label>
					<input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a valid city.
					</div>
				</div>
				<div class="col-md-3 mb-3 form-group">
					<label for="validationCustom04">State</label>
					<input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a valid state.
					</div>
				</div>
				<div class="col-md-3 mb-3 form-group">
					<label for="validationCustom05">Zip</label>
					<input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a valid zip.
					</div>
				</div>
				<div class="col-md-6 mb-3 form-group">
					<label for="validationAddress">Billing address</label>
					<input type="text" class="form-control" id="validationAddress"
						   placeholder="Billing address" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a Billing address.
					</div>
				</div>
				<div class="col-md-6 mb-3 form-group">
					<label for="validationAddress2">Billing address, line 2</label>
					<input type="text" class="form-control" id="validationAddress2" placeholder="Billing address">
				</div>
				<div class="col-md-6 mb-3 select-wrapper form-group">
					<label for="exampleFormControlSelect2">Country</label>
					<select class="selectpicker form-control select-form" id="exampleFormControlSelect2"
							data-live-search="true" required>
						<option value=" ">____________________________</option>
						@foreach($lsCountries as $i => $country)
							<option value="{{$country->id}}">
								{{$country->nicename}} - {{$country->iso}}
							</option>
						@endforeach
					</select>
				</div>
				<div class="col-4 col-md-2 mb-3 form-group">
					<label for="phoneCode">Ph.Code</label>
					<input type="text" class="form-control text-right border-primary
						bg-white" id="phoneCode" readonly style="cursor: not-allowed">
				</div>
				<div class="col-md-4 mb-3 form-group">
					<label for="validationCustom06">Phone Number</label>
					<input type="number" class="form-control" id="validationCustom06"
						   placeholder="Phone Number" required step="1" minlength="5">
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a phone number.
					</div>
				</div>
			</div>
{{--			<div class="form-group">--}}
{{--				<div class="custom-control custom-checkbox">--}}
{{--					<input class="custom-control-input" type="checkbox" value="" id="saveMethodCheck">--}}
{{--					<label class="custom-control-label" for="saveMethodCheck" style="position: relative">--}}
{{--						Save my payment information so checkout is easy next time--}}
{{--					</label>--}}
{{--				</div>--}}
{{--			</div>--}}
			<div class="form-group text-center text-md-right">
				<button class="btn btn-success" type="submit" style="width: 20%; min-width: 200px">
					Continue
				</button>
			</div>
		</form>

		<script>
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
            (function(seconds) {
                let refresh,
                    intvrefresh = function() {
                        clearInterval(refresh);
                        refresh = setTimeout(function() {
                            location.href = location.href;
                        }, seconds * 1000);
                    };

                $(document).on('keypress click', function() { intvrefresh() });
                intvrefresh();

            }(2100)); // define here seconds

            // Example starter JavaScript for disabling form submissions if there are invalid fields
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
	</div>
@endsection


