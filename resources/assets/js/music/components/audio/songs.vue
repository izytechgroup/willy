<template lang="html">
    <div class="songs">
        <div class="list">
            <song v-for="s in songs" :key="s.number" :song="s"></song>
        </div>
    </div>
</template>

<script>
import song from './song'

export default {
    name: 'songs',
    components: {
        song
    },

    computed: {
        songs () {
            return this.$store.state.songs
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
