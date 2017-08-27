<template>
    <div class="text-center">
        <pulse-loader :loading="loading" :color="color"></pulse-loader>
    </div>
</template>

<script>
import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

export default {
    name: 'loader',

    components: {
        PulseLoader
    },

    props: {
        loading: {
            type: Boolean,
            default: true
        },
        color: {
            type: String,
            default: '#ff0000'
        }
    }
}
</script>
