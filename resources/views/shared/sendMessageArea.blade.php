<div class="message-form">
    <form action="{{route('message.send', $place->id)}}" method="post">
        @csrf
        @method('POST')
        
        <div class="form-group">
            <label for="guest_name">Nome e cognome</label>
            <input class="form-control" type="text" name="guest_name" value="@auth {{ Auth::user()->name }} {{ Auth::user()->last_name }} @endauth {{old('guest_name')}}">
        </div>

        <div class="form-group">
            <label for="subject">Oggetto</label>
            <input class="form-control" type="text" name="subject" value="{{old('subject')}}">
        </div>
    
        <div class="form-group">
            <label for="mail_address">Email</label>
            <input class="form-control" type="email" name="mail_address" value="@auth {{ Auth::user()->email }} @endauth {{old('mail_address')}}">
        </div>
    
        <div class="form-group">
            <label for="message">Testo del messaggio</label>
            <textarea class="form-control" name="message" placeholder="Digita un messaggio">{{old('message')}}</textarea>
            <button class="btn btn-primary my-2" type="submit" name="button">Invia</button>
        </div>
    </form>
</div>