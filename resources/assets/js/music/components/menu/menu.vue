<template lang="html">
    <div class="menu">
        <ul class="list-inline">
             <li>
                 <a href="/aide" target="_blank">
                     Aide
                 </a>
             </li>

             <li>
                <a href="/biomedical" target="_blank">
                     Biomédical
                 </a>
             </li>

             <li>
                <a href="/contact" target="_blank">
                     Contact
                 </a>
             </li>

             <!-- <li>
                 <a href="/aide" target="_blank">
                     Conditions
                 </a>
             </li> -->
        </ul>
    </div>
</template>

<script>
export default {
    name: 'menu'
}
</script>

<style lang="scss" scoped>
.menu {
    border-top: 1px solid #ddd;
    margin-top:40px;
    padding-top: 10px;
    font-family: 'Open Sans', 'Source Sans Pro';
    margin-bottom: 80px;

    a {
        color: #aaa;
        font-weight: 400;
        font-size: 13px;
    }
}
</style>
