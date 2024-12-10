<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <div v-if="auth.user"></div>
  <section style="margin: 0; background: #141416" class="header-section">
    <a :href="route('home')">
      <div class="wrapper_logo">
        <img src="@/assets/img/fon_logo.svg" alt="" />
        <img src="@/assets/img/white_logo.svg" alt="" />
      </div>
    </a>

    <div class="total_wrapper">
      <nav>
        <div class="nav__links">

          <a :href="route('kinoarchive')">
            <p>Видео</p>
          </a>
          <a :href="route('photoalbum')">
            <p>Фото</p>
          </a>
        </div>
        <div v-if="!auth.user" class="nav__btns">
            <a :href="route('register')"><i style="margin-left: 9px" class="fa-solid fa-xl fa-user-plus"></i
          ></a>
          <a :href="route('login')">
          <i
              style="margin-left: 9px"
              class="fa-solid fa-xl fa-right-to-bracket"
            ></i
          ></a></div>

          <div v-if="auth.user" class="nav__btns" style="display: flex">
          <a style="font-weight: 300;" :href="route('dashboard')">
            <p>{{auth.user.first_name}}</p>
          </a>
          <a :href="route('logout')"
            ><i
              style="margin-left: 9px"
              class="fa-sharp fa-xl fa-solid fa-circle-xmark"
            ></i
          ></a>
        </div>
        <div class="nav__gamburger">
          <svg class="ham hamRotate ham1" viewBox="0 0 100 100" width="30">
            <path
              class="line top"
              d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40"
            />
            <path class="line middle" d="m 30,50 h 40" />
            <path
              class="line bottom"
              d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40"
            />
          </svg>
        </div>
      </nav>
    </div>
  </section>
</template>

<script>
// import user_data from @/Http/Controllers/Controller.php;
export default {
  name: "Header-component",
  props:[
    'user_data'
    ],
    // mounted() {
    mounted() {
      document.querySelector('.nav__gamburger').onclick = () => {
      document.querySelector('.ham').classList.toggle('active')
      document.querySelector('.nav__links').classList.toggle('active')
    }},
    // },
  data(){
      return {auth: $('#app').data().page.props.auth};
  },
};
</script>

<style>
.total_wrapper {
  width: 100%;
}
.btn_header_search {
  padding: 0 15px;
}
.wrapper_header_search select {
  padding: 13px 5px;
  margin: 0;
  height: 100%;
  max-width: 13%;
}
h2 {
  padding: 0;
  margin: 0;
}
p {
  margin: 0;
}
.nav__btns > a {
  font-weight: 600;
  transition: 0.3s ease;
}
.nav__btns > a:hover {
  color: #c1c1c1;
}

@media (max-width: 768px){
  .nav__btns{
    margin-left: 25%;
  }
}
</style>
