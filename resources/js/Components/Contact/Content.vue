<template>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="contact-form">
                <form id="contact-form" @submit.prevent="validateForm()">
                    <div class="form-group" id="name-field">
                        <div class="form-input col-md-6">
                            <input type="text" v-model="sender_name" :class="'form-control ' + inputChecker($v.sender_name.minLength && $v.sender_name.maxLength)" id="form-name" name="form-name" placeholder="Your Name (Min: 2, Max 50)">
                            <small>{{ sender_name_error }}&nbsp;</small>
                        </div>
                    </div>
                    <div class="form-group" id="email-field">
                        <div class="form-input col-md-6">
                            <input v-model="sender_email" :class="'form-control ' + inputChecker($v.sender_email.email && $v.sender_email.required && $v.sender_email.minLength && $v.sender_email.maxLength)" id="form-email" name="form-email" placeholder="Your Email (Required, Min: 6, Max 50)">
                            <small>{{ sender_email_error }}&nbsp;</small>
                        </div>
                    </div>
                    <div class="form-group" id="phone-field">
                        <div class="form-input col-md-6">
                            <input type="text" v-model="sender_phone" :class="'form-control ' + inputChecker($v.sender_phone.numeric && $v.sender_phone.minLength && $v.sender_phone.maxLength)" id="form-phone" name="form-phone" placeholder="Your Phone No. (Numbers only, Min: 3, Max: 25)">
                            <small>{{ sender_phone_error }}&nbsp;</small>
                        </div>
                    </div>
                    <div class="form-group" id="subject-field">
                        <div class="form-input col-md-6">
                            <input type="text" v-model="message_title" :class="'form-control ' + inputChecker($v.message_title.minLength && $v.message_title.maxLength)" id="form-subject" name="form-subject" placeholder="Your Subject (Min: 3, Max 50)">
                            <small>{{ message_title_error }}&nbsp;</small>
                        </div>
                    </div>
                    <div class="form-group" id="message-field">
                        <div class="form-input col-md-12">
                            <textarea v-model="message_request" :class="'form-control ' + inputChecker($v.message_request.required && $v.message_request.minLength && $v.message_request.maxLength)" rows="6" id="form-message" name="form-message" placeholder="Your Message (Required, Min: 10, Max 3000)"></textarea>
                            <small>{{ message_request_error }}&nbsp;</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-input col-md-12">
                            <VueRecaptcha
                                :sitekey="oGoogleRecaptcha.SITE_KEY"
                                :load-recaptcha-script="true"
                                @verify="onVerify"
                                @error="onError"
                                @expired="onCaptchaExpired"
                                ref="recaptcha">
                            </VueRecaptcha>
                            <small>{{ recaptcha_response_error }}&nbsp;</small>
                        </div>
                    </div>
                    <div class="form-input col-md-12">
                        <button style="margin-top: 27px; margin-left: 0;">Send Message</button>
                    </div>
                    <div class="form-group">
                      <div class="form-input col-md-12">
                        <Adsense
                            :data-ad-client="ENV_.DATA_AD.HORIZONTAL_DISPLAY.CLIENT"
                            :data-ad-slot="ENV_.DATA_AD.HORIZONTAL_DISPLAY.SLOT">
                        </Adsense>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import { validationMixin } from 'vuelidate';
    import { required, minLength, maxLength, numeric, email } from 'vuelidate/lib/validators';
    import { AlertMessages, Alerts, GoogleRecaptcha } from '../../constants';
    import { mapActions, mapGetters } from 'vuex';
    import VueRecaptcha from 'vue-recaptcha';

    export default {
        name: 'Content',
        mixins: [ validationMixin ],
        components: { VueRecaptcha },
        data() {
            return {
                sender_name: '',
                sender_email: '',
                sender_phone: '',
                message_title: '',
                message_request: '',
                sender_name_error: '',
                sender_email_error: '',
                sender_phone_error: '',
                message_title_error: '',
                message_request_error: '',
                oGoogleRecaptcha: GoogleRecaptcha,
                recaptcha_response: null,
                recaptcha_response_error: '',
                enable_submit: false
            };
        },
        computed: {
            ...mapGetters('Message', ['message_sent']),
        },
        methods: {
            ...mapActions('Message', ['sendMessage']),

            /**
             * Reset error msgs.
             */
            resetErrorMsg() {
                this.sender_name_error = '';
                this.sender_email_error = '';
                this.sender_phone_error = '';
                this.message_title_error = '';
                this.message_request_error = '';
                this.recaptcha_response_error = '';
            },

            /**
             * Add invalid input class if the field was invalid on change.
             * @param validation
             * @returns {string}
             */
            inputChecker(validation) {
                return (validation === false) ? 'invalid-input' : '';
            },

            /**
             * Validate form.
             * @returns {boolean|Promise<SweetAlertResult<Awaited<*>>>}
             */
            validateForm() {
                this.resetErrorMsg();
                this.validateRequired();
                this.validateInput();
                this.confirmSendMessage();
            },

            /**
             * Validate required. Return string if failed and boolean true if successful.
             */
            validateRequired() {
                if (this.$v.sender_email.required === false) {
                    this.sender_email_error =  AlertMessages.REQUIRED.SENDER_EMAIL;
                }
                if (this.$v.message_request.required === false) {
                    this.message_request_error =  AlertMessages.REQUIRED.MESSAGE_REQUEST;
                }
            },

            /**
             * Validate input fields.
             */
            validateInput() {
                if (this.$v.sender_name.$invalid === true) {
                    this.sender_name_error =  AlertMessages.VALIDATION.SENDER_NAME;
                }
                if (this.$v.sender_email.$invalid === true) {
                    this.sender_email_error =  AlertMessages.VALIDATION.SENDER_EMAIL;
                }
                if (this.$v.sender_phone.$invalid === true) {
                    this.sender_phone_error =  AlertMessages.VALIDATION.SENDER_PHONE;
                }
                if (this.$v.message_title.$invalid === true) {
                    this.sender_phone_error =  AlertMessages.VALIDATION.MESSAGE_TITLE;
                }
                if (this.$v.message_request.$invalid === true) {
                    this.message_request_error =  AlertMessages.VALIDATION.MESSAGE_REQUEST;
                }
                if (this.$v.recaptcha_response.required === false) {
                    this.recaptcha_response_error =  AlertMessages.REQUIRED.RECAPTCHA;
                }
            },

            /**
             * Confirm send message.
             * @returns {Promise<void>}
             */
            async confirmSendMessage() {
                if (this.$v.$invalid === true) {
                    return;
                }

                this.confirmMessage(
                    Alerts.WARNING,
                    AlertMessages.CONFIRM.MESSAGE,
                    Alerts.BUTTONS.MESSAGE.OK,
                    Alerts.BUTTONS.MESSAGE.CANCEL,
                ).then((oResult) => {
                    if (oResult.isConfirmed) {
                        this.sendMessageRequest();
                    }
                });
            },

            /**
             * Send message request.
             * @returns {Promise<void>}
             */
            async sendMessageRequest() {
                Promise.all([
                    await this.sendMessage({
                        sender_name: this.sender_name,
                        sender_email: this.sender_email,
                        sender_phone: this.sender_phone,
                        message_title: this.message_title,
                        message_request: this.message_request,
                        recaptcha_response: this.recaptcha_response
                    })
                ]).then(() => {
                    if (this.message_sent === true) {
                        Promise.all([
                            this.alertMessage(Alerts.SUCCESS, AlertMessages.SUCCESSFUL.MESSAGE)
                        ]).then(() => {
                            location.reload();
                        })
                    } else {
                        this.alertMessage(Alerts.ERROR, AlertMessages.FAILED.MESSAGE);
                    }
                })
            },

            /**
             * On verify callback.
             * @param response
             */
            onVerify(response) {
                this.recaptcha_response = response;
                this.enable_submit = true;
            },

            /**
             * Disable submit if encounters an error.
             */
            onError() {
                this.recaptcha_response = null;
                this.enable_submit = false;
            },

            /**
             * On captcha expired callback.
             */
            onCaptchaExpired() {
                this.$refs.recaptcha.reset();
                this.recaptcha_response = null;
                this.enable_submit = false;
                console.log('test');
            }
        },
        validations: {
            sender_name: {
                minLength: minLength(2),
                maxLength: maxLength(50)
            },
            sender_email: {
                required,
                email,
                minLength: minLength(6),
                maxLength: maxLength(50)
            },
            sender_phone: {
                numeric,
                minLength: minLength(3),
                maxLength: maxLength(25)
            },
            message_title: {
                minLength: minLength(3),
                maxLength: maxLength(50)
            },
            message_request: {
                required,
                minLength: minLength(10),
                maxLength: maxLength(3000)
            },
            recaptcha_response: {
                required
            }
        }
    }
</script>

<style scoped>
    .invalid-input {
        border-color: #d0963e;
    }
</style>
