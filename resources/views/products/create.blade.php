@extends('layouts/app')

@section('title', 'Create product')

@section('content')
<h2>Create product</h2>
<div class="row">
    <form action="/products" method="post">
        {{ csrf_field() }}
        <table class="table table-bordered">
            <tr><td>Name</td><td><input type="text" name="name"></td><tr>
            <tr><td>Price</td><td><input type="text" name="price"></td><tr>
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