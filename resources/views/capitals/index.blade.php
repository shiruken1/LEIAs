@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Capitals
            <a class="btn btn-success pull-right" href="{{ route('capitals.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($capitals->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                        <th>START_AT</th>
                        <th>END_AT</th>
                        <th>DATE_START</th>
                        <th>DATE_END</th>
                        <th>INCOME_START</th>
                        <th>INCOME_END</th>
                        <th>EXPENSES_START</th>
                        <th>EXPENSES_END</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($capitals as $capital)
                            <tr>
                                <td>{{$capital->id}}</td>
                                <td>{{$capital->name}}</td>
                    <td>{{$capital->start_at}}</td>
                    <td>{{$capital->end_at}}</td>
                    <td>{{$capital->date_start}}</td>
                    <td>{{$capital->date_end}}</td>
                    <td>{{$capital->income_start}}</td>
                    <td>{{$capital->income_end}}</td>
                    <td>{{$capital->expenses_start}}</td>
                    <td>{{$capital->expenses_end}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('capitals.show', $capital->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('capitals.edit', $capital->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('capitals.destroy', $capital->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $capitals->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection