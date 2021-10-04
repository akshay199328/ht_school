{{-- @include('layouts.header') --}}
@extends('layouts.master')
@section('content')
    <div class="col-sm-12 col-md-6 mrg pull-right">
        <div class="login-right" id="login-step-1">
          <form method="POST" id="admin_submit_email">
                @csrf
                <div class="form-group" style="height: 8em;">
                  <h4>Admin Login</h4>
                </div>
                <p class="errors_invalid" style="display: none;" id="admin_errors_invalid"></p>
                <div class="form-group">
                  <label class="label">Email Address</label>
                  <div class="input-group">
                      <input id="email" type="email"
                          class="form-control" name="email"
                          value="" autocomplete="off" autofocus>
                  </div>
                </div>
                <p class="errors_admin" style="display: none;" id="admin_email_error"></p>
                <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                        <input id="password_admin" type="password"
                            class="form-control" name="password"
                            autocomplete="off">
                    </div>
                </div>
                <p class="errors_password" style="display: none;" id="admin_password_error"></p>
                <div class="form-group">
                    <button id="admin_submit_btn" type="button" class="btn btn-primary submit-btn btn-block" style="background: black;">
                      Sign in
                    </button>
                </div>
          </form>
        </div>
    </div>
@endsection