<template>
    <section class="bg-[#E2E3EA] dark:bg-gray-900">
        <div class="grid md:grid-cols-2 min-h-screen bg-[#E2E3EA]">
            <div class="bg-[#1F1F1F] hidden md:block">
                <div class=" max-w-xl mx-auto flex flex-col justify-center h-full">
                    <div>
                        <img :src="'/img/live-stream.png'" class=" w-2/6" alt="">
                    </div>
                    <div>
                        <img :src="'/img/connection.png'" class="mx-auto my-20 w-1/2" alt="">
                    </div>
                    <h1 id="login-text">Connect with your<br />
                        friends and family</h1>
                </div>


            </div>
            <div class="flex flex-col w-full items-center md:items-start justify-center px-20 py-2 mx-auto lg:py-0 bg-[#E2E3EA]">
                <h1 id="login-heading" class="mb-10">
                    <!-- <img class="w-8 h-8 mr-2" :src="$page.props.app_url + 'logo/blog-logo.svg'" alt="logo" /> -->
                    Login to your Account
                </h1>
                <div class=" max-w-lg rounded-lg md:mt-0 xl:p-0">
                    <div class="space-y-4 md:space-y-6">

                        <form class="space-y-6 md:space-y-10" action="#" @submit.prevent="">
                            <div>
                                <h2 id="login-label">Email</h2>

                                <FormSimpleInput :label="''" :name="'email'" :type="'email'" v-model="loginInfo.email" :placeholder="'Email Address'"
                                    :error="errors.email">
                                </FormSimpleInput>
                            </div>
                            <div>
                                <h2 id="login-label">Password</h2>

                                <FormSimpleInput :label="''" :name="'password'" :type="'password'" :placeholder="'Password'"
                                    v-model="loginInfo.password" :error="errors.password">
                                </FormSimpleInput>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <FormCheckBox :label="'Remember Me'" :name="'remember_me'" :checked="false"
                                        id="remember-me" v-model="loginInfo.remember_me"
                                        :error="$page.props.errors.remember_me">
                                    </FormCheckBox>
                                </div>
                                <!-- <Link href="#"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                            password?</Link> -->
                            </div>
                            <Button @click.prevent="login()" :text="'Sign in'" :color="'blue'" :fullWidth="true"></Button>
                            <button type="submit" id="login-with-google" class="flex items-center justify-center gap-8">
                                <img :src="'/img/google.png'" alt="">
                                <p id="login-with-google-text">
                                    Continue with Google
                                </p>
                            </button>
                            <p id="signup-text" class="text-center">
                                Don’t have an account?<span id="signup-text-signup"> Sign Up </span>
                            </p>
                            <!-- <p class="text-sm font-light text-gray-700 dark:text-gray-400">
                            Don’t have an account yet?
                            <Link href="/register"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up
                            </Link>
                        </p> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>
<style>
#login-text {
    color: #FFF;
    text-align: center;
    font-family: 'Roboto', sans-serif;
    font-size: 40px;
    font-style: normal;
    font-weight: 300;
    line-height: 56px;
    /* 140% */
    letter-spacing: 2px;
}

#login-heading {
    color: #000;
    font-family: 'Inter', sans-serif;
    font-size: 30px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

#login-label {
    color: #5F5F5F;
    /* Bold 12 (0.3 px, CAPS) */
    font-family: 'Mulish', sans-serif;
    font-size: 12px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: 0.3px;
    text-transform: uppercase;
}

#remember-me {
    color: #5F5F5F;
    font-family: 'Mulish', sans-serif;
    font-size: 14px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: 0.3px;
    text-transform: uppercase;
}
#login-with-google{
    border-radius: 15px;
    width: 488px;
height: 52px;
flex-shrink: 0;
border: 1px solid rgba(255, 255, 255, 0.80);
background: #1F1F1F;
}
#login-with-google-text{
    color: #FFF;
text-align: center;
font-family: 'Roboto', sans-serif;
font-size: 20px;
font-style: normal;
font-weight: 300;
line-height: normal;
letter-spacing: 1px;
}
#signup-text{
    color: #242424;
text-align: center;
font-family: 'Roboto', sans-serif;

font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 0.8px;
}
#signup-text-signup{
    color: #EF4A73;
font-family: Roboto;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 0.8px;
}
</style>

<script>
import { router } from "@inertiajs/vue3";
export default {
    data() {
        return {
            loginInfo: {},
            errors: this.$page.props.errors,
        };
    },
    methods: {
        login() {
            router.post("/login", this.loginInfo, {
                preserveScroll: true,
                preserveState: false,
                only: ["errors"],
            });
        },
    },
};
</script>
<script setup>
import FormSimpleInput from "../../Shared/FormElements/FormSimpleInputLogin.vue";
import FormCheckBox from "../../Shared/FormElements/FormCheckBox.vue";
import Button from '../../Shared/FormElements/ButtonLogin.vue';
</script>
