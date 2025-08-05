<script setup lang="ts">

import {usePage} from "@inertiajs/vue3";
import {onMounted, onUnmounted, ref} from "vue";

const page = usePage()

const portfolioSection = ref(null)
const commercialProjectsSection = ref(null)
const myWorkSection = ref(null)

const commercialProjectsOffsetTop = ref(0);
const myWorkOffsetTop = ref(0);
const currentSection = ref(null);

const updateResumeMenu = () => {
    if (!commercialProjectsSection.value || !myWorkSection.value) {
        return;
    }

    let offsetTop = portfolioSection.value.offsetTop;
    commercialProjectsOffsetTop.value = offsetTop + commercialProjectsSection.value.offsetHeight
    myWorkOffsetTop.value = commercialProjectsOffsetTop.value + myWorkSection.value.offsetHeight

    if (window.scrollY < commercialProjectsOffsetTop.value) {
        currentSection.value = 'commercial-projects';
    }  else {
        currentSection.value = 'my-work';
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
    <section class="portfolio" ref="portfolioSection" id="portfolio">
        <div class="container">
            <h2 class="header -left">{{ page.props.general.portfolio }}</h2>
            <div class="side-menu-scroll">
                <ul class="side-menu-scroll__list">
                    <li class="side-menu-scroll__item"
                        :class="{ active: currentSection === 'commercial-projects' }"
                    >
                        <a href="#commercial-projects">
                          {{ page.props.general.commercial_projects ?? 'commercial_projects' }}
                        </a>
                    </li>
                    <li class="side-menu-scroll__item"
                        :class="{ active: currentSection === 'my-work' }"
                    >
                        <a href="#my-work">
                          {{ page.props.general.my_work ?? 'my_work' }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="portfolio__content">
                <div class="portfolio__commercial-projects portfolio__section" id="commercial-projects" ref="commercialProjectsSection">
                    <div class="portfolio__item-title-container">
                        <span class="portfolio__item-title">
                          {{ page.props.general.commercial_projects ?? 'commercial_projects' }}
                        </span>
                        <span class="portfolio__item-title-line"></span>
                    </div>
                    <div class="portfolio__item-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consequuntur dignissimos eaque facilis fugit iure libero, magnam mollitia, obcaecati officiis omnis optio quisquam reprehenderit, sequi sit sunt totam? Aliquid asperiores aspernatur exercitationem harum placeat provident quos reprehenderit similique soluta unde. Accusantium asperiores cum doloremque illo illum quibusdam vel voluptatibus. Deleniti iste iusto nemo sapiente soluta? Aliquam assumenda consectetur dolore enim exercitationem facilis fuga, incidunt magnam, molestiae nam nemo nobis odio, officiis praesentium quae quos repudiandae sapiente sint soluta voluptates! Atque blanditiis consectetur, consequuntur cumque debitis deleniti hic illo in maxime molestias nemo nobis nostrum quae reiciendis sapiente similique vel! Delectus ducimus illum incidunt, ipsam maiores optio soluta? Ab ad alias aliquid at commodi, consectetur consequuntur cupiditate debitis deserunt dolorem dolorum, ea eligendi fuga fugiat fugit harum in iure laborum laudantium nisi nobis nostrum pariatur possimus praesentium provident quasi qui quisquam quod reprehenderit rerum sequi similique sunt suscipit temporibus totam vel vero. Ad adipisci architecto, beatae dicta eveniet exercitationem iure iusto magnam nam omnis quasi reprehenderit veniam veritatis? Accusamus asperiores assumenda at, commodi culpa dolore, ducimus facere harum magnam molestiae nobis placeat quae quia quidem reiciendis, voluptate voluptates? A adipisci aliquid blanditiis cupiditate debitis deserunt dolorem, facere, provident vel, veniam vitae!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, expedita hic illum odio perferendis tempore. Accusantium aliquam amet aperiam at autem consequuntur cupiditate eligendi, ex expedita inventore laboriosam maiores natus nihil nisi optio placeat quo reiciendis saepe suscipit ut velit veritatis.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At debitis eligendi est hic obcaecati suscipit velit.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aut dolores esse eveniet fugit itaque molestiae neque nisi nulla, officia praesentium quibusdam tempora velit, veniam, voluptates! Amet aspernatur culpa dicta dignissimos esse est facilis ipsam iste, laudantium magnam neque nihil non, quia repudiandae similique vero voluptate. Ab accusantium ad animi consectetur cumque eaque earum esse, et fugit hic id iste itaque iure libero magnam minus mollitia porro praesentium provident quam qui quibusdam, quisquam ratione, reiciendis voluptates. Aliquam consectetur maxime provident repudiandae. Fugit minus porro quos? Adipisci aliquid amet aspernatur, assumenda at aut consectetur cum deleniti deserunt dolorem eaque et ex excepturi fuga impedit, incidunt, ipsa iure molestiae nisi pariatur quia quos rerum suscipit tempore vel vitae voluptatem voluptates. Aliquid animi architecto assumenda beatae debitis dicta dolor dolores ducimus eligendi illo illum labore magnam magni maxime modi mollitia necessitatibus non officiis porro quaerat, quibusdam suscipit unde. Amet architecto asperiores culpa cum, cumque eos excepturi illo illum in incidunt iusto mollitia nulla omnis possimus quisquam repellendus, veritatis voluptatem. Aliquid blanditiis dolorum enim harum impedit incidunt inventore itaque iusto maiores modi, nihil quam qui, quos rem reprehenderit tempore unde! Aut illo illum necessitatibus repellat totam? Aspernatur beatae dicta fuga labore magnam soluta unde ut? Aperiam architecto at consectetur delectus doloribus earum eius fugit illum laudantium, quam quibusdam quidem ratione reiciendis repudiandae rerum suscipit, vitae, voluptatem voluptatibus. Ab commodi cum incidunt odit officiis perferendis soluta totam, vel voluptatum. Aut deserunt dicta ex excepturi itaque minus, molestias nesciunt perspiciatis quos. Accusamus amet commodi dolorum, eaque eveniet itaque minima nam necessitatibus nulla placeat, possimus quae quaerat quos ratione ullam vel voluptas! Aliquam culpa maiores molestiae natus reprehenderit. A ad amet asperiores blanditiis consequatur cum deleniti distinctio dolor dolore doloribus, ducimus ea error est eum eveniet ex facere fuga fugiat fugit hic magnam minima necessitatibus non nostrum numquam officiis placeat possimus provident quo quos repellat sint tempora vel. Ad autem consequatur delectus deserunt ea eius explicabo, facere fuga harum labore molestiae nulla obcaecati, odit perferendis porro quia ratione similique suscipit tenetur vitae! Dignissimos earum in, magnam repellat repellendus rerum tenetur vitae. Ad dicta ex fugiat harum itaque iusto maiores molestias nesciunt nostrum optio pariatur, praesentium voluptate voluptatibus? Autem, deserunt error fuga fugit modi quas reprehenderit sit voluptatem! Alias aperiam aspernatur aut cum cumque dolor dolores eius enim est eveniet expedita id illum impedit itaque iusto labore libero minima, nam necessitatibus nihil obcaecati odio odit pariatur porro quam quidem reiciendis reprehenderit repudiandae sequi sint suscipit velit voluptatem voluptatum? Ad, alias beatae cum dolorem, earum et fugiat ipsum mollitia natus quisquam sunt unde vero voluptas! Accusantium alias facere laudantium maiores minima officia, similique sit tempora? A ad aperiam asperiores assumenda cum cumque cupiditate debitis deserunt dolore eaque esse et excepturi expedita in iusto molestiae nam neque nisi nobis nostrum nulla odio praesentium quas quo quos, saepe sint suscipit veritatis voluptas voluptate! Aliquam amet aut dicta ducimus esse facere harum iure, laboriosam, mollitia porro quaerat quam quia ratione recusandae saepe sed sint voluptatibus. Aliquid consequatur doloribus, ea ipsa maiores placeat quis quos reiciendis sed sit, sunt totam voluptate. A amet est voluptas.</p>
                    </div>
                </div>
                <div class="portfolio__commercial-projects portfolio__section" id="my-work" ref="myWorkSection">
                    <div class="portfolio__item-title-container">
                        <span class="portfolio__item-title">
                          {{ page.props.general.my_work ?? 'my_work' }}
                        </span>
                        <span class="portfolio__item-title-line"></span>
                    </div>
                    <div class="portfolio__item-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis consequuntur dignissimos eaque facilis fugit iure libero, magnam mollitia, obcaecati officiis omnis optio quisquam reprehenderit, sequi sit sunt totam? Aliquid asperiores aspernatur exercitationem harum placeat provident quos reprehenderit similique soluta unde. Accusantium asperiores cum doloremque illo illum quibusdam vel voluptatibus. Deleniti iste iusto nemo sapiente soluta? Aliquam assumenda consectetur dolore enim exercitationem facilis fuga, incidunt magnam, molestiae nam nemo nobis odio, officiis praesentium quae quos repudiandae sapiente sint soluta voluptates! Atque blanditiis consectetur, consequuntur cumque debitis deleniti hic illo in maxime molestias nemo nobis nostrum quae reiciendis sapiente similique vel! Delectus ducimus illum incidunt, ipsam maiores optio soluta? Ab ad alias aliquid at commodi, consectetur consequuntur cupiditate debitis deserunt dolorem dolorum, ea eligendi fuga fugiat fugit harum in iure laborum laudantium nisi nobis nostrum pariatur possimus praesentium provident quasi qui quisquam quod reprehenderit rerum sequi similique sunt suscipit temporibus totam vel vero. Ad adipisci architecto, beatae dicta eveniet exercitationem iure iusto magnam nam omnis quasi reprehenderit veniam veritatis? Accusamus asperiores assumenda at, commodi culpa dolore, ducimus facere harum magnam molestiae nobis placeat quae quia quidem reiciendis, voluptate voluptates? A adipisci aliquid blanditiis cupiditate debitis deserunt dolorem, facere, provident vel, veniam vitae!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti, expedita hic illum odio perferendis tempore. Accusantium aliquam amet aperiam at autem consequuntur cupiditate eligendi, ex expedita inventore laboriosam maiores natus nihil nisi optio placeat quo reiciendis saepe suscipit ut velit veritatis.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At debitis eligendi est hic obcaecati suscipit velit.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aut dolores esse eveniet fugit itaque molestiae neque nisi nulla, officia praesentium quibusdam tempora velit, veniam, voluptates! Amet aspernatur culpa dicta dignissimos esse est facilis ipsam iste, laudantium magnam neque nihil non, quia repudiandae similique vero voluptate. Ab accusantium ad animi consectetur cumque eaque earum esse, et fugit hic id iste itaque iure libero magnam minus mollitia porro praesentium provident quam qui quibusdam, quisquam ratione, reiciendis voluptates. Aliquam consectetur maxime provident repudiandae. Fugit minus porro quos? Adipisci aliquid amet aspernatur, assumenda at aut consectetur cum deleniti deserunt dolorem eaque et ex excepturi fuga impedit, incidunt, ipsa iure molestiae nisi pariatur quia quos rerum suscipit tempore vel vitae voluptatem voluptates. Aliquid animi architecto assumenda beatae debitis dicta dolor dolores ducimus eligendi illo illum labore magnam magni maxime modi mollitia necessitatibus non officiis porro quaerat, quibusdam suscipit unde. Amet architecto asperiores culpa cum, cumque eos excepturi illo illum in incidunt iusto mollitia nulla omnis possimus quisquam repellendus, veritatis voluptatem. Aliquid blanditiis dolorum enim harum impedit incidunt inventore itaque iusto maiores modi, nihil quam qui, quos rem reprehenderit tempore unde! Aut illo illum necessitatibus repellat totam? Aspernatur beatae dicta fuga labore magnam soluta unde ut? Aperiam architecto at consectetur delectus doloribus earum eius fugit illum laudantium, quam quibusdam quidem ratione reiciendis repudiandae rerum suscipit, vitae, voluptatem voluptatibus. Ab commodi cum incidunt odit officiis perferendis soluta totam, vel voluptatum. Aut deserunt dicta ex excepturi itaque minus, molestias nesciunt perspiciatis quos. Accusamus amet commodi dolorum, eaque eveniet itaque minima nam necessitatibus nulla placeat, possimus quae quaerat quos ratione ullam vel voluptas! Aliquam culpa maiores molestiae natus reprehenderit. A ad amet asperiores blanditiis consequatur cum deleniti distinctio dolor dolore doloribus, ducimus ea error est eum eveniet ex facere fuga fugiat fugit hic magnam minima necessitatibus non nostrum numquam officiis placeat possimus provident quo quos repellat sint tempora vel. Ad autem consequatur delectus deserunt ea eius explicabo, facere fuga harum labore molestiae nulla obcaecati, odit perferendis porro quia ratione similique suscipit tenetur vitae! Dignissimos earum in, magnam repellat repellendus rerum tenetur vitae. Ad dicta ex fugiat harum itaque iusto maiores molestias nesciunt nostrum optio pariatur, praesentium voluptate voluptatibus? Autem, deserunt error fuga fugit modi quas reprehenderit sit voluptatem! Alias aperiam aspernatur aut cum cumque dolor dolores eius enim est eveniet expedita id illum impedit itaque iusto labore libero minima, nam necessitatibus nihil obcaecati odio odit pariatur porro quam quidem reiciendis reprehenderit repudiandae sequi sint suscipit velit voluptatem voluptatum? Ad, alias beatae cum dolorem, earum et fugiat ipsum mollitia natus quisquam sunt unde vero voluptas! Accusantium alias facere laudantium maiores minima officia, similique sit tempora? A ad aperiam asperiores assumenda cum cumque cupiditate debitis deserunt dolore eaque esse et excepturi expedita in iusto molestiae nam neque nisi nobis nostrum nulla odio praesentium quas quo quos, saepe sint suscipit veritatis voluptas voluptate! Aliquam amet aut dicta ducimus esse facere harum iure, laboriosam, mollitia porro quaerat quam quia ratione recusandae saepe sed sint voluptatibus. Aliquid consequatur doloribus, ea ipsa maiores placeat quis quos reiciendis sed sit, sunt totam voluptate. A amet est voluptas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>
