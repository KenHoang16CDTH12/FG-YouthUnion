<template>
  <application-layout>
  <!-- card actions section start -->
  <section id="card-actions">
    <div class="row">
      <div class="col-12">
        <div class="card box-shadow-0 border-info animated fadeIn" data-appear="appear" data-animation="fadeIn">
          <!-- ============================================ -->
          <!-- Header -->
          <!-- ============================================ -->
          <card-header :title="cardTitle"></card-header>
          <!-- ============================================ -->
          <!-- Content -->
          <!-- ============================================ -->
          <div class="card-content collapse show">
            <!-- ============================================ -->
            <!-- Body -->
            <!-- ============================================ -->
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
                      <router-link tag="button" :to="{ name: 'users.create' }" class="btn btn-primary btn-sm buttonAnimation" data-animation="pulse"><i class="ft-plus white"></i> Add</router-link>
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
                  <fieldset class="form-group" v-if="resource.items">
                    <input type="search" class="form-control" id="search" placeholder="Search ..." v-model="searchText" @keyup.enter="doSearch($event)" v-on:input="searchText = $event.target.value">
                  </fieldset>
                </div>
              </div>
              <div class="table-responsive" v-if="resource.items">
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
                   <tbody v-if="objects">
                     <tr v-for="object in objects" :key="object.id">
                       <td class="text-truncate">
                         {{ object.id }}
                       </td>
                       <td class="text-truncate">
                        <div class="media">
                          <div class="media-left pr-1">
                            <ul class="list-unstyled users-list m-0">
                                <li data-toggle="tooltip" data-popup="tooltip-custom" :data-original-title="object.username" class="avatar avatar-sm pull-up">
                                  <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-11.png" alt="Avatar">
                                </li>
                              </ul>
                            </div>
                            <div class="media-body media-middle">
                               <a href="#" class="media-heading">{{ object.username }}</a>
                            </div>
                          </div>
                       </td>
                       <td class="text-truncate">
                         <a href="mailto:email@example.com">{{ object.email }}</a>
                       </td>
                       <td class="text-truncate">
                        {{ object.role.type }}
                       </td>
                       <td class="text-truncate">
                        <div class="badge badge-glow badge-pill " :class="{'badge-success': object.active , 'badge-danger': !object.active}">{{ showTextStatus(object.active) }}</div>
                       </td>
                       <td class="text-truncate">
                         <div class="btn-group mx-2" role="group">
                            <button @click="showObject(object)" type="button" class="btn btn-sm btn-icon btn-info"><i class="la la-pencil"></i></button>
                            <button type="button" class="btn btn-sm btn-icon btn-danger"><i class="la la-remove" @click.prevent="deleteObject(object.id)"></i></button>
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
              <paginator v-if="resource.items"
                :current_page="meta.current_page"
                :last_page="meta.last_page"
                :first_link="links.first"
                :last_link="links.last"
                :path="meta.path"
                :getDataWithEntries="getDataWithEntries"
              ></paginator>
              <!-- ============================================ -->
              <!-- Loading -->
              <!-- ============================================ -->
              <card-loading v-if="resource.loading"></card-loading>
            </div>
          </div>
          <card-footer v-if="resource.items" :cardFooterText="cardFooterText"></card-footer>
        </div>
      </div>
    </div>
  </section>
  </application-layout>
</template>
<script>
import { Alert } from '../../../_utils';
import { mapState, mapActions } from 'vuex';
import { resourceService } from '../../../_services';
import CardFooter from '../../../_components/card-element/Footer.vue';
import CardHeader from '../../../_components/card-element/Header.vue';
import CardLoading from '../../../_components/card-element/Loading.vue';
import Paginator from '../../../_components/card-element/Paginator.vue';

export default {
    components: {
       CardHeader,
       CardLoading,
       Paginator,
       CardFooter
    },
    data() {
      return {
        cardTitle: 'Users',
        objName: 'users',
        entries: 10,
        searchText: '',
      }
    },
    computed: {
        ...mapState({
            resource: state => state.resource.all,
            objects: state => state.resource.all.items.data,
            meta: state => state.resource.all.items.meta,
            links: state => state.resource.all.items.links,
        }),
    },
    created () {
        this.loadData();
    },
    methods: {
        ...mapActions('resource', {
            getIndexData: 'index',
        }),
        loadData() {
          let url = null;
          let objName = this.objName;
          let entries = this.entries;
          let searchText = this.searchText;
          this.getIndexData({ objName, url, entries, searchText });
        },
        cardFooterText() {
          let meta = this.meta;
          return "Showing " + meta.from + " to " + meta.to + " of " + meta.total + " entries.";
        },
        getDataWithEntries(urlPaginate) {
          let objName = this.objName;
          let entries = this.entries;
          let searchText = this.searchText;
          this.getIndexData({objName, urlPaginate, entries, searchText });
        },
        changeEntries(entries) {
          this.entries = entries;
          this.loadData();
        },
        showTextStatus(status) {
          return status === 1 ? "Active" : "Inactive";
        },
        doSearch(event) {
          this.searchText = event.target.value;
          this.loadData();
        },
        deleteObject(id) {
          resourceService.delete(this.objName, id)
              Alert.warning('Are you sure to remove?')
              .then(
                  id => {
                    this.loadData();
                    Alert.success('Successfully!');
                  },
                  error => {
                    console.log(error);
                  }
              );
        },
        showObject(object) {
          this.$router.push({ name: 'users.show', params: { id: object.id, object: object}});
        },
    }

};
</script>
