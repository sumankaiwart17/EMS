<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: "Lato", sans-serif;
            padding-bottom: 200px;
        }

        .main-head {
            height: 150px;
            background: #FFF;
        }

        .sidenav {
            height: 100%;
            background: linear-gradient(to right, #117A01, #ffffff);
            overflow-x: hidden;
            padding-top: 20px;
        }


        .main {
            padding: 0px 10px;
        }



        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }
        }

        @media screen and (max-width: 450px) {
            .login-form {
                margin-top: 5%;
            }



            .register-form {
                margin-top: 10%;
            }
        }



        @media screen and (min-width: 768px) {
            .main {
                margin-left: 40%;
            }



            .sidenav {
                width: 40%;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
            }



            .login-form {
                margin-top: 20%;
            }

            .register-form {
                margin-top: 20%;
            }
        }


        .login-main-text {
            margin-top: 10%;
            padding: 60px;
            color: #fff;
        }

        .login-main-text h2 {
            font-weight: 300;
        }

        .btn-black {
            background-color: #000 !important;
            color: #fff;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Doctor Register</title>
</head>

<body>

    <header class="header pt-5">
    </header>



    <div class="sidenav">
        <div class="login-main-text">
            <h1>AAHRS</h1>
            <h2>Doctor Registration</h2>
        </div>



    </div>

    <div class="main">
        <div class="col-md-6 col-sm-12">
            <h3>Please enter the details correctly</h3>

            <div class="float-left"><a class="log-btn ml-2 text-primary" href="<?php echo site_url('doctor/doctor-login') ?>">Already Registered? Login</a></div>
            <div class="login-form">
                <form action="<?php echo site_url('DoctorProfile_Controller/register') ?>" method="post" enctype="multipart/form-data">



                    <div class="form-group">
                        <label>Full Name<label style="color:red">*</label></label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?php echo set_value('name') ?>">
                        <span class="text-danger"><?php echo form_error('name') ?></span>

                    </div>

                    <div class="form-group">
                        <label>Hospital ID<label style="color:red">*</label></label>
                        <input type="text" class="form-control" name="hos_id" placeholder="Hospital ID" value="<?php echo set_value('hos_id') ?>">
                        <span class="text-danger"><?php echo form_error('hos_id') ?></span>


                    </div>

                    <div class="form-group">
                        <label>Email ID<label style="color:red">*</label></label>
                        <input type="email" class="form-control" name="email" placeholder="Email ID" value="<?php echo set_value('email') ?>">
                        <span class="text-danger"><?php echo form_error('email') ?></span>

                    </div>

                    <div class="form-group">
                        <label>Aadhaar<label style="color:red">*</label></label>
                        <input type="number" class="form-control" name="adhar" placeholder="Aadhaar Number" value="<?php echo set_value('adhar'); ?>">

                        <span class="text-danger"><?php echo form_error('adhar')
                                                    ?></span>

                    </div>



                    <div class="form-group">
                        <label>Password<label style="color:red">*</label></label>
                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password') ?>">
                        <span class="text-danger"><?php echo form_error('password') ?></span>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password<label style="color:red">*</label></label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" value="<?php echo set_value('cpassword') ?>">
                        <span class="text-danger"><?php echo form_error('cpassword') ?></span>
                    </div>

                    <div class="form-group ">
                        <label>State Medical Council Registration Number<label style="color:red">*</label></label>
                        <input type="number" class="form-control" name="docReg" placeholder="Enter Medical Council Registration Number" value="<?php echo set_value('docReg'); ?>">
                        <span class="text-danger"><?php echo form_error('docReg')
                                                    ?></span>
                    </div>

                    <div class="form-group ">
                        <label>Pincode<label style="color:red">*</label></label>
                        <input type="text" class="form-control" name="zip" placeholder="Pincode" value="<?php echo set_value('zip') 
                                                                                                        ?>">

                        <span class="text-danger"><?php echo form_error('zip')
                                                    ?></span>
                    </div>

                    <div class="form-group">
                        <label>City<label style="color:red">*</label></label>
                        <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo set_value('city') 
                                                                                                        ?>">
                        <span class="text-danger"><?php echo form_error('city')
                                                    ?></span>

                    </div>

                    <div class="form-group">
                        <label>State<label style="color:red">*</label></label>
                        <select name="state" class="form-control">
                            <option value="" <?php echo set_value('state') === '' ? 'selected' : ''; ?>>Select</option>
                            <option value="<?php echo set_value('state') ?>" <?php echo set_value('state') !== '' ? 'selected' : ''; ?>></option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                        <span class="text-danger"><?php echo form_error('state')
                                                    ?></span>
                    </div>


                    <div class="form-group">
                        <label>Country<label style="color:red">*</label></label>
    
                        <select class="form-control" name="country">
                            <option value="" <?php echo set_value('country') === '' ? 'selected' : ''; ?>>Select</option>
                            <option value="<?php echo set_value('country') ?>" <?php echo set_value('country') !== '' ? 'selected' : ''; ?>></option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antartica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo">Congo, the Democratic Republic of the</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                            <option value="Croatia">Croatia (Hrvatska)</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor">East Timor</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="France Metropolitan">France, Metropolitan</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                            <option value="Holy See">Holy See (Vatican City State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">Iran (Islamic Republic of)</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia">Micronesia, Federated States of</option>
                            <option value="Moldova">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint LUCIA">Saint LUCIA</option>
                            <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia (Slovak Republic)</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                            <option value="Span">Spain</option>
                            <option value="SriLanka">Sri Lanka</option>
                            <option value="St. Helena">St. Helena</option>
                            <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syrian Arab Republic</option>
                            <option value="Taiwan">Taiwan, Province of China</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Viet Nam</option>
                            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                            <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                            <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>

                        <span class="text-danger"><?php echo form_error('country')
                                                    ?></span>

                    </div>

                    <div class="form-group">
                        <label>Contact No.<label style="color:red">*</label></label>
                        <input type="tel" class="form-control" name="phone" placeholder="Phone No." value="<?php echo set_value('phone') 
                                                                                                            ?>">

                        <span class="text-danger"><?php echo form_error('phone')
                                                    ?></span>
                    </div>

                    <div class="form-group" data-aos="fade-right">
                        <label>Upload Image</label>
                        <div class="profile-upload">
                            <div class="upload-img">
                                <img id="prevpic" src="<?php echo base_url('images/user.jpg') ?>" style='width:30px'>
                            </div>

                            <div class="upload-input">
                                <input type="file" class="form-control" id="propic" name="picture">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" data-aos="fade-right">
                        <label>Upload Signature</label>
                        <div class="profile-upload">
                            <div class="upload-img">
                                <img alt="" id="prevpic" src="<?php echo base_url('images/user.jpg') ?>" style='width:30px'>

                            </div>
                            <div class="upload-input">
                                <input type="file" class="form-control" id="propic" name="signature">

                            </div>

                        </div>

                    </div>

                    <div class="form-group" data-aos="fade-right">
                        <label>Department<label style="color:red">*</label></label>
                        <select class="form-control" name="department">
                            <option value="">Select Department</option>
                            <?php if (isset($depts)) : ?>
                                <?php foreach ($depts as $x) :  ?>
                                    <option value="<?php echo $x['dept_id'] ?>"><?php echo $x['dept_name'] ?>
                                    </option>

                                <?php endforeach; ?>
                            <?php else : ?>

                            <?php endif; ?>


                        </select>

                        <!-- <span style='color:blue;'>Note:you Need add specilization otherwise you can't add dcoctors</span> -->


                        <span class="text-danger"><?php echo form_error('department') ?></span>

                    </div>

                    <div class="form-group" data-aos="fade-right">

                        <label>Degree<label style="color:red">*</label></label>
                        <select class="form-control" id="doc_degree" name="degree">
                            <option value="">Select</option>
                            <option value="UG" >UG Degree</option>
                            <option value="PG" >PG Degree</option>
                            <option value="Super Specialization" >Super Specialization</option>
                            <option value="Other">Other</option>

                        </select>
                        <span class="text-danger"><?php echo form_error('degree'); ?></span>
                    </div>

                    <div class="form-group" id="Other_degree" data-aos="fade-left">
                        <label>Other Degree<label style="color:red">*</label></label>
                        <input class="form-control" placeholder="Please Enter Other Degree" name="Others" type="text" value="<?php echo set_value('Others') ?>">
                        <span class="text-danger"><?php echo form_error('Others') ?></span>
                    </div>



                    <div class="form-group" data-aos="fade-left" style="display:none" id="dis_specialization">
                        <label>Specialization<label style="color:red">*</label></label>
                        <select class="form-control" name="specialization" id="doc_specialization" onchange="get_speciality()">
                            <option value="">Select</option>
                        </select>
                        <span class="text-danger"><?php echo form_error('specialization'); ?></span>
                    </div>

                    <div class="form-group" data-aos="fade-left" style="display:none;" id="Other_specialization">
                        <label>Other Specialization</label>
                        <input class="form-control" placeholder="Please Enter Other Specialization" name="Other_specialization" type="text" value="<?php echo set_value('Other_specialization') ?>">
                        <span class="text-danger"><?php echo form_error('Other_specialization') ?></span>
                    </div>

                    <div class="form-group" style="display:none" id="dis_speciality">
                        <label>Speciality<label style="color:red">*</label></label>
                        <select class="form-control" name="speciality" id="doc_speciality">
                            <option value="">Select</option>
                        </select>
                    </div>

                    <div class="form-group ">
                        <label>Years of Experience<label style="color:red">*</label></label>
                        <input type="text" class="form-control" name="experience" placeholder="Years of Experience" value="<?php echo set_value('experience') 
                                                                                                                            ?>">

                        <span class="text-danger"><?php echo form_error('experience')
                                                    ?></span>
                    </div>


                    <div class="form-group ">
                        <label>About</label>
                        <input type="text" class="form-control" name="about" placeholder="About" value="<?php //echo set_value('About') 
                                                                                                        ?>">

                        <span class="text-danger"><?php echo form_error('About')
                                                    ?></span>

                    </div>


                    <div class="form-group ">
                        <label>Services</label>
                        <input type="text" class="form-control" name="services" placeholder="Services" value="<?php //echo set_value('services') 
                                                                                                                ?>">
                        <span class="text-danger"><?php //echo form_error('services') 
                                                    ?></span>

                    </div>


                    <div class="form-group">
                        <label>Awards & recognition</label>
                        <input type="text" class="form-control" name="awards" placeholder="Awards & recognition" value="<?php //echo set_value('awards') 
                                                                                                                        ?>">
                        <span class="text-danger"><?php echo form_error('awards')
                                                    ?></span>
                    </div>
                    <div class="form-group ">
                        <label>Certifications</label>
                        <input type="text" class="form-control" name="certifications" placeholder="Certifications" value="<?php //echo set_value(certifications') 
                                                                                                                            ?>">

                        <span class="text-danger"><?php //echo form_error('certifications') 
                                                    ?></span>

                    </div>


                    <!-- <div class="form-group ">
            <label>Upload picture</label>
            <input type="file" class="form-control" name="picture" required>
            <span class="text-danger"><?php echo form_error('picture') ?></span>
         </div> -->



                    <button type="submit" class="btn btn-black mt-2 float-left">Register</button>

                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#prevpic').attr('src', e.target.result);

                }



                reader.readAsDataURL(input.files[0]);

            }

        }


        //     url: "<?php echo base_url('hospital_Controller/check_regis_num') ?>", 
        //     success: function (data) {
        //         if(data == "success"){

        //             jQuery("#regis_num").attr('style','border:1px solid #e74c3c');
        //             jQuery("#regis_error").attr('style','visibility:block');
        //         }
        //         else{
        //             // jQuery("#regis_num").attr('style','border:1px solid black');
        //             // jQuery("#regis_error").attr('style','visibility:none');
        //         }

        //     }
        // });

        //  });
        $("#regis_num").keyup(function() {
            //  function get_regis(){

            var council = document.getElementById('state_medical_council').value
            var regis = document.getElementById('regis_num').value
            console.log(council);
            console.log(regis);

            $.ajax({
                type: 'POST',
                data: {
                    'council': council,
                    'regis': regis
                },
                url: "<?php echo base_url('hospital_Controller/check_regis_num') ?>",
                success: function(data) {
                    if (data == "success") {

                        jQuery("#regis_num").attr('style', 'border:1px solid #e74c3c');
                        jQuery("#regis_error").attr('style', 'visibility:block');
                    }
                    if (data == "error") {
                        document.getElementById('regis_num').removeAttribute('style');
                        jQuery("#regis_error").attr('style', 'visibility:hidden');
                    }

                }
            });

        });

        $('#doc_speciality').change(function() {
            var speciality = $(this).val();

            console.log(speciality);

            if (speciality == "Other") {

                document.getElementById('Other_speciality').style.display = 'block';
            } else {
                document.getElementById('Other_speciality').style.display = 'none';
            }
        });

        $('#doc_degree').change(function() {

            //alert($(this).val());

            var degree_data = $(this).val();
            console.log(degree_data);
            if (degree_data == "" || degree_data == "Other") {
                document.getElementById('dis_specialization').style.display = 'none';
            } else {
                document.getElementById('dis_specialization').style.display = 'block';
            }

            if (degree_data == "Other") {
                document.getElementById('Other_degree').style.display = 'block';
            } else {
                document.getElementById('Other_degree').style.display = 'none';
            }


            // $.ajax({
            // type: 'POST', 
            // data: {'degree_name': degree_data },       
            // url: "<?php echo base_url('hospital_Controller/get_doc_degee') ?>", 
            // success: function (data) {

            //$('#doc_specialization').val(data);
            if (degree_data == "UG") {
           
                selOptn =
                    "<option value=''>Select</option>" +
                    "<option value='MBBS'>MBBS</option>" +
                    "<option value='BDS'>BDS</option>" +
                    "<option value='BAMS '>BAMS </option>" +
                    "<option value='BUMS'>BUMS</option>" +
                    "<option value='BHMS '>BHMS </option>" +
                    "<option value='BYNS'>BYNS</option>" +
                    "<option value='B.V.Sc & AH'>B.V.Sc & AH</option>" +
                    "<option value='Other'>Other</option>"
                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)
                // $('#doc_specialization').append(selOptn);
            }
            if (degree_data == "PG") {
               
                selOptn =
                    "<option value=''>Select</option>" +
                    "<option value='MD'>MD</option>" +
                    "<option value='MS'>MS</option>" +
                    "<option value='DNB'>DNB</option>" +
                    "<option value='Diploma'>Diploma</option>" +
                    "<option value='Other'>Other</option>"
                // $(this).prev('select').remove();
                //$('#doc_specialization').last().remove();

                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)
                // $('#doc_specialization').append(selOptn);
            }
            if (degree_data == "Super Specialization") {
            
                selOptn =
                    "<option value=''>Select</option>" +
                    "<option value='DM'>DM</option>" +
                    "<option value='MCH'>MCH</option>" +
                    "<option value='Other'>Other</option>"
                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)


            }
            //$("#divContent").html(degree_data);
            if (degree_data == " ") {
            
                selOptn =
                    "<option value=''>Select</option>"

                $("#doc_specialization").find("option").remove().end().append(
                    selOptn)
            }

        });




        function get_speciality() {
            var special_val = document.getElementById("doc_specialization").value;
            var degree_val = document.getElementById("doc_degree").value;
            // alert(special_val)
            console.log(special_val);
            console.log(degree_val);

            if (special_val == "MBBS" || special_val == "BAMS " || special_val == "BHMS " ||
                special_val == "" || special_val == "BDS" || special_val == "BUMS" ||
                special_val == "BYNS" || special_val == "B.V.Sc & AH" || special_val == "Other") {
                document.getElementById('dis_speciality').style.display = 'none';
            } else {
                document.getElementById('dis_speciality').style.display = 'block';
            }

            //  degree has value then not show specializaiton && degree_val != ""

            if (special_val == "Other") {

                document.getElementById('Other_specialization').style.display = 'block';
            } else {
                document.getElementById('Other_specialization').style.display = 'none';
            }



            if (special_val == "MD") {
                selOptn =
                    "<option value='Anatomy'>MD in Anatomy</option>" +
                    "<option value='Anesthesia'>MD in Anesthesia</option>" +
                    "<option value='Aerospace'>MD in Aerospace Medicine</option>" +
                    "<option value='Biochemistry'>MD in Biochemistry</option>" +
                    "<option value='Dermatology'>MD in Dermatology</option>" +
                    "<option value='ENT' >MD in ENT</option>" +
                    "<option value='Medicine' >MD in Forensic Medicine</option>" +
                    "<option value='Geriatrics' >MD in Geriatrics</option>" +
                    "<option value='General Surgery' >MD in General Surgery</option>" +
                    "<option value='Ophthalmology' >MD in Ophthalmology</option>" +
                    "<option value='Obstetrics & Gynecology' >MD in Obstetrics & Gynecology</option>" +
                    "<option value='Orthopedics' >MD in Orthopedics</option> " +
                    "<option value='Other'>Other</option>"

                $("#doc_speciality").find("option").remove().end().append(selOptn)

                //$('#doc_speciality').append(selOptn);
            }
            if (special_val == "MS") {
                selOptn =
                    "<option value='MS Pediatric surgery'>MS Pediatric surgery</option>" +
                    "<option value='MS Plastic surgery'>MS Plastic surgery</option>" +
                    "<option value='MS Cardiothoracic surgery'>MS Cardiothoracic surgery</option>" +
                    "<option value='MS Urology'>MS Urology</option>" +
                    "<option value='MS Cardiac surgery'>MS Cardiac surgery</option>" +
                    "<option value='MS Cosmetic surgery'>MS Cosmetic surgery</option>" +
                    "<option value='MS ENT'>MS ENT</option>" +
                    "<option value='MS Ophthalmology'>MS Ophthalmology</option>" +
                    "<option value='MS Gynecology'>MS Gynecology</option>" +
                    "<option value='MS Obstetrics'>MS Obstetrics</option>" +
                    "<option value='MS Orthopedics'>MS Orthopedics</option>" +
                    "<option value='Other'>Other</option>"

                $("#doc_speciality").find("option").remove().end().append(selOptn)
            }

            if (special_val == "DNB") {
                selOptn =
                    "<option value='DNB (Anaesthesiology'>DNB (Anaesthesiology)</option>" +
                    "<option value='DNB (Dermatology and VD'>DNB (Dermatology and VD)</option>" +
                    "<option value='DNB (Nuclear Medicine'>DNB (Nuclear Medicine)</option>" +
                    "<option value='DNB (OBGY)'>DNB (OBGY)</option>" +
                    "<option value='DNB (Ophthalmology)'>DNB (Ophthalmology)</option> " +
                    "<option value='DNB (Orthopaedics)'>DNB (Orthopaedics)</option> " +
                    "<option value='DNB (Otorhinolaryngology)'>DNB (Otorhinolaryngology)</option> " +
                    "<option value='DNB (Paediatrics)'>DNB (Paediatrics)</option> " +
                    "<option value='DNB (Psychiatry)'>DNB (Psychiatry)</option> " +
                    "<option value='DNB (Radio-Diagnosis)'>DNB (Radio-Diagnosis)</option> " +
                    "<option value='DNB (Radio-Therapy)'>DNB (Radio-Therapy)</option> " +
                    "<option value='DNB (Respiratory Disease)'>DNB (Respiratory Disease)</option> " +
                    "<option value='DNB (Physical Medicine and Rehabilitation'>DNB (Physical Medicine and Rehabilitation</option> " +
                    "<option value='DNB (Pathology)'>DNB (Pathology)</option>" +
                    "<option value='Other'>Other</option>"

                $("#doc_speciality").find("option").remove().end().append(selOptn)
            }

            if (special_val == "Diploma") {
                selOptn =
                    "<option value='Allergy & Clinical Immunology'>Allergy & Clinical Immunology</option>" +
                    "<option value='Anesthesiology'>Anesthesiology</option>" +
                    "<option value='Clinical Pathology'>Clinical Pathology</option>" +
                    "<option value='Community Medicine/Public Health'>Community Medicine/Public Health</option> " +
                    "<option value='Dermatology, Venereology, and Leprosy'>Dermatology, Venereology, and Leprosy</option>" +
                    "<option value='ENT'>ENT</option>" +
                    "<option value='Forensic Medicine'>Forensic Medicine</option>" +
                    "<option value='Health Education'>Health Education</option>" +
                    "<option value='Health Administration'>Health Administration</option>" +
                    "<option value='Immunohematology & Blood Transfusion'>Immunohematology & Blood Transfusion</option>" +
                    "<option value='Obstetrics & Gynaecology'>Obstetrics & Gynaecology</option>" +
                    "<option value='Occupational Health'>Occupational Health</option>" +
                    "<option value='Ophthalmology'>Ophthalmology</option>" +
                    "<option value='Orthopedics'>Orthopedics</option>" +
                    "<option value='Otorhinolaryngology'>Otorhinolaryngology</option>" +
                    "<option value='Pediatrics'>Pediatrics</option>" +
                    "<option value='Psychiatry'>Psychiatry</option>" +
                    "<option value='Physical Medicine & Rehabilitation'>Physical Medicine & Rehabilitation</option>" +
                    "<option value='Pulmonary medicine'>Pulmonary medicine</option>" +
                    "<option value='Radio-diagnosis'>Radio-diagnosis</option>" +
                    "<option value='Radiation Medicine'>Radiation Medicine</option>" +
                    "<option value='Sports Medicine'>Sports Medicine</option>" +
                    "<option value='Tropical medicine'>Tropical medicine</option>" +
                    "<option value='Tuberculosis & Chest Diseases'>Tuberculosis & Chest Diseases</option>" +
                    "<option value='Virology'>Virology</option>" +
                    "<option value='Other'>Other</option>"
                $("#doc_speciality").find("option").remove().end().append(selOptn)
            }

            if (special_val == "DM") {
                selOptn =
                    "<option value='Cardiology'>Cardiology</option>" +
                    "<option value='Clinical Haematology'>Clinical Haematology</option>" +
                    "<option value='Clinical Immunology & Rheumatology'>Clinical Immunology & Rheumatology</option>" +
                    "<option value='Endocrinology'>Endocrinology</option>" +
                    "<option value='Geriatric Mental Health'>Geriatric Mental Health</option>" +
                    "<option value='Hepatology'>Hepatology</option>" +
                    "<option value='Infectious Disease'>Infectious Disease</option>" +
                    "<option value='Medical Genetics'>Medical Genetics</option>" +
                    "<option value='Medical Oncology'>Medical Oncology</option>" +
                    "<option value='Neonatology'>Neonatology</option>" +
                    "<option value='Nephrology'>Nephrology</option>" +
                    "<option value='Neuro Radiology'>Neuro Radiology</option>" +
                    "<option value='Interventional Radiology'>Interventional Radiology</option>" +
                    "<option value='Neurology'>Neurology</option>" +
                    "<option value='Onco-Pathology'>Onco-Pathology</option>" +
                    "<option value='Other'>Other</option>"
                $("#doc_speciality").find("option").remove().end().append(selOptn)
            }

            if (special_val == "MCH") {
                selOptn =
                    "<option value='Endocrine Surgery'>Endocrine Surgery</option>" +
                    "<option value='Gynaecological Oncology'>Gynaecological Oncology</option>" +
                    "<option value='Hand Surgery'>Hand Surgery</option>" +
                    "<option value='Head and Neck Surgery'>Head and Neck Surgery</option>" +
                    "<option value='Hepato Pancreato Biliary Surgery'>Hepato Pancreato Biliary Surgery</option>" +
                    "<option value='Neurosurgery'>Neurosurgery</option>" +
                    "<option value='Paediatric Cardiothoracic Vascular Surgery'>Paediatric Cardiothoracic Vascular Surgery</option>" +
                    "<option value='Paediatric Surgery'>Paediatric Surgery</option>" +
                    "<option value='Plastic & Reconstructive Surgery'>Plastic & Reconstructive Surgery</option>" +
                    "<option value='Reproductive Medicine & Surgery'>Reproductive Medicine & Surgery</option>" +
                    "<option value='Surgical Gastroenterology/ G.I. Surgery'>Surgical Gastroenterology/ G.I. Surgery</option>" +
                    "<option value='Surgical Oncology'>Surgical Oncology</option>" +
                    "<option value='Thoracic Surgery'>Thoracic Surgery</option>" +
                    "<option value='Urology/Genito-Urinary Surgery'>Urology/Genito-Urinary Surgery</option>" +
                    "<option value='Vascular Surgery'>Vascular Surgery</option>" +
                    "<option value='Other'>Other</option>"
                $("#doc_speciality").find("option").remove().end().append(selOptn)
            }
        }

        $("#propic").change(function() {

            readURL(this);

        });
    </script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 130,
            duration: 1000,
        });
    </script>
    <!-- <script>
        function clicked(){
            Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Successfully Added',
                        showConfirmButton: false,
                        timer: 1000
                      })
        }
      
        </script>
<?php
if (isset($doctors)) {

?>
    
 
    <script>
     clicked();
     function clicked(){
                     Swal.fire({
                         position: 'top-end',
                         icon: 'error',
                         title: 'Successfully Added',
                         showConfirmButton: false,
                         timer: 1500
                       });
                       
                     };
                     window.location = 'doctors';
                     </script>
                     <?php


                    } else {
                        // $this->load->view('Hospital/schedule', $data);
                    }
                        ?> -->
</body>

</html>