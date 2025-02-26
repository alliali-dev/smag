@extends("layouts.app-home")
@section("title","Réinitialisation-du-mot-de-passe")
@section("content")
<div class="row">
    <div class="col-md-4 col-xl-4 col-lg-4"></div>
    <div class="col-md-4 col-xl-4 col-lg-4 col-xs-12 col-sm-12 content-justify">
        <fieldset
            style="border: red 2px; background-color:bisque; padding: 5%; margin:25% 10% 25% 10%; border-radius:5%;">
            <legend style="border: 1px; text-align:center;">Réinitialisation&nbsp;<span class="fa fa-pencil"></span>
            </legend>
            <hr>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <label for="email">Email</label>
                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                        name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password">Password</label>

                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password"
                        name="password" required autocomplete="current-password" value="{{old('password')}}" />

                    <error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password">Password</label>

                    <input id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                        name="password_confirmation" required autocomplete="current-password"
                        value="{{old('password_confirmation')}}" />

                    <error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Réinitialiser') }}
                    </button>
                </div>
            </form>
        </fieldset>
    </div>
    <div class="col-md-4 col-xl-4 col-lg-4"></div>
</div>
@stop