@extends('dashboard')
@section('admin_content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Category</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    @foreach ($cate as $cate)
                        <div class="card-body">
                            <form role="form" action="{{ route('category.update', $cate->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $cate->name }}"
                                            name="name" id="basic-default-name" placeholder="Tên" />
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Ảnh</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="file" id="" name="image" class="form-control" multiple />
                                        </div>
                                        <div >
                                            <img src="{{asset('/categories/'."$cate->image" )}}" style="max-width: 50px; max-heigh: 50px">
                                        </div>
                                        @error('image')
                                                <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-message">Status</label>
                                    <div class="col-sm-10">
                                        <select value="" name="status" class="form-control input-sm m-bot15">
                                            <option {{ $cate->status == 0 ? 'selected' : '' }} value="0">Ẩn</option>
                                            <option {{ $cate->status == 1 ? 'selected' : '' }} value="1">Hiển thị
                                            </option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger">{{ $message }}</p>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
