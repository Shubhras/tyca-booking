
<div class="d-flex align-items-center">
    <div class="d-flex flex-column" style="text-transform: capitalize;">
        <?php if($row['payment_method'] == '2')
        {
            echo 'Stripe';
        }else {
            echo 'Paypal';
        } ?>
    </div>
</div>

