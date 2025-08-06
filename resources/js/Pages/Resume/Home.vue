<script setup lang="ts">
import {onMounted, onUnmounted, computed, ref} from "vue";
import {usePage} from '@inertiajs/vue3'

const page = usePage()
const user = computed(() => page.props.user)

let offsetTop = 0
const isSticky = ref(false)
const stickyHeader = ref(null)
const headerSection = ref(null)

const handleScroll = () => {
    if (!stickyHeader.value) return

    offsetTop = stickyHeader.value.offsetTop
    if (isSticky.value) {
        offsetTop = headerSection.value.offsetHeight - stickyHeader.value.offsetHeight;
    }

    isSticky.value = window.scrollY >= offsetTop
}

let isBurgerActive = ref(false);
const burgerMenuButton = ref(false)

const updateBurgerMenu = () => {
    isBurgerActive.value = !isBurgerActive.value
}

const scrollToAnchor = (anchor: null|string, event: null|Event = null) => {
    if (event) {
        event.preventDefault()
    }
    const element = <HTMLElement | null>document.getElementById(anchor);

    let offsetTop = 0;
    if (anchor !== 'home') {
        offsetTop = stickyHeader.value.offsetHeight;
    }

    if (element) {
        scrollTo({
            top: element.offsetTop - offsetTop,
            behavior: 'smooth'
        });
    }
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
})
</script>

<template>
    <header id="home" class="welcome-header" ref="headerSection" style="background-image: url('./images/welcome-background-main.jpg');">
        <div class="welcome-header__container">
            <div class="welcome-header__container-title">
                <span class="welcome-header__iconWrapper">
                    <i class="pi pi-objects-column welcome-header__icon"></i>
                    <i class="pi pi-objects-column welcome-header__icon"></i>
                </span>
                <h1 class="welcome-header__title"> {{ user.name }} </h1>
                <h2 class="welcome-header__subtitle"> dupa dupa test </h2>
            </div>
        </div>


        <nav class="main-menu" ref="stickyHeader" :class="{ sticky: isSticky }" id="main-menu">
            <div class="container">
                <div class="main-menu__navbar-left">
                    <span>{{ user.name }}</span>

                    <div class="burger-menu-container">
                        <button class="burger-menu-button"
                                ref="burgerMenuButton"
                                id="burger-menu-button"
                                @click="updateBurgerMenu()"
                        >
                              <span class="open"
                                    :class="{ active: !isBurgerActive }"
                              >
                                <i class="pi pi-bars"></i>
                              </span>

                            <span class="close"
                                  :class="{ active: isBurgerActive }"
                            >
                                <i class="pi pi-times"></i>
                              </span>
                        </button>
                    </div>
                </div>


                <div class="main-menu__burger-container menu-desktop">
                    <div class="main-menu__navbar-center">
                        <ul class="main-menu__nav">
                            <li v-for="menu in page.props.general.menu">
                                <a class="link" :href="'#' + menu.section"
                                    @click="scrollToAnchor(menu.section, $event)"
                                >
                                    {{ page.props.general[menu.key] ?? menu.key }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="main-menu__navbar-right">
                        <ul class="main-menu__nav main-menu__social-icons">
                            <li v-for="social in page.props.general.user.socials">
                                <a class="link" :href="social.value">
                                    <span>
                                        <i class="pi" :class="'pi-' + social.key"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="main-menu__burger-container menu-mobile"
                 :class="{ hidden: !isBurgerActive }"
            >
                <div class="main-menu__navbar-center">
                    <ul class="main-menu__nav">
                        <li v-for="menu in page.props.general.menu">
                            <a class="link" :href="'#' + menu.section"
                               @click="scrollToAnchor(menu.section, $event)"
                            >
                                {{ page.props.general[menu.key] ?? menu.key }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="main-menu__navbar-right">
                    <ul class="main-menu__nav main-menu__social-icons">
                        <li v-for="social in page.props.general.user.socials">
                            <a class="link" :href="social.value">
                                <span>
                                    <i class="pi" :class="'pi-' + social.key"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
</template>

<style scoped>

</style>
