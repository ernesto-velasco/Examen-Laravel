<form method="POST" action="{{ $form_route }}">

    @csrf

    @if (isset($method) && $method == 'patch')
    @method('PATCH')
    @endif
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') ?? $data->name ?? ''  }}" autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') ?? $data->email ?? ''  }}" autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" autofocus>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

        <div class="col-md-6">
            <input id="password_confirmation" type="password"
                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                autofocus>

            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>

        <div class="col-md-6">
            <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age"
                value="{{ old('age') ?? $data->age ?? ''  }}" autocomplete="age">

            @error('age')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

        <div class="col-md-6">
            <div class="custom-control custom-radio">
                <input value="0" type="radio" id="gender-male" name="gender"
                    class="custom-control-input @error('gender') is-invalid @enderror"
                    @if(isset($data->gender) && $data->gender == 0) checked @endif>
                <label class="custom-control-label " for="gender-male">Male</label>
            </div>
            <div class="custom-control custom-radio">
                <input value="1" type="radio" id="gender-female" name="gender"
                    class="custom-control-input @error('gender') is-invalid @enderror"
                    @if(isset($data->gender) && $data->gender == 1) checked @endif>
                <label class="custom-control-label" for="gender-female">Female</label>
                @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">status</label>
        <div class="col-md-6">
            <div class="custom-control custom-radio">
                <input value="0" type="radio" id="status-active" name="status" class="custom-control-input"
                    @if(old('status')==0 || isset($data->status) && $data->status == 0) checked @endif>
                <label class="custom-control-label" for="status-active">Active</label>
            </div>
            <div class="custom-control custom-radio">
                <input value="1" type="radio" id="status-inactive" name="status" class="custom-control-input"
                    @if(old('status')==1 || isset($data->status) && $data->status == 1) checked @endif>
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