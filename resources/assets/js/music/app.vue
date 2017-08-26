<template>
    <div>
        <transition
            :duration="100"
            name="custom-classes-transition"
            enter-active-class="animated fadeIn">
            <router-view></router-view>
        </transition>
        
        <equalizer></equalizer>
        <willy-mix-player></willy-mix-player>
    </div>
</template>

<script>
export default {
    name: 'app'
}
</script>
