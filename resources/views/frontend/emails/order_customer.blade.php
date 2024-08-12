@extends('frontend.layouts.email')

@section('content')
  <h1>@lang('You received a new order from the system')</h1>

  <p>@lang('Content Order'): </p>

  <p>
    <strong>@lang('Fullname')</strong>: {{ $order->name }}
  </p>
  <p>
    <strong>@lang('Email')</strong>: {{ $order->email }}
  </p>
  <p>
    <strong>@lang('Phone')</strong>: {{ $order->phone }}
  </p>
  <p>
    <strong>@lang('Content note')</strong>: {{ $order->customer_note }}
  </p>
  @foreach ($data as $item)
  <p>
    <strong>@lang('Tên sản phẩm')</strong>: {{ $item['name_product']??"" }}
  </p>
  <p>
    <strong>@lang('Số lượng')</strong>: {{ $item['quantity'] ??""}}
  </p>
  <p>
    <strong>@lang('Đơn giá')</strong>: {{ $item['price']??"" }}
  </p>
  @endforeach
@endsection
