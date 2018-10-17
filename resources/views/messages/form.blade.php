    @csrf

    <div class="row">
        <div class="col-12 col-md-9 pull-md-3 bd-content py-3 ">
            <h1>Contactos</h1>
            <h2>Escribeme</h2>

            @if (session()->has('info'))
                <h3>{{ session('info') }}</h3>
            @else
            <form>
                @if($showFields)
                    <div class="form-group">
                        <label class="exampleFormControlInput1" for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" value="{{ $message->nombre or old('nombre') }}">
                        {!! $errors->first('nombre', ' <span class=error>:message</span> ') !!}
                    </div>
                    <div class="form-group">
                        <label class="exampleFormControlInput1" for="email">Email</label>
                        <input class="form-control" type="text" name="email" value="{{ $message->email or old('email') }}">
                        {!! $errors->first('email', ' <span class=error>:message</span> ') !!}
                    </div>
                @endunless
                <div class="form-group">
                    <label class="exampleFormControlTextarea1" for="mensaje">mensaje</label>
                    <textarea class="form-control" name="mensaje" id="" cols="30" rows="10">{{$message->mensaje or old('mensaje') }}</textarea>
                    {!! $errors->first('mensaje', ' <span class=error>:message</span> ') !!}
                </div>

                 <input class="btn btn-primary" type="submit" value="{{ $btnText or 'Guardar' }}">
            </form>
            @endif
        </div>
    </div>
</form>
