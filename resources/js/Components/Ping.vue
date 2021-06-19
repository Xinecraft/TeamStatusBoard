<template>

</template>

<script>
export default {
    name: "Ping",
    data() {
        return {
            interval: null
        }
    },

    mounted() {
        if (this.$page.props.user.is_automatic_status) {
            this.interval = setInterval(this.ping, 10_000)
        }
    },

    unmounted() {
        clearInterval(this.interval)
    },

    methods: {
        ping: function () {
            axios.post(route('status.ping'))
        }
    }
}
</script>
