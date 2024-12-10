    <script setup>
    //import { Head, Link, useForm } from '@inertiajs/inertia-vue3';


    // const form = useForm({
    //     name: '',
    //     email: '',
    //     password: '',
    //     password_confirmation: '',
    //     terms: false,
    // });
    </script>

    <template>
        <Header></Header>
      <div class="total_wrapper">
       <div class="breadcrumbs" style="margin-top: 50px">
          <a style="font-weight: 500; font-size: 12px; color: #878787" href="/"
            >Главная > </a
          >
          <a style="font-weight: 500; font-size: 12px; color: #878787" :href="route('kinoarchive')"
            >Видео> </a
          >
          <a style="font-weight: 500; font-size: 12px; color: #ffffff" href="#"
            >{{film.video_name}}</a
          >
        </div>
        <div class="wrapper_kino" style="margin-top: 40px;">
          <div class="kino__name mobile-block" style="margin-bottom: 15px;">
              <p style="text-align: left;">{{film.video_name}}</p>
              <p style="text-align: left;" v-if="film.year_movie != ''">({{film.year_movie}})</p>
            </div>
          <div style="display: flex; width: 100%">
            <div class="kino__img mobile-none" style="width: 32%; height: fit-content;">
            <!-- <img :src="banner.prefix + '/' + banner.file_path + '/' + banner.file_name" :alt="film.video_name " /> -->
            <img style="height: 100%; object-fit: cover; max-height: 500px; height: 500" :src="help + film.banner" />

        <!-- <button class="btn__favourites_video" style="width: 90%; max-width: 100%; margin-left: auto; margin-right: auto;margin-top: 5px; display:none;">
            <p>Добавить в избранное</p>
            <img src="@/assets/img/flag.svg" alt="" />
          </button> -->
      </div>
      <div class="kino__img mobile-block">
        <!-- <img :src="banner.prefix + '/' + banner.file_path + '/' + banner.file_name" :alt="film.video_name " /> -->
        <img style="height: 100%; object-fit: cover; max-height: 450px;" :src="help + film.banner" />
<!--
        <button class="btn__favourites_video" style="width: 90%; max-width: 100%; margin-left: auto; margin-right: auto;margin-top: 5px; display:none;">
            <p>Добавить в избранное</p>
            <img src="@/assets/img/flag.svg" alt="" />
          </button> -->
      </div>
      <div class="mobile-none" style="width: 68%;">
        <div class="wrapper-kino__name mobile-none">
        <div class="kino__name">
          <p >{{film.video_name}}</p>
          <p v-if="film.year_movie != ''">({{film.year_movie}})</p>
        </div>
      </div>
        <div class="kino__info" style="width: 100%">
          <p style="font-weight: 600;font-size: 20px;color: #DF8E75;margin-top: 15px">
            Описание:
          </p>
          <p  style="font-weight: 400; margin-top: 15px;" v-html="film.annotation">

          </p>
        </div>
        <div class="mobile-none">
        <div class="wrappers-avtors_film " >
          <p class="text-author" v-if="regesers">Авторы:</p>
            <p class="text-author"  v-else-if="operators">Авторы:</p>
            <p class="text-author"  v-else-if="actors && actors.length">Авторы:</p>
            <div style="margin-top: 5px; display: flex;align-items: center;" class="avtors_film_block" v-if="regesers">
              <p >Режиссер:</p>
              <a :href="route('actor',regesers.authors_id)" v-if="regesers"><span>{{regesers.name}}  {{regesers.last_name}}</span></a>
<!--              <span v-else>—</span>-->
            </div>
            <div class="avtors_film_block" v-if="operators">
              <p>Оператор:</p>
              <a :href="route('actor',operators.authors_id)" v-if="operators"><span>{{operators.name}}  {{operators.last_name}}</span></a>
<!--              <span v-else>—</span>-->
            </div>

<!--            <div class="avtors_film_block">-->
<!--              <p>Продюсер:</p>-->
<!--              <a :href="route('actor',produssers.authors_id)" v-if="produssers"><span>{{produssers.name}}  {{produssers.last_name}}</span></a>-->
<!--              <span v-else>—</span>-->
<!--            </div>-->
<!--            <div class="avtors_film_block">-->
<!--              <p>Сценарист:</p>-->
<!--              <a :href="route('actor',scenarists.authors_id)" v-if="scenarists"><span>{{scenarists.name}}  {{scenarists.last_name}}</span></a>-->
<!--              <span v-else>—</span>-->
<!--            </div>-->
            <div class="avtors_film_block" v-if="actors && actors.length">
              <p>В главных ролях:</p>
              <template v-if="actors && actors.length">
                <a :href="route('actor',actor.authors_id)" v-for="actor in actors"><span>{{actor.name}}  {{actor.last_name}}</span></a>
              </template>
<!--              <span v-else>—</span>-->
            </div>


            <div class="more-authors-text" v-if="showAuthors">

            <div class="avtors_film_block" v-if="reg.length">
                <p>Режиссеры:</p>
                    <a :href="route('actor',regs.authors_id)" v-for="regs in reg"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="reg_a.length">
                <p>Режиссеры - аниматоры:</p>
                    <a :href="route('actor',regs.authors_id)" v-for="regs in reg_a"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="a_idea.length">
                <p>Авторы идеи:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in a_idea"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="a_scen.length">
                <p>Авторы сценария:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in a_scen"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="dictor_txt.length">
                <p>Дикторский текст:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in dictor_txt"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="oper.length">
                <p>Операторы:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in oper"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="oper_comb.length">
                <p>Операторы комбинированных съёмок:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in oper_comb"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="xyd.length">
                <p>Художники:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in xyd"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="xyd_a.length">
                <p>Художники-аниматоры:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in xyd_a"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="k_graph.length">
                <p>Компьютерная графика:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in k_graph"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="mont.length">
                <p>Монтажеры:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in mont"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="sound_oer.length">
                <p>Звукооператоры:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in sound_oer"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="sound_reg.length">
                <p>Звукорежиссеры:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in sound_reg"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="komp.length">
                <p>Композиторы:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in komp"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="txt_write.length">
                <p>Текст читает:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in txt_write"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>
            <div class="avtors_film_block" v-if="red.length">
                <p>Редакторы:</p>
                <a :href="route('actor',regs.authors_id)" v-for="regs in red"><span>{{regs.name}}  {{regs.last_name}}</span></a>
            </div>

                <div class="avtors_film_block" v-if="music_red.length">
                    <p>Музыкальные редакторы:</p>
                    <a :href="route('actor',regs.authors_id)" v-for="regs in music_red"><span>{{regs.name}}  {{regs.last_name}}</span></a>
                </div>
                <div class="avtors_film_block" v-if="xyd_ruk.length">
                    <p>Художественный руководитель:</p>
                    <a :href="route('actor',regs.authors_id)" v-for="regs in xyd_ruk"><span>{{regs.name}}  {{regs.last_name}}</span></a>
                </div>
                <div class="avtors_film_block" v-if="dir_film.length">
                    <p>Директор фильма:</p>
                    <a :href="route('actor',regs.authors_id)" v-for="regs in dir_film"><span>{{regs.name}}  {{regs.last_name}}</span></a>
                </div>
                <div class="avtors_film_block" v-if="prod.length">
                    <p>Продюсеры:</p>
                    <a :href="route('actor',regs.authors_id)" v-for="regs in prod"><span>{{regs.name}}  {{regs.last_name}}</span></a>
                </div>
                <div class="avtors_film_block" v-if="isp_prod.length">
                    <p>Исполнительные продюсеры:</p>
                    <a :href="route('actor',regs.authors_id)" v-for="regs in isp_prod"><span>{{regs.name}}  {{regs.last_name}}</span></a>
                </div>
                <div class="avtors_film_block" v-if="act.length">
                    <p>Актеры:</p>
                    <a :href="route('actor',regs.authors_id)" v-for="regs in act"><span>{{regs.name}}  {{regs.last_name}}</span></a>
                </div>
              </div>

              <div v-if="showAuthors" class="kino__info " style="width: 100%">
                <p style="font-weight: 600;font-size: 20px;color: #DF8E75;margin-top: 15px">
                    Над фильмом работали:
                </p>
                <p  style="font-weight: 400; margin-top: 15px;" class="super-white1" v-html="film.film_work "></p>
            </div>
            <div v-if="showAuthors" class="kino__info" style="width: 100%">
                <p style="font-weight: 600;font-size: 20px;color: #DF8E75;margin-top: 15px">
                    Дополнительное описание:
                </p>
                <p class="super-white1"  style="font-weight: 400; margin-top: 15px; font-family: 'Montserrat'!important;" v-html="film.film_tak_work"></p>
            </div>
            <!-- <div v-if="showAuthors" class="kino__info" style="width: 100%">
                <p style="font-weight: 600;font-size: 20px;color: #DF8E75;margin-top: 15px">
                    Экзотические варианты:
                </p>
                <p  style="font-weight: 400; margin-top: 15px;" v-html="film.exotic_variant"></p>
            </div> -->


            </div>


          </div>

          </div>




            <!-- <div class="kino__load">
              <select>
                            <option value="1">Full HD</option>
                            <option value="2">2k</option>
                            <option value="3">4k</option>
                        </select>
             <div class="btn__cut_video">
                <p>Обрезать фрагмент</p>
              </div>
              <div class="btn__download_video">
                <p>Скачать фильм</p>
              </div>
            </div> -->
          </div>

          <button class="link-film-register mobile-none" style="" v-if="!showAuthors" v-on:click="showAuthors = !showAuthors">Дополнительная информация <span style="margin-left: 10px;"><i class="fa-solid fa-angle-down"></i></span> </button>
          <button class="link-film-register mobile-none" style="" v-else v-on:click="showAuthors = !showAuthors">Скрыть список<span style="margin-left: 10px;"><i class="fa-solid fa-angle-up"></i></span></button>


          <div class="wrapper_player_film">
            <!-- <div class="player_film">-->


            <div style="max-width: 100%; width: 100%;" class="mobile-player">
              <div class="">
                 <div class="wrapper__info__film">
                <div class="info__film__elem" v-if="film.shifr">
                  <p>Архивный:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " v-html="film.shifr"></p>
                </div>
                <div class="info__film__elem" v-if="film.made_in">
                  <p>Страна производства: </p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " v-html="film.made_in"></p>
                </div>
                <div class="info__film__elem" v-if="film.orig_lang">
                  <p>Язык оригинала: </p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat "  v-html="film.orig_lang"></p>
                </div>
                <div class="info__film__elem" v-if="film.type_film">
                  <p>Тип:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " v-html="film.type_film"></p>
                </div>
                <div class="info__film__elem" v-if="film.original_spout">
                  <p>Исходный носитель:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " v-html="film.original_spout"></p>
                </div>
                <div class="info__film__elem" v-if="film.arch_format">
                  <p>Формат архивной копии:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " v-html="film.arch_format"></p>
                </div>

                <!-- <div class="info__film__elem" v-if="film.alt_name">
                  <p>Альтернативные названия:</p>produssers
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{film.alt_name}}</p>
                </div> -->
                <!-- <div class="info__film__elem" v-if="film.type_material_movie">
                  <p>Вид материала к фильму:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{film.type_material_movie}}</p>
                </div>
                <div class="info__film__elem" v-if="film.lat_trans_name">
                  <p>Латинская транскрипция названия:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{film.lat_trans_name}}</p>
                </div> -->
                <!-- <div class="info__film__elem" v-if="film.genre_movie">
                  <p>Жанр фильма:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{film.genre_movie}}</p>
                </div>
                <div class="info__film__elem" v-if="film.num_in_seria">
                  <p>Серия:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{film.num_in_seria}}</p>
                </div>
                <div class="info__film__elem" v-if="film.topic_movie">
                  <p>Темы:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{film.topic_movie}}</p>
                </div> -->
                <!-- <div class="info__film__elem" v-if="film.variant">
                  <p>Вариант фильма:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{ film.variant }}</p>
                </div>
                <div class="info__film__elem" v-if="film.tag">
                  <p>Ключевые слова:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{film.tag}}</p>
                </div> -->
                <div class="info__film__elem" v-if="film.date_release">
                  <p>Год оцифровки:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{ film.date_release }}</p>
                </div>
                <div class="info__film__elem" v-if="film.hrono_metr">
                  <p>Хронометраж:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " v-html="film.hrono_metr"></p>
                </div>
                <!-- <div class="info__film__elem" v-if="film.licens">
                  <p>Прокатное удостоверение:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{film.licens}}</p>
                </div>
                <div class="info__film__elem" v-if="film.how_series">
                  <p>Кол-во серий:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{film.how_series}}</p>
                </div> -->
                <div class="info__film__elem" v-if="film.year_movie">
                  <p>Год производства:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " v-html="film.year_movie"></p>
                </div>
                <div class="info__film__elem" v-if="film.copyright_holder">
                  <p>Права:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " v-html="film.copyright_holder"></p>
                </div>
                     <div class="info__film__elem" v-if="studia_id">
                         <p>Производство:</p>
                         <a :href="route('studia',studia_id.id)"><p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{studia_id.name}}</p></a>
                     </div>
                <div class="info__film__elem" v-else v-if="film.studia">
                  <p>Производство:</p>
                    <a :href="route('studia',film.studia_id_id )" v-if="film.studia_id_id"><p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{film.studia}}</p></a>
                    <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " v-else>{{film.studia}}</p>
                </div>

                <div class="info__film__elem" v-if="film.sound">
                  <p>Звук:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat ">{{film.sound}}</p>
                </div>

                <div class="info__film__elem" v-if="film.chroma">
                  <p>Цветность:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " class="super-white" v-html="film.chroma"></p>
                </div>
                <div class="info__film__elem" v-if="film.prizes">
                  <p>Призы:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " class="super-white" v-html="film.prizes"></p>
                </div>
                <div class="info__film__elem" v-if="film.source">
                  <p>Источник поступления:</p>
                  <p style="color: #fff; font-weight: 300; margin-left: 10px;     font-family: Montserrat " class="super-white" v-html="film.source"></p>
                </div>
                <div class="info__film__elem adaptive-title-info" style="width: 100%;" v-if="film.dop_material">
                  <p>Дополнительные материалы:</p>
                  <p style="color: #fff; font-weight: 300; font-family: Montserrat " class="super-white" v-html="film.dop_material"></p>
                </div>
                <div class="info__film__elem adaptive-title-info" style="width: 100%;" v-if="film.rolling_company">
                  <p class="adaptive-title-info1">Особые замечания:</p>
                  <p style="color: #fff; font-weight: 300; font-family: Montserrat " class="super-white" v-html="film.rolling_company"></p>
                </div>
              </div>

                  <div class="kino__info mobile-block" style="width: 100%">
                      <p style="font-weight: 600;font-size: 20px;color: #DF8E75;margin-top: 15px">
                          Описание:
                      </p>
                      <p  style="font-weight: 400; margin-top: 10px;" v-html="film.annotation"></p>
                  </div>

                  <div class="kino__info mobile-block" style="width: 100%">
                      <p  style="font-weight: 600;font-size: 20px;color: #DF8E75;margin-top: 15px">
                          Над фильмом работали:
                      </p>
                      <p class="super-white" style="font-weight: 400; margin-top: 10px;" v-html="film.film_work "></p>
                  </div>
                  <div class="kino__info mobile-block" style="width: 100%">
                      <p style="font-weight: 600;font-size: 20px;color: #DF8E75;margin-top: 15px">
                        Дополнительное описание:
                      </p>
                      <p  style="font-weight: 400; margin-top: 10px;" v-html="film.film_tak_work"></p>
                  </div>
                  <!-- <div class="kino__info mobile-block" style="width: 100%">
                      <p style="font-weight: 600;font-size: 20px;color: #DF8E75;margin-top: 15px">
                          Экзотические варианты:
                      </p>
                      <p  style="font-weight: 400; margin-top: 10px;" v-html="film.exotic_variant"></p>
                  </div> -->
              </div>



              <div class="mobile-block">
      <div class="wrappers-avtors_film ">
              <p>Авторы:</p>
                <div style="margin-top: 5px; display: flex;align-items: center;" class="avtors_film_block">
                  <p>Режиссер:</p>
                  <a href="#" v-if="regesers"><span>{{regesers.name}}  {{regesers.last_name}}</span></a>
                  <span v-else>—</span>
                </div>
                <div class="avtors_film_block">
                  <p>Оператор:</p>
                  <a href="#" v-if="operators"><span>{{operators.name}}  {{operators.last_name}}</span></a>
                  <span v-else>—</span>
                </div>
                <div class="avtors_film_block">
                  <p>Сценарист:</p>
                  <a href="#" v-if="scenarists"><span>{{scenarists.name}}  {{scenarists.last_name}}</span></a>
                  <span v-else>—</span>
                </div>
                <div class="avtors_film_block">
                  <p>В главных ролях:</p>
                  <template v-if="actors && actors.length">
                    <span v-for="actor in actors" >{{actors.name}}  {{actors.last_name}}</span>
                  </template>
                  <span v-else>—</span>
                </div>
                <div class="avtors_film_block" v-if="reg.length">
                  <p>Режиссеры:</p>
                      <a :href="route('actor',regs.authors_id)" v-for="regs in reg"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="reg_a.length">
                  <p>Режиссеры - аниматоры:</p>
                      <a :href="route('actor',regs.authors_id)" v-for="regs in reg_a"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="a_idea.length">
                  <p>Авторы идеи:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in a_idea"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="a_scen.length">
                  <p>Авторы сценария:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in a_scen"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="dictor_txt.length">
                  <p>Дикторский текст:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in dictor_txt"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="oper.length">
                  <p>Операторы:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in oper"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="oper_comb.length">
                  <p>Операторы комбинированных съёмок:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in oper_comb"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="xyd.length">
                  <p>Художники:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in xyd"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="xyd_a.length">
                  <p>Художники-аниматоры:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in xyd_a"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="k_graph.length">
                  <p>Компьютерная графика:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in k_graph"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="mont.length">
                  <p>Монтажеры:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in mont"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="sound_oer.length">
                  <p>Звукооператоры:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in sound_oer"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="sound_reg.length">
                  <p>Звукорежиссеры:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in sound_reg"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="komp.length">
                  <p>Композиторы:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in komp"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="txt_write.length">
                  <p>Текст читает:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in txt_write"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="red.length">
                  <p>Редакторы:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in red"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>

              <div class="avtors_film_block" v-if="music_red.length">
                  <p>Музыкальные редакторы:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in music_red"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="xyd_ruk.length">
                  <p>Художественный руководитель:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in xyd_ruk"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="dir_film.length">
                  <p>Директор фильма:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in dir_film"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="prod.length">
                  <p>Продюсеры:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in prod"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="isp_prod.length">
                  <p>Исполнительные продюсеры:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in isp_prod"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>
              <div class="avtors_film_block" v-if="act.length">
                  <p>Актеры:</p>
                  <a :href="route('actor',regs.authors_id)" v-for="regs in act"><span>{{regs.name}}  {{regs.last_name}}</span></a>
              </div>

            </div>
    </div>
              <div v-if="!auth.user" class="">
                <a :href="route('login')" class="link-film-register"> <strong>Зарегистрируйтесь</strong> или <strong>войдите</strong> в систему, чтобы посмотреть фильм!</a>
              </div>

              <div v-if="auth.user" class="">
                <h2 class="mobile-h2-film">{{film.video_name}}</h2>
                <div v-if="film.video">
<!--                  <video-player ref="vvv" :options="videoOptions" @duration="changeDuration"/>-->
<!--                  <MultiRangeSlider-->
<!--                    :min="0"-->
<!--                    :max="duration"-->
<!--                    :step="0.1"-->
<!--                    :ruler="true"-->
<!--                    :label="true"-->
<!--                    :minValue="min"-->
<!--                    :maxValue= "duration"-->
<!--                    @input="UpdateValues"-->
<!--                    :piecewise ="false"-->
<!--                  />-->
                    <div class="player-wrapper">
                      <div id="player"></div>
                      <div v-if="!isVideoLoaded" class="player-bg">
                        <button v-on:click="loadVideo" class="player-btn" style="padding: 10px 30px;
                        background: #df8e70; display: block;
                        width: fit-content;">Смотреть видео</button>  
                      </div>
                    </div>
                <a href="#openModal" style="margin-right: auto;
                margin-top: 20px;
                padding: 10px 30px;
                background: #df8e70; width: 100%; margin-bottom: 10px;" class="btn__login__registr mobile-block">
        Заказать
      </a>
      <a href="#openModal" style="margin-right: auto;
        margin-top: 20px;
        padding: 10px 30px;
        background: #df8e70; display: block;
        width: fit-content;" class="btn__login__registr mobile-none">
      Заказать
      </a>
                </div>
                <div v-else>
                  <p>Видео появится позже</p>
                </div>


                <!-- <a :href="createFragmentLink"><button style="margin-right: auto;
        margin-top: 20px;
        padding: 10px 30px;
        background: #df8e70; width: 100%; margin-bottom: 10px;" class="btn__login__registr mobile-block">
                  Заказать
                        </button></a>
               <a :href="createFragmentLink"><button style="margin-right: auto;
        margin-top: 20px;
        padding: 10px 30px;
        background: #df8e70;" class="btn__login__registr mobile-none">
                  Заказать
                        </button></a>  -->


          <div class="decor_line"></div>
          </div>


          <div class="wrapper__tegs">
            <div v-for="tag in tags" class="tegs__elem">
              <a :href="route('searchtags', tag.name)"><p>{{tag.name}}</p></a>
            </div>


              </div>
            </div>
            <div class="over_film" style="display: none;">
              <h4>Похожее</h4>
              <div class="over_film__elem">
                <img src="@/assets/img/i1.png" alt="" />
                <p>Название видеофайла</p>
              </div>
              <div class="over_film__elem">
                <img src="@/assets/img/i1.png" alt="" />
                <p>Название видеофайла</p>
              </div>
              <div class="over_film__elem">
                <img src="@/assets/img/i1.png" alt="" />
                <p>Название видеофайла</p>
              </div>
              <div class="over_film__elem">
                <img src="@/assets/img/i1.png" alt="" />
                <p>Название видеофайла</p>
              </div>
            </div>
          </div>

          <section v-if="posters.length" class="afishi-mobile">
            <h2>Афиши фильма</h2>
            <div class="decor_line"></div>
            <div v-for="poster in posters" style="display: flex">
            <img class="afishaimg" :src="help + poster.photo" alt="" />
            </div>

            <!-- <p>Афиш нет</p> -->
          </section>
          <div v-for="poster in posters" class="modal_afisha">

            <div class="afisha"><article>&times;</article>
            <div class="modal_afisha__img">
              <img class="afishaimg" :src="help + poster.photo" alt="" />
            </div>
            <div class="modal_afisha__text">
              <p>Афиша <span>{{poster.name}}</span></p>
              <p>Фильм <span>{{poster.film}}</span></p>
              <!-- <p>Художники <span>И. Иванов, П. Петров, С. Сидоров</span></p> -->
              <p>Тираж <span>{{poster.tirage}}</span></p>
              <p>Размеры, см <span>{{poster.sizes}}</span></p>
            </div></div>
          </div>
        </div>
        <section v-if="audios.length">
          <h2>Аудио материалы</h2>
          <div class="decor_line"></div>
          <div class="wrapper_audio">
            <div v-for="audio in audios" class="wrapper_elem_audio">
              <audio controls :src="help + audio.audio" ></audio>
              <p>{{audio.name}}</p>
            </div>
            <!-- <div class="wrapper_elem_audio">
              <audio controls src="@/assets/audio/audio1.mp3"></audio>
              <p>Название Аудио</p>
            </div> -->

            <!-- <p>Аудио нет</p> -->
          </div>
        </section>

        <!-- <div class="block_comment">
          <div class="total_wrapper">
            <h2>Комментарии</h2>
            <div class="block_comment__new">
              <p>Оставьте ваш комментарий</p>
              <div class="wrapper_comment__new__text">
                <textarea placeholder="Текст комментария"></textarea>
                <div class="btn__comm">
                  <p>Отправить</p>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>

      <div id="openModal" class="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Оформление заказа</h3>
              <a href="#close" title="Close" class="close">×</a>
            </div>
            <div class="modal-body">
              <form  @submit="submitForm"> <!-- class="wrap-form-zakaz" -->
              <div class="row-modal">
                  <label class="sub-label" for="">Выберите способ
                    использования</label>
                <select class="form-input" v-model="license_id" name="" id="typeOfUse">
                  <option v-for="type in types" :value="type.id">
                    {{type.name}}
                  </option>

                </select>
              </div>
              <div class="row-modal">
                <label class="sub-label" for="">Тип лицензии</label>
              <select class="form-input" v-model="type_used_id" name="" id="typeOfLicense">
                <option v-for="license in licenses" :value="license.id">
                  {{license.name}}
                </option>

              </select>
                </div>

            <div class="row-modal">
              <label for="">Резидентство</label>
              <div class="wrap-checkboxes">
                <div class="">
                  <input type="radio" name="resident" id="resident1" value="true" v-model="resident">
                  <label style="margin-left: 10px;" for="">Резидент РФ или стран ЕАЭС</label>
                </div>
                <div class="">
                  <input type="radio" name="resident" id="resident2" value="false" v-model="resident">
                  <label style="margin-left: 10px;" for="">Нерезидент</label>
                </div>
              </div>
            </div>

            <div class="row-modal">
              <label class="sub-label" for="">Валюта заказа</label>
              <p class="type-value">Российские рубли</p>
          </div>
             <div class="row-modal">
                  <label for="">Название вашего проекта</label>
                <input type="text" class="form-input" placeholder="Укажите рабочее название проекта" v-model="nameproject" name="" id="nameOfProject">
                </div>

                <div class="row-modal">
                  <label for="">Покупатель</label>
                  <div class="wrap-checkboxes">
                    <div class="">
                      <input type="radio" name="radio" id="organisation1" value="IP" v-on:click="visible=true" v-model="bayer">
                      <label style="margin-left: 10px;" for="">Организация или ИП</label>
                    </div>
                    <div class="">
                      <input type="radio" name="radio" id="organisation2" value="CH" v-on:click="visible=false" v-model="bayer">
                      <label style="margin-left: 10px;" for="">Частное лицо</label>
                    </div>
                  </div>
                </div>
                <div class="row-modal" v-show="visible">
                  <label for=""></label>
                  <div class="wrap-column">
                    <label class="sub-label" for="">Организация</label>
                    <input class="form-input" type="text" name="" id="nameOfOrganisation" v-model="organiz" placeholder="Название организации"></div>
                  </div>

                <div class="row-modal">
                  <label for=""></label>
                  <div class="wrap-column">
                    <label class="sub-label" for="">E-mail</label>
                    <input class="form-input" type="email" name="" id="organisationEmail" v-model="email"  placeholder="username@mail.ru"></div>
                  </div>

                <div class="row-modal">
                  <label for=""></label>
                  <div class="wrap-column">
                    <label class="sub-label" for="">Имя</label>
                    <input class="form-input" type="text" name="" id="nameOfUser" v-model="name" placeholder="Константин Константинов"></div>

                </div>

                <div class="row-modal" style="margin-top: 25px;">
                  <label for="">Дополнительно</label>
                  <textarea class="form-input" id="commentInfo" v-model="info" placeholder="Укажите вашу контактную информацию для уточнения заказа"
                  name="" cols="30" rows="3"></textarea>
                </div>

                <div class="wrap-user-soglasen" style="display: flex;">

                  <div class=""><input type="checkbox" name="" id="agreedOFTerms" required ref="modalcheckbox"></div>
                  <label for="" style="margin-left: 10px;">Я ознакомлен и согласен с условиями <a :href="route('UridInfo')" target="_blank">пользовательского соглашения</a></label>
                </div>

                <p class="price-text">Цена по запросу</p>
                <p class="price-sub-text">Мы пришлем вам расчет после обработки заказа</p>

                <!-- <a :disabled="disabledButton" :href="createFragmentLink"> -->
                  <button style="margin-right: auto;
                  margin-top: 20px;
                  padding: 10px 30px;
                  background: #df8e70; width: fit-content; margin-bottom: 10px;" class="btn__login__registr">
                  Оформить заказ
                </button>
              <!-- </a>  -->
              </form>
            </div>
          </div>
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
    // import "@/assets/js/kino.js";
    import "@/assets/css/kino.css";
    import Header from "@/Layouts/Header.vue";
    import Footer from "@/Layouts/Footer.vue";
    // import VideoPlayer from '@/components/VideoPlayer.vue';
    import 'video.js/dist/video-js.css';
    import MultiRangeSlider from "multi-range-slider-vue";
    import help from "@/Components/helper-api";


export default {

  name: "App",
    components: {
        Header,
        Footer,
        // VideoPlayer,
        // MultiRangeSlider,

    },

    props:[
        'film',
        'tags',
        'actors',
        'operators',
        //'produssers',
        'regesers',
        //'scenarists',
        'posters',
        'audios',
        'licenses',
        'types',
        'reg',
        'reg_a',
        'a_idea',
        'a_scen',
        'dictor_txt',
        'oper',
        'oper_comb',
        'xyd',
        'xyd_a',
        'k_graph',
        'mont',
        'sound_oer',
        'sound_reg',
        'komp',
        'red',
        'music_red',
        'xyd_ruk',
        'dir_film',
        'prod',
        'isp_prod',
        'act',
        'txt_write',
        'studia_id',
        'order'
        //'banner'
    ],
    data() {
      return {
        filename: help + this.film.video,
        filmDuration: 1,
        nameproject: this.order.progect_user_name,
        organiz: '',
        email: this.order.bayer_email,
        name: this.order.bayer_name,
        info: '',
        auth: $('#app').data().page.props.auth,
        min:0,
        max:0,
        duration: 1,
        resident: this.order.resident,
        bayer: this.order.bayer,
        license_id: '',
        type_used_id: '',
        showAuthors: false,
        visible: true,
        videoOptions: {
            autoplay: true,
            controls: true,
            preload: 'none',
            sources: [
                {
                    //src: this.film.prefix + '/' + this.film.file_path + '/' +  this.film.file_name,
                    src: help + this.film.video,
                    type: 'video/mp4',
                }
            ]
        },
        isVideoLoaded: false,
      };
    },
    methods:{
        loadVideo() {
          if (!this.isVideoLoaded) {
            var player = new Playerjs({id:"player", file: help + this.film.video,});
            this.isVideoLoaded = true;
            player.api('play');
            setInterval(() => {
              if(Array.isArray(player.api("cut?"))) {
                this.min = parseInt(player.api("cut?")[0]);
                this.max = parseInt(player.api("cut?")[1]);
              } else {
                this.min = 0;
                this.max = parseInt(player.api("duration"));
              }
            }, 1000)
          }
        },

        UpdateValues(x){
            //Передача данных для измения показа
            this.min = x.minValue;
            this.max = x.maxValue;
            VideoPlayer.methods.updateLength(x.minValue, x.maxValue);
        },
        changeDuration(d){
            console.log("D", d);

            this.duration = d;

        },

        submitForm(e) {
          console.log("ACHTUNNG!!!")
          
            let formData = new FormData();
            formData.append('start_segment', this.min);
            formData.append('end_segment', this.max);
            formData.append('bayer', this.bayer);
            formData.append('bayer_email', this.email);
            formData.append('bayer_name', this.name);
            if(this.organiz == '')
                 formData.append('bayer_org_name', 'Частное лицо');
             else
                formData.append('bayer_org_name', this.organiz);
            formData.append('comment', this.info);
            formData.append('progect_user_name', this.nameproject);
            formData.append('resident', this.resident);
            formData.append('license_id', this.license_id);
            formData.append('type_used_id', this.type_used_id);
            formData.append('film', this.film.id);
            formData.append('user', this.auth.user.id);


            console.log(formData);
            // console.log(this.numder);
            // console.log(this.email);
            e.preventDefault();
              let url = '/order/';
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
                    .then((data) => {
                      const formAlert = document.querySelector('.alert-white')
                      const formAlertClose = document.querySelector('.toast-close')
                      formAlert.style.right = '30px';

                      formAlertClose.onclick = function() {
                        formAlert.style.right = '-50%';
                      }

                        //  location = location.origin + location.pathname;
                     })
                     .catch(function(error) {
                         console.log(error);
                     });
        },
    },
    computed: {
      // createFragmentLink(){
      //   return this.route('create', this.film.id) + '?min=' + this.min + '&max=' + this.max;
      // }


        duration() {
            console.log("DDD", this.$refs.vvv.duration);
            return this.$refs.vvv.duration;
        }
    },
    // created() {
    //     this.filmDuration = document.querySelector('.vjs-tech').duration;
    // },
    // beforeUpdate() {
    // },
    updated() {
    },
    mounted() {
      // this.$refs.modalcheckbox.setCustomValidity('Подтвердите согласие с условиями!');
      var player = new Playerjs({id:"player", file: help + this.film.video,});
      this.max = parseInt(player.api("duration"));

        if(this.bayer == 'CH'){
          this.visible = false;
      }
      document.querySelector('.nav__gamburger').onclick = () => {
      document.querySelector('.ham').classList.toggle('active')
      document.querySelector('.nav__links').classList.toggle('active')
    }
    let allAfishs = document.querySelectorAll(".afishaimg");
    for (let elem of allAfishs) {
      elem.onclick = () => {
        document.querySelector(".modal_afisha").classList.add("active");
      };
    }
    document.querySelector(".modal_afisha article").onclick = () => {
      document.querySelector(".modal_afisha").classList.remove("active");
    };

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
};

    </script>

<style scoped>
.player-wrapper {
  position: relative;
}

.player-bg {
  position: absolute;
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  z-index: 1000;
  background-color: rgba(0,0,0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
}

.player-btn {
}

.text-author {
    font-weight: 600;
    font-size: 20px;
    color: rgb(223, 142, 117);
}
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

.more-authors-text{
  display: flex;
  flex-wrap: wrap;
}
.more-authors-text {
  margin-top: 20px;
}
.more-authors-text > p {
  width: 100%;
  margin-bottom: 15px;
}
.more-authors-text > .avtors_film_block{
  max-width: 50%;
  width: 50%;
}
.super-white > *{
  color: #fff!important;
  font-family: 'Montserrat';
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
  .form-input{
    font-size: 18px;
  }
  .row-modal > label{
    font-size: 20px;
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
