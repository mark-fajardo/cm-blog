<template>
    <section class="error-text-area section-padding">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="error-text text-center">
                        <div class="error-main-hidding">
                            <h2>Oops!</h2>
                            <h5>Page cannot be found! We'll have it figured out in no time. Meanwhile, search and check out other recipes:</h5>
                        </div>
                        <div class="single-sidebar-widget">
                            <form action="/recipes?#search-results-area">
                                <input type="search" name="search" id="search" placeholder="Search..." v-model="search_keyword" autocomplete="off">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <p>Please try your search again or go to</p>
                        <p><a :href="main_menu[0].REDIRECT">Homepage</a> or <a :href="main_menu[5].REDIRECT">Contact</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { MainMenu } from '../../constants';

    export default {
        name: 'Content',
        data() {
            return {
                search_keyword: '',
                main_menu: MainMenu
            };
        }
    }
</script>
