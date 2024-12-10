<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Header></Header>
    <div class="wrapper__login">
        <div class="wrapper__enter__login">
        <Head title="Reset Password" />

        <div class="enter__login__nav">
            <p class="active">Смена пароля</p>
          </div>

        <form @submit.prevent="submit">
            <div>

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Введите E-mail"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                    placeholder="Введите пароль"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Подтвердите пароль"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton style="display: block; margin: 0 auto;" class="btn__login__enter" :disabled="form.processing">
                    Сменить
                </PrimaryButton>
            </div>
        </form>
    </div></div>
    <Footer></Footer>
</template>

<script>
	import Header from "@/Layouts/Header.vue";
	import Footer from "@/Layouts/Footer.vue";

	export default {
    name: "App",
    components: {
        Header,
        Footer,
    },
    data() {
  }

};
</script>

<style scoped>
.wrapper__enter__login {
	margin: 100px auto;
	max-width: 590px;
	background: #414145;
	box-shadow: 0 5px 20px #00000040;
	border-radius: 10px;
	padding: 40px;
}
.enter__login__nav {
	display: flex;
	justify-content: space-between;
	font-size: 25px;
	margin-bottom: 25px;
	border-bottom: 1px solid #9f9f9f;
	font-family: monster-thin;
	padding-bottom: 20px;
}
.enter__login__nav p {
	cursor: pointer;
}
.enter__login__nav p.active {
	font-weight: 700;
}
.enter__login__registr,
.enter__login__enter {
	margin-top: 40px;
	display: none;
}
.enter__login__registr.active,
.enter__login__enter.active {
	display: block;
}
.wrapper__enter__login input {
	display: block;
	width: 77%;
	height: 60px;
	background: #ffffff;
	border: 1px solid #555555;
	border-radius: 3px;
	padding: 0 25px;
	font-size: 16px;
	color: #878787;
	margin: 0 auto 15px;
}
.btn__login__registr,
.btn__login__enter {
	margin: 40px auto 0;
	width: 77%;
	height: 60px;
	line-height: 49px;
	text-align: center;
	background: #df8e75;
	box-shadow: 0 3px 7px #00000040;
	border-radius: 3px;
	color: #18181a;
	font-size: 20px;
	font-weight: 700;
	cursor: pointer;
	text-transform: none;
}
.remember_pass {
	margin: 10px auto 0;
	width: 77%;
	text-align: end;
	font-size: 12px;
	line-height: 15px;
	text-decoration-line: underline;
	color: #d9d9d9;
	cursor: pointer;
}
@media (max-width: 600px) {
	.wrapper__enter__login {
			margin: 100px auto;
			box-shadow: 0 2.88136px 11.5254px #00000040;
			border-radius: 6px;
	}
	.enter__login__nav {
			font-size: 14px;
			padding-bottom: 10px;
	}
	.wrapper__enter__login input {
			width: 100%;
			height: 35px;
			border-radius: 2px;
			padding: 0 14px;
			font-size: 10px;
			color: #878787;
			margin: 0 auto 10px;
	}
	.btn__login__registr,
	.btn__login__enter {
			margin: 20px auto 0;
			width: 100%;
			height: 35px;
			line-height: 35px;
			border-radius: 2px;
			font-size: 12px;
	}
	.remember_pass {
			margin: 10px auto 0;
			width: 100%;
			text-align: end;
			font-size: 10px;
			line-height: 12px;
	}
}
.wrapper__self-page {
	margin: 100px auto;
}
.self-page__info {
	display: flex;
}
.self-page__img {
	width: 189px;
	height: 236px;
	background: #3e3e3e;
	box-shadow: 0 4px 4px #00000040;
	border-radius: 6px;
	padding: 10px;
}
.self-page__img img {
	width: 100%;
	height: 185px;
	display: block;
}
.load_foto {
	margin: 9px auto 0;
	height: 24px;
	line-height: 24px;
	background: #d9d9d9;
	box-shadow: 0 4px 13px #00000040;
	border-radius: 3px;
	font-size: 10px;
	text-align: center;
	color: #4a4a4d;
	cursor: pointer;
}
.self-page__name {
	margin: 10px 0 0 24px;
	font-size: 24px;
	line-height: 29px;
	font-weight: 700;
}
.self-page__nav {
	margin-top: 85px;
	display: flex;
	border-bottom: 1px solid #4e4a5f;
}
.self-page__nav p {
	font-weight: 500;
	font-size: 20px;
	line-height: 24px;
	color: #f3f3f4;
	margin-left: 100px;
	cursor: pointer;
	padding-bottom: 11px;
}
.self-page__nav p:first-child {
	margin-left: 0;
}
.self-page__nav p.active {
	font-weight: 700;
	font-size: 20px;
	color: #df8e75;
	border-bottom: 3px solid #df8e75;
}
.modal_collection {
	margin-top: 30px;
	display: none;
	flex-wrap: wrap;
}
.modal_collection.active {
	display: flex;
}
.modal_collection__block {
	margin: 0 30px 30px 0;
	position: relative;
}
.collection__block__close {
	position: absolute;
	top: 8px;
	right: 8px;
	width: 30px;
	height: 30px;
	background: #18181a;
	border-radius: 2px;
	z-index: 2;
	padding-top: 5px;
	cursor: pointer;
}
.collection__block__close img {
	display: block;
	margin: auto;
}
.modal_collection__block > img {
	display: block;
	width: 228px;
	height: 162px;
	opacity: 0.6;
	cursor: pointer;
}
.modal_collection__block__name {
	height: 60px;
	padding: 10px 7px;
	overflow: hidden;
	background: #18181a;
	font-size: 12px;
	line-height: 15px;
}
@media (max-width: 960px) {
	.self-page__info {
			display: flex;
			flex-direction: column;
	}
	.self-page__img {
			margin-top: 10px;
			order: 1;
	}
	.self-page__name {
			margin: 0;
			font-size: 20px;
			line-height: 24px;
	}
	.self-page__nav {
			margin-top: 40px;
			display: block;
			border-bottom: none;
	}
	.self-page__nav p {
			margin-left: 0;
			cursor: pointer;
			padding: 11px 0;
			border-bottom: 1px solid #555555;
	}
	.self-page__nav p.active {
			border-bottom: 1px solid #555555;
	}
	.modal_collection__block {
			margin: 15px auto;
			position: relative;
	}
}
.modal_orders {
	display: none;
}
.modal_orders.active {
	margin-top: 30px;
	display: block;
}
.wraper__modal_orders {
	width: 100%;
	overflow-x: scroll;
	border-bottom: 1px solid #4a4a4d;
	padding-bottom: 7px;
}
.wraper__modal_orders::-webkit-scrollbar {
	width: 0;
}
.modal_orders__line-name,
.modal_orders__line {
	display: flex;
	width: 1200px;
}
.modal_orders__line {
	height: 60px;
	font-size: 14px;
	line-height: 17px;
	overflow: hidden;
	background: #2e2e2e;
}
.modal_orders__line-name p,
.modal_orders__line p {
	padding: 5px;
}
.modal_orders__line-name p {
	font-family: monster-medium;
}
.modal_orders__line-name p:first-child,
.modal_orders__line p:first-child {
	width: 112px;
}
.modal_orders__line-name p:nth-child(2),
.modal_orders__line p:nth-child(2) {
	width: 252px;
}
.modal_orders__line-name p:nth-child(3),
.modal_orders__line p:nth-child(3) {
	width: 416px;
}
.modal_orders__line-name p:nth-child(4),
.modal_orders__line p:nth-child(4) {
	width: 197px;
}
.modal_orders__line-name p:nth-child(5),
.modal_orders__line p:nth-child(5) {
	width: 97px;
}
.modal_orders__line-name p:nth-child(6),
.modal_orders__line p:nth-child(6) {
	width: 126px;
}
.modal_orders__line p:not(:first-child) {
	border-left: 1px solid #4a4a4d;
}
.modal_orders__line:nth-child(odd) {
	background: #363636;
}
.modal_bascet {
	display: none;
}
.modal_bascet.active {
	margin-top: 30px;
	display: block;
}
.bascet__block {
	margin-top: 10px;
	position: relative;
	background: #3e3e3e;
	border-radius: 3px;
	padding: 20px 40px 20px 20px;
	display: flex;
}
.bascet__block p {
	margin-top: 10px;
	font-size: 18px;
	line-height: 110%;
	color: #f3f3f4;
	font-weight: 700;
}
.bascet__block__img {
	width: 100px;
}
.bascet__block__img img {
	width: 70%;
	display: block;
	margin: 0;
}
.bascet__block__name,
.bascet__block__time,
.bascet__block__format {
	width: 23%;
}
.bascet__block > img {
	position: absolute;
	top: 20px;
	right: 20px;
	cursor: pointer;
}
@media (max-width: 960px) {
	.bascet__block {
			padding: 20px;
			display: flex;
			flex-wrap: wrap;
	}
	.bascet__block__img {
			width: 40%;
	}
	.bascet__block__img img {
			width: 70%;
			display: block;
			margin: 0;
	}
	.bascet__block__name {
			width: 60%;
	}
	.bascet__block__time,
	.bascet__block__format,
	.bascet__block__price {
			width: 100%;
			margin-top: 15px;
	}
	.bascet__block p {
			margin-top: 5px;
	}
}
.wrapper_bascet_orders {
	margin-top: 50px;
}
.wrapper_bascet_orders h2 {
	font-size: 30px;
	line-height: 37px;
}
.wrapper_orders_block {
	margin-top: 30px;
	display: flex;
}
.wrapper_orders_name {
	width: 285px;
}
.wrapper_orders_info {
	position: relative;
	width: calc(100% - 285px);
}
.wrapper_orders_info article {
	font-size: 14px;
	line-height: 17px;
	color: #d9d9d9;
	margin-bottom: 5px;
}
.wrapper_orders_name p {
	font-size: 18px;
	line-height: 36px;
	font-weight: 700;
}
.wrapper_orders_block input[type="text"],
.wrapper_orders_block textarea {
	width: 100%;
	height: 36px;
	background: #ffffff;
	border: 1px solid #555555;
	border-radius: 3px;
	padding: 0 15px;
}
.wrapper_orders_block textarea {
	resize: none;
	height: 97px;
	padding: 9px 15px;
}
.wrapper_orders_block input[type="radio"] {
	display: none;
}
.wrapper_orders_block label {
	display: inline-block;
	cursor: pointer;
	position: relative;
	padding-left: 32px;
	margin-right: 30px;
	line-height: 18px;
	-webkit-user-select: none;
	-moz-user-select: none;
	user-select: none;
	margin-top: 8px;
}
.wrapper_orders_block label:before {
	content: "";
	display: inline-block;
	width: 19px;
	height: 19px;
	position: absolute;
	left: 0;
	bottom: 1px;
	background: #fff;
	border-radius: 50%;
}
.wrapper_orders_block input[type="radio"]:checked + label:before {
	background: #df8e75;
}
.wrapper_orders_block label:hover:before {
	filter: brightness(120%);
}
.wrapper_orders_block input[type="radio"]:disabled + label:before {
	filter: grayscale(100%);
}
.wrapper_orders_block input[type="checkbox"] {
	position: absolute;
	width: 20px;
	height: 20px;
}
.wrapper_orders_info p.label_chekbox {
	padding-left: 35px;
	font-size: 18px;
	line-height: 22px;
	font-weight: 400;
}
.wrapper_orders_info p a {
	color: #4378ff;
	text-decoration: underline;
}
.btn__order {
	width: 185px;
	height: 36px;
	line-height: 36px;
	text-align: center;
	background: #df8e75;
	box-shadow: 0 3px 7px #00000040;
	border-radius: 3px;
	color: #18181a;
	font-weight: 700;
	cursor: pointer;
}
@media (max-width: 960px) {
	.wrapper_bascet_orders h2 {
			font-size: 20px;
			line-height: 24px;
	}
	.wrapper_orders_block {
			margin-top: 15px;
			display: block;
	}
	.wrapper_orders_name {
			width: 100%;
	}
	.wrapper_orders_info {
			position: relative;
			width: 100%;
	}
	.wrapper_orders_info article {
			font-size: 10px;
			line-height: 12px;
	}
	.wrapper_orders_name p {
			font-size: 16px;
			line-height: 20px;
			margin-bottom: 5px;
			font-weight: 400;
	}
	.wrapper_orders_block input[type="text"],
	.wrapper_orders_block textarea {
			width: 100%;
			max-width: 500px;
			height: 32px;
			padding: 0 10px;
	}
	.wrapper_orders_block textarea {
			height: 97px;
			padding: 10px;
	}
	.wrapper_orders_block input[type="checkbox"] {
			width: 17px;
			height: 17px;
			top: -3px;
	}
	.wrapper_orders_info p.label_chekbox {
			padding-left: 27px;
			font-size: 14px;
			line-height: 17px;
			font-weight: 400;
	}
	.order__price {
			text-align: center;
			margin: 20px 0 10px;
	}
	.order__price__title {
			max-width: 270px;
			text-align: center;
			margin: auto;
	}
	.btn__order {
			margin: 20px auto;
	}
}
.modal_callback {
	display: none;
}
.modal_callback.active {
	margin-top: 30px;
	display: block;
}
.modal_callback h3 {
	margin: 30px auto;
	font-size: 30px;
	line-height: 37px;
}
.wrapper_callback_info {
	margin-top: 16px;
	max-width: 750px;
	display: flex;
	justify-content: space-between;
}
.wrapper_callback_info input {
	width: 48%;
	height: 36px;
	background: #ffffff;
	border: 1px solid #555555;
	border-radius: 3px;
	padding: 0 15px;
}
.wrapper_callback_info textarea {
	width: 100%;
	height: 97px;
	background: #ffffff;
	border: 1px solid #555555;
	border-radius: 3px;
	resize: none;
	padding: 8px 15px;
}
.modal_callback > p {
	max-width: 699px;
	margin: 25px 0;
	font-size: 18px;
	line-height: 22px;
}
.modal_callback > p a {
	color: #4378ff;
	text-decoration: underline;
}
.callback__btn {
	width: 281px;
	height: 50px;
	line-height: 50px;
	text-align: center;
	background: #df8e75;
	box-shadow: 0 3px 7px #00000040;
	border-radius: 3px;
	font-size: 18px;
	color: #18181a;
	font-weight: 700;
	cursor: pointer;
}
@media (max-width: 960px) {
	.wrapper_callback_info {
			margin-top: 16px;
			display: block;
	}
	.wrapper_callback_info input {
			margin-top: 16px;
			width: 100%;
			max-width: 450px;
			padding: 8px;
	}
	.wrapper_callback_info textarea {
			padding: 8px;
	}
}

</style>