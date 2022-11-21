<template>
  <div>
    <div v-if="posts.length > 0">
            <div v-for="post in posts" :key="post.id">
                <span @click="showPost(post.id)">{{post.title}}</span>
            </div>

            <div class="m-2">
                <button :class="{ disable: currentPage === 1 }" @click="page(paginatedPosts.first_page_url)">Prima Pagina</button>
                <button :class="{ disable: !paginatedPosts.prev_page_url }" @click="page(paginatedPosts.prev_page_url)">Indietro</button>
                    {{currentPage}}/{{totalPages}}
                <button :class="{ disable: !paginatedPosts.next_page_url }" @click="page(paginatedPosts.next_page_url)">Avanti</button>
                <button :class="{ disable: currentPage === totalPages }" @click="page(paginatedPosts.last_page_url)">Ultima Pagina</button>
            </div>

        </div>
        <div v-else>
            <h3>Nessun posts presente</h3>
        </div>
  </div>
</template>

<script>
export default {
    name: 'PostListComponent',
    computed: {
        posts(){
            return this.paginatedPosts.data;
        },
        currentPage(){
            return this.paginatedPosts.current_page;
        },
        totalPages(){
            return this.paginatedPosts.last_page;
        }
    },
    props: {
        paginatedPosts: Object
    },
    methods:{
        showPost(id){
            this.$emit('clickedPost', id)
        },
        page(url){
            this.$emit('requestPage', url);
        }
    }
}
</script>

<style lang="scss" scoped>
    button.disable{
        opacity: .5;
        pointer-events: none;
    }
</style>
