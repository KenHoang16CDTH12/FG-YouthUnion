<template>
  <section id="row-separator-form-layouts">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title" id="row-separator-colored-controls">User Profile</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body">
              <form class="form form-horizontal row-separator">
                <div class="form-body">
                  <h4 class="form-section"><i class="la la-eye"></i> Add User</h4>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput1">Fist Name</label>
                        <div class="col-md-9">
                          <input type="text" id="userinput1" class="form-control border-primary" placeholder="First Name"
                          name="firstname">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput2">Last Name</label>
                        <div class="col-md-9">
                          <input type="text" id="userinput2" class="form-control border-primary" placeholder="Last Name"
                          name="lastname">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput3">Username</label>
                        <div class="col-md-9">
                          <input type="text" id="userinput3" class="form-control border-primary" placeholder="Username"
                          name="username">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput4">Password</label>
                        <div class="col-md-9">
                          <input type="password" id="userinput4" class="form-control border-primary" placeholder="Password"
                          name="nickname">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput5">Email</label>
                        <div class="col-md-9">
                          <input class="form-control border-primary" type="email" placeholder="email" id="userinput5">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="userinput6">Website</label>
                        <div class="col-md-9">
                          <input class="form-control border-primary" type="url" placeholder="http://" id="userinput6">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row last">
                        <label class="col-md-3 label-control" for="userinput8">desc</label>
                        <div class="col-md-9">
                          <textarea id="userinput8" rows="6" class="form-control border-primary" name="desc"
                          placeholder="desc"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row last">
                        <label class="col-md-3 label-control" for="userinput8">Date</label>
                        <div class="col-md-9">
                          <input type="date" class="form-control border-primary" id="date12">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row last">
                        <label class="col-md-3 label-control" for="userinput8">File</label>
                        <div class="col-md-9">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input border-primary" id="inputGroupFile01">
                            <label class="custom-file-label border-primary" for="inputGroupFile01">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row last">
                        <label class="col-md-3 label-control" for="userinput8">Option</label>
                        <div class="col-md-9">
                          <div class="custom-file">
                            <select class="form-control" id="selectOpt">
                              <option>Select Option</option>
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                              <option>Option 4</option>
                              <option>Option 5</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row last">
                        <label class="col-md-3 label-control">Contact Number</label>
                        <div class="col-md-9">
                          <input class="form-control border-primary" type="tel" placeholder="Contact Number"
                          id="userinput7">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row last">
                        <label class="col-md-3 label-control" for="userinput8">Option</label>
                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group last">
                                <label for="timesheetinput5">Start Time</label>
                                <div class="position-relative has-icon-left">
                                  <input type="time" id="timesheetinput5" class="form-control" name="starttime">
                                  <div class="form-control-position">
                                    <i class="ft-clock"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group last">
                                <label for="timesheetinput6">End Time</label>
                                <div class="position-relative has-icon-left">
                                  <input type="time" id="timesheetinput6" class="form-control" name="endtime">
                                  <div class="form-control-position">
                                    <i class="ft-clock"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row last">
                        <label class="col-md-3 label-control" for="userinput8">Gender</label>
                        <div class="col-md-9">
                          <div class="input-group">
                            <div class="d-inline-block custom-control custom-radio mr-1">
                              <input type="radio" name="customer1" class="custom-control-input" checked id="male">
                              <label class="custom-control-label" for="male">Male</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                              <input type="radio" name="customer1" class="custom-control-input" id="female">
                              <label class="custom-control-label" for="female">Female</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions right">
                  <button type="button" class="btn btn-warning mr-1">
                    <i class="la la-remove"></i> Cancel
                  </button>
                  <button type="submit" class="btn btn-primary">
                    <i class="la la-check"></i> Save
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
