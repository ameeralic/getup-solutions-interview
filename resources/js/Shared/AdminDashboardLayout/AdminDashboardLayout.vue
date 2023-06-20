<template>
    <Notification></Notification>
    <Navbar :siteLogo="$page.props.app_url + 'logo/blog-logo.svg'" :siteName="'LVTBlog'"
        :userAvatar="$page.props.app_url + 'logo/blog-logo.svg'" :userName="$page.props.admin.name"
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
                    name: 'Settings',
                    link: '/admin-dashboard/settings',
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
                    name: 'Posts',
                    link: '/admin-dashboard/posts',
                    method: 'get',
                    icon: DocumentTextIcon,
                    subMenu: [
                        {
                            name: 'Create',
                            link: '/admin-dashboard/posts/create',
                        },
                        {
                            name: 'All Posts',
                            link: '/admin-dashboard/posts',
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
