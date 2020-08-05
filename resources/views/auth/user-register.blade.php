<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/libs/css/style.css">
    <link rel="stylesheet" href="/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
    <form class="splash-container" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="text-center">
            <a href="../index.html"><img class="logo-img" src="/images/logo.png" alt="logo"></a>
            <h3 class="mb-1">Create your barter Account</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name" class="col-md-12 col-form-label text-uppercase">First Name</label>
                            <input class="form-control" type="text" name="first_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name" class="col-md-12 col-form-label text-uppercase">Last Name</label>
                            <input class="form-control" type="text" name="last_name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="col-md-12 col-form-label text-uppercase">Email Address</label>
                            <input class="form-control" type="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="col-md-12 col-form-label text-uppercase">Phone Number</label>
                            <input class="form-control" type="text" name="phone" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="col-md-12 col-form-label text-uppercase">Password</label>
                            <input class="form-control form-control" id="pass1" name="password" type="password" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password-confirmation" class="col-md-12 col-form-label text-uppercase">Confirm Password</label>
                            <input class="form-control" name="password_confirmation" type="password" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country" class="col-md-12 col-form-label text-uppercase">Country</label>
                            <select style="cursor: pointer;" class="form-control mb-4" name="country" required>
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
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="referral_code" class="col-md-12 col-form-label text-uppercase">Referral Code</label>
                            <input class="form-control" type="text" name="referral_code">
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if($errors->any())
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-warning" type="submit" style="color: white">Create account</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Already have an account? <a href="#" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>


</html>
