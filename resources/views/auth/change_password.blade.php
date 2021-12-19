@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Change Password</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update.password') }}">
                            @csrf
                            <div class="form-group row passwordSection">
                                <div class="input-group">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                                    <input type="password" class="form-control password" name="password" id="password" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock passwordShow" style="cursor: pointer"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row passwordSection">
                                <div class="input-group">
                                    <label for="new_password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                    <input type="password" class="form-control password" name="new_password" id="new_password" placeholder="Retype password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock passwordShow" style="cursor: pointer"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row passwordSection">
                                <div class="input-group">
                                    <label for="new_confirm_password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
                                    <input type="password" class="form-control password" name="new_confirm_password" id="new_confirm_password"
                                           placeholder="Retype password" onkeyup="checkPassword()">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock passwordShow" style="cursor: pointer"></span>
                                        </div>
                                    </div>

                                </div>
                                <span class="col-md-4" id="message"></span>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).on("click",".passwordShow",function() {
            let _this = $(this).parents('.passwordSection').find('.password');
            let type = _this.attr('type');

            if (type === "password") {
                _this.attr('type', 'text');
            } else {
                _this.attr('type', 'password');
            }
        });

        function checkPassword() {
            let new_password = document.getElementById('new_password').value;
            let new_confirm_password = document.getElementById('new_confirm_password').value;
            let message = document.getElementById('message');

            if (new_password.length !== 0) {
                if (new_password === new_confirm_password) {
                    document.getElementById('message').innerHTML =
                        message.style = "<span style='color:green'>Password Match </span>"
                } else {
                    document.getElementById('message').innerHTML =
                        message.style = "<span style='color:red'>Password  Do not Match </span>"
                }
            }
        }

    </script>
@endpush
