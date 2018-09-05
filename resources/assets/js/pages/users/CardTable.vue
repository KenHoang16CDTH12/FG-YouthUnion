<template>
  <!-- card actions section start -->
  <section id="card-actions">
    <div class="row">
      <div class="col-12">
        <div class="card box-shadow-0 border-info">
          <div class="card-header card-head-inverse bg-info">
            <h4 class="card-title text-white">Card Actions Example</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                      <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i> Add Contacts</button>
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
              <div class="row">
                <div class="col-md-12">
                  <fieldset class="form-group">
                    <input type="search" class="form-control" id="search" placeholder="Search ...">
                  </fieldset>
                </div>
              </div>
              <div class="row" v-if="query.items">
               <div class="col-md-12">
                 <table id="users-table" class="table table-white-space table-bordered row-grouping display icheck">
                     <thead>
                     <tr>
                         <th>#</th>
                         <th>Username</th>
                         <th>Email</th>
                         <th>Role</th>
                         <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>
                       <tr v-for="user in query.items.data" :key="user.id">
                         <td class="text-center">
                           {{ user.id }}
                         </td>
                         <td class="text-center">
                           <div class="media">
                             <div class="media-left pr-1">
                               <span class="avatar avatar-sm avatar-online rounded-circle">
                                 <img src="app-assets/images/portrait/small/avatar-s-9.png" alt="avatar"><i></i></span>
                             </div>
                             <div class="media-body media-middle">
                               <a href="#" class="media-heading">{{ user.username }}</a>
                             </div>
                           </div>
                         </td>
                         <td class="text-center">
                           <a href="mailto:email@example.com">{{ user.email }}</a>
                         </td>
                         <td class="text-center">
                         {{ user.role.type }}
                         </td>
                         <td class="text-center">
                           <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-info"><i class="la la-pencil"></i></button>
                             <span v-if="query.deleting"><em> - Deleting...</em></span>
                             <span v-else-if="user.deleteError" class="text-danger"> - ERROR: {{query.deleteError}}</span>
                              <button v-else type="button" class="btn btn-icon btn-danger"><i class="la la-remove" @click.prevent="deleteUser(user.id)"></i></button>
                              <button type="button" class="btn btn-icon btn-primary"><i class="la la-eye"></i></button>
                              <!-- la-eye-slash -->
                            </div>
                         </td>

                       </tr>
                     </tbody>
                     <tfoot>
                     <tr>
                         <th>#</th>
                         <th>Username</th>
                         <th>Email</th>
                         <th>Role</th>
                         <th>Action</th>
                     </tr>
                     </tfoot>
                 </table>
               </div>
             </div>
             <div class="row" v-if="query.items">
              <div class="col-md-12">
                <div class="text-center">
                  <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center pagination-round">
                      <template v-for="page in range(0, query.items.meta.last_page + 1)">
                        <template v-if="page === 0">
                        <li class="page-item" @click="getUsersWithEntries(query.items.links.first)">
                          <a class="page-link" aria-label="First">
                            <span aria-hidden="true">&laquo; First</span>
                            <span class="sr-only">First</span>
                          </a>
                        </li>
                        </template>
                        <template v-else-if="page === (query.items.meta.last_page + 1)">
                        <li class="page-item" @click="getUsersWithEntries(query.items.links.last)">
                          <a class="page-link" aria-label="Last">
                            <span aria-hidden="true">Last &raquo;</span>
                            <span class="sr-only">Last</span>
                          </a>
                        </li>
                        </template>
                        <template v-else>
                        <li v-bind:class="activeClassPaginate(page)" @click="getUsersWithEntries(query.items.meta.path + '?page=' + page)"><a class="page-link">{{ page }}</a></li>
                        </template>
                      </template>
                    </ul>
                  </nav>
                </div>
              </div>
             </div>
             <div class="row m-20" v-if="query.loading">
              <div class="col-md-12 text-center">
                <h3 class="text-danger">Loading...</h3>
                <div class="loader-wrapper">
                  <div class="loader-container">
                    <div class="ball-pulse-rise loader-danger">
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                    </div>
                  </div>
                </div>
              </div>
             </div>
            </div>
          </div>
          <div class="card-footer border-0 text-muted">
            <span class="danger" v-if="query.items"><i class="la la-th-large"></i>
            {{ showingFromToOf() }}</span>
            <span class="float-right primary">View More <i class="ft-arrow-right"></i></span>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { mapState, mapActions } from 'vuex'

export default {
    data() {
      return {
        entries: 10,
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
        this.getIndexUsers({ url, entries });
    },
    methods: {
        ...mapActions('users', {
            getIndexUsers: 'index',
            deleteUser: 'delete'
        }),
        range : function (start, end) {
          return Array(end - start + 1).fill().map((_, idx) => start + idx)
        },
        activeClassPaginate: function(numPage) {
          if (this.query.items.meta.current_page == numPage) {
            return 'page-item active';
          } else {
            return 'page-item';
          }
        },
        showingFromToOf() {
          let value = this.query.items.meta;
          return "Showing "+value.from+" to "+ value.to+" of "+value.total+" entries.";
        },
        getUsersWithEntries(urlPaginate) {
          let entries = this.entries;
          this.getIndexUsers({urlPaginate, entries});
        },
        changeEntries(entries) {
          let url = null;
          this.entries = entries;
          this.getIndexUsers({url, entries});
        },
    }

};
</script>
