<template>
  <section id="card-actions" v-if="object">
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
                  <div class="col-md-6">
                   <fieldset
                    class="form-group floating-label-form-group"
                    :class="{ error: errors.first('username') }
                    ">
                      <label for="username">Username: <span class="danger">*</span></label>
                      <input type="text" id="username" class="form-control" placeholder="Username" v-model="object.username" v-validate="'required'" name="username">
                      <span class="red">{{ errors.first('username') }}</span>
                    </fieldset>
                  </div>
                  <div class="col-md-6">
                    <fieldset
                    class="form-group floating-label-form-group"
                    :class="{ error: errors.first('email') }
                    ">
                      <label for="email">Email: <span class="danger">*</span></label>
                      <input type="email" id="email" class="form-control" placeholder="Email" v-model="object.email" v-validate="'required|email'" name="email">
                      <span class="red">{{ errors.first('email') }}</span>
                    </fieldset>
                  </div>
                </div>
                <h4 class="form-section"><i class="la la-clipboard"></i> Requirements</h4>
                <div class="row">
                  <div class="col-md-6">
                    <fieldset
                    class="form-group floating-label-form-group"
                    :class="{ error: errors.first('active') }
                    ">
                      <label for="active">Active:</label>
                      <select id="active" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Active" data-original-title="" title="Active" v-model="object.active" v-validate="'required'" name="active">
                        <option v-for="status in statues" :key="status.key" :value="status.key">
                          {{ status.value }}
                        </option>
                      </select>
                      <span class="red">{{ errors.first('active') }}</span>
                    </fieldset>
                  </div>
                  <div class="col-md-6">
                    <fieldset
                    class="form-group floating-label-form-group"
                    :class="{ error: errors.first('role') }">
                      <label for="role">Role:</label>
                      <select id="role" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Role" data-original-title="" title="Role" v-model="object.role_id || object.role.id" v-validate="'required'" name="role">
                        <option v-for="role in roles" :key="role.key" :value="role.key">
                          {{ role.value }}
                        </option>
                      </select>
                      <span class="red">{{ errors.first('role') }}</span>
                    </fieldset>
                  </div>
                </div>
                <h4 class="form-section"><i class="la la-life-bouy"></i> More</h4>
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" class="btn btn-purple btn-glow">Send Email Reset Password</button>
                  </div>
                </div>
              </div>
              <div class="form-actions center">
                <button type="button" class="btn btn-warning mr-1">
                  <i class="ft-x"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                  <i class="la la-check-square-o"></i> Update
                </button>
              </div>
            </form>
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
import CardHeader from '../../../_components/card-element/Header.vue';

export default {
    components: {
       CardHeader
    },
    data() {
      return {
        cardTitle: 'Update User #',
        objName: 'users',
        statues: [
          { key: 1, value: 'Active' },
          { key: 0, value: 'Inactive'}
        ],
        roles: [
          { key: 1, value: 'ADMIN' },
          { key: 2, value: 'STUDENT'},
          { key: 3, value: 'CLIENT'}
        ],
        id: this.$route.params.id,
        object: this.$route.params.object,
      }
    },
    created () {
        if (!this.object) {
          this.fetchObject();
        }
    },
    computed: {
    },
    methods: {
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

          this.$validator.validateAll().then((result) => {
            if (result) {
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
