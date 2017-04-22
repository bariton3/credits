@extends('layouts/app')

@section('header')
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
@stop

@section('sidebar-up')
    <h4>Text about credits</h4>
    Based on these variables the following calculation should be made to get the Interest amount per instalment:<br/>

    (Loan Amount * (1+ (Interest Rate / 12 * Number of Months))) / Number of Months.
@stop

@section('sidebar-left')
    <h3>Some text</h3>
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Payment Date</th>
                <th>Principal Repayment</th>
                <th>Interest Repayment</th>
            </tr>
            </thead>
            <tbody>
            @if ($credits->count())
                <table class="table table-bordered table-hover">
                    @foreach ($credits as $credit)

                        <tr>
                            <td>{{ $credit->loan_amount }}</td>
                            <td>{{ $credit->start_date }}</td>
                            <td>{{ $credit->interest_rate_per_year }}</td>
                            <td>{{ $credit->number_of_months }}</td>
                        </tr>
                        <tr>
                            <td colspan="4">

                        @for ($i = 1; $i <= $credit->number_of_months; $i++)
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($credit->start_date)->addMonth($i)}}</td>
                                    <td>{{ $credit->principal_payment}}</td>
                                    <td>{{ $credit->interest_payment}}</td>
                                </tr>
                            </table>
                        @endfor
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
            </tbody>
        </table>
    </div>
    <div><br/><br/></div>
    <h3>Create credit</h3>
    <div class="col-md-12">
        <form action="/credits" method="post">
            {{ csrf_field() }}
            <table class="table table-bordered">
                <tr><td>Loan Amount</td><td><input type="text" name="loan_amount"></td><tr>
                <tr><td>Start Date of the loan</td><td><input type="datetime" name="start_date"></td><tr>
                <tr><td>Interest rate per year</td><td><input type="text" name="interest_rate_per_year"></td><tr>
                <tr><td>Number of Months</td><td><input type="text" name="number_of_months"></td><tr>
            </table>
            <input type="submit" class="btn btn-primary" value="Create">
        </form>
    </div>
@stop
@section('sidebar-right')
    <h3>Logged in Users</h3>
    @if ($users->count())
        <table class="table table-bordered table-hover">
            @foreach ($users as $user)

                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{$user->created_at}}</td>
                </tr>

            @endforeach
        </table>
    @endif
@stop
