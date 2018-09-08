<template>
  <!-- card actions section start -->
  <section id="card-actions">
    <div class="row">
      <div class="col-12">
        <div class="card box-shadow-0 border-info">
          <!-- ============================================ -->
          <!-- Header -->
          <!-- ============================================ -->
          <card-header :title="cardTitle"></card-header>
          <div class="card-content collapse show">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                   <div class="float-left">
                    <div class="btn-group mr-1 mb-1">
                      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-model="entries" v-on:change="changeEntries()">
                        {{ entries }} entries
                      </button>
                      <div class="dropdown-menu">
                        <button class="dropdown-item" type="button" @click="changeEntries(10)">
                          <span class="mr-1 badge badge-pill badge-default badge-danger badge-glow" >10</span> entries
                        </button>
                        <button class="dropdown-item" type="button" @click="changeEntries(25)">
                          <span class="mr-1 badge badge-pill badge-default badge-info badge-glow">25</span> entries
                        </button>
                        <button class="dropdown-item" type="button" @click="changeEntries(50)">
                          <span class="mr-1 badge badge-pill badge-default badge-warning badge-glow">50</span> entries
                        </button>
                        <button class="dropdown-item" type="button" @click="changeEntries(100)">
                          <span class="mr-1 badge badge-pill badge-default badge-success badge-glow">100</span> entries
                        </button>
                      </div>
                    </div>
                   </div>
                   <span class="heading-elements m-10 float-right">
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
                      <span class="dropdown">
                        <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true" class="btn btn-warning dropdown-toggle dropdown-menu-right btn-sm"><i class="ft-download-cloud white"></i></button>
                        <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">
                          <a href="#" class="dropdown-item"><i class="ft-upload"></i> Import</a>
                          <a href="#" class="dropdown-item"><i class="ft-download"></i> Export</a>
                          <a href="#" class="dropdown-item"><i class="ft-shuffle"></i> Find Duplicate</a>
                        </span>
                      </span>
                      <button class="btn btn-default btn-sm"><i class="ft-settings white"></i></button>
                   </span>
                 </div>
              </div>
             <!-- ============================================ -->
             <!-- Search -->
             <!-- ============================================ -->
              <div class="row">
                <div class="col-md-12">
                  <fieldset class="form-group" v-if="query.items">
                    <input type="search" class="form-control" id="search" placeholder="Search ..." v-model="searchText" @keyup.enter="doSearch($event)"   v-on:input="searchText = $event.target.value">
                  </fieldset>
                </div>
              </div>
             <div class="table-responsive" v-if="query.items">
               <table id="recent-orders" class="table table-bordered mb-0">
                   <thead class="bg-info white">
                     <tr>
                         <th class="border-top-0">#</th>
                         <th class="border-top-0">Username</th>
                         <th class="border-top-0">Email</th>
                         <th class="border-top-0">Role</th>
                         <th class="border-top-0">Status</th>
                         <th class="border-top-0">Action</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr v-for="user in query.items.data" :key="user.id">
                       <td class="text-truncate">
                         {{ user.id }}
                       </td>
                       <td class="text-truncate">
                        <div class="media">
                          <div class="media-left pr-1">
                            <ul class="list-unstyled users-list m-0">
                                <li data-toggle="tooltip" data-popup="tooltip-custom" :data-original-title="user.username" class="avatar avatar-sm pull-up">
                                  <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-11.png" alt="Avatar">
                                </li>
                              </ul>
                            </div>
                            <div class="media-body media-middle">
                               <a href="#" class="media-heading">{{ user.username }}</a>
                            </div>
                          </div>
                       </td>
                       <td class="text-truncate">
                         <a href="mailto:email@example.com">{{ user.email }}</a>
                       </td>
                       <td class="text-truncate">
                        {{ user.role.type }}
                       </td>
                       <td class="text-truncate">
                        <div class="badge badge-glow badge-pill " :class="{'badge-success': user.active , 'badge-danger': !user.active}">{{ showTextStatus(user.active) }}</div>
                       </td>
                       <td class="text-truncate">
                         <div class="btn-group mx-2" role="group">
                            <button type="button" class="btn btn-sm btn-icon btn-info"><i class="la la-pencil"></i></button>
                            <span v-if="query.deleting"><em> - Deleting...</em></span>
                            <span v-else-if="user.deleteError" class="text-danger"> - ERROR: {{query.deleteError}}</span>
                            <button v-else type="button" class="btn btn-sm btn-icon btn-danger"><i class="la la-remove" @click.prevent="deleteUser(user.id)"></i></button>
                            <button type="button" class="btn btn-sm btn-icon btn-primary"><i class="la la-eye"></i></button>
                            <!-- la-eye-slash -->
                          </div>
                       </td>

                     </tr>
                   </tbody>
               </table>
             </div>
             <!-- ============================================ -->
             <!-- Pagination -->
             <!-- ============================================ -->
             <paginator v-if="query.items"
                :current_page="query.items.meta.current_page"
                :last_page="query.items.meta.last_page"
                :first_link="query.items.links.first"
                :last_link="query.items.links.last"
                :path="query.items.meta.path"
                :getDataWithEntries="getUsersWithEntries"
             ></paginator>
             <!-- ============================================ -->
             <!-- Loading -->
             <!-- ============================================ -->
             <card-loading v-if="query.loading"></card-loading>
            </div>
          </div>
          <card-footer v-if="query.items" :cardFooterText="cardFooterText"></card-footer>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { mapState, mapActions } from 'vuex';
import CardHeader from '../../components/card-element/Header.vue';
import CardLoading from '../../components/card-element/Loading.vue';
import CardFooter from '../../components/card-element/Footer.vue';
import Paginator from '../../components/card-element/Paginator.vue';

export default {
    components: {
       CardHeader, CardLoading, Paginator, CardFooter
    },
    data() {
      return {
        cardTitle: 'Users',
        entries: 10,
        searchText: '',
      }
    },
    computed: {
        ...mapState({
            query: state => state.users.all,
        }),
    },
    created () {
        let url = null;
        let entries = 10;
        let searchText = this.searchText;
        this.getIndexUsers({ url, entries, searchText });
    },
    methods: {
        ...mapActions('users', {
            getIndexUsers: 'index',
            deleteUser: 'delete'
        }),
        cardFooterText() {
          let value = this.query.items.meta;
          return "Showing "+value.from+" to "+ value.to+" of "+value.total+" entries.";
        },
        getUsersWithEntries(urlPaginate) {
          let entries = this.entries;
          let searchText = this.searchText;
          this.getIndexUsers({ urlPaginate, entries, searchText });
        },
        changeEntries(entries) {
          let url = null;
          this.entries = entries;
          let searchText = this.searchText;
          this.getIndexUsers({url, entries, searchText});
        },
        showTextStatus(status) {
          return status === 1 ? "Active" : "Inactive";
        },
        doSearch(event) {
          let url = null;
          let entries = this.entries;
          let searchText = event.target.value;
          this.getIndexUsers({url, entries, searchText});
        }
    }

};
</script>
