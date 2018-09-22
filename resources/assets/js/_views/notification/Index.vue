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
              <div class="filter-container float-right" v-if="notifications">
                <el-input placeholder="Search..." v-model="query.searchText" style="width: auto;" class="filter-item" @keyup.enter.native="handleSearch" v-on:input="query.searchText = $event.target.value"/>
                <el-select v-model="query.sort" style="width: 140px" class="filter-item" @change="handleSort">
                  <el-option v-for="item in sortOptions" :key="item.key" :label="item.label" :value="item.key"/>
                </el-select>
                <el-button v-waves class="filter-item" type="primary" icon="el-icon-search" @click="handleSearch">Search</el-button>
                <el-button v-waves class="filter-item" type="danger" icon="el-icon-delete" @click="clearNotification">Clear</el-button>
              </div>
              <!-- =================================== -->
              <!-- Card Loading -->
              <!-- =================================== -->
              <card-loading v-if="isLoading && !notifications"/>
              <!-- =================================== -->
              <!-- Table -->
              <!-- =================================== -->
              <el-table v-if="notifications" :data="notifications" border fit highlight-current-row style="width: 100%" row-key="id">
                  <!-- =================================== -->
                  <!-- ID -->
                  <!-- =================================== -->
                  <el-table-column align="center" label="#" width="80">
                    <template slot-scope="scope">
                      <span>{{ scope.row.id }}</span>
                    </template>
                  </el-table-column>
                  <!-- =================================== -->
                  <!-- Title -->
                  <!-- =================================== -->
                  <el-table-column align="center" label="Title" width="auto">
                    <template slot-scope="scope">
                      <span>{{ scope.row.title }}</span>
                    </template>
                  </el-table-column>
                  <!-- =================================== -->
                  <!-- Message -->
                  <!-- =================================== -->
                  <el-table-column align="center" label="Message" width="auto">
                    <template slot-scope="scope">
                      <span>{{ scope.row.message }}</span>
                    </template>
                  </el-table-column>
                  <!-- ======================================== -->
                  <!-- Type -->
                  <!-- ======================================== -->
                  <el-table-column width="auto" align="center" label="Type">
                    <template slot-scope="scope">
                      <el-tag :type="scope.row.type | typeFilter">{{ scope.row.type }}</el-tag>
                    </template>
                  </el-table-column><!-- ======================================== -->
                  <!-- Status -->
                  <!-- ======================================== -->
                  <el-table-column width="auto" align="center" label="Status">
                    <template slot-scope="scope">
                      <el-tag :type="scope.row.status | statusFilter">{{ showTextStatus(scope.row.status) }}</el-tag>
                    </template>
                  </el-table-column>
                  <!-- ======================================== -->
                  <!-- Action -->
                  <!-- ======================================== -->
                  <el-table-column width="auto" align="center" label="Action">
                    <template slot-scope="scope">
                     <div class="btn-group mx-2" role="group">
                        <el-button type="danger" size="small" icon="el-icon-circle-close" @click="deleteNotification(scope.row.id)"></el-button>
                      </div>
                    </template>
                  </el-table-column>
              </el-table>
              <div class="pagination-container" v-if="notifications">
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
import { Alert } from '../../_utils';
import { notificationService } from '../../_services';

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
      typeFilter(type) {
        const typeMap = {
          success: 'success',
          error: 'danger',
          infor: 'infor',
          warning: 'warning',
        }
        return typeMap[type]
      },
      statusFilter(status) {
        const statusMap = {
          1: 'success',
          0: 'warning'
        }
        return statusMap[status]
      }
    },
    data() {
      return {
        cardTitle: 'Notification',
        query: {
          sort: 'desc',
          entries: 10,
          searchText: '',
        },
        notifications: null,
        meta: null,
        links: null,
        isLoading: true,
        errorValues: null,
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
          notificationService.index(url, this.query)
            .then(
                response => {
                    const items = response.data;
                    this.notifications = items;
                    this.meta = response.meta;
                    this.links = response.links;
                    this.isLoading = false;
                },
                error => {
                   Alert.error();
                   //Handle later
                   this.errorValues = error;
                }
            );
        },
        deleteNotification(id) {
          notificationService.delete(id)
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
        clearNotification() {
          notificationService.clear()
              Alert.warning('Are you sure to clear all notification?')
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
        showNotification(notification) {
          //this.$router.push({ name: 'users.edit', params: { id: notification.id, notification: notification}});
        },
        showTextStatus(status) {
          return status === 1 ? "Seen" : "Not seen";
        },
        loadData() {
          this.getData(null);
        },
        loadDataPaginate(urlPaginate) {
          this.getData(urlPaginate);
        },
        handleSort() {
          this.loadData();
        },
        handleSearch() {
          this.loadData();
        },
        handleSizeChange(val) {
          this.query.entries = val;
          this.loadData();
        },
        handleCurrentChange(val) {
          this.loadDataPaginate(this.meta.path + '?page=' + val);
        }
    }
};
</script>
