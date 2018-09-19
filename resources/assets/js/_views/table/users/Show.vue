<template>
  <application-layout v-if="object">
  <section id="card-actions">
    <div class="row">
      <div class="col-12">
        <div class="card box-shadow-0 border-info animated fadeIn" data-appear="appear" data-animation="fadeIn">
          <!-- ============================================ -->
          <!-- Header -->
          <!-- ============================================ -->
          <card-header :title="cardTitle + id"></card-header>
          <!-- ============================================ -->
          <!-- Content -->
          <!-- ============================================ -->
          <div class="card-content collapse show">
            <!-- ============================================ -->
            <!-- Body -->
            <!-- ============================================ -->
            <div class="card-body">
            <form class="form" @submit.prevent="updateObject">
              <div class="form-body">
                <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                <div class="row">
                  <div class="col-md-1">
                    <div class="form-group">
                      <label for="id">#</label>
                      <input type="text" id="id" class="form-control border-primary" placeholder="id" name="id" required v-model="object.id" disabled>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="username">Username: <span class="danger">*</span></label>
                        <input type="text" id="username" class="form-control border-primary" placeholder="Username" name="username" required v-model="object.username">
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="email">Email: <span class="danger">*</span></label>
                      <input type="email" id="email" class="form-control border-primary" placeholder="Email" name="email" required v-model="object.email">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="password">Password: <span class="danger">*</span></label>
                      <input type="password" id="password" class="form-control border-primary" placeholder="Password" name="password" required v-model="object.password">
                    </div>
                  </div>
                </div>
                <h4 class="form-section"><i class="la la-clipboard"></i> Requirements</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="active">Active:</label>
                      <select id="active" name="active" class="form-control border-primary" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Active" data-original-title="" title="Active" v-model="object.active">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" v-if="resourceSelect.items">
                      <label for="role">Role:</label>
                      <select id="role" name="role" class="form-control border-primary" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Role" data-original-title="" title="Role" v-model="object.role.id">
                        <option v-for="role in roles.data" :key="role.id" :value="role.id" >{{ role.type }}</option>
                      </select>
                    </div>
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
  </section>
  </application-layout>
</template>
<script>
import { Alert } from '../../../_utils';
import { mapState, mapActions } from 'vuex';
import { resourceService } from '../../../_services';
import CardHeader from '../../../_components/card-element/Header.vue';

export default {
    components: {
       CardHeader
    },
    data() {
      return {
        cardTitle: 'Update User #',
        objRoles: 'roles',
        objName: 'users',
        id: this.$route.params.id,
        object: this.$route.params.object,
      }
    },
    created () {
        let objName = this.objRoles;
        this.getSelectRoleData({ objName });
        if (!this.object) {
          this.fetchObject();
        }
    },
    computed: {
        ...mapState({
            //Role
            resourceSelect: state => state.select.all,
            roles: state => state.select.all.items,
        }),
    },
    methods: {
        ...mapActions('select', {
            getSelectRoleData: 'getRoles',
        }),
        fetchObject() {
            resourceService.show(this.objName, this.id)
              .then(
                  response => {
                    this.object = response.data;
                    console.log(this.object);
                  },
                  error => {
                    this.$router.push({name: `${this.objName}.index`});
                  }
              );
        },
        updateObject() {
            let objectUpdate = {
              id: this.object.id,
              username: this.object.username,
              email: this.object.email,
              password: this.object.password,
              active: this.object.active,
              role_id: this.object.role.id,
            };
            resourceService.update(this.objName, objectUpdate)
                .then(
                    response => {
                        Alert.success('Update successfully!')
                        .then(() => {
                            this.$router.push({name: `${this.objName}.index`});
                        });
                    },
                    error => {
                        Alert.error();
                        //Handle later
                        this.errorValues = error;
                    }
                );
        }
    }
};
</script>
