<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => ':attribute deve essere una data successiva a :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => ':attribute deve essere una data precedente a :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => ':attribute di conferma non corrisponde.',
    'date' => ':attribute non è una data valida.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => ':attribute deve essere un indirizzo email valido.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => ':attribute deve essere un\' immagine.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'Il valore di :attribute non può essere superiore di :max.',
        'file' => 'La dimensione di :attribute non può essere superiore di :max kilobytes.',
        'string' => ':attribute non può contenere più di :max caratteri.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'Il valore di :attribute deve essere almeno di :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => ':attribute deve contenere almeno :min caratteri.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute deve essere un valore numerico.',
    'password' => 'La password non è corretta.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'Il formato di :attribute non è valido.',
    'required' => 'Il campo di :attribute è richiesto.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => ':attribute deve essere un valore testuale.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => ':attribute non è disponibile.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        /*'attribute-name' => [
            'rule-name' => 'custom-message',
        ],*/
        'guest_name' => [
            'required' => 'Nome e cognome sono richiesti.',
            'not_regex' => 'Il formato del testo inserito in "Nome e Cognome" non è valido.',
            'string' => 'Nome e cognome devono avere valore testuale.',
            'min' => 'Il campo "Nome e cognome" deve contenere almeno :min caratteri.',
            'max' => 'Il campo "Nome e cognome" non può contenere più di :max caratteri.'
        ],
        'subject' => [
            'required' => 'L\'oggetto del messaggio è richiesto.',
            'not_regex' => 'Il formato del testo inserito in "Oggetto" non è valido.',
            'string' => 'L\'oggetto del messaggio deve avere valore testuale.',
            'min' => 'Il campo "Oggetto" deve contenere almeno :min caratteri.',
            'max' => 'Il campo "Oggetto" non può contenere più di :max caratteri.'
        ],
        'mail_address' => [
            'required' => 'L\'indirizzo email è richiest0.',
            'email' => 'L\'indirizzo email inserito non è valido.',
            'string' => 'L\'indirizzo email deve avere valore testuale.',
            'max' => 'L\'indirizzo email non può contenere più di :max caratteri.'
        ],
        'message' => [
            'required' => 'Il testo del messaggio è richiesto.',
            'not_regex' => 'Il formato del testo inserito in "Messaggio" non è valido.',
            'string' => 'Il testo del messaggio deve avere valore testuale.',
            'min' => 'Il testo del messaggio deve contenere almeno :min caratteri.',
            'max' => 'Il testo del messaggio non può contenere più di :max caratteri.'
        ],
        'name' => [
            'required' => 'Il nome è richiesto.',
            'string' => 'Il nome deve avere valore testuale.',
            'max' => 'Il nome non può contenere più di :max caratteri.'
        ],
        'last_name' => [
            'required' => 'Il cognome è richiesto.',
            'string' => 'Il cognome deve avere valore testuale.',
            'max' => 'Il cognome non può contenere più di :max caratteri.'
        ],
        'birth_date' => [
            'required' => 'La data di nascita è richiesta.',
            'date' => 'La data inserita non ha valore valido.',
            'after' => 'La data di nascita deve essere successiva a :date.',
            'before' => 'La data di nascita deve essere precedente a :date.'
        ],
        'email' => [
            'required' => 'L\'indirizzo email è richiest0.',
            'email' => 'L\'indirizzo email inserito non è valido.',
            'string' => 'L\'indirizzo email deve avere valore testuale.',
            'max' => 'L\'indirizzo email non può contenere più di :max caratteri.',
            'unique' => 'L\'indirizzo email è già in uso da un altro utente.'
        ],
        'password' => [
            'required' => 'La password è richiesta.',
            'string' => 'La password deve avere valore testuale.',
            'min' => 'La password deve contenere almeno :min caratteri.',
            'confirmed' => 'La password di conferma non corrisponde.'
        ],
        'title'=> [
            'required' => 'Il titolo è richiesto.',
            'not_regex' => 'Il formato del Titolo non è valido.',
            'string' => 'Il titolo deve avere valore testuale.',
            'min' => 'Il titolo deve contenere almeno :min caratteri.',
            'max' => 'Il titolo non può contenere più di :max caratteri.'
        ],
        'description'=> [
            'required' => 'La descrizione è richiesta.',
            'not_regex' => 'Il formato della Descrizione non è valido.',
            'string' => 'La descrizione deve avere valore testuale.',
            'min' => 'La descrizione deve contenere almeno :min caratteri.',
            'max' => 'La descrizione non può contenere più di :max caratteri.'
        ],
        'country' => [
            'required' => 'La nazione è richiesta.',
            'string' => 'Il campo "Nazione" deve avere valore testuale.',
            'min' => 'Il campo "Nazione" deve contenere almeno :min caratteri.'
        ],
        'city' => [
            'required' => 'La città è richiesta.',
            'string' => 'Il campo "Città" deve avere valore testuale.',
            'min' => 'Il campo "Città" deve contenere almeno :min caratteri.'
        ],
        'address'=> [
            'required' => 'Il campo "Indirizzo" è richiesto.',
            'string' => 'Il campo "Indirizzo" deve avere valore testuale.',
            'min' => 'Il campo "Indirizzo" deve contenere almeno :min caratteri.'
        ],
        'num_rooms'=> [
            'required' => 'Il numero delle stanze è richiesto.',
            'numeric' => 'Il campo "Numero stanze" deve avere valore numerico.',
            'min' => 'L\'abitazione deve contenere almeno :min stanza.'
        ],
        'num_beds'=> [
            'required' => 'Il numero dei posti letto è richiesto.',
            'numeric' => 'Il campo "Posti letto" deve avere valore numerico.',
            'min' => 'L\'abitazione deve contenere almeno :min posto letto.'
        ],
        'num_baths'=> [
            'required' => 'Il numero dei bagni è richiesto.',
            'numeric' => 'Il campo "Bagni" deve avere valore numerico.'
        ],
        'square_m'=> [
            'required' => 'Le dimensioni dell\'abitazione sono richieste.',
            'numeric' => 'Il campo "Dimensioni" deve avere valore numerico.',
            'min' => 'L\'abitazione deve essere grande almeno :min metri quadri.'
        ],
        'price' => [
            'required' => 'Il prezzo è richiesto.',
            'numeric' => 'Il campo "Prezzo" deve avere valore numerico.',
            'min' => 'Il prezzo deve ammontare almeno a 1,00.'
        ],
        'place_img'=> [
            'required' => 'L\'immagine è richiesta.',
            'max' => 'L\'immagine inserita non deve superare i :max kb.',
            'image' => 'L\'immagine inserita deve essere di un formato immagine.',
            'mimes' => 'L\'immagine inserita deve essere dei seguenti formati: :values.',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
