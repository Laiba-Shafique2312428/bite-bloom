@extends('layouts.app', ['title' => 'Home'])

@section('content')
    <style>
     
        .body {
           margin-top: 15%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            width: 100%;
            overflow: hidden;
            margin: 40px 0;
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

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            margin-bottom: 20px;
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

        .password-requirements {
            font-size: 12px;
            color: #999;
            margin-top: 6px;
        }

      

        .terms {
            font-size: 13px;
            color: #666;
            text-align: center;
            margin-top: 20px;
            line-height: 1.5;
        }

        .terms a {
            color: #D4B896;
            text-decoration: none;
        }

        .terms a:hover {
            color: #c9a87d;
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

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

<div class="body">
    <div class="auth-container">
        <div class="auth-header">
            <div class="logo"></div>
            <h1>Create Account</h1>
            <p>Join Bite & Bloom today</p>
        </div>

        <div class="auth-body">
            @if($errors->any())
                <div class="alert alert-error">
                    <strong>Please fix the following errors:</strong>
                    <ul style="margin-top: 8px; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}"
                        class="{{ $errors->has('name') ? 'error' : '' }}"
                        required 
                        autofocus
                    >
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            class="{{ $errors->has('email') ? 'error' : '' }}"
                            required
                        >
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input 
                            type="tel" 
                            id="phone" 
                            name="phone" 
                            value="{{ old('phone') }}"
                            class="{{ $errors->has('phone') ? 'error' : '' }}"
                        >
                        @error('phone')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
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
                    <div class="password-requirements">Minimum 6 characters</div>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">Create Account</button>

                <div class="terms">
                    By creating an account, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                </div>
            </form>
        </div>

        <div class="auth-footer">
            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
        </div>
    </div>
</div>

@endsection