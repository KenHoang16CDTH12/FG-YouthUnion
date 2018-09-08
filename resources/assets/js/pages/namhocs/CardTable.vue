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
                         <th class="border-top-0">Năm học</th>
                         <th class="border-top-0">Action</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr v-for="namhoc in query.items.data" :key="namhoc.id">
                       <td class="text-truncate">
                         {{ namhoc.id }}
                       </td>
                       <td class="text-truncate">
                        {{namhoc.nam_hoc}}
                       </td>
                       
                       <td class="text-truncate">
                         <div class="btn-group mx-2" role="group">
                            <button type="button" class="btn btn-sm btn-icon btn-info"><i class="la la-pencil"></i></button>
                            <span v-if="query.deleting"><em> - Deleting...</em></span>
                            <span v-else-if="namhoc.deleteError" class="text-danger"> - ERROR: {{query.deleteError}}</span>
                            <button v-else type="button" class="btn btn-sm btn-icon btn-danger"><i class="la la-remove" @click.prevent="deleteNamHoc(namhoc.id)"></i></button>
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
                :getDataWithEntries="getnamhocsWithEntries"
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
        cardTitle: 'Năm Học',
        entries: 10,
        searchText: '',
      }
    },
    computed: {
        ...mapState({
            query: state => state.namhocs.all,
        }),
    },
    created () {
        let url = null;
        let entries = 10;
        let searchText = this.searchText;
        this.getIndexNamHocs({ url, entries, searchText });
    },
    methods: {
        ...mapActions('namhocs', {
            getIndexNamHocs: 'index',
            deleteNamHoc: 'delete'
        }),
        cardFooterText() {
          let value = this.query.items.meta;
          return "Showing "+value.from+" to "+ value.to+" of "+value.total+" entries.";
        },
        getnamhocsWithEntries(urlPaginate) {
          let entries = this.entries;
          let searchText = this.searchText;
          this.getIndexNamHocs({ urlPaginate, entries, searchText });
        },
        changeEntries(entries) {
          let url = null;
          this.entries = entries;
          let searchText = this.searchText;
          this.getIndexNamHocs({url, entries, searchText});
        },
        doSearch(event) {
          let url = null;
          let entries = this.entries;
          let searchText = event.target.value;
          this.getIndexNamHocs({url, entries, searchText});
        }
    }

};
</script>
