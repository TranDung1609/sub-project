<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Profile') }}
        </h2>
    </header>

    <form method="post" action="{{ route('profile.updateProfile') }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <label for="">Phone</label>
            <input type="text" name="phone" value="{{ Auth::user()->profile->phone ?? '' }}" class="mt-1 block w-full" >
        </div>
        <div>
            <label for="">Age</label>
            <input type="text" name="age" value="{{ Auth::user()->profile->age ?? '' }}" class="mt-1 block w-full" >
        </div>
        <div>
            {{-- @dd(Auth::user()->profile) --}}
            <label for="">Gender</label>
            <select name="gender" class="mt-1 block w-full">
                <option >---Gender---</option>
                <option {{isset(Auth::user()->profile) && Auth::user()->profile->gender==1 ? 'selected' : ''}} value="1">Nam</option>
                <option {{isset(Auth::user()->profile) && Auth::user()->profile->gender==2 ? 'selected' : ''}} value="2">Nữ</option>
                <option {{isset(Auth::user()->profile) && Auth::user()->profile->gender==3 ? 'selected' : ''}} value="3">Khác</option>
            </select>
        </div>
        <div>
            <label for="">Adsress</label>
            <textarea name="address" class="mt-1 block w-full" rows="3">{{ Auth::user()->profile->address ?? ''}}</textarea>
        </div>
        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
