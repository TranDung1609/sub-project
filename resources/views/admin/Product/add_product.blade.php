@extends('dashboard')
@section('admin_content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add Product</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form role="form" action="{{ route('product.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="basic-default-name"
                                        placeholder="Tên" />
                                    @error('name')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-price">Giá</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="basic-default-price" name="price" class="form-control"
                                            placeholder="Giá" />
                                    </div>
                                    @error('price')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-price">Ảnh</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="file" id="basic-default-price" name="image[]" class="form-control"
                                            multiple />
                                    </div>
                                    @error('image')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-quantity">Số lượng</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="quantity" id="basic-default-quantity"
                                        placeholder="Số lượng" />
                                    @error('quantity')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-desc">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" id="basic-default-desc" rows="5" placeholder="Mô tả"></textarea>
                                    @error('description')
                                            <p>{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-desc">Category</label>
                                <div class="col-sm-10">
                                    <select name="category_id[]" class="js-example-basic-multiple form-control"
                                        multiple="multiple">

                                        @foreach ($category as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                            <p>{{$message}}</p>
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
