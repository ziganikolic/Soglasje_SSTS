<template>

<div class=" bg-white p-6 rounded-lg mb-4">
          
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">

    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        
    </div>
    <div class="p-4">
        <h1>Ime in priimek: <b>{{ userData['ime'] }} {{ userData['priimek'] }}</b></h1>
        <h1>Email:  {{ userData['email'] }} </h1>
        <h1>Razred: {{ userData['oddelek'] }}</h1>
    </div>

<div class="accordion" id="accordionExample" >

  <div class="accordion-item bg-white border border-gray-200"
    v-for="item in kategorije"
          :key="item.id"
  >

    <h2 class="accordion-header mb-0" :id="['#index' + item.id ]">
        
      <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-4
        px-5
        text-base text-gray-800 text-left
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none"
        @click="changeIndex(item.id), getKategorija(index)" 
        type="button" data-bs-toggle="collapse" v-bind:data-bs-target="['#index' + item.id ]" aria-expanded="false"
        :aria-controls="['#index' + item.id ]">
        {{ item.kategorija_ime }}
      </button>      
    </h2>
    <div :id="['index'+ item.id]" class="accordion-collapse collapse" :aria-labelledby="['#index' + item.id ]"
      data-bs-parent="#accordionExample">
      <div class="accordion-body py-4 px-5">

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                        Privolitev</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                        izbira</span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <tr class="bg-white"  v-for="(privolitev, key) in kategorije[index]['privolitev']"
                :key="privolitev.id"
                >
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ privolitev.privolitev_ime }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <span v-if=" izbira[key] == true" class="bg-green-100 text-green-800 text-xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">DA</span>
                        <span v-if=" izbira[key] == false" class="bg-red-100 text-red-800 text-xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">NE</span>
                        <span v-if=" izbira[key] == null" class="text-center bg-yellow-100 text-yellow-800 text-l font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">NI DOLOČENO</span>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>

</div>




    <router-link :to="{ name: 'dashboard.index' }"><button
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full float-left">
            NAZAJ
    </button > </router-link>

    </div>
</div>
</template>

<script>

import { onMounted } from "vue";
import { ref } from 'vue'
import axios from 'axios';
import axiosClient from "../compossables/axios";


//axios 17.3
export default {

data () {
    return {
        count: 11,  //11 je število vseh kategorij 
        index: 1,   //števec za pomikanje po kategorijah
        kategorijaIndex: 0,
        izbira: [],
        userID: '',
        userData: [],
    };
},


setup(){
  const kategorije = ref('')
  const soglasje = ref('')





  const loadData = async () =>{
    try{
    const response = await axiosClient.get('/privolitev/')

    kategorije.value = response.data.data.kategorije;


    } catch (err){
        console.log(err)
    }
  }
  loadData()

  return {
      kategorije,

    }
  },
    methods:{
        changeIndex(key){

                this.kategorijaIndex = key 
                this.index = key - 1
            
        },

        getKategorija(index){
                if (this.izbira.length != 0){
                    this.izbira = []
                        
                };
            this.stanje_soglasja.forEach((privolitev) => {
                if(privolitev.kategorija_id == this.kategorijaIndex){
                    console.log(privolitev.izbira);
                    this.izbira.push(privolitev.izbira)
                };

            });
            
        },
    },
    created() {
        this.userID = this.$route.params.id
        axiosClient.get(`/stanje_soglasja/${this.userID}`).then((response) => {
            this.stanje_soglasja = response.data.data.user[0].stanje_soglasja
            this.userData = response.data.data.user[0]
        })
    },
}
</script>

<style>

</style>









