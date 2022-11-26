@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">
                    {{ Auth::user()->name }}さんのカート</h1>
                <div class="">
                    <p class="text-center">{{ $message ?? '' }}</p>
                    <div class="d-flex flex-row flex-wrap">
                        @foreach ($my_carts as $my_cart)
                            <ul>
                                <div class="mycart-box">
                                    <li>ユーザID:{{ $my_cart->user_id }}</li>
                                    <li>ストックID:{{ $my_cart->stock_id }}</li>
                                </div>
                            </ul>
                        @endforeach
                    </div>
                    <a href="/" type="button" class="btn btn-secondary">一覧に戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection
