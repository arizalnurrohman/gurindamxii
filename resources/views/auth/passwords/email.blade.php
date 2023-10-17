<?php
/*
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
*/ ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <?php /*<link rel="stylesheet" href="assets/css/styles.css"> */ ?>
    
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Responsive Login Form Sign In Sign Up</title>

        <style type="text/css">
            /*===== GOOGLE FONTS =====*/
            @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap");

            /*===== VARIABLES CSS =====*/
            :root{
            /*===== Colores =====*/
            --first-color: #9D4BFF;
            --first-color-dark: #23004D;
            --first-color-light: #A49EAC;
            --first-color-lighten: #F2F2F2;

            /*===== Font and typography =====*/
            --body-font: 'Open Sans', sans-serif;
            --h1-font-size: 1.5rem;
            --normal-font-size: .938rem;
            --small-font-size: .813rem;
            }

            @media screen and (min-width: 768px){
            :root{
                --normal-font-size: 1rem;
                --small-font-size: .875rem;
            }
            }

            /*===== BASE =====*/
            *,::before,::after{
            box-sizing: border-box;
            }

            body{
            margin: 0;
            padding: 0;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            color: var(--first-color-dark);
            }

            h1{
            margin: 0;
            }

            a{
            text-decoration: none;
            }

            img{
            max-width: 100%;
            height: auto;
            display: block;
            }

            /*===== LOGIN =====*/
            .login{
            display: grid;
            grid-template-columns: 100%;
            height: 100vh;
            margin-left: 1.5rem;
            margin-right: 1.5rem;
            }

            .login__content{
            display: grid;
            }

            .login__img{
            justify-self: center;
            }

            .login__img img{
            width: 310px;
            margin-top: 1.5rem;
            }

            .login__forms{
            position: relative;
            height: 368px;
            }

            .login__registre, .login__create{
            position: absolute;
            bottom: 1rem;
            width: 100%;
            background-color: var(--first-color-lighten);
            padding: 2rem 1rem;
            border-radius: 1rem;
            text-align: center;
            box-shadow: 0 8px 20px rgba(35,0,77,.2);
            animation-duration: .4s;
            animation-name: animate-login;
            }

            @keyframes animate-login{
            0%{
                transform: scale(1,1);
            }
            50%{
                transform: scale(1.1,1.1);
            }
            100%{
                transform: scale(1,1);
            }
            }

            .login__title{
            font-size: var(--h1-font-size);
            margin-bottom: 2rem;
            }

            .login__box{
            display: grid;
            grid-template-columns: max-content 1fr;
            column-gap: .5rem;
            padding: 1.125rem 1rem;
            background-color: #FFF;
            margin-top: 1rem;
            border-radius: .5rem;
            }

            .login__icon{
            font-size: 1.5rem;
            color: var(--first-color);
            }

            .login__input{
            border: none;
            outline: none;
            font-size: var(--normal-font-size);
            font-weight: 700;
            color: var(--first-color-dark);
            }

            .login__input::placeholder{
            font-size: var(--normal-font-size);
            font-family: var(--body-font);
            color: var(--first-color-light);
            }

            .login__forgot{
            display: block;
            width: max-content;
            margin-left: auto;
            margin-top: .5rem;
            font-size: var(--small-font-size);
            font-weight: 600;
            color: var(--first-color-light);
            }

            .login__button{
            display: block;
            padding: 1rem;
            margin: 2rem 0;
            background-color: var(--first-color);
            color: #FFF;
            font-weight: 600;
            text-align: center;
            border-radius: .5rem;
            transition: .3s;
            }

            .login__button:hover{
            background-color: var(--first-color-dark);
            }

            .login__account, .login__signin, .login__signup{
            font-weight: 600;
            font-size: var(--small-font-size);
            }

            .login__account{
            color: var(--first-color-dark);
            }

            .login__signin, .login__signup{
            color: var(--first-color);
            cursor: pointer;
            }

            .login__social{
            margin-top: 2rem;
            }

            .login__social-icon{
            font-size: 1.5rem;
            color: var(--first-color-dark);
            margin: 0 1.5rem;
            }

            /*Show login*/
            .block{
            display: block;
            }

            /*Hidden login*/
            .none{
            display: none;
            }

            /* ===== MEDIA QUERIES =====*/
            @media screen and (min-width: 576px){
            .login__forms{
                width: 348px;
                justify-self: center;
            }
            }

            @media screen and (min-width: 1024px){
            .login{
                height: 100vh;
                overflow: hidden;
            }

            .login__content{
                grid-template-columns: repeat(2, max-content);
                justify-content: center;
                align-items: center;
                margin-left: 10rem;
            }

            .login__img{
                display: flex;
                width: 600px;
                height: 588px;
                background-color: var(--first-color-lighten);
                border-radius: 1rem;
                padding-left: 1rem;
            }

            .login__img img{
                width: 390px;
                margin-top: 0;
            }

            .login__registre, .login__create{
                left: -11rem;
            }

            .login__create{
                bottom: -5.5rem;
            }
            }
        </style>
    </head>
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="{{asset('assets/img/img-login.svg')}}" alt="">
                </div>

                <div class="login__forms">
                    
                    <form method="POST" action="{{ route('password.email') }}" class="login__registre" id="login-in">
                        @csrf    
                        <h1 class="login__title">{{ __('Reset Password') }} </h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="{{ __('Email Address') }}" name="email"  class="login__input form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert" style="font-size:12px; color:red; display:block;padding:3px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
                        <button type="submit" class="login__button" style="width:100%">
                            {{ __('Kirim Reset Password Link') }}
                        </button>
                        <div>
                            <a href="{{ route('login') }}" style="float:left">
                                <span class="login__signin">Login</span></a>&nbsp;
                            <a href="{{ route('register') }}"  style="float:right">
                                <span class="login__signin" id="nsign-up">Daftar</span></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>