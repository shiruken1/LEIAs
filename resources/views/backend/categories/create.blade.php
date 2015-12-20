@extends ('backend.layouts.master')

@section ('title', trans('menus.categories.management'))

@section('page-header')
    <h1>
        {{ trans('menus.categories.management') }}
        <small>{{ trans('menus.categories.new') }}</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">{!! link_to_route('admin.categories.index', trans('menus.categories.management')) !!}</li>
    <li class="active">{!! link_to_route('admin.categories.create', trans('menus.categories.new')) !!}</li>
@stop

@section('content')
    @include('backend.access.includes.partials.category_header-buttons')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('admin.categories.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}" required/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>

                    @if($categories->count())
                      <div class="form-group @if($errors->has('subcat_id')) has-error @endif">
                         <label for="subcat_id-field">Subcategory of:</label>

                         <select type="text" id="subcat_id-field" name="subcat_id" class="form-control" required>
                          <option value="" hidden>{{ trans('crud.categories.none') }}</option>

                          @foreach($categories[0] as $main_cats)
                            <option value="{{$main_cats->id}}">{{$main_cats->name}}</option>
                            @if(isset($categories[$main_cats->id]))
                              @foreach($categories[$main_cats->id] as $sub_cat)
                                <option value="{{$sub_cat->id}}"> ->{{$sub_cat->name}}</option>
                              @endforeach
                            @endif
                          @endforeach
                         </select>
                         @if($errors->has("subcat_id"))
                          <span class="help-block">{{ $errors->first("subcat_id") }}</span>
                         @endif
                      </div>
                    @else
                      <input type="text" id="subcat_id-field" name="subcat_id" class="form-control" value="" style="visibility: hidden;" />
                    @endif

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

        </div>
    </div>
@endsection