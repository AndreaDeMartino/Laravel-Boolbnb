/********************************
 ******Grafici con ChartJS ******
 ********************************/

//Genera grafici
generateGraph('messages', messagesGraph, 'rgba(255, 99, 132, 0.2)', 'rgba(255, 99, 132, 1)');
generateGraph('visits', visitsGraph, 'rgba(0, 127, 255, 0.2)', 'rgba(0, 127, 255, 1)');

//Funzione grafico
function generateGraph(graphId, json, bgColor, bordColor) {
    var ctx = document.getElementById(graphId).getContext('2d');

    var graph = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
            datasets: [{
                label: 'Stats Messaggi', 
                data: [
                    json.January,
                    json.February,
                    json.March,
                    json.April,
                    json.May,
                    json.June,
                    json.July,
                    json.August,
                    json.September,
                    json.October,
                    json.November,
                    json.December
                ],
                backgroundColor: [
                    bgColor
                ],
                borderColor: [
                    bordColor
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
}