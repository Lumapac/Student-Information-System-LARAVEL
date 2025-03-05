<section class="card shadow-sm border-0">
    <div class="card-body">
        <header class="mb-3">
            <h5 class="card-title text-danger fw-bold">
                {{ __('Delete Account') }}
            </h5>
            <p class="text-muted small">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </header>

        <!-- Delete Button -->
        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmUserDeletion">
            <i class="material-icons"></i> {{ __('Delete Account') }}
        </button>
    </div>
</section>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="confirmUserDeletion" tabindex="-1" aria-labelledby="confirmUserDeletionLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmUserDeletionLabel">
                    {{ __('Are you sure you want to delete your account?') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted small">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <!-- Password Input -->
                    <div class="mb-3">
                        <input type="password" class="form-control border border-2 border-danger rounded-3 px-3 py-2"
                            id="password" name="password" required placeholder="{{ __('Enter your password') }}">
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            <i class="material-icons"></i> {{ __('Delete Account') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>