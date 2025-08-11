<x-layout-component>
    
<form class="contact-form" id="contactForm" method="POST" action="{{route('email.send')}}">
    @csrf
<div class="mb-3">
<label for="user_name" class="form-label">Nome</label>
<input value="{{ old('user_name') }}" type="text" class="form-control" id="user_name" name="user_name" placeholder="Inserisci il tuo nome">
@error('user_name')
    <span class="text-danger">{{ $message }}</span>
@enderror
</div>


<div class="mb-3">
<label for="user_email" class="form-label">Email</label>
<input value="{{ old('user_email') }}" type="email" class="form-control" id="user_email" name="user_email" placeholder="esempio@email.com">
@error('user_email')
    <span class="text-danger">{{ $message }}</span>
    
@enderror
</div>


<div class="mb-3">
<label for="user_phone" class="form-label">Telefono</label>
<input value="{{ old('user_phone') }}" type="tel" class="form-control" id="user_phone" name="user_phone" placeholder="Inserisci il numero di telefono">
@error('user_phone')
        <span class="text-danger">{{ $message }}</span>

@enderror
</div>


<div class="mb-3">
<label for="user_message" class="form-label">Messaggio</label>
<textarea class="form-control" id="user_message" name="user_message" rows="5" placeholder="Scrivi qui il tuo messaggio"></textarea>
@error('user_message')
    <span class="text-danger">{{ $message }}</span>
@enderror
</div>


<button type="submit" class="btn btn-primary">Invia</button>
</form>

</x-layout-component>