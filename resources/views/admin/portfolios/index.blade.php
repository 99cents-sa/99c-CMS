@extends('layouts.admin')
@section('content')
<div class="content">
    @can('portfolio_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.portfolios.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.portfolio.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.portfolio.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.link') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.client') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.text_colour') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.pinned') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.order') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.type') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($portfolios as $key => $portfolio)
                                    <tr data-entry-id="{{ $portfolio->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $portfolio->link ?? '' }}
                                        </td>
                                        <td>
                                            {{ $portfolio->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $portfolio->client ?? '' }}
                                        </td>
                                        <td>
                                            @if($portfolio->image)
                                                <a href="{{ $portfolio->image->getUrl() }}" target="_blank">
                                                    <img src="{{ $portfolio->image->getUrl('thumb') }}" width="50px" height="50px">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ App\Portfolio::TEXT_COLOUR_RADIO[$portfolio->text_colour] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $portfolio->pinned ? trans('global.yes') : trans('global.no') }}
                                        </td>
                                        <td>
                                            {{ $portfolio->order ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Portfolio::TYPE_RADIO[$portfolio->type] ?? '' }}
                                        </td>
                                        <td>
                                            @can('portfolio_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.portfolios.show', $portfolio->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('portfolio_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.portfolios.edit', $portfolio->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('portfolio_delete')
                                                <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan
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
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.portfolios.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('portfolio_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection