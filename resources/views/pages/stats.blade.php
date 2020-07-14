@extends('layouts.app')

@section('content')
    @auth
        <h2>Statistiche</h2>
        <div class="stats-container">
            <h3 class="text-center">Totale contatti ricevuti: {{$totMessages}}</h3>
            <canvas id="messages" class="col-sm-8 offset-sm-2"></canvas>
            <div class="stats-group">
            
                {{-- JS --}}
                <script>
                    //Json Statistiche Messaggi
                    var messagesGraph = <?php echo json_encode($messagesGraph); ?>

                    var ctx = document.getElementById('messages').getContext('2d');
                    var messeges = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                            datasets: [{
                                label: 'Stats Messaggi', 
                                data: [
                                    messagesGraph.January,
                                    messagesGraph.February,
                                    messagesGraph.March,
                                    messagesGraph.April,
                                    messagesGraph.May,
                                    messagesGraph.June,
                                    messagesGraph.July,
                                    messagesGraph.August,
                                    messagesGraph.September,
                                    messagesGraph.October,
                                    messagesGraph.November,
                                    messagesGraph.December
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(127, 255, 212, 0.2)',
                                    'rgba(255, 191, 0, 0.2)',
                                    'rgba(153, 102, 204, 0.2)',
                                    'rgba(0, 127, 255, 0.2)',
                                    'rgba(0, 49, 83, 0.2)',
                                    'rgba(52, 58, 144, 0.2)',
                                    'rgba(128, 0, 0, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(127, 255, 212, 1)',
                                    'rgba(255, 191, 0, 1)',
                                    'rgba(153, 102, 204, 1)',
                                    'rgba(0, 127, 255, 1)',
                                    'rgba(0, 49, 83, 1)',
                                    'rgba(52, 58, 144, 1)',
                                    'rgba(128, 0, 0, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
    @endauth
@endsection

