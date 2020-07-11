<div class="message-form">
    <form action="{{route('message.send', $place->id)}}" method="post">
        @csrf
        @method('POST')
        
        <div class="form-group">
            <label for="guest_name">Nome e cognome</label>
            <input type="text" name="guest_name" value="@auth {{ Auth::user()->name }} {{ Auth::user()->last_name }} @endauth">
        </div>

        <div class="form-group">
            <label for="subject">Oggetto</label>
            <input type="text" name="subject" value="">
        </div>
    
        <div class="form-group">
            <label for="mail_address">Email</label>
            <input type="email" name="mail_address" value="
            @auth
                {{ Auth::user()->email }}
            @endauth
            ">
        </div>
    
        <div class="form-group">
            <label for="message">Testo del messaggio</label>
            <textarea name="message" placeholder="Digita un messaggio"></textarea>
            <button type="submit" name="button">Invia</button>
        </div>
    </form>
</div>