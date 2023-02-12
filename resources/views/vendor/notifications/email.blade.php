@php
    $user_id = Auth::user()->id;
    $order = App\Models\Order::with('order_details', 'shipping','user')
        ->where('user_id', $user_id)
        ->orderBy('created_at', 'desc')
        ->first();
@endphp
<div class="card">
    <h5 class="card-header">{{ __('Hoá đơn') }}</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('Mã đơn hàng') }}</th>
                    <th>{{ __('Tên người đặt') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Tổng tiền') }}</th>
                    <th>{{ __('Tình Trạng') }}</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->email }}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>
                        @php
                            if ($order->order_status == \App\Constants\Params::ORDER_START) {
                                echo 'Đơn hàng đang chờ xử lý';
                            } elseif ($order->order_status == \App\Constants\Params::ORDER_END) {
                                echo 'Đơn hàng đã gửi';
                            } else {
                                echo 'Chờ';
                            }
                        @endphp
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="card">
    <h5 class="card-header">{{ __('Chi tiết hoá đơn') }}</h5>
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
                @foreach ($order->order_details as $order_detail)
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
    <h5 class="card-header">{{ __('Thông tin nhận hàng') }}</h5>
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
                    <td>{{ $order->shipping->name }}</td>
                    <td>{{ $order->shipping->phone }}</td>
                    <td>{{ $order->shipping->address }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
