{{--Copyright (c) 2015 "Werner Maisl"--}}

{{--This file is part of the Store Webpanel V2.--}}

{{--The Store Webpanel V2 is free software: you can redistribute it and/or modify--}}
{{--it under the terms of the GNU Affero General Public License as--}}
{{--published by the Free Software Foundation, either version 3 of the--}}
{{--License, or (at your option) any later version.--}}

{{--This program is distributed in the hope that it will be useful,--}}
{{--but WITHOUT ANY WARRANTY; without even the implied warranty of--}}
{{--MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the--}}
{{--GNU Affero General Public License for more details.--}}

{{--You should have received a copy of the GNU Affero General Public License--}}
{{--along with this program. If not, see <http://www.gnu.org/licenses/>.--}}
@extends('templates.adminlte205.auth.app')

@section('title', 'Login')

@section('body-class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Store</b>WebPanel</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>

            <form method="POST" action="{{ url('/auth/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="name" value="{{ old('name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        By Registering you agree to the TOS
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div><!-- /.col -->
                </div>

            </form>
            <a href="{{ url('/auth/login') }}" class="text-center">I already have a membership</a>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->
@stop