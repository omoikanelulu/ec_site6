@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
                <div class="">
                    <div class="row">
                        @foreach ($stocks as $stock)
                            <div class="col-4 d-flex justify-content-center">
                                <ul>
                                    <li>{{ $stock->name }}</li>
                                    <li>${{ number_format($stock->fee) }}</li>
                                    <li><img src="/image/{{ $stock->img_path }}" alt="" class="incart"></li>
                                    <li>{{ $stock->detail }}</li>
                                    <form action="mycart" method="post" class="d-flex justify-content-center">
                                        @csrf
                                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                        <input type="submit" value="カートに入れる" class="btn btn-primary">
                                    </form>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="/" class="">商品一覧へ</a>
                            <div class="" style="width: 200px; margin:20px auto;">
                                {{ $stocks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
