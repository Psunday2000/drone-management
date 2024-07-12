<section class="container mx-auto px-4 py-8">
    <header class="mb-6">
      <h2 class="h2 text-lg font-medium text-gray-900">
        {{ __('Update Password') }}
      </h2>
      <p class="text-sm text-gray-600">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
      </p>
    </header>
  
    <form method="post" action="{{ route('password.update') }}" class="mt-4">
      @csrf
      @method('put')
  
      <div class="mb-3">
        <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="update_password_current_password" name="current_password" autocomplete="current-password" required>
        @error('current_password')
          <div class="invalid-feedback">
            {{ $errors->updatePassword->get('current_password')[0] }}
          </div>
        @enderror
      </div>
  
      <div class="mb-3">
        <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="update_password_password" name="password" autocomplete="new-password" required>
        @error('password')
          <div class="invalid-feedback">
            {{ $errors->updatePassword->get('password')[0] }}
          </div>
        @enderror
      </div>
  
      <div class="mb-3">
        <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password" required>
        @error('password_confirmation')
          <div class="invalid-feedback">
            {{ $errors->updatePassword->get('password_confirmation')[0] }}
          </div>
        @enderror
      </div>
  
      <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        @if (session('status') === 'password-updated')
          <p class="text-sm text-gray-600">
            {{ __('Saved.') }}
          </p>
        @endif
      </div>
    </form>
  </section>
  