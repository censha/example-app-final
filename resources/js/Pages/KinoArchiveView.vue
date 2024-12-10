        <template>
            <Header></Header>
  <div class="total_wrapper">
   <div class="breadcrumbs" style="margin-top: 50px">
      <a style="font-weight: 500; font-size: 12px; color: #878787" href="/"
        >Главная > </a
      ><a style="font-weight: 500; font-size: 12px; color: #ffffff" href="#"
        >Видео</a
      >
    </div>
    <div class="wrapper_kinoarhive" style="margin-top: 10px; padding-top: 20px;">
      <h1 class="header-kinoarchive">Видео</h1>
      <div class="total_wrapper container--header_search" >
        <div class="wrapper_header_search" style="margin-top: 20px;">
          <!-- <select name="" id="">
            <option value="">Видео</option>
            <option value="">Фото</option>
          </select> -->
          <!-- <input type="text" v-model="search" placeholder="Поиск по архиву..." @input="changeSearch"/> -->
          <!-- <input type="text" v-model="search" id="fimlSearch" placeholder="Поиск по архиву..."/> -->
          <form style="width: 100%; display: flex; height: 44px;" method="post" :action="route('searchdata')">
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
          <!-- <button class="btn_header_search">
            <p>Найти</p>
            <img src="@/assets/img/search_black.svg" alt="" />
          </button> -->
        </div>
        <div class="pop_up_search hidden">
          <div class="pop_up_search_wrp col-1">
            <ul class="pop_up_search_list">
              По темам:
              <li class="pop_up_search_item">Революция и Ленин</li>
              <li class="pop_up_search_item">Первые годы СССР</li>
              <li class="pop_up_search_item">Первая мировая война</li>
              <li class="pop_up_search_item">Сталинская эпоха</li>
              <li class="pop_up_search_item">Вторая мировая война</li>
              <li class="pop_up_search_item">Оттепель</li>
              <li class="pop_up_search_item">Космос</li>
              <li class="pop_up_search_item">Времена застоя</li>
              <li class="pop_up_search_item">Перестройка</li>
              <li class="pop_up_search_item">Пермь</li>
              <li class="pop_up_search_item">Наука</li>
              <li class="pop_up_search_item">Культура и искусство</li>
              <li class="pop_up_search_item">Спорт</li>
            </ul>
          </div>
          <div class="pop_up_search_wrp col-2">
            <ul class="pop_up_search_list">
              По студиям:
              <li class="pop_up_search_item">ЦСДФ</li>
              <li class="pop_up_search_item">ЦНФ</li>
              <li class="pop_up_search_item">ЛСДФ</li>
              <li class="pop_up_search_item">ЛНФ</li>
              <li class="pop_up_search_item">Свердловская студия</li>
              <li class="pop_up_search_item">Казанская студия</li>
              <li class="pop_up_search_item">Учебные</li>
            </ul>
            <ul class="pop_up_search_list">
              По типам:
              <li class="pop_up_search_item">Фильмы</li>
              <li class="pop_up_search_item">Многосерийные</li>
              <li class="pop_up_search_item">Киножурналы</li>
              <li class="pop_up_search_item">Сюжеты кинохроники</li>
              <li class="pop_up_search_item">Зарубежные сюжеты</li>
              <li class="pop_up_search_item">Телепередачи</li>
              <li class="pop_up_search_item">Рекламные ролики</li>
            </ul>
          </div>
          <div class="pop_up_search_wrp col-3">
            <ul class="pop_up_search_list">
              По категориям:
              <li class="pop_up_search_item">Документальные</li>
              <li class="pop_up_search_item">Научно-популярные</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="kinoarhive__content">
        <div class="kinoarhive__content__filter">
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
            <div class="filter_format_blok filter_format_blok1" @click="quality=''" :class="{active: quality==''}">
              <p>Любой</p>
            </div>
            <div class="filter_format_blok filter_format_blok3"  @click="quality='A'" :class="{active: quality=='A'}">
              <p>SD</p>
            </div>
            <div class="filter_format_blok filter_format_blok2" @click="quality='H,2K'" :class="{active: quality=='H,2K'}">
              <p>HD и выше</p>
            </div>
          </div>
          <p>Год выпуска</p>
          <div class="wrapper_year_filter">
            <p>С:</p>
            <input type="number" class="year1" v-model="issueYearFrom"/>
            <p>По:</p>
            <input type="number" class="year2" v-model="issueYearTo"/>
          </div>
          <p>Год оцифровки</p>
          <div class="wrapper_year_filter">
            <p>С:</p>
            <input type="number" class="year3" v-model="chronicleYearFrom"/>
            <p>По:</p>
            <input type="number" class="year4"  v-model="chronicleYearTo"/>
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
          <input type="text" class="filter_tegs" v-model="tagInput"/>
          <div class="wrapper_filter_tegs" v-if="tagInput.length > 1">
            <template v-for="tag in tagList">
              <div v-if="~tag.name.toUpperCase().indexOf(tagInput.toUpperCase())" class="choise_tegs" :class="{active: tagSet[tag.id]}" @click="switchTag(tag.id)">{{tag.name}}</div>
            </template>
          </div>
          <p>Сортировать по</p>
          <div class="render_filter_block render_filter_block1" @click="sortMethod='date'" :class="{active: sortMethod=='date'}">
            <p>Дате публикации</p>
          </div>
          <div class="render_filter_block render_filter_block2" @click="sortMethod='yearAsc'" :class="{active: sortMethod=='yearAsc'}">
            <p>По году (сначала новые)</p>
          </div>
          <div class="render_filter_block render_filter_block3" @click="sortMethod='yearDesc'" :class="{active: sortMethod=='yearDesc'}">
            <p>По году (сначала старые)</p>
          </div>
          <div class="decor_line_filter">
          </div>
          <div class="btn_filter_go" @click="applyFilter">
            <p>Применить фильтры</p>
          </div>
          <div class="btn_filter_clean" @click="clearFilter">
            <p>Сбросить</p>
          </div>
        </div>
        <div class="kinoarhive__content__films">
          <h2>каталог</h2>
          <article>По вашему запросу найдено <span>{{films.total}}</span></article>
          <div class="setting_filter">
            <img src="@/assets/img/filter.svg" alt="" />
          </div>
          <div
            class="wrapper_content_element"
            id="paginated-list"
            aria-live="polite"
          >

            <elem v-for="film in films.data"
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
                <a style="display: block; height: 100%;" :href="route('film',[id = film.id])"
                  >
                  <!-- <img
                    class="foto_video"
                    :src="film.prefix + '/' + film.file_path + '/' + film.file_name"
                    alt=""/> -->
                    <img
                    class="foto_video"
                    :src="help + film.banner"
                    alt=""/>
              </a>
                <img class="elem_info_img" src="@/assets/img/i.svg" alt="" />
              </div>
              <div class="content_element__info">
                <p>{{film.video_name}}</p>
                <article>хронометраж: <span>{{film.hrono_metr}}</span></article>
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
                        <span v-if="tagfilm.video_id === film.id"><a :href="route('searchtags', tagfilm.name)">{{ tagfilm.name }}</a></span>
                    </div>
                </div>
              </div>
            </elem>
          </div>
        </div>
      </div>
      <!-- {{films.links}} -->

      <div class="pagination-wrap">
          <a :href="films.first_page_url" class="item pagination_strelka">
             <img
              class=""
              :class="{ disabledShit: !films.links[0].url }"
              style="transform: rotate(180deg)"
              src="../assets/img/assets/8253bdda278388ee236f678e6c766cd4.png"
              alt="alt text"
            />
          </a>
          <a :href="films.links[0].url" class="item1 pagination_strelka">
              <img
              style="transform: rotate(180deg)"
              :class="{ disabledShit: !films.links[0].url }"
              class=""
              src="../assets/img/assets/4e5ce117df73b37964344a8e896d073d.png"
              alt="alt text"
            />
          </a>

          <a :href="link.url" v-for="link in films.links.slice(1, films.links.length -1)"
          :class="{ activeLink: films.current_page = link.label }"
          class="">{{link.label}}</a>
          <!-- <a href="#" class="">2</a>
          <a href="#" class="">3</a>
          <a href="#" class="">4</a>
          <h5 class="">...</h5>
          <a href="#" class="">16</a> -->

          <a :href="films.next_page_url" class="item1 pagination_strelka">
            <img
            :class="{ disabledShit: !films.next_page_url }"
              class=""
              src="../assets/img/assets/4e5ce117df73b37964344a8e896d073d.png"
              alt="alt text"
            />
          </a>

          <a :href="films.last_page_url" class="item pagination_strelka">
            <img
            :class="{ disabledShit: !films.next_page_url }"

              class=""
              src="../assets/img/assets/8253bdda278388ee236f678e6c766cd4.png"
              alt="alt text"
            />
          </a>
        </div>

      <div class="kinoarhive__content__dop tablet-block">
        <h3>Последние добавленные</h3>
        <div class="wrapper_kinoarhive__content__dop">
          <a :href="route('film',[id = film.id])" v-for="film in lastFilms.slice(0, 4)" class="content_element">
            <div class="content_element__img">
              <img class="foto_video" :src="help + film.banner"  alt="" />
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
          </a>

        </div>
      </div>

       <div class="kinoarhive__content__dop pc-block">
        <h3>Последние добавленные</h3>
        <div class="wrapper_kinoarhive__content__dop">
          <a :href="route('film',[id = film.id])" v-for="film in lastFilms" class="content_element">
            <div class="content_element__img">
              <img class="foto_video" :src="help + film.banner"  alt="" />
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
          </a>

        </div>
      </div>

       <div class="kinoarhive__content__dop mobile-block">
        <h3>Последние добавленные</h3>
        <div class="wrapper_kinoarhive__content__dop">
          <a :href="route('film',[id = film.id])" v-for="film in lastFilms.slice(0, 4)" class="content_element">
            <div class="content_element__img">
              <img class="foto_video" :src="help + film.banner"  alt="" />
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
          </a>

        </div>
      </div>


    </div>
  </div>
  <Footer></Footer>
</template>

<script>
import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";

import help from "@/Components/helper-api";
//import tagList from '@/tag_list';

export default {
  name: "kino-archive-view",
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
  ],
  created(){
    console.log(this.films)
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
          search: localStorage.getItem('search') || '',
          isCurrent: false,
          csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }

  },
  computed: {
    filmsByTitle() {
      return this.films.data.filter(item => item.video_name.toLowerCase().indexOf(this.search.toLowerCase()) !== -1)
    },
  },
  methods: {
    changeSearch(){
      localStorage.setItem('search', this.search);
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
        // elem.click = () => {
              
        //   }
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
<style>
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

        .content_element__teg__name span {
          display: block;
        }
        </style>
