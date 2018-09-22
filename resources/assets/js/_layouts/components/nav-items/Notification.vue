<template>
    <li class="dropdown dropdown-notification nav-item">
        <a class="nav-link nav-link-label" @click="clickNotification()" data-toggle="dropdown"><i class="ficon ft-bell"></i>
            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow" v-if="meta && meta.total != 0" id="num_notification">{{ meta.total }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
            <li class="dropdown-menu-header">
            <h6 class="dropdown-header m-0">
                <span class="grey darken-2">Notifications</span>
            </h6>
            <span class="notification-tag badge badge-default badge-danger float-right m-0" v-if="meta && meta.total != 0">{{ meta.total }} New</span>
            </li>
            <li @scroll="handleScroll($event)" id="scrollViewNotification" class="scrollable-container media-list w-100">
                <a href="javascript:void(0)" v-for="notification in notifications">
                    <div class="media">
                        <div class="media-left align-self-center"><i :class="typeNotification(notification.type)"></i></div>
                        <div class="media-body">
                            <h6 class="media-heading">{{ notification.title }}</h6>
                            <p class="notification-text font-small-3 text-muted">{{ notification.message }}</p>
                            <small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">{{
                             convertTime(notification.created_at.date) }}</time>
                            </small>
                        </div>
                    </div>
                </a>
                <div class="loader-wrapper" v-if="isLoading">
                  <div class="loader-container">
                    <div class="ball-clip-rotate-multiple loader-success">
                      <div></div>
                      <div></div>
                    </div>
                  </div>
                </div>
            </li>
            <li class="dropdown-menu-footer">
                <router-link tag="a" :to="{ name: 'notification.index' }" class="dropdown-item text-muted text-center" href="javascript:void(0)">
                    Read all notifications
                </router-link>
            </li>
        </ul>
    </li>
</template>
<script>

import { Alert } from '../../../_utils';
import { convertTimeToView } from '../../../_utils';
import { notificationService } from '../../../_services';

export default {
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
        notifications: [],
        query: {
          sort: 'desc',
          entries: 25,
          searchText: '',
        },
        meta: null,
        links: null,
        isLoading: true,
        bottom: false
      }
    },
    created () {
        this.loadNotifications();
    },
    methods: {
        getNotifications(urlPaginate) {
          this.isLoading = true;
          notificationService.index(urlPaginate, this.query)
            .then(
                response => {
                    const items = response.data;
                    if (urlPaginate === null) {
                        this.notifications = items;
                        document.getElementById('scrollViewNotification').scrollTop = 0;
                        console.log(this.notifications);
                    } else {
                        let i = 0;
                        let length = items.length;
                        for (i; i < length; i++) {
                            this.notifications.push(items[i]);
                        }
                    }
                    this.meta = response.meta;
                    this.links = response.links;
                    this.isLoading = false;

                },
                error => {
                    console.log(error);
                }
            );
        },
        delete(id) {
          notificationService.delete(id)
              .then(
                  id => {
                    this.loadNotifications();
                  },
                  error => {
                    console.log(error);
                  }
              );
        },
        show(id) {
          //this.$router.push({ name: 'users.edit', params: { id: object.id, object: object}});
        },
        clear() {

        },
        loadNotifications() {
            this.getNotifications(null);
        },
        clickNotification() {
            this.loadNotifications();
        },
        typeNotification(type) {
            if (type === "success") {
                return "ft-check-circle icon-bg-circle bg-success";
            }
            else if (type === "error") {
                return "ft-alert-octagon icon-bg-circle bg-red";
            }
            else if (type === "warning") {
                return "ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3";
            }
            else if (type === "infor") {
                return "ft-alert-circle icon-bg-circle bg-cyan";
            }
            else {
                return "";
            }

        },
        convertTime(date) {
            return convertTimeToView(date);
        },
        handleScroll(event) {
            if (this.bottomVisible() && this.links.next) {
                    console.log("Working");
                    this.getNotifications(this.links.next)
            }
        },
        bottomVisible() {
            const myElement = document.getElementById('scrollViewNotification');
            const scrollY = myElement.scrollTop
            const visible = myElement.clientHeight
            const pageHeight = myElement.scrollHeight
            const bottomOfPage = visible + scrollY >= pageHeight
            return bottomOfPage || pageHeight < visible
        },
    }
};
</script>
