var apiKey = document.querySelector('#apikey');
var adminId = document.querySelector('#adminid');

(function() {
    var placesAutocomplete = places({
        appId: apiKey,
        apiKey: adminId,
        container: document.querySelector('#form-address'),
        templates: {
        value: function(suggestion) {
            return suggestion.name;
        }
    }
    }).configure({
        type: 'address'
        
    });

    placesAutocomplete.on('change', function resultSelected(e) {
    document.querySelector('#country').value = e.suggestion.administrative || '';
    document.querySelector('#city').value = e.suggestion.city || '';
    document.querySelector('#country').value = e.suggestion.country || '';
    document.querySelector('#region').value = e.suggestion.administrative || '';
    document.querySelector('#lat').value = e.suggestion.latlng['lat'] || '';
    document.querySelector('#long').value = e.suggestion.latlng['lng'] || '';
    
    });
    })();

