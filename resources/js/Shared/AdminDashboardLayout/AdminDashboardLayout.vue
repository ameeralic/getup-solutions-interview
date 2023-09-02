<template>
    <Notification></Notification>
    <Navbar  :siteName="'Getup Solutions'"
         :userName="$page.props.admin.name"
        :userEmail="$page.props.admin.email" :navMenu="navMenu"></Navbar>
    <Sidebar :sidebarMenu="sidebarMenu"></Sidebar>
    <div class="md:px-4 py-4 sm:ml-64">
        <div class="md:px-4 py-4 mt-14 min-h-screen">
            <slot></slot>
        </div>
    </div>
</template>
<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import Navbar from "./Components/Navbar.vue";
import Sidebar from "./Components/Sidebar.vue";
import Notification from "./Components/Notification.vue";
import { ChartPieIcon, CogIcon, ArrowRightOnRectangleIcon, DocumentTextIcon } from "@heroicons/vue/24/solid"
// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});
</script>
<script>
export default {
    data() {
        return {
            navMenu: [
                {
                    name: 'Dashboard',
                    link: '/admin-dashboard',
                    method: 'get',
                },
                {
                    name: 'Sign out',
                    link: '/logout',
                    method: 'post',
                }
            ],
            sidebarMenu: [
                {
                    name: 'Dashboard',
                    link: '/admin-dashboard',
                    method: 'get',
                    icon: ChartPieIcon,
                },
                {
                    name: 'Articles',
                    link: '/admin-dashboard/articles',
                    method: 'get',
                    icon: DocumentTextIcon,
                    subMenu: [
                        {
                            name: 'Create',
                            link: '/admin-dashboard/articles/create',
                        },
                        {
                            name: 'All Articles',
                            link: '/admin-dashboard/articles',
                        }
                    ]
                },
                {
                    name: 'Sign out',
                    link: '/logout',
                    method: 'post',
                    icon: ArrowRightOnRectangleIcon

                }
            ]
        }
    },
}
</script>
