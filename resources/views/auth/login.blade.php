{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-guest-layout>

    <div class="flex min-h-full flex-col h-screen justify-center bg-white dark:bg-[#111827] px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-white ">Sign in to your account</h2>
        </div>
      
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="{{route('login')}}" method="POST">
            @csrf
            <div>
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Email address</label>
              <div class="mt-2">
                <input id="email" value="{{old('email')}}" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border  border-gray-500 py-1.5 px-2 outline-none text-gray-900   placeholder:text-gray-400 dark:text-white focus:border-blue-500 sm:text-sm sm:leading-6 dark:bg-[#1D2432]">
              </div>
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Password</label>
                <div class="text-sm">
                  <a href="{{route('password.request')}}" class="font-semibold text-blue-500 hover:text-indigo-500">Forgot password?</a>
                </div>
              </div>
              <div class="mt-2">
                <input id="password" value="{{old('password')}}" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border px-2  border-gray-500 py-1.5 outline-none text-gray-900   placeholder:text-gray-400 dark:text-white focus:border-blue-500 sm:text-sm sm:leading-6 dark:bg-[#1D2432]">
              </div>
            </div>
            <div>
                @error('email')   
                  <p class="text-red-500 text-sm">You have somethings not right</p>
                @enderror
                @error('password')   
                <p class="text-red-500 text-sm">You have somethings not right</p>
                @enderror
            </div>
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-blue-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
          </form>
      
          <p class="mt-10 text-center text-sm text-gray-500">
            If you don't have Account?
            <a href="{{route('register')}}" class="font-semibold leading-6 underline text-blue-500 hover:text-indigo-500">Sign Up</a>
          </p>
        </div>
      </div>
</x-guest-layout>