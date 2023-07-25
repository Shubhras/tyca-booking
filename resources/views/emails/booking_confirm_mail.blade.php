<style type="text/css">
body {
    margin: 0px !important;
    font-family: "Noto Serif" !important;
}
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
<div style="text-align: center;margin-top: 60px;margin-bottom: 30px;">
    <img src="http://tyca-book.sftechnologiesstage.co/uploads/161/logo-head.png" style="width: 400px;height: 30px;">
</div>
<hr>
<div style="width: 945px; height: 65; margin: auto; padding: 0px 25px;">
    <div style="width : 758px; margin : auto;">
        <!-- <h1><b>We’ve received your booking!</b></h1>
        <p>Hi Hoe Wei,</p>
        <p>Thank you for your booking.</p>
        <p>Your booking confirmation details are as follows:</p> -->
        <p
            style="text-align : center;font-size: 38px;font-weight: 500;line-height: 57px; font-family: poppins; color:#000;">
            Booking Confirmation</p>
        <p style="text-align : center;font-size: 25px;font-weight: 500;line-height: 37.5px; font-family: poppins;
        color:#000;">Dear {{$name}}, we’ve received your booking!</p>
    </div>
    <div style="width: 758px; background-color:#EEDFD0; margin : auto; border-radius:8px;">
        <div style="padding: 25px 40px;">
            <!-- <h1 style="text-align : center; line-height: 0px;"><b><strong>Booking Confirmation</strong></b></h1>
            <hr> -->
            <div>
                <p
                    style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000; margin-bottom: 5px;">
                    <span style="font-weight: 600;">Name: </span><span style="font-weight: 400;">{{$name}}</span></p>
                <p
                    style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000; margin-bottom: 5px;">
                    <span style="font-weight: 600;">Email: </span><span
                        style="font-weight: mailto:400;">{{$email}}</span>
                </p>
                <p
                    style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000; margin-bottom: 5px;">
                    <span style="font-weight: 600;">Outlet: </span><span
                        style="font-weight: 400;">{{$outletName}}</span>
                </p>
                <p
                    style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000; margin-bottom: 5px;">
                    <span style="font-weight: 600;">Booking Space: </span><span
                        style="font-weight: 400;">{{$serviceData}}</span></p>
                <p style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000;"><span
                        style="font-weight: 600;">Plan Type: </span><span style="font-weight: 400;">{{$planType}}</span>
                </p>
                <p
                    style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000; margin-bottom: 5px;">
                    <span style="font-weight: 600;">Appointment Date: </span><span
                        style="font-weight: 400;">{{$date}}</span></p>
                <p
                    style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000; margin-bottom: 5px;">
                    <span style="font-weight: 600;">Time Slot: </span><span style="font-weight: 400;">{{$time}}</span>
                </p>
                <br>
                <p
                    style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000; margin-bottom: 5px;">
                    <span style="font-weight: 600;">Payable Amount: </span><span
                        style="font-weight: 400;">${{$payableAmount}}</span></p>
                <p
                    style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000; margin-bottom: 5px;">
                    <span style="font-weight: 600;">Payment Method: </span>
                    @if($paymentType == 1)
                    <span style="font-weight: 400;">MANUALLY</span>
                    @elseif($paymentType == 2)
                    <span style="font-weight: 400;">STRIPE</span>
                    @elseif($paymentType == 4)
                    <span style="font-weight: 400;">PAYPAL</span>
                    @else
                    <span style="font-weight: 400;">N/A</span>
                    @endif
                </p>

            </div>

        </div>

    </div>
    <br>
    <br>
    <a href="{{ route('login') }}" style="text-decoration-line: none;">
        <p
            style="width: 298px; height: 42px; margin: auto;text-align: center; background-color: #000000; line-height: 40px; color: #ffffff; font-family: poppins;">
            Click Here To Login</p>
    </a>
    <div style="width: 758px; margin : auto;">
        <p style="padding-bottom: 34px; text-align: center; line-height: 30px;"></p>
    </div>
</div>