<template>
  <div>
    <section id="modal-animations">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="row my-2">
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#zoomIn"><i class="ft-plus white"></i> Add</button>
                      <!-- Modal -->
                      <div class="modal animated zoomIn text-left" id="zoomIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel69" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: 900px !important;">
                          <div class="modal-content">

                            <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel69"> Add User</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form form-horizontal row-separator">
                                <div class="form-body">
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
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group row last">
                                        <label class="col-md-3 label-control" for="userinput8">Classes ID</label>
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
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group row last">
                                        <label class="col-md-3 label-control" for="userinput8">Role ID</label>
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
                                        <label class="col-md-3 label-control" for="userinput8">Active</label>
                                        <div class="col-md-9">
                                          <div class="input-group">
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                              <input type="radio" name="customer1" class="custom-control-input" checked id="yes">
                                              <label class="custom-control-label" for="yes">Yes</label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio">
                                              <input type="radio" name="customer1" class="custom-control-input" id="no">
                                              <label class="custom-control-label" for="no">No</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-outline-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
      aria-expanded="true" class="btn btn-warning dropdown-toggle dropdown-menu-right btn-sm"><i class="ft-download-cloud white"></i></button>
      <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">
        <a href="#" class="dropdown-item"><i class="ft-upload"></i> Import</a>
        <a href="#" class="dropdown-item"><i class="ft-download"></i> Export</a>
        <a href="#" class="dropdown-item"><i class="ft-shuffle"></i> Find Duplicate</a>
      </span>
    </span>
    <button class="btn btn-default btn-sm"><i class="ft-settings white"></i></button>
  </div>
</template>
