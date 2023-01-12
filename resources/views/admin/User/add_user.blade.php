@extends('dashboard')
@section('admin_content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add User</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form role="form" action="{{ route('user.save') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="basic-default-name"
                                        placeholder="Tên" />
                                        @error('name')
                                           <p class="text-danger">{{$message}}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="email" id="basic-default-email" name="email" class="form-control"
                                            placeholder="abc@gmail.com" />   
                                    </div>
                                    @error('email')
                                           <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    {{-- <div class="form-text">You can use letters, numbers & periods</div> --}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-phone">PassWord</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="basic-default-name"
                                        placeholder="Mật khẩu" />
                                        @error('password')
                                           <p class="text-danger">{{$message}}</p>
                                        @enderror
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Role</label>
                                <div class="col-sm-10">
                                    <select name="role" class="form-control input-sm m-bot15">
                                        <option value="">Chọn Role</option>
                                        <option value="0">Admin</option>
                                        <option value="1">User</option>
                                    </select>
                                    @error('role')
                                            <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
