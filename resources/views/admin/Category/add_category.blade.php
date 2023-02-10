@extends('dashboard')
@section('admin_content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{__('Forms/')}}</span> {{__('Add Category')}}</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form role="form" action="{{ route('category.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">{{__('Name')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="basic-default-name"
                                        placeholder="Tên" />
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-image">{{__('Image')}}</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="file" id="basic-default-image" name="image" class="form-control"/>
                                    </div>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">{{__('Status')}}</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control input-sm m-bot15">
                                        <option value="">Status</option>
                                        <option value="{{\App\Constants\Params::CATEGORY_STOP}}">{{__('Ẩn')}}</option>
                                        <option value="{{\App\Constants\Params::CATEGORY_ACTIVE}}">{{__('Hiển thị')}}</option>
                                    </select>
                                    @error('status')
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
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
