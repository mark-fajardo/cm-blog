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
 * Alerts config.
 * @type {Readonly<{SUCCESS: string, ERROR: string, WARNING: string, BUTTONS: {MESSAGE: {CANCEL: string, OK: string}}}>}
 */
export const Alerts = Object.freeze({
    WARNING: 'warning',
    ERROR: 'error',
    SUCCESS: 'success',
    BUTTONS: {
        MESSAGE: {
            OK: 'Send',
            CANCEL: 'Cancel'
        }
    }
});

/**
 * Contains the alert messages including the validations.
 * @type {Readonly<{SUCCESS: string, FAILED: {MESSAGE: string}, SUCCESSFUL: {MESSAGE: string}, VALIDATION: {SENDER_NAME: string, MESSAGE_TITLE: string, MESSAGE_REQUEST: string, SENDER_PHONE: string, SENDER_EMAIL: string}, REQUIRED: {MESSAGE_REQUEST: string, SENDER_EMAIL: string}, ERROR: string, CONFIRM: {MESSAGE: string}, WARNING: string}>}
 */
export const AlertMessages = Object.freeze({
    WARNING: 'There might be a problem on accessing data.',
    ERROR: 'There is an error on accessing the data.',
    SUCCESS: 'Process successful.',
    CONFIRM: {
        MESSAGE: 'Are you sure you want to send this message?'
    },
    SUCCESSFUL: {
        MESSAGE: 'Message successfully sent.'
    },
    FAILED: {
        MESSAGE: 'Message not sent.'
    },
    VALIDATION: {
        SENDER_NAME: 'The selected name is invalid.',
        SENDER_EMAIL: 'The selected email is invalid.',
        SENDER_PHONE: 'The selected phone number is invalid.',
        MESSAGE_TITLE: 'The message subject is invalid.',
        MESSAGE_REQUEST: 'The message request is invalid.'
    },
    REQUIRED: {
        SENDER_EMAIL: 'The email is required.',
        MESSAGE_REQUEST: 'The message request is required.',
        RECAPTCHA: 'Please verify if you are not a robot.',
    }
});

/**
 * Contains env variables for front.
 * @type {Readonly<{FB_PAGE_ID: number}>}
 */
export const Env_ = Object.freeze({
    FB_PAGE_ID: 1627240600869791,
    GOOGLE_API_KEY: 'AIzaSyBsp120VezmMn5tAXCjjJrNLEOTaABuz-k',
    GOOGLE_TAG_ID: 'G-1V86N2CL6N',
    IG_ACCESS_TOKEN: 'IGQVJYLV9HOUhxUXdiUXV1bXRVVWdJb0ZAuWXU4ek9HYnB5RG50ZADA2UTd1VjlyZAk52amE4TDJyVnRXVmZABZA2lJaGdGcHVBcGxyWFloN0o2aW9nSGZA5M0NVSlRyY3ZA2XzU5Ni1Ja3loR1dOV1NQR2ttMgZDZD',
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

/**
 * Contains google recaptcha credentials.
 * @type {Readonly<{SECRET: string, SITE_KEY: string}>}
 */
export const GoogleRecaptcha = Object.freeze({
    SITE_KEY: '6LehHFIcAAAAAKUxBM0ftsBwMhcuOv746rb1883B',
    SECRET: '6LehHFIcAAAAAA9PTfxD5RcR3liUsczXn5YU0DTF',
});
