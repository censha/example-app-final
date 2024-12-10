<template>
  <footer>
    <div class="total_wrapper">
      <div class="wrapper__footer">
        <div class="footer__block">
          <img src="@/assets/img/footer_logo.png" alt="" />
        </div>
        <div class="footer__block">
          <article>О нас</article>
          <a href=""> <p>Блог</p> </a
          ><a href="">
            <p>Юридическая информация</p>
          </a>
        </div>
        <div class="footer__block">
          <article>Пользователям</article>
          <a href="">
            <p>Как оформить заказ</p>
          </a>
          <a href="">
            <p>Использование архива</p>
          </a>
          <a href="">
            <p>Пользовательское соглашение</p>
          </a>
          <a href="">
            <p>Раздел помощи</p>
          </a>
          <a href="">
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
};

</script>

<style></style>
