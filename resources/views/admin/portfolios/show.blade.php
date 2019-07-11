@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.portfolio.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.link') }}
                                    </th>
                                    <td>
                                        {{ $portfolio->link }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $portfolio->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.client') }}
                                    </th>
                                    <td>
                                        {{ $portfolio->client }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.image') }}
                                    </th>
                                    <td>
                                        <a href="{{ $portfolio->image->getUrl() }}" target="_blank">
                                            <img src="{{ $portfolio->image->getUrl('thumb') }}" width="50px" height="50px">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.text_colour') }}
                                    </th>
                                    <td>
                                        {{ App\Portfolio::TEXT_COLOUR_RADIO[$portfolio->text_colour] }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $portfolio->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.pinned') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled {{ $portfolio->pinned ? "checked" : "" }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.order') }}
                                    </th>
                                    <td>
                                        {{ $portfolio->order }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.portfolio.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Portfolio::TYPE_RADIO[$portfolio->type] }}
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