@extends('layouts.app2')

@section('content')
    <div class="text-center my-5">
        <div class="col">
            <h2>User Management</h2>
        </div>
    </div>
    <div class="row mt-5">
		<div class="col-12 mb-2 d-md-block d-none">
			<div class="card text-white bg-primary">
				<div class="card-body py-3 row mx-0">
					<div class="col-12 col-md-5 col-lg-3 mb-2 mb-md-0">
						<strong class="mr-2 mr-lg-5 d-inline-block" style="width: 30px;
							border-radius: 100%;background: transparent; position: relative; top: 3px">
								<i class="fas fa-user-circle"></i>
						</strong>
						<strong style="position: relative; top: 3px">
							Username
						</strong>
					</div>
					<div class="col-12 d-none d-lg-block col-lg-5 mb-2 mb-md-0">
						<strong style="position: relative; top: 3px">
							Email
						</strong>
					</div>
					<div class="col-12 col-md-3 col-lg-2 mb-2 mb-md-0">
						<strong style="position: relative; top: 3px">
							Role
						</strong>
					</div>
					<div class="col-12 col-md-4 col-lg-2 text-right mb-2 mb-md-0">

					</div>
				</div>
			</div>
		</div>
		@foreach($lsUser as $i => $user)
			<div class="col-12 mb-2">
				<div class="card @if($user->role == 'master') bg-danger text-white @elseif($user->role == 'admin')
					bg-success text-white @else text-primary @endif" id="user{{$user->id}}">
					<div class="card-body row mx-0">
						<div class="col-12 col-md-5 col-lg-3 mb-2 mb-md-0">
							<img src="{{asset($user->avatar)}}" alt="avatar" class="mr-2 mr-lg-5"
								 style="width: 30px; height: 30px; border-radius: 100%;
								 background: white">
							<span class="d-inline d-lg-none d-xl-inline" style="position: relative; top: 3px">
								@if(strlen($user->name) <= 18)
									<strong>{{$user->name}}</strong>
								@else
									<strong>{{substr($user->name, 0, 14)}} ...</strong>
								@endif
							</span>
							<span class="d-none d-lg-inline d-xl-none" style="position: relative; top: 3px">
								@if(strlen($user->name) <= 11)
									<strong>{{$user->name}}</strong>
								@else
									<strong>{{substr($user->name, 0, 8)}}...</strong>
								@endif
							</span>
						</div>
						<div class="col-12 d-none d-lg-block col-lg-5 mb-2 mb-md-0">
							<span style="position: relative; top: 3px">
								{{$user->email}}
							</span>
						</div>
						<div class="col-12 col-md-3 col-lg-2 mb-2 mb-md-0">
							<span style="position: relative; top: 3px">
								<span class="d-inline-block d-md-none mr-2" style="width: 30px"></span>
								<span class="d-md-none">Role:</span>
								<strong id="role">{{ucfirst($user -> role)}}</strong>
							</span>
						</div>
						<div class="col-12 col-md-4 col-lg-2 text-right mb-2 mb-md-0">
							@if($user->role != 'master')
								<button class="btn btn-sm btn-dark" data-toggle="modal"
										data-target="#exampleModal" data-whatever="{{$user->id}}">
									Change Role
								</button>
							@else
								<button class="btn btn-secondary btn-sm" disabled>
									Change Role
								</button>
							@endif
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="mt-5 row">
		<div class="mx-auto">
			{{$lsUser->links()}}
		</div>
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
                        <input type="hidden" name="user_id" id="user_id"/>
                        <div class="form-group">
                            <label for="user_role">Status: </label>
                            <select class="form-control select-form"
                                    id="user_role" name="user_role">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>

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
            let user_id = button.data('whatever'); // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            let modal = $(this);
            modal.find('.modal-title').text('Comment No.' + user_id);
            modal.find('.modal-body #user_id').val(user_id);
        });
        $('#btn-change-status').click(function (e) {
            e.preventDefault();
            let user_id = $("#user_id").val(),
                _token = $("input[name='_token']").val(),
                user_role = $("#user_role").val();
            $.ajax({
                type: 'POST',
                url: "{{asset('/admin/change_user_role')}}",
                data: {user_id: user_id, user_role: user_role, _token: _token},
                success: function (data) {
                    if (user_role == 'user') {
                        $('#user' + user_id).find('#role').text("User");
                        $('#user' + user_id).addClass('text-primary').removeClass('bg-success').removeClass('text-white');
                    } else if (user_role == 'admin') {
                        $('#user' + user_id).find('#role').text("Admin");
                        $('#user' + user_id).removeClass('text-primary').addClass('bg-success').addClass('text-white');
                    }
                    $('.modal').modal('toggle');
                },
            })
        });

    </script>
@endsection

