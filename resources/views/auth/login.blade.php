{{-- @include('layouts.header') --}}
@extends('layouts.master')
@section('content')
    <div class="col-sm-12 col-md-6 mrg pull-right">
        <div class="login-right" id="login-step-1">
          @if(Session::has('success'))
            <div class="alert alert-danger">
              {{ Session::get('success') }}
              @php
                  Session::forget('success');
              @endphp
            </div>
          @endif
          <form method="POST" id="ht_submit_email">
                @csrf
                <div class="form-group" style="height: 8em;">
                  <h4>School Login</h4>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input id="email" type="email"
                          class="form-control" name="email"
                          value="" placeholder="Enter email" autocomplete="off" autofocus>
                      <span class="invalid-feedback" id="ht_otp_error" role="alert">
                      </span>
                    </div>
                </div>
              <div class="form-group">
                  <button id="ht_submit_email_btn" type="button" class="btn btn-primary submit-btn btn-block" style="background: black;">
                      Next
                  </button>
              </div>
          </form>
        </div>
        <div class="login-right otp-ontent" id="login-step-2" style="display: none;">
            <form method="POST" id="otp-verification-form">
                @csrf
            <h4>OTP Verification</h4>
            <div class="content" style="text-align: center;">
                <img src="../asset/img/otp-verification.png" class="img-fluid">
                <p id="email-otp-message"></p>
            </div>
            <div id="otp" class="flex justify-center">
              <input class="text-center form-control to_next email_otp" type="text" name="num_1" maxlength="1" autocomplete="off" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
              <input class="text-center form-control to_next email_otp" type="text" name="num_2" maxlength="1" autocomplete="off" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
              <input class="text-center form-control to_next email_otp" type="text" name="num_3" maxlength="1" autocomplete="off" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
              <input class="text-center form-control to_next email_otp" type="text" name="num_4" maxlength="1" autocomplete="off" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
              <input class="text-center form-control to_next email_otp" type="text" name="num_5" maxlength="1" autocomplete="off" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
              <input class="text-center form-control to_next email_otp" type="text" name="num_6" maxlength="1" autocomplete="off" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
            </div>
            <p class="error_resend" style="display: none;" id="ht_resend_error"></p>
            <input id="show_email" type="hidden"
                            class="form-control" name="email"
                            value="" autocomplete="off" autofocus>
            <input id="show_otp_id" type="hidden" class="form-control" name="show_otp_id"
            value="" autocomplete="off" autofocus>

            <input id="show_otp_status" type="hidden" class="form-control" name="show_otp_status"
            value="" autocomplete="off" autofocus>

            <div class="resend-info">
              <div class="pull-left">
                <p>Valid For: <span class="timer" id="reg-otp-timer">01:00</span></p>
              </div>
              <div class="pull-right">
                <a href="javascript:void(0)" class="resend-link" id="resend-otp-link" style="display: none;">Resend OTP</a>
              </div>
            </div>
            <div class="otp_button">
              <button type="submit" class="btn arrow_btn" style="border-radius: 4px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
              </button>
              <button type="button" style="background:black;border-radius: 4px;color:yellow;" class="btn submit_btn" id="verify-otp-btn">Verify OTP</button>
            </div>
            </form>
        </div>
    </div>
@endsection
