<template lang="html">
    <div class="">
        <loader :loading="isLoadingSong"></loader>
        <songs></songs>
    </div>

</template>

<script>
import songs from '../../components/audio/songs'

export default {
    name: 'home',
    components: {
        songs
    },

    computed: {
        isLoadingSong () {
            return this.$store.state.isLoadingSong
        }
    }
}
</script>
