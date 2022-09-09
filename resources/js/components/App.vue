<template>
    <main role="main" class="container-fluid">

        <!-- Main Content -->
        <router-view></router-view>
        <!-- End Main Content -->

    </main>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
