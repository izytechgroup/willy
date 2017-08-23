import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    strict: true,

    state: {
        song: {},
        playlists: [],
        playlist: {
            songs: []
        },
    },

    mutations: {
        ADD_TO_PLAYLIST (state, song) {
            state.playlist.songs.push(song)
        },

        SET_SONG (state, song) {
            state.song = {}
            Object.assign(state.song, song)
        },

        SET_PLAYLIST (state, playlist) {
            state.playlist = playlist
        }
    }
})
