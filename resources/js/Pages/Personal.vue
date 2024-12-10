<template>

  <div>
      <Header></Header>
      <main class="total_wrapper" style="margin-top: 50px">
      <div class="breadcrumbs" style="margin-bottom: 30px">
        <a style="font-weight: 500; font-size: 12px; color: #878787" href="/"
          >Главная > </a
        ><a style="font-weight: 500; font-size: 12px; color: #ffffff" href="#"
          >Личный кабинет> </a
        >
          <a style="font-weight: 500; font-size: 12px; color: #ffffff; cursor: pointer;" @click="moveBack"
          >Назад</a
          >
      </div>

      <div class="row" style="display: flex">
        <div class="col-md-2">
          <p class="name_profile mobile-block">{{user.first_name}} {{user.last_name}}</p>

          <div class="img-profile-wrap">
<!--              <div v-if="user.photo">-->
<!--                  <img class="profile_img" :src="user.photo" alt="" />-->
<!--              </div>-->
<!--              <div v-else>-->
<!--                  <img class="profile_img" src="" alt="" />-->
<!--              </div>-->
              <img class="profile_img" :src="user.photo" alt="" />

            <a href="#openModal" class="profile_edit_btn">Редактировать профиль</a>
            <!-- <form @submit="submitForm" enctype="multipart/form-data">
              <input type="file" name="filename"   id="inputFileUpload" accept="image/jpeg, image/gif, image/png" v-on:change="onFileChange"/>
               <button style="display: block; margin: 0 auto;" class="btn__login__registr" :disabled="form.processing">
                Сохранить фото
              </button>
              <input type="submit" class="btn btn-primary" value="Сохранить фото">
            </form> -->
          </div>
        </div>
        <div class="col-md-6" style="margin-left: 30px">
          <p class="name_profile mobile-none">{{user.first_name}}<br />{{user.last_name}}</p>
          <p class="about_profile mobile-none">{{user.info}}</p>
        </div>
      </div>

      <p class="about_profile mobile-block"></p>


      <div class="tabs">
        <!-- <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked />
        <label for="tab-btn-1">Коллекции</label> -->
        <input type="radio" name="tab-btn" id="tab-btn-2" value="" />
        <label for="tab-btn-2">Заказы</label>

        <input type="radio" name="tab-btn" id="tab-btn-4" value="" />
        <label for="tab-btn-4">Обратная связь</label>
        <div id="content-1">
          <div class="wrapper__carusel wrapper__carusel__collection">
            <div class="carusel__line carusel_line_collection">
              <a href="#" class=""
                ><div class="carusel__block">
                  <img src="@/assets/foto/foto0013.jpg" alt="" />
                  <div class="carusel__block__name">
                    <p>
                      «Новый курс», первая негосударственная киностудия Пермского
                      края
                    </p>
                  </div>
                </div></a
              ><a href="#" class=""
                ><div class="carusel__block">
                  <img src="@/assets/foto/foto0014.jpg" alt="" />
                  <div class="carusel__block__name">
                    <p>Павел Печёнкин: тогда и сейчас</p>
                  </div>
                </div></a
              ><a href="#" class=""
                ><div class="carusel__block">
                  <img src="@/assets/foto/foto0015.jpg" alt="" />
                  <div class="carusel__block__name">
                    <p>Пермское игровое кино</p>
                  </div>
                </div></a
              >

            </div>
          </div>
        </div>
        <div id="content-2" style="overflow-x: auto">
          <table stripped style="width: 100%; margin-top: 20px;">
            <tr>
              <th style="padding: 15px 15px; text-align: left;">Заказ</th>
              <th style="padding: 15px 15px; text-align: left;">Наименование</th>
              <th style="padding: 15px 15px; text-align: left;">Описание</th>
              <th style="padding: 15px 15px; text-align: left;">Дата создания</th>
              <th style="padding: 15px 15px; text-align: left;"></th>
            </tr>
            <tr class="order-user-tr" v-for="film in orders">
              <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">{{film.id}}</td>
              <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">{{film.video_name}}</td>
              <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">
                {{film.comment}}
              </td>
              <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">{{(new Date(film.created_at)).toLocaleString()}}</td>
                <td style="padding: 10px 15px" >
                    <a v-if="film.answer" download="" :href="film.segment_film" style="
                    background: #df8e75;
                    box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.15);
                    border-radius: 3px;
                    font-weight: 600;
                    font-size: 12px;
                    text-align: center;
                    padding: 6px 25px;
                    color: #18181a;
                    width: 100%;
                    display: block;
                  ">Скачать</a>
                    <a v-else style="
                    background: #ccc;
                    box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.15);
                    border-radius: 3px;
                    font-weight: 600;
                    font-size: 12px;
                    opacity: 0.8;
                    text-align: center;
                    padding: 6px 25px;
                    color: #18181a;
                    width: 100%;
                    display: block;
                  ">Скачать</a>
                </td>
            </tr>
              <tr class="order-user-tr" v-for="film in order_photoalbum">
                  <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">{{film.id}}</td>
                  <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">{{film.name}}</td>
                  <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">
                      Фотоальбом
                  </td>
                  <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">{{(new Date(film.created_at)).toLocaleString()}}</td>
                  <td style="padding: 10px 15px" >
                      <a v-if="film.answer" download="" :href="help + film.photo" style="
                    background: #df8e75;
                    box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.15);
                    border-radius: 3px;
                    font-weight: 600;
                    font-size: 12px;
                    text-align: center;
                    padding: 6px 25px;
                    color: #18181a;
                    width: 100%;
                    display: block;
                  ">Скачать</a>
                      <a v-else style="
                    background: #ccc;
                    box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.15);
                    border-radius: 3px;
                    font-weight: 600;
                    font-size: 12px;
                    opacity: 0.8;
                    text-align: center;
                    padding: 6px 25px;
                    color: #18181a;
                    width: 100%;
                    display: block;
                  ">Скачать</a>
                  </td>
              </tr>
              <tr class="order-user-tr" v-for="film in order_photo">
                  <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">{{film.id}}</td>
                  <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">{{film.name}}</td>
                  <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">
                      Фото
                  </td>
                  <td style="padding: 10px 15px; border-right: 1px solid #4A4A4D;">{{(new Date(film.created_at)).toLocaleString()}}</td>
                  <td style="padding: 10px 15px" >
                      <a v-if="film.answer" download="" :href="help + film.photo" style="
                    background: #df8e75;
                    box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.15);
                    border-radius: 3px;
                    font-weight: 600;
                    font-size: 12px;
                    text-align: center;
                    padding: 6px 25px;
                    color: #18181a;
                    width: 100%;
                    display: block;
                  ">Скачать</a>
                      <a v-else style="
                    background: #ccc;
                    box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.15);
                    border-radius: 3px;
                    font-weight: 600;
                    font-size: 12px;
                    opacity: 0.8;
                    text-align: center;
                    padding: 6px 25px;
                    color: #18181a;
                    width: 100%;
                    display: block;
                  ">Скачать</a>
                  </td>
              </tr>
          </table>
        </div>

        <div id="content-4">

        <div class="wrap-profile-contacts">
          <form @submit="submitFeedback" class="wrap-form-zakaz">
            <p class="header-contact-personal">Обратная связь</p>

            <div class="row-inputs">
              <input id="nameOfCompany" style="margin-right: 30px;" type="text" v-model="nameCompany" placeholder="Наименование компании / ИП">
              <input id="phone" class="phone" type="text" placeholder="+7 (111) 111-11-11">
            </div>
            <div class="row-inputs">
              <input id="nameOfUser" style="margin-right: 30px;" type="text" v-model="fullName" placeholder="Имя">
              <input id="emailOfUser" type="email"  v-model="email" placeholder="E-mail">
            </div>
            <textarea class="message-area" id="messageFromUser" v-model="content" placeholder="Сообщение"></textarea>

            <p style="margin-top: 20px;избранн">Отправляя заявку, вы соглашаетесь с обработкой персональных данных
              в соответствии с <a style="color: blue" :href="route('UridInfo')" target="_blank">пользовательского соглашения</a></p>

            <button class="button-send-message">Отправить заявку</button>
          </form>

        </div>

        </div>
      </div>
    </main>


    <div id="openModal" class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <p class="modal-title">Редактирование профиля</p>
            <a href="#close" title="Close" class="close">×</a>
          </div>
          <div class="modal-body">
            <form  @submit="submitForm" class="wrap-form-zakaz">
              <div class="row-modal" style="justify-content: flex-start;">
                <label for="">Фото</label>
                <div class="">
                  <div class="img-profile-wrap" style="margin-right: auto;">

                    <!-- <img class="profile_img" :src="user.photo" alt="" /> -->
                    <!-- <form @submit="submitForm" enctype="multipart/form-data">
                      <input type="file" name="filename"   id="inputFileUpload" accept="image/jpeg, image/gif, image/png" v-on:change="onFileChange"/>
                       <button style="display: block; margin: 0 auto;" class="btn__login__registr" :disabled="form.processing">
                        Сохранить фото
                      </button>
                      <input type="submit" class="btn btn-primary" value="Сохранить фото">
                    </form> -->
                    <input type="file" accept=".png,.jpeg,.jpg,.bmp" class="form-input"  placeholder="Ваше имя" name="file" id="file" v-on:change="onFileChange"  >
                    <button>Редактировать фото</button>
                  </div>
                </div>
              </div>
              <div class="row-modal">
                <label for="">Имя</label>
              <input type="text" class="form-input" v-model="user.first_name" placeholder="Ваше имя">
              </div>

              <div class="row-modal">

                  <label class="sub-label" for="">Фамилия</label>
                  <input class="form-input" type="text" v-model="user.last_name" placeholder="Ваша фамилия">
                </div>


              <div class="row-modal" style="margin-top: 25px;">
                <label for="">О себе</label>
                <textarea class="form-input" placeholder="Расскажите немного о себе"
                v-model="user.info" cols="30" rows="3"></textarea>
              </div>

              <a href="#"><button style="margin-right: auto;
                margin-top: 20px;
                padding: 10px 30px;
                background: #df8e70; width: 100%; text-align: center; margin-bottom: 10px;" class="btn__login__registr">
                Редактировать профиль
              </button></a>
            </form>
<!--              <a :href="route('destroy')"><button style="margin-right: auto;-->
<!--                margin-top: 20px;-->
<!--                padding: 10px 30px;-->
<!--                background: #df8e70; width: 100%; text-align: center; margin-bottom: 10px;" class="btn__login__registr">-->
<!--                  Удалить профиль-->
<!--              </button></a>-->
          </div>
        </div>
      </div>
    </div>


      <Footer></Footer>
  </div>


  </template>

  <script>

  import Header from "@/Layouts/Header.vue";
  import Footer from "@/Layouts/Footer.vue";
  import help from "@/Components/helper-api";
  import VueMeta from 'vue-meta'
  //import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

  // const submit = () => {
  //     form.post(route('upload_photo',{
  //         onFinish: () => form,
  //     }))
  // };
  // const form = useForm({
  //     photoname: '',
  //     photo: '',
  //     terms: false,
  // });

  export default {
    name: "personal-view",

    metaInfo: {
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' }
    ]
  },

    components: {
          Header,
          Footer,
      },
      metaInfo: {
      title: 'Default App Title',
    },
      props:[
      'user',
      'orders',
      'info',
      'order_photoalbum',
      'order_photo'
      ],
      data() {
        return {
            first_name: '',
            last_name: '',
            photoname: '',
            photo: '',
            info: '',
            success: '',
            nameCompany: '',
            numder: '',
            fullName: '',
            email: '',
            content: '',

        };
      },
      mounted() {

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

        console.log('order', this.orders, 'e', this.info);

        document.addEventListener("DOMContentLoaded", function(){
          var scrollbar = document.body.clientWidth - window.innerWidth + 'px';
          console.log(scrollbar);
          document.querySelector('[href="#openModal"]').addEventListener('click',function(){
            document.body.style.overflow = 'hidden';
            document.querySelector('#openModal').style.marginLeft = scrollbar;
          });
          document.querySelector('[href="#close"]').addEventListener('click',function(){
            document.body.style.overflow = 'visible';
            document.querySelector('#openModal').style.marginLeft = '0px';
          });
        });
      },
      methods: {
          onFileChange(e) {
          console.log(e.target.files[0]);
          this.photoname = "Selected File: " + e.target.files[0].name;
          this.photo = e.target.files[0];
      },
        moveBack() {
            history.back();
        }  ,
      submitForm(e) {
        let formData = new FormData();
        formData.append('first_name', this.user.first_name);
        formData.append('last_name', this.user.last_name);
        formData.append('photo', this.photo);
        formData.append('info', this.user.info);
        e.preventDefault();
          let url = '/update/photo';
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

                     location = location.origin + location.pathname;
                 })
                 .catch(function(error) {
                     console.log(error);
                 });
        },
        submitFeedback(e){
          let formData = new FormData();
          formData.append('name_company', this.nameCompany);
          formData.append('name_user', this.fullName);
          formData.append('email', this.email);

          formData.append('numder', document.getElementById('phone').value);
          formData.append('content', this.content);
          formData.append('user_id', this.user.id);
            e.preventDefault();
            let url = '/personal/callback';
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
                // .then((data) => {
                //     location = location.origin + location.pathname;
                // })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
  };
  </script>

  <style scoped>

  .header-contact-personal{
    font-style: normal;
    font-weight: 600;
    font-size: 30px;
    line-height: 37px;
    margin-bottom: 30px;
  }
  .row-inputs{
    display: flex;
    flex-flow: wrap;
  }
  .row-inputs > input{
    background: #FFFFFF;
    border: 1px solid #555555;
    border-radius: 3px;
    padding: 5px 10px;
    width: 360px;
    margin-bottom: 15px;
  }
  .wrap-profile-contacts{
    width: 750px;
    max-width: 100%;
  }
  .message-area{
    background: #FFFFFF;
  border: 1px solid #555555;
  border-radius: 3px;
  width: 100%;
  color: #000;
  }

  .button-send-message{
    background: #DF8E75;
  box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.25);
  border-radius: 3px;
  padding: 15px 55px;
  color: #18181A;
  font-weight: 600;
  font-size: 18px;
  line-height: 22px;
  /* identical to box height */

  text-align: center;
  margin-top: 25px;
  }

  /* свойства модального окна по умолчанию */
  .modal {
    position: fixed; /* фиксированное положение */
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0,0,0,0.5); /* цвет фона */
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
      width: 600px;
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
    min-width: 150px;
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


  .tabs {
    font-size: 0;
    margin-top: 30px;
  }

  .tabs > input[type="radio"] {
    display: none;
  }

  .tabs > div {
    /* скрыть контент по умолчанию */
    display: none;
    /* border: 1px solid #e0e0e0; */
    padding: 20px 0px;
    font-size: 16px;
  }

  /* отобразить контент, связанный с вабранной радиокнопкой (input type="radio") */
  #tab-btn-1:checked ~ #content-1,
  #tab-btn-2:checked ~ #content-2,
  #tab-btn-3:checked ~ #content-3,
  #tab-btn-4:checked ~ #content-4 {
    display: block;
  }

  .tabs > label {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    background-color: transparent;
    padding-bottom: 10px;
    margin-right: 100px;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out;
    cursor: pointer;
    position: relative;
    top: 1px;
    border-bottom: 3px solid transparent;

    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
    color: #f3f3f4;
  }

  .tabs > label:not(:first-of-type) {
    border-left: none;
  }

  .tabs > input[type="radio"]:checked + label {
    background-color: transparent;
    color: #df8e75;
    border-bottom: 3px solid #df8e75;
  }
  .name_profile {
    font-family: "Montserrat";
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 24px;
    color: #ffffff;
  }
  .about_profile {
    font-family: "Montserrat";
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 20px;
    color: #ffffff;
    margin-top: 20px;
  }
  .profile_edit_btn {
    background: #d9d9d9;
    box-shadow: 0px 4px 13px rgba(0, 0, 0, 0.25);
    border-radius: 3px;
    font-weight: 600;
    font-size: 10px;
    line-height: 12px;
    text-align: center;
    color: #4a4a4d;
    padding: 6px 12px;
    margin-top: 10px;
  }

  .profile_img {
    background: #d9d9d9;
    border-radius: 6px;
    max-width: 170px;
  }
  .img-profile-wrap {
    background: #3e3e3e;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 6px;
    padding: 10px;
    display: flex;
    flex-flow: column;
  }
  .wrapper__carusel {
    border-top: none;
  }
  .add-carusel-block {
    height: 100%;
    width: 285px;
    background: #2c2c30;
    border: 1px dashed #d9d9d9;
    display: flex;
    flex-flow: column;
    align-items: center;
    justify-content: center;
  }
  @media (max-width: 768px) {
    .breadcrumbs{
      margin-top: 80px!important;
    }
    .tabs > input[type="radio"]:checked + label {
      border-bottom: 3px solid transparent;
    }
  }

  @media (min-width: 2450px){
    .tabs > label {
      font-size: 24px;
      line-height: 28px;
  }
  #content-2 > table > tr{
      font-size: 22px;
  }
  #content-2 > table > tr > td > button{
      font-size: 20px!important;
  }
  #content-2 > table > tr > td{
      margin:auto;
  }
  .name_profile{
      font-size: 26px;
      line-height: 30px;
  }
  .profile_img{
      max-width: 270px;
  }
  .profile_edit_btn{
      font-size: 18px;
      line-height: 24px;
  }
  }

  .order-user-tr:nth-child(2n){
    background: #363636;
  }
  .order-user-tr:nth-child(2n+1){
    background: #2E2E2E;
  }

  </style>


  <style scoped src="@/assets/css/index.css"></style>
