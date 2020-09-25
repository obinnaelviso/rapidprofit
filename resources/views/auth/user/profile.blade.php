@extends('layouts.main')
@section('title', 'Profile - '.config('app.name'))
@section('profile-active', 'active')
@section('sidebar')
@include('layouts.user-sidebar')
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card profile-card">
          <div class="card-body">
              <div class="row">
                  <div class="col-md-5">
                    <img src="/images/icons/logo-white.svg" alt="{{ config('app.name') }}-white" width="150">
                  </div>
                  <div class="col-md-7 my-3">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card mb-0 statistics statistics-left-bg">
                                <div class="card-body">
                                    <div class="active-referrals">
                                        <p class="profile-stats-heading">Active<br>Referral</p>
                                        <h2 class="profile-stats-text" id="active-investments">5</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card mb-0 statistics statistics-middle-bg">
                                <div class="card-body">
                                    <div class="total-referrals">
                                        <p class="profile-stats-heading">Total<br>Referral</p>
                                        <h2 class="profile-stats-text" id="active-investments">{{ $user->referrerBonus->count() }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card mb-0 statistics statistics-right-bg">
                                <div class="card-body">
                                    <div class="referral-bonus">
                                        <p class="profile-stats-heading">Referral<br>Bonus</p>
                                        <h3 class="profile-stats-text" id="active-investments">{{ $user->wallet->bonus }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        {{-- <div class="alert alert-info">
            <i class="fa fa-arrow-right" aria-hidden="true"></i> <b>Note:</b> You cannot modify your Email Address.<br>
        </div> --}}
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-6 profile-image">
        <img src="/images/icons/profile-pic-big.svg" alt="profile-picture">
        <h3>{{ ucfirst($user->first_name.' '.$user->last_name) }}<br>
            <small class="text-muted">Child Investor</small>
        </h3>
    </div>
    <div class="col-md-6">
        <div class="form-row">
            <div class="col-md-4 mb-2"><div class="btn btn-block profile-btn" id="but-d">Referral Code</div></div>
            <div class="col-md-5 mb-2"><input type="text" value="{{ $user->referral_code }}" class="form-control fund-input profile-ref" readonly></div>
            <div class="col-md-3 mb-2"><button class="btn btn-block profile-btn" onclick="copyAddress('referral-link')" type="button">Copy Link</button></div>
            <a id="referral-link" class="d-none">{{ route('referral', $user->referral_code) }}</a>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-12">
        @include('layouts.alerts')
        <form method="POST" action="{{ route('user.profile') }}">
            @csrf @method('put')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="first_name" class="col-md-12 col-form-label auth-label text-capitalize">First Name</label>
                        <input class="form-control auth-input @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $user->first_name ?: old('first_name') }}" placeholder="e.g John" required>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="last_name" class="col-md-12 col-form-label auth-label text-capitalize">Last Name</label>
                        <input class="form-control auth-input @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ $user->last_name ?: old('last_name') }}" placeholder="e.g Doe" required>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="address" class="col-md-12 col-form-label auth-label text-capitalize">Address</label>
                        <input class="form-control auth-input @error('address') is-invalid @enderror" value="{{ $user->address ?: old('address') }}" type="text" name="address" placeholder="e.g 28 Hawthorne Lane
                        Great Falls, MT 12345" required>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="country" class="col-md-12 col-form-label auth-label text-capitalize">Country</label>
                        <select style="cursor: pointer;" class="form-control auth-select @error('country') is-invalid @enderror mb-2" name="country" required>
                            <option selected readonly>{{ $user->country }}</option>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone" class="col-md-12 col-form-label auth-label text-capitalize">Phone Number</label>
                        <input class="form-control auth-input @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ $user->phone ?: old('phone') }}" placeholder="+1 773 519 8392" required>
                    </div>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email" class="col-md-12 col-form-label auth-label text-capitalize">Email Address</label>
                        <input class="form-control auth-input @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->email ?: old('email') }}" placeholder="e.g johndoe@example.com" readonly>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="password" class="col-md-12 col-form-label auth-label text-capitalize">Old Password</label>
                        <input class="form-control auth-input @error('password') is-invalid @enderror" id="pass1" name="old_password" type="password" placeholder="Type in your old password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="password" class="col-md-12 col-form-label auth-label text-capitalize">New Password</label>
                        <input class="form-control auth-input @error('password') is-invalid @enderror" id="pass1" name="password" type="password" placeholder="Please type in any 8-digit alphanumeric characters with uppercase and symbols">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="password-confirmation" class="col-md-12 col-form-label auth-label text-capitalize">Confirm Password</label>
                        <input class="form-control auth-input @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" placeholder="Retype New Password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn auth-button mt-2" type="submit">Update Profile</button>
        </form>
    </div>
</div>
@endsection
@section('input-js')
<script>


    function copyAddress(id) {
        /* Get the text field */
        var copyText = document.getElementById(id);

        /* Select the text field */
        selectText(id)
        // copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        alert("Text copied to clipboard!");
    }

    function selectText(containerid) {
        if (document.selection) { // IE
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
        }
    }
</script>
@endsection
