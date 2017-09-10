<template lang="html">
    <div class="">
        <loader :loading="isLoadingSong"></loader>

        <h4><i class="flaticon-minus"></i> Audio</h4>

        <div class="">
            <form class="form" >
                <div class="form-group">
                    <input type="text"
                    placeholder="Recherche artiste, titre, genre"
                    v-model="keywords"
                    class="form-control input-lg input-white">
                </div>

                <loader :loading="isSearching"></loader>
            </form>
        </div>

        <songs></songs>
    </div>

</template>

<script>
import songs from '../../components/audio/songs'
import _ from 'lodash'

export default {
    name: 'home',
    data () {
        return {
            isSearching: false,
            keywords: '',
            self: {}
        }
    },

    components: {
        songs,
    },

    watch: {
        keywords: _.debounce(function () {
            if (this.keywords.length > 1 || this.keywords.length == 0) {
                this.isSearching = true
                axios.get('/api/front/songs?keywords=' + this.keywords + '&limit=20')
                .then(response => {
                    this.isSearching = false
                    this.$store.commit('SET_SONGS', response.data)
                })
            }
        }, 500)
    },

    computed: {
        isLoadingSong () {
            return this.$store.state.isLoadingSong
        }
    },

    method: {
        getSongs () {
            this.isSearching = true
            axios.get('/api/front/songs?keywords=' + this.keywords + '&limit=20')
            .then(response => {
                this.isSearching = false
                this.$store.commit('SET_SONGS', response.data)
            })
        },

        validateBeforeSearch () {
            if (this.keywords.length > 1 || this.keywords.length == 0) {
                this.getSongs()
            }
        },

        searchSongs: _.debounce(function () {
            console.log('searching...');
            this.validateBeforeSearch()
        }, 500)
    }
}
</script>
