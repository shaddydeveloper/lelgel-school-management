<template>
  <div class="row col-12">
    
        <fieldset class="form-group border p-3 m-2 col-lg-6">
        <legend class="w-auto px-2">Term configurations</legend>
        <form @submit.prevent="submitTerms" class="m-2">
        <div class="form-group col-lg-12">
            <label for="term_period">Select Term</label>
            <select v-model="term" id="term-select" class="form-control" @change="termSelection($event)">
                <option value="" selected>--- Please Select the term ---</option>
                <option v-for="singleTerm in terms" :key="singleTerm.id" :value="singleTerm.term_id">{{ singleTerm.name }}</option>
            </select>
        </div>
        <div class="form-group col-lg-12" v-if="selectedTerm != ''">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" placeholder="Name" v-model="selectedTerm.name">
        </div>
        <div class="form-group col-lg-12" v-if="selectedTerm != ''">
            <label for="start_date" class="form-label">Opening Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" v-model="selectedTerm.start_date">
        </div>
        <div class="form-group col-lg-12" v-if="selectedTerm != ''">
            <label for="end_date" class="form-label">Closing Date</label>
            <input type="date" name="end_date" id="start_date" class="form-control" v-model="selectedTerm.end_date">
        </div>
        <div class="form-group col-lg-12" v-if="selectedTerm != ''">
            <label for="fee_amount" class="form-label">Fee Amount</label>
            <input type="number" name="fee_amount" id="fee_amount" class="form-control" v-model="selectedTerm.fee_amount">
        </div>
        <div class="form-group col-lg-12" v-if="selectedTerm != ''">
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </form>
    </fieldset>
    
    <fieldset class="form-group border p-3 m-2 col-lg-4">
        <legend class="w-auto px-2">Notifications</legend>
        <form @submit.prevent="createNotification()" method="post" class="row">
        
        <div class="form-group col-lg-12">
            <button :class="notificationButton.class" @click="createUpdate()">{{ notificationButton.name }}</button>
        </div>
        <div class="" v-if="notificationButton.name == 'Create'">
        <div class="form-group-col-lg-12">
            <label for="title" class="form-label">Notification Title</label>
            <input type="text" class="form-control" name="title" v-model="notifications.title" placeholder="Notification Title">
        </div>
        <div class="form-group-col-lg-12">
            <label for="item_id">Product Name</label>
            <select name="item_id" id="item_id" class="form-control" v-model="notifications.item_id">
                <option v-for="product in products" :key="product.stuff_id" :value="product.stuff_id">{{ product.name }}</option>
            </select>
        </div>
        <div class="form-group col-lg-12">
            <label for="notification_number" class="form-label">Number Of Quantity To Notify</label>
            <input type="number" name="notification_number" v-model="notifications.notification_number" id="notification_number" class="form-control">

        </div>
        <div class="form-group col-lg-12">
            <label for="repeat" class="form-check-label">Repeat</label>
            <input type="checkbox" name="repeat" v-model="notifications.repeat" id="repeat" class="form-check-inline ml-2">
        </div>
        <div class="form-group col-lg-12">
            <button class="btn btn-success" type="submit" >Submit</button>
        </div>
    </div>
    <div class="" v-if="notificationButton.name == 'Update'">
        <div class="form-group col-lg-12">
            <label for="notification_title" class="form-">Notification Title</label>
        </div>
    </div>
</form>
    </fieldset>
   
    <fieldset class="form-group border m-2 p-3 col-lg-5">
        <legend class="w-auto px-2">Exercise Books</legend>
        <form >
            <div class="form-group col-lg-12">
                <input type="checkbox" v-model="use_limit" name="use_limit" id="use_limit" class="input-check">
                <label for="use_limit" class="input-check">Use Limit</label>
            </div>
            <div class="form-group col-lg-12" v-if="use_limit == true">
                <label for="exercise_limit" class="form-label">Limit of Exercise books given to each student</label>
                <input type="number" v-model="limit" @keyup="updateLimit()" name="exercise_limit" id="exercise_limit" class="form-control" placeholder="Limit">
            </div>
           
        </form>
    </fieldset>
  </div>
</template>

<script>
export default {

    data(){
        return{
            terms:[],
            term: [],
            selectedTerm: [],
            notificationButton: {
                'name': 'Create',
                'class' : 'btn btn-info'
            },
            notifications: {},
            products: {},
            use_limit : false,
            limit: '',
            allLimits: [],
        }
    },
    created(){
        axios.get("http://localhost/lelgel-school-management/public/api/terms")
        .then(res => {
            this.terms = res.data;
            // console.log(this.terms);
        })
        .catch(err => {
            console.error(err);
        });
        axios.get("http://localhost/lelgel-school-management/public/api/notifications")
        .then(res => {
            this.notifications = res.data;
            // console.log(this.terms);
        })
        .catch(err => {
            console.error(err);
        });
        axios.get("http://localhost/lelgel-school-management/public/api/products")
        .then(res => {
            this.products = res.data;
            // console.log(this.terms);
        })
        .catch(err => {
            console.error(err);
        });
        axios.get("http://localhost/lelgel-school-management/public/api/all_limits")
        .then(res => {
            this.allLimits = res.data;
            console.log(this.allLimits);
        })
        .catch(err => {
            console.error(err);
        });


    },
    methods:{
async submitTerms(){


},
termSelection(event){
    this.selectedTerm = [];
    // console.log(event.target.value);
for (let index = 0; index < this.terms.length; index++) {
    if (this.terms[index].term_id == event.target.value) {
        this.selectedTerm = this.terms[index];
    } else {

    }

}
},
createUpdate(){
    if (this.notificationButton.name == 'Create') {
        this.notificationButton.name = 'Update';
        this.notificationButton.class = 'btn btn-info'
    } else {
        this.notificationButton.name = 'Create';
        this.notificationButton.class = 'btn btn-success'
    }

},
createNotification(){
    console.log(this.notifications)
    // axios.post("http://localhost/lelgel-school-management/public/api/create_notification", this.notifications)
    // .then(res => {
    //     console.log(res)
    // })
    // .catch(err => {
    //     console.error(err);
    // })
},
updateLimit(){
    axios.get("http://localhost/lelgel-school-management/public/api/update_limit/"+ this.limit)
        .then(res => {
            alert('success');
        })
        .catch(err => {
            console.error(err);
        });
}
    }

}
</script>

<style>

</style>
