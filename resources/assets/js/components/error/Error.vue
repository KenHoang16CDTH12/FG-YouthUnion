<template>
  <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
              <div class="col-md-4 col-10 p-0">
                <div class="card-header bg-transparent border-0">
                  <h2 class="error-code text-center mb-2">404</h2>
                  <h3 class="text-uppercase text-center">Page Not Found !</h3>
                </div>
                <div class="card-content">
                  <fieldset class="row py-2">
                    <div class="input-group col-12">
                      <input type="text" class="form-control form-control-xl input-xl border-grey border-lighten-1 "
                      placeholder="Search..." aria-describedby="button-addon2">
                      <span class="input-group-append" id="button-addon2">
                        <button class="btn btn-lg btn-secondary border-grey border-lighten-1" type="button"><i class="ft-search"></i></button>
                      </span>
                    </div>
                  </fieldset>
                  <div class="row py-2">
                    <div class="col-12 col-sm-6 col-md-6">
                      <a href="index.html" class="btn btn-primary btn-block"><i class="ft-home"></i> Back to Home</a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                      <a href="search-website.html" class="btn btn-danger btn-block"><i class="ft-search"></i>  Advanced search</a>
                    </div>
                  </div>
                </div>
              <!-- ============================================ -->
              <!-- Card Footer -->
              <!-- ============================================ -->
              <card-footer></card-footer>
              </div>
            </div>
          </section>
        </div>
      </div>
  </div>
</template>
