@include('dibrugarh\header')
@include('dibrugarh\link-bar')
    <section class="registration-form-section">
        <div class="registration-form">
            <form action="#">
                <div class="container">
                    <div class="form-div">
                        <div class="form-heading">

                            <h1>Registration</h1>
                            <p>Please fill in this form for Course Regitration</p>
                        </div>

                        <label for="name"><b>Name</b></label>
                        <input type="text" placeholder="Enter Your Name" name="name" id="name" required>

                        <label for="name"><b>Father's Name</b></label>
                        <input type="text" placeholder="Enter Your Father Name" name="name" id="name" required>

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email">

                        <div class="form-group">
                            <label for="example-date-input" class="col-3 col-form-label">Date of Birth</label>
                            <input class="form-control" name="starting_date" type="date" value="2022-06-11"
                                id="example-date-input">
                        </div>

                        <label for="psw"><b>Experience</b></label>
                        <input type="number" placeholder="In Years" name="psw" id="psw" required>

                        <label for="skill">Skill:</label>
                        <select name="skill-option">
                            <option value="electrician">Electrician</option>
                            <option value="it">IT Hardware</option>
                            <option value="plumber">Plumber</option>
                            <option value="carpenter">Carpenter</option>
                            <option value="painter">Painter</option>
                        </select>
                        <br>
                        <label for="name"><b>Address</b></label>
                        <input type="text" placeholder="Enter Your Address" name="ad" required>

                        <label for="name"><b>District</b></label>
                        <input type="text" placeholder="Enter Your Distric Name" name="ad" required>

                        <label for="detail-fill">Detail Fill By</label>
                        <select name="detail-fill">
                            <option value="self">Self</option>
                            <option value="it">DEO</option>
                            <option value="plumber">REO</option>
                        </select>
                        <div class="form-group mt-3">
                            <label class="mr-4">Upload your CV:</label>
                            <input type="file" name="file">
                        </div>
                        <div class="form-group mt-3">
                            <label class="mr-4">Upload your CV:</label>
                            <input type="file" name="file">
                        </div>
                        <hr>

                        <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
                        <div class="submit-btn">
                            <button type="submit" class="registerbtn">Register</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@include('dibrugarh\footer')
