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
		<form class="needs-validation" novalidate>
			<h4>Billing Information</h4>
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label for="validationCustom01">First name</label>
					<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide your First name.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="validationCustom02">Last name</label>
					<input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide your Last name.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="validationCustomEmail">Email</label>
					<input type="email" class="form-control" id="validationCustomEmail" placeholder="Email" value="Otto" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide your Email.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label for="validationCustom03">City</label>
					<input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a valid city.
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label for="validationCustom04">State</label>
					<input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a valid state.
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label for="validationCustom05">Zip</label>
					<input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a valid zip.
					</div>
				</div>
				<div class="col-md-6 mb-3">
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
				<div class="col-md-6 mb-3">
					<label for="validationAddress2">Billing address, line 2</label>
					<input type="text" class="form-control" id="validationAddress2" placeholder="Billing address">
				</div>
				<div class="col-md-3 mb-3">
					<label for="validationCustom06">Phone</label>
					<input type="text" class="form-control" id="validationCustom06" placeholder="Phone" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a valid zip.
					</div>
				</div>
				<div class="col-md-3 mb-3">

				</div>
			</div>
			<div class="form-group">
				<div class="custom-control custom-checkbox">
					<input class="custom-control-input" type="checkbox" value="" id="saveMethodCheck">
					<label class="custom-control-label" for="saveMethodCheck" style="position: relative">
						Save my payment information so checkout is easy next time
					</label>
				</div>
			</div>
			<button class="btn btn-success" type="submit">Submit form</button>
		</form>

		<script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    let forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    let validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
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


