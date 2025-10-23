@extends('layouts.app', ['title' => 'Home'])

@section('content')
    <style>
   

        .body {
            margin-top: 15%;
            background: #f5f5f5;
            min-height: 100vh;
        }

       

        .profile-header {
            background: white;
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .avatar-section {
            text-align: center;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #D4B896;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: white;
            font-weight: 600;
            margin-bottom: 16px;
            border: 4px solid #f0f0f0;
            object-fit: cover;
        }

        .avatar-upload {
            position: relative;
        }

        .avatar-upload input[type="file"] {
            display: none;
        }

        .avatar-upload label {
            display: inline-block;
            padding: 8px 16px;
            background: #D4B896;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .avatar-upload label:hover {
            background: #c9a87d;
        }

        .profile-info {
            flex: 1;
        }

        .profile-info h2 {
            color: #3a3a3a;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .profile-info p {
            color: #666;
            font-size: 15px;
            margin-bottom: 4px;
        }

        .profile-stats {
            display: flex;
            gap: 30px;
            margin-top: 20px;
        }

        .stat {
            text-align: center;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 600;
            color: #3a3a3a;
        }

        .stat-label {
            font-size: 13px;
            color: #999;
            margin-top: 4px;
        }

        .profile-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid #f0f0f0;
        }

        .card-header h3 {
            color: #3a3a3a;
            font-size: 20px;
            font-weight: 600;
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
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #3a3a3a;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #fafafa;
            font-family: inherit;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
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

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

      

        .danger-zone {
            grid-column: 1 / -1;
            border: 2px solid #dc3545;
        }

        .danger-zone .card-header {
            border-bottom-color: #dc3545;
        }

        .danger-zone h3 {
            color: #dc3545;
        }

        .danger-text {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 16px;
            padding: 30px;
            max-width: 400px;
            width: 90%;
        }

        .modal-header {
            margin-bottom: 20px;
        }

        .modal-header h3 {
            color: #3a3a3a;
            font-size: 22px;
            margin-bottom: 8px;
        }

        .modal-header p {
            color: #666;
            font-size: 14px;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .modal-actions .btn {
            flex: 1;
        }

      

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-content {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .navbar-brand h1 {
                display: none;
            }

            .profile-stats {
                justify-content: center;
            }
        }
    </style>

<div class="body">
  

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="profile-header">
            <div class="avatar-section">
                @if($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="avatar">
                @else
                    <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                @endif
                
                <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data" id="avatarForm" class="avatar-upload">
                    @csrf
                    <input type="file" name="avatar" id="avatar" accept="image/*" onchange="document.getElementById('avatarForm').submit()">
                    <label for="avatar">Change Photo</label>
                </form>
            </div>

            <div class="profile-info">
                <h2>{{ $user->name }}</h2>
                <p>{{ $user->email }}</p>
                @if($user->phone)
                    <p>{{ $user->phone }}</p>
                @endif
                
                <div class="profile-stats">
                    <div class="stat">
                        <div class="stat-value">0</div>
                        <div class="stat-label">Orders</div>
                    </div>
                    <div class="stat">
                        <div class="stat-value">0</div>
                        <div class="stat-label">Reviews</div>
                    </div>
                    <div class="stat">
                        <div class="stat-value">{{ $user->created_at->format('M Y') }}</div>
                        <div class="stat-label">Member Since</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-content">
            <!-- Personal Information -->
            <div class="card">
                <div class="card-header">
                    <h3>Personal Information</h3>
                </div>

                @if($errors->updateProfile->any())
                    <div class="alert alert-error">
                        @foreach($errors->updateProfile->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>

            <!-- Shipping Address -->
            <div class="card">
                <div class="card-header">
                    <h3>Shipping Address</h3>
                </div>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="address">Street Address</label>
                        <textarea id="address" name="address">{{ old('address', $user->address) }}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" value="{{ old('city', $user->city) }}">
                        </div>

                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" id="state" name="state" value="{{ old('state', $user->state) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="zip">ZIP Code</label>
                        <input type="text" id="zip" name="zip" value="{{ old('zip', $user->zip) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Address</button>
                </form>
            </div>

            <!-- Change Password -->
            <div class="card">
                <div class="card-header">
                    <h3>Change Password</h3>
                </div>

                @if($errors->updatePassword->any())
                    <div class="alert alert-error">
                        @foreach($errors->updatePassword->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.password') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" id="current_password" name="current_password" required>
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>

            <!-- Danger Zone -->
            <div class="card danger-zone">
                <div class="card-header">
                    <h3>Danger Zone</h3>
                </div>

                <p class="danger-text">
                    Once you delete your account, there is no going back. Please be certain. All your data including orders, reviews, and personal information will be permanently deleted.
                </p>

                <button type="button" class="btn btn-danger" onclick="openDeleteModal()">Delete Account</button>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Delete Account</h3>
                <p>This action cannot be undone. Please enter your password to confirm.</p>
            </div>

            @if($errors->deleteAccount->any())
                <div class="alert alert-error">
                    @foreach($errors->deleteAccount->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('profile.delete') }}">
                @csrf
                @method('DELETE')

                <div class="form-group">
                    <label for="delete_password">Password</label>
                    <input type="password" id="delete_password" name="password" required>
                </div>

                <div class="modal-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Account</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openDeleteModal() {
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });
    </script>
</div>
@endsection
