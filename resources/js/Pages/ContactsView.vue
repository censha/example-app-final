<template>
    <Header></Header>
  <div class="total_wrapper">
    <h1 class="contacts-h1">Контакты</h1>

    <div class="total_wrapper">
      <div class="row">
        <div class="col-3 col-xs-12">
          <p class="contacts-title">Как с нами связаться</p>
          <a href="tel:+79991111111" class="contacts-text" style="display: flex">
            <img
              src="@/assets/img/phone.svg"
              style="margin-right: 5px"
              alt=""
            />
            +7 (999) 111-11-11
          </a>
          <a href="mailto:mail@pochta.ru" class="contacts-text" style="display: flex">
            <img src="@/assets/img/mail.svg" style="margin-right: 5px" alt="" />
            mail@pochta.ru
          </a>
        </div>
        <div class="col-9 col-xs-12">
          <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A889d3d449617e147b849af5a1dbf67e1f69443ac52decb42881ef12fe9a946bd&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
          <p class="contacts-text" style="margin-top: 20px; margin-bottom: 15px; display: flex">
            <img
              src="@/assets/img/where.svg"
              style="margin-right: 5px"
              alt=""
            />

            Место нахождения/почтовый адрес: 614039, Россия, г. Пермь, ул. Пионерская, 17
          </p>


          <p class="contacts-title">Реквизиты:</p>
         <p  class="contacts-text" >Государственное краевое бюджетное учреждение культуры «Пермский государственный краевой клуб-киноцентр «Пермская синематека» (ГКБУК «Пермская синематека»)</p> 
<br>
          <p  class="contacts-text">ИНН 5904100992</p>
          <p  class="contacts-text">КПП 590401001</p>
          <p  class="contacts-text">ОГРН 1025900894689</p>

        </div>
      </div>
    </div>
  </div>
  <Footer></Footer>
</template>

<script>
import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";
export default {
  name: "contacts-view",
  components: {
        Header,
        Footer,
    },
    mounted() {
      document.querySelector('.nav__gamburger').onclick = () => {
      document.querySelector('.ham').classList.toggle('active')
      document.querySelector('.nav__links').classList.toggle('active')
    }},
};
</script>

<style scoped>
.contacts-h1 {
  font-weight: 900;
  font-size: 40px;
  margin-bottom: 30px;
  text-align: center;
  text-transform: lowercase;

  color: #f3f3f4;
  margin-top: 80px;
}
.row {
  display: flex;
}
.col-3 {
  width: 25%;
}
.col-9 {
  width: 75%;
}
.contacts-title {
  font-weight: 600;
  font-size: 20px;
  color: #ffffff;
  margin-bottom: 20px;
}
.contacts-text {
  font-weight: 400;
  font-size: 16px;
  color: #d9d9d9;
  margin-bottom: 10px;
}
</style>
