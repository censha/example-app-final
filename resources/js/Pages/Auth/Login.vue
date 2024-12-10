<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Header></Header>
    <div class="wrapper__login">
    <div class="wrapper__enter__login">
      <div class="enter__login__nav">
        <p data-tab="enter__login__enter" class="active">Вход</p>
        <Link :href="route('register')"><p data-tab="enter__login__registr">Регистрация</p></Link>
      </div>
      <form @submit.prevent="submit">
          <div class="enter__login__enter active">
            <input type="text"  v-model="form.email" placeholder="Введите E-mail" />
            <div class="log-pass-wrap">
                <input :type="isShowed ? '' : 'password'"  v-model="form.password" placeholder="Введите пароль" />
                <button class="show-pass-btn" type="button" @click="isShowed = !isShowed">
                    <svg v-if="!isShowed" width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_429_11085)">
                        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#292929" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 12C3.60014 7.90264 7.33603 5 12 5C16.664 5 20.3999 7.90264 22 12C20.3999 16.0974 16.664 19 12 19C7.33603 19 3.60014 16.0974 2 12Z" stroke="#292929" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_429_11085">
                        <rect width="24" height="24" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                    <svg v-else width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_429_11158)">
                        <path d="M10.7302 5.07319C11.1448 5.02485 11.5684 5 11.9999 5C16.6639 5 20.3998 7.90264 21.9999 12C21.6053 13.0104 21.0809 13.9482 20.4446 14.7877M6.51956 6.51944C4.47949 7.76406 2.90105 9.69259 1.99994 12C3.60008 16.0974 7.33597 19 11.9999 19C14.0375 19 15.8979 18.446 17.4805 17.4804M9.87871 9.87859C9.33576 10.4215 8.99994 11.1715 8.99994 12C8.99994 13.6569 10.3431 15 11.9999 15C12.8284 15 13.5785 14.6642 14.1214 14.1212" stroke="#292929" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4 4L20 20" stroke="#292929" stroke-width="2.5" stroke-linecap="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_429_11158">
                        <rect width="24" height="24" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>
            <div class="remember_pass">
                <a :href="route('password.request')"><p style="font-size: 16px;
                    margin-bottom: 20px;">Забыли пароль?</p></a>
            </div>
            <button style="display: block; margin: 0 auto;" class="btn__login__enter" :disabled="form.processing">
               Войти
                <!-- <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" >
                    Log in
                </PrimaryButton> -->
            </button>
        </div>
    </form>
    </div>
  </div>
    <!-- <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>


                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>

    </GuestLayout> -->
    <Footer></Footer>
</template>

<script>
import "@/assets/css/login.css";

import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";

export default {
    name: "Login-component",
    name: "App",
    components: {
        Header,
        Footer,
    },
    data() {
    return {
        isShowed: false,
    }
  }

};
</script>

<style scoped>
    .log-pass-wrap {
        position: relative;
    }

    .show-pass-btn {
        position: absolute;
        position: absolute;
        right: 15%;
        bottom: 27%;
    }
</style>
