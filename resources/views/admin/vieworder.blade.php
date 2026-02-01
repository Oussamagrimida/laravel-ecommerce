@extends('admin.maindesign')


@section('view_order')

<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-shopping-cart mr-2"></i> Orders
        </h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" id="dataTable" width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Shipping Address</th>
                        <th>Products</th>
                        <th>Payment Method</th>
                        <th>Total Amount</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="font-weight-bold align-middle">#{{ $order->id }}</td>
                        <td class="font-weight-bold align-middle">{{ $order->user->name ?? 'N/A' }}</td>
                        <td class="text-left align-middle" style="font-size: 0.9rem;">
                            <div class="mb-1"><strong>Email:</strong> {{ $order->email }}</div>
                            <div class="mb-1"><strong>Mobile:</strong> {{ $order->mobile_no }}</div>
                            <div class="mb-1"><strong>Address:</strong> {{ $order->address_line1 }}</div>
                            @if($order->address_line2)
                            <div class="mb-1">{{ $order->address_line2 }}</div>
                            @endif
                            <div class="mb-1"><strong>City:</strong> {{ $order->city }}, {{ $order->state }}</div>
                            @if($order->zip_code)
                            <div class="mb-1"><strong>ZIP:</strong> {{ $order->zip_code }}</div>
                            @endif
                            @if($order->country)
                            <div><strong>Country:</strong> {{ $order->country }}</div>
                            @endif
                        </td>
                        <td class="text-left align-middle" style="font-size: 0.9rem;">
                            @foreach($order->orderItems as $item)
                                <div class="mb-3 pb-3 border-bottom" style="border-color: #e3e6f0 !important;">
                                    <div class="d-flex align-items-center mb-2">
                                        @if($item->product && $item->product->product_image)
                                        <img src="{{ asset('products/'.$item->product->product_image) }}" 
                                             alt="{{ $item->product->product_title ?? 'Product' }}" 
                                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px; margin-right: 10px;">
                                        @else
                                        <div style="width: 60px; height: 60px; background: #e3e6f0; border-radius: 4px; margin-right: 10px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                        @endif
                                        <div class="flex-grow-1">
                                            <div class="font-weight-bold mb-1">{{ $item->product->product_title ?? 'N/A' }}</div>
                                            <div class="text-muted small">
                                                <span class="mr-2"><strong>Qty:</strong> {{ $item->quantity }}</span>
                                                @if($item->color)
                                                <span class="mr-2"><strong>Color:</strong> {{ $item->color }}</span>
                                                @endif
                                                @if($item->size)
                                                <span><strong>Size:</strong> {{ $item->size }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </td>
                        <td class="font-weight-bold align-middle">{{ $order->payment_method }}</td>
                        <td class="font-weight-bold align-middle">${{ number_format($order->total, 2) }}</td>
                        <td class="font-weight-bold align-middle">{{ $order->created_at->format('M d, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>

                {{ $orders->links() }}
            </table>
        </div>
    </div>

</div>


@endsection