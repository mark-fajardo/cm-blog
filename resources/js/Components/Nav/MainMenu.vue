<template>
    <div class="mainmenu-area" id="mainmenu-area">
        <div class="mainmenu-area-bg"></div>
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <button class="collapsed navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-scrollspy">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="navbar-brand"><img src="" alt="logo"></a>
                    <a href="/" class="navbar-brand white"><img src="" alt="logo"></a>
                </div>
                <div class="collapse navbar-collapse bs-example-js-navbar-scrollspy">
                    <div class="search-form-area">
                        <div class="search-form-overlay"></div>
                        <a class="search-form-trigger" href="#search-form">Search<span></span></a>
                        <div id="search-form" class="search-form">
                            <form action="/recipe-list?#search-results-area">
                                <input type="search" name="search" placeholder="Type recipes here...">
                            </form>
                        </div>
                    </div>
                    <ul id="nav" class="nav navbar-nav cl-effect-11">
                        <li :class="{ active: validateActiveMenu(menu.REDIRECT) }" v-for="menu in main_menu">
                            <a :href="menu.REDIRECT">{{ menu.NAME }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
    import { MainMenu } from '../../constants';

    export default {
        name: 'MainMenu',
        data() {
            return {
                main_menu: MainMenu,
                current_href: window.location.href
            };
        },
        methods: {
            /**
             * Validate active menu for the current page.
             * @param menu_name
             */
            validateActiveMenu(menu_name) {
                let split_href = this.current_href.split('/');
                return ('/' + split_href[split_href.length - 1] === menu_name);
            }
        }
    }
</script>
