<template>
    <Header></Header>
  <div class="total_wrapper">
   <div class="breadcrumbs" style="margin-top: 50px">
      <a :href="route('home')" style="font-weight: 500; font-size: 12px; color: #878787"
        >Главная > </a
      ><a :href="route('blodnews')" style="font-weight: 500; font-size: 12px; color: #878787"
        >Новости > </a
      >
      <a style="font-weight: 500; font-size: 12px; color: #ffffff" href="#"
        ><p v-html="news.name"></p></a
      >
    </div>
    <div class="wrapper_news">
      <div class="news_img">
        <img :src="(help + news.photo_news)" alt="" />
        <h1 class="news-header" v-html="news.name"></h1>
      </div>
      <div class="wrapper_news__text">
        <div class="news__text" v-html="news.content">

        </div>
        <div class="other_news">

          <h3>Другие новости</h3>
          <div v-for="mains in main" class="other_news__block">
            <a :href="route('news', mains.id)">
              <img :src="help + mains.photo_news" alt="" />
            <div><p class="news-title" v-html="mains.name"></p></div>
            <article>
              {{mains.title}}
            </article>
            </a>
          </div>
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
export default {
  name: "news-page-view",
  props:[
    'news',
    'main'
    ],
    components: {
        Header,
        Footer,
    },
    data(){
        return {help: help }
    },
};
</script>

<style scoped src="@/assets/css/news.css"></style>

<style scoped>
p{
  margin-bottom: 15px;
}
.news-header{
  font-weight: 700;
  font-size: 40px;
  padding-top: 15px;
  padding-bottom: 15px;
  line-height: 50px;
}
.wrapper_news{
  margin-top: 50px;
}

@media (max-width: 768px){
  .news-header{
  font-weight: 700;
  font-size: 20px;
  padding: 10px!important;
  line-height: 25px;
}

}
</style>
