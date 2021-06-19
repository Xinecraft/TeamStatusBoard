<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <status-change-box />
                <user-status-list :users="users"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import UserStatusList from "@/Components/UserStatusList";
import StatusChangeBox from "@/Components/StatusChangeBox";

export default {
    components: {
        StatusChangeBox,
        UserStatusList,
        AppLayout,
    },

    props: {
        users: Array
    },


}
</script>
