@extends('layouts/app')

@section('title', 'Products')

@section('content')
    <h2>Products</h2>
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-3">
            <a href="{{ URL::route('vouchers.create') }}"
               class='btn btn-primary'>add voucher</a>
        </div>
        <div class="col-sm-3">
            <a href="{{ URL::route('products.create') }}"
               class='btn btn-primary'>add product</a>
        </div>
    </div>
    <div>&nbsp;</div>
    @if ($products->count())
        <table class="table table-bordered table-hover">
            @foreach ($products as $product)

                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td> @foreach ($product->vouchers as $voucher) {{ $voucher->discount->name }} @endforeach</td>
                    <td><a href="{{ URL::route('products.edit', [$product->id]) }}"
                           class='btn btn-warning'>attach/detach voucher</a>
                    </td>
                    <td>
                        <form action="/products/{{$product->id}}" method="post">{{ method_field('PUT') }}<input type="hidden" name="sold" value="true"><input type="button" class="btn btn-success" value="Buy"></form>
                    </td>
                </tr>

            @endforeach
        </table>
    @else
        <p>
            You haven't created any tasks.
            <a href="{{ URL::route('products.create') }}"
               class='btn btn-primary'>Create a product</a>
        </p>
    @endif

@endsection