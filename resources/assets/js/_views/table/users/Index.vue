<template>
  <!-- card actions section start -->
  <section id="card-actions">
    <div class="row">
      <div class="col-12">
        <div class="card box-shadow-0 border-info animated fadeIn" data-appear="appear" data-animation="fadeIn">
          <!-- ======================================== -->
          <!-- Header -->
          <!-- ======================================== -->
          <card-header :title="cardTitle"></card-header>
          <!-- ======================================== -->
          <!-- Content -->
          <!-- ======================================== -->
          <div class="card-content collapse show">
            <!-- ======================================== -->
            <!-- Body -->
            <!-- ======================================== -->
            <div class="card-body">
              <!-- ======================================== -->
              <!-- Search -->
              <!-- ======================================== -->
              <div class="filter-container float-right" v-if="objects">
                <el-input placeholder="Search..." v-model="query.searchText" style="width: auto;" class="filter-item" @keyup.enter.native="handleSearch" v-on:input="query.searchText = $event.target.value"/>
                <el-select v-model="query.sort" style="width: 140px" class="filter-item" @change="handleSort">
                  <el-option v-for="item in sortOptions" :key="item.key" :label="item.label" :value="item.key"/>
                </el-select>
                <el-button v-waves class="filter-item" type="primary" icon="el-icon-search" @click="handleSearch">Search</el-button>
                <el-button class="filter-item" style="margin-left: 10px;" type="primary" icon="el-icon-circle-plus" @click="handleCreate">Add</el-button>
                <el-button v-waves :loading="downloadLoading" class="filter-item" type="primary" icon="el-icon-download" @click="handleDownload">Export</el-button>
              </div>
              <!-- =================================== -->
              <!-- Card Loading -->
              <!-- =================================== -->
              <card-loading v-if="isLoading && !objects"/>
              <!-- =================================== -->
              <!-- Table -->
              <!-- =================================== -->
              <el-table v-if="objects" :data="objects" border fit highlight-current-row style="width: 100%" row-key="id">
                  <!-- =================================== -->
                  <!-- ID -->
                  <!-- =================================== -->
                  <el-table-column align="center" label="#" width="80">
                    <template slot-scope="scope">
                      <span>{{ scope.row.id }}</span>
                    </template>
                  </el-table-column>
                  <!-- ======================================== -->
                  <!-- Username -->
                  <!-- ======================================== -->
                  <el-table-column width="auto" align="center" label="Username">
                    <template slot-scope="scope">
                      <template v-if="scope.row.edit">
                        <el-input v-model="scope.row.username" class="edit-input" size="small" @keyup.enter.native="confirmEdit(scope.row)"/>
                        <el-button class="cancel-btn" size="small" icon="el-icon-refresh" type="warning" @click="cancelEdit(scope.row)">Cancel</el-button>
                      </template>
                      <template v-else>
                        <span>{{ scope.row.username }}</span>
                        <el-button size="small" icon="el-icon-edit" @click="enableEditInline(scope.row)"></el-button>
                      </template>
                    </template>
                  </el-table-column>
                  <!-- ======================================== -->
                  <!-- Email -->
                  <!-- ======================================== -->
                  <el-table-column width="auto" align="center" label="Email">
                    <template slot-scope="scope">
                      <a :href="'mailto:' + scope.row.email">{{ scope.row.email }}</a>
                    </template>
                  </el-table-column>
                  <!-- ======================================== -->
                  <!-- Role -->
                  <!-- ======================================== -->
                  <el-table-column width="auto" align="center" label="Permission">
                    <template slot-scope="scope">
                      <span>{{ scope.row.role.type }}</span>
                    </template>
                  </el-table-column>
                  <!-- ======================================== -->
                  <!-- Status -->
                  <!-- ======================================== -->
                  <el-table-column width="auto" align="center" label="Status">
                    <template slot-scope="scope">
                      <el-tag :type="scope.row.active | statusFilter">{{ showTextStatus(scope.row.active) }}</el-tag>
                    </template>
                  </el-table-column>
                  <!-- ======================================== -->
                  <!-- Action -->
                  <!-- ======================================== -->
                  <el-table-column width="auto" align="center" label="Action">
                    <template slot-scope="scope">
                     <div class="btn-group mx-2" role="group">
                        <el-button type="primary" size="small" icon="el-icon-edit" @click="showObject(scope.row)"></el-button>
                        <el-button type="danger" size="small" icon="el-icon-circle-close" @click="deleteObject(scope.row.id)"></el-button>
                       <el-button type="info" size="small" icon="el-icon-view"></el-button>
                        <!-- la-eye-slash -->
                      </div>
                    </template>
                  </el-table-column>
              </el-table>
              <div class="pagination-container" v-if="objects">
                <el-pagination
                  :current-page="meta.current_page"
                  :page-sizes="[10,20,30,50]"
                  :page-size="parseInt(meta.per_page)"
                  :total="meta.total"
                  background
                  layout="total, sizes, prev, pager, next, jumper"
                  @size-change="handleSizeChange"
                  @current-change="handleCurrentChange"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { Alert } from '../../../_utils';
import { resourceService } from '../../../_services';

import Sortable from 'sortablejs';
import waves from '../../../_directives/waves'
import CardHeader from '../../../_components/card-element/Header.vue';
import CardLoading from '../../../_components/card-element/Loading.vue';

export default {
    components: {
       CardHeader, CardLoading
    },
    directives: {
      waves
    },
    filters: {
      statusFilter(status) {
        const statusMap = {
          1: 'success',
          0: 'danger'
        }
        return statusMap[status]
      }
    },
    data() {
      return {
        cardTitle: 'Users',
        objName: 'users',
        query: {
          sort: 'asc',
          entries: 10,
          searchText: '',
        },
        objects: null,
        meta: null,
        links: null,
        isLoading: true,
        sortable: null,
        errorValues: null,
        downloadLoading: false,
        sortOptions: [{ label: 'ID Ascending', key: 'asc' }, { label: 'ID Descending', key: 'desc' }],
      }
    },
    computed: {
    },
    created () {
        this.loadData();
    },
    methods: {
        getData(url) {
          this.isLoading = true;
          resourceService.index(this.objName, url, this.query)
            .then(
                response => {
                    const items = response.data;
                    this.objects = items.map(v => {
                      this.$set(v, 'edit', false); // https://vuejs.org/v2/guide/reactivity.html
                      v.originalUsername = v.username; //  will be used when user click the cancel botton
                      return v;
                    });
                    this.meta = response.meta;
                    this.links = response.links;
                    this.isLoading = false;
                    this.$nextTick(() => {
                      this.setSort()
                    });
                },
                error => {
                   Alert.error();
                   //Handle later
                   this.errorValues = error;
                }
            );
        },
        updateObject(row) {
            //Update inline
            //Only update Username
            let objectUpdate = {
              id: row.id,
              username: row.originalUsername,
            };
            resourceService.update(this.objName, objectUpdate)
                .then(
                    response => {
                      this.$message({
                        message: 'The username has been edited',
                        type: 'success'
                      })
                    },
                    error => {
                        //Handle later
                        Alert.error();
                        //Handle later
                        this.errorValues = error;
                    }
                );
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
        setSort() {
          const el = document.querySelectorAll('.el-table__body-wrapper > table > tbody')[0]
          this.sortable = Sortable.create(el, {
            ghostClass: 'sortable-ghost', // Class name for the drop placeholder,
            setData: function(dataTransfer) {
              dataTransfer.setData('Text', '')
              // to avoid Firefox bug
              // Detail see : https://github.com/RubaXa/Sortable/issues/1012
            },
            onEnd: evt => {
              const targetRow = this.objects.splice(evt.oldIndex, 1)[0]
              this.objects.splice(evt.newIndex, 0, targetRow)
            }
          })
        },
        showObject(object) {
          this.$router.push({ name: 'users.edit', params: { id: object.id, object: object}});
        },
        showTextStatus(status) {
          return status === 1 ? "Active" : "Inactive";
        },
        loadData() {
          this.getData(null);
        },
        loadDataPaginate(urlPaginate) {
          this.getData(urlPaginate);
        },
        handleCreate() {
          this.$router.push({ name: 'users.create' });
        },
        handleSearch() {
          this.loadData();
        },
        handleSort() {
          this.loadData();
        },
        handleSizeChange(val) {
          this.query.entries = val;
          this.loadData();
        },
        handleCurrentChange(val) {
          this.loadDataPaginate(this.meta.path + '?page=' + val);
        },
        handleDownload() {
          this.downloadLoading = true
          import('../../../_vendors/Export2Excel').then(excel => {
            const tHeader = ['id', 'username', 'email', 'role', 'active'];
            const filterVal = ['id', 'username', 'email', 'role', 'active'];
            const data = this.formatJson(filterVal, this.objects);
            excel.export_json_to_excel({
              header: tHeader,
              data,
              filename: 'users-list'
            })
            this.downloadLoading = false
          })
        },
        formatJson(filterVal, jsonData) {
          return jsonData.map(v => filterVal.map(j => {
            if (j === 'role') {
              return (v[j].type)
            }
            if (j === 'timestamp') {
              return parseTime(v[j])
            } else {
              return v[j]
            }
          }))
        },
        enableEditInline(row) {
          this.$message({
             message: 'Press Enter to submit edit!',
             type: 'infor'
          });
          return row.edit = !row.edit;
        },
        cancelEdit(row) {
            row.username = row.originalUsername;
            row.edit = false;
            this.$message({
               message: 'The username has been restored to the original value',
               type: 'warning'
            });
        },
        confirmEdit(row) {
            row.edit = false;
            row.originalUsername = row.username;
            this.updateObject(row);
        },
    }
};
</script>
<style scoped>
.edit-input {
  padding-right: 100px;
}
.cancel-btn {
  position: absolute;
  right: 15px;
  top: 10px;
  vertical-align: middle;
}
</style>
