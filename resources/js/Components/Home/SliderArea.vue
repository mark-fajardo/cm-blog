<template>
    <div class="slider-area" style="background-color: #bcbcbc">
        <div class="pogoSlider">
            <div v-for="slider in sliders" class="pogoSlider-slide" data-transition="fade" data-duration="1500" :style="'background:url(' + slider.image_url + ') no-repeat scroll 0 0 / cover;'">
                <h2 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="700">{{ slider.header }}</h2>
                <h1 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="1500" v-html="renderSpan(slider.footer)"></h1>
                <h3 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="2300"><a :href="slider.href">{{ slider.button }}</a></h3>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'SliderArea',
        data() {
            return {
                /**
                 * TODO: For the admin side, this must be required in the form.
                 * hrefs must be available and selectable.
                 */
                sliders: [
                    {
                        image_url: 'img/chef_morris/left_position_landscape.jpg',
                        header: 'Welcome!',
                        footer: 'This is **Chef Morris Danzen***',
                        button: 'See more about me',
                        href: '/about-me'
                    },
                    {
                        image_url: 'img/chef_morris/tiramisu_2_landscape.jpg',
                        header: 'Want some?',
                        footer: 'See **more*** of this here',
                        button: 'View Recipe List',
                        href: '/recipe-list'
                    },
                    {
                        image_url: 'img/chef_morris/no_flour_chocolate_cake_square.jpg',
                        header: 'Impossible?',
                        footer: 'See and learn **now***',
                        button: 'View the recipe here',
                        href: '/recipe-list'
                    },
                    {
                        image_url: 'img/chef_morris/far_with_pepper_landscape.jpg',
                        header: 'Get ready',
                        footer: 'For the **new*** Recipes',
                        button: 'Take a look in here',
                        href: '/recipe-list'
                    }
                ]
            };
        },
        methods: {
            /**
             * Render span created strings.
             * @param render
             */
            renderSpan(render) {
                render = render.replace('**', '<span>');
                return render.replace('***', '</span>');
            }
        }
    }
</script>
