@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
                <div class="">
                    <div class="d-flex flex-row flex-wrap">
                        商品一覧を出したい
                        @foreach ($stocks as $stock)
                            <ul>
                                <li>{{ $stock->name }}</li>
                                <li>{{ $stock->fee }}</li>
                                <li><img src="/image/{{ $stock->img_path }}" alt="" class="incart"></li>
                                <li>{{ $stock->detail }}</li>
                                <form action="mycart" method="post">
                                    @csrf
                                    <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                    <input type="submit" value="カートに入れる" class="btn btn-primary">
                                </form>
                                <a href="/" class="text-center">商品一覧へ</a>

                            </ul>
                        @endforeach
                        <div class="text-center" style="width: 200px; margin:20px auto;">
                            {{ $stocks->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
