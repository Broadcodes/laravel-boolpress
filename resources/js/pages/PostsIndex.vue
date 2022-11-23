<template>
    <div>
        <div v-if="loading">
            <h3>Caricamento posts</h3>
        </div>
        <div v-else-if="errorMessage.length > 0">
            <h3>{{ errorMessage }}</h3>
        </div>

        <PostListComponent v-else :paginatedPosts="postPageResult" @clickedPost="showPost" @requestPage="viewPage" />
    </div>
</template>

<script>
import PostListComponent from '../components/PostListComponent.vue'

export default {
    name: 'PostsIndex',
    data() {
        return {
            postPageResult: undefined,
            loading: true,
            errorMessage: '',
        }
    },
    components: {
        PostListComponent
    },
    methods: {
        viewPage(url) {
            axios.get(url)
                .then(({ data }) => {
                    if (data.success) {
                        this.postPageResult = data.results;
                    } else {
                        this.errorMessage = data.error;
                    }
                    this.loading = false;
                }).catch(e => {
                    console.log(e);
                });
        },
        showPost(slug) {
            this.$router.push('/posts/' + slug);
        }
    },
    mounted() {
        this.viewPage('/api/posts?page=' + this.$route.query.page || 1);
    }
}
</script>

<style lang="scss" scoped>

</style>
