@extends('layouts.master')
@section('content')
    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
        <input type="hidden" id="amount" name="amount" value="{{ $cart_total }}" required>
        <input type="hidden" id="tax_amount" name="tax_amount" value ="{{$cart->tax}}" required>
        <input type="hidden" id="total_amount" name="total_amount" value="{{ $cart_total+$cart->tax }}" required>
        <input type="hidden" id="transaction_uuid" name="transaction_uuid"required>
        <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
        <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
        <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
        <input type="hidden" id="success_url" name="success_url" value="{{route('order.store',$cart->id)}}" required>
        <input type="hidden" id="failure_url" name="failure_url" value="https://google.com" required>
        <input type="hidden" id="signed_field_names" name="signed_field_names"
            value="total_amount,transaction_uuid,product_code" required>
        <input type="hidden" id="signature" name="signature" required>
        <button class="bg-blue-900 text-white px-3 py-2 rounded block w-48 mx-auto hover:bg-black cursor-pointer flex items-center justify-center space-x-2">
            <i class="fas fa-wallet"></i>
            <span>Pay with eSewa</span>
        </button>

    </form>

    <form action="{{route('order.storecod')}}" method="POST">
        @csrf
        <input type="hidden" name="cart_id" value="{{$cart->id}}">
        <button class="bg-green-600 text-white px-3 py-2 rounded block w-64 mx-auto mt-2 hover:bg-black cursor-pointer flex items-center justify-center space-x-2">
            <i class="fas fa-money-bill-wave"></i>
            <span>Cash on Delivery</span>
          </button>

    </form>

    {{-- Yo ta garnai parxa esewa halna --}}
    @php
        $transaction_uuid = auth()->id(). '-'.time();
        $totalamount = $cart_total+$cart->tax;
        $product_code = 'EPAYTEST';
        $datastring = "total_amount=".$totalamount.",transaction_uuid=".$transaction_uuid.",product_code=".$product_code;
        $secret = '8gBm/:&EnhH.1/q';
        $signature = hash_hmac('sha256', $datastring, $secret, true);
        $signature = base64_encode($signature);
    @endphp

    <script>
        document.getElementById('transaction_uuid').value = '{{$transaction_uuid}}';
        document.getElementById('signature').value = '{{$signature}}';
    </script>
@endsection



