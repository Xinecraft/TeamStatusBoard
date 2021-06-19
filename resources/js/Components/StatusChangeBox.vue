<template>
    <div class="flex flex-col items-center mb-3">

        <div class="flex flex-col items-center w-full">
            <div class="flex justify-between items-center w-1/4" @click="form.autoStatus = !form.autoStatus">
                <span class="mr-1">Auto Status</span>
                <div class="w-16 h-10 flex items-center bg-gray-300 rounded-full p-1 duration-300 ease-in-out"
                     :class="{ 'bg-green-400': form.autoStatus}">
                    <div class="bg-white w-8 h-8 rounded-full shadow-md transform duration-300 ease-in-out"
                         :class="{ 'translate-x-6': form.autoStatus,}"></div>
                </div>
            </div>


            <div class="mt-4 relative inline-flex" v-if="!form.autoStatus">
                <select v-model="form.status" @change="submitForm" aria-label="status"
                        class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option disabled>Choose your status...</option>
                    <option value="online">Online</option>
                    <option value="busy">Busy</option>
                    <option value="offline">Offline</option>
                </select>
            </div>

            <div class="col-span-12 mt-2 sm:col-span-4 w-1/2">
                <jet-input @change="submitForm" placeholder="What are you doing now..." id="workStatus" type="text"
                           class="mt-1 block w-full" v-model="form.workStatus"/>
                <jet-input-error :message="form.errors.workStatus" class="mt-2"/>
            </div>

        </div>


    </div>
</template>

<script>
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetLabel from '@/Jetstream/Label'

export default {
    components: {JetLabel, JetInput, JetInputError},
    name: "StatusChangeBox",
    data() {
        return {
            form: this.$inertia.form({
                autoStatus: this.$page.props.user.is_automatic_status,
                status: this.$page.props.user.status,
                workStatus: this.$page.props.user.work_status,
            })
        }
    },

    methods: {
        submitForm: function () {
            this.form.post(route('status.update'))
        }
    },

    watch: {
        'form.autoStatus': function () {
            this.submitForm()
        }
    }
}
</script>

<style scoped>

</style>
