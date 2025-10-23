@extends('layouts.app', ['title' => 'Home'])

@section('content')
    <style>
       
        .body {
            
          
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin-top: 15%
        }

        .auth-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            max-width: 450px;
            width: 100%;
            overflow: hidden;
        }

        .auth-header {
            background: #D4B896;
            padding: 40px 30px;
            text-align: center;
        }

     

        .auth-header h1 {
            color: #3a3a3a;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .auth-header p {
            color: #5a5a5a;
            font-size: 14px;
        }

        .auth-body {
            padding: 40px 30px;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            color: #3a3a3a;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #D4B896;
            background: white;
        }

        .form-group input.error {
            border-color: #dc3545;
        }

        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 6px;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .checkbox-group label {
            font-size: 14px;
            color: #5a5a5a;
            cursor: pointer;
        }

        .forgot-link {
            color: #D4B896;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .forgot-link:hover {
            color: #c9a87d;
        }


        .divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: #e0e0e0;
        }

        .divider span {
            background: white;
            padding: 0 15px;
            color: #999;
            font-size: 14px;
            position: relative;
            z-index: 1;
        }

        .auth-footer {
            text-align: center;
            padding: 0 30px 40px;
        }

        .auth-footer p {
            color: #5a5a5a;
            font-size: 14px;
        }

        .auth-footer a {
            color: #D4B896;
            text-decoration: none;
            font-weight: 600;
        }

        .auth-footer a:hover {
            color: #c9a87d;
        }

        @media (max-width: 480px) {
            .auth-container {
                border-radius: 0;
            }

            .auth-header {
                padding: 30px 20px;
            }

            .auth-body {
                padding: 30px 20px;
            }

            .form-options {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }
        }
    </style>

<div class="body">
    <div class="auth-container">
        <div class="auth-header">
            <div class="logo"></div>
            <h1>Welcome Back</h1>
            <p>Sign in to your Bite & Bloom account</p>
        </div>

        <div class="auth-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        class="{{ $errors->has('email') ? 'error' : '' }}"
                        required 
                        autofocus
                    >
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        class="{{ $errors->has('password') ? 'error' : '' }}"
                        required
                    >
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-options">
                    <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
        </div>

        <div class="auth-footer">
            <p>Don't have an account? <a href="{{ route('register') }}">Create Account</a></p>
        </div>
    </div>
</div>
@endsection
