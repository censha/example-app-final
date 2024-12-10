<template>
    <Header></Header>
    <div class="wrapper__login">
        <div class="wrapper__enter__login">
            <div class="enter__login__nav">
                <Link :href="route('login')"><p data-tab="enter__login__enter">Вход</p></Link>
                <p data-tab="enter__login__registr" class="active">Регистрация</p>
            </div>
            <form @submit.prevent="submit">
                <div class="enter__login__registr active">
                    <input type="text" v-model="form.first_name" placeholder="Имя" required autofocus autocomplete="first_name"/>

                    <InputError class="mt-2" :message="form.errors.first_name" />
                    <input type="text" v-model="form.last_name" placeholder="Фамилия" required autofocus autocomplete="last_name"/>
                    <InputError class="mt-2" :message="form.errors.last_name" />
                    <input type="email" v-model="form.email" placeholder="Введите E-mail" required autofocus autocomplete="email"/>
                    <InputError class="mt-2" :message="form.errors.email" />
                    <div class="log-pass-wrap">
                        <input :type="isShowed ? '' : 'password'" v-model="form.password" placeholder="Введите пароль" required />
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
                    <InputError class="mt-2" :message="form.errors.password" />
                    <input type="password" v-model="form.password_confirmation" placeholder="Повторите пароль" required/>
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    <button style="display: block; margin: 0 auto;" class="btn__login__registr" :disabled="form.processing">
                        <!-- <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" >
                        Register
                        </PrimaryButton> -->
                        Регистрация
                    </button>
                </div>
            </form>
        </div>
    </div>
    <Footer></Footer>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>


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