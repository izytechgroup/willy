
Vue.filter('currency', function (value) {
    if ( 'string' === typeof value ) {
        value = parseInt(value)
    }

    // value = value.toString()
    value = value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
    return '$' + value
})

Vue.filter('yentoaud', function(value, rate = 0.011934) {
    value = parseInt(value)
    return value * rate
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

Vue.filter('transmission', function(value) {
    const automatics = ['IAT', 'FAT', 'CAT', 'AT', 'FA', 'CA', 'DA', 'DAT', 'TIP']
    if ( automatics.indexOf(value) != -1 ) {
        return 'Automatic'
    }
    return 'Manual'
})





/**
 * days filter
 * @param  moment date [description]
 * @return number of days
 */
Vue.filter('days', function(date) {
    var today = moment().startOf('day')
    var start = moment(date)

    var days = start.diff(today, 'days')

    if ( 0 === days ) {
        return 'Today'
    } else if ( -1 === days) {
        return 'Yesterday'
    } else if (-1 > days) {
        return moment(date).format('DD MMMM YYYY')
    }  else if ( 1 === days ){
        return 'Tomorrow'
    } else {
        return 'In ' + days + ' days'
    }
})
