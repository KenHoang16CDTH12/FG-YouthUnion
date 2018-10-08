<template>
  <!-- card actions section start -->
  <section id="card-actions">
    <div class="row">
        <div class="col-lg-4">
            <button class="btn mb-1 btn-primary btn-lg btn-block">Add HĐ</button>
        </div>
        <div class="col-lg-4">
            <button class="btn mb-1 btn-danger btn-lg btn-block">Quản Lý HĐ</button>
        </div>
        <div class="col-lg-4">
            <button class="btn mb-1 btn-success btn-lg btn-block">Cấp Quyền HĐ</button>
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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="Name" name="name">
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
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="des" id="text" cols="30" rows="10" class="form-control" placeholder="Description" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments" data-original-title title></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="btn-group mt-1 mr-1 mb-1 btn-lg">
                                    <button type="button" class="btn btn-icon btn-success">
                                        <i class="la la-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success">Loại Hoạt Động</button>
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">something else</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <button type="button" class="btn btn-success mt-1 mr-1 mb-1 pr-5 pl-5  float-right">Cấp Quyền</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-warning mt-1 mr-1 mb-1 float-right">Confirm</button>
                                <button type="button" class="btn btn-warning mt-1 mr-1 mb-1 float-right">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  </section>




</template>
<script>
import { Alert } from '../../_utils';
import { resourceService } from '../../_services';

import Sortable from 'sortablejs';
import waves from '../../_directives/waves'
import CardHeader from '../../_components/card-element/Header.vue';
import CardLoading from '../../_components/card-element/Loading.vue';

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
