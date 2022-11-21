<template>
    <div>
        <div v-if="loading">
            <h3>Caricamento posts</h3>
        </div>
        <div v-else-if="errorMessage.length > 0">
            <h3>{{errorMessage}}</h3>
        </div>
        <div v-else-if="posts.length > 0">
            <div v-for="post in posts" :key="post.id">
                {{post.title}}
            </div>
        </div>
        <div v-else>
            <h3>Nessun posts presente</h3>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostsComponent',
    data() {
        return {
            posts: [],
            errorMessage: '',
            loading: true
        }
    },
    mounted() {
        axios.get('/api/posts')
        .then(({data})=>{
            if(data.success){
                this.posts = data.results;
            } else {
                this.errorMessage = data.error;
            }
            this.loading = false;
        });
    }
}
</script>

<style lang="scss" scoped>

</style>
