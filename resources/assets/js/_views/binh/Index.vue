
<template>
  <!-- card actions section start -->
  <section id="card-actions" class="basic-select2">
    <div class="row">
      <div class="col-xl-4 col-12">
        <div class="card">
          <div class="card-content">
            <div class="media align-items-stretch">
              <div class="p-2 text-center bg-info bg-darken-2 rounded-left">
                <i class="icon-social-dropbox font-large-2 text-white"></i>
              </div>
              <div class="p-2 bg-gradient-x-info text-white media-body rounded-right">
                <h5 class="text-white">ADD Hoạt Động</h5>
                <h5 class="text-white text-bold-400 mb-0">28</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-12">
        <div class="card">
          <div class="card-content">
            <div class="media align-items-stretch">
              <div class="p-2 text-center bg-danger bg-darken-2 rounded-left">
                <i class="icon-eyeglasses font-large-2 text-white"></i>
              </div>
              <div class="p-2 bg-gradient-x-danger text-white media-body rounded-right">
                <h5 class="text-white">Quản Lý Hoạt Động</h5>
                <h5 class="text-white text-bold-400 mb-0">1,22,356</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-12">
        <div class="card">
          <div class="card-content">
            <div class="media align-items-stretch">
              <div class="p-2 text-center bg-success bg-darken-2 rounded-left">
                <i class="icon-screen-tablet font-large-2 text-white"></i>
              </div>
              <div class="p-2 bg-gradient-x-success text-white media-body rounded-right">
                <h5 class="text-white">Cấp Quyền Hoạt Động</h5>
                <h5 class="text-white text-bold-400 mb-0">4,65,879</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form Add HĐ</div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                      <form class="form">
                        <div class="form-body">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">Name</label>
                                      <input type="text" id="name" class="form-control p-1" placeholder="Name" name="name">
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">From date</label>
                                      <input type="date" id="fdate" class="form-control" name="date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="date Opened" data-original-title title>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">End date</label>
                                      <input type="date" id="edate" class="form-control" name="date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="date Opened" data-original-title title>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                 <label class="typo__label">HoatDong Type</label>
                                 <multiselect v-model="value" :options="options" :custom-label="nameWithLang" placeholder="Select one" label="name" track-by="name"></multiselect>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="typo__label">Lien Chi Doan</label>
                                <multiselect v-model="value" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="code" :options="options" :multiple="true" :taggable="true" @tag="addTag"></multiselect>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="des" id="text" cols="30" rows="10" class="form-control" placeholder="Description" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments" data-original-title title></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="form-actions center">
                          <button type="button" class="btn btn-warning mr-1">
                            <i class="ft-x"></i> Cancel
                          </button>
                          <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Save
                          </button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Chose Academic</div>
                    <div class="heading-elements">
                      <ul class="list-inline mb-0">
                        <li>
                          <a data-action="close"><i class="ft-x"></i></a>
                        </li>
                      </ul>
                    </div>
                </div>
                <hr>
                <div class="card-content collapse show">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Acade Year</label>
                            <div class="form-group">
                              <select data-placeholder="Select a state..." class="select2-icons form-control" id="select2-icons">
                                <optgroup label="Services">
                                  <option value="wordpress" data-icon="wordpress" selected>---------------</option>
                                  <option value="wordpress" data-icon="wordpress">WordPress</option>
                                  <option value="codepen" data-icon="codepen">Codepen</option>
                                  <option value="drupal" data-icon="drupal">Drupal</option>
                                  <option value="pinterest" data-icon="pinterest">CSS3</option>
                                  <option value="html" data-icon="html5">HTML5</option>
                                </optgroup>
                                <optgroup label="File types">
                                  <option value="pdf" data-icon="file-pdf-o">PDF</option>
                                  <option value="word" data-icon="file-word-o">Word</option>
                                  <option value="excel" data-icon="file-excel-o">Excel</option>
                                  <option value="powerpoint" data-icon="file-powerpoint-o">PowerPoint</option>
                                </optgroup>
                                <optgroup label="Browsers">
                                  <option value="chrome" data-icon="chrome">Chrome</option>
                                  <option value="firefox" data-icon="firefox">Firefox</option>
                                  <option value="safari" data-icon="safari">Safari</option>
                                  <option value="opera" data-icon="opera">Opera</option>
                                  <option value="IE" data-icon="internet-explorer">IE</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Program</label>
                            <div class="form-group">
                              <select data-placeholder="Select a state..." class="select2-icons form-control" id="select2-icons">
                                <optgroup label="Services">
                                  <option value="wordpress" data-icon="wordpress" selected>---------------</option>
                                  <option value="wordpress" data-icon="wordpress">WordPress</option>
                                  <option value="codepen" data-icon="codepen">Codepen</option>
                                  <option value="drupal" data-icon="drupal">Drupal</option>
                                  <option value="pinterest" data-icon="pinterest">CSS3</option>
                                  <option value="html" data-icon="html5">HTML5</option>
                                </optgroup>
                                <optgroup label="File types">
                                  <option value="pdf" data-icon="file-pdf-o">PDF</option>
                                  <option value="word" data-icon="file-word-o">Word</option>
                                  <option value="excel" data-icon="file-excel-o">Excel</option>
                                  <option value="powerpoint" data-icon="file-powerpoint-o">PowerPoint</option>
                                </optgroup>
                                <optgroup label="Browsers">
                                  <option value="chrome" data-icon="chrome">Chrome</option>
                                  <option value="firefox" data-icon="firefox">Firefox</option>
                                  <option value="safari" data-icon="safari">Safari</option>
                                  <option value="opera" data-icon="opera">Opera</option>
                                  <option value="IE" data-icon="internet-explorer">IE</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <label for=""><i class="ft-clipboard"></i> Class Information</label>
                          <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Program</th>
                                  <th>Academic</th>
                                  <th>Class Detail</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Laravel</td>
                                  <td>2018-20919</td>
                                  <td><a href="">mother of</a></td>
                                </tr>
                                <tr>
                                  <td>Laravel</td>
                                  <td>2018-20919</td>
                                  <td><a href="">mother of</a></td>
                                </tr>
                                <tr>
                                  <td>Laravel</td>
                                  <td>2018-20919</td>
                                  <td><a href="">mother of</a></td>
                                </tr>
                                <tr>
                                  <td>Laravel</td>
                                  <td>2018-20919</td>
                                  <td><a href="">mother of</a></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
import { Alert } from '../../_utils'
import { resourceService } from '../../_services'
import Sortable from 'sortablejs'
import Multiselect from 'vue-multiselect'
import waves from '../../_directives/waves'
import CardHeader from '../../_components/card-element/Header.vue'
import CardLoading from '../../_components/card-element/Loading.vue'

export default {
    components: {
       Multiselect, CardHeader, CardLoading
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
        cardTitle: 'Hoạt Động',
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
        value: [
          { name: 'Javascript', code: 'js' }
        ],
        options: [
          { name: 'Vue.js', code: 'vu' },
          { name: 'Javascript', code: 'js' },
          { name: 'Open Source', code: 'os' }
        ]
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
          import('../../_vendors/Export2Excel').then(excel => {
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
        addTag (newTag) {
          const tag = {
            name: newTag,
            code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
          }
          this.options.push(tag)
          this.value.push(tag)
        }
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
