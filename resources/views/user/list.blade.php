@extends('layouts.app2')

@section('content')
    <div class="text-center my-5">
        <div class="col">
            <h2>User Management</h2>
        </div>
    </div>
    <div class="row mt-5">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Change Role</th>
            </tr>
            @foreach($lsUser as $i => $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><label id="user{{$user->id}}">{{$user -> role}}</label></td>
                <td>
                    @if($user->role != 'master')
                        <button class="btn btn-info
                            mt-4 mt-md-3 mt-lg-0 float-right" data-toggle="modal"
                                data-target="#exampleModal" data-whatever="{{$user->id}}">
                            Change Role
                        </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>


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
                        $('#user' + user_id).addClass("text-white").addClass("bg-success").removeClass("bg-light");
                        $('#user' + user_id).text("user");
                        $('#user' + user_id).find(".btn").addClass("btn-danger").removeClass("btn-primary");
                    } else if (user_role == 'admin') {
                        $('#user' + user_id).addClass("bg-light").removeClass("text-white").removeClass("bg-success");
                        $('#user' + user_id).text("admin");
                        $('#user' + user_id).find(".btn").addClass("btn-primary").removeClass("btn-danger");
                    }
                    $('.modal').modal('toggle');
                },
            })
        });
        
    </script>
@endsection

