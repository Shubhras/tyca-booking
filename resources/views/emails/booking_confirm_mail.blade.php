
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
        <p style="text-align : center;font-size: 38px;font-weight: 500;line-height: 57px; font-family: poppins; color:#000000; margin-top:45px; margin-bottom: 5px;">
            Booking Confirmation</p>
        <p style="text-align : center;font-size: 25px;font-weight: 500;line-height: 37.5px; font-family: poppins;
        color:#000000; margin-bottom:35px;">Dear {{$name}}, we’ve received your booking!</p>
    </div>
    <div style="width: 758px; background-color:#EEDFD0; margin : auto; border-radius:8px;">
        <div style="padding: 25px 40px;">
            <!-- <h1 style="text-align : center; line-height: 0px;"><b><strong>Booking Confirmation</strong></b></h1>
            <hr> -->
            <div>
                <p style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000000; margin-bottom: 5px;">
                    <span style="font-weight: 600; font-family: poppins;color: #000000;">Name: </span><span style="font-weight: 400; font-family: poppins;color: #000000;">{{$name}}</span>
                </p>
                <p style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000000; margin-bottom: 5px;">
                    <span style="font-weight: 600; font-family: poppins;color: #000000;">Email: </span><span style="font-weight: mailto:400; font-family: poppins;color: #000000;">{{$email}}</span>
                </p>
                <p style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000000; margin-bottom: 5px;">
                    <span style="font-weight: 600; font-family: poppins;color: #000000;">Outlet: </span><span style="font-weight: 400; font-family: poppins;color: #000000;">{{$outletName}}</span>
                </p>
                <p
                    style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000000; margin-bottom: 5px;">
                    <span style="font-weight: 600; font-family: poppins;color: #000000;">Appointment Date(s): </span>
                    @if($planType == "hourly")
                    <span
                        style="font-weight: 400; font-family: poppins;color: #000000;">{{$date}}
                    </span>
                    @elseif($planType == "daily")
                    <span
                        style="font-weight: 400; font-family: poppins;color: #000000;">{{$fromDate}} - {{$toDate}}
                    </span>
                    @endif

                    </p>
                    @if($planType == "hourly")
                <p style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000000; margin-bottom: 5px;">
                    <span style="font-weight: 600; font-family: poppins;color: #000000;">Time Slot(s): </span><span style="font-weight: 400; font-family: poppins;">{{$time}}</span>
                </p>
                @endif
                <br>
                <p style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000000; margin-bottom: 5px;">
                    <span style="font-weight: 600;font-family: poppins;color: #000000;">Payable Amount: </span><span style="font-weight: 400;font-family: poppins;color: #000000;">${{$payableAmount}}</span>
                </p>
                <p style="font-size: 22.07px;line-height: 33.01px;font-family: poppins; color:#000000; margin-bottom: 5px;">
                    <span style="font-weight: 600;font-family: poppins;color: #000000;">Payment Method: </span>
                    @if($paymentType == 1)
                    <span style="font-weight: 400;font-family: poppins;color: #000000;">Manually</span>
                    @elseif($paymentType == 2)
                    <span style="font-weight: 400;font-family: poppins;color: #000000;">Stripe</span>
                    @elseif($paymentType == 4)
                    <span style="font-weight: 400;font-family: poppins;color: #000000;">PayPal</span>
                    @else
                    <span style="font-weight: 400;font-family: poppins;">N/A</span>
                    @endif
                </p>

            </div>

        </div>

    </div>
    <br>
    <br>
    <a href="{{ route('login') }}" style="text-decoration-line: none;">
        <p
            style="width: 298px; height: 42px; margin: auto;text-align: center; background-color: #000000; line-height: 40px; color: #ffffff; font-family: poppins; font-weight: 600;padding: 10px 5px 10px 5px;line-height: 24px;letter-spacing: 0em;">
            Click Here To Login</p>
    </a>
    <div style="width: 758px; margin : auto;">
        <p style="padding-bottom: 34px; text-align: center; line-height: 30px;"></p>
    </div>
</div>