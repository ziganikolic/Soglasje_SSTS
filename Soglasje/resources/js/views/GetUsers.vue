  <template>


    <div class="flex justify-center">
    <div class=" bg-white p-6 rounded-lg mb-4">

    <div class="text-center">
        <h1 class="text-3xl md:text-5xl xl:text-3xl font-bold tracking-tight mb-8">Če želite prenesti uporabniška gesla <br> klikni na gumb spodaj:</h1>
    </div>
      <ul class="list-disc p-4 mb-4">
        <li>S klikom na gumb boste prenesli gesla za uporabnike (dijake)</li>
        <li>gesla so v Excel datoteki razporejeni po zaporedni številki dijaka (zaporedje v eAsistentu)</li>
        <li>To je edina možnost, da pridobite uporabniška gesla, kasneje te datoteke ne bo mogoče prenesti</li>
        <li>Prosim da, datoteko z gesli shranite na varno mesto!</li>
      </ul>

<div>
  <div class="text-center">
    <xlsx-workbook>
      <xlsx-sheet
        :collection="sheet.data"
        v-for="sheet in sheets"
        :key="sheet.name"
        :sheet-name="sheet.name"
      />
      <xlsx-download>
        <button @click="this.DownloadCheck = true" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full text-xl">Prenesi gesla</button>
      </xlsx-download>
    </xlsx-workbook>
</div>

<div v-if="this.DownloadCheck == true">
  <router-link :to="{ name: 'dashboard.index'}">
    <arrow-circle-left-icon class="h-12 w-12 text-blue-600 cursor-pointer"></arrow-circle-left-icon>
  </router-link>
</div>

</div>

  </div>
  </div>
</template>

<script>
import { XlsxRead, XlsxTable, XlsxSheets, XlsxJson, XlsxWorkbook, XlsxSheet, XlsxDownload } from "vue3-xlsx";
import { ArrowCircleLeftIcon } from '@heroicons/vue/solid'

export default {
  components: {
    XlsxWorkbook,
    XlsxSheet,
    XlsxDownload,
    ArrowCircleLeftIcon,
  },
  data() {
    return {
      sheetName: null,
      sheets: [],
      collection: [{ a: 1, b: 2 }],
      UserData:[],
      DownloadCheck: false,
    };
  },
  methods: {
    // addSheet() {
    //   this.sheets.push({ name: this.sheetName, data: [...this.collection] });
    //   this.sheetName = null;
    // },
  },
    created() {
        //this.sheets.push(JSON.parse(this.$route.params.datapwd))
        this.sheets = (JSON.parse(this.$route.params.datapwd))
        console.log(this.UserData)
    },
};
</script>