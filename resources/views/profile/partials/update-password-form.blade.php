<section class="card p-4 shadow-sm border-0">
    @if (session('status') === 'password-updated')
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="password-saved-alert">
            <strong>{{ __('Success!') }}</strong> {{ __('Password has been updated.') }}
        </div>
    @endif

    <header class="mb-3">
        <h5 class="text-dark fw-bold">
            {{ __('Update Password') }}
        </h5>
        <p class="text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-1">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3 w-50">
            <label for="update_password_current_password" class="form-label">
                {{ __('Current Password') }}
            </label>
            <input type="password" id="update_password_current_password" name="current_password"
                class="form-control border border-2 rounded-3" autocomplete="current-password" required>
            @error('current_password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-3 w-50">
            <label for="update_password_password" class="form-label">
                {{ __('New Password') }}
            </label>
            <input type="password" id="update_password_password" name="password"
                class="form-control border border-2 rounded-3" autocomplete="new-password" required>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3 w-50">
            <label for="update_password_password_confirmation" class="form-label">
                {{ __('Confirm Password') }}
            </label>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation"
                class="form-control border border-2 rounded-3" autocomplete="new-password" required>
            @error('password_confirmation')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>


        <!-- Save Button -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-dark">
                {{ __('Save') }}
            </button>
        </div>

    </form>
</section>

<!-- Auto-hide success message after 1 seconds -->
<script>
    setTimeout(() => {
        let alertBox = document.getElementById('password-saved-alert');
        if (alertBox) {
            let bsAlert = new bootstrap.Alert(alertBox);
            bsAlert.close();
        }
    }, 2000);
</script>