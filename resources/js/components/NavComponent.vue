<template>
  <nav>
    <ul>
        <li v-for="link, index in nav" :key="index">
            <router-link :to="link.path">{{ link.label }}</router-link>
        </li>
    </ul>
  </nav>
</template>

<script>
export default {
    name: 'NavComponent',
    props:{
        nav: Array
    }
}
</script>

<style lang="scss" scoped>
    ul{
        display: flex;
        list-style-type: none;

        li{
            margin: 5px 10px;
        }
    }
</style>
