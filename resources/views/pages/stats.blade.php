@extends('layouts.app')

@section('content')
    @auth
        <h2>Statistiche</h2>
        <div class="stats-container">
            <h3 class="text-center">Totale messaggi ricevuti: {{$totMessages}}</h3>
            <canvas id="messages" class="col-sm-8 offset-sm-2"></canvas>
        </div>

        <div class="stats-container">
            <h3 class="text-center">Totale visite: {{$totVisits}}</h3>
            <canvas id="visits" class="col-sm-8 offset-sm-2"></canvas>
        </div>
    @endauth
    
    {{-- Json Statistiche Messaggi --}}
    <script>var messagesGraph = @php echo json_encode($messagesGraph);@endphp</script>
    <script>var visitsGraph = @php echo json_encode($visitsGraph);@endphp</script>
    {{-- JS --}}
    <script src="{{asset('js/graphs.js')}}"></script>
@endsection

/*provaaaaaaaaaa*/