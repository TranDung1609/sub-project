@extends('dashboard')
@section('admin_content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('Forms/') }}</span> {{ __('Edit Category') }}
        </h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    @foreach ($cate as $cate)
                        <div class="card-body">
                            <form role="form" action="{{ route('category.update', $cate->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"
                                        for="basic-default-name">{{ __('Name') }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $cate->name }}"
                                            name="name" id="basic-default-name" placeholder="Tên" />
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">{{ __('Image') }}</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="file" id="" name="image" class="form-control"
                                                multiple />
                                        </div>
                                        <div>
                                            <img src="{{ asset('/categories/' . "$cate->image") }}"
                                                style="max-width: 50px; max-heigh: 50px">
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"
                                        for="basic-default-message">{{ __('Status') }}</label>
                                    <div class="col-sm-10">
                                        <select value="" name="status" class="form-control input-sm m-bot15">
                                            <option
                                                {{ $cate->status == \App\Constants\Params::CATEGORY_STOP ? 'selected' : '' }}
                                                value="{{ \App\Constants\Params::CATEGORY_STOP }}">{{ __('Ẩn') }}
                                            </option>
                                            <option
                                                {{ $cate->status == \App\Constants\Params::CATEGORY_ACTIVE ? 'selected' : '' }}
                                                value="{{ \App\Constants\Params::CATEGORY_ACTIVE }}">{{ __('Hiển thị') }}
                                            </option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger">{{ $message }}</p>
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
