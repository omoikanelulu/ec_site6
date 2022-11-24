@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">カート一覧</h1>
                <div class="">
                    <div class="d-flex flex-row flex-wrap">
                        カート内商品
                        @foreach ($my_carts as $my_cart)
                            <ul>
                                <li>{{ $my_cart->id }}</li>
                                <li>{{ $my_cart->stock_id }}</li>
                                {{-- <li><img src="/image/{{ $my_cart->img_path }}" alt="" class="incart"></li> --}}
                                <li>{{ $my_cart->user_id }}</li>
                            </ul>
                        @endforeach
                        {{-- {{ $my_cart->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
