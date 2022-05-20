        <script src="https://mepspay.gateway.mastercard.com/checkout/version/61/checkout.js" data-error="errorCallback" data-cancel="cancelCallback"></script>


<script>
     function cancelCallback() { 
          confirm('Are you sure you want to cancel?');
         // code to manage payer interaction
    }
// or if you want to provide a URL:
// cancelCallback = "someURL"
</script>
        <script type="text/javascript">
            
            function errorCallback(error) {
                  console.log(JSON.stringify(error));
            }
            function cancelCallback() {
                  console.log('Payment cancelled');
            }
            Checkout.configure({
              session: { 
            	id: "{{$session_id}}"
       			},
              interaction: {
                    merchant: {
                        name: 'Bazzard',
                        address: {
                            line1: '200 Sample St',
                            line2: '1234 Example Town'            
                        }    
                    }
               }
            });
        </script>
        <script>
            Checkout.showPaymentPage();
        </script>
      <!--<input type="button" value="Pay with Lightbox" onclick="Checkout.showLightbox();" />-->
    <!--   <div class="mt-5 pt-5 text-center">
      <input class="mt-5" type="button" value="Pay with Payment Page" on="Checkout.showPaymentPage();" />
      </div> -->
