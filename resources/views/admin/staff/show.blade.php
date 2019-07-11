@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.staff.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staff.fields.image') }}
                                    </th>
                                    <td>
                                        <a href="{{ $staff->image->getUrl() }}" target="_blank">
                                            <img src="{{ $staff->image->getUrl('thumb') }}" width="50px" height="50px">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staff.fields.name') }}
                                    </th>
                                    <td>
                                        <a href="{{ $staff->name->getUrl() }}" target="_blank">
                                            <img src="{{ $staff->name->getUrl('thumb') }}" width="50px" height="50px">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staff.fields.role') }}
                                    </th>
                                    <td>
                                        {{ $staff->role }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staff.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $staff->description !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection