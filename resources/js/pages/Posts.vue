<template>
    <div>
        <div v-if="loading">
            <h3>Caricamento posts</h3>
        </div>
        <div v-else-if="errorMessage.length > 0">
            <h3>{{errorMessage}}</h3>
        </div>

        <PostListComponent v-else-if="!detail" :paginatedPosts="posts" @clickedPost="showPost" @requestPage="viewPage" />

        <div v-else>
            <PostComponent :post="detail" />
            <button @click="showList">Torna indietro</button>
        </div>


    </div>
</template>

<script>
import PostComponent from './PostComponent.vue';
import PostListComponent from './PostListComponent.vue';


export default {
    name: 'Posts',
    data() {
        return {
            posts: undefined,
            detail: undefined,
            errorMessage: '',
            loading: true
        }
    },
    components:{
        PostComponent,
        PostListComponent
    },
    methods:{
        viewPage(url){
            axios.get(url)
            .then(({data})=>{
                if(data.success){
                    this.posts = data.results;
                } else {
                    this.errorMessage = data.error;
                }
                this.loading = false;
            });
        },
        showPost(id){
            this.loading = true;
            axios.get('api/posts/' + id)
            .then(response=>{
                if(response.data.status !== 200){
                    this.detail = response.data.success ? response.data.results : undefined;
                }

                this.loading = false;
            })
            .catch(e=>{
                console.log('errore: ' + e);
                this.loading = false;
            })
        },
        showList(){
            this.detail = undefined;
        }
    },
    mounted() {
        this.viewPage('/api/posts');
    }
}
</script>

<style lang="scss" scoped>

</style>
