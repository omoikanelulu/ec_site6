@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">
                    {{ Auth::user()->name }}さんのカート</h1>
                <div class="">
                    <p class="text-center">{{ $message ?? '' }}</p>
                    @if ($my_carts->isNotEmpty())
                        <div class="d-flex flex-row flex-wrap justify-content-center">
                            @foreach ($my_carts as $my_cart)
                                <ul>
                                    <div class="mycart-box">
                                        <li>{{ $my_cart->stock->name }}</li>
                                        <li>${{ number_format($my_cart->stock->fee) }}</li>
                                        <li><img src="/image/{{ $my_cart->stock->img_path }}" alt="" class="incart">
                                        </li>
                                        <form action="/cartdelete" method="post">
                                            @csrf
                                            <input type="hidden" name="stock_id" value="{{ $my_cart->stock->id }}">
                                            <input type="submit" value="カートから削除する">
                                        </form>
                                    </div>
                                </ul>
                            @endforeach
                        </div>
                        <div class="text-center p-2">
                            個数:{{ $count }}個<br>
                            <p style="font-size: 1.2em; font-weight:bold;">合計金額:${{ number_format($sum) }}</p>
                            <form action="/checkout" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-lg text-center buy-btn">購入</button>
                            </form>
                        </div>
                    @else
                        <div class="text-center p-2">
                            <p>カートは空です</p>
                        </div>
                    @endif
                </div>
                <a href="/" type="button" class="btn btn-secondary">一覧に戻る</a>
            </div>
        </div>
    </div>
@endsection
