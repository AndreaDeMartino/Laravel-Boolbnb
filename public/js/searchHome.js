var apiKey = 'pl9VSXAUYFKS';
var adminId = 'c91691ecb0882ea1a041506a2a4fcb92';

(function() {
    var placesAutocomplete = places({
        appId: apiKey,
        apiKey: adminId,
        container: document.querySelector('#city'),
        templates: {
        value: function(suggestion) {
            return suggestion.name;
        }
    }
    }).configure({
        type: 'city',
        language: 'it',
        
    });

    placesAutocomplete.on('change', function resultSelected(e) {
    // document.querySelector('#country').value = e.suggestion.administrative || '';
    document.querySelector('#city').value = e.suggestion.administrative || '';
    document.querySelector('#city').value = e.suggestion.city || '';
    document.querySelector('#lat').value = e.suggestion.latlng['lat'] || '';
    document.querySelector('#long').value = e.suggestion.latlng['lng'] || '';
    
    });
    })();

