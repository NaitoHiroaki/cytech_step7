@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="h1 mb-4">商品一覧画面</div>
                    <!-- {{ __('You are logged in!') }} -->
                    <table id="table" border="1">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>商品画像</td>
                            <td>商品名</td>
                            <td>価格</td>
                            <td>在庫数</td>
                            <td>メーカー名</td>
                            <td colspan="2">
                                <div class="text-center">
                                <button type="submit" class="btn btn-warning">
                                    <a class="nav-link" href="{{ route('product_register') }}">{{ __('新規登録') }}</a>
                                </button>
                                </div>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}.</td>
                            <td>商品画像</td>
                            <td>{{ $product->product_name }}</td>
                            <td>¥{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                @if($product->maker_name === "1")
                                Coca-Cola
                                @endif
                                @if($product->maker_name === "2")
                                サントリー
                                @endif
                                @if($product->maker_name === "3")
                                キリン
                                @endif
                            </td>
                            <td>
                                <div class="text-center">
                                <button type="submit" class="btn btn-info">
                                    <a class="nav-link" href="{{ route('show', ['id' => $product->id ] ) }}">{{ __('詳細') }}</a>
                                </button>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('destroy', ['id'=>$product->id]) }}" method="POST">
                                    @csrf
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-danger">削除</button>
                                    </div>
                                </form>
                            </td>
                        </tr>                    
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
