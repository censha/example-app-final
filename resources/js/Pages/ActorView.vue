<template>
  <Header></Header>
  <div class="total_wrapper">
    <div class="wrapper_actor_info">
      <div class="actor_info__img">
        <div class="actor_info__img__block">
          <img :src="(help + actor.photo)" :alt="actor.name" />
        </div>
      </div>
      <div class="actor_info__text">
        <h2>{{actor.name}} {{actor.last_name}}</h2>
        <h3>О персоне</h3>
        <p>Фильмография:<span v-html="actor.carier"></span></p>
        <p style="margin-bottom: 10px;">Информационный материал:<span v-html="actor.info"></span></p>
        <h4>Другие работы: </h4>
          <span v-html="actor.best_job"></span>
        <article>
        </article>
        <h4>Биография</h4>
        <article v-html="actor.content">
        </article>

      </div>
    </div>
    <!-- <div class="wrapper-allfilms">
      <div class="allfilms__block">
        <div class="allfilms__block__elem">
          <div class="allfilms__block__elem__img">
            <img src="@/assets/img/777.png" alt="" />
          </div>
          <div class="allfilms__block__elem__text">
            <p>Тор: Любовь и гром (2022)</p>
            <article>Thor: Love and Thunder, 2022</article>
          </div>
        </div>
        <div class="allfilms__block__elem">
          <div class="allfilms__block__elem__img">
            <img src="@/assets/img/777.png" alt="" />
          </div>
          <div class="allfilms__block__elem__text">
            <p>Тор: Любовь и гром (2022)</p>
            <article>Thor: Love and Thunder, 2022</article>
          </div>
        </div>
        <div class="allfilms__block__elem">
          <div class="allfilms__block__elem__img">
            <img src="@/assets/img/777.png" alt="" />
          </div>
          <div class="allfilms__block__elem__text">
            <p>Тор: Любовь и гром (2022)</p>
            <article>Thor: Love and Thunder, 2022</article>
          </div>
        </div>
      </div>
    </div>-->

    <div class="wrapper_foto" v-if="photos">
      <p>Фото</p>
      <div class="carusel_line__nav">
        <div class="line__nav__left">
          <img src="@/assets/img/arrow.svg" alt="" />
        </div>
            <div class="line__nav__right">
            <img src="@/assets/img/arrow.svg" alt="" />
            </div>
      </div>
      <div class="wrapper__carusel">
        <div class="carusel__line">
          <div v-for="photo in photos" class="carusel_block">
            <img :src="help + photo.photo" :alt="photo.name" />
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
  name: "actor-view",
  props:[
    'actor',
    'films',
    'photos'
    ],
    components: {
        Header,
        Footer,
    },
    data(){
        return {help: help }
    },
  methods: {
    movecarusel(step, block) {
      document.querySelector(block).scrollTo({
        left: step,
        top: 0,
        behavior: "smooth",
      });
    },
  },
  mounted() {
      document.querySelector('.nav__gamburger').onclick = () => {
      document.querySelector('.ham').classList.toggle('active')
      document.querySelector('.nav__links').classList.toggle('active')
    }
    let positionCollection = 0;
    // let positionTems = 0;
    // let positionCategory = 0;
    // let positionNews = 0;

    let caruselStep = 200;

    let collectionLength =
      (document.querySelector(".carusel__line").children.length - 3) *
      caruselStep;

    document.querySelector(".line__nav__right").onclick = () => {
      positionCollection += caruselStep;
      if (positionCollection > collectionLength) {
        positionCollection = collectionLength;
      }
      this.movecarusel(positionCollection, ".wrapper__carusel");
    };
    document.querySelector(".line__nav__left").onclick = () => {
      positionCollection -= caruselStep;
      if (positionCollection < 0) {
        positionCollection = 0;
      }
      this.movecarusel(positionCollection, ".wrapper__carusel");
    };
  },
};
</script>

<style scoped src="@/assets/css/actor.css"></style>
