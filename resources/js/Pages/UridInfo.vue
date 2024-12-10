<template>
    <Header></Header>
  <main class="polit main">
    <div class="item">
      <!-- ======= section2 ======= -->
      <section class="section2__section2">
        <h1 class="section2__hero_title">Юридическая информация</h1>
      </section>
      <!-- ======= End section2 ======= -->
    </div>
    <div class="item">
      <!-- ======= section3 ======= -->
      <section class="section3__section3">
        <div class="section3__row">
          <div class="item">
            <div class="section3__col">
              <h3 class="section3__subtitle2">Основные документы</h3>
              <a href="../assets/pdf/Пользовательское соглашение Пермь.pdf" target="_blank">
                <h5 class="section3__highlights3">
                  Пользовательское соглашение
                </h5>
              </a>
              <a href="../assets/pdf/Политика конфиденциальности Пермь.pdf" target="_blank">
                <h5 class="section3__highlights3">
                  Политика конфиденциальности
                </h5>
              </a>
              <a href="../assets/pdf/Согласие на обработку персональных данных Пермь.pdf" target="_blank">
                <h5 class="section3__highlights3">
                  Согласие на обработку персональных<br />данных
                </h5>
              </a>

              <a href="../assets/pdf/Политика Cookies Пермь.pdf" target="_blank">
                <h5 class="section3__highlights3">Политика Cookies</h5>
              </a>
      
              <h3 class="section3__subtitle21">Документы для пользователей</h3>
              <a href="../assets/pdf/ЛИЦЕНЗИОННОЕ СОГЛАШЕНИЕ.pdf" target="_blank">
                <h5 class="section3__highlights3">Лицензионное соглашение</h5>
              </a>
              <h3 class="section3__subtitle21">Документы для авторов</h3>
              <a href="../assets/pdf/СОГЛАШЕНИЕ С АВТОРОМ.pdf" target="_blank">
                <h5 class="section3__highlights3">Соглашение с автором</h5>
              </a>
              <a href="../assets/pdf/Форма согласия модели.pdf" target="_blank">
                <h5 class="section3__highlights3">Форма согласия модели</h5>
              </a>
              <a href="../assets/pdf/Форма согласия модели для детей.pdf" target="_blank">
              <h5 class="section3__highlights3">
                Форма согласия модели для детей
              </h5></a>
              <a href="../assets/pdf/Форма согласия модели от собственника.pdf" target="_blank">
                <h5 class="section3__highlights3">
                  Форма согласия владельца<br />собственности
                </h5>
              </a>
            </div>
          </div>
          <div class="spacer"></div>
          <div class="item1">
            <div class="section3__col1">
              <h3 class="section3__subtitle2">ЮРИДИЧЕСКИЕ УВЕДОМЛЕНИЯ</h3>
              <h5 class="section3__highlights4">
                Любое официальное уведомление, или иное уведомление юридического
                характера адресованное любому подразделению “Пермский
                видеоархив” должно быть отправлено почтой (или курьерской
                службой) с подтверждением вручения и описью вложенного по
                следующему адресу:<br /><br />123456 Российская Федерация, г.
                Пермь, улица Пушкина, дом Колотушкина.<br /><br />Также копию
                копия может быть отправлена нам на электронную почту
                info@videoperm.ru, с указанием в теме письма «В юридическую
                службу».
              </h5>
            </div>
          </div>
        </div>
      </section>
      <!-- ======= End section3 ======= -->
    </div>
  </main>
  <Footer></Footer>
</template>

<script>
// import "@/assets/css/Polit.css";
import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";

export default {
    name: "urid-info-view",
    components: {
        Header,
        Footer,
    },
};
</script>

<style scoped>
.main {
  display: flex;
  flex-direction: column;
  background-color: #242427;
  position: relative;
  overflow: hidden;
  margin-top: 100px;
}

.main > .item {
  display: flex;
  flex-direction: column;
  position: relative;
}

.section2__section2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex-grow: 1;
}

.section2__hero_title {
  display: flex;
  justify-content: center;
  font: 700 40px/1.1 "Montserrat", Helvetica, Arial, serif;
  color: #f3f3f4;
  text-align: center;
  letter-spacing: -0.4px;
  position: relative;
  margin: 20px 0px 0px;
}
@media (max-width: 1199px) {
  .section2__hero_title {
    font-size: 36px;
    text-align: center;
  }
}
@media (max-width: 991px) {
  .section2__hero_title {
    font-size: 32px;
  }
}
@media (max-width: 767px) {
  .section2__hero_title {
    font-size: 28px;
  }
}
@media (max-width: 575px) {
  .section2__hero_title {
    font-size: 24px;
  }
}
@media (max-width: 383px) {
  .section2__hero_title {
    font-size: 20px;
  }
}

.section2__highlights2 {
  display: flex;
  justify-content: center;
  font: 500 16px/1.1 "Montserrat", Helvetica, Arial, serif;
  color: #f3f3f4;
  text-align: center;
  letter-spacing: -0.1px;
  width: 130px;
  position: relative;
  min-height: 36px;
  min-width: 130px;
  margin: 10px auto 0px;
}
@media (max-width: 1199px) {
  .section2__highlights2 {
    font-size: 12px;
    text-align: center;
  }
}

.section3__section3 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex-grow: 1;
}

.section3__row {
  display: flex;
  width: 74.88%;
  position: relative;
  flex-grow: 1;
  margin: 30px auto 100px;
}
@media (max-width: 1399px) {
  .section3__row {
    flex-wrap: wrap;
    justify-content: flex-start;
    align-content: flex-start;
    -moz-column-gap: 0px;
    column-gap: 0px;
    row-gap: 16px;
    width: 79.89%;
  }
}
@media (max-width: 1199px) {
  .section3__row {
    width: 84.12%;
  }
}
@media (max-width: 991px) {
  .section3__row {
    width: 87.6%;
  }
}
@media (max-width: 767px) {
  .section3__row {
    width: 90.4%;
  }
}
@media (max-width: 575px) {
  .section3__row {
    width: 92.62%;
  }
}
@media (max-width: 479px) {
  .section3__row {
    width: 94.36%;
  }
}
@media (max-width: 383px) {
  .section3__row {
    width: 95.71%;
  }
}

.section3__row > .item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 334px;
}
@media (max-width: 1399px) {
  .section3__row > .item {
    flex: 0 0 100%;
  }
}

.section3__col {
  display: flex;
  flex-direction: column;
  position: relative;
  flex-grow: 1;
}

.section3__subtitle2 {
  font: 600 20px/1.1 "Montserrat", Helvetica, Arial, serif;
  color: white;
  letter-spacing: 0px;
  position: relative;
}
@media (max-width: 1199px) {
  .section3__subtitle2 {
    font-size: 16px;
    text-align: left;
  }
}

.section3__highlights3 {
  font: 400 16px/1.1 "Montserrat", Helvetica, Arial, serif;
  color: #df8e75;
  letter-spacing: 0px;
  position: relative;
  margin: 10px 0px 0px;
}
@media (max-width: 1199px) {
  .section3__highlights3 {
    font-size: 12px;
    text-align: left;
  }
}

.section3__highlights31 {
  font: 400 16px/1.1 "Montserrat", Helvetica, Arial, serif;
  color: #df8e75;
  letter-spacing: 0px;
  position: relative;
  min-height: 36px;
  margin: 10px 15px 0px 0px;
}
@media (max-width: 1199px) {
  .section3__highlights31 {
    font-size: 12px;
    text-align: left;
  }
}
@media (max-width: 991px) {
  .section3__highlights31 {
    margin: 10px 8px 0px 0px;
  }
}
@media (max-width: 383px) {
  .section3__highlights31 {
    margin: 10px 4px 0px 0px;
  }
}

.section3__subtitle21 {
  font: 600 20px/1.1 "Montserrat", Helvetica, Arial, serif;
  color: white;
  letter-spacing: 0px;
  position: relative;
  margin: 20px 0px 0px;
}
@media (max-width: 1199px) {
  .section3__subtitle21 {
    font-size: 16px;
    text-align: left;
  }
}

.section3__highlights32 {
  font: 400 16px/1.1 "Montserrat", Helvetica, Arial, serif;
  color: #df8e75;
  letter-spacing: 0px;
  width: 69.16%;
  position: relative;
  min-height: 36px;
  margin: 10px 30.84% 0px 0%;
}
@media (max-width: 1199px) {
  .section3__highlights32 {
    font-size: 12px;
    text-align: left;
  }
}

.section3__row > .spacer {
  flex: 0 1 71px;
}
@media (max-width: 1399px) {
  .section3__row > .spacer {
    display: none;
  }
}

.section3__row > .item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 793px;
}
@media (max-width: 1399px) {
  .section3__row > .item1 {
    flex: 0 0 100%;
  }
}

.section3__col1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex-grow: 1;
  margin: 0px 0px 190px;
}

.section3__highlights4 {
  font: 400 16px/1.1 "Montserrat", Helvetica, Arial, serif;
  color: white;
  letter-spacing: 0px;
  position: relative;
  min-height: 162px;
  margin: 20px 0px 0px;
}
@media (max-width: 1199px) {
  .section3__highlights4 {
    font-size: 12px;
    text-align: left;
  }
}

@media (min-width: 2450px) {
  .section3__subtitle2{
    font-size: 24px;
  }
  .section3__highlights3{
    font-size: 20px;
  }
  .section3__highlights4{
    font-size: 20px;
  }
}
</style>
