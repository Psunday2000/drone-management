<section class="container mx-auto px-4 py-8">
    <header class="mb-6">
      <h2 class="h2 text-lg font-medium text-gray-900">
        {{ __('Delete Account') }}
      </h2>
      <p class="text-sm text-gray-600">
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
      </p>
    </header>
  
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">
      {{ __('Delete Account') }}
    </button>
  
    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="confirm-user-deletionLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirm-user-deletionLabel">
              {{ __('Are you sure you want to delete your account?') }}
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="text-sm text-gray-600">
              {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>
  
            <form method="post" action="{{ route('profile.destroy') }}" class="mt-4">
              @csrf
              @method('delete')
  
              <div class="mb-3">
                <label for="password" class="form-label visually-hidden">{{ __('Password') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Password') }}" required>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $errors->userDeletion->get('password')[0] }}
                  </div>
                @enderror
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              {{ __('Cancel') }}
            </button>
            <button type="submit" form="delete-account-form" class="btn btn-danger">
              {{ __('Delete Account') }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  