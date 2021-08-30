/**
 * Main menu lists with its name and redirect page.
 * @type {({REDIRECT: string, NAME: string}|{REDIRECT: string, NAME: string}|{REDIRECT: string, NAME: string}|{REDIRECT: string, NAME: string}|{REDIRECT: string, NAME: string})[]}
 */
export const MainMenu = Object.freeze([
    {
        NAME: 'Home',
        REDIRECT: '/'
    },
    {
        NAME: 'About Me',
        REDIRECT: '/about-me'
    },
    {
        NAME: 'Gallery',
        REDIRECT: '/gallery'
    },
    {
        NAME: 'Recipe List',
        REDIRECT: '/recipe-list'
    },
    {
        NAME: 'Timeline',
        REDIRECT: '/timeline'
    },
    {
        NAME: 'Contact',
        REDIRECT: '/contact'
    },
]);

/**
 * List of Alerts.
 * @type {Readonly<{ERROR: string, WARNING: string}>}
 */
export const Alerts = Object.freeze({
    WARNING: 'warning',
    ERROR: 'error',
    SUCCESS: 'success'
});

/**
 * Default alert messages.
 * @type {Readonly<{SUCCESS: string, ERROR: string, WARNING: string}>}
 */
export const AlertMessages = Object.freeze({
    WARNING: 'There might be a problem on accessing data.',
    ERROR: 'There is an error on accessing the data.',
    SUCCESS: 'Process successful.'
});

/**
 * Contains env variables for front.
 * @type {Readonly<{FB_PAGE_ID: number}>}
 */
export const Env_ = Object.freeze({
    FB_PAGE_ID: 1627240600869791,
    DATA_AD: {
        SQUARE_DISPLAY: {
            CLIENT: 'ca-pub-3450967195189254',
            SLOT: '9831823336'
        },
        VERTICAL_DISPLAY: {
            CLIENT: 'ca-pub-3450967195189254',
            SLOT: '1784800592'
        },
        HORIZONTAL_DISPLAY: {
            CLIENT: 'ca-pub-3450967195189254',
            SLOT: '6298760678'
        },
    }
});
