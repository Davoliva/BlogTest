
<form>
@csrf
    <div class="form-group">
        <label for="">
            <input type="file" name="avatar">
        </label>
        {!! $errors->first('avatar', ' <span class=error>:message</span> ') !!}
    </div>
    <div class="form-group">
        <label class="exampleFormControlInput1" for="nombre">Nombre</label>
        <input class="form-control" type="text" name="name" value="{{ $user->name or old('name') }}">
        {!! $errors->first('name', ' <span class=error>:message</span> ') !!}
    </div>
    <div class="form-group">
        <label class="exampleFormControlInput2" for="email">Email</label>
        <input class="form-control" type="text" name="email" value="{{ $user->email or old('email') }}">
        {!! $errors->first('email', ' <span class=error>:message</span> ') !!}
    </div>
    @unless ($user->id)
        <div class="form-group">
            <label class="exampleFormControlInput3" for="password">Contraseña</label>
            <input class="form-control" type="password" name="password">
            {!! $errors->first('password', ' <span class=error>:message</span> ') !!}
        </div>
        <div class="form-group">
            <label class="exampleFormControlInput3" for="password_confirmation">Confirmar contraseña</label>
            <input class="form-control" type="password" name="password_confirmation">
            {!! $errors->first('password_confirmation', ' <span class=error>:message</span> ') !!}
        </div>
    @endunless
    <div class="form-check">
        @foreach ($roles as $id => $name)
            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                value="{{ $id }}"
                {{ $user->roles->pluck('id')->contains($id) ? 'checked': '' }}
                name="roles[]">
            <label class="form-check-label" for="exampleCheck1">
                {{ $name }}
            </label>
        @endforeach
    </div>
    {!! $errors->first('roles', ' <span class=error>:message</span> ') !!}
    <hr>
    <input class="btn btn-primary" type="submit" value="Guardar">
</form>
