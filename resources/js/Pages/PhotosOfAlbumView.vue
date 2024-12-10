<template>
    <Header></Header>
    <main class="photoo main">

    <div class="item">

    <div class="total_wrapper">


        <div class="breadcrumbs" style="margin-top: 0px">
        <a :href="route('home')" style="font-weight: 500; font-size: 12px; color: #878787"
          >Главная > </a
        >
        <a :href="route('photoalbum')" style="font-weight: 500; font-size: 12px; color: #878787"
          >Главная фото > </a
        >
        <a style="font-weight: 500; font-size: 12px; color: #ffffff" href="#"
          >Фото альбома</a
        >
      </div>

    </div>


      <!-- ======= section2 ======= -->
      <section class="section2__section2">
        <h1 class="section2__hero_title" style="width: 500px;">Фото альбома</h1>
      </section>
      <!-- ======= End section2 ======= -->
    </div>
    <div class="item">
      <!-- ======= section3 ======= -->
      <section class="section3__section3">
        <div class="section3__wrapper1">
          <!-- <input
            style="width: 100%;"
            type="text"
            class="text_search"
            v-model="search"
            @input="changeSearch"
            placeholder="Поиск по архиву..."
            data-v-9ea40744=""
          /> -->
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
          <!-- <div class="section3__content_box">
            <h5 class="section3__highlights2">Найти</h5>
            <div class="item">
              <img
                class="section3__icon4"
                src="../assets/img/assets/6a4fe2bdb7e4b66e55ea8752612d69c0.png"
                alt="alt text"
              />
            </div>
          </div>-->
        </div>


      </section>
      <!-- ======= End section3 ======= -->
    </div>

    <div class="item">
      <!-- ======= section4 ======= -->
      <section class="section4__section4 total_wrapper">

          <div class="section4__row">
            <div class="item">
              <h2 class="section4__title"></h2>
            </div>
            <div class="spacer">
            </div>
            <p class="section4__title" style="text-align: right;">Всего найдено: {{photos.total}}</p>
            <!-- <div class="item1">
              <div class="section4__wrapper7">
                <a href="#" class="section4__highlights5">Все альбомы</a>
              </div>
            </div> -->
          </div>
          <div class="section4__col1">
            <div class="section4__row1">
              <div v-for="photo in photossByTitle" class="item">
                <a :href="route('photo', photo.id)" class="section4__wrapper5">
                  <img
                    class="section4__wrapper6"
                    :src="help + photo.photo"
                  />
                  <div class="section4__info2">{{photo.name}}</div>
                </a>
              </div>
            </div>


        </div>
      </section>
      <!-- ======= End section4 ======= -->

    </div>
    <div class="pagination-wrap">
          <a :href="photos.first_page_url" class="item pagination_strelka">
            <img
              class=""
              :class="{ disabledShit: !photos.links[0].url }"
              style="transform: rotate(180deg)"
              src="../assets/img/assets/8253bdda278388ee236f678e6c766cd4.png"
              alt="alt text"
            />
          </a>
          <a :href="photos.links[0].url" class="item1 pagination_strelka">
              <img
              :class="{ disabledShit: !photos.links[0].url }"
              style="transform: rotate(180deg)"
              class=""
              src="../assets/img/assets/4e5ce117df73b37964344a8e896d073d.png"
              alt="alt text"
            />
          </a>

          <a :href="link.url" v-for="link in photos.links.slice(1, photos.links.length -1)"
          :class="{ activeLink: photos.current_page = link.label }"
          class="">{{link.label}}</a>
          <!-- <a href="#" class="">2</a>
          <a href="#" class="">3</a>
          <a href="#" class="">4</a>
          <h5 class="">...</h5>
          <a href="#" class="">16</a> -->

          <a :href="photos.next_page_url"  class="item1 pagination_strelka">
            <img
            :class="{ disabledShit: !photos.next_page_url }"
              class=""
              src="../assets/img/assets/4e5ce117df73b37964344a8e896d073d.png"
              alt="alt text"
            />
          </a>

          <a :href="photos.last_page_url"  class="item pagination_strelka">
            <img
            :class="{ disabledShit: !photos.next_page_url }"
              class=""
              src="../assets/img/assets/8253bdda278388ee236f678e6c766cd4.png"
              alt="alt text"
            />
          </a>
        </div>
  </main>
  <Footer></Footer>
</template>


<script>

import "@/assets/css/index.css";
import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";
import help from "@/Components/helper-api";
export default {
  name: "photos-of-album-view",
  name: "Login-component",
    name: "App",

    props:[
    'photos',
    //'help',
    //'photocollections'
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
    computed: {
    photossByTitle() {
      return this.photoss.filter(item => item.name.toLowerCase().indexOf(this.search.toLowerCase()) !== -1)
    },
    photoss(){
      return this.photos.data;
    }
  },
     methods: {
     changeSearch(){
      localStorage.setItem('search', this.search);
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

    },

};



</script>


<style scoped src="@/assets/css/Photoo.css"></style>
<style>
select {
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
