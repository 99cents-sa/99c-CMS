@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.portfolio.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.portfolios.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                            <label for="link">{{ trans('cruds.portfolio.fields.link') }}*</label>
                            <input type="text" id="link" name="link" class="form-control" value="{{ old('link', isset($portfolio) ? $portfolio->link : '') }}" required>
                            @if($errors->has('link'))
                                <p class="help-block">
                                    {{ $errors->first('link') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.portfolio.fields.link_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.portfolio.fields.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($portfolio) ? $portfolio->name : '') }}" required>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.portfolio.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('client') ? 'has-error' : '' }}">
                            <label for="client">{{ trans('cruds.portfolio.fields.client') }}*</label>
                            <input type="text" id="client" name="client" class="form-control" value="{{ old('client', isset($portfolio) ? $portfolio->client : '') }}" required>
                            @if($errors->has('client'))
                                <p class="help-block">
                                    {{ $errors->first('client') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.portfolio.fields.client_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image">{{ trans('cruds.portfolio.fields.image') }}*</label>
                            <div class="needsclick dropzone" id="image-dropzone">

                            </div>
                            @if($errors->has('image'))
                                <p class="help-block">
                                    {{ $errors->first('image') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.portfolio.fields.image_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('text_colour') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.portfolio.fields.text_colour') }}*</label>
                            @foreach(App\Portfolio::TEXT_COLOUR_RADIO as $key => $label)
                                <div>
                                    <input id="text_colour_{{ $key }}" name="text_colour" type="radio" value="{{ $key }}" {{ old('text_colour', null) === (string)$key ? 'checked' : '' }} required>
                                    <label for="text_colour_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('text_colour'))
                                <p class="help-block">
                                    {{ $errors->first('text_colour') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.portfolio.fields.description') }}*</label>
                            <textarea id="description" name="description" class="form-control ckeditor">{{ old('description', isset($portfolio) ? $portfolio->description : '') }}</textarea>
                            @if($errors->has('description'))
                                <p class="help-block">
                                    {{ $errors->first('description') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.portfolio.fields.description_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('pinned') ? 'has-error' : '' }}">
                            <label for="pinned">{{ trans('cruds.portfolio.fields.pinned') }}*</label>
                            <input name="pinned" type="hidden" value="0">
                            <input value="1" type="checkbox" id="pinned" name="pinned" {{ old('pinned', 0) == 1 ? 'checked' : '' }} required>
                            @if($errors->has('pinned'))
                                <p class="help-block">
                                    {{ $errors->first('pinned') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.portfolio.fields.pinned_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('order') ? 'has-error' : '' }}">
                            <label for="order">{{ trans('cruds.portfolio.fields.order') }}*</label>
                            <input type="number" id="order" name="order" class="form-control" value="{{ old('order', isset($portfolio) ? $portfolio->order : '') }}" step="1" required>
                            @if($errors->has('order'))
                                <p class="help-block">
                                    {{ $errors->first('order') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.portfolio.fields.order_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.portfolio.fields.type') }}*</label>
                            @foreach(App\Portfolio::TYPE_RADIO as $key => $label)
                                <div>
                                    <input id="type_{{ $key }}" name="type" type="radio" value="{{ $key }}" {{ old('type', null) === (string)$key ? 'checked' : '' }} required>
                                    <label for="type_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('type'))
                                <p class="help-block">
                                    {{ $errors->first('type') }}
                                </p>
                            @endif
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.portfolios.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="image"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($portfolio) && $portfolio->image)
      var file = {!! json_encode($portfolio->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop