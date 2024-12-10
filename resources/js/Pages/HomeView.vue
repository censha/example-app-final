<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

// export default {
//     data(){
//         return {photos:[]}
//     }
// }

</script>
<template>
    <Header></Header>
  <div class="home">
    <header>
      <h1><strong>Видеоархив</strong><br />Пермского края</h1>
      <div class="wrapper_header_search">
        <!-- <input
          type="text"
          class="text_search"
          placeholder="Поиск по архиву..."
          v-model="search"
          @input="changeSearch"
        /> -->
<!--        <input-->
<!--          type="text"-->
<!--          class="text_search"-->
<!--          placeholder="Поиск по архиву..."-->

<!--        />-->
<!--        <a :href="route('kinoarchive')" class="btn_header_search">-->
<!--          <p>Найти</p>-->
<!--          <img src="@/assets/img/search_black.svg" alt="" />-->
<!--        </a>-->
          <form style="width: 100%; display: flex;" method="post" :action="route('searchdata')">
              <input
                  type="text"
                  placeholder="Поиск по архиву..."
                  name="searched"
              />
              <input type="hidden" name="_token" :value="csrf">
              <div class="select" tabindex="1">
                  <input class="selectopt" name="cat" value="video" type="radio" id="opt1" checked>
                  <label for="opt1" class="option">Видео</label>
                  <input class="selectopt" name="cat" value="photo" type="radio" id="opt2">
                  <label for="opt2" class="option">Фото</label>
                  <input class="selectopt" name="cat" value="news" type="radio" id="opt3">
                  <label for="opt3" class="option">Новости</label>
              </div>
              <div class="btn_header_search">
                  <button >Найти</button>
                  <img src="@/assets/img/search_black.svg" alt="" />
              </div>
          </form>

      </div>
      <a class="link-mobile-header" href="/kinoarchive">Видеоархив</a>
      <a class="link-mobile-header" href="/photoalbum">Фото</a>
    </header>

    <div class="total_wrapper">
      <section>
        <h2>УНИКАЛЬНАЯ КОЛЛЕКЦИЯ КИНОХРОНИКИ</h2>
        <article class="sub_title_h2">
          Огромная оцифрованная коллекция фильмов и хроники о Пермском крае
        </article>
        <div class="wrapper-block__links">
          <div class="block__links">
            <div class="wrapper__img">
              <img src="@/assets/img/block1.png" alt="" />
            </div>
            <p>Кинохроника</p>
            <article>
              Крупнейший на Урале архив оцифрованных кинофильмов и кинохроники
            </article>
            <a :href="route('kinoarchive')">Подробнее <strong>&#8250;</strong></a>
          </div>
          <div class="block__links">
            <div class="wrapper__img">
              <img src="@/assets/img/block2.png" alt="" />
            </div>
            <p>Фотоархив</p>
            <article>
              Мы работаем над наполнением раздела «Фотоархив». Приглашаем
              авторов фотографий размещать свои материалы.
            </article>
            <a :href="route('photoalbum')">Подробнее <strong>&#8250;</strong></a>
          </div>
          <div class="block__links">
            <div class="wrapper__img">
              <img src="@/assets/img/block3.png" alt="" />
            </div>
            <p>Видео</p>
            <article>
              Тысячи видеофайлов, снятых на Территории Пермского края
            </article>
            <a :href="route('kinoarchive')">Подробнее <strong>&#8250;</strong></a>
          </div>
          <div class="block__links">
            <div class="wrapper__img">
              <img src="@/assets/img/block4.png" alt="" />
            </div>
            <p>Любительские съемки</p>
            <article>
              Живые архивы, созданные кинолюбителями или неизвестными
              профессионалами
            </article>
            <a :href="route('kinoarchive')">Подробнее <strong>&#8250;</strong></a>
          </div>
        </div>
      </section>

      <section class="collection">
        <h3><a :href="route('kinoarchive')">Видеоархив</a> </h3>
        <a :href="route('kinoarchive')" class="wrapper_h2_arr">
          <h2>Коллекции</h2>
          <img src="@/assets/img/arrow.svg" alt="" />
        </a>
        <div class="carusel_line__nav carusel_line_collection__nav">
          <a class="line__nav__left line_collection__nav__left">
            <img src="@/assets/img/arrow.svg" alt="" />
          </a>
          <a class="line__nav__right line_collection__nav__right">
            <img src="@/assets/img/arrow.svg" alt="" />
          </a>
        </div>
        <div class="wrapper__carusel wrapper__carusel__collection">
          <div class="carusel__line carusel_line_collection">
            <div v-for="kino in kinos">
                <a :href="route('filter') + '?video_collection=' + kino.id"><div class="carusel__block">
                <img :src="help + kino.photo" :alt="kino.name" />
                <div class="carusel__block__name">
                  <p>
                    {{kino.name}}
                  </p>
                </div>
              </div></a>
            </div>
          </div>
        </div>
      </section>

      <section class="temps">
        <a :href="route('kinoarchive')" class="wrapper_h2_arr">
          <h2>Темы</h2>
          <img src="@/assets/img/arrow.svg" alt="" />
        </a>
        <div class="carusel_line__nav carusel_line_temps__nav">
          <a class="line__nav__left line_temps__nav__left">
            <img src="@/assets/img/arrow.svg" alt="" />
          </a>
          <a class="line__nav__right line_temps__nav__right">
            <img src="@/assets/img/arrow.svg" alt="" />
          </a>
        </div>
        <div class="wrapper__carusel wrapper__carusel__temps">
          <div class="carusel__line carusel_line_temps">

            <div v-for="theme in themes">
                <a :href="route('filter') + '?tems=' + theme.id"
              ><div class="carusel__block">
                <img :src="help + theme.photo" :alt="theme.name" />
                <div class="carusel__block__name">
                  <p>{{theme.name}}</p>
                </div>
              </div></a
            >
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="black_block">
      <div class="total_wrapper">
        <section class="category" style="margin: 0">
          <h3><a :href="route('photoalbum')">Фотоархив</a> </h3>
          <a :href="route('photoalbum')" class="wrapper_h2_arr">
            <h2>Рубрики</h2>
            <img src="@/assets/img/arrow.svg" alt="" />
          </a>
          <div class="carusel_line__nav carusel_line_category__nav">
            <a class="line__nav__left line_category_nav__left">
              <img src="@/assets/img/arrow.svg" alt="" />
            </a>
            <a class="line__nav__right line_category_nav__right">
              <img src="@/assets/img/arrow.svg" alt="" />
            </a>
          </div>
          <div class="wrapper__carusel wrapper__carusel__category">
            <div class="carusel__line carusel_line_category">
                <div v-for="photo in photocollections">
            <a :href="route('photoalbums', photo.id)"
              ><div class="carusel__block">
                <img :src="(help + photo.photo_cat)" alt="" />
                <div class="carusel__block__name">
                  <p> {{photo.name}}</p>

                </div>
              </div></a
            >
            </div>

            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="total_wrapper">
      <section class="news" style="margin-bottom: 20px; position: relative;">
        <h3><a :href="route('blodnews')">новостной раздел</a> </h3>
          <a :href="route('blodnews')" class="wrapper_h2_arr">
            <h2>Новости</h2>
            <img src="@/assets/img/arrow.svg" alt="" />
          </a>
          <div class="carusel_line__nav carusel_line_category__nav">
            <a class="line__nav__left line_news_nav__left">
              <img src="@/assets/img/arrow.svg" alt="" />
            </a>
            <a class="line__nav__right line_news_nav__right">
              <img src="@/assets/img/arrow.svg" alt="" />
            </a>
          </div>



               <div class="wrapper__carusel wrapper__carusel__news" style="min-height: 420px;">
            <div class="carusel__line carusel_line_news">
          <div v-for="newss in news" class="block__news">
            <a :href="route('news', newss.id)" ><div class="wrapper_block__news"></div>
            <div class="block__news__img">
                <img :src="(help + newss.photo_news)" :alt="newss.name" />
            </div>
            <div class="block__news__title">
              <p v-html="newss.name"></p>
              <article>
                {{newss.title}}
              </article>
            </div></a>

          </div>


          </div> </div>



      </section>

      <section>
        <h3>с кем мы сотрудничаем</h3>
        <h2>Наши спонсоры и партнеры</h2>
        <div class="wrapper_logo_sponsor">
          <div class="logo_sponsor__block logo_sponsor__block__border">
            <img src="@/assets/img/sponsor1.png" alt="" />
            <p>
              Министерство культуры<br />
              Пермского края
            </p>
          </div>
          <div class="logo_sponsor__block logo_sponsor__block__border">
            <img src="@/assets/img/sponsor2.png" alt="" />
            <p>Киностудия «Новый курс»</p>
          </div>
          <div class="logo_sponsor__block logo_sponsor__block__border">
            <img src="@/assets/img/sponsor3.png" alt="" />
            <p>Проект «Триста лет перми»</p>
          </div>
          <div class="logo_sponsor__block">
            <img src="@/assets/img/sponsor4.png" alt="" />
            <p>
              Организация культуры<br />
              ГКБУК «Пермская синематека»
            </p>
          </div>
        </div>
      </section>
    </div>
  </div>
  <Footer></Footer>
</template>

<style scoped>
.select {
    font-family: Montserrat;
display:flex;
flex-direction: column;
position:relative;
width:250px;
height:100%;
    border-left: 1px solid #000;
}

.option {
    font-family: Montserrat;
padding:0 30px 0 10px;
min-height:40px;
display:flex;
align-items:center;
background: #fff;
color: #000;
    border-top: #e7e7e7 solid 1px;
position:absolute;
top:0;
width: 100%;
pointer-events:none;
order:2;
z-index:1;
transition:background .4s ease-in-out;
box-sizing:border-box;
overflow:hidden;
white-space:nowrap;
    font-size: 1rem;
}

.select:focus .option {
position:relative;
pointer-events:all;
}

.selectopt {
    font-family: Montserrat;
opacity:0;
position:absolute;
left:-99999px;
}

.selectopt:checked + label {
    font-family: Montserrat;
order: 1;
z-index:2;
background:#fff;
border-top:none;
position:relative;
height: 100%;
    color: #000;
}

.selectopt:checked + label:after {
content:'';
width: 0;
height: 0;
    border-left: 5px solid #fff;
    border-right: 5px solid #fff;
    border-top: 5px solid #000;
position:absolute;
right:10px;
top:calc(50% - 2.5px);
pointer-events:none;
z-index:3;
}

.selectopt:checked + label:before {
    font-family: Montserrat;
position:absolute;
right:0;
height: 40px;
width: 40px;
content: '';
    color: #000;
background:#fff;
}
</style>

<script>
import "@/assets/css/index.css";
// import "@/assets/js/index.js";
import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";
import help from "@/Components/helper-api";

//console.log(help);
export default {
  name: "HomeView",
  name: "Login-component",
    name: "App",

    props:[
    'photos',
    'photocollections',
    'news',
    'kinos',
    'themes',
    ],
    components: {
        Header,
        Footer,
    },
    data(){
        return {
          help: help,
          search: localStorage.getItem('search') || '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },


  methods: {
    changeSearch(){
      localStorage.setItem('search', this.search);
    },
    movecarusel(step, block) {
      document.querySelector(block).scrollTo({
        left: step,
        top: 0,
        behavior: "smooth",
      });
    },
  },

  mounted() {
    let positionCollection = 0;
    let positionTems = 0;
    let positionCategory = 0;
    let positionNews = 0;

    let caruselStep = 305;

    let collectionLength =
      (document.querySelector(".carusel_line_collection").children.length - 3) *
      caruselStep;
    let temsLength =
      (document.querySelector(".carusel_line_temps").children.length - 3) *
      caruselStep;
    let categoryLength =
      (document.querySelector(".carusel_line_category").children.length - 3) *
      caruselStep;
    let newsLength =
      (document.querySelector(".carusel_line_news").children.length - 3) *
      caruselStep;




    document.querySelector(".line_collection__nav__right").onclick = () => {
      positionCollection += caruselStep;
      if (positionCollection > collectionLength) {
        positionCollection = collectionLength;
      }
      this.movecarusel(positionCollection, ".wrapper__carusel__collection");
    };
    document.querySelector(".line_collection__nav__left").onclick = () => {
      positionCollection -= caruselStep;
      if (positionCollection < 0) {
        positionCollection = 0;
      }
      this.movecarusel(positionCollection, ".wrapper__carusel__collection");
    };



    document.querySelector(".line_temps__nav__right").onclick = () => {
      positionTems += caruselStep;
      if (positionTems > temsLength) {
        positionTems = temsLength;
      }
      this.movecarusel(positionTems, ".wrapper__carusel__temps");
    };
    document.querySelector(".line_temps__nav__left").onclick = () => {
      positionTems -= caruselStep;
      if (positionTems < 0) {
        positionTems = 0;
      }
      this.movecarusel(positionTems, ".wrapper__carusel__temps");
    };

    document.querySelector(".line_category_nav__right").onclick = () => {
      positionCategory += caruselStep;
      if (positionCategory > categoryLength) {
        positionCategory = categoryLength;
      }
      this.movecarusel(positionCategory, ".wrapper__carusel__category");
    };
    document.querySelector(".line_category_nav__left").onclick = () => {
      positionCategory -= caruselStep;
      if (positionCategory < 0) {
        positionCategory = 0;
      }
      this.movecarusel(positionCategory, ".wrapper__carusel__category");
    };

    document.querySelector(".line_news_nav__right").onclick = () => {
      positionNews += caruselStep;
      if (positionNews > newsLength) {
        positionNews = newsLength;
      }
      console.log('Длина новостей - ' + newsLength);
      console.log('Позиция новостей - ' + newsLength);

      this.movecarusel(positionNews, ".wrapper__carusel__news");
    };
    document.querySelector(".line_news_nav__left").onclick = () => {
      positionNews -= caruselStep;
      if (positionNews < 0) {
        positionNews = 0;
      }
      this.movecarusel(positionNews, ".wrapper__carusel__news");
    };
  },
};
</script>
