<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <footer>
    <div class="total_wrapper">
      <div class="wrapper__footer">
        <div class="footer__block">
          <img src="@/assets/img/footer_logo.png" alt="" />
        </div>
        <div class="footer__block">
          <article>О нас</article>
          <a :href="route('blodnews')"> <p>Блог</p> </a
          ><a :href="route('UridInfo')">
            <p>Юридическая информация</p>
          </a>
          <a :href="route('ContactsView')">
            <p>Контакты</p>
          </a>
        </div>
        <div class="footer__block">
          <article>Пользователям</article>
          <a :href="route('examplesale')">
            <p>Как оформить заказ</p>
          </a>
          <a :href="route('usearchive')">
            <p>Использование архива</p>
          </a>
          <a :href="route('termsofuse')">
            <p>Пользовательское соглашение</p>
          </a>
          <a :href="route('help')">
            <p>Раздел помощи</p>
          </a>
          <a :href="route('UridInfo')">
            <p>Документы для авторов</p>
          </a>
        </div>
        <div class="footer__block">
          <article>Контакты</article>
          <a href="tel:+79999999999" class="wrapper__contackt">
            <img src="@/assets/img/phone.svg" alt="" />
            <p style="margin-bottom: 0;">+7 999 999 99 99</p>
          </a>
          <a href="mailto:info@domen.ru" class="wrapper__contackt">
            <img src="@/assets/img/mail.svg" alt="" />
            <p style="margin-bottom: 0;">info@domen.ru</p>
          </a>
        </div>
      </div>
      <p>2022 © «Видеоархив Пермской синематики» Все права защищены</p>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer-component",
 mounted() {



  document.getElementsByTagName('img').ondragstart = function() { return false; };

  var img = document.getElementsByTagName('img');

  for(var i in img)
  {
      img[i].oncontextmenu = function()
      {
          return false;
      }
  }
 }
};
</script>

<style></style>
