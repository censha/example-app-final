<template>
    <Header></Header>
    <div class="total_wrapper">
      <div class="breadcrumbs" style="margin-top: 50px">
        <a style="font-weight: 500; font-size: 12px; color: #878787" href="/"
          >Главная > </a
        ><a style="font-weight: 500; font-size: 12px; color: #ffffff" href="#"
          >результаты поиска</a
        >
      </div>
      <div  class="wrapper_kinoarhive" style="margin-top: 10px; padding-top: 20px">
        <h1 class="header-kinoarchive">Результаты поиска</h1>

        <div class="kinoarhive__content" >
          <div class="kinoarhive__content__filter" v-if="films">
            <h2>Фильтр</h2>
            <div class="decor_line_filter"></div>
            <p>Оцифровка</p>
            <select class="digitise" v-model="digitise">
              <option value="0">Все</option>
              <option value="1">Только оцифрованные</option>
              <option value="2">Неоцифрованные</option>
            </select>
            <p>Формат</p>
            <div class="wrapper_filter_format">
              <div
                class="filter_format_blok filter_format_blok1"
                @click="quality=''"
                :class="{active: quality==''}"
              >
                <p>Любой</p>
              </div>
              <div
                class="filter_format_blok filter_format_blok3"
                @click="quality='A'"
                :class="{active: quality=='A'}"
              >
                <p>SD</p>
              </div>
              <div
                class="filter_format_blok filter_format_blok2"
                @click="quality='H,2K'"
                :class="{active: quality=='H,2K'}"
              >
                <p>HD и выше</p>
              </div>
            </div>
            <p>Год выпуска</p>
            <div class="wrapper_year_filter">
              <p>С:</p>
              <input type="number" class="year1" v-model="issueYearFrom" />
              <p>По:</p>
              <input type="number" class="year2" v-model="issueYearTo" />
            </div>
            <p>Год хроники</p>
            <div class="wrapper_year_filter">
              <p>С:</p>
              <input type="number" class="year3" v-model="chronicleYearFrom" />
              <p>По:</p>
              <input type="number" class="year4" v-model="chronicleYearTo" />
            </div>
            <p>Тип</p>
            <select class="type_kino" v-model="typeKino">
              <option value="">Все</option>
              <option v-for="t in types" :value="t.id">{{t.name}}</option>
            </select>
            <p>Коллекции</p>
            <select class="collection_kino" v-model="videoCollection">
              <option value="">не выбранно</option>
              <option v-for="c in collections" :value="c.id">{{c.name}}</option>
            </select>
            <p>Темы</p>
            <select class="topic_kino" v-model="tems">
              <option value="">не выбранно</option>
              <option v-for="t in themes" :value="t.id">{{t.name}}</option>
            </select>
            <p>Теги</p>
            <input type="text" class="filter_tegs" v-model="tagInput" />
            <div class="wrapper_filter_tegs" v-if="tagInput.length > 1">
              <template v-for="tag in tagList">
                <div
                  v-if="~tag.name.toUpperCase().indexOf(tagInput.toUpperCase())"
                  class="choise_tegs"
                  :class="{active: tagSet[tag.id]}"
                  @click="switchTag(tag.id)"
                >
                  {{tag.name}}
                </div>
              </template>
            </div>
            <p>Сортировать по</p>
            <div
              class="render_filter_block render_filter_block1"
              @click="sortMethod='date'"
              :class="{active: sortMethod=='date'}"
            >
              <p>Дате публикации</p>
            </div>
            <div
              class="render_filter_block render_filter_block2"
              @click="sortMethod='yearAsc'"
              :class="{active: sortMethod=='yearAsc'}"
            >
              <p>По году (сначала новые)</p>
            </div>
            <div
              class="render_filter_block render_filter_block3"
              @click="sortMethod='yearDesc'"
              :class="{active: sortMethod=='yearDesc'}"
            >
              <p>По году (сначала старые)</p>
            </div>
            <div class="decor_line_filter"></div>
            <div class="btn_filter_go" @click="applyFilter">
              <p>Применить фильтры</p>
            </div>
            <div class="btn_filter_clean" @click="clearFilter">
              <p>Сбросить</p>
            </div>
          </div>
          <div class="kinoarhive__content__films" v-bind:class="{ 'mx-auto': !films }">
            <div class=" container--header_search" v-bind:class="{ 'truly-centered': !films }">
                <div class="wrapper_header_search">
                  <!-- <select name="" id="">
            <option value="">Видео</option>
            <option value="">Фото</option>
          </select> -->
                 <form style="width: 100%; display: flex;" method="post" action="/searched/">
                     <input
                         type="text"
                         placeholder="Поиск по архиву..."
                         name="searched"
                         v-model="dsearch"
                     />
                     <input type="hidden" name="_token" :value="csrf">
                     <div class="select" tabindex="1">
                         <input class="selectopt" name="cat" value="video" type="radio" id="opt1" :checked="this.cat === 'video'">
                         <label for="opt1" class="option">Видео</label>
                         <input class="selectopt" name="cat" value="photo" type="radio" id="opt2" :checked="this.cat === 'photo'">
                         <label for="opt2" class="option">Фото</label>
                         <input class="selectopt" name="cat" value="news" type="radio" id="opt3" :checked="this.cat === 'news'">
                         <label for="opt3" class="option">Новости</label>
                     </div>
                     <div class="btn_header_search">
                         <button >Найти</button>
                         <img src="@/assets/img/search_black.svg" alt="" />
                     </div>
                 </form>
                </div>
              </div>
            <article style="display: flex; justify-content: space-between;">
              <div>Результатов по вашему запросу <span>{{totalSearch}}</span> </div>
                <span v-if="tagtags" style="margin-left: auto;"><a href="#similar_news">Новости по тегу: {{tagtags}}</a></span>
            </article>
            <div class="setting_filter">
              <img src="@/assets/img/filter.svg" alt="" />
            </div>
            <div
              class="wrapper_content_element"
              id="paginated-list"
              aria-live="polite"
            >
              <elem
                v-for="film in filmsByTitle"
                class="content_element pag_elem"
                data-digitise="0"
                data-hd="4K"
                data-year1="{{film.year_movie}}"
                data-year2="{{film.date_release}}"
                data-type="Фильм"
                data-callection=""
                data-temps=""
                data-tegs="Авиационная промышленность,Авиация военная,Авиация гражданская"
              >
                <div class="content_element__img">
                  <a style="display: block" :href="route('film',film.id)">
                    <!-- <img
              class="foto_video"
              :src="film.prefix + '/' + film.file_path + '/' + film.file_name"
              alt=""/> -->
                    <img class="foto_video" :src="help + film.banner" alt="" />
                  </a>
                  <img class="elem_info_img" src="@/assets/img/i.svg" alt="" />
                </div>
                <div class="content_element__info">
                  <p>{{film.video_name}}</p>
                  <article>
                    хронометраж: <span>{{film.hrono_metr}}</span>
                  </article>
                </div>
                <div class="content_element__teg">
                  <p>Категории:</p>
                  <div class="content_element__teg__category">
                    <span>Фильм</span>
                  </div>
                  <p>Тэги</p>
                  <div class="content_element__teg__name">
                    <!-- <span v-for="tagfilm in tagfilms" v-if="tagfilm.video_id === film.id"> -->
                    <div v-for="tagfilm in tagfilms">
                      <span
                        v-if="tagfilm.video_id === film.id"
                      ><a :href="route('searchtags',tagfilm.name)">{{ tagfilm.name }}</a></span
                      >
                    </div>
                  </div>
                </div>
              </elem>

              <hr>
              <!--фотоколекции-->
                <elem
                    v-for="film in newsByTitle"
                    class="content_element pag_elem"
                    data-digitise="0"
                    data-hd="4K"
                    data-type="Фильм"
                    data-callection=""
                    data-temps=""
                    data-tegs="Авиационная промышленность,Авиация военная,Авиация гражданская"
                >
                    <div class="content_element__img">
                        <a style="display: block" :href="route('news',film.id)">
                            <!-- <img
                      class="foto_video"
                      :src="film.prefix + '/' + film.file_path + '/' + film.file_name"
                      alt=""/> -->
                            <img class="foto_video" :src="help + film.photo_news" alt="" />
                        </a>
                        <!-- <img class="elem_info_img" src="@/assets/img/i.svg" alt="" /> -->
                    </div>
                    <div class="content_element__info">
                        <p>Статья</p>
                        <p>{{film.name}}</p>

                    </div>
                    <div class="content_element__teg">
                        <p>Категории:</p>
                        <div class="content_element__teg__category">
                            <span>Новость</span>
                        </div>


                    </div>
                </elem>

                <elem
                    v-for="film in photoByTitle"
                    class="content_element pag_elem"
                    data-digitise="0"
                    data-hd="4K"
                    data-type="Фильм"
                    data-callection=""
                    data-temps=""
                    data-tegs="Авиационная промышленность,Авиация военная,Авиация гражданская"
                >
                    <div class="content_element__img">
                        <a style="display: block" :href="route('photo',film.id)">
                            <!-- <img
                      class="foto_video"
                      :src="film.prefix + '/' + film.file_path + '/' + film.file_name"
                      alt=""/> -->
                            <img class="foto_video" :src="help + film.photo" alt="" />
                        </a>
                        <!-- <img class="elem_info_img" src="@/assets/img/i.svg" alt="" /> -->
                    </div>
                    <div class="content_element__info">
                        <p>{{film.name}}</p>

                    </div>
                    <div class="content_element__teg">
                        <p>Категории:</p>
                        <div class="content_element__teg__category">
                            <span>Фото</span>
                        </div>


                    </div>
                </elem>
            </div>
          </div>
        </div>

        <div class="pagination-wrap">
          <a :href="paginate.first_page_url" class="item pagination_strelka">
            <img
              class=""
              :class="{ disabledShit: !paginate.links[0].url }"
              style="transform: rotate(180deg)"
              src="../assets/img/assets/8253bdda278388ee236f678e6c766cd4.png"
              alt="alt text"
            />
          </a>
          <a :href="paginate.links[0].url" class="item1 pagination_strelka">
            <img
              style="transform: rotate(180deg)"
              :class="{ disabledShit: !paginate.links[0].url }"
              class=""
              src="../assets/img/assets/4e5ce117df73b37964344a8e896d073d.png"
              alt="alt text"
            />
          </a>

          <a
            :href="link.url"
            v-for="link in paginate.links.slice(1, paginate.links.length -1)"
            :class="{ activeLink: paginate.current_page = link.label }"
            class=""
            >{{link.label}}</a
          >
          <!-- <a href="#" class="">2</a>
    <a href="#" class="">3</a>
    <a href="#" class="">4</a>
    <h5 class="">...</h5>
    <a href="#" class="">16</a> -->

          <a :href="paginate.next_page_url" class="item1 pagination_strelka">
            <img
              :class="{ disabledShit: !paginate.next_page_url }"
              class=""
              src="../assets/img/assets/4e5ce117df73b37964344a8e896d073d.png"
              alt="alt text"
            />
          </a>

          <a :href="paginate.last_page_url" class="item pagination_strelka">
            <img
              :class="{ disabledShit: !paginate.next_page_url }"
              class=""
              src="../assets/img/assets/8253bdda278388ee236f678e6c766cd4.png"
              alt="alt text"
            />
          </a>
        </div>

        <div class="kinoarhive__content__dop tablet-block">
          <h3>Последние добавленные</h3>
          <div class="wrapper_kinoarhive__content__dop">
            <div v-for="film in lastFilms.slice(0, 4)" class="content_element">
              <div class="content_element__img">
                <img class="foto_video" :src="help + film.banner" alt="" />
                <img class="elem_info_img" src="@/assets/img/i.svg" alt="" />
              </div>
              <div class="content_element__info">
                <p>{{film.video_name}}</p>
                <article><br />хронометраж: {{film.hrono_metr}}</article>
              </div>
              <div class="content_element__teg">
                <p>Категории:</p>
                <div class="content_element__teg__category">
                  <span>Фильм</span>
                </div>
                <p>Тэги</p>
                <div class="content_element__teg__name">
                  <span>Авиационная промышленность</span>
                  <span>Авиация военная</span>
                  <span>Авиация гражданская</span>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="black_block" style="background: transparent;" v-if="photocollection">
          <div class="total_wrapper">
              <section class="category" style="margin: 0">
                  <a :href="route('photoalbum')" class="wrapper_h2_arr">
                      <h2 style="margin: 0;">Похожие</h2>
                  </a>
                  <div class="carusel_line__nav carusel_line_category__nav" style="right: 0!important; width: 110px!important;">
                      <a class="line__nav__left line_category_nav__left">
                          <img src="@/assets/img/arrow.svg" alt="" />
                      </a>
                      <a class="line__nav__right line_category_nav__right">
                          <img src="@/assets/img/arrow.svg" alt="" />
                      </a>
                  </div>
                  <div class="wrapper__carusel wrapper__carusel__category">
                      <div class="carusel__line carusel_line_category">
                          <div v-for="photo in photocollection">
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


          <div class="black_block" style="background: transparent;" v-if="tagtags">
              <div class="total_wrapper">
                  <section class="category" style="margin: 0">
                      <a id="similar_news" :href="route('blodnews')" class="wrapper_h2_arr">
                          <h2 style="margin: 0;">Похожие новости</h2>
                      </a>
                      <div class="carusel_line__nav carusel_line_category__nav" style="right: 0!important; width: 110px!important;">
                          <a class="line__nav__left line_category_nav__left">
                              <img src="@/assets/img/arrow.svg" alt="" />
                          </a>
                          <a class="line__nav__right line_category_nav__right">
                              <img src="@/assets/img/arrow.svg" alt="" />
                          </a>
                      </div>
                      <div class="wrapper__carusel wrapper__carusel__category" style="min-height: 360px;">
                          <div class="carusel__line carusel_line_category">
                              <div class="block__news" v-for="photo in news">
                                  <a :href="route('news', photo.id)"
                                  ><div class="wrapper_block__news" style="background: transparent">
                                     <div class="block__news__img">
                                      <img :src="(help + photo.photo_news)" alt="" />
                                     </div>
                                      <div class="block__news__title">
                                          <p> {{photo.name}}</p>
                                          <article >{{photo.title}}</article>
                                      </div>
                                  </div></a
                                  >
                              </div>

                          </div>
                      </div>
                  </section>
              </div>
          </div>



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
  //import tagList from '@/tag_list';

  export default {
  name: "search-result-view",
  components: {
  Header,
  Footer,
  },
  props:[
        'films',
        'tags',
        'themes',
        'types',
        'collections',
        'filter',
        'lastFilms',
        'tagfilms',
        'photocollection',
        'photo',
        'news',
        'cat',
      'datasearch',
      'tagtags'
  ],
      created(){
        //console.log(this.films)
      },
  data(){
      return {
            digitise: 0,
            quality: '',
            issueYearFrom: "",
            issueYearTo: "",
            chronicleYearFrom: "",
            chronicleYearTo: "",
            typeKino: "",
            videoCollection: "",
            tems: "",
            sortMethod: "date",
            help: help,
            tagInput: "",
            tagList: [],
            tagSet: {},
          dsearch: this.datasearch,
            //search: localStorage.getItem('search') || '',
              search: '',
            isCurrent: false,
          paginate: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      }

  },
      computed: {
          filmsByTitle() {
              if(this.films.data){
                  this.paginate = this.films;
                  return this.films.data.filter(item => item.video_name.toLowerCase().indexOf(this.search.toLowerCase()) !== -1)
              }
          },
          photoByTitle() {
              if(this.photo && this.photo.data){
                  this.paginate = this.photo;
                  return this.photo.data.filter(item => item.name.toLowerCase().indexOf(this.search.toLowerCase()) !== -1)
              }
          },
          newsByTitle() {
              if(this.news && this.news.data){
                  this.paginate = this.news;
                  return this.news.data.filter(item => item.title.toLowerCase().indexOf(this.search.toLowerCase()) !== -1)
              }
          },
        totalSearch(){
            if(this.films.data)
                return this.films.total;
            if(this.photo.data)
                return this.photo.total;
            if(this.news.data)
                return this.news.total;
        }
      },
      methods: {
        movecarusel(step,block) {
            document.querySelector(block).scrollTo({
                left: step,
                top: 0,
                behavior: 'smooth'
            });
        },

        changeSearch(){
            //localStorage.setItem('search', this.search);

        },
          submitForm(e) {
              console.log("ACHTUNNG!!!");
              let formData = new FormData();
              formData.append('start_segment', this.search);
              console.log(formData);
              // console.log(this.numder);
              // console.log(this.email);
              e.preventDefault();
              let url = '/searched/';
              let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
              fetch(url, {
                  headers: {

                      "Accept": "multipart/form-data, text-plain, */*",
                      "X-Requested-With": "XMLHttpRequest",
                      "X-CSRF-TOKEN": token
                  },
                  method: 'POST',
                  body: formData,
              })
                  // .then((data) => {
                  //
                  //     location = location.origin + location.pathname;
                  // })
                  .catch(function(error) {
                      console.log(error);
                  });
          },

      },
      watch:{
              search: function (){
                  console.log(this.search);
                  this.searchdata(this.search);
              },
            applyFilter(){
                location = [
                `/films/filter?`,
                `digitise=${encodeURI(this.digitise||'')}`,
                `&quality=${encodeURI(this.quality||'')}`,
                `&issue_year_from=${encodeURI(this.issueYearFrom||'')}`,
                `&issue_year_to=${encodeURI(this.issueYearTo||'')}`,
                `&chronicle_year_from=${encodeURI(this.chronicleYearFrom||'')}`,
                `&chronicle_year_to=${encodeURI(this.chronicleYearTo||'')}`,
                `&type_kino=${encodeURI(this.typeKino||'')}`,
                `&video_collection=${encodeURI(this.videoCollection||'')}`,
                `&tems=${encodeURI(this.tems||'')}`,
                `&sort_method=${encodeURI(this.sortMethod||'')}`,
                `&tags=${encodeURI(Object.keys(this.tagSet).join(",")||'')}`,
                `&from=${encodeURI(this.from||'')}`,
                `&to=${encodeURI(this.to||'')}`,
                //`&quality=${encodeURI(this.quality)}`,
                //`&quality=${encodeURI(this.quality)}`,
                //`&quality=${encodeURI(this.quality)}`,
                //`&quality=${encodeURI(this.quality)}`,
                ].join('');
            },
            clearFilter(){
                this.digitise = "0";
                this.quality = '';
                this.issueYearFrom = "";
                this.issueYearTo = "";
                this.chronicleYearFrom = "";
                this.chronicleYearTo = "";
                this.typeKino = "";
                this.videoCollection = "";
                this.tems = "";
                this.sortMethod = "date";
                this.tagSet = {};
            },
            switchTag(tag){
                if(this.tagSet[tag])
                    delete this.tagSet[tag];
                else
                    this.tagSet[tag] = true;
            }
    },
      async mounted() {
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
              this.movecarusel(positionCategory, '.wrapper__carusel__category')
          }


          if(this.cat == 'video'){

          }
          if(this.cat == 'photo') {

          }
          if(this.cat == 'news'){

          }

            document.querySelector('.nav__gamburger').onclick = () => {
                document.querySelector('.ham').classList.toggle('active')
                document.querySelector('.nav__links').classList.toggle('active')
            }
            document.querySelector('.setting_filter').onclick = () => {
                document.querySelector('.kinoarhive__content__filter').classList.toggle('active')
            }

          let allinfo = document.querySelectorAll('.elem_info_img')
          for (let elem of allinfo) {
            elem.addEventListener('click', function () {
              elem.parentNode.parentNode.children[2].classList.toggle('active')
            })
            // elem.onmouseover = () => {
            //     elem.parentNode.parentNode.children[2].classList.add('active')
            // }
            // elem.onmouseout = () => {
            //     elem.parentNode.parentNode.children[2].classList.remove('active')
            // }
          }
          document.querySelector('.setting_filter').onclick = () => {
            document.querySelector('.kinoarhive__content__filter').classList.toggle('active')
          }


          let imgNav = document.querySelectorAll('.nav__btns img')
          for (let el of imgNav) {
          el.onmousemove = () => {
              el.src = el.getAttribute('data-img')
          }
          el.onmouseout = () => {
              el.src = el.getAttribute('data-def')
          }
          }
          try{
            this.tagList =this.tags;
          }catch(_){
            this.tagList = [];
          }
          try{
            this.digitise = this.filter.digitise;
          }catch(_){}
          try{
            this.quality = this.filter.quality;
          }catch(_){}
          try{
            this.issueYearFrom = this.filter.issue_year_from;
          }catch(_){}
          try{
            this.issueYearTo = this.filter.issue_year_to;
          }catch(_){}
          try{
            this.chronicleYearFrom = this.filter.chronicle_year_from;
          }catch(_){}
          try{
            this.typeKino = this.filter.type_kino;
          }catch(_){}
          try{
            this.videoCollection = this.filter.video_collection;
          }catch(_){}
          try{
            this.tems = this.filter.tems;
          }catch(_){}
          try{
            this.sortMethod = this.filter.sort_method;
          }catch(_){}
          try{
            this.tagSet = Object.fromEntries( this.filter.tags.split(',').map(x=>[x, true]));
          }catch(_){}
        },

  };
  </script>

  <style scoped src="@/assets/css/kinoarhive.css"></style>

  <style scoped>
    .wrapper_header_search {
      margin: 0 0 20px 0;
      max-width: 758px;
    }
    .truly-centered{
      display: flex;
      justify-content: center;
    }
    @media (max-width: 960px)
    {
      .setting_filter{
        top: 55px;
      }
      .wrapper_header_search{
        margin: 0!important;
        max-width: 100%!important;
        margin-bottom: 20px!important;
        width: 100%!important;
      }
      .header-kinoarchive{
        font-size: 35px;
        line-height: 40px;
      }

      .btn_header_search{
        width: 105px;
        min-width: 105px;
      }
      .breadcrumbs{
        margin-top: 90px!important;
      }
      .wrapper_header_search input {
        width: 88%;
    }
    }
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
        min-height:44px;
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
