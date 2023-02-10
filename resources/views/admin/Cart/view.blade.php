@extends('dashboard')
@section('admin_content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> {{__('Order Details & Shipping')}}</h4>

        <!-- Order Details -->
        <div class="card">
            <h5 class="card-header">{{__('Order Details')}}</h5>
            <div class="table-responsive text-nowrap">
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th>{{ __('STT') }}</th>
                            <th>{{ __('Tên sản phẩm') }}</th>
                            <th>{{ __('Giá sản phẩm') }}</th>
                            <th>{{ __('Số lượng') }}</th>
                            <th>{{ __('Tổng tiền') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($cart->order_details as $order_detail)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $order_detail->product_name }}</td>
                                <td>{{ $order_detail->product_price }}</td>
                                <td>{{ $order_detail->quantity }}</td>
                                <td>{{ $order_detail->product_price * $order_detail->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        {{-- Shipping --}}
        <div class="card">
            <h5 class="card-header">{{__('Shipping')}}</h5>
            <div class="table-responsive text-nowrap">
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th>{{ __('Tên người nhận') }}</th>
                            <th>{{ __('Số điện thoại') }}</th>
                            <th>{{ __('Địa chỉ') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                            <tr>
                                <td>{{ $cart->shipping->name }}</td>
                                <td>{{ $cart->shipping->phone }}</td>
                                <td>{{ $cart->shipping->address }}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
    <!-- / Content -->
@endsection
