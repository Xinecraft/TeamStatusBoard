<template>
    <div class="grid grid-cols-1 gap-2 m-4 md:grid-cols-2 lg:grid-cols-4">
        <div v-for="user in users" :key="user.id" class="bg-white shadow rounded p-4 flex-col flex items-center">
            <div id="statusBox" class="flex w-full justify-end">
                <div id="online" class="flex space-x-1" v-if="user.status === 'online'">
                    <span class="text-green-500 text-sm">Online</span>
                    <span class="flex relative h-3 w-3">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </span>
                </div>
                <div id="offline" class="flex space-x-1" v-if="user.status === 'offline'">
                    <span class="text-red-500 text-sm">Offline</span>
                </div>
                <div id="busy" class="flex space-x-1" v-if="user.status === 'busy'">
                    <span class="text-yellow-500 text-sm">Busy</span>
                    <span class="flex relative h-3 w-3">
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-yellow-500"></span>
                </span>
                </div>
            </div>
            <img class="rounded-full h-20 w-20" :src="user.profile_photo_url" alt="">
            <span class="font-bold text-gray-700">{{ user.name }}</span>
            <div id="workStatus">
                <p class="text-sm text-gray-600 text-center" v-if="user.work_status">
                    {{ user.work_status }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>

import {Inertia} from "@inertiajs/inertia";

export default {
    name: "UserStatusList",
    props: {
        users: Array
    },

    data() {
        return {
            interval: null
        }
    },

    mounted() {
        this.interval = setInterval(this.reloadData, 30_000)
    },

    unmounted() {
        clearInterval(this.interval)
    },

    methods: {
        reloadData: function () {
            Inertia.reload({ only: ['users'] })
        }
    }
}
</script>
