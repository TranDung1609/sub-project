@extends('dashboard')
@section('admin_content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{__('Forms/')}}</span> {{__('Edit User')}}</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    @foreach ($user as $a)
                        <div class="card-body">
                            <form role="form" action="{{ route('user.update', $a->id) }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">{{__('Name')}}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $a->name }}"
                                            name="name" id="basic-default-name" placeholder="Tên" readonly />
                                            @error('name')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-email">{{__('Email')}}</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="basic-default-email" value="{{ $a->email }}"
                                                name="email" class="form-control" placeholder="abc@gmail.com" readonly />
                                        </div>
                                        @error('email')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        {{-- <div class="form-text">You can use letters, numbers & periods</div> --}}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-phone">{{__('PassWord')}}</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" value="{{ $a->password }}"
                                            name="password" id="basic-default-name" placeholder="Mật khẩu" readonly />
                                            @error('password')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-message">{{__('Role')}}</label>
                                    <div class="col-sm-10">
                                        <select value="{{ $a->role }}" name="role"
                                            class="form-control input-sm m-bot15">

                                            <option {{ $a->role == \App\Constants\Params::ROLE_ADMIN ? 'selected' : '' }} value="{{\App\Constants\Params::ROLE_ADMIN}}">{{__('Role')}}</option>
                                            <option {{ $a->role == \App\Constants\Params::ROLE_USER ? 'selected' : '' }} value="{{\App\Constants\Params::ROLE_USER}}">{{__('User')}}</option>
                                        </select>
                                        @error('role')
                                                <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">{{__('Send')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
