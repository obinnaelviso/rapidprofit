<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - {{ config('app.name') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/libs/css/style.css">
    <link rel="stylesheet" href="/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<link href="/favicon.png" rel="icon" type="image/png"/>
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        height: 100%;
        background-color: black;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <div class="auth-container">
        <div class="card auth">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 signup">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <a href="/"><img src="/images/logo.png" class="mb-4 d-md-none" width="200px" alt="{{ config('app.name') }}"></a>
                            <h2 class="auth-heading">Sign Up</h2>
                            <p class="auth-subheading mb-4">Fill the form to create an account</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="col-md-12 col-form-label auth-label text-capitalize">First Name</label>
                                        <input class="form-control auth-input @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="e.g John" required>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name" class="col-md-12 col-form-label auth-label text-capitalize">Last Name</label>
                                        <input class="form-control auth-input @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="e.g Doe" required>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address" class="col-md-12 col-form-label auth-label text-capitalize">Address</label>
                                        <input class="form-control auth-input @error('address') is-invalid @enderror" value="{{ old('address') }}" type="text" name="address" placeholder="e.g 28 Hawthorne Lane
                                        Great Falls, MT 12345" required>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country" class="col-md-12 col-form-label auth-label text-capitalize">Country</label>
                                        <select style="cursor: pointer;" class="form-control auth-select @error('country') is-invalid @enderror mb-2" name="country" style="color: rgb(36, 13, 2)" required>
                                            <option value="">Select Country</option>
                                            <option>Afghanistan</option>
                                            <option>Åland Islands</option>
                                            <option>Albania</option>
                                            <option>Algeria</option>
                                            <option>American Samoa</option>
                                            <option>Andorra</option>
                                            <option>Angola</option>
                                            <option>Anguilla</option>
                                            <option>Antarctica</option>
                                            <option>Antigua and Barbuda</option>
                                            <option>Argentina</option>
                                            <option>Armenia</option>
                                            <option>Aruba</option>
                                            <option>Australia</option>
                                            <option>Austria</option>
                                            <option>Azerbaijan</option>
                                            <option>Bahamas</option>
                                            <option>Bahrain</option>
                                            <option>Bangladesh</option>
                                            <option>Barbados</option>
                                            <option>Belarus</option>
                                            <option>Belgium</option>
                                            <option>Belize</option>
                                            <option>Benin</option>
                                            <option>Bermuda</option>
                                            <option>Bhutan</option>
                                            <option>Bolivia, Plurinational State of</option>
                                            <option>Bonaire, Sint Eustatius and Saba</option>
                                            <option>Bosnia and Herzegovina</option>
                                            <option>Botswana</option>
                                            <option>Bouvet Island</option>
                                            <option>Brazil</option>
                                            <option>British Indian Ocean Territory</option>
                                            <option>Brunei Darussalam</option>
                                            <option>Bulgaria</option>
                                            <option>Burkina Faso</option>
                                            <option>Burundi</option>
                                            <option>Cambodia</option>
                                            <option>Cameroon</option>
                                            <option>Canada</option>
                                            <option>Cape Verde</option>
                                            <option>Cayman Islands</option>
                                            <option>Central African Republic</option>
                                            <option>Chad</option>
                                            <option>Chile</option>
                                            <option>China</option>
                                            <option>Christmas Island</option>
                                            <option>Cocos (Keeling) Islands</option>
                                            <option>Colombia</option>
                                            <option>Comoros</option>
                                            <option>Congo</option>
                                            <option>Congo, the Democratic Republic of the</option>
                                            <option>Cook Islands</option>
                                            <option>Costa Rica</option>
                                            <option>Côte d'Ivoire</option>
                                            <option>Croatia</option>
                                            <option>Cuba</option>
                                            <option>Curaçao</option>
                                            <option>Cyprus</option>
                                            <option>Czech Republic</option>
                                            <option>Denmark</option>
                                            <option>Djibouti</option>
                                            <option>Dominica</option>
                                            <option>Dominican Republic</option>
                                            <option>Ecuador</option>
                                            <option>Egypt</option>
                                            <option>El Salvador</option>
                                            <option>Equatorial Guinea</option>
                                            <option>Eritrea</option>
                                            <option>Estonia</option>
                                            <option>Ethiopia</option>
                                            <option>Falkland Islands (Malvinas)</option>
                                            <option>Faroe Islands</option>
                                            <option>Fiji</option>
                                            <option>Finland</option>
                                            <option>France</option>
                                            <option>French Guiana</option>
                                            <option>French Polynesia</option>
                                            <option>French Southern Territories</option>
                                            <option>Gabon</option>
                                            <option>Gambia</option>
                                            <option>Georgia</option>
                                            <option>Germany</option>
                                            <option>Ghana</option>
                                            <option>Gibraltar</option>
                                            <option>Greece</option>
                                            <option>Greenland</option>
                                            <option>Grenada</option>
                                            <option>Guadeloupe</option>
                                            <option>Guam</option>
                                            <option>Guatemala</option>
                                            <option>Guernsey</option>
                                            <option>Guinea</option>
                                            <option>Guinea-Bissau</option>
                                            <option>Guyana</option>
                                            <option>Haiti</option>
                                            <option>Heard Island and McDonald Islands</option>
                                            <option>Holy See (Vatican City State)</option>
                                            <option>Honduras</option>
                                            <option>Hong Kong</option>
                                            <option>Hungary</option>
                                            <option>Iceland</option>
                                            <option>India</option>
                                            <option>Indonesia</option>
                                            <option>Iran, Islamic Republic of</option>
                                            <option>Iraq</option>
                                            <option>Ireland</option>
                                            <option>Isle of Man</option>
                                            <option>Israel</option>
                                            <option>Italy</option>
                                            <option>Jamaica</option>
                                            <option>Japan</option>
                                            <option>Jersey</option>
                                            <option>Jordan</option>
                                            <option>Kazakhstan</option>
                                            <option>Kenya</option>
                                            <option>Kiribati</option>
                                            <option>Korea, Democratic People's Republic of</option>
                                            <option>Korea, Republic of</option>
                                            <option>Kuwait</option>
                                            <option>Kyrgyzstan</option>
                                            <option>Lao People's Democratic Republic</option>
                                            <option>Latvia</option>
                                            <option>Lebanon</option>
                                            <option>Lesotho</option>
                                            <option>Liberia</option>
                                            <option>Libya</option>
                                            <option>Liechtenstein</option>
                                            <option>Lithuania</option>
                                            <option>Luxembourg</option>
                                            <option>Macao</option>
                                            <option>Macedonia, the former Yugoslav Republic of</option>
                                            <option>Madagascar</option>
                                            <option>Malawi</option>
                                            <option>Malaysia</option>
                                            <option>Maldives</option>
                                            <option>Mali</option>
                                            <option>Malta</option>
                                            <option>Marshall Islands</option>
                                            <option>Martinique</option>
                                            <option>Mauritania</option>
                                            <option>Mauritius</option>
                                            <option>Mayotte</option>
                                            <option>Mexico</option>
                                            <option>Micronesia, Federated States of</option>
                                            <option>Moldova, Republic of</option>
                                            <option>Monaco</option>
                                            <option>Mongolia</option>
                                            <option>Montenegro</option>
                                            <option>Montserrat</option>
                                            <option>Morocco</option>
                                            <option>Mozambique</option>
                                            <option>Myanmar</option>
                                            <option>Namibia</option>
                                            <option>Nauru</option>
                                            <option>Nepal</option>
                                            <option>Netherlands</option>
                                            <option>New Caledonia</option>
                                            <option>New Zealand</option>
                                            <option>Nicaragua</option>
                                            <option>Niger</option>
                                            <option>Nigeria</option>
                                            <option>Niue</option>
                                            <option>Norfolk Island</option>
                                            <option>Northern Mariana Islands</option>
                                            <option>Norway</option>
                                            <option>Oman</option>
                                            <option>Pakistan</option>
                                            <option>Palau</option>
                                            <option>Palestinian Territory, Occupied</option>
                                            <option>Panama</option>
                                            <option>Papua New Guinea</option>
                                            <option>Paraguay</option>
                                            <option>Peru</option>
                                            <option>Philippines</option>
                                            <option>Pitcairn</option>
                                            <option>Poland</option>
                                            <option>Portugal</option>
                                            <option>Puerto Rico</option>
                                            <option>Qatar</option>
                                            <option>Réunion</option>
                                            <option>Romania</option>
                                            <option>Russian Federation</option>
                                            <option>Rwanda</option>
                                            <option>Saint Barthélemy</option>
                                            <option>Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option>Saint Kitts and Nevis</option>
                                            <option>Saint Lucia</option>
                                            <option>Saint Martin (French part)</option>
                                            <option>Saint Pierre and Miquelon</option>
                                            <option>Saint Vincent and the Grenadines</option>
                                            <option>Samoa</option>
                                            <option>San Marino</option>
                                            <option>Sao Tome and Principe</option>
                                            <option>Saudi Arabia</option>
                                            <option>Senegal</option>
                                            <option>Serbia</option>
                                            <option>Seychelles</option>
                                            <option>Sierra Leone</option>
                                            <option>Singapore</option>
                                            <option>Sint Maarten (Dutch part)</option>
                                            <option>Slovakia</option>
                                            <option>Slovenia</option>
                                            <option>Solomon Islands</option>
                                            <option>Somalia</option>
                                            <option>South Africa</option>
                                            <option>South Georgia and the South Sandwich Islands</option>
                                            <option>South Sudan</option>
                                            <option>Spain</option>
                                            <option>Sri Lanka</option>
                                            <option>Sudan</option>
                                            <option>Suriname</option>
                                            <option>Svalbard and Jan Mayen</option>
                                            <option>Swaziland</option>
                                            <option>Sweden</option>
                                            <option>Switzerland</option>
                                            <option>Syrian Arab Republic</option>
                                            <option>Taiwan, Province of China</option>
                                            <option>Tajikistan</option>
                                            <option>Tanzania, United Republic of</option>
                                            <option>Thailand</option>
                                            <option>Timor-Leste</option>
                                            <option>Togo</option>
                                            <option>Tokelau</option>
                                            <option>Tonga</option>
                                            <option>Trinidad and Tobago</option>
                                            <option>Tunisia</option>
                                            <option>Turkey</option>
                                            <option>Turkmenistan</option>
                                            <option>Turks and Caicos Islands</option>
                                            <option>Tuvalu</option>
                                            <option>Uganda</option>
                                            <option>Ukraine</option>
                                            <option>United Arab Emirates</option>
                                            <option>United Kingdom</option>
                                            <option>United States</option>
                                            <option>United States Minor Outlying Islands</option>
                                            <option>Uruguay</option>
                                            <option>Uzbekistan</option>
                                            <option>Vanuatu</option>
                                            <option>Venezuela, Bolivarian Republic of</option>
                                            <option>Viet Nam</option>
                                            <option>Virgin Islands, British</option>
                                            <option>Virgin Islands, U.S.</option>
                                            <option>Wallis and Futuna</option>
                                            <option>Western Sahara</option>
                                            <option>Yemen</option>
                                            <option>Zambia</option>
                                            <option>Zimbabwe</option>
                                        </select>
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="col-md-12 col-form-label auth-label text-capitalize">Phone Number</label>
                                        <input class="form-control auth-input @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="+1 773 519 8392" required>
                                    </div>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="col-md-12 col-form-label auth-label text-capitalize">Email Address</label>
                                        <input class="form-control auth-input @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="e.g johndoe@example.com" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="col-md-12 col-form-label auth-label text-capitalize">Password</label>
                                        <input class="form-control auth-input @error('password') is-invalid @enderror" id="pass1" name="password" type="password" placeholder="Please type in any 8-digit alphanumeric characters with uppercase and symbols" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password-confirmation" class="col-md-12 col-form-label auth-label text-capitalize">Confirm Password</label>
                                        <input class="form-control auth-input @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" placeholder="Retype Password" required>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="referral_code" class="col-md-12 col-form-label auth-label text-capitalize">Referral Code</label>
                                        <input class="form-control auth-input @error('referral_code') is-invalid @enderror" type="text" name="referral_code" value="{{ old('referral_code') ?: request('ref') }}" placeholder="Referral Code (if any)">
                                        @error('referral_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn auth-button mt-2" type="submit">Create Your Account</button>
                            <div class="auth-label">Already have an account? <a href="{{ route('login') }}">Sign In!</a></div>
                        </form>
                    </div>
                    <div class="col-md-6 d-none d-sm-flex auth-bg">
                        <a href="/"><img src="/images/logo.png" alt="{{ config('app.name') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
