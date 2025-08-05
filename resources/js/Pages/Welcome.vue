<script setup>
import {Head, Link} from '@inertiajs/vue3';
import Home from '@/Pages/Resume/Home.vue'
import Introduction from "@/Pages/Resume/Introduction.vue";
import Resume from "@/Pages/Resume/Resume.vue";
import Portfolio from "@/Pages/Resume/Portfolio.vue";

defineProps({
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    user: {
        type: Object,
        required: true
    },
});
</script>

<template>
    <Head title="Welcome"/>

    <Home />

    <Introduction />

    <Resume />

    <Portfolio />

    <footer class="footer">
        Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
    </footer>
</template>
