<script setup lang="ts">
import {onMounted, onUnmounted, ref} from "vue";
import {usePage} from "@inertiajs/vue3";

const page = usePage()

const resumeSection = ref(null)
const experienceSection = ref(null)
const educationSection = ref(null)
const skillsSection = ref(null)
const experienceOffsetTop = ref(0);

const educationOffsetTop = ref(0);
const skillsOffsetTop = ref(0);
const currentSection = ref(null);

const updateResumeMenu = () => {
    if (
        !experienceSection.value
        || !educationSection.value
        || !skillsSection.value
    ) {
        return;
    }

    let offsetTop = resumeSection.value.offsetTop;
    experienceOffsetTop.value = offsetTop + experienceSection.value.offsetHeight
    educationOffsetTop.value = experienceOffsetTop.value + educationSection.value.offsetHeight
    skillsOffsetTop.value = educationOffsetTop.value + skillsSection.value.offsetHeight

    if (window.scrollY < experienceOffsetTop.value) {
        currentSection.value = 'experience';
    } else if (
        window.scrollY < educationOffsetTop.value
    ) {
        currentSection.value = 'education';
    } else {
        currentSection.value = 'skills';
    }
}

onMounted(() => {
    window.addEventListener('scroll', updateResumeMenu)
});

onUnmounted(() => {
    window.addEventListener('scroll', updateResumeMenu)
});

</script>

<template>
    <section class="resume" ref="resumeSection" id="resume">
        <div class="container">
            <h2 class="header -left">{{ page.props.general.resume }}</h2>
            <div class="side-menu-scroll">
                <ul class="side-menu-scroll__list">
                    <li class="side-menu-scroll__item"
                        :class="{ active: currentSection === 'experience' }"
                    >
                        <a href="#experience">
                            {{ page.props.general.experience ?? 'experience' }}
                        </a>
                    </li>
                    <li class="side-menu-scroll__item"
                        :class="{ active: currentSection === 'education' }"
                    >
                        <a href="#education">
                            {{ page.props.general.education ?? 'education' }}
                        </a>
                    </li>
                    <li class="side-menu-scroll__item"
                        :class="{ active: currentSection === 'skills' }"
                    >
                        <a href="#skills">
                            {{ page.props.general.skills ?? 'skills' }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="resume__content">
                <div class="resume__experience" id="experience" ref="experienceSection">
                    <span class="resume__item-title">
                        {{ page.props.general.experience ?? 'experience' }}
                    </span>
                    <div class="resume-item" v-for="experience in page.props.resume.resume.experience">
                        <div class="resume-item__years">
                            <span class="icon-calendar">
                                <i class="pi pi-calendar"></i>
                            </span>
                            {{ experience.years }}
                        </div>
                        <div class="resume-item__title">
                            {{ experience.title }}
                        </div>
                        <div class="resume-item__subtitle">
                            {{ experience.subtitle }}
                        </div>
                        <div class="resume-item__description">
                            {{ experience.description }}
                        </div>
                    </div>
                </div>
                <div class="resume__education" id="education" ref="educationSection">
                    <span class="resume__item-title">
                        {{ page.props.general.education ?? 'education' }}

                    </span>
                    <div class="resume-item" v-for="education in page.props.resume.resume.education">
                        <p class="resume-item__years">
                            <span class="icon-calendar">
                                <i class="pi pi-calendar"></i>
                            </span>
                            {{ education.years }}
                        </p>
                        <p class="resume-item__title">
                            {{ education.title }}
                        </p>
                        <p class="resume-item__subtitle">
                            {{ education.subtitle }}
                        </p>
                        <p class="resume-item__description">
                            {{ education.description }}
                        </p>
                    </div>
                </div>
                <div class="resume__skills" id="skills" ref="skillsSection">
                    <span class="resume__item-title">
                        {{ page.props.general.skills ?? 'skills' }}
                    </span>

                    <div class="skills-list">
                        <div class="skills-list__item"
                             v-for="(details, skill) in page.props.resume.resume.skills"
                        >
                            <h3 class="skills-list__item-title">
                                {{ page.props.general[skill] ?? skill }}
                            </h3>
                            <div v-for="(detail, key) in details" class="skills-list__item-detail">
                                <template v-if="typeof key === 'string'">
                                    <h4 class="skills-list__item-detail-title">{{ page.props.general[key] ?? key }}</h4>
                                    <span class="skills-list__item-detail-description">{{ detail }}</span>
                                </template>
                                <template v-else>
                                    <h4 class="skills-list__item-detail-title">{{ detail }}</h4>
                                </template>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>

<style scoped>

</style>
