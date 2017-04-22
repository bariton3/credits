@extends('layouts/app')

@section('title', 'Create voucher')

@section('content')
    <h2>Create voucher</h2>
    <div class="row">
        <form action="/vouchers" method="post">
            {{ csrf_field() }}
            <table class="table table-bordered">
                <tr><td>Start date</td><td><input type="datetime" name="start_day"></td><tr>
                <tr><td>End date</td><td><input type="datetime" name="end_day"></td><tr>
                <tr><td>Discount</td><td><select name="discount_id">
                            @foreach ($discounts as $discount)
                            <option value="{{$discount->id}}">{{$discount->name}}</option>
                            @endforeach
                        </select></td><tr>
            </table>
            <input type="submit" class="btn btn-primary" value="Create">
        </form>
    </div>
    @if ($errors->any())
        <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
    @endif

@stop
