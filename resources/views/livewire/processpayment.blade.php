<?php
$responseurl = config('Remita.PATH') . '/invoice';
$serviceid = '';
if ($amount == '7000') {
    $serviceid = config('Remita.ACCEPTANCEID');
} else {
    $serviceid = config('Remita.SERVICETYPEID');
}
$concatString = config('Remita.MERCHANTID') . $serviceid . $orderID . $amount . $responseurl . config('Remita.APIKEY');
$hash = hash('sha512', $concatString);
$description = config('Remita.DESCRIPTION');
?>
<html>

<p>You will be redirected to Remita in few seconds.......</p>

<form action="{{ config('Remita.GATEWAYURL') }}" id="remita_form" name="remita_form" method="POST">
    @csrf
    <input id="merchantId" name="merchantId" value="{{ config('Remita.MERCHANTID') }}" type="hidden" />

    <input id="serviceTypeId" name="serviceTypeId" value={{ $serviceid }} type="hidden" />

    <input id="amt" name="amt" value="{{ $amount }}" type="hidden" />

    <input id="responseurl" name="responseurl" value="{{ $responseurl }}" type="hidden" />

    <input id="hash" name="hash" value="{{ $hash }}" type="hidden" />

    <input id="payerName" name="payerName" value="{{ $payerName }}" type="hidden" />

    <input id="paymenttype" name="paymenttype" value="{{ $paymenttype }}" type="hidden" />

    <input id="payerEmail" name="payerEmail" value="{{ $payerEmail }}" type="hidden" />

    <input id="payerPhone" name="payerPhone" value="{{ $payerPhone }}" type="hidden" />

    <input id="orderId" name="orderId" value="{{ $orderID }}" type="hidden" />
   >


</form>

<script type="text/javascript">
    document.getElementById("remita_form").submit();
</script>

</html>
