import axios from 'axios';
// import store from "./store"
// import {ref} from 'vue'
// import { config } from 'vue/types/umd';


const axiosClient = axios.create({
    baseURL: 'https://www.ziganikolic.hhost.si/api/'
})



// axiosClient.interceptors.request.use(config =>{
//     config.headers.Authorization = 'Berer ${store.state.user.token}'
//     return config;
// })

export default axiosClient;



// export default function useCompanies() {
//     const companies = ref([])
    
//     const getCompanies = async () => {
//         let response = await axios.get('')
//         companies.value = response.data;        //dodaj data.data (v API data{..podatki..})
//     }
    

//     return{
//         companies,
//         getCompanies
//     }
// }