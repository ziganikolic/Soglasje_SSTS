<template>
<div class=" bg-white p-6 rounded-lg mb-4">
          
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex justify-between align-middle">
        <div class="flex items-center">
            <h1 class="pr-2">Dijaki: </h1>


    <select class="form-select
      appearance-none
      px-4
      py-1
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="" 
      v-model="selected"
      >
        <option value="TR5a">TR/5.a</option>
        <option value="ET5b">ET/5.b</option>
        <option value="ET5a">ET/5.a</option>
        <option value="TM4a">TM/4.a</option>
        <option value="TM4b">TM/4.b</option>
        <option value="TM4c">TM/4.c</option>
        <option value="TR4a">TR/4.a</option>
        <option value="ET4b">ET/4.b</option>
        <option value="ET4c">ET/4.c</option>
    </select>

        </div>
        <div class="flex items-center">

            <button v-if="filter_oddelkov.length != 0 && uredi == true" @click="DeleteAlert = true" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full float-left m-0.5">
                Odstrani
            </button >

            <button v-if="filter_oddelkov.length != 0" @click="urediClick" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-full float-left m-0.5"
            >
                UREDI 
            </button >


            <a href="/register">
                <button v-if="uredi == false" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full float-left m-0.5">
                    Dodaj uporabnika
                </button>
            </a>

            <button v-if="uredi == true" @click="oznaciVse()" class="bg-white text-black font-bold py-2 px-4 rounded-full float-left m-0.5 border ">
                Označi vse
            </button>
        </div>
        </div>

</div>
    <div v-if="deleteList.length > 0" class="mt-3 inline-flex" v-for="item in users" :key="item">
        <div v-if="deleteList.indexOf(item.id) !== -1">
            <span  class="bg-red-100 text-red-800 text-xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900  inline-flex items-center">
                 {{ item.ime }} {{ item.priimek }} 
                 <XIcon
                    @click="noDelete(item.id)" 
                    class="ml-1 h-6 w-6 text-red-600 cursor-pointer"/>
            </span>
            
        </div>
    </div>

    
    <div v-if="DeleteAlert" class="z-50 fixed show inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div  id="popup-modal" tabindex="0" class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-2 bg-white rounded-lg shadow dark:bg-gray-700">

                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button @click="DeleteAlert = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-2 pt-0 text-center">
                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this </h3>
                    <button @click="deleteUsers()" data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button @click="DeleteAlert = false"  data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                    >No, cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>





</div>
<div class=" bg-white p-6 rounded-lg  mb-3">
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div v-if="filter_oddelkov.length < 2">
            <form id="mainFormUsers">
                <xlsx-read :file="file">
                        <xlsx-json>
                            <template #default="{collection}">

                    <label
                        :class="{'h-auto' : this.file != null }"
                        class="flex justify-center w-full min-h-auto h-40 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none mb-4"
                        >
                        
                        <span class="flex items-center space-x-2">
                            <svg v-if="file == null" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>                            
                            <span class="font-medium text-gray-600">

                    <input type="file" @change="onChange" class="" />
                                <xlsx-table />

                                <h1 v-if="file == null">Spusti datoteko ali,<span class="text-blue-600 underline">prebrskaj </span>(excel)</h1>

                            </span>
                        </span>
                        
                    </label>
                    <div v-if="this.file != null" class="flex justify-center">
                        <button type="button" @click="saveExcelUser(collection),addSheet(),shareDate(collection)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full m-0.5">Kreiraj uporabnike</button>
                    </div>


                    </template>
                        </xlsx-json>

                    </xlsx-read>
                </form>
        </div>        

        <table v-if="filter_oddelkov.length != 0" class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                        Ime in priimek</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                        Oddelek</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                        ID</span>
                </th>
                <th>
                    <span
                        v-if="uredi == true"
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                        Odstrani</span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="item in filter_oddelkov">
                <tr :class="{' bg-red-400' : deleteList.indexOf(item.id) !== -1}">
                    <td :class="{' text-red-900 font-bold ' : deleteList.indexOf() !== -1}" class=" px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap ">
                        <router-link :to="{ name: 'dijak.index', params: {id: item.id} }"> {{ item.ime }}{{' '}}{{item.priimek}}</router-link>
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.oddelek }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.id }}
                    </td>
                    <td>
                        <XIcon v-if="uredi == true" :class="{' text-red-800' : deleteList.indexOf(item.id) !== -1}" @click="getInfo(item.id)"  class="h-8 w-8 text-red-600 cursor-pointer"/>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>


    </div>
</div>

<div>



</div>

</template>

<script>
import { onMounted } from "vue";
import { ref } from 'vue'
import axiosClient from "../compossables/axios";
import { BeakerIcon } from '@heroicons/vue/solid'
import { XIcon } from '@heroicons/vue/solid'
import { computed } from 'vue'

import { XlsxRead, XlsxTable, XlsxSheets, XlsxJson, XlsxWorkbook, XlsxSheet, XlsxDownload } from "vue3-xlsx";

import NProgress from 'nprogress'




//axios 
export default {
    



  components: 
  { 
    BeakerIcon,
    XIcon,
    XlsxRead,
    XlsxJson,
    XlsxTable,
    XlsxDownload,
    XlsxSheet,
    XlsxSheets,
    XlsxWorkbook,




  },


props: ['user'],



data () {
    return {
        users: [],
        selected: this.user.oddelek,
        isDisabled: 'disabled',
        deleteList: [],
        DeleteAlert: false,
        uredi: false,
        file: null,
        pwdUsers: [],
        sheetName: "pwd",
        pwd: [],
        

        //za posiljanje na api
        APIpwd:[]

    };
},

    created() {
        axiosClient.get(`/users`).then((response) => {
            this.users = response.data
        })

        console.log(this.user.oddelek)
        
    },
    methods:{


        getInfo(id){
            this.deleteList.indexOf(id) === -1 ? this.deleteList.push(id) : console.log(id) 
        },
        
        noDelete(key){
            console.log(key)
            let st = 0
            this.deleteList.forEach((el) => {
                if(el == key){
                    console.log(key)
                    console.log(st)
                    this.deleteList.splice(st,1);
                }
                st = st + 1
            })
        },




        deleteUsers(){          
            
            NProgress.start()

            axiosClient.post('/stanje_soglasja/all/',{
                users: this.deleteList
            }),


            axiosClient.post('/users/all/',{
                users: this.deleteList
            }),

            this.DeleteAlert = false;
            setTimeout(() => 
            window.location.reload(),
            NProgress.done(), 1500);
            
        
        },


        urediClick(){
            let index = this.deleteList.length;
            console.log(index)
            if(this.uredi == false){
                this.uredi = true
            }else{
                this.uredi = false
                this.deleteList.splice(0,index)
            }
        },

        oznaciVse(){
            this.filter_oddelkov.forEach(element => {
                this.deleteList.push(element.id)
            });
        },


        addSheet() {
            this.pwd.push({ name: this.sheetName, data: this.pwdUsers });
            this.sheetName = null;
        },

        saveExcelUser(collection){
            NProgress.start()

            console.log(collection)
            console.log(collection.length)

            let chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            let passwordLength = 6;
            let password = "";
            
            for(let i = 1; i < collection.length + 1;) {
                for (var st = 0; st <= passwordLength; st++) {
                    var randomNumber = Math.floor(Math.random() * chars.length);
                    password += chars.substring(randomNumber, randomNumber +1);
                }
                let pwdUser = {
                    name: collection[i-1]["Zap. št."],
                    pwd: password,
                };

                this.pwdUsers.push(pwdUser);

                this.APIpwd.push(password)

                console.log(password)
                console.log(i)
                console.log(pwdUser)
                password = "";
                i++
            }
        },

        onChange(event) {
            this.file = event.target.files ? event.target.files[0] : null;
        },

        shareDate(collection){
            setTimeout(() => 
            axiosClient.post('/users/',{
                users: collection,
                oddelek: this.selected,
                pwd: this.APIpwd
            }), 3000); 

            NProgress.done(), this.$router.push({name:"getUsers", params: { datapwd: JSON.stringify(this.pwd)} })
            
        },
    },
    computed: {
        filter_oddelkov: function() {
            let selected = this.selected
            let filter = 0

        return this.users.filter(function(user){
            if(user.oddelek == selected){
                if(user.vloga == 1){
                    filter = user.id
                }
                return filter
            }
        })
        },


    }
}

</script>

