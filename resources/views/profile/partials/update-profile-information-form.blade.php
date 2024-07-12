<section class="container mx-auto px-4 py-8">
    <header class="mb-6">
      <h2 class="h2 text-lg font-medium text-gray-900">
        {{ __('Profile Information') }}
      </h2>
      <p class="text-sm text-gray-600">
        {{ __("Update your account's profile information and email address.") }}
      </p>
    </header>
  
    <div class="row">
      <div class="col-md-6">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
          @csrf
        </form>
  
        <form method="post" action="{{ route('profile.update') }}" class="mt-4">
          @csrf
          @method('patch')
  
          <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name">
            @error('name')
              <div class="invalid-feedback">
                {{ $errors->get('name')[0] }}
              </div>
            @enderror
          </div>
  
          <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" :value="old('email', $user->email)" required autocomplete="username">
            @error('email')
              <div class="invalid-feedback">
                {{ $errors->get('email')[0] }}
              </div>
            @enderror
          </div>
  
          @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mb-3">
              <p class="text-sm text-gray-800">
                {{ __('Your email address is unverified.') }}
                <a href="#" form="send-verification" class="text-sm text-gray-600 hover:text-gray-900 underline">
                  {{ __('Click here to re-send the verification email.') }}
                </a>
              </p>
              @if (session('status') === 'verification-link-sent')
                <p class="text-sm mt-2 font-medium text-green-600">
                  {{ __('A new verification link has been sent to your email address.') }}
                </p>
              @endif
            </div>
          @endif
  
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            @if (session('status') === 'profile-updated')
              <p class="text-sm text-gray-600 mt-2">
                {{ __('Saved.') }}
              </p>
            @endif
          </div>
        </form>
      </div>
    </div>
  </section>
  