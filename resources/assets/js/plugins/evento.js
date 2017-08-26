var Evento = {}
Evento.install = function (Vue, options) {
    Vue.prototype.$evento = {
        emit(eventName, eventData = {}) {
            var e = new CustomEvent(eventName, eventData)
            document.dispatchEvent(e)
        }
    }
}
export default Evento
