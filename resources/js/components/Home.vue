<template>
  <div>
    <canvas id="booksChart" v-if="isLoaded == true"></canvas>
  </div>
</template>

<script setup>
import Chart from 'chart.js/auto'
import { onMounted } from 'vue';
var labels = getLabels();
var isLoaded = false;
var chartData = [];
var allValues = [];
var responseData = {};
var data = {
  labels: [],
  datasets: [{
    label: 'Subjects',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: [],
  }],
};
const config = {
  type: 'line',
  data: data,
  options:{}
}
async function getData() {
  
  await axios.get("http://localhost/lelgel-school-management/public/api/exercise_books_data")
        .then(res => {
          var chartLabels = [];
            responseData = res.data;
            labels = Object.keys(responseData);
            allValues = Object.values(responseData);
            allValues.forEach(element => {
              chartLabels.push(element.length)
            });
            // console.log(labels);
            // this.isloaded = true;
            return chartLabels;

        })
        .catch(err => {
            console.error(err);
        });
}
async function getLabels() {
  
  await axios.get("http://localhost/lelgel-school-management/public/api/exercise_books_data")
        .then(res => {
          var chartInfo;
            responseData = res.data;
            chartInfo = Object.keys(responseData);
            console.log(chartInfo)
            return chartInfo;

        })
        .catch(err => {
            console.error(err);
        });
}
 onMounted(async () => {
  axios.get("http://localhost/lelgel-school-management/public/api/exercise_books_data")
        .then(res => {
          var chartLabels = [];
            responseData = res.data;
            labels = Object.keys(responseData);
            allValues = Object.values(responseData);
            allValues.forEach(element => {
              chartLabels.push(element.length)
            });
            data.labels = labels;
            data.datasets[0].data = chartLabels;
            console.log(data.labels);
            console.log(data.datasets[0].data)
            isLoaded = true;
        console.log(isLoaded);

        })
        .catch(err => {
            console.error(err);
        });
        console.log(isLoaded)
  if (isLoaded == true) {
    var booksChart = new Chart(
    document.getElementById('booksChart'),
    config
  );
  }
  else{
    console.log('not loaded');
  }
})
</script>

<style>

</style>