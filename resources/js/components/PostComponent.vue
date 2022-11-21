<template>
  <div>
    <h3>{{post.title}}</h3>
    <div>
        <p>{{post.description}}</p>
    </div>

  </div>
</template>

<script>
export default {
    name: 'PostComponent',
    props: {
        post: Object
    }
}
</script>

<style lang="scss" scoped>

</style>
