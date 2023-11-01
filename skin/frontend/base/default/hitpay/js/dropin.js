$jHitpay = jQuery.noConflict();
$jHitpay(document).ready(function(){
    $jHitpay.getJSON(dropin_ajax_url, {drop_in_ajax: 1}, function (apiResponse) {
        $jHitpay.ajaxSetup({
            cache: false
        });

        if (apiResponse.status == 'error') {
            var message = '<p style="color:red">'+apiResponse.message+'</p>';
            message = message + '<br/><p>Redirecting you to checkout page...</p>';
            $jHitpay('.dropin-modal-content').html(message);
            window.location.replace(apiResponse.redirect_url);
        } else{
            $jHitpay('.dropin-modal-content').html();
            if (!window.HitPay.inited) {
                window.HitPay.init(apiResponse.payment_url, {
                  domain: apiResponse.domain,
                  apiDomain: apiResponse.apiDomain,
                },
                {
                  onClose: self.onHitpayDropInClose,
                  onSuccess: self.onHitpayDropInSuccess,
                  onError: self.onHitpayDropInError
                });
            }

            hitpayRedirectUrl = apiResponse.redirect_url;
            hitpayPaymentId = apiResponse.payment_request_id;
            hitpayCancelUrl = apiResponse.cart_url;

            window.HitPay.toggle({
                paymentRequest: apiResponse.payment_request_id,          
            });
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown) { 
        alert('Site server error while creating a payment request.'+errorThrown);
    });
});

function onHitpayDropInSuccess(data) {
    var successMessage = 'Transaction is successful.';
    var message = '<p style="color:green">'+successMessage+'</p>';
    message = message + '<br/><p>Redirecting you to status check page...</p>';
    $jHitpay('.dropin-modal-content').html(message);
    location.href = hitpayRedirectUrl+'?reference='+hitpayPaymentId+'&status='
}
function onHitpayDropInClose(data) {
    var errorMessage = 'Transaction is canceled.';
    var message = '<p style="color:red">'+errorMessage+'</p>';
    message = message + '<br/><p>Redirecting you to checkout page...</p>';
    $jHitpay('.dropin-modal-content').html(message);
    location.href = hitpayRedirectUrl+'?reference='+hitpayPaymentId+'&status=canceled'
}
function onHitpayDropInError(error) {
    var errorMessage = 'Site server error while creating a payment request. Error: ' + error;
    var message = '<p style="color:red">'+errorMessage+'</p>';
    message = message + '<br/><p>Redirecting you to checkout page...</p>';
    $jHitpay('.dropin-modal-content').html(message);
    location.href = hitpayCancelUrl; 
}