@extends('layouts.master')

@section('content')
    <!-- Login Area -->
    <div class="bigshop_reg_log_area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="login_form mb-50">
                        <h5 class="mb-3">Login</h5>

                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="eamil">Email :</label>
                                <input type="email" class="form-control" id="username" name="eamil" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Passowrd :</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Login</button>
                        </form>
                        <!-- Forget Password -->
                        <div class="forget_pass mt-15">
                            <a href="{{route('check')}}">Forget Password?</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="login_form mb-50">
                        <h5 class="mb-3">Register</h5>

                        <form action="{{route('store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name : </label>
                                <input type="name" class="form-control" id="username" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password :</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Area End -->

@endsection