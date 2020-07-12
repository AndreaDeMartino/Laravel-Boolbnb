// Dom Variables
var form = document.querySelector('#payment-form');
var client_token = document.querySelector('#clientToken').value;

// Create Payment form
braintree.dropin.create(
  {
  authorization: client_token,
  selector: '#bt-dropin'
  },

  function (createErr, instance) {
    // Case error in create Form Payment
    if (createErr) {
      console.log('Create Error', createErr);
      return;
    }

    // Operation on Form Payment Submit
    form.addEventListener('submit', function (event) {
      event.preventDefault();

      instance.requestPaymentMethod(function (err, payload) {
        // Case error in transaction
        if (err) {
          console.log('Request Payment Method Error', err);
          return;
        }
        // Get nonce and do form submit
        document.querySelector('#nonce').value = payload.nonce;
        form.submit();
      });
    });
  }
);