@extends('dashboard')
@section('admin_content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{__('Forms/')}}</span> {{__('Edit Product')}}</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">

                    <div class="card-body">
                        <form role="form" action="{{ route('product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">{{__('Tên')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $product->name }}" class="form-control" name="name"
                                        id="basic-default-name" placeholder="Tên" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-price">{{__('Giá')}}</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="number" value="{{ $product->price }}" id="basic-default-price"
                                            name="price" class="form-control" placeholder="Giá" />
                                        @error('price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-price">{{__('Giảm giá')}}</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="number" value="{{ $product->discount }}" id="basic-default-discount"
                                            name="discount" class="form-control" placeholder="Giảm giá" />
                                        @error('discount')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="">{{__('Ảnh')}}</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="file" id="" name="image[]" class="form-control" multiple />
                                    </div>
                                    <div>
                                        @if ($product->images)
                                            @foreach ($product->images as $image)
                                                <img src="{{ asset('/storage/uploads/' . "$image->image") }}"
                                                    style="max-width: 50px; max-heigh: 50px">
                                            @endforeach
                                        @endif
                                    </div>
                                    @error('image.*')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-quantity">{{__('Số lượng')}}</label>
                                <div class="col-sm-10">
                                    <input value="{{ $product->quantity }}" type="number" class="form-control"
                                        name="quantity" id="basic-default-quantity" placeholder="Số lượng" />
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-desc">{{__('Mô tả')}}</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" id="basic-default-desc" rows="5" placeholder="Mô tả">{{ $product->description }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-desc">{{__('Danh mục')}}</label>
                                <div class="col-sm-10">
                                    <select name="category_id[]" class="js-example-basic-multiple form-control"
                                        multiple="multiple">

                                        @foreach ($category as $catego)
                                            <option {{ $product->categories->contains('id', $catego->id) ? 'selected' : '' }}
                                                value="{{ $catego->id }}">{{ $catego->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">{{__('Gửi')}}</button>
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
