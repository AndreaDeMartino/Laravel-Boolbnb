@extends('layouts.app')

@section('content')
    @auth
        <h2 class="text-center" style="opacity: 0.7">Area Statistiche <i class="fas fa-chart-line"></i></h2><hr>
        <div class="stats" style="background-color: #e4f2ed">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="stats-total col-lg-4 col-md-4 col-sm-12">
                        <h3 class="text-lg-right text-md-right text-sm-center" style="color: #b56da8; ">Totale messaggi ricevuti:<br><span class="h2 d-flex align-items-center justify-content-end" style="font-size: 50px; font-weight: 700;"><i class="far fa-envelope" style="margin-right: 25px; font-size: 30px"></i>{{$totMessages}}</span></h3>
                        <hr>
                        <h3 class="text-lg-right text-md-right text-sm-center" style="color: #FFA58D;">Totale visite:<br><span class="h2 d-flex align-items-center justify-content-end" style="font-size: 50px; font-weight: 700;"><i class="far fa-eye" style="margin-right: 25px; font-size: 30px"></i>{{$totVisits}}</span></h3>
                    </div>
                    <div class="stats-graph col-lg-8 col-md-8 col-sm-12">
                        <canvas id="graph" class=""></canvas>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    
    {{-- Json Statistiche Messaggi --}}
    <script>var messagesGraph = @php echo json_encode($messagesGraph);@endphp</script>
    <script>var visitsGraph = @php echo json_encode($visitsGraph);@endphp</script>
    {{-- JS --}}
    <script src="{{asset('js/graphs.js')}}"></script>
@endsection