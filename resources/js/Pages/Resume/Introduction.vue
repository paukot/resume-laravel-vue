<script setup lang="ts">
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage()
const user = computed(() => page.props.user)
</script>

<template>
    <section class="introduction" id="about">
        <div class="container introduction__container">
            <div class="introduction__avatar">
                <img class="avatar" :src="user.profile_photo_url" :alt="user.name">
            </div>


            <div class="introduction__intro">
                <div class="introduction__intro-main">
                    <h2 class="header -right">{{ page.props.general.about }}</h2>
                    <h3 class="title">{{ page.props.resume.introduction.title }}</h3>
                    <p class="description">
                        {{ page.props.resume.introduction.description }}
                    </p>
                </div>

                <div class="introduction__intro-contact">
                    <ul class="contact-list">
                        <li class="contact-item"
                            v-for="detail in page.props.resume.introduction.details"
                        >
                            <span class="title">{{ detail.title }}</span>
                            <span class="subtitle">: {{ detail.value }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="introduction-skills">
        <div class="container introduction-skills__container">
            <ul class="introduction-skills__items">
                <li class="introduction-skills__item"
                    v-for="skill in page.props.resume.introduction.skills"
                >
                    <span class="icon" v-html="skill.icon">

                    </span>
                    <span class="title">
                        {{ skill.title }}
                    </span>
                </li>
            </ul>
        </div>
    </div>
</template>

<style scoped>

</style>
