<template>
    <Header></Header>
  <div class="total_wrapper">
   <div class="breadcrumbs" style="margin-top: 50px">
      <a :href="route('home')" style="font-weight: 500; font-size: 12px; color: #878787"
        >Главная > </a
      ><a :href="route('photoalbum')" style="font-weight: 500; font-size: 12px; color: #878787"
        >Галерея Фото > </a
      >
      <a style="font-weight: 500; font-size: 12px; color: #ffffff" href="#"
        >{{photocollection.name}}</a
      >
    </div>
    <div class="wrapper__foto">
      <div class="wraperr__foto__img">
        <img :src="(help + photocollection.photo_cat)" alt="" />
        <p style="margin-top: 10px; text-align: left">{{photocollection.name}}</p>
        <article v-html="photocollection.content"></article>
      </div>
      <div class="wraperr__foto__btns">
        <a href="#ModalBuyPhoto" class="foto__btn__pay" style="display: block;">
          <p>Приобрести</p>
        </a>
         <div class="foto__type">
          <img src="@/assets/img/fail.svg" alt="" />
          <p>Тип файла: Jpg</p>
        </div>
      </div>
    </div>


    <section class="collection total_wrapper">
        <div class="wrapper_h2_arr">
          <h2>Другие фото альбома</h2>
        </div>
        <div class="carusel_line__nav carusel_line_collection__nav">
          <a class="album-more" :href="route('photoofalbumview', photocollection.id) " >Смотреть все</a>
          <div class="line__nav__left line_collection__nav__left line_category_nav__left">
            <img src="@/assets/img/arrow.svg" alt="" />
          </div>
          <div class="line__nav__right line_collection__nav__right line_category_nav__right">
            <img src="@/assets/img/arrow.svg" alt="" />
          </div>
        </div>
        <div class="wrapper__carusel wrapper__carusel__collection wrapper__carusel__category">
          <div class="carusel__line carusel_line_collection carusel_line_category">
            <div v-for="photo in photos">
                <a :href="route('photo', photo.id)"><div class="carusel__block">
                <img style="object-fit: contain;" :src="(help + photo.photo)" :alt="photo.name" />
              </div></a>
            </div>
          </div>
        </div>
      </section>

    <!-- <h2 style="margin-top: 35px">Другие фото альбома</h2>
    <div class="wrapper__other_foto">
      <div v-for="photo in photos" class="other_foto__elem">
        <a :href="route('photo', photo.id)">
          <img :src="(help + photo.photo)" :alt="photo.name" /></a>
      </div>
    </div> -->
  </div>

  <div id="ModalBuyPhoto" class="modal">
    <div class="modal-dialog">
     <form v-on:submit="submitForm">
         <div class="modal-content">
             <div class="modal-header">
                 <p class="modal-title">Оформление заказа фото</p>
                 <a href="#close" title="Close" class="close">×</a>
             </div>
             <div class="modal-body">
                 <div class="wrap-form-zakaz">
                     <div class="row-modal">
                         <label class="sub-label" for="">Валюта заказа</label>
                         <p class="type-value">Российские рубли</p>
                     </div>

                     <div class="row-modal">
                         <label for="">Покупатель</label>
                         <div class="wrap-column">
                             <label class="sub-label" for="">Имя</label>
                             <input class="form-input" type="text" v-model="name" placeholder="Константин Константинов"></div>
                     </div>
                     <div class="row-modal">
                         <label for=""></label>
                         <div class="wrap-column">
                             <label class="sub-label" for="">Телефон</label>
                             <input class="form-input phone"  type="text" id="phone" placeholder="+7 (111) 111-11-11"></div>
                     </div>

                     <div class="row-modal">
                         <label for=""></label>
                         <div class="wrap-column">
                             <label class="sub-label" for="">E-mail</label>
                             <input class="form-input" type="email" v-model="email" placeholder="username@mail.ru"></div>
                     </div>

                     <div class="wrap-user-soglasen" style="display: flex;">

                         <div><input type="checkbox" name="" id="agreedOFTerms"  ref="modalcheckbox"></div>
                         <label for="agreedOFTerms" style="margin-left: 10px;">Я ознакомлен и согласен с условиями <a :href="route('UridInfo')" target="_blank">пользовательского соглашения</a></label>
                     </div>

                     <p class="price-text">Цена по запросу</p>
                     <p class="price-sub-text">Мы пришлем вам расчет после обработки заказа</p>

                     <a :disabled="disabledButton" :href="createFragmentLink"><button type="submit"  style="margin-right: auto;
              margin-top: 20px;
              padding: 10px 30px;
              background: #df8e70; width: fit-content; margin-bottom: 10px;" class="btn__login__registr">
                         Оформить заказ
                     </button></a>
                 </div>
             </div>
         </div>
     </form>
    </div>
  </div>
    <div class='content'>
        <div class="alert alert-success alert-white rounded">
            <button type="button" class="toast-close" data-dismiss="alert" aria-hidden="true">×</button>
            <div class="icon"><i class="fa fa-check"></i></div>
            <strong>Успех!</strong> Данные формы успешно отправлены!
        </div>

    </div>
  <Footer></Footer>
</template>

<script>
import "@/assets/css/foto.css";
import "@/assets/css/index.css";


import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";
import help from "@/Components/helper-api";
export default {
  name: "photo-view",
  props:[
    'photos',
    'photocollection',
      'order'
    ],
  components: {
        Header,
        Footer,
    },
    data(){
        return {
          help: help,
            name: this.order.bayer_name,
            numder: this.order.bayer_phone,
            email: this.order.bayer_email,
        };
    },
     methods: {
      submitForm(e) {
      let formData = new FormData();
      formData.append('name', this.name);
      formData.append('numder', document.getElementById('phone').value);
      formData.append('email', this.email);
      formData.append('photo', this.photocollection.id);
      // console.log(this.name);
      // console.log(this.numder);
      // console.log(this.email);
      e.preventDefault();
        let url = '/orderes/photocolection';
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
           fetch(url, {
                   headers: {

                       "Accept": "application/json, text-plain, */*",
                       "X-Requested-With": "XMLHttpRequest",
                       "X-CSRF-TOKEN": token
                       },
                   method: 'POST',

                   body: formData,
               })
               .then((data) => {
                   const formAlert = document.querySelector('.alert-white')
                   const formAlertClose = document.querySelector('.toast-close')
                   formAlert.style.right = '13px';

                   formAlertClose.onclick = function() {
                    formAlert.style.right = '-50%';
                   }
                  //  location = location.origin + location.pathname;
               })
               .catch(function(error) {
                   console.log(error);
               });
    },

    movecarusel(step,block) {
        document.querySelector(block).scrollTo({
        left: step,
        top: 0,
        behavior: 'smooth'
        });
      }
    },
     mounted() {
      this.$refs.modalcheckbox.setCustomValidity('Подтвердите согласие с условиями!');

         document.getElementById('phone').value = this.order.bayer_phone;
      var phoneInput = document.querySelector('.phone')

phoneInput.onfocus = function(e) {
  e.target.setAttribute('placeholder', '+7 (111) 111-11-11')
}

phoneInput.addEventListener('focusout', function(e) {
  e.target.setAttribute('placeholder', '')
})

phoneInput.addEventListener('keydown', function(event) {
if( !(event.key == 'ArrowLeft' || event.key == 'ArrowRight' || event.key == 'Backspace' || event.key == 'Tab')) { event.preventDefault() }
var mask = '+7 (111) 111-11-11'; // Задаем маску

if (/[0-9\+\ \-\(\)]/.test(event.key)) {
  // Здесь начинаем сравнивать this.value и mask
  // к примеру опять же
  var currentString = this.value;
  var currentLength = currentString.length;
  if (/[0-9]/.test(event.key)) {
      if (mask[currentLength] == '1') {
          this.value = currentString + event.key;
      } else {
          for (var i=currentLength; i<mask.length; i++) {
          if (mask[i] == '1') {
              this.value = currentString + event.key;
              break;
          }
          currentString += mask[i];
          }
      }
  }
}
});



      let positionCollection = 0
      let positionTems = 0
      let positionCategory = 0
      let positionNews = 0

      let caruselStep = 305

      let categoryLength = (document.querySelector('.carusel_line_category').children.length - 3) * caruselStep

      document.querySelector('.line_category_nav__right').onclick = () => {
          positionCategory += caruselStep
          if (positionCategory > categoryLength) {
              positionCategory = categoryLength
          }
          console.log("Двигаю вправо");
          this.movecarusel(positionCategory,'.wrapper__carusel__category')
      }
      document.querySelector('.line_category_nav__left').onclick = () => {
          positionCategory -= caruselStep
          if (positionCategory < 0) {
              positionCategory = 0
          }
          console.log("Двигаю влево");
          this.movecarusel(positionCategory,'.wrapper__carusel__category')
      }
 }

};
</script>

<style scoped>
/* свойства модального окна по умолчанию */
.modal {
  position: fixed; /* фиксированное положение */
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(0,0,0,0.8); /* цвет фона */
  z-index: 1050;
  opacity: 0; /* по умолчанию модальное окно прозрачно */
  -webkit-transition: opacity 200ms ease-in;
  -moz-transition: opacity 200ms ease-in;
  transition: opacity 200ms ease-in; /* анимация перехода */
  pointer-events: none; /* элемент невидим для событий мыши */
  margin: 0;
  padding: 0;
}
/* при отображении модального окно */
.modal:target {
  opacity: 1; /* делаем окно видимым */
  pointer-events: auto; /* элемент видим для событий мыши */
  overflow-y: auto; /* добавляем прокрутку по y, когда элемент не помещается на страницу */
}
/* ширина модального окна и его отступы от экрана */
.modal-dialog {
  position: relative;
  width: auto;
  margin: 10px;
}
@media (min-width: 576px) {
.modal-dialog {
    max-width: 95%;
    width: 1000px;
    margin: 30px auto; /* для отображения модального окна по центру */
}
}
/* свойства для блока, содержащего контент модального окна */
.modal-content {
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  background-color: #333333;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  border: 1px solid rgba(0,0,0,.2);
  border-radius: .3rem;
  outline: 0;
}
@media (min-width: 768px) {
.modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0,0,0,.5);
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
}
}
/* свойства для заголовка модального окна */
.modal-header {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -ms-flex-pack: justify;
  justify-content: space-between;
  padding: 15px;
  border-bottom: 1px solid #eceeef;
}
.modal-title {
  margin-top: 0;
  margin-bottom: 0;
  font-weight: 600;
  font-size: 30px;
  line-height: 37px;
}
/* свойства для кнопки "Закрыть" */
.close {
  float: right;
  font-family: sans-serif;
  font-size: 24px;
  font-weight: 700;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  opacity: .5;
  text-decoration: none;
}
/* свойства для кнопки "Закрыть" при нахождении её в фокусе или наведении */
.close:focus, .close:hover {
  color: #000;
  text-decoration: none;
  cursor: pointer;
  opacity: .75;
}
/* свойства для блока, содержащего основное содержимое окна */
.modal-body {
position: relative;
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 auto;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 15px;
  overflow: auto;
}
.modal-zakaz-title{
  font-weight: 600;
  font-size: 30px;
  line-height: 37px;
  color: #fff;
  margin-bottom: 30px;
}
.wrap-checkboxes{
  display: flex!important;
  justify-content: flex-start!important;
  width: 100%;
}
.wrap-checkboxes > div{
  margin-right: 15px;
}
.wrap-user-soglasen{
  display: flex;
  justify-content: flex-end;
}
.row-modal{
  display: flex;
  flex-flow: row;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}
.row-modal > label{
  font-weight: 600;
  font-size: 18px;
  line-height: 22px;
  color: #fff;
  min-width: 270px;
}
.sub-label{
  font-weight: 500;
  font-size: 14px;
  line-height: 17px;
  color: #D9D9D9;
}
.type-value{
  width: 100%;
}
.wrap-column{
  display: flex;
  flex-flow: column;
}
.wrap-column > input{
  width: 700px;
  max-width: 87vw;
}
.price-text{
  font-weight: 600;
  font-size: 30px;
  line-height: 37px;
  margin-top: 30px;
  margin-bottom: 10px;
  color: #fff;
}
.form-input{
  background: #FFFFFF;
  border: 1px solid #555555;
  border-radius: 3px;
  color: #000;
  width: 100%;
}
.price-sub-text{
  font-weight: 500;
font-size: 18px;
line-height: 22px;
color: #fff;
}

@media (max-width: 768px){
  .row-modal{
    flex-flow: column;
    align-items: flex-start;
  }
  .row-modal > label{
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #d9d9d9;
    margin-bottom: 7px;
  }
  .row-modal > label{
    font-size: 14px;
    line-height: 17px;
  }
  .wrap-checkboxes{
    flex-flow: column;
  }
  .wrap-checkboxes > div{
    margin-bottom: 8px;
  }
  .btn__login__registr{
    width: 100%;
    text-align: center;
  }
  .price-text{
    text-align: center;
  }
  .price-sub-text{
    text-align: center;
  }
}
@media (min-width: 2450px){
  .row-modal > label{
    font-size: 24px;
    line-height: 30px;
  }
  .sub-label{
    font-size: 18px;
    line-height: 25px;
  }
  .wrap-column > input{
    font-size: 18px;
  }
  .type-value {
    font-size: 18px;
  }
  .wrap-user-soglasen > label{
    font-size: 18px;
  }
  .btn__login__registr{
    font-size: 25px;
  }
  .modal-header, .modal-body{
    padding: 30px;
  }
  .wrap-column > input{
    width: 720px;
  }
  .modal-dialog{
    width: 1050px;
  }
}


.content {
  padding:0;
}

.toast-close {
  float: right;
  font-size: 21px;
  font-weight: bold;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  opacity: .2;
}

.toast-close:hover,.toast-close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
  opacity: .5;
}

button.toast-close {
  padding: 0;
  cursor: pointer;
  background: transparent;
  border: 0;
  -webkit-appearance: none;
}

.alert {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
}

.alert h4 {
  margin-top: 0;
  color: inherit;
}

.alert .alert-link {
  font-weight: bold;
}

.alert>p,.alert>ul {
  margin-bottom: 0;
}

.alert>p+p {
  margin-top: 5px;
}

.alert-dismissable {
  padding-right: 35px;
}

.alert-dismissable .close {
  position: relative;
  top: -2px;
  right: -21px;
  color: inherit;
}

.alert-success {
  background-color: #dff0d8;
  border-color: #d6e9c6;
  color: #3c763d;
}

.alert-success hr {
  border-top-color: #c9e2b3;
}

.alert-success .alert-link {
  color: #2b542c;
}

.alert-info {
  background-color: #d9edf7;
  border-color: #bce8f1;
  color: #31708f;
}

.alert-info hr {
  border-top-color: #a6e1ec;
}

.alert-info .alert-link {
  color: #245269;
}

.alert-warning {
  background-color: #fcf8e3;
  border-color: #faebcc;
  color: #8a6d3b;
}

.alert-warning hr {
  border-top-color: #f7e1b5;
}

.alert-warning .alert-link {
  color: #66512c;
}

.alert-danger {
  background-color: #f2dede;
  border-color: #ebccd1;
  color: #a94442;
}

.alert-danger hr {
  border-top-color: #e4b9c0;
}

.alert-danger .alert-link {
  color: #843534;
}

.alert {
  border-radius: 0;
  -webkit-border-radius: 0;
  box-shadow: 0 1px 2px rgba(0,0,0,0.11);
}

.alert .sign {
  font-size: 20px;
  vertical-align: middle;
  margin-right: 5px;
  text-align: center;
  width: 25px;
  display: inline-block;
}

.alert-success {
  background-color: #dbf6d3;
  border-color: #aed4a5;
  color: #569745;
}

.alert-info {
  background-color: #d9edf7;
  border-color: #98cce6;
  color: #3a87ad;
}

.alert-warning {
  background-color: #fcf8e3;
  border-color: #f1daab;
  color: #c09853;
}

.alert-danger {
  background-color: #f2dede;
  border-color: #e0b1b8;
  color: #b94a48;
}

.alert-white {
  background-image: linear-gradient(to bottom,#FFFFFF,#F9F9F9);
  border-top-color: #d8d8d8;
  border-bottom-color: #bdbdbd;
  border-left-color: #cacaca;
  border-right-color: #cacaca;
  color: #404040;
  padding-left: 61px;
  position: relative;
  z-index: 10000;
}

.alert-white .icon {
  text-align: center;
  width: 45px;
  height: calc(100% + 2px);
  position: absolute;
  top: -1px;
  left: -1px;
  border: 1px solid #bdbdbd;
}

.alert-white .icon:after {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  display: block;
  content: '';
  width: 10px;
  height: 10px;
  border: 1px solid #bdbdbd;
  position: absolute;
  border-left: 0;
  border-bottom: 0;
  top: 50%;
  right: -6px;
  margin-top: -5px;
  background: #fff;
}

.alert-white.rounded {
  border-radius: 3px;
  -webkit-border-radius: 3px;
  max-width: 500px;
  width: 100%;
  position: fixed;
  right: -50%;
  bottom: 10px;
  transition: 0.5s;
}

.alert-white.rounded .icon {
  border-radius: 3px 0 0 3px;
  -webkit-border-radius: 3px 0 0 3px;
}

.alert-white .icon i {
  font-size: 20px;
  color: #FFF;
  left: 12px;
  margin-top: -10px;
  position: absolute;
  top: 50%;
}

.alert-white.alert-danger .icon,.alert-white.alert-danger .icon:after {
  border-color: #ca452e;
  background: #da4932;
}

.alert-white.alert-info .icon,.alert-white.alert-info .icon:after {
  border-color: #3a8ace;
  background: #4d90fd;
}

.alert-white.alert-warning .icon,.alert-white.alert-warning .icon:after {
  border-color: #d68000;
  background: #fc9700;
}

.alert-white.alert-success .icon,.alert-white.alert-success .icon:after {
  border-color: #54a754;
  background: #60c060;
}

</style>

