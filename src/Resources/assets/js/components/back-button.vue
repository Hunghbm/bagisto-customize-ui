<template>
    <i @click="backLink" class="icon angle-left-icon back-link"></i>
</template>

<script>
    export default {
        props: ['baseUrl'],

        methods: {
            backLink () {
                window.location = history.length > 1 ? document.referrer : this.baseUrl;
            }
        }
    }
</script>
