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
        isMute: false,
        isPlaying: false
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
        },

        SET_PLAYLIST_SONG (state, songs) {
            state.playlist.songs = songs
        },

        TOGGLE_PLAY (state) {
            state.isPlaying = !state.isPlaying
            eventBus.$emit('player.play', {})
        },

        TOGGLE_MUTE (state) {
            state.isMute = !state.isMute
        }
    }
})
