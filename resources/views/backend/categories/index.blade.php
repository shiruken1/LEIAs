@extends ('backend.layouts.master')

@section ('title', trans('menus.categories.management'))

@section('page-header')
    <h1>
        {{ trans('menus.categories.management') }}
        <small>{{ trans('menus.categories.available') }}</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">{!! link_to_route('admin.categories.index', trans('menus.categories.management')) !!}</li>
@stop

@section('content')
    @include('backend.access.includes.partials.category_header-buttons')
    @inject('Category', 'App\Category')
    <div class="row">
        <div class="col-md-12">
            @if($categories->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Subcategories</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categories[0] as $main_cats)

                            <td>{{$main_cats->name}}</td>
                            <td></td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.categories.show', $main_cats->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.categories.edit', $main_cats->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('admin.categories.destroy', $main_cats->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            
                            @if(isset($categories[$main_cats->id]))
                                @foreach($categories[$main_cats->id] as $sub_cat)
                                    <tr>
                                        <td class="text-right">---></td>
                                        <td>{{$sub_cat->name}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.categories.show', $sub_cat->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                            <a class="btn btn-xs btn-warning" href="{{ route('admin.categories.edit', $sub_cat->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                            <form action="{{ route('admin.categories.destroy', $sub_cat->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                            </form>                                
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center alert alert-info">{{ trans('crud.categories.empty') }}</h3>
            @endif

        </div>
    </div>

@endsection