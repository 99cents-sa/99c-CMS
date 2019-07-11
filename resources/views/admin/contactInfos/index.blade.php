@extends('layouts.admin')
@section('content')
<div class="content">
    @can('contact_info_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.contact-infos.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.contactInfo.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.contactInfo.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.contactInfo.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactInfo.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactInfo.fields.phone') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contactInfos as $key => $contactInfo)
                                    <tr data-entry-id="{{ $contactInfo->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $contactInfo->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactInfo->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactInfo->phone ?? '' }}
                                        </td>
                                        <td>
                                            @can('contact_info_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.contact-infos.show', $contactInfo->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('contact_info_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.contact-infos.edit', $contactInfo->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('contact_info_delete')
                                                <form action="{{ route('admin.contact-infos.destroy', $contactInfo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.contact-infos.massDestroy') }}",
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
@can('contact_info_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection