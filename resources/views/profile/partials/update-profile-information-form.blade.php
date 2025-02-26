<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Mdifier mes informations') }}
        </h2>

        {{-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p> --}}
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
    </form> --}}

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        {{-- @dd($user) --}}
        <div class="col-sm-6">
            <div class="form-group">
                <label class="form-label" for="first_name">Nom</label>
                <input placeholder="Koffi" id="first_name" type="text" name="nom"
                    class="form-control @error('nom') is-invalid @enderror" @if(old('nom')) value="{{old('nom')}}" @else
                    value="{{$user->nom}}" @endif>
                @error('nom') <span class="text text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="form-label" for="last_name">Pr&eacute;noms</label>
                <input placeholder="Konan Paulin" id="last_name" type="text"
                    class="form-control @error('prenoms') is-invalid @enderror" name="prenoms" @if(old('prenoms'))
                    value="{{old('prenoms')}}" @else value="{{$user->prenoms}}" @endif>
                @error('prenoms') <span class="text text-danger">{{$message}}</span>@enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" required
                    name="email" @if(old('email')) value="{{old('email')}}" @else value="{{$user->email}}" @endif>
                @error('email') <span class="text text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="form-label" for="photo">Photo</label>
                <input id="photo" type="file" name="photo" accept="image/"
                    class="form-control @error('photo') is-invalid @enderror" value="{{old('photo')}}">
                @error('photo') <span class="text text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary d-right">{{ __('Valider') }}</button>
        </div>
    </form>
</section>