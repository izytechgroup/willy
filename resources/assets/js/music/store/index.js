import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    strict: true,

    state: {
        song: {},
        songs: [],
        playlists: [],
        playlist: {
            songs: []
        },
        elapsed: 0,
        duration: 0,
        isMute: false,
        isPlaying: false,
        isLoadingSong: false,
        isLoadingPlaylist: false
    },

    mutations: {
        SET_INITIAL_SONG (state, song) {
            state.song = song
            eventBus.$emit('player.set', {})
            eventBus.$emit('player.increment')
        },

        SET_SONGS (state, songs) {
            state.songs = songs
        },

        ADD_SONGS (state, songs) {
            songs.forEach(elem => {
                let exists = window._.find(state.songs, elem)
                if (!exists) {
                    state.songs.push(elem)
                }
            })
        },

        ADD_PLAYLISTS (state, playlists) {
            playlists.forEach(elem => {
                let exists = window._.find(state.playlists, elem)
                if (!exists) {
                    state.playlists.push(elem)
                }
            })
        },

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

        SET_PLAYLIST_SONGS (state, songs) {
            state.playlist.songs = songs
        },

        TOGGLE_PLAY (state) {
            if (state.song) {
                state.isPlaying = !state.isPlaying
                eventBus.$emit('player.play', {})
            }
        },

        PLAY_SONG (state, song) {
            if (state.song.number !== song.number) {
                state.song = song
                eventBus.$emit('player.change', {})
                eventBus.$emit('player.increment')
                state.isPlaying = true
            } else {
                state.isPlaying = !state.isPlaying
                eventBus.$emit('player.play', {})
            }
        },

        STOP_PLAYING (state) {
            state.isPlaying = false
        },

        STOP_SONG (state) {
            state.isPlaying = false
            eventBus.$emit('player.stop', {})
        },

        TOGGLE_MUTE (state) {
            state.isMute = !state.isMute
            eventBus.$emit('player.mute', {})
        },

        UPDATE_ELAPSED (state, position) {
            state.elapsed = position
        },

        TRACK_DURATION (state, duration) {
            state.duration = duration
        },

        LOADING_SONG (state) {
            state.isLoadingSong != state.isLoadingSong
        },

        LOADING_PLAYLISTS (state) {
            state.isLoadingPlaylist != state.isLoadingPlaylist
        },
    },

    actions: {
        audioEnded ({ dispatch, commit, state }) {
            dispatch('incrementPlays')
            if (state.playlist.songs.length > 0) {
                let found = false
                const size = state.playlist.songs.length
                for (var i = 0; i < size; i++) {
                    if (state.playlist.songs[i].number === state.song.number) {
                        // playing a song from the playlist. Play next song if exists
                        found = true
                        if (i < size - 1) {
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
        },

        playNext ({ commit, state }) {
            if (state.playlist.songs.length > 1) {
                // find current song in the playlist
                const size = state.playlist.songs.length
                let found = false
                for (let i = 0; i < size; i++) {
                    if (state.playlist.songs[i].number === state.song.number) {
                        // play next song if exists
                        if (i < (size - 1)) {
                            const next = i + 1
                            commit('PLAY_SONG', state.playlist.songs[next])
                            found = true
                        }
                        break;
                    }
                }

                if (!found) {
                    commit('STOP_SONG')
                }
            } else {
                commit('STOP_SONG')
            }
        },

        playPrevious ({ commit, state }) {
            if (state.playlist.songs.length > 1) {
                // find current song in the playlist
                const size = state.playlist.songs.length
                let found = false
                for (let i = 0; i < size; i++) {
                    if (state.playlist.songs[i].number === state.song.number) {
                        // play previous song if exists
                        if (i > 0) {
                            const previous = i - 1
                            commit('PLAY_SONG', state.playlist.songs[previous])
                            found = true
                        }
                        break;
                    }
                }

                if (!found) {
                    commit('STOP_SONG')
                }
            } else {
                commit('STOP_SONG')
            }
        }
    }
})
