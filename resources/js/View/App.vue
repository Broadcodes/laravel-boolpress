<template>
    <div>
        <NavComponent :nav="nav" />
        <router-view></router-view>
    </div>
</template>

<script>
import NavComponent from '../components/NavComponent.vue'

export default {
    name: 'App',
    components: {
        NavComponent
    },
    data() {
        return {
            nav: [
                {
                    path: '/',
                    label: 'Home'
                },
                {
                    path: '/posts',
                    label: 'Blog'
                },
                {
                    path: '/chi-siamo',
                    label: 'Chi siamo'
                },
                {
                    path: '/contatti',
                    label: 'Contatti'
                }
            ]
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
