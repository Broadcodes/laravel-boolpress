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
            <!-- <router-link :to="{name: 'posts-index'}">Torna indietro</router-link> -->
            <button @click="back">Torna indietro</button>
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
            backUrl: ''
        }
    },
    mounted() {
        const slug = this.$route.params.slug;
        this.viewPage('/api/posts/' + slug);
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
        back() {
            this.$router.push(this.backUrl);
        }
    },
    beforeRouteEnter(to, from, next) {

        next(vueComponent => {
            vueComponent.backUrl = from;
        })
    }
}
</script>

<style lang="scss" scoped>

</style>
