
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
                      <form class="form" :model="object" @submit.prevent="addObject">
                        <div class="form-body">
                          <div class="row">
                              <div class="col-md-4">
                                  <fieldset
                                      class="form-group floating-label-form-group"
                                      :class="{ error: errors.first('name') }">
                                      <label for="name">Name</label>
                                      <input type="text" id="name" class="form-control p-1" placeholder="Name" name="name" v-model="object.name" v-validate="'required'">
                                      <span class="red">{{ errors.first('name') }}</span>
                                  </fieldset>
                              </div>
                              <div class="col-md-4">
                                  <fieldset
                                      class="form-group floating-label-form-group"
                                      :class="{ error: errors.first('from_date') }">
                                      <label for="">From date</label>
                                      <input type="date" id="from_date" class="form-control" name="from_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="date Opened" data-original-title title v-model="object.from_date" v-validate="'required'">
                                      <span class="red">{{ errors.first('from_date') }}</span>
                                  </fieldset>
                              </div>
                              <div class="col-md-4">
                                  <fieldset
                                      class="form-group floating-label-form-group"
                                      :class="{ error: errors.first('end_date') }">
                                      <label for="">End date</label>
                                      <input type="date" id="end_date" class="form-control" name="end_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="date Opened" data-original-title title v-model="object.end_date" v-validate="'required'">
                                      <span class="red">{{ errors.first('end_date') }}</span>
                                  </fieldset>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <fieldset
                              class="form-group floating-label-form-group"
                              :class="{ error: errors.first('hoatdongtype_id') }
                              ">
                                  <label class="typo__label">HoatDong Type</label>
                                  <multiselect v-model="object.hoatdongtypes" :options="options.hoatdongtypes" :custom-label="typeWithId" placeholder="Select one" label="type" track-by="id" name="hoatdongtype_id"  v-validate="'required'"></multiselect>
                                  <span class="red">{{ errors.first('hoatdongtype_id') }}</span>
                              </fieldset>
                            </div>
                            <div class="col-md-6">
                              <fieldset
                              class="form-group floating-label-form-group"
                              :class="{ error: errors.first('lcdoans') }
                              ">
                                <label class="typo__label">Lien Chi Doan</label>
                                <multiselect v-model="object.lcdoans" tag-placeholder="Add this as new" placeholder="Search or add" label="name" track-by="id" :options="options.lcdoans" :multiple="true" :taggable="true" @tag="addTag" name="lcdoans"  v-validate="'required'"></multiselect>
                                <span class="red">{{ errors.first('lcdoans') }}</span>
                              </fieldset>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <label for="desc">Description</label>
                                <textarea name="desc" id="text" cols="30" rows="10" class="form-control" placeholder="Description" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments" data-original-title title v-model="object.desc"></textarea>
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
    <!-- Table Hoat Dong -->
    <table-hoat-dong/>
  </section>
</template>
<script>
import { Alert } from '../../_utils'
import { allService } from '../../_services'
import { resourceService } from '../../_services'
import Sortable from 'sortablejs'
import Multiselect from 'vue-multiselect'
import TableHoatDong from './TableHoatDong.vue'
import waves from '../../_directives/waves'
import CardHeader from '../../_components/card-element/Header.vue'
import CardLoading from '../../_components/card-element/Loading.vue'

export default {
    components: {
       TableHoatDong, Multiselect, CardHeader, CardLoading
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
        objName: 'hoatdongs',
        object: {},
        objectLCDHoatDong: {},
        options: {
          hoatdongtypes: [
          ],
          lcdoans: [
          ],
        }
      }
    },
    computed: {
    },
    created () {
      this.hoatdongtypes();
      this.lcdoans();
    },
    methods: {
        hoatdongtypes() {
          this.isLoading = true;
          allService.all("hoatdongtypes")
            .then(
                response => {
                    let items = response.data
                    let length = items.length;
                    let i = 0
                    for (i; i < length; i++) {
                      this.options.hoatdongtypes.push(items[i])
                    }
                },
                error => {
                   Alert.error();
                   //Handle later
                   this.errorValues = error;
                }
            );
        },
        lcdoans() {
          this.isLoading = true;
          allService.all("lcdoans")
            .then(
                response => {
                    let items = response.data
                    let length = items.length;
                    let i = 0
                    for (i; i < length; i++) {
                      this.options.lcdoans.push(items[i])
                    }
                },
                error => {
                   Alert.error();
                   //Handle later
                   this.errorValues = error;
                }
            );
        },
        addTag (newTag) {
          const tag = {
            name: newTag,
            id: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
          }
          this.options.lcdoan.push(tag)
          this.object.lcdoan.push(tag)
        },
        typeWithId ({ id, type }) {
          return `${id} — [${type}]`
        },
        addObject() {
          this.$validator.validateAll().then((result) => {
            if (result) {
              //Config object
              this.object.hoatdongtype_id = this.object.hoatdongtypes.id
              console.log(this.object);
              resourceService.store(this.objName, this.object)
                  .then(
                      response => {
                          let items = response.data
                          this.objectLCDHoatDong.hoatdong_id = items.id
                          let length = this.object.lcdoans.length
                          let i = 0
                          for (i; i < length; i++) {
                            this.objectLCDHoatDong.lcdoan_id = this.object.lcdoans[i].id;
                            resourceService.store("lcdoanhoatdongs", this.objectLCDHoatDong)
                              .then(
                                  response => {

                                  },
                                  error => {
                                    this.$message({
                                       message: error,
                                       type: 'error'
                                    })
                                  }
                              );
                          }
                          Alert.success('Create successfully!')
                          .then(() => {
                              this.object = {};
                              //this.$router.push({name: `${this.objName}.index`});
                          });
                      },
                      error => {
                        this.$message({
                           message: error,
                           type: 'error'
                        })
                      }
                  );
            } else {
              this.$message({
                 message: "Error validate.",
                 type: 'error'
              })
            }
          });
        }
    }
};
</script>
