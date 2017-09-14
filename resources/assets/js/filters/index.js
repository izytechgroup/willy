
Vue.filter('currency', function (value) {
    if ( 'string' === typeof value ) {
        value = parseInt(value)
    }

    // value = value.toString()
    value = value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
    return '$' + value
})

Vue.filter('number', function(value) {
    value = parseInt(value)
    return value.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
})


Vue.filter('date', function(date) {
    return moment(date).format('DD/MM/YYYY')
})

Vue.filter('time', function(date) {
    return moment(date).format('DD MMM YYYY HH:mm')
})

Vue.filter('duration', function(sec) {
    var hours   = Math.floor(sec / 3600)
    var minutes = Math.floor(sec %3600 / 60)
    var seconds = Math.floor(sec % 3600 % 60)
    var duration = hours > 0 ? hours + ':' : ''
    duration += minutes > 9 ? minutes : '0' + minutes
    duration += ':' + (seconds > 9 ? seconds : '0' + seconds)
    return duration
})
