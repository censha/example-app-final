  <template>
  <Header></Header>
  <main class="total_wrapper" style="margin-top: 20px">
    <div class="breadcrumbs" style="margin-bottom: 50px">
      <a style="font-weight: 500; font-size: 12px; color: #878787" href="/"
        >Главная > </a
      ><a style="font-weight: 500; font-size: 12px; color: #ffffff" href="#"
        >Блог</a
      >
    </div>

    <h1 class="blog-title">блог</h1>

    <button
      class="mobile-block button-show-menu"
      v-on:click="showMenu = !showMenu"
    >
      <i v-if="!showMenu" class="fa-solid fa-bars showMenuIcon"></i>
      <i v-if="showMenu" class="fa-sharp fa-solid fa-xmark showMenuIcon"></i>
      Содержание
    </button>

    <div class="blog-row">
      <!-- МЕНЮШКА -->
      <div v-if="showMenu" class="blog-column-menu">
        <div class="title-wrap-menu">
          <p class="blog-menu-title">Рубрики</p>
          <hr class="spacer-title" />
        </div>
        <a class="blog-menu-link" :href="route('blodnews')">
            Все
          </a>
        <div v-for="heading in headings">

          <a class="blog-menu-link" :href="route('blodnews', heading.id)">
            {{heading.name}}
            <!-- <span>(12)</span> -->
          </a>
        </div>


        <div class="title-wrap-menu title-2">
          <p class="blog-menu-title">Главное</p>
          <hr class="spacer-title" />
        </div>

        <a :href="route('news', main.id)" v-for="main in mains" class="wrap-menu-article">
          <img :src="help + main.photo_news" :alt="main.name" />
          <p class="title-article" v-html="main.name"></p>
          <p class="text-article">{{main.title}}</p>
          <p class="date-article">{{(new Date(main.created_at)).toLocaleString()}}</p>
        </a>
      </div>
      <!-- САМИ СТАТЬИ -->
      <div class="blog-column-content">
        <!-- СТАТЬЯ -->
        <div v-for="newss in newes" class="wrap-article-content">
            <a :href="route('news', newss.id)">
                <img :src="help + newss.photo_news" :alt="newss.name" />
                <p class="article-content-title" v-html="newss.name"></p>
            </a>
          <hr class="article-hr" />
          <div class="tegs-wrap">
            <a :href="route('searchtags',x[1])" v-for="x in showTag(newss.tags)">{{x[1]}}</a>
          </div>
          <p class="article-text-content">
            {{newss.title}}
          </p>
          <a :href="route('news', newss.id)" class="button-to-article">Читать полностью</a>
        </div>

        <div class="pagination-wrap">
          <a :href="news.first_page_url" class="item pagination_strelka">
            <img
              class=""
              src="../assets/img/assets/81fbcfff32ecd99ceb98d24781495915.png"
              alt="alt text"
            />
          </a>
          <a :href="news.links[0].url" class="item1 pagination_strelka">
            <img
              class=""
              src="../assets/img/assets/25bfeb06b7d6a8783db87384ad645d76.png"
              alt="alt text"
            />
          </a>

          <a :href="link.url" v-for="link in news.links.slice(1, news.links.length -1)"
          v-bind:class="{ activeLink: news.current_page }"
          class="">{{link.label}}</a>
          <!-- <a href="#" class="">2</a>
          <a href="#" class="">3</a>
          <a href="#" class="">4</a>
          <h5 class="">...</h5>
          <a href="#" class="">16</a> -->

          <a :href="news.next_page_url" class="item1 pagination_strelka">
            <img
              class=""
              src="../assets/img/assets/4e5ce117df73b37964344a8e896d073d.png"
              alt="alt text"
            />
          </a>

          <a :href="news.last_page_url" class="item pagination_strelka">
            <img
              class=""
              src="../assets/img/assets/8253bdda278388ee236f678e6c766cd4.png"
              alt="alt text"
            />
          </a>
        </div>
      </div>
    </div>
  </main>
  <Footer></Footer>
</template>

<script>
// import "../assets/css/Bloge.css";
import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";
import help from "@/Components/helper-api";
export default {
  name: "blog-view",
  components: {
    Header,
    Footer,
  },
  props:[
    'news',
    'headings',
    'mains'
  ],
  data() {
    return { showMenu: false, help: help };
  },
  mounted() {
    if (window.innerWidth > 768) {
      this.showMenu = true;
    }
  },
  computed: {
    newes(){
      return this.news.data;
    }
  },
  methods: {
    showTag(tags){
      return Object.entries(JSON.parse(tags));
    }
  }
};
</script>

<style scoped>
/* ОБЩЕЕ */
.blog-title {
  text-align: center;
  font-size: 40px;
  font-weight: 700;
  margin-bottom: 30px;
}

.blog-row {
  display: flex;
}

/* МЕНЮШКА */

.blog-column-menu {
  padding: 20px;
  background: #3e3e3e;
  box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
  border-radius: 6px;
  min-width: 340px;
  margin-right: 65px;
  max-width: 340px;
  height: fit-content;
}
.button-show-menu {
  background: #ffffff;
  border: 2px solid #f3f3f4;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: 3px;
  width: 100%;
  padding: 15px 40px;

  font-weight: 600;
  font-size: 16px;
  line-height: 20px;
  text-align: center;
  color: #3e3e3e;
  margin-bottom: 30px;
  position: relative;
}

.showMenuIcon {
  position: absolute;

  display: flex;
  align-items: center;
  justify-content: center;

  top: calc(50% - 15px);
  left: 20px;

  font-size: 20px;
  line-height: 20px;

  width: 30px;
  height: 30px;
  background: #d9d9d9;
  border-radius: 5px;
}

.title-wrap-menu {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
}
.blog-menu-title {
  font-family: "Montserrat";
  font-style: normal;
  font-weight: 700;
  font-size: 20px;
}
.spacer-title {
  width: 100%;
  border: 1px solid #fff;
  margin-top: 15px;
  margin-left: 5px;
}
.blog-menu-link {
  font-family: "Montserrat";
  font-style: normal;
  font-weight: 500;
  font-size: 18px;
  line-height: 25px;
  color: #ffffff;
  display: block;
}
.blog-menu-link > span {
  color: #a7a7a7;
  font-size: 14px;
  line-height: 25px;
  font-weight: 300;
}
.title-2 {
  margin-top: 20px;
}
.wrap-menu-article {
  margin: 20px 0;
  display: block;
}
.wrap-menu-article > img {
  max-height: 210px;
  width: 100%;
  object-fit: cover;
}
.title-article {
  font-family: "Montserrat";
  font-style: normal;
  font-weight: 600;
  font-size: 20px;
  line-height: 24px;
  margin: 10px 0 5px 0;
}
.text-article {
  font-family: "Montserrat";
  font-style: normal;
  font-weight: 400;
  font-size: 12px;
  line-height: 15px;
  color: #ffffff;
  margin-bottom: 10px;
}
.date-article {
  font-family: "Montserrat";
  font-style: normal;
  font-weight: 400;
  font-size: 10px;
  line-height: 12px;
  color: #a7a7a7;
}

/* СТАТЬИ */

.wrap-article-content {
  margin-bottom: 60px;
}
.wrap-article-content > img {
  width: 100%;
  height: 375px;
  max-height: 375px;
  object-fit: cover;
  margin-bottom: 25px;
}
.article-content-title {
  font-family: "Montserrat";
  font-style: normal;
  font-weight: 700;
  font-size: 25px;
  line-height: 110%;
  text-transform: lowercase;
  color: #f3f3f4;
}
.article-hr {
  border: 1px solid #ffffff;
  margin-top: 20px;
  margin-bottom: 5px;
  width: 100%;
}
.tegs-wrap {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end;
  margin-bottom: 20px;
}
.tegs-wrap > a {
  font-family: "Montserrat";
  font-style: normal;
  font-weight: 400;
  font-size: 10px;
  color: #df8e75;
  margin-left: 10px;
  margin-bottom: 5px;
}
.article-text-content {
  font-family: "Montserrat";
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  color: #f3f3f4;
}
.button-to-article {
  display: block;
  background: #df8e75;
  box-shadow: 0px 4px 13px rgba(0, 0, 0, 0.25);
  border-radius: 3px;
  width: fit-content;
  padding: 10px 40px;
  margin-top: 20px;
  transition: 0.5s ease;

  font-family: "Montserrat";
  font-style: normal;
  font-weight: 600;
  font-size: 16px;
  line-height: 20px;
  text-align: center;
  color: #18181a;
}
.button-to-article:hover {
  background: #e37350;
  color: #000;
}

.pagination-wrap {
  display: flex;
  margin: 0 auto;
  justify-content: center;
}
.pagination-wrap > * {
  margin: 0 5px;
}
.mobile-block {
  display: none;
}

@media (max-width: 768px) {
  .mobile-block {
    display: block;
  }
  .blog-row {
    flex-flow: column;
  }
  .blog-column-menu {
    min-width: 100%;
    max-width: 100%;
    margin-bottom: 30px;
  }
  .wrap-article-content > img {
    height: 165px;
    max-height: 165px;
  }
  .article-content-title {
    font-weight: 700;
    font-size: 16px;
    line-height: 110%;
  }
  .article-hr {
    margin-top: 5px;
  }
  .tegs-wrap {
    justify-content: flex-start;
    margin-bottom: 10px;
  }
  .tegs-wrap > a {
    margin-right: 10px;
    margin-left: 0;
  }
  .article-text-content {
    font-weight: 400;
    font-size: 12px;
  }
  .button-to-article {
    width: 100%;
    padding: 15px 40px;
  }
  .wrap-article-content {
    margin-bottom: 30px;
  }
}

@media (min-width: 2200px){
    .blog-column-menu{
      min-width: 400px;
      margin-right: 65px;
      max-width: 400px;
    }
    .text-article{
      font-size: 16px;
      line-height: 24px;
    }
    .article-content-title{
      font-size: 34px;
    }
    .article-text-content{
      font-size: 22px;
    }
    .button-to-article{
      font-size: 24px;
      line-height: 36px;
    }
}

</style>
