<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Profile') }}
        </h2>
    </header>

    <form method="post" action="{{ route('profile.updateProfile') }}" class="mt-6 space-y-6">
        @csrf
        {{-- <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="">Ảnh</label>
            <div class="col-sm-10">
                <div class="input-group input-group-merge">
                    <input type="file" id="" name="avatar" class="form-control" multiple />
                </div>
                <div >
                    @if (Auth::user()->profile)
                        @foreach (Auth::user()->profile as $profile)
                            <img src="{{asset('/avatars/'."$profile->avatar" )}}"
                            style="max-width: 50px; max-heigh: 50px">
                        @endforeach
                    @endif
                </div>
            </div>
        </div> --}}
        <div>
            <label for="">{{ __('Phone') }}</label>
            <input type="text" name="phone" value="{{ Auth::user()->profile->phone ?? '' }}" class="mt-1 block w-full">
        </div>
        <div>
            <label for="">{{ __('Age') }}</label>
            <input type="text" name="age" value="{{ Auth::user()->profile->age ?? '' }}"
                class="mt-1 block w-full">
        </div>
        <div>

            <label for="">{{ __('Gender') }}</label>
            <select name="gender" class="mt-1 block w-full">
                <option>{{ __('---Gender---') }}</option>
                <option
                    {{ isset(Auth::user()->profile) && Auth::user()->profile->gender == \App\Constants\Params::MALE ? 'selected' : '' }}
                    value="{{ \App\Constants\Params::MALE }}">{{ __('Nam') }}</option>
                <option
                    {{ isset(Auth::user()->profile) && Auth::user()->profile->gender == \App\Constants\Params::FEMALE ? 'selected' : '' }}
                    value="{{ \App\Constants\Params::FEMALE }}">{{ __('Nữ') }}</option>
                <option
                    {{ isset(Auth::user()->profile) && Auth::user()->profile->gender == \App\Constants\Params::OTHER ? 'selected' : '' }}
                    value="{{ \App\Constants\Params::OTHER }}">{{ __('Khác') }}</option>
            </select>
        </div>
        <div>
            <label for="">{{ __('Adsress') }}</label>
            <textarea name="address" class="mt-1 block w-full" rows="3">{{ Auth::user()->profile->address ?? '' }}</textarea>
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
