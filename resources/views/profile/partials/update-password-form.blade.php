<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Modifier votre mot de passe') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            @include('layouts.flash')
        </p>
    </header>
    <div class="card-body">
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="us" value="{{$user->id}}">
            {{-- <div class="position-relative">
                <label for="update_password_current_password">Mot de passe actuel</label>
                <input class="form-control @error('current_password') is-invalid @enderror"
                    id="update_password_current_password" name="current_password" type="password"
                    class="mb-2 block w-full" autocomplete="current-password">
                <span class="show-pass eye" onclick="javascript:function pas(){
                let curentP=document.getElementById('update_password_current_password');
                    curentP.type=='password'?curentP.type='text':curentP.type='password'}; pas();">
                    <i class="fa fa-eye-slash"></i>
                    <i class="fa fa-eye"></i>
                </span>
                @error('current_password') <span class="text text-danger">{{$message}}</span>@enderror
    </div> --}}
    <br>
    <div class="position-relative">
        <label for="update_password_password">Nouveau mot de passe</label>
        <input class="form-control @error('password') is-invalid @enderror" id="update_password_password"
            name="password" type="password" class="mb-4 block w-full" autocomplete="new-password"
            value="{{old('password')}}">
        <span class="show-pass eye" onclick="javascript:function npas(){
                    let NewP=document.getElementById('update_password_password');
                        NewP.type=='password'?NewP.type='text':NewP.type='password'}; npas();">
            <i class="fa fa-eye-slash"></i>
            <i class="fa fa-eye"></i>
        </span>
        @error('password') <span class="text text-danger">{{$message}}</span>@enderror
    </div>
    <br>
    <div class="position-relative">
        <label for="update_password_password_confirmation">Confirmer</label>
        <input id="update_password_password_confirmation" name="password_confirmation" type="password"
            class="form-control @error('password_confirmation') is-invalid @enderror mb-4 block w-full"
            autocomplete="new-password" value="{{old('password_confirmation')}}">
        <span class="show-pass eye" onclick="javascript:function cpas(){
                    let confP=document.getElementById('update_password_password_confirmation');
                        confP.type=='password'?confP.type='text':confP.type='password'}; cpas();">
            <i class="fa fa-eye-slash"></i>
            <i class="fa fa-eye"></i>
        </span>
        @error('password_confirmation') <span class="text text-danger">{{$message}}</span>@enderror
    </div>
    <br>
    <div class="flex items-center gap-4">
        <button type="submit" class="btn btn-primary d-right">{{ __('Valider') }}</button>
    </div>
    </form>
    </div>

</section>