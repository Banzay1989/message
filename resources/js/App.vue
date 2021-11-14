<template>
    <div class="container">
        <router-view/>
    </div>
</template>

<script>
    export default {
        name: "App",
        data() {
            return {
                isLoggedIn: true,
            }
        },
        methods: {

        },
    }
</script>
