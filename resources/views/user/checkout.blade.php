<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

{{-- @dump($transaction) --}}

  <H1>CHECKOUT</H1>
  <h2>La transazione id: {{ $transaction->id }} è stata completata con successo</h2>

  <ul>
    <li>Importo: {{ $transaction->amount }} {{ $transaction->currencyIsoCode }}</li>
  </ul>

</body>
</html>