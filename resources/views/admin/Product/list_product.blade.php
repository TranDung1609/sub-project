@extends('dashboard')
@section('admin_content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> {{__('List Product')}}</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">{{__('Table Product')}}</h5>
            <div class="table-responsive text-nowrap">
                <table  id="table_id" class="table ">
                    <thead>
                        <tr>
                            <th>{{__('Id')}}</th>
                            <th>{{__('Tên')}}</th>
                            <th>{{__('Danh mục')}}</th>
                            <th>{{__('Giá')}}</th>
                            <th>{{__('Giảm giá')}}</th>
                            <th>{{__('Số lượng')}}</th>
                            <th>{{__('Mô tả')}}</th>
                            {{-- <th>Image</th> --}}
                            <th>{{__('Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($product as $pro)
                            <tr>
                                <td>{{$pro->id}}</td>
                                <td>{{$pro->name}}</td>
                                <td>
                                        @foreach ($pro->categories as $category)
                                            {{$category->name}}
                                        @endforeach
                                </td>
                                <td>{{ $pro->price}}</td>
                                <td>{{ $pro->discount }}</td>
                                <td>{{ $pro->quantity }}</td>
                                <td>{{ $pro->description }}</td>
                                {{-- <td>
                                        @foreach ($pro->images as $image)
                                            <img src="{{asset('/storage/uploads/'."$image->image" )}}" style="max-width: 50px; max-heigh: 50px">
                                        @endforeach
                                </td> --}}
                                <td>
                                    <div>
                                        <a class="btn btn-sm btn-primary" href="{{ route('product.edit', $pro->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> {{__('Edit')}}</a>
                                        <a onclick="return confirm('Bạn có muốn xoá product này không?')"
                                            class="btn btn-sm btn-danger" href="{{ route('product.delete', $pro->id) }}">
                                            <i class="bx bx-trash me-1"></i> {{__('Delete')}}</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {{-- {!! $product->withQueryString()->links('pagination::bootstrap-5') !!} --}}
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
    <!-- / Content -->
@endsection
