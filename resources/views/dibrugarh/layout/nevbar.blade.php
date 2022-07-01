

<body  style="font-size:15px">
  <div class="container-fluid">
    <div class="row px-lg-2" style="background: #162f65">
      <div class="col-lg-4 text-center text-lg-left mb-2 mb-lg-0">
        <div class="d-inline-flex align-items-center" style="padding-left: 3rem">

          <span class="any-help"><a href="#" onclick="window.open('tel:12345678');">For any help call us:12345678</a></span>

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
            <h4 class="m-0 display-5 text-capitalize"><span class="text-primary">Office of the Deputy Commissioner,
                Dibrugarh</span></h4>
          </a>
        </div>
      </div>
      <div class="col-lg-4 text-center text-lg-right">
        <div class="d-inline-flex align-items-center">
          <div class="d-inline-flex flex-column text-center px-3 border-right">
            <h6>Email Us</h6>
            <p class="m-0"><a href="mailto:info@example.com" style="color:#313131">info@example.com</a></p>
          </div>
          <div class="d-inline-flex flex-column text-center pl-3">
            <h6>Call Us</h6>
            <p class="m-0">+012 345 6789</p>
          </div>
        </div>
      </div>
    </div>
  </div>

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
</script>


