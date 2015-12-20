<div class="pull-right" style="margin-bottom:10px">
  <div class="btn-group">
      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      {{ trans('menus.categories.button') }} <span class="caret"></span>
      </button>

    <ul class="pull-right dropdown-menu" role="menu">
      <li><a href="{{route('admin.categories.index')}}">{{ trans('menus.categories.all') }}</a></li>
      <li><a href="{{route('admin.categories.create')}}">{{ trans('menus.categories.new') }}</a></li>
    </ul>

  </div>

</div>

<div class="clearfix"></div>
