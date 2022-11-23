<template>
    <div class="mx-5">
        <div v-if="loading">
            <h2>Caricamento dettaglio post</h2>
        </div>
        <div v-else>
            <h2>{{ post.title }}</h2>
            <p>{{ post.description }}</p>
        </div>

        <div>
            <router-link :to="{name: 'posts-index'}">Torna indietro</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostsShow',
    data() {
        return {
            loading: true,
            post: undefined,
        }
    },
    mounted() {
        const id = this.$route.params.id;
        this.viewPage('/api/posts/' + id);
    },
    methods: {
        viewPage(url) {
            axios.get(url)
                .then(({ data }) => {
                    if (data.success) {
                        this.post = data.results;
                    } else {
                        this.$router.push({ name: 'NotFound' });
                    }
                    this.loading = false;
                }).catch(e => {
                    console.log(e);
                });
        },
    }
}
</script>

<style lang="scss" scoped>

</style>
