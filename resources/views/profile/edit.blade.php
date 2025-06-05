@include('components.navbar')

<style>
    .profile-container {
        max-width: 700px;
        margin: 2rem auto;
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        padding: 2.5rem 2rem;
    }
    .profile-section {
        margin-bottom: 2.5rem;
    }
    .profile-header h2 {
        font-size: 1.3rem;
        font-weight: 600;
        color: #222;
        margin-bottom: 1.2rem;
        border-left: 4px solid #2ecc71;
        padding-left: 0.7rem;
    }
    .profile-content {
        background: #f8f9fa;
        border-radius: 0.7rem;
        padding: 1.5rem 1rem;
    }
    .profile-form label {
        font-weight: 500;
        color: #333;
    }
    .profile-form input[type="text"],
    .profile-form input[type="email"],
    .profile-form input[type="password"] {
        width: 100%;
        padding: 0.7rem;
        border: 1px solid #ddd;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
        background: #fff;
        font-size: 1rem;
    }
    .profile-form button,
    .profile-form input[type="submit"] {
        background: #2ecc71;
        color: #fff;
        border: none;
        border-radius: 0.5rem;
        padding: 0.7rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    .profile-form button:hover,
    .profile-form input[type="submit"]:hover {
        background: #27ae60;
    }
    .profile-form .text-danger,
    .profile-form .error-message {
        color: #e74c3c;
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
    }
    @media (max-width: 600px) {
        .profile-container {
            padding: 1rem 0.5rem;
        }
        .profile-content {
            padding: 1rem 0.5rem;
        }
    }
</style>

<div class="profile-container">
    <!-- Profile Information -->
    <div class="profile-section">
        <div class="profile-header">
            <h2>{{ __('Profile Information') }}</h2>
        </div>
        <div class="profile-content">
            <div class="profile-form">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
    </div>

    <!-- Update Password -->
    <div class="profile-section">
        <div class="profile-header">
            <h2>{{ __('Update Password') }}</h2>
        </div>
        <div class="profile-content">
            <div class="profile-form">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>

    <!-- Delete Account -->
    <div class="profile-section">
        <div class="profile-header">
            <h2>{{ __('Delete Account') }}</h2>
        </div>
        <div class="profile-content">
            <div class="profile-form">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
