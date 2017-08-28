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

        PLAY_SONG (state, song) {
            if (state.song.number !== song.number) {
                state.song = song
                eventBus.$emit('player.change', {})
                state.isPlaying = true
            } else {
                state.isPlaying = !state.isPlaying
                eventBus.$emit('player.play', {})
            }
        },

        STOP_PLAYING (state) {
            state.isPlaying = false
        },

        TOGGLE_MUTE (state) {
            state.isMute = !state.isMute
        }
    },

    actions: {
        audioEnded ({ commit, state }) {
            if (state.playlist.songs.length > 0) {
                let found = false
                for (var i = 0; i < state.playlist.songs.length; i++) {
                    if (state.playlist.songs[i].number === state.song.number) {
                        // playing a song from the playlist. Play next song if exists
                        found = true
                        if (i < state.playlist.songs.length - 1) {
                            let next = i + 1
                            commit('PLAY_SONG', state.playlist.songs[next])
                        } else {
                            commit('STOP_PLAYING')
                        }
                        break
                    }
                }
                if (!found) {
                    // Playing a song not in the current playlit. Stop the player
                    commit('STOP_PLAYING')
                }
            } else {
                commit('STOP_PLAYING')
            }
        }
    }
})
