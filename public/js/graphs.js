/********************************
 ******Grafici con ChartJS ******
 ********************************/

//Genera grafici
generateGraph('graph', 'line');

//Funzione grafico
function generateGraph(graphId, graphType) {
    var ctx = document.getElementById(graphId).getContext('2d');

    var graph = new Chart(ctx, {
        type: graphType,
        data: {
            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
            datasets: [{
                label: 'Statistiche Messaggi', 
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
                    '#664b87'
                ],
                borderColor: [
                    '#664b87'
                ],
                borderWidth: 1
            }, {
                label: 'Statistiche Visite', 
                data: [
                    visitsGraph.January,
                    visitsGraph.February,
                    visitsGraph.March,
                    visitsGraph.April,
                    visitsGraph.May,
                    visitsGraph.June,
                    visitsGraph.July,
                    visitsGraph.August,
                    visitsGraph.September,
                    visitsGraph.October,
                    visitsGraph.November,
                    visitsGraph.December
                ],
                backgroundColor: [
                    '#fea58d'
                ],
                borderColor: [
                    '#fea58d'
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
            },
            responsive: true,
        }
    });
}