@include('dibrugarh\header')
@include('dibrugarh\link-bar')
    <section class="registration-form-section">
        <div class="registration-form">
            <form action="#">
                <div class="container">
                    <div class="form-div">
                        <div class="form-heading">
                            <h1>Login</h1>
                            <p>Please Log In If You Already have Registered</p>
                        </div>

                        <label for="email"><b>Username</b></label>
                        <input type="text" placeholder="Use Email as Password" name="email" id="email">

                        <label for="email"><b>Password</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email">

                        <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
                        <div class="submit-btn">
                            <button type="submit" class="registerbtn">Login</button>
                            <a href="{{route('apply_reqistration')}}"><i>Don't have an account, Register Here</i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@include('dibrugarh\footer')
