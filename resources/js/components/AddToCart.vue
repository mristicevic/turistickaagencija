<template>
    <div >
        <button class="btn btn-danger text-center " v-on:click.prevent="addTripToCart">Add to cart
        </button>
    </div>
</template>

<script>
    export default {
        data(){
            
    },
    props:['tripId','userId']   ,
    methods:{
        addTripToCart(){
            if(this.userId == 0){
                this.$toastr.e('You need to login!');
                return;
            }
            
        }
    }  , 
       mounted() {
            console.log('Component mounted.')
        }
    }
</script>