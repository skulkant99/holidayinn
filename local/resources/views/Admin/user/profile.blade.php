@extends('admin.layouts.layout')
@section('css_top')
@endsection
@section('css_bottom')
@endsection
@section('body')
              <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card" id="profile-main">
                                <div class="content">
                                    <h3>Welcome Kate!</h3>
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                                <li class="nav-item"><a href="#profile11" class="nav-link active" aria-controls="profile11" role="tab" data-toggle="tab">Profile</a>
                                                </li>
                                                <li class="nav-item"><a href="#activities11" class="nav-link" aria-controls="messages11" role="tab" data-toggle="tab">Activities</a>
                                                </li>
                                                <li class="nav-item"><a href="#settings11" class="nav-link" aria-controls="settings11" role="tab" data-toggle="tab">Settings</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="profile11">
                                            <p>Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis..Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor,
                                                tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis..</p>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="p-15">
                                                        <h4>General</h4>
                                                        <hr>
                                                        <div class="row m-l-5">
                                                            <div class="col-sm-6 p-5">
                                                                <p><strong>Designation</strong></p>
                                                                <p><strong>Department</strong></p>
                                                                <p><strong>Country</strong></p>
                                                                <p><strong>Date of Birth</strong></p>
                                                            </div>
                                                            <div class="col-sm-6 p-10 p-5">
                                                                <p>Marketing Manager</p>
                                                                <p>Marketing</p>
                                                                <p>USA</p>
                                                                <p>12/10/1982</p>
                                                            </div>
                                                        </div>
                                                        <h4>Contact</h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <p><i class="zmdi zmdi-phone"></i>Telephone</p>
                                                                <p><i class="zmdi zmdi-phone"></i>Fax</p>
                                                                <p><i class="zmdi zmdi-phone"></i>Mobile</p>
                                                                <p><i class="zmdi zmdi-email"></i>Email</p>
                                                                <p><i class="zmdi zmdi-account"></i>Skype</p>
                                                            </div>
                                                            <div class="col-sm-6 p-10">
                                                                <p>+1 (612) 999 99999</p>
                                                                <p>+1 (612) 999 99999</p>
                                                                <p>+1 (612) 999 99999</p>
                                                                <p>kate@dashmonk.com</p>
                                                                <p>kate.skype</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="p-15">
                                                        <h4>Interests</h4>
                                                        <hr>
                                                        <p>
                                                            <Strong>Data Analytics</strong>
                                                        </p>
                                                        <p>
                                                            <Strong>Marketing</strong>
                                                        </p>
                                                        <p>
                                                            <Strong>Machine Learning</strong>
                                                        </p>
                                                        <p>
                                                            <Strong>Travel</strong>
                                                        </p>
                                                        <p>
                                                            <Strong>Golf</strong>
                                                        </p>
                                                        <p>
                                                            <Strong>Guitar</strong>
                                                        </p>
                                                        <p>
                                                            <Strong>Reading</strong>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="activities11">
                                            <div class="widget p-25">

                                                <div class="widget-body">
                                                    <div class="streamline sl-style-2">
                                                        <div class="sl-item sl-primary">
                                                            <div class="sl-content">
                                                                <small class="text-muted">5 mins ago</small>
                                                                <p>Williams has just joined Project X</p>
                                                            </div>
                                                        </div>
                                                        <div class="sl-item sl-danger">
                                                            <div class="sl-content">
                                                                <small class="text-muted">25 mins ago</small>
                                                                <p>Jane sent you a request to grant access to the project folder</p>
                                                            </div>
                                                        </div>
                                                        <div class="sl-item sl-success">
                                                            <div class="sl-content">
                                                                <small class="text-muted">40 mins ago</small>
                                                                <p>Kate added you to her team</p>
                                                            </div>
                                                        </div>
                                                        <div class="sl-item">
                                                            <div class="sl-content">
                                                                <small class="text-muted">55</small>
                                                                <p>John has finished his task</p>
                                                            </div>
                                                        </div>
                                                        <div class="sl-item sl-warning">
                                                            <div class="sl-content">
                                                                <small class="text-muted">60 mins ago</small>
                                                                <p>Jim shared a folder with you</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="settings11">
                                            <div class="widget p-25">
                                                <div class="widget-body">

                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label">Settings 1</label>
                                                        <div class="select col-md-8">
                                                            <select class="form-control">
                                                            <option>Select an Option</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                            <option>Option 4</option>
                                                            <option>Option 5</option>
                                                          </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label">Settings 2</label>
                                                        <div class="select col-md-8 mt-1">
                                                            <select class="form-control">
                                                              <option>Select an Option</option>
                                                              <option>Option 1</option>
                                                              <option>Option 2</option>
                                                              <option>Option 3</option>
                                                              <option>Option 4</option>
                                                              <option>Option 5</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-2">
                                                        <label class="col-sm-4">Disable Settings 3</label>
                                                        <div class="col-sm-8">
                                                            <input type="checkbox" checked data-toggle="switch" class="ct-primary" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-4">Enable Settings 4</label>
                                                        <div class="col-sm-8">
                                                            <input type="checkbox" data-toggle="switch" class="col-sm-8" />
                                                        </div>
                                                    </div>
                                                    <fieldset>
                                                        <div class="form-group row mt-2">
                                                            <label class="col-md-4 col-form-label">Settings 5</label>
                                                            <div class="col-md-8">
                                                                <div class="form-check">
                                                                    <label class="checkbox form-check-label">
                                                                        <input type="checkbox" class="form-check-input" data-toggle="checkbox" value="">Option 1
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="checkbox form-check-label">
                                                                        <input type="checkbox" class="form-check-input" data-toggle="checkbox" value="">Option 2
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group row">
                                                            <label class="col-md-4 col-form-label">Choose Your Option</label>
                                                            <div class="col-md-8">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="radio radio-inline">
                                                                        <input type="radio" data-toggle="radio" value="option1">a
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="radio radio-inline">
                                                                        <input type="radio" data-toggle="radio" value="option2">b
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="radio radio-inline">
                                                                        <input type="radio" data-toggle="radio" value="option3">c
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="author">
                                    <a href="#pablo">
                                        <img class="img avatar" src="{{asset('assets/admin/img/faces/avatar.png')}}" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="category text-gray">CEO / Co-Founder</h6>
                                    <h4 class="title">Alec Thompson</h4>
                                    <p class="description">
                                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                    </p>
                                    <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('js_top')
@endsection
@section('js_bottom')
@endsection