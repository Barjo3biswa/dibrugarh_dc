

<body  style="font-size:15px">
<div class="container-fluid">
    <div class="row px-lg-2" style="background: #162f65">
    <div class="col-lg-4 text-center text-lg-left mb-2 mb-lg-0">
        <div class="d-inline-flex align-items-center" style="padding-left: 3rem">

        <!-- <span class="any-help"><a href="#" onclick="window.open('tel:12345678');">For any help call us:12345678</a></span> -->
        <span class="any-help"><a href="">For any queries email us :</a><a href="#" onclick="window.open('mailto:123@example.com');">123@example</a></span>
        <!-- <span class="any-help"><a href="#" onclick="window.open('tel:12345678');">123@example</a></span> -->


        </div>
    </div>
    <div class="col-lg-3 text-center text-lg-right screen-reader" style="padding-right: 0rem;">
        <a href="#skipToMainContent"><span>Skip to main content</span></a>
    </div>
    <div class="col-lg-3 text-center text-lg-right screen-reader" style="max-width:23%;">
        <a href="{{route('screenreader')}}"><span>Screen Reader Access</a></span>
        <span onClick="fontIncrease()" style="border-right: thin solid aliceblue;">A+</span>
        <span onClick="changeSizeByBtnTest(15)" style="border-right: thin solid aliceblue;"> A</span>
        <span onClick="changeSizeByBtn(10)" style="border-right: thin solid aliceblue;">A-</span>
    </div>
    <div class="col-lg-2 text-center text-lg-right">
        <div class="d-inline-flex align-items-center" style="padding: .5rem 0;">
        <a class="text-white px-3" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
        <a class="text-white px-3" href="#"><i class="fab fa-twitter"></i></a>
        <a class="text-white px-3" href=""><i class="fab fa-linkedin-in"></i></a>
        <a class="text-white px-3" href="#"><i class="fab fa-instagram"></i></a>

        </div>
    </div>
    </div>
    <div class="row py-3 px-lg-5">
    <div class="col-lg-8">
        <div class="logo-div">
        <div class="logo">
            <img src="{{ asset('dibrugarh') }}/img/assam-govt-logo.svg.png" alt="">
        </div>
        <a href="#" class="navbar-brand d-none d-lg-block logo-div">
            {{-- <h4 class="m-0 display-5 text-capitalize"><span class="text-primary">Office of the Deputy Commissioner,
                Dibrugarh</span></h4> --}}
                <h4 class="m-0 display-5 text-capitalize">
                    <span class="text-primary">Skill Dibrugarh</span><br>
                    <span class="text-primary">Office of the Deputy Commissioner</span>
                </h4>
                </a>
        </div>
    </div>
    <div class="col-lg-4 text-center text-lg-right">
        <div class="d-inline-flex align-items-center">
        <div class="d-inline-flex flex-column text-center px-3 border-right">
            {{-- <h6>Email Us</h6> --}}
            <img src="dibrugarh/icons/icons8-circled-envelope-50.png" width="40">
            <p class="m-0"><a href="mailto:info@example.com" style="color:#313131">info@example.com</a></p>
        </div>
        <div class="d-inline-flex flex-column text-center pl-3">
    <!-- <h6><a href="">Call Us</a></h6> -->
            <!-- <div><img src="dibrugarh/icons/icons8-desk-64.png" width="40"></div> -->
            <div class="enquiry-div"><img src="dibrugarh/icons/icons8-call-64.png" width="40"></div>
            <p class="m-0" onclick="openForm()"><a href="#" onclick="openForm()">Enquiry</a></p>
            <!-- <p class="m-0">+012 345 6789</p> -->
        </div>
        </div>
    </div>
    </div>
</div>
<!-- <button class="open-button" onclick="openForm()">Open Form</button> -->
<form action="{{route('enquiry')}}" method="post">
    @csrf
    <div class="form-popup" id="myForm">
    <div class="container popup-form-container">
        <div class="row input-container">
        <div class="col-xs-12">
            @if (session('success'))
            <div class="row">
                <div class="col-sm-12">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                    </button>
                    <span>{{ session('success') }}</span>
                </div>
                </div>
            </div>
            @endif
            <div class="styled-input wide">
                <input type="text" name="name" required />
                <label>Name</label>
            </div>
            </div>
            <div class="col-md-6 col-sm-12 p-0">
            <div class="styled-input">
                <input type="text" name="email" required />
                <label>Email</label>
            </div>
            </div>
            <div class="col-md-6 col-sm-12 p-0">
            <div class="styled-input"  style="float:right;">
                <input type="text" name="phone" required />
                <label>Phone Number</label>
            </div>
            </div>
            <div class="col-xs-12">
            <div class="styled-input wide">
                <textarea name="message" required></textarea>
                <label>Message</label>
            </div>
            </div>
            <div class="col-xs-12">
                <input type="submit" class="btn-lrg submit-btn" value="Send Message">
            {{-- <div class="btn-lrg submit-btn">Send Message</div> --}}
            </div>
        </div>
        <img src="dibrugarh/icons/icons8-close-30.png" alt="" class="cancel" onclick="closeForm()">
        <!-- <button type="button" class="btn cancel" onclick="closeForm()">Close</button> -->
    </div>
    </div>
</form>

<script>
    var cont = document.getElementById("bodyFont");
    var size22 = 15;
    function fontIncrease() {
        size22++;
        $("#bodyFont").css({'font-size':size22});
    };


    function changeSizeByBtnTest(size) {
        $("#bodyFont").css({'font-size':size});
    };



    function changeSizeByBtn(size) {
        size22--;
        $("#bodyFont").css({'font-size':size22});
    };

    // popup form
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>



