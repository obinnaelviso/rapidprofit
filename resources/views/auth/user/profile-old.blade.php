@extends('layouts.main')
@section('title', 'Profile - '.config('app.name'))
@section('profile-active', 'active')
@section('sidebar')
@include('layouts.user-sidebar')
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <div class="section-block" id="select">
            <h1 class="section-title">Profile</h1>
            <p>Modify your profile details, change password and contact admin to change email address.</p>
        </div>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('layouts.alerts')
        {{-- <div class="alert alert-info">
            <i class="fa fa-arrow-right" aria-hidden="true"></i> <b>Note:</b> You cannot modify your Email Address.<br>
        </div> --}}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="splash-container" method="POST" action="{{ route('user.profile') }}">
            @csrf @method('put')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="col-md-12 col-form-label text-uppercase">First Name</label>
                                <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $user->first_name ?: old('first_name') }}" placeholder="e.g John" required>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="col-md-12 col-form-label text-uppercase">Last Name</label>
                                <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ $user->last_name ?: old('last_name') }}" placeholder="e.g Doe" required>
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
                                <label for="address" class="col-md-12 col-form-label text-uppercase">Address</label>
                                <input class="form-control" value="{{ $user->address ?: old('address') }}" type="text" name="address" placeholder="e.g No 3. Freedom Street, LA" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone" class="col-md-12 col-form-label text-uppercase">Phone Number</label>
                                <input class="form-control" type="text" name="phone" placeholder="e.g +1234567890" value="{{ $user->phone ?: old('phone') }}" required>
                            </div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="col-md-12 col-form-label text-uppercase">Email Address</label>
                                <input class="form-control" type="email" name="email" value="{{ $user->email ?: old('email') }}" readonly>
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
                                <label for="password" class="col-md-12 col-form-label text-uppercase">Old Password</label>
                                <input class="form-control  @error('password') is-invalid @enderror" id="pass1" name="old_password" type="password" placeholder="Type in your old password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="col-md-12 col-form-label text-uppercase">New Password</label>
                                <input class="form-control  @error('password') is-invalid @enderror" id="pass1" name="password" type="password" placeholder="Please type in any 8-digit alphanumeric characters with uppercase and symbols">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password-confirmation" class="col-md-12 col-form-label text-uppercase">Confirm Password</label>
                                <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" placeholder="Retype New Password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="referral_code" class="col-md-12 col-form-label text-uppercase">Referral Code</label>
                                <input class="form-control" type="text" name="referral_code" value="{{ $user->referral_code }}" readonly placeholder="Referral Code (if any)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <button class="btn btn-block btn-dark" type="submit" style="color: white">Edit Profile</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
