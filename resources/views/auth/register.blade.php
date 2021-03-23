<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Register - {{ config('app.name') }}</title>

        <meta name="description" content="Welcome to {{ config('app.name') }} investment platform. One of the top World-leading Investment Platform that gives the best offers.">
        <meta name="author" content="{{ config('app.name') }}">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="/favicon.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="{{ asset('css/themes.css') }}">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="{{ asset('js/vendor/modernizr-3.3.1.min.js') }}"></script>
    </head>
    <body>
        <img src="{{ asset('img/placeholders/layout/login2_full_bg.jpg') }}" alt="Full Background" class="full-bg animation-pulseSlow">
        <!-- Login Container -->
        <div id="login-container">
            <!-- Register Header -->
            <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
                <img src="/images/logo.png" style="width: 80px"> <strong>Create Account</strong>
            </h1>
            <!-- END Register Header -->

            <!-- Register Form -->
            <div class="block animation-fadeInQuickInv">
                <!-- Register Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="{{ route('login') }}" class="btn btn-effect-ripple btn-success" data-toggle="tooltip" data-placement="left" title="Back to login"><i class="fa fa-user"></i></a>
                    </div>
                    <h2>Register</h2>
                </div>
                <!-- END Register Title -->

                <!-- Register Form -->
                <form id="form-register" method="POST" action="{{ route('register') }}" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" id="first_name"  name="first_name" value="{{ old('first_name') }}" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="last_name"  name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" id="address"  name="address" value="{{ old('address') }}" placeholder="Address" class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <select style="cursor: pointer;" class="form-control @error('country') is-invalid @enderror mb-2" name="country" required>
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
                    <div class="form-group">
                      <div class="col-md-12">
                        <label for="validation">Please upload a means of identification (ID/Passport/Driver's License)</label>
                        <input type="file" class="form-control-file" name="" id="" placeholder="" aria-describedby="fileHelpId">
                        <small id="fileHelpId" class="form-text text-muted">(File size should be less than 2048kb)</small>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" id="phone"  name="phone" value="{{ old('phone') }}" placeholder="Phone Number" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="email" id="email"  name="email" value="{{ old('email') }}" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" id="password"  name="password" value="{{ old('password') }}" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="password" id="password_confirmation"  name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input class="form-control @error('referral_code') is-invalid @enderror" type="text" name="referral_code" value="{{ old('referral_code') ?: request('ref') }}" placeholder="Referral Code (if any)">
                            @error('referral_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-actions row">
                        <div class="col-md-12">
                            <label class="csscheckbox csscheckbox-primary" data-toggle="tooltip" title="Please agree to the terms and conditions to continue">
                                <input type="checkbox" id="terms" name="terms">
                                <span></span>
                            </label>
                            <a href="#" class="text-danger">Terms And Conditions</a>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-effect-ripple btn-primary btn-block"><i class="fa fa-plus"></i> Create Account</button>
                        </div>
                    </div>
                </form>
                <!-- END Register Form -->
            </div>
            <!-- END Register Block -->

            <!-- Footer -->
            <footer class="text-muted text-center animation-pullUp">
                <small>{{ date('Y') }} &copy; <a href="{{ config('app.url') }}">{{ config('app.name') }}</a></small>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Login Container -->

        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>


        <!-- Load and execute javascript code used only in this page -->
        <script src="{{ asset('js/pages/readyRegister.js') }}"></script>
        <script>$(function(){ ReadyRegister.init(); });</script>
    </body>
</html>
