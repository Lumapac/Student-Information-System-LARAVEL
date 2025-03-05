<section class="card shadow-sm p-4">
    <header class="mb-3">
        <h2 class="h5 text-dark">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-muted small">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div class="mb-3 w-50">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" id="name" name="name" class="form-control border border-2 rounded-3"
                value="{{ old('name', $user->name) }}" @if(Auth::user()->role == 'student') readonly @endif required autofocus autocomplete="name">
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-3 w-50">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" id="email" name="email" class="form-control border border-2 rounded-3"
                value="{{ old('email', $user->email) }}" @if(Auth::user()->role == 'student') readonly @endif required autocomplete="username">
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-muted small">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="btn btn-link p-0 text-primary">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success small">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button -->
        @if(Auth::user()->role != 'student')
            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-dark">{{ __('Save') }}</button>
            </div>
        @endif

        @if (session('status') === 'profile-updated')
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="profile-saved-alert">
                <strong>{{ __('Success!') }}</strong> {{ __('Your profile has been updated.') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </form>
</section>

<!-- Auto-hide success message after 1 seconds -->
<script>
    setTimeout(() => {
        let alertBox = document.getElementById('profile-saved-alert');
        if (alertBox) {
            let bsAlert = new bootstrap.Alert(alertBox);
            bsAlert.close();
        }
    }, 1000);
</script>