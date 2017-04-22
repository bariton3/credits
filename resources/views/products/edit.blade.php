@extends('layouts/app')

@section('title', 'Edit product')

@section('content')
<h2>Edit product</h2>
<div class="row">
    <form action="/products/{{$product->id}}" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered">
            <tr>
                <td>{{$product->name}}</td>
                <td></td>
            <tr>
            <tr>
                <td>Attach voucher:</td>
                <td>Detach voucher:</td>
            <tr>
            <tr>
                <td>
                    <select name="attach_voucher_id">
                        <option value=""></option>
                        @foreach ($vouchers as $voucher)
                            @if(!in_array($voucher->id, array_column($product->vouchers->toArray(),'id')))
                            <option value="{{$voucher->id}}">{{$voucher->discount->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="detach_voucher_id">
                        <option value=""></option>
                        @foreach ($product->vouchers as $voucher)
                            <option value="{{$voucher->id}}">{{$voucher->discount->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        {{ method_field('PUT') }}
        <input type="submit" class="btn btn-primary" value="Update">
    </form>
</div>
@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif
<script>
    $('select').change(function(){
        $(this).closest('tr').find('select').not(this).prop('disabled', this.value !== "")
    });
</script>
@stop
