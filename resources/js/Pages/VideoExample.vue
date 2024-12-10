<template>
    <div>
      <video-player ref="vvv" :options="videoOptions" @duration="changeDuration"/>
      <MultiRangeSlider
      :min="0"
      :max="duration"
      :step="0.1"
      :ruler="true"
      :label="true"
      :minValue="min"
      :maxValue= "max"
      @input="UpdateValues"
    />

    </div>
  </template>

  <script>
  import VideoPlayer from '@/components/VideoPlayer.vue';
  import 'video.js/dist/video-js.css';
  import MultiRangeSlider from "multi-range-slider-vue";


  export default {
    name: 'VideoExample',
    components: {
      VideoPlayer,
      MultiRangeSlider
    },
    props:[
        'film'
    ],
    data() {
      return {
        min:0,
        max:0,
        duration: 1,
        videoOptions: {
          autoplay: false,
          controls: true,
          sources: [
            {
              src: this.film.prefix + '/' + this.film.file_path + '/' +  this.film.file_name,
                type: 'video/mp4'
            }
          ]
        }
      };
    },
    mounted(){
        //console.log(this.film);
        //this.videoOptions.sources.src = this.film[0].prefix + '/' + this.film[0].file_path + '/' +  this.film[0].file_name;
        console.log('this.film', JSON.stringify( this.film[0]));
    },
    methods:{
        changeDuration(d){
            console.log("D", d);
            this.duration = d || 1;
        },
        UpdateValues(x){
            console.log("NEW", x);
        }
    },
    //mounted(){
        //alert("!!!");
     //   console.log("DDDD", this.$refs.vvv.player.duration);
   // }
  };
  </script>

<style>
  video{
    max-height: 670px;
    height: 100%;
    width: 100%;
  }
</style>