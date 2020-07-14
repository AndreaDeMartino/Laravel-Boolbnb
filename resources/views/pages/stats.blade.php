@extends('layouts.app')

@section('content')
    @auth
        <h2>Statistiche</h2>
        <div class="stats-container">
            <h3>Totale contatti ricevuti: {{$totMessages}}</h3>
            <canvas id="messages" width="400" height="400"></canvas>
            <div class="stats-group">
            
                {{-- JS --}}
                <script>
                    var messagesGraph = <?php echo json_encode($messagesGraph); ?>
                
                </script>
            </div>
        </div>
    @endauth
@endsection