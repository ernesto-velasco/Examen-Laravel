<form method="POST" action="{{ $form_route }}">

        @csrf

        @if (isset($method) && $method == 'patch')
            @method('PATCH')
        @endif
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $data->name ?? ''  }}" autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">status</label>
            <div class="col-md-6">
                <div class="custom-control custom-radio">
                    <input value="0" type="radio" id="status-active" name="status" class="custom-control-input" @if(old('status') == 0 || isset($data->status) && $data->status == 0) checked @endif>
                    <label class="custom-control-label" for="status-active">Active</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input value="1" type="radio" id="status-inactive" name="status" class="custom-control-input" @if(old('status') == 1 || isset($data->status) && $data->status == 1) checked @endif>
                    <label class="custom-control-label" for="status-inactive">Inactive</label>
                  </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
            </div>
        </div>

    </form>