@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
          @csrf
          @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="form-group row">
                    <label for="firstName" class="col-md-4 col-form-label">First Name</label>

                    <input id="firstName"
                           type="text"
                           class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}"
                           name="firstName"
                           value="{{ old('firstName') ?? $user->firstName}}"
                           autocomplete="firstName" autofocus>

                    @if ($errors->has('firstName'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('firstName') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="lastName" class="col-md-4 col-form-label">Last Name</label>

                    <input id="lastName"
                           type="text"
                           class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}"
                           name="lastName"
                           value="{{ old('lastName') ?? $user->lastName}}"
                           autocomplete="lastName" autofocus>

                    @if ($errors->has('lastName'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lastName') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                    <input id="description"
                           type="text"
                           class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                           name="description"
                           value="{{ old('description') ?? $user->description}}"
                           autocomplete="description" autofocus>

                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">Website</label>

                    <input id="url"
                           type="text"
                           class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
                           name="url"
                           value="{{ old('url') ?? $user->url}}"
                           autocomplete="url" autofocus>

                    @if ($errors->has('url'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Picture</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Update Profile</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
