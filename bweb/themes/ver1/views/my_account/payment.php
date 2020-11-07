<style>
    a.disabled {
        pointer-events: none;
        cursor: default;
    }
</style><!-- Dashboard start -->
<div class="dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="content">
                <form action="<?php echo site_url('secure/process_payment') ?>" method="post">
                    <h4>Dear <?php $usr = $this->session->userdata('user');
                                echo $usr['name']; ?>,</h4>
                    <p> Kindly proceed for completing the payment process.<br> Incase you are facing a failed transaction you have to repeat the process by clicking on the link provided in your mail.<br> Thank you. </p>
                    <h4>Terms &amp; Conditions</h4>
                    <p>In using this website you are deemed to have read and agreed to the following terms and conditions:</p>
                    <ol>
                        <li>All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance in the most appropriate manner. </li>
                        <li>We accept Visa and Master Credit Card, Debit Cards and Net banking as mode of payments which are processed through our payment gateway partner. No information pertaining to payment is shared with us as you fill all the payment related information on your bank's site.</li>
                        <li>All transactions on the Code Headed website, monetary and otherwise, are non-refundable, non-exchangeable and non-reversible.</li>
                        <li>The Company reserves the right to change these conditions from time to time as it sees fit and your continued use of the site will signify your acceptance of any adjustment to these terms. User is required to check terms and conditions at every visit. No notification communication will be done subject to change in terms and conditions.</li>
                    </ol> <label class="c-cbox"> I agree for terms &amp; conditions <input type="checkbox" id='agree_check' required checked="checked"> <span class="checkmark"></span> </label>
                    <!--<a href="https://www.instamojo.com/@udyog/f0f883b64dec4c58a3d6d7c271bcd393" id='payment_link' class="btn btn-md button-theme">Pay now</a>--><button type="submit" id="payment_link" class="btn btn-md button-theme">Pay now</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- Dashboard end -->
<script>
    $(function() {
        $('#agree_check').on('change', function() {
            if ($('#agree_check').is(':checked')) {
                $('#payment_link').removeClass('disabled');
            } else {
                $('#payment_link').addClass('disabled');
            }
        });
    });
</script>