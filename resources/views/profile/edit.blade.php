<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

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
</x-app-layout>
